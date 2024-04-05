
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Growup CSS -->
    <link rel="stylesheet" href="{{asset('growup.css')}}">
    <!-- AOS Animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- BOX Icons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- ICON -->
    <link rel="shortcut icon" href="{{asset('img/brand/growup-logo.svg')}}" type="image/x-icon">
    <title>Growup</title>
</head>

<body>
    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('img/brand/growup-logo.svg')}}" alt="brand">
                <span>Fakta Integritas</span>
            </a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class='bx bx-menu'></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Product</a>
                    <a class="nav-link" href="{{route('search.index')}}">Tracking Berkas</a>
                    <a class="nav-link" href="#">About</a>
                    <a class="nav-link" href="#">Contatc</a>
                </div>
                <a href="{{ route('login') }}" class="btn btn-primary shadow-none">Login</a>
            </div>
            <br>

        </div>
    </nav>
    <div class="container">
        <div class="col-md-5">
            @include('alert.success')
        </div>
    </div>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copy" data-aos="fade-up" data-aos-duration="3000">
                        <div class="text-label">
                            silahkan daftar kan diri anda
                        </div>
                        <div class="text-hero-bold">
                            Grow Up Your Mind In the future.
                        </div>
                        <div class="text-hero-regular">
                            There are so many variations passages of management Your mindset about bussines in your
                            company or agency
                        </div>
                        <div class="cta">
                            <a href="{{route('regis.create')}}" class="btn btn-secondary shadow-none ms-3">Daftar sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-duration="3000">
                    <img src="{{asset('img/illustration/Hero Image.svg')}}" class="w-100" alt="img">
                </div>
            </div>
        </div>
    </section>
    <!-- Testimoni Brand Setion -->
    <section class="testimoni-brand">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5 mb-5 text-center">
                    <img src="{{asset('img/brand/Testimoni brands.svg')}}" class="w-100" alt="testimoni-brand">
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <script>
        AOS.init();
    </script>
</body>

</html>
