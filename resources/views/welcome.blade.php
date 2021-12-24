<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <title>WikAbsensi</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
        <img width="50" src="{{ asset('image/logo-wk.png') }}">
        <span class="title-brand">WikAbsensi</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#tentang">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Fitur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Info</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section id="home">
    <div class="container login">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center">
                <img width="350" src="{{ asset('image/illustration.png') }}">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="login-form">
                    <div class="container input-form">
                        <h2 class="login-title">Selamat Datang di WikAbsensi</h2>
                        <p>Silahkan masuk untuk melakukan absensi</p>
                        @if(session()->has('loginFailed'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-times-circle"></i>&nbsp;&nbsp;{{ session('loginFailed') }}
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="/login" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="floatingInput" value="{{ old('username') }}" autocomplete="off">
                                <label for="floatingInput">Username</label>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-3" type="submit"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="tentang">
    <div class="container-fluid about">
        <div class="container content-about">
            <h2 class="text-center mb-4">Tentang</h2>
            <p class="m-0 px-5 mb-5 text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum rem sed expedita tempora officia accusamus iusto odit sunt labore asperiores quia, maiores harum modi itaque amet. Tenetur facere quisquam, maiores repellat blanditiis explicabo excepturi fugit adipisci libero debitis sint eligendi necessitatibus, accusantium iure quo doloribus eaque, voluptatibus perferendis distinctio quibusdam.</p>
            <div class="content-about-image mb-5 d-flex justify-content-center">
                <img src="{{ asset('image/logo-wk.png') }}">
            </div>
            <p class="text-center">- Absensi SMK Wikrama Bogor -</p>
        </div>
    </div>
</section>

    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>