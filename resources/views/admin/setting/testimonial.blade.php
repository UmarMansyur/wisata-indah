@extends('layout.admin.main')
@section('content')
<div class="widget-content searchable-container list">
  <div class="card card-body">
    <div class="row">
      <div class="col-md-4 col-xl-3">
        <form class="d-flex" action="{{ route('about')}}" method="GET" autocomplete="off">
          <div class="input-group">
            <input type="search" class="form-control" id="search-input" placeholder="Cari Testimonial" name="search"
              autocomplete="off" value="{{ request()->get('search') }}">
            <button class="btn btn-light" type="submit" id="btn-search">
              <i class="ti ti-search"></i>
            </button>
          </div>
        </form>
      </div>
      <div class="col-md-8 col-xl-9 text-end">
        <button data-bs-target="#modalEmploye" id="btn-add-contact" onclick="addClick()" class="btn btn-info"
          data-bs-toggle="modal">
          <i class="ti ti-plus text-white me-1"></i> Tambah Testimonial
        </button>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalEmploye" tabindex="-1" aria-labelledby="addContactModalTitle" aria-hidden="true"
    style="display: none;">
    <form action="{{ route('Simpan Testimonial') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header d-flex align-items-center">
            <h5 class="modal-title">Testimonial</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="add-contact-box">
              <div class="add-contact-content">
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle mx-auto"
                      style="width: 110px; height: 110px;">
                      <div
                        class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                        style="width: 100px; height: 100px;" ;="">
                        <img src="" alt="" class="w-100 h-100" id="profile-img">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3 contact-name">
                      <label for="c-name" class="form-label">Nama: </label>
                      <input type="hidden" name="user_id" id="user_id">
                      <input type="text" id="c-name" class="form-control" placeholder="Name" name="username" required>
                      <span class="validation-text text-danger" style="display: none;"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3 contact-email">
                      <label for="c-email" class="form-label">Rating: </label>
                      <select class="form-select" aria-label="Default select example" name="rate" id="c-rate" required>
                        <option selected>Pilih Rating</option>
                        <option value="1">🌟</option>
                        <option value="2">🌟🌟</option>
                        <option value="3">🌟🌟🌟</option>
                        <option value="4">🌟🌟🌟🌟</option>
                        <option value="5">🌟🌟🌟🌟🌟</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="mb-3 contact-phone">
                      <label for="c-comment" class="form-label">Komentar: </label>
                      <textarea class="form-control" id="c-comment" rows="10" name="comment" required></textarea>
                      <span class="validation-text text-danger" style="display: none;"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="c-thumbnail" class="form-label">Foto: </label>
                      <input type="file" id="c-thumbnail" class="form-control" placeholder="thumbnail" name="thumbnail">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button id="btn-add" class="btn btn-primary rounded-pill px-4" style="display: none;"><i
                class="bx bx-send"></i> Tambah</button>
            <button class="btn btn-primary rounded-pill px-4" id="btn-edit" type="submit"><i class="bx bx-send"></i>
              Save</button>
            <button class="btn btn-danger rounded-pill px-4" type="button" data-bs-dismiss="modal"><i
                class="bx bx-x"></i> Batal
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="card card-body">
    <table class="table search-table align-middle text-nowrap">
      <thead class="header-item">
        <tr>
          <th>Nama</th>
          <th>Rate</th>
          <th>Komentar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($testi as $item)
        <tr class="search-items">
          <td>
            <div class="d-flex align-items-center">
              @if(file_exists(storage_path('app/public/'.$item->thumbnail)))
              <img src="{{asset('storage/'.$item->thumbnail)}}" alt="avatar" class="rounded-circle" width="35">
              @else
              <img src="{{$item->thumbnail}}" alt="avatar" class="rounded-circle" width="35">
              @endif
              <div class="ms-3">
                <div class="user-meta-info">
                  <h6 class="user-name mb-0" data-name="Emma Adams">{{$item->name}}</h6>
                </div>
              </div>
            </div>
          </td>
          <td>
            <span class="usr-email-addr" data-email="adams@mail.com">
              @if($item->rate == 1)
              🌟
              @elseif($item->rate == 2)
              🌟🌟
              @elseif($item->rate == 3)
              🌟🌟🌟
              @elseif($item->rate == 4)
              🌟🌟🌟🌟
              @elseif($item->rate == 5)
              🌟🌟🌟🌟🌟
              @endif
            </span>
          </td>
          <td>
            <span class="usr-location" data-location="Boston, USA">{{ $item->comment }}</span>
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
    <div class="row">
      <div class="col-12">
        {{ $testi->links('vendor.pagination.bootstrap-5') }}

      </div>
    </div>
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
        window.location = '/admin/setting/testimonial/delete/' + id;
      }
    })
  }

  function editClick(data) {
    console.log(data);
    $('#btn-add').hide();
    $('#btn-edit').show();
    $('#c-name').val(data.name);
    $('#c-rate').val(data.rate);
    $('#c-comment').val(data.comment);
    $('#profile-img').attr('src', '{{asset('storage')}}/' + data.thumbnail);
    $('#user_id').val(data.id);
  }

  function addClick() {
    $('#btn-add').show();
    $('#btn-edit').hide();
    $('#c-name').val('');
    $('#c-rate').val('');
    $('#c-comment').val('');
    $('#profile-img').attr('src', '');
  }
</script>