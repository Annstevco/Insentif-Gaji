<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Riwayat</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
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
                <h5 class="card-title fw-semibold mb-4">Manajemen Akun</h5>
                @if (session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @endif
                @if($users->isEmpty())
                <div class="alert alert-danger" role="alert">
                  No users found
                </div>
                @endif
                <form class="d-flex justify-content-end" action="{{ route('admin-page') }}" method="GET">
                  <div class="input-group" style="width: 500px;">
                    <input type="text" class="form-control" placeholder="Cari Pengguna" name="pencarian">
                    <button class="btn btn-outline-secondary" type="submit">
                      <iconify-icon icon="material-symbols:search"></iconify-icon>
                    </button>
                  </div>
                </form>
                <div class="table-responsive">
                  <table class="table table-striped text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Rank</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Email</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">NIP</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Division</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Detail</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Delete</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal">{{ $user->rank }}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal">{{ $user->name }}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal">{{ $user->email }}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{ $user->nip }}</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{ $user->division }}</p>
                        </td>
                        <td class="border-bottom-0">
                          <a type="button" class="btn btn-outline-primary m-1" href="{{ route('user.riwayat', ['nip' => $user->nip]) }}">
                            <iconify-icon icon="gg:details-more"></iconify-icon><span style="margin-left: 5px;">Detail</span>
                          </a>
                        </td>
                        <td class="border-bottom-0">
                          <form action="{{ route('user.destroy', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger m-1"><iconify-icon icon="material-symbols:delete-outline"></iconify-icon><span style="margin-left: 5px;">Delete</span></button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
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
  <script>
    setTimeout(function() {
      $('.alert').fadeOut('slow');
    }, 2000);
  </script>
</body>

</html>