@extends('layout.admin.main')
@section('content')

<div class="row justify-content-center">
  <div class="col-12 text-end">
    <a class="btn btn-light" href="{{ Route('Manajamen Paket Wisata') }}">
      <i class="ti ti-arrow-left"></i> Kembali
    </a>
  </div>
  <form action="{{ Route('Simpan Paket Wisata') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-12">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="name" class="form-label">Nama Paket: </label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Paket" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="price" class="form-label">Biaya: </label>
          <div class="input-group">
            <span class="input-group-text">Rp</span>
            <input type="text" name="price" id="price" class="form-control" placeholder="Biaya" required>
            <span class="input-group-text">/Orang</span>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="min_person" class="form-label">Minimal Pengunjung: </label>
          <input type="text" name="min_person" id="min_person" class="form-control" placeholder="Minimal Pengunjung"
            required>
        </div>
        <div class="col-md-3 mb-3">
          <label for="duration" class="form-label">Lama Berkunjung: </label>
          <div class="input-group">
            <input type="text" name="duration" id="duration" class="form-control" placeholder="Lama Berkunjung"
              required>
            <span class="input-group-text">Hari</span>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="cover_image" class="form-label">Cover Image: </label>
          <input type="file" name="cover_image" id="cover_image" class="form-control" accept="image/*" required>
        </div>
      </div>
      <div class="mb-3 row align-items-center">
        <label for="#add-image-destination-galleries{{time()}}" class="form-label">Gambar
          Galeri:
        </label>
        <div class="col-sm-12">
          <div class="input-group border rounded-1">
            <input type="file" name="image-destination-galleries[]" id="image-destination-galleries{{time()}}"
              class="form-control">
            <button class="btn btn-primary" type="button" id="add-image-destination-galleries">
              <i class="bx bx-plus"></i>Tambah</button>
          </div>
        </div>
      </div>
      <div id="image-destination-galleries"></div>
      <div class="row mb-3">
        <div class="col-md-12">
          <h6 class="fw-bold">Destinasi: </h6>
          <label for="" class="d-none"></label>
          <select id="destination_id" class="form-select select2" name="destination_id[]" multiple="multiple" required>
            <option value="">Pilih Destinasi</option>
            @foreach ($tours as $destination)
            <option value="{{ $destination->id }}">{{ $destination->title }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-end">
          <div class="form-check form-switch mb-2 d-inline-block" dir="ltr">
            <input type="checkbox" class="form-check-input" id="is_madura" name="is_madura" value="true">
            <label class="form-check-label" for="is_madura">Luar Madura</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label for="editor" class="form-label">Deskripsi Paket: </label>
            <textarea name="description" id="editor" class="form-control" placeholder="Masukkan Deskripsi Paket"
              rows="10"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <hr>
          <button class="btn btn-primary" type="submit">
            <i class="bx bx-send"></i> Simpan
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection