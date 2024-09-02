<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <p class="text-center">Insentif Counting</p>
                <form method="POST" action="/login">
                  @csrf <!-- CSRF Token -->
                  <div class="container">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                      {{ session('success') }}
                    </div>
                    @endif
                    @if ($errors->has('error'))
                    <div class="alert alert-danger" role="alert">
                      {{ $errors->first('error') }}
                    </div>
                    @endif
                    @if(request()->has('logged_out'))
                    <div class="alert alert-success">
                      You have successfully logged out.
                    </div>
                    @endif
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">NIP</label>
                      <input type="text" name="nip" class="form-control" id="nip" aria-describedby="nipHelp" required>
                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                      <a class="text-primary fw-bold" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Forgot Password ?</a>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-centerr">
                            Hubungi admin untuk merubah password anda!
                          </div>
                          <div class="modal-footer">
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                    <div class="d-flex align-items-center justify-content-center">
                      <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Register</a>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script>
    setTimeout(function() {
      $('.alert').fadeOut('slow');
    }, 2000);
  </script>
</body>

</html>