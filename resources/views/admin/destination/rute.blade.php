@extends('layout.admin.main')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="alert alert-danger">
      <p class="mb-0">Pilih minimal 3 destinasi. Anda secara otomatis akan diarahkan ke destinasi terdekat dari lokasi
        sekarang.</p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-9 col-md-10">
    <select id="type_tour_id" class="form-select select2" name="type_tour_id[]" multiple="multiple" required>
      @foreach ($tours as $item)
      <option value="{{ $item->map_location }}">{{ $item->title }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-3 col-md-2 d-flex align-items-center">
    <button class="btn btn-primary w-100" id="btn-submit" type="button" onclick="updateMap()">
      <i class="ti ti-send"></i> Cek Rute
    </button>
  </div>
</div>
<div class="row my-2">
  <div class="col-12">
    <h6>Total Jarak: <span id="total-distance">0</span> km</h6>
  </div>
  <div class="col-12 my-2">
    {{-- Rutenya dari title pariwisata --}}
    <div id="rute"></div>
  </div>
</div>
<div class="row mt-2 mb-5">
  <div class="col-md-12">
    <div id="map" style="height: 50vh; width: 100%;"></div>
  </div>
</div>
<script>
  const pattern = /!3d(-?\d+\.\d+)!2d(-?\d+\.\d+)/;

  async function updateMap() {
    const locations = $('#type_tour_id').val();

    if (!locations || locations.length === 0) {
      Swal.fire({
        icon: 'warning',
        title: 'Perhatian',
        text: 'Silakan pilih destinasi wisata terlebih dahulu!',
      });
      return;
    }

    if (locations.length < 3) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Pilih minimal 3 destinasi wisata untuk mendapatkan rute terbaik!',
      });
      return;
    }

    try {
      // Tampilkan loading state
      Swal.fire({
        title: 'Sedang memproses...',
        html: 'Mohon tunggu sebentar, sedang menghitung rute terbaik',
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading();
        }
      });

      // Ekstrak koordinat dari lokasi
      let coordinates = locations.map(function (location) {
        const url = extractUrlFromIframe(location);
        if (url) {
          const result = extractLatLng(url);
          return result ? { lat: parseFloat(result.latitude), lng: parseFloat(result.longitude) } : null;
        }
        return null;
      }).filter(Boolean);

      // Dapatkan lokasi pengguna
      let currentLocation = await getCurrentLocation();
      let allCoordinates = [currentLocation, ...coordinates];

      // Inisialisasi peta
      const { Map } = await google.maps.importLibrary("maps");
      const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

      var map = new Map(document.getElementById('map'), {
        zoom: 13,
        center: currentLocation,
        mapId: 'roadmap'
      });

      // Tambahkan marker untuk setiap lokasi
      allCoordinates.forEach((coord, index) => {
        new AdvancedMarkerElement({
          position: coord,
          map: map,
          title: (index + 1).toString(),
          zIndex: index + 1,
        });
      });

      // Kirim data ke API optimasi
      const response = await fetch("http://localhost:3000/optimize", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify({
          locations: allCoordinates.map(coord => ({
            lat: coord.lat,
            lon: coord.lng
          }))
        })
      });

      if (!response.ok) {
        throw new Error('Gagal mendapatkan data optimasi dari server');
      }

      const data = await response.json();
      
      // Gambar rute optimal
      drawOptimalRoute(map, allCoordinates, data, locations);
      
      // Update informasi rute
      updateRouteInfo(data, locations);

      Swal.close();
    } catch (error) {
      console.error('Error:', error);
      Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan',
        text: error.message
      });
    }
  }

  function extractUrlFromIframe(iframeHtml) {
    const srcPattern = /src="([^"]+)"/;
    const match = iframeHtml.match(srcPattern);
    if (match) {
      return match[1];
    } else {
      console.error('Tidak dapat mengekstrak URL dari iframe.');
      return null;
    }
  }

  function extractLatLng(url) {
    const lat = url.toString().split('!3d')[1].split('!2m3!')[0];
    const lng = url.toString().split('!2d')[1].split('!3d')[0];
    return {
      latitude: lat,
      longitude: lng
    };
  }

  // Fungsi helper untuk mendapatkan lokasi pengguna
  function getCurrentLocation() {
    return new Promise((resolve, reject) => {
      if (!navigator.geolocation) {
        reject(new Error('Browser tidak mendukung geolocation'));
        return;
      }

      navigator.geolocation.getCurrentPosition(
        (position) => {
          resolve({
            lat: position.coords.latitude,
            lng: position.coords.longitude
          });
        },
        (error) => {
          let errorMessage = 'Mohon izinkan akses lokasi untuk mendapatkan rute terbaik.';
          switch(error.code) {
            case error.PERMISSION_DENIED:
              errorMessage = 'Anda menolak permintaan akses lokasi. Mohon izinkan akses lokasi di browser Anda.';
              break;
            case error.POSITION_UNAVAILABLE:
              errorMessage = 'Informasi lokasi tidak tersedia.';
              break;
            case error.TIMEOUT:
              errorMessage = 'Waktu permintaan untuk mendapatkan lokasi habis.';
              break;
          }
          reject(new Error(errorMessage));
        },
        { 
          enableHighAccuracy: true,
          timeout: 10000,
          maximumAge: 0
        }
      );
    });
  }

  // Fungsi untuk menggambar rute optimal
  function drawOptimalRoute(map, coordinates, data, locations) {
    const pathCoordinates = data.best_path.map(index => coordinates[index]);
    
    new google.maps.Polyline({
      path: pathCoordinates,
      geodesic: true,
      strokeColor: `#${Math.floor(Math.random() * 16777215).toString(16)}`,
      strokeOpacity: 1.0,
      strokeWeight: 2,
      map: map,
      icons: [{
        icon: {
          path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
          scale: 2,
          strokeColor: '#0000FF',
          strokeOpacity: 0.8
        },
        offset: '100%',
        repeat: '100px'
      }]
    });
  }

  // Fungsi untuk memperbarui informasi rute
  function updateRouteInfo(data, locations) {
    let rute = "<div class='list-group'>";
    
    data.best_path.forEach((index, i) => {
        const isCurrentLocation = index === 0;
        const distance = i > 0 ? `<span class="badge bg-primary">${data.jarak[i - 1]} km</span>` : '';
        
        // Perbaikan cara mengambil title
        let title;
        if (isCurrentLocation) {
            title = 'Lokasi Anda';
        } else {
            const selectedOption = document.querySelector(`#type_tour_id option[value="${CSS.escape(locations[index - 1])}"]`);
            title = selectedOption ? selectedOption.textContent : 'Destinasi tidak ditemukan';
        }
        
        rute += `
            <div class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>${i + 1}.</strong> ${title}
                    </div>
                    ${distance}
                </div>
            </div>
        `;
    });
    
    rute += "</div>";
    
    document.getElementById('rute').innerHTML = rute;
    document.getElementById('total-distance').innerText = data.total_jarak;
  }

  document.getElementById('type_tour_id').addEventListener('change', updateMap);

  window.onload = updateMap;
</script>


@endsection