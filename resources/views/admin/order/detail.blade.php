@extends('layout.admin.main')
@section('content')
<div class="row">
  <div class="col-12 text-end">
    <a href="{{ route('Pemesanan') }}" class="btn btn-light me-2">
      <i class="bx bx-arrow-back"></i> Kembali
    </a>
  </div>
</div>
<div class="row" id="printableArea">
  <div class="col-12">
    <div class="invoiceing-box">
      <div class="invoice-header d-flex align-items-center border-bottom p-3">
        <h4 class="font-medium text-uppercase mb-0">Detail Pemesanan</h4>
        <div class="ms-auto">
          <h4 class="invoice-number text-end">#{{ $data->id }}</h4>
          <h6 class="text-end">{{ date('d F Y', strtotime($data->created_at)) }}</h6>
        </div>
      </div>
      <div class="p-3" id="custom-invoice" style="display: block;">
        <div class="invoice-123" id="printableArea" style="display: block;">
          <div class="row pt-3">
            <div class="col-md-6">
              <div class="">
                <address>
                  <h6 class="fw-bold">&nbsp;{{ $data->user->username }}</h6>
                  <p class="ms-1 mb-0">
                    {{ $data->user->address }}
                  </p>
                  <p class="ms-1 mb-0">
                    {{ $data->user->phone }}
                  </p>
                  <p class="ms-1 mb-0">
                    {{ $data->user->email }}
                  </p>

                </address>
              </div>
            </div>
            <div class="col-md-6">
              <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-20 float-end">
            </div>
            <div class="col-md-12">
              <div class="table-responsive mt-5" style="clear: both">
                <table class="table table-hover">
                  <thead>
                    <!-- start row -->
                    <tr>
                      <th class="text-center">#</th>
                      <th>Tujuan Destinasi</th>
                      <th class="text-end">Kategori Wisatawan</th>
                      <th class="text-end">Jumlah</th>
                      <th class="text-end">Total</th>
                    </tr>
                    <!-- end row -->
                  </thead>
                  <tbody>
                    @foreach ($data->detailTransaction as $item)
                    <tr>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td>{{ $item->tour->title }}</td>
                      <td class="text-end">{{ $item->passenger->name }}</td>
                      <td class="text-end">{{ $item->amount }}</td>
                      <td class="text-end">Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <div class="pull-right mt-4 text-end">
                <h3><b>Total :</b> Rp. {{ number_format($data->total_price + ($data->total_price * 0.1), 0, ',', '.') }}</h3>
              </div>
              <div class="clearfix"></div>
              <hr>
              <div class="text-end d-none-print" style="clear: both">
                <button class="btn btn-primary btn-default print-page" type="button" onclick="printDiv()">
                  <span><i class="ti ti-printer fs-5"></i>
                    Print</span>
                </button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
  function printDiv() {
    var printContents = document.getElementById("printableArea").innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
  </script>
@endsection