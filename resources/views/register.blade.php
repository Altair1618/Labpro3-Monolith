<!DOCTYPE html>
  <html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <title>{{ $title }}</title>
  </head>

  <body>
    <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">
                <form class="mx-1 mx-md-4" method="POST" action="{{ route('user.register') }}">
                  @csrf

                  <h2 class="fw-bold">Sign Up</h2>
                    
                  <div class="d-flex flex-row align-items-center mt-5">
                    <input type="text" name="nama" class="form-control form-control-lg" placeholder="Full Name"/>
                  </div>

                  <div class="d-flex flex-row align-items-center mt-4">
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username"/>
                  </div>
                  
                  @if($errors->has('username'))
                    <div class="text-danger">
                      {{ $errors->first('username') }}
                    </div>
                  @endif

                  <div class="d-flex flex-row align-items-center mt-4">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email"/>
                    
                  </div>
                  
                  @if($errors->has('email'))
                    <div class="text-danger text-left">
                      {{ $errors->first('email') }}
                    </div>
                  @endif

                  <div class="d-flex flex-row align-items-center mt-4">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password"/>
                  </div>

                  <button class="btn btn-outline-light btn-lg mt-4 px-5" type="submit">Register</button>
                  
                  <div class="d-flex justify-content-center align-items-center mt-4">
                    <span class="fw-normal">
                      Already have an account?
                      <a href="/login" class="fw-bold text-decoration-none link-white">Sign in</a>
                    </span>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>