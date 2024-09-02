<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Riwayat</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
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
            <!-- <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
          </a> -->
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
                <h5 class="card-title fw-semibold mb-4">Tabel Report Detail</h5>
                <div class="table-responsive">
                  <table id="myTable" class="table table-striped text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Tanggal</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Jam Masuk</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Jam Keluar</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Jam Lembur</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nominal</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($presensis as $presensi)
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal">{{ $presensi->date }}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal">{{ $presensi->time_in }}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{ $presensi->time_out }}</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{ $presensi->overtime_hours }} hours</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">Rp {{ number_format($presensi->overtime_payment, 0, ',', '.') }}</p>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <a type="button" class="btn-right btn-outline-primary m-1" onclick="exportTableToExcel('myTable')">
            Download
          </a>
        </div>
      </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script>
      function exportTableToExcel(tableId, filename = '') {
        let table = document.getElementById(tableId);
        let workbook = XLSX.utils.table_to_book(table, {
          sheet: "Sheet1"
        });
        let excelBuffer = XLSX.write(workbook, {
          bookType: 'xlsx',
          type: 'array'
        });
        let data = new Blob([excelBuffer], {
          type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8'
        });
        let url = window.URL.createObjectURL(data);
        let a = document.createElement('a');
        a.href = url;
        a.download = filename ? filename + '.xlsx' : 'Data Lembur.xlsx';
        document.body.appendChild(a);
        a.click();
        a.remove();
        window.URL.revokeObjectURL(url);
      }
    </script>
</body>

</html>