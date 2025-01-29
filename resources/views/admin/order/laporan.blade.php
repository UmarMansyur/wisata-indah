@extends('layout.admin.main')
@section('content')

<div class="row">
  <!-- Filter Section -->
  <div class="col-12 mb-4">
    <div class="card">
      <div class="card-body">
        
        <div class="row">
          <div class="col-auto">
            <select name="tahun" id="tahun" class="form-select">
              @foreach ($tahun as $item)
                <option value="{{ $item->year }}" {{ request('tahun') == $item->year ? 'selected' : '' }}>
                  {{ $item->year }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="col-auto">
            <select name="bulan" id="bulan" class="form-select">
              @php
                $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
              @endphp
              @foreach ($bulan as $index => $nama)
                <option value="{{ $index + 1 }}" {{ request('bulan') == ($index + 1) ? 'selected' : '' }}>
                  {{ $nama }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 mb-4">
    <div class="row justify-content-center">
      <!-- Total Pendapatan -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Pendapatan</h5>
            <h3 class="text-primary"><span id="total-pendapatan">0</span></h3>
          </div>
        </div>
      </div>
      
      <!-- Jumlah Transaksi -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Jumlah Transaksi</h5>
            <h3 class="text-success">0</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Table Section -->
  <div class="col-12 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table border table-striped table-bordered text-nowrap" id="table">
            <thead>
              <tr>
                <th>Nama Customer</th>
                <th>Tanggal Destinasi</th>
                <th>Tanggal Pemesanan</th>
                <th class="text-center">Status</th>
                <th class="text-end">Total Biaya</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Yearly Chart Section -->
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Grafik Pendapatan Tahunan</h5>
        <div style="height: 300px; width: 100%;">
          <canvas id="yearlyChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- Summary Cards -->

</div>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  $(function () {
    let table = $('#table').DataTable({
      serverSide: true,
      processing: true,
      ajax: {
        url: "{{ route('Data Pemesanan') }}",
        data: function(d) {
          d.bulan = $('#bulan').val();
          d.tahun = $('#tahun').val();
        }
      },
      columns: [
        {
          data: 'name',
          name: 'name'
        },
        {
          data: 'date',
          name: 'date'
        },
        {
          data: 'created_at',
          name: 'created_at'
        },
        {
          data: 'status',
          name: 'status',
          class: 'text-center'
        },
        {
          data: 'total_price',
          name: 'total_price',
          class: 'text-end'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false,
          class: 'text-center'
        },
      ],
      language: {
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ data",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
        "sInfoFiltered": "(disaring dari _MAX_ data keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      },
    });

    function updateStats() {
      $.ajax({
        url: "{{ route('get.stats') }}",
        data: {
          bulan: $('#bulan').val(),
          tahun: $('#tahun').val()
        },
        success: function(response) {
          $('#total-pendapatan').text(response.total);
          $('.text-success').text(response.jumlahTransaksi);
          
          let statusHtml = '';
          response.statusStats.forEach(function(stat) {
            let badgeClass = stat.status == 'Selesai' ? 'success' : 
              (stat.status == 'Disetujui' ? 'info' : 
              (stat.status == 'Ditolak' ? 'danger' : 'warning'));
            
            statusHtml += `
              <div class="d-flex justify-content-between mb-1">
                <span>${stat.status}</span>
                <span class="badge bg-${badgeClass}">${stat.total}</span>
              </div>
            `;
          });
          $('#status-stats').html(statusHtml);
        }
      });
    }

    $('#tahun, #bulan').on('change', function() {
      table.ajax.reload();
      updateStats();
    });

    // Setup data untuk chart
    const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                       'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    
    const monthlyData = @json($monthlyData);
    const totals = Object.values(monthlyData).map(item => item.total);
    const transactions = Object.values(monthlyData).map(item => item.count);

    // Inisialisasi chart
    const ctx = document.getElementById('yearlyChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthNames,
            datasets: [{
                label: 'Total Pendapatan (Rp)',
                data: totals,
                backgroundColor: 'rgba(83, 109, 230, 0.5)',
                borderColor: 'rgb(83, 109, 230)',
                borderWidth: 1
            }, {
                label: 'Jumlah Transaksi',
                data: transactions,
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgb(75, 192, 192)',
                borderWidth: 1,
                yAxisID: 'y1'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    position: 'left',
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                        }
                    }
                },
                y1: {
                    beginAtZero: true,
                    position: 'right',
                    grid: {
                        drawOnChartArea: false
                    }
                }
            }
        }
    });
  });

  function confirmDelete(id) {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data yang dihapus tidak dapat dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#536de6',
      cancelButtonColor: '#fc544b',
      confirmButtonText: 'Ya, Hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/admin/pemesanan/delete/" + id;
      }
    })
  }
</script>
@endpush

@endsection