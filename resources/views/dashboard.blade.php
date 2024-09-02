<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100">
      <!-- Sidebar Start -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->

          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 rounded">
                <div class="d-flex">
                  <div class="unlimited-access-title me-3">
                    <h6 class="fw-semibold fs-4 mb-1 text-dark w-85">Rank</h6>
                    @if(isset($hasData) && $hasData)
                    <h6 class="fw-semibold fs-4 mb-1 text-dark w-85">{{ $userRank }}</h6>
                    @else
                    <h6 class="fw-semibold fs-4 mb-1 text-dark w-85">No Data Available</h6>
                    @endif
                  </div>
                </div>
              </div>
              @include('layouts.navbar')
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <div class="body-wrapper">
        <!--  Header Start -->
        <nav class="navbar navbar-expand-lg" style="margin-left: 25px;">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
        </nav>
      </div>

      <!--  Sidebar End -->
      <!--  Main wrapper -->
      <div class="body-wrapper" style="padding-top: calc(70px + 15px);">
        <div class="container-fluid">
          <div class="card">
            @if ($errors->has('error'))
            <div class="alert alert-danger" role="alert">
              {{ $errors->first('error') }}
            </div>
            @endif
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Selamat datang di Sistem Informasi Lembur dan Insentif Pegawai!</h5>
              <p class="mb-0">Di sini, Anda dapat dengan mudah melihat informasi tentang waktu lembur dan insentif yang diterima oleh setiap pegawai. Sistem ini memastikan transparansi dan akurasi dalam pengelolaan data lembur dan insentif, memastikan bahwa setiap pegawai mendapatkan pengakuan yang pantas atas kerja keras mereka.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="body-wrapper">
        <div class="container-fluid " style="margin-bottom: 1px;">
          <div class="card">
            <div id="dashboardCarousel" class="carousel slide" data-bs-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-bs-target="#dashboardCarousel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#dashboardCarousel" data-bs-slide-to="1"></li>
                <li data-bs-target="#dashboardCarousel" data-bs-slide-to="2"></li>
              </ol>

              <!-- Slides -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{ asset('assets/images/slide/slide-1.jpg') }}" style="height: 400px;" class="d-block w-100" alt="Image 1">
                  <div class="carousel-caption d-none d-md-block text-gradient">
                    <p style="margin-top: 250px; margin-left: 25px;">Transparansi gaji karyawan kami adalah hal yang utama.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('assets/images/slide/slide-2.jpg') }}" style="height: 400px;" class="d-block w-100" alt="Image 2">
                  <div class="carousel-caption d-none d-md-block text-gradient">
                    <p style="margin-top: 250px; margin-left: 25px;">Karyawan merupakan aset penting bagi suatu perusahaan agar menjadi lebih sukses kedepannya.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('assets/images/slide/slide-3.jpg') }}" style="height: 400px;" class="d-block w-100" alt="Image 3">
                  <div class="carousel-caption d-none d-md-block text-gradient">
                    <p style="margin-top: 250px; margin-left: 25px;">Semoga sistem ini bisa membantu para karyawan yang ada dalam melihat hasil lembur mereka dengan transparansi yang jelas.</p>
                  </div>
                </div>
              </div>

              <!-- Controls -->
              <a class="carousel-control-prev" href="#dashboardCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next" href="#dashboardCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>