@extends('layout.admin.main')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="alert alert-danger">
      <p class="mb-0">Pilih minimal 3 destinasi</p>
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
<div class="row my-3">
  <div class="col-12">
    <h6>Total Jarak: <span id="total-distance">0</span> km</h6>
  </div>
  <div class="col-12 my-2">
    {{-- Rutenya dari title pariwisata --}}
   <div id="rute"></div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-md-12">
    <div id="map" style="height: 50vh; width: 100%;"></div>
  </div>
</div>
<script>
  const pattern = /!3d(-?\d+\.\d+)!2d(-?\d+\.\d+)/;

  async function updateMap() {
    const locations = $('#type_tour_id').val();

    const coordinates = locations.map(function (location) {
      const url = extractUrlFromIframe(location);
      if (url) {
        const result = extractLatLng(url);
        return result ? { lat: parseFloat(result.latitude), lng: parseFloat(result.longitude) } : null;
      }
      return null;
    }).filter(Boolean); // Hanya ambil koordinat yang valid (tidak null)


    if (coordinates.length > 0) {
      await initMap(coordinates);
    } else {
      console.error('Tidak ada koordinat yang valid ditemukan.');
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

  async function initMap(coordinates) {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: coordinates[0],
      mapTypeId: 'roadmap'
    });

    // Menambahkan marker untuk setiap node
    coordinates.forEach(function (coord, index) {
      new google.maps.Marker({
        position: coord,
        map: map,
        label: (index + 1).toString()
      });
    });

    try {
      const response = await fetch("http://localhost:3000/optimize", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify({
          locations: coordinates.map(function (coord) {
            return {
              lat: coord.lat,
              lon: coord.lng
            };
          })
        })
      });

      if (!response.ok) {
        throw new Error('Gagal mendapatkan data optimasi dari server');
      }

      const data = await response.json();
      var bestPath = data.best_path;

      var pathCoordinates = bestPath.map(function (index) {
        return coordinates[index];
      });

      // Menambahkan polyline untuk jalur terbaik
      var bestPathLine = new google.maps.Polyline({
        path: pathCoordinates,
        geodesic: true,
        strokeColor: `#${Math.floor(Math.random() * 16777215).toString(16)}`,
        strokeOpacity: 1.0,
        strokeWeight: 2,
        name: 'Best Path',
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

      document.getElementById('total-distance').innerText = data.total_jarak;
      let rute = "";
      // best path merupakan index
      // dari lokasi yang sudah diurutkan tolong tampilkan title dari lokasi tersebut
      bestPath.forEach(function (index) {
        if(index > 0) {
          rute += `<p>${index + 1}. ${$('#type_tour_id option').eq(index).text()} - Jarak: ${data.jarak[index - 1]} km</p>`;
        } else {
          rute += `<p>${index + 1}. ${$('#type_tour_id option').eq(index).text()}</p>`;
        }
      });
      document.getElementById('rute').innerHTML = rute;

      bestPathLine.setMap(map);
    } catch (error) {
      console.error('Error:', error);
    }
  }

  // Panggil fungsi updateMap ketika data lokasi diperbarui
  document.getElementById('type_tour_id').addEventListener('change', updateMap);

  // Memanggil updateMap saat halaman pertama kali dimuat
  window.onload = updateMap;
</script>


@endsection