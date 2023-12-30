@extends('layout.admin.main')
@section('content')
<div class="row">
  <div class="col-md-12 text-end mb-3">
    <a href="{{ route('Pariwisata') }}" class="btn btn-light"><i class="bx bx-arrow-back"></i> Kembali</a>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <form action="{{ route('Update Pariwisata', $tour->id) }}" method="POST" enctype="multipart/form-data">
      @csrf


      <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>Form Pariwisata</h5>
      <div class="mb-3 row align-items-center">
        <label for="title" class="form-label fw-semibold col-sm-3 col-form-label">Nama
          Pariwisata</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="title" id="title" placeholder="Contoh: Pantai Gili" required
            autocomplete="name" autofocus value="{{ $tour['title']}}">
        </div>
      </div>

      <div class="mb-3 row align-items-center">
        <label for="type_tour_id" class="form-label fw-semibold col-sm-3 col-form-label">Jenis
          Pariwisata</label>
        <div class="col-sm-9">
          <select id="type_tour_id" class="form-select select2" name="type_tour_id" required>
            <option value="">Pilih Jenis Pariwisata</option>
            @foreach ($type_tour as $item)
            <option value="{{ $item->id }}" {{ $tour->type_tour_id == $item->id ? 'selected' : '' }}>{{
              $item->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="mb-3 row align-items-center">
        <label for="username" class="form-label fw-semibold col-sm-3 col-form-label">Nama
          Pemilik Pariwisata</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="username" name="username" placeholder="Nama Pemilik Wisata"
            required value="{{ $tour->user['username']}}">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="mb-3 row align-items-center">
            <label for="email" class="form-label fw-semibold col-sm-3 col-form-label">Email: </label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required
                value="{{ $tour->user['email']}}">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="mb-3 row align-items-center">
            <label for="phone" class="form-label fw-semibold col-sm-3 col-form-label">Nomor Telepon</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Nomor Telepon" required
                value="{{ $tour->user['phone']}}">
            </div>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="row">
            <label for="adult" class="form-label fw-semibold col-sm-3 col-form-label">
              Biaya Tiket</label>
            <div class="col-sm-4 mb-3">
              <input type="text" class="form-control" id="adult" name="adult" placeholder="Dewasa" required
                value="{{ $tour->costTour[0]['price']}}">
            </div>
            <div class="col-sm-1">
              <label for="child" class="form-label col-form-label">Anak: </label>
            </div>
            <div class="col-sm-4 mb-3">
              <input type="text" class="form-control" id="child" name="child" placeholder="Anak-Anak" required
                value="{{ $tour->costTour[1]['price']}}">
            </div>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="row">
            <label for="duration" class="form-label fw-semibold col-sm-3 col-form-label">
              Lama Berkunjung</label>
            <div class="col-sm-4 mb-3">
              <input type="text" class="form-control" id="duration" name="duration" placeholder="Contoh. 1" required
                value="{{ $tour->duration}}">
            </div>
            <div class="col-sm-1">
              <label for="unit_duration" class="form-label col-form-label">Satuan: </label>
            </div>
            <div class="col-sm-4 mb-3">
              <select name="unit_duration" id="unit_duration" class="form-select select2" required>
                <option value="Menit" {{ $tour->unit_duration == 'Menit' ? 'selected' : '' }}>Menit</option>
                <option value="Jam" {{ $tour->unit_duration == 'Jam' ? 'selected' : '' }}>Jam</option>
                <option value="Hari" {{ $tour->unit_duration == 'Hari' ? 'selected' : '' }}>Hari</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3 row align-items-center">
        <label for="cover_image" class="form-label fw-semibold col-sm-3 col-form-label">Cover Image:
        </label>
        <div class="col-sm-9">
          <div class="input-group border rounded-1">
            <input type="file" class="form-control" id="cover_image" name="cover_image">
          </div>
        </div>
      </div>
      <div class="mb-3 row align-items-center">
        <label for="imageGalleries{{time()}}" class="form-label fw-semibold col-sm-3 col-form-label">Gambar Galeri:
        </label>
        <div class="col-sm-9">
          <div class="input-group border rounded-1">
            <input type="file" name="imageGalleries[]" id="imageGalleries{{time()}}" class="form-control">
            <button class="btn btn-primary" type="button" id="add-image-galleries">
              <i class="bx bx-plus"></i>Tambah</button>
          </div>
        </div>
      </div>
      <div id="image-galleries"></div>
      <div class="mb-3 row align-items-center">
        <label for="map_location" class="form-label fw-semibold col-sm-3 col-form-label">Lokasi Map:
        </label>
        <div class="col-sm-9">
          <input type="text" class="form-control" placeholder="Lokasi Map" id="map_location" name="map_location"
            required value="{{ $tour->map_location}}">
          <small>
            Lokasi bisa diambil dari google maps, lalu copy paste ke sini
          </small>
        </div>
      </div>
      <div class="mb-3 row align-items-center">
        <label for="district" class="form-label fw-semibold col-sm-3 col-form-label">Kabupaten:
        </label>
        <div class="col-sm-9">
          <select name="district" id="district" class="form-select select2" required>
            <option value="">Pilih Kabupaten</option>
            <option value="Sumenep" {{ $tour->district == 'Sumenep' ? 'selected' : '' }}>Sumenep</option>
            <option value="Pamekasan" {{ $tour->district == 'Pamekasan' ? 'selected' : '' }}>Pamekasan</option>
            <option value="Sampang" {{ $tour->district == 'Sampang' ? 'selected' : '' }}>Sampang</option>
            <option value="Bangkalan" {{ $tour->district == 'Bangkalan' ? 'selected' : '' }}>Bangkalan</option>
          </select>
        </div>
      </div>

      <div class="mb-3 row align-items-center">
        <label for="address" class="form-label fw-semibold col-sm-3 col-form-label">Alamat
          Lengkap</label>
        <div class="col-sm-9">
          <textarea class="form-control" id="address" name="address" rows="10">{{ $tour->address }}</textarea>
        </div>
      </div>

      <div class="mb-3 row align-items-center">
        <label for="editor" class="form-label fw-semibold col-sm-3 col-form-label">Deskripsi</label>
        <div class="col-sm-9">
          <textarea class="form-control" id="editor" name="description" rows="10">
                    {{ $tour->description }}
                  </textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
          <button class="btn btn-primary" type="submit"><i class="bx bx-send"></i>Simpan</button>
        </div>
      </div>
    </form>
    @if($tour->gallery->count() > 0)
    <div class="row mt-5 mb-3">
      <div class="col-md-12">
        <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>Galeri</h5>

        <div class="row">
          @foreach ($tour->gallery as $item)

          <div class="col-md-4">
            <div class="card">
              <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-6">
                  <h6 class="mb-0 fw-semibold fs-4 mb-0">#{{ $loop->iteration }}</h6>
                  <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-delete"
                      onclick="deleteImage({{ $item->id }})"></i></a>
                </div>
                <img src="{{ asset('storage/'.$item->url) }}" alt=""
                  class="img-fluid rounded-4 w-100 object-fit-cover mb-4" style="height: 160px;">
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection

@section('script')
<script>
  function deleteImage(id) {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Gambar akan dihapus secara permanen!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#536de6',
      cancelButtonColor: '#fc544b',
      confirmButtonText: 'Ya, Hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = '/admin/galeri/delete/' + id;
      }
    })
  }
</script>

