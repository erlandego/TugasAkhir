<!doctype html>
<html lang="en">
    @php $ctr = 1; $ctruser = 1 @endphp
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>{{ $title }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home" class="align-text-bottom"></span>
              Home
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#" id="dropdownmaster">
                <span data-feather="menu" class="align-text-bottom"></span>
                Master
                <span data-feather="chevron-down" class="align-text-bottom"></span>
            </a>
          </li>

          <li class="nav-item anak bg-secondary">
            <a class="nav-link" href="/dashboard/barang" style="color: white">
              <span data-feather="user" class="align-text-bottom" style="stroke: white;"></span>
              List Barang
            </a>
          </li>

          <li class="nav-item anak bg-secondary">
            <a class="nav-link" href="/dashboard/user" style="color: white">
              <span data-feather="shopping-cart" class="align-text-bottom" style="stroke: white;"></span>
              List User
            </a>
          </li>

          <li class="nav-item anak bg-secondary">
            <a class="nav-link" href="/dashboard/socket" style="color: white">
              <span data-feather="users" class="align-text-bottom" style="stroke: white;"></span>
              List Socket
            </a>
          </li>

          <li class="nav-item anak bg-secondary">
            <a class="nav-link" href="/dashboard/merk" style="color: white">
              <span data-feather="bar-chart-2" class="align-text-bottom" style="stroke: white;"></span>
              List Merk
            </a>
          </li>

          <li class="nav-item anak bg-secondary">
            <a class="nav-link" href="/dashboard/category" style="color: white">
              <span data-feather="bar-chart-2" class="align-text-bottom" style="stroke: white;"></span>
              List Category
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers" class="align-text-bottom"></span>
              List Transaksi
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
      </div>

      <h4>List Barang</h4>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Harga</th>
              <th scope="col">Stok</th>
              <th scope="col">Category</th>
              <th scope="col">Merk</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($barangs as $item)
            <tr>
              <td>{{ $ctr }}</td>
              <td>{{ $item->nama_barang }}</td>
              <td>{{ number_format($item->harga) }}</td>
              <td>{{ $item->stok }}</td>
              <td>{{ $item->Category->name }}</td>
              <td>{{ $item->Merk->nama_merk }}</td>
              <td>
                <a href="#" class="btn btn-danger">Delete</a>
                <a href="#" class="btn btn-warning">Edit</a>
              </td>
            </tr>
            @php $ctr++ @endphp
            @endforeach
          </tbody>
        </table>
      </div>
      <a class="link link-primary" href="/dashboard/barang">See More...</a>
      <h4 class="mt-5">List User</h4>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Lengkap</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $item)
            <tr>
              <td>{{ $ctruser }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->email }}</td>
              <td>@if($item->is_admin == 1){{ "Admin" }} @else {{ "User" }} @endif</td>
              <td>
                <a href="#" class="btn btn-danger">Delete</a>
                <a href="#" class="btn btn-warning">Edit</a>
              </td>
            </tr>
            @php $ctruser++ @endphp
            @endforeach
          </tbody>
        </table>
      </div>
      <a class="link link-primary" href="/dashboard/user">See More...</a>
    </main>
  </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="../js/dashboard.js"></script>
<script src="../js/main.js"></script>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script>
    const parent = document.querySelector('#dropdownmaster');
    var anak = document.getElementsByClassName('anak');

    for (let index = 0; index < anak.length; index++) {
        anak[index].style.display = "none";
    }

    parent.addEventListener('click' , function(){
        if(anak[0].style.display == "none"){
            for (let index = 0; index < anak.length; index++) {
                anak[index].style.display = "";
            }
        }
        else{
            for (let index = 0; index < anak.length; index++) {
                anak[index].style.display = "none";
            }
        }
    });

</script>
</body>
</html>
