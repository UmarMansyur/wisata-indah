@extends('layout.admin.main')
@section('content')

<div class="row">
  <div class="col-12">
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
        <tfoot></tfoot>
      </table>
    </div>
  </div>
</div>
<script>
  $(function () {
    $('#table').DataTable({
      serverSide: true,
      processing: true,
      ajax: "{{ route('Data Pemesanan') }}",
      scrollCollapse: true,

      columns: [{
          data: 'user_id',
          name: 'user_id'
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