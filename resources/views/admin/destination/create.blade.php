@extends('layout.admin.main')
@section('content')
<div class="row">
  <div class="col-md-12 text-end mb-3">
    <button class="btn btn-light"><i class="bx bx-arrow-back"></i>Kembali</button>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <form action="">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body p-4">
              <div class="mb-3 row align-items-center">
                <label for="destination_name" class="form-label fw-semibold col-sm-3 col-form-label">Nama
                  Pariwisata</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="destination_name" placeholder="Contoh: Pantai Gili">
                </div>
              </div>

              <div class="mb-3 row align-items-center">
                <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Jenis
                  Pariwisata</label>
                <div class="col-sm-9">
                  <select name="type_destination" id="type_destination" class="form-select select2">
                    <option value="">Pantai</option>
                    <option value="">Pegunungan</option>
                  </select>

                </div>
              </div>
              <div class="mb-3 row align-items-center">
                <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Nama
                  Pemilik Pariwisata</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="exampleInputtext" placeholder="Nama Pemilik Wisata">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3 row align-items-center">
                    <label for="exampleInputPassword1"
                      class="form-label fw-semibold col-sm-3 col-form-label">Email: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="exampleInputtext" placeholder="Email">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3 row align-items-center">
                    <label for="exampleInputPassword1"
                      class="form-label fw-semibold col-sm-3 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="exampleInputtext" placeholder="Nomor Telepon">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-md-12">
                  <div class="row">
                    <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">
                      Biaya Tiket</label>
                    <div class="col-sm-4 mb-3">
                      <input type="text" class="form-control" id="exampleInputtext" placeholder="Rp. xxx.xxx">
                    </div>
                    <div class="col-sm-1">
                      <label for="satuan" class="form-label col-form-label">Anak: </label>
                    </div>

                    <div class="col-sm-4 mb-3">
                      <input type="text" class="form-control" id="exampleInputtext" placeholder="Rp. xxx.xxx">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-md-12">
                  <div class="row">
                    <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">
                      Lama Berkunjung</label>
                    <div class="col-sm-4 mb-3">
                      <input type="text" class="form-control" id="exampleInputtext" placeholder="Contoh. 1">
                    </div>
                    <div class="col-sm-1">
                      <label for="satuan" class="form-label col-form-label">Satuan: </label>
                    </div>
                    <div class="col-sm-4 mb-3">
                      <select name="type_time" id="type_time" class="form-select select2">
                        <option value="">Menit</option>
                        <option value="">Jam</option>
                        <option value="">Hari</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-3 row align-items-center">
                <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Cover Image:
                </label>
                <div class="col-sm-9">
                  <div class="input-group border rounded-1">
                    <input type="file" class="form-control" placeholder="John Deo">
                  </div>
                </div>
              </div>
              <div class="mb-3 row align-items-center">
                <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Gambar Galeri:
                </label>
                <div class="col-sm-9">
                  <div class="input-group border rounded-1">
                    <input type="file" name="imageGalleries[]" class="form-control" placeholder="John Deo">
                    <button class="btn btn-primary" type="button" id="add-image-galleries">
                      <i class="bx bx-plus"></i>Tambah</button>
                  </div>
                </div>
              </div>
              <div id="image-galleries"></div>
              <div class="mb-3 row align-items-center">
                <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Lokasi Map:
                </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="Lokasi Map">
                  <small>
                    Lokasi bisa diambil dari google maps, lalu copy paste ke sini
                  </small>
                </div>
              </div>
              <div class="mb-3 row align-items-center">
                <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Kabupaten:
                </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="Kabupaten">
                 
                </div>
              </div>

              <div class="mb-3 row align-items-center">
                <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label">Alamat
                  Lengkap</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                </div>
              </div>

              <div class="mb-3 row align-items-center">
                <label for="exampleInputPassword1"
                  class="form-label fw-semibold col-sm-3 col-form-label">Deskripsi</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="editor" rows="10"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                  <button class="btn btn-primary"><i class="bx bx-plus"></i>Tambahkan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection