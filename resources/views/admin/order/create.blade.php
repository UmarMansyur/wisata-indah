@extends('layout.admin.main')
@section('content')
<div class="row mb-3">
  <div class="col-12 text-end">
    <a href="{{ route('Pemesanan') }}" class="btn btn-light me-2">
      <i class="bx bx-arrow-back"></i> Kembali
    </a>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Pemesanan</h5>
        <p class="card-subtitle">Isi form dibawah ini untuk menambahkan data pemesanan. Pastikan data yang anda
          masukkan benar.</p>
        <hr>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="destination" class="form-label d-block">Pariwisata</label>
            <input type="hidden" name="destination_id" id="destination_id">
            <select class="select2 form-select" onchange="getDestination(this.value)" id="destination">
              <option value="">Pilih Pariwisata</option>
              @foreach($destination as $item)
              <option value="{{ $item }}">{{ $item->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="passenger_id" class="form-label d-block">Jenis Wisatawan</label>
            <select class="form-select select2" aria-label="Default select example" onchange="getCostTour(this.value)"
              id="passenger_id" name="passenger_id" disabled>
              <option value="">Pilih Jenis Wisatawan</option>
              @foreach($item->costTour as $item)
              <option value="{{ $item->passenger->id }}">{{ $item->passenger->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label for="amount" class="form-label d-block">Jumlah</label>
            <input type="text" class="form-control" id="amount" name="amount" placeholder="Jumlah"
              onkeyup="getTotalCostTicket(this.value)" disabled>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cost_ticket" class="form-label d-block">Biaya Tiket: </label>
            <div class="input-group">
              <div class="input-group-text">Rp.</div>
              <input type="text" class="form-control" id="cost_ticket" placeholder="0" readonly>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="total_cost_ticket" class="form-label d-block">Total: </label>
            <div class="input-group">
              <div class="input-group-text">Rp.</div>
              <input type="text" class="form-control" id="total_cost_ticket" placeholder="0" readonly>
            </div>
          </div>
          <div class="col-md-12 text-end">
            <button class="btn btn-light me-2">
              <i class="bx bx-revision"></i> Reset
            </button>

            <button type="button" class="btn btn-info" id="add-cart" onclick="addToCart()">
              <i class="bx bx-cart"></i> Tambah
            </button>
          </div>
        </div>
        <form action="{{ route('Tambah Order') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12 mt-3">
              <div class="table-responsive">
                <table class="table table-bordered fs-2">
                  <thead class="align-middle">
                    <tr>
                      <th class="text-center">No</th>
                      <th>Destinasi Pariwisata</th>
                      <th>Kategori Wisata</th>
                      <th>Kategori Penumpang</th>
                      <th class="text-center">Jumlah</th>
                      <th>Jumlah Biaya</th>
                      <th class="text-center">#</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle" id="table">

                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="5" class="text-end">Total</th>
                      <th colspan="2" id="total-price">Rp. 0</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                data-bs-target="#bs-example-modal-md" id="btn-checkout" disabled>
                <i class="ti ti-send"></i> Checkout
              </button>
              <div id="bs-example-modal-md" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                  <div class="modal-content">
                    <div class="modal-header d-flex align-items-center">
                      <h4 class="modal-title" id="myModalLabel">
                        Checkout
                      </h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label for="date" class="form-label">Tanggal:</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="Tanggal Keberangkatan">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label for="c-phone" class="form-label">Nomor Hp: </label>
                            <input type="text" id="c-phone" class="form-control" placeholder="Nomor Hp" name="phone"
                              required>
                            <span class="validation-text text-danger" style="display: none;"></span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <label for="id-user" class="form-label">Jenis Kelamin: </label>
                            <div class="mb-3">
                              <input type="hidden" id="user_id" name="id">
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                  checked>
                                <label class="form-check-label" for="male">Pria</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">Perempuan</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                                <label class="form-check-label" for="other">Lainnya</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="mb-3 contact-location">
                              <label for="c-location" class="form-label">Alamat: </label>
                              <textarea id="c-location" class="form-control" placeholder="Location" rows="5"
                                name="address"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn bg-primary-subtle text-primary font-medium waves-effect">
                        <i class="ti ti-send"></i> Simpan
                      </button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection