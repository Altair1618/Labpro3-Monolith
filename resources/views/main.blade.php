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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="catalog">Monolith App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Katalog") ? 'active' : '' }}" href="/catalog">Katalog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Riwayat") ? 'active' : '' }}" href="/history">Riwayat</a>
            </li>
          </ul>
          
          <div class="dropdown">
            <i class="fa-solid fa-user"></i>
            <button class="btn btn-secondary dropdown-toggle" type="button" id="profileMenuButton" data-bs-toggle="dropdown" style="background-color: transparent; border: none;">
              <i class="fas fa-user" style="padding-right: 5px;"></i> {{ $user->nama }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="profileMenuButton">
              <form method="POST" action="{{ route('auth.logout') }}">
                @csrf
                <li>
                  <button class="dropdown-item" type="submit">Logout</button>
                </li>
              </form>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    
    <div class="container-fluid mt-4">
      @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>