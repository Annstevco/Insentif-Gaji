<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Riwayat</title>

  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
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
          <!--  Row 1 -->
          <div class="d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tabel Kelola Insentif</h5>
                <div class="table-responsive">
                  <table class="table table-striped text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Divisi</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Insentif/Jam</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Ubah</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal">1</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal">IT</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">Rp 100.000</p>
                        </td>
                        <td class="border-bottom-0">
                          <!-- Adjusted the monthYear parameter to be the month name -->
                          <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-outline-primary m-1"><iconify-icon icon="ic:baseline-price-change"></iconify-icon><span style="margin-left: 5px;">Ubah</span></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Ubah Insentif</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form method="post">
                          <div class="mb-3">
                            <h6 for="tipe_motor" class="form-label"> Masukkan
                              Nominal Insentif Terbaru </h6>
                            <input type="text" class="form-control" name="tipe_motor" id="tipe_motor" value="Rp " required>
                          </div>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>