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
            @if ($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first() }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">
                <form class="mx-1 mx-md-4" method="POST" action="{{ route('auth.login') }}">
                  @csrf
                  
                  <h3 class="fw-bold mb-5">Sign In</h3>
                    
                  <div class="d-flex flex-row align-items-center mb-4">
                    <input type="text" name="identifier" class="form-control form-control-lg" placeholder="Username/Email"/>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password"/>
                  </div>

                  <button class="btn btn-outline-light btn-lg mt-2 px-5" type="submit">Login</button>
                  
                  <div class="d-flex justify-content-center align-items-center mt-4">
                    <span class="fw-normal">
                      Don't have an account?
                      <a href="/register" class="fw-bold text-decoration-none link-white">Sign up</a>
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