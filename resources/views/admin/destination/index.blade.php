@extends('layout.admin.main')
@section('content')
<div class="row">
  <div class="col-12 text-end mb-3">
    <a href="/admin/pariwisata/tambah" class="btn btn-primary">
      <i class="bx bx-plus"></i> Tambah Pariwisata
    </a>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table id="zero_config" class="table table-striped table-bordered text-nowrap font-size-12">
        <thead>
          <tr>
            <th>Nama Pemilik</th>
            <th>Nama Pariwisata</th>
            <th>Alamat</th>
            <th>Kategori</th>
            <th>Durasi</th>
            <th>Biaya Tiket Dewasa</th>
            <th>Biaya Tiket Anak</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>
<script>
  $(function () {
    $('#zero_config').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('Data Pariwisata') !!}',
      columns: [
        { data: 'user_id', name: 'user_id' },
        { data: 'title', name: 'title' },
        { data: 'address', name: 'address' },
        { data: 'type_tour_id', name: 'type_tour_id' },
        { data: 'duration', name: 'duration' },
        { data: 'adult', name: 'adult' },
        { data: 'child', name: 'child' },
        { data: 'action', name: 'action' },
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
      }
    });
  });

  function confirmDelete(id) {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Gambar akan dihapus secara permanen!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#536de6',
      cancelButtonColor: '#fc544b',
      confirmButtonText: 'Ya, Hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        console.log(id);
        window.location = '/admin/pariwisata/delete/' + id;
      }
    })
  }
</script>
@endsection