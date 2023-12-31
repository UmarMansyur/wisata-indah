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
        <form action="{{ route('Ganti Order',$data->id) }}" method="POST">
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
                      <th colspan="2" id="total-price"> Rp. 0</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary float-end" id="btn-checkout">
                <i class="ti ti-sebd"></i> Simpan
              </button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection