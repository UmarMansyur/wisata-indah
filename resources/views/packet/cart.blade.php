@extends('layout.landing_page.main')
@section('content')
<div class="modal" tabindex="-1" role="dialog" id="modal-pesan" style="z-index: 10000000">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Checkout</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="row">
            <div class="col-12 mb-3">
              <label for="username" class="form-label">Nama Pemesan: </label>
              <input type="text" class="form-control" id="username" placeholder="Masukkan nama pemesan">
            </div>
            <div class="col-12 mb-3">
              <label for="email" class="form-label">Email: </label>
              <input type="text" class="form-control" id="email" placeholder="Masukkan nama pemesan">
            </div>
            <div class="col-12 mb-3">
              <label for="phone" class="form-label">Nomer Hp: </label>
              <input type="text" class="form-control" id="phone" placeholder="Masukkan nama pemesan">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
<div class="page-breadcrumb-area page-bg" style="background-image: url('images/cover-about.jpg')">
  <!-- <div class="page-overlay"></div> -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-wrapper">
          <div class="page-heading">
            <h3 class="page-title">Keranjang</h3>
          </div>
          <div class="breadcrumb-list">
            <ul>
              <li><a href="/">Home</a></li>
              <li class="active"><a href="#">Keranjang</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-12">

    <div class="cart-container">

      <div class="cart-items"></div>
      <div class="cart-total">
        <p id="total"></p>
      </div>
    </div>
  </div>



  <script>
    // ambil data dari local storage
  let cart = JSON.parse(localStorage.getItem('cart'));
  const html = cart.map(item => {
    if(!item) {
      return `<h1>Cart is empty</h1>`;
    }
    return `
    <div class="cart-item">
        <div class="cart-item-image">
          <img src="{{ asset('storage/'. '${item.image}') }}" alt="" width="300">
        </div>
        <div class="cart-item-details">
          <p class="cart-item-title">${item.name}</p>
          <p class="cart-item-price">${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR'
            }).format(item.price).slice(0, -3)}</p>
          <p class="cart-item-quantity">Quantity: ${item.qty}</p>
          <div>
            <button class="btn btn-light" onClick="remoteItem(${item.id})">
              <i class="text-danger fas fa-trash"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="text-center mt-3">
        <button class="btn btn-lg btn-primary" id="pesan" data-bs-toggle="modal" data-bs-target="#modal-pesan"
        >Checkout</button>
      </div>
    `
  }).join('');

  document.getElementById('total').innerHTML = `Total: ${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(cart.reduce((acc, item) => acc + item.price * item.qty, 0)).slice(0, -3)}`;

  document.querySelector('.cart-items').innerHTML = html;

  function remoteItem(id) {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "anda akan menghapus item ini dari keranjang anda",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Remove'
    }).then((result) => {
      if (result.isConfirmed) {
        cart = cart.filter(item => item.id !== id);
        localStorage.setItem('cart', JSON.stringify(cart));
        location.reload();
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  }

  </script>
  @endsection