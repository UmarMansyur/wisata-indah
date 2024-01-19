@extends('layout.admin.main')
@section('content')

<div class="row">
  <div class="col-12 mb-3 text-end">
    <a href="{{ route('Tambah Paket Wisata')}}" class="btn btn-primary"><i class="ti ti-plus"></i> Tambah Paket Wisata</a>
  </div>
  <div class="col-12">
    <div class="table-responsive">
      <table class="table table-bordered table-responsive table-hover" id="table">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th>Nama Paket</th>
            <th>Biaya Per Orang</th>
            <th>Minimal Jumlah Pemesan</th>
            <th>Durasi Pariwisata</th>
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
<script>
  $(function () {
    $('#table').DataTable({
      serverSide: true,
      processing: true,
      ajax: "{{ route('Get Data Paket Wisata') }}",
      scrollCollapse: true,
      columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'name', name: 'name'},
        {data: 'price', name: 'price'},
        {data: 'min_person', name: 'min_person'},
        {data: 'duration', name: 'duration'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
      ],
      // ubah bahasa
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
@endsection