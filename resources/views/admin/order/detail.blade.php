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
                <h6 class="fw-bold">&nbsp;{{ $data->name }}</h6>
                <p class="ms-1 mb-0">
                  {{ $data->phone }}
                </p>
                <p class="ms-1 mb-0">
                  {{ $data->email }}
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-20 float-end">
            </div>
            <div class="col-md-12 text-end">
              <div class="d-none-print mt-5" style="clear: both">
                @if ($data->status == 'Menunggu Konfirmasi')
                <button class="btn btn-danger print-page" type="button" onclick="reject()">
                  <span><i class="ti ti-x fs-5"></i>
                    Tolak</span>
                </button>
                <button class="btn btn-success print-page" type="button" onclick="approve()">
                  <span><i class="ti ti-check fs-5"></i>
                    Setujui</span>
                </button>
                @endif
                @if ($data->status == 'Disetujui')
                <button class="btn btn-info print-page" type="button" onclick="complete()">
                  <span><i class="ti ti-check-double fs-5"></i>
                    Selesai</span>
                </button>
                @endif
                <button class="btn btn-primary btn-default print-page" type="button" onclick="printDiv()">
                  <span><i class="ti ti-printer fs-5"></i>
                  </span>
                </button>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive" style="clear: both">
                <table class="table table-hover">
                  <thead>
                    <!-- start row -->
                    <tr>
                      <th class="text-center">#</th>
                      <th>Paket Wisata</th>
                      <th class="text-end">Jumlah Wisatawan</th>
                      <th class="text-end">Total</th>
                    </tr>
                    <!-- end row -->
                  </thead>
                  <tbody>
                    @foreach ($data->detailTransaction as $item)
                    <tr>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td>{{ $item->destination_packet->name }}</td>
                      <td class="text-end">{{ $item->qty }} Orang</td>
                      <td class="text-end">
                        <div class="d-flex justify-content-end align-items-center">
                          <span class="me-2">Rp.</span>
                          @if($data->status == 'Menunggu Konfirmasi')
                            <input type="number" class="form-control text-end price-input" 
                              style="width: 150px" 
                              value="{{ $item->price }}" 
                              data-id="{{ $item->id }}"
                              onchange="updatePrice(this)">
                          @else
                            <span>{{ number_format($item->price, 0, ',', '.') }}</span>
                          @endif
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <div class="pull-right mt-4 text-end">
                <h3><b>Total :</b> Rp. <span id="totalPrice">{{ number_format($data->total_price, 0, ',', '.') }}</span></h3>
              </div>
              <div class="clearfix"></div>
              <hr>
              @if($data->status == 'Menunggu Konfirmasi')
              <button class="btn btn-warning print-page float-end" type="button" onclick="cancel()">
                <span><i class="ti ti-x fs-5"></i>
                  Batalkan</span>
              </button>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@push('script')
<meta name="csrf-token" content="{{ csrf_token() }}" id="csrf-token">
<script>
  function printDiv() {
    var printContents = document.getElementById("printableArea").innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }

  function approve() {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda akan menyetujui pemesanan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#536de6',
      cancelButtonColor: '#fc544b',
      confirmButtonText: 'Ya!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/admin/pemesanan/detail/approve/" + {{ $data->id }}
      }
    })
  }

  function reject() {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda akan menolak pemesanan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#536de6',
      cancelButtonColor: '#fc544b',
      confirmButtonText: 'Ya!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/admin/pemesanan/detail/reject/" + {{ $data->id }};
      }
    })
  }

  function cancel() {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda akan membatalkan pemesanan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#536de6',
      cancelButtonColor: '#fc544b',
      confirmButtonText: 'Ya!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/admin/pemesanan/detail/cancel/" + {{ $data->id }};
      }
    })
  }

  function updatePrice(element) {
    const id = element.dataset.id;
    const newPrice = element.value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    // Hitung total baru
    let total = 0;
    document.querySelectorAll('.price-input').forEach(input => {
        total += parseInt(input.value) * parseInt(input.closest('tr').querySelector('td:nth-child(3)').textContent.replace(' Orang', ''));
    });
    
    // Update tampilan total
    document.getElementById('totalPrice').textContent = new Intl.NumberFormat('id-ID').format(total);
    
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Anda akan mengubah harga pemesanan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#536de6',
        cancelButtonColor: '#fc544b',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/admin/pemesanan/detail/update-price/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    price: newPrice
                })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    Swal.fire(
                        'Berhasil!',
                        'Harga berhasil diubah.',
                        'success'
                    ).then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat mengubah harga.',
                        'error'
                    );
                }
            });
        }
    });
  }

  function complete() {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda akan menyelesaikan pemesanan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#536de6',
      cancelButtonColor: '#fc544b',
      confirmButtonText: 'Ya!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/admin/pemesanan/detail/complete/" + {{ $data->id }};
      }
    })
  }
</script>
@endpush