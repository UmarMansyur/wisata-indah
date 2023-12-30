@extends('layout.admin.main')
@section('content')
<div class="widget-content searchable-container list">
  <div class="card card-body">
    <div class="row">
      <div class="col-md-4 col-xl-3">
        <form class="position-relative">
          <input type="text" class="form-control product-search ps-5" id="input-search"
            placeholder="Search Contacts...">
          <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>
      </div>
      <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
        <div class="action-btn show-btn" style="display: none">
          <a href="javascript:void(0)"
            class="delete-multiple bg-danger-subtle btn me-2 text-danger d-flex align-items-center font-medium">
            <i class="ti ti-trash text-danger me-1 fs-5"></i> Delete All Row
          </a>
        </div>
        <button data-bs-target="#modalEmploye" id="btn-add-contact" onclick="addClick()" class="btn btn-info d-flex align-items-center" data-bs-toggle="modal">
          <i class="ti ti-users text-white me-1 fs-5"></i> Tambah Karyawan
        </button>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modalEmploye" tabindex="-1" aria-labelledby="addContactModalTitle" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h5 class="modal-title">Karyawan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="add-contact-box">
            <div class="add-contact-content">
              <form id="addContactModalTitle">
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle mx-auto"
                      style="width: 110px; height: 110px;" >
                      <div
                        class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                        style="width: 100px; height: 100px;" ;="">
                        <img src="" alt="" class="w-100 h-100" id="profile-img">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3 contact-name">
                      <label for="c-name" class="form-label">Nama Karyawan: </label>
                      <input type="text" id="c-name" class="form-control" placeholder="Name">
                      <span class="validation-text text-danger" style="display: none;"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3 contact-email">
                      <label for="c-email" class="form-label">Email: </label>
                      <input type="text" id="c-email" class="form-control" placeholder="Email">
                      <span class="validation-text text-danger" style="display: none;"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="password" class="form-label">Password: </label>
                      <input type="text" id="password" class="form-control" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3 contact-phone">
                      <label for="c-phone" class="form-label">Nomor HP: </label>
                      <input type="text" id="c-phone" class="form-control" placeholder="Phone">
                      <span class="validation-text text-danger" style="display: none;"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="id-user" class="form-label">Jenis Kelamin: </label>
                  <div class="mb-3">
                    <input type="hidden" id="id-user" name="user_id">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="male" value="option1">
                      <label class="form-check-label" for="male">Pria</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="female" value="option1">
                      <label class="form-check-label" for="female">Perempuan</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="other" value="option1">
                      <label class="form-check-label" for="other">Lainnya</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="c-thumbnail" class="form-label">Foto: </label>
                      <input type="file" id="c-thumbnail" class="form-control" placeholder="thumbnail">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="mb-3 contact-location">
                      <label for="c-location" class="form-label">Alamat: </label>
                      <textarea id="c-location" class="form-control" placeholder="Location" rows="5"></textarea>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="btn-add" class="btn btn-primary rounded-pill px-4" style="display: none;"><i class="bx bx-send"></i> Tambah</button>
          <button id="btn-edit" class="btn btn-primary rounded-pill px-4"><i class="bx bx-send"></i> Save</button>
          <button class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal"><i class="bx bx-x"></i> Batal </button>
        </div>
      </div>
    </div>
  </div>
  <div class="card card-body">
    <div class="table-responsive">
      <table class="table search-table align-middle text-nowrap">
        <thead class="header-item">
          <tr>
            <th>
              <div class="n-chk align-self-center text-center">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input primary" id="contact-check-all">
                  <label class="form-check-label" for="contact-check-all"></label>
                  <span class="new-control-indicator"></span>
                </div>
              </div>
            </th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Nomor HP</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($employes as $item)
          <tr class="search-items">
            <td>
              <div class="n-chk align-self-center text-center">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input contact-chkbox primary" id="checkbox1">
                  <label class="form-check-label" for="checkbox1"></label>
                </div>
              </div>
            </td>
            <td>
              <div class="d-flex align-items-center">
                @if(file_exists(storage_path('app/public/'.$item->thumbnail)))
                <img src="{{asset('storage/'.$item->thumbnail)}}" alt="avatar" class="rounded-circle" width="35">
                @else
                <img src="{{$item->thumbnail}}" alt="avatar" class="rounded-circle" width="35">
                @endif
                <div class="ms-3">
                  <div class="user-meta-info">
                    <h6 class="user-name mb-0" data-name="Emma Adams">{{$item->username}}</h6>
                    <span class="user-work fs-3" data-occupation="Web Developer">Administrator</span>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <span class="usr-email-addr" data-email="adams@mail.com">{{$item->email}}</span>
            </td>
            <td>
              <span class="usr-location" data-location="Boston, USA">{{ $item->address }}</span>
            </td>
            <td>
              <span class="usr-ph-no" data-phone="+1 (070) 123-4567">{{ $item->phone }}</span>
            </td>
            <td>
              <div class="action-btn">
                <a href="#modalEmploye" data-bs-toggle="modal" class="text-dark" onclick="editClick({{$item}})">
                  <i class="ti ti-eye fs-5"></i>
                </a>
                <a href="javascript:void(0)" class="text-dark ms-2" onclick="confirmDelete({{$item->id}})">
                  <i class="ti ti-trash fs-5"></i>
                </a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

<script>
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
        window.location = '/admin/karyawan/delete/' + id;
      }
    })
  }

  function editClick(data) {
    $('#btn-add').hide();
    $('#btn-edit').show();
    $('#c-name').val(data.username);
    $('#c-email').val(data.email);
    $('#c-occupation').val(data.address);
    $('#c-phone').val(data.phone);
    $('#c-location').val(data.address);
    $('#profile-img').attr('src', data.thumbnail);
    $('#user_id').val(data.id);
    if(data.gender == 'male') {
      $('#male').attr('checked', true)
    }

    if(data.gender == 'female') {
      $('#female').attr('checked', true)
    }

    if(data.gender == 'other') {
      $('#other').attr('checked', true)
    }
  }

  function addClick() {
    $('#btn-add').show();
    $('#btn-edit').hide();
    $('#c-name').val('');
    $('#c-email').val('');
    $('#c-occupation').val('');
    $('#c-phone').val('');
    $('#c-location').val('');
    $('#profile-img').attr('src', '');
  }

  // function update() {
  //   var name = $('#c-name').val();
  //   var email = $('#c-email').val();
  //   var phone = $('#c-phone').val();
  //   var location = $('#c-location').val();
  //   var thumbnail = $('#c-thumbnail').val();
  //   var password = $('#password').val();
  //   var id = $('#id').val();
  //   var _token = '{{ csrf_token() }}';
  //   $.ajax({
  //     url: '/admin/karyawan/update',
  //     type: 'POST',
  //     data: {
  //       id: id,
  //       name: name,
  //       email: email,
  //       phone: phone,
  //       location: location,
  //       thumbnail: thumbnail,
  //       password: password,
  //       _token: _token
  //     },
  //     success: function (data) {
  //       if (data.code == 200) {
  //         Swal.fire({
  //           title: 'Berhasil!',
  //           text: data.message,
  //           icon: 'success',
  //           confirmButtonColor: '#536de6',
  //         }).then((result) => {
  //           if (result.isConfirmed) {
  //             window.location = '/admin/karyawan';
  //           }
  //         })
  //       } else {
  //         Swal.fire({
  //           title: 'Gagal!',
  //           text: data.message,
  //           icon: 'error',
  //           confirmButtonColor: '#536de6',
  //         })
  //       }
  //     }
  //   });

  //   function save() {
  //     var name = $('#c-name').val();
  //     var email = $('#c-email').val();
  //     var phone = $('#c-phone').val();
  //     var location = $('#c-location').val();
  //     var thumbnail = $('#c-thumbnail').val();
  //     var password = $('#password').val();
  //     var _token = '{{ csrf_token() }}';
  //     $.ajax({
  //       url: '/admin/karyawan/save',
  //       type: 'POST',
  //       data: {
  //         name: name,
  //         email: email,
  //         phone: phone,
  //         location: location,
  //         thumbnail: thumbnail,
  //         password: password,
  //         _token: _token
  //       },
  //       success: function (data) {
  //         if (data.code == 200) {
  //           Swal.fire({
  //             title: 'Berhasil!',
  //             text: data.message,
  //             icon: 'success',
  //             confirmButtonColor: '#536de6',
  //           }).then((result) => {
  //             if (result.isConfirmed) {
  //               window.location = '/admin/karyawan';
  //             }
  //           })
  //         } else {
  //           Swal.fire({
  //             title: 'Gagal!',
  //             text: data.message,
  //             icon: 'error',
  //             confirmButtonColor: '#536de6',
  //           })
  //         }
  //       }
  //     });
  // }
</script>
