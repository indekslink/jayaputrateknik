<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - JAYA PUTRA TEKNIK</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:image" content="https://jayaputrateknik.com/logo2og.png">
    <link rel="stylesheet" href="/dist/css/lightbox.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">
    <link rel="stylesheet" href="/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">
    <link rel="shortcut icon" href="/logo2.png" type="image/x-icon" />
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    @yield('style')


</head>

<body>
    @if(count(getPhone()) > 1)
    <div class="btn-group dropup" style="position:fixed;bottom:12px;left:12px;z-index:99999999999;">
        <button type="button" class="btn btn-success text-light" style="border-radius:10px !important;" data-toggle="dropdown" aria-expanded="false">
            <i class="fab fa-whatsapp fa-2x"></i>
        </button>
        <div class="dropdown-menu">
            @foreach(getPhone() as $p)
            <a class="dropdown-item" target="_blank" href="https://api.whatsapp.com/send?phone={{convertWa($p)}}">{{$p}}</a>
            @endforeach
        </div>
    </div>
    @else
    <a style="position:fixed;bottom:12px;left:12px;z-index:99999999999;border-radius:10px !important;" href="https://api.whatsapp.com/send?phone={{convertWa(getPhone()[0])}}" target="_blank" class="btn btn-success text-light">
        <i class="fab fa-whatsapp fa-2x"></i>
    </a>
    @endif
    <button class="to-top btn btn-primary btn-lg">
        <i class="fas fa-arrow-up"></i>
    </button>

    @include('partials.main.navbar')

    @yield('content')

    @include('partials.main.footer')
    </div>

    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.stellar.min.js"></script>
    <script src="/js/jquery.countdown.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/bootstrap-datepicker.min.js"></script>
    <script src="/js/aos.js"></script>
    <script src="/js/main.js"></script>
    <script src="/dist/js/lightbox-plus-jquery.min.js"></script>

    @yield('script')
</body>

</html>