<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>{{ $title }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/6bd86ebf4a.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    @livewireStyles
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
            <a class="nav-link" aria-current="page" href="/dashboard">
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
            <a class="nav-link anak" href="/dashboard/barang">
              <span data-feather="user" class="align-text-bottom ikon"></span>
              List Barang
            </a>
          </li>

          <li class="nav-item anak bg-secondary">
            <a class="nav-link anak" href="/dashboard/user" style="color: white">
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

          <li class="nav-item anak bg-secondary">
            <a class="nav-link" href="/dashboard/slot" style="color: white">
              <span data-feather="bar-chart-2" class="align-text-bottom" style="stroke: white;"></span>
              List Slot
            </a>
          </li>

          <li class="nav-item anak bg-secondary">
            <a class="nav-link" href="/dashboard/size" style="color: white">
              <span data-feather="bar-chart-2" class="align-text-bottom" style="stroke: white;"></span>
              List Size
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/dashboard/ListTransaksi">
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
                <a class="nav-link" href="/dashboard/LaporanKeuntungan">
                  <span data-feather="file-text" class="align-text-bottom"></span>
                  Laporan Keuntungan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/dashboard/LaporanPembelian">
                  <span data-feather="file-text" class="align-text-bottom"></span>
                  Laporan Pembelian
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/dashboard/LaporanPenjualan">
                  <span data-feather="file-text" class="align-text-bottom"></span>
                  Laporan Penjualan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/dashboard/LaporanStokBarang">
                  <span data-feather="file-text" class="align-text-bottom"></span>
                  Laporan Stok barang
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/dashboard/LaporanArusKas">
                  <span data-feather="file-text" class="align-text-bottom"></span>
                  Laporan Arus Kas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/dashboard/LaporanProdukTerlaris">
                  <span data-feather="file-text" class="align-text-bottom"></span>
                  Laporan Produk Terlaris
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/dashboard/LaporanRakitanUser">
                  <span data-feather="file-text" class="align-text-bottom"></span>
                  Laporan Rakitan User
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/dashboard/LaporanProdukTerpopuler">
                  <span data-feather="file-text" class="align-text-bottom"></span>
                  Laporan Produk Terpopuler
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/dashboard/LaporanKepuasanPelanggan">
                  <span data-feather="file-text" class="align-text-bottom"></span>
                  Laporan Kepuasan Pelanggan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text" class="align-text-bottom"></span>
                  Laporan Neraca Keuangan
                </a>
              </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('container')
    </main>
  </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="../../js/dashboard.js"></script>
<script src="../../js/main.js"></script>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script>
    const parent = document.querySelector('#dropdownmaster');
    var anak = document.getElementsByClassName('anak');

    for (let index = 0; index < anak.length; index++) {
        anak[index].style.display = "";
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
@livewireScripts
</body>
</html>
