@extends('layout.admin.main')
@section('content')
<div class="row">
  <div class="col-md-12 text-end mb-3">
    <a href="{{ route('Pariwisata') }}" class="btn btn-light"><i class="bx bx-arrow-back"></i> Kembali</a>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <form action="{{ route('Simpan Pariwisata') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-lg-12">

          <div class="mb-3 row align-items-center">
            <label for="title" class="form-label fw-semibold col-sm-3 col-form-label">Nama
              Pariwisata</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="title" id="title" placeholder="Contoh: Pantai Gili" required
                autocomplete="name">
            </div>
          </div>

          <div class="mb-3 row align-items-center">
            <label for="type_tour_id" class="form-label fw-semibold col-sm-3 col-form-label">Jenis
              Pariwisata</label>
            <div class="col-sm-9">
              <select id="type_tour_id" class="form-select select2" name="type_tour_id[]" multiple="multiple" required>
                @foreach ($type_tour as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
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
            <label for="imageGalleries{{time()}}" class="form-label fw-semibold col-sm-3 col-form-label">Gambar
              Galeri:
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
              <input type="text" class="form-control" placeholder="Lokasi Map" id="map_location" name="map_location">
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
                <option value="Sumenep">Sumenep</option>
                <option value="Pamekasan">Pamekasan</option>
                <option value="Sampang">Sampang</option>
                <option value="Bangkalan">Bangkalan</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row align-items-center">
            <label for="address" class="form-label fw-semibold col-sm-3 col-form-label">Alamat
              Lengkap</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="address" name="address" rows="10"></textarea>
            </div>
          </div>
          <div class="mb-3 row align-items-center">
            <label for="editor" class="form-label fw-semibold col-sm-3 col-form-label">Deskripsi</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="editor" name="description" rows="10"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
              <button class="btn btn-primary" type="submit"><i class="bx bx-plus"></i>Tambahkan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection