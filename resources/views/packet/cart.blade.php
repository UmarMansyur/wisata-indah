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
        <form action="{{ route('Pesan') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-12 mb-3">
              <label for="username" class="form-label">Nama Pemesan: </label>
              <input type="hidden" id="packet_id" name="packet_id[]">
              <input type="hidden" name="qty[]" id="qty">
              <input type="hidden" name="total_price">
              <input type="text" class="form-control" id="username" placeholder="Masukkan nama pemesan" name="name"
                required>
            </div>
            <div class="col-12 mb-3">
              <label for="email" class="form-label">Email: </label>
              <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email" required>
            </div>
            <div class="col-12 mb-3">
              <label for="phone" class="form-label">Nomer Hp: </label>
              <input type="text" class="form-control" id="phone" placeholder="Masukkan nomer hp" name="phone" required>
            </div>
            <div class="col-12 mb-3">
              <label for="departure_date" class="form-label">Tanggal: </label>
              <input type="date" class="form-control" id="departure_date" placeholder="Masukkan tanggal"
                name="departure_date" required>
            </div>
          </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary float-end">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="page-breadcrumb-area page-bg" style="background-image: url('images/cover-about.jpg')">
  <!-- <div class="page-overlay"></div> -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
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
<div class="row mt-3 justify-content-center">
  <div class="col-md-10 px-3">
    <h4 id="title-cart">Keranjang</h4>
    <div class="cart-items"></div>
    <div class="cart-total" id="display-cart">
      <h4 id="total"></h4>
    </div>
    <div class="text-end mt-3" id="checkout">
      <button class="btn btn-primary mb-3" id="pesan" data-bs-toggle="modal" onclick="checkout()"
        data-bs-target="#modal-pesan">
        <i class="fas fa-shopping-cart"></i> Checkout sekarang
      </button>
    </div>
  </div>



  <script>
    // ambil data dari local storage
  let cart = JSON.parse(localStorage.getItem('cart'));
  if(cart === null) {
      document.getElementById('checkout').style.display = 'none';
      document.getElementById('display-cart').style.display = 'none';
      document.getElementById('title-cart').innerHTML = 'Keranjang anda kosong';

  } else {
    const html = cart.map(item => {
      return `
      <div class="cart-item">
      <div class="cart-item-image">
        <img src="{{ asset('storage/'. '${item.image}') }}" alt="" width="200px">
      </div>
      <div class="cart-item-details ms-2">
        <p class="cart-item-title mb-0">${item.name}</p>
        <p class="cart-item-price mb-0">${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR'
          }).format(item.price).slice(0, -3)} / Orang</p>
        <p class="cart-item-price mb-0" id="price-${item.id}">
          ${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(item.price * item.qty).slice(0, -3)}
          </p>
        <p class="cart-item-quantity" id="quantity-${item.id}">Jumlah: ${item.qty}</p>
        <div class="row">
          <div class="col-7">
            <input type="number" class="form-control" value="${item.qty}" min="${item.min_person}"
              onChange="changeQty(${item.id}, this.value)">
          </div>
          <div class="col-5">
            <button class="btn btn-light" onClick="remoteItem(${item.id})">
              <i class="text-danger fas fa-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
      `
    }).join('');
    document.getElementById('total').innerHTML = `Total: ${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(cart.reduce((acc, item) => acc + item.price * item.qty, 0)).slice(0, -3)}`;

document.querySelector('.cart-items').innerHTML = html;
  }

  function changeQty(id, qty) {
    cart = cart.map(item => {
      if(item.id === id) {
        item.qty = qty;
        item.total = item.price * item.qty;
      }
      return item;
    });
    localStorage.setItem('cart', JSON.stringify(cart));
    document.getElementById('total').innerHTML = `Total: ${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(cart.reduce((acc, item) => acc + item.price * item.qty, 0)).slice(0, -3)}`;
    document.getElementById(`quantity-${id}`).innerHTML = `Jumlah: ${qty}`;
    document.getElementById(`price-${id}`).innerHTML = `${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(cart.find(item => item.id === id).price * qty).slice(0, -3)}`;
    
  }



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

  const checkout = () => {
    // isi paket_id dengan id paket yang ada di local storage
    const qty = cart.map(item => item.qty);
    const paket_id = cart.map(item => item.id);
    const toal_price = cart.reduce((acc, item) => acc + item.price * item.qty, 0);
    document.getElementsByName('total_price')[0].value = toal_price;
    document.getElementById('packet_id').value = paket_id;
    document.getElementById('qty').value = qty;

    localStorage.removeItem('cart');

  }

  </script>
  @endsection