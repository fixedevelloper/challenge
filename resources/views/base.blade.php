<!DOCTYPE html>
<html lang="{!! session('locale') !!}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="Q65peJEa0gelkheVOIbosNiHLIkluEI6g17_ir3HzOM" />
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>@yield('title') - {{ env('APP_NAME') }}</title>
    <!-- Favicon img -->
    <link rel="shortcut icon" href="{!! asset('front/images/logo.png') !!}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="{!! asset('front/bootstrap/bootstrap.min.css') !!}">
    @stack('css')
    <link rel="stylesheet" href="{!! asset('front/css/aos.css') !!}">
    <link rel="stylesheet" href="{!! asset('front/css/owl.carousel.css') !!}">
    <link rel="stylesheet" href="{!! asset('front/css/custom.css') !!}">
    <link rel="stylesheet" href="{!! asset('front/css/mobile.css') !!}">


</head>

<body>

<!-- Preloader -->
<div class="loader-mask">
    <div class="loader">
        <div></div>
        <div></div>
    </div>
</div>
<!-- Preloader -->

@include('_partials._header')


    @yield('content')

@include('_partials._footer')

<a id="button"></a>
<!-- js start -->
<script src="{{ asset('front/js/jquery.min.js') }}"></script>
<script src="{{ asset('front/js/popper.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/aos.js') }}"></script>
<script src="{{ asset('front/js/owl.carousel.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>
<script src="a{{ asset('front/js/contact-form.js') }}"></script>
<script src="{{ asset('front/js/jquery.validate.js') }}"></script>
<script>
    AOS.init();
</script>
<script>
    $(window).on('load', function () {
        // Preloader
        $('.loader').fadeOut();
        $('.loader-mask').delay(350).fadeOut('slow');
    });
</script>
<script>
    var btn = $('#button');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        }
        else {
            btn.removeClass('show');
        }
    });
    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '300');
    });
</script>
<script>
    window.document.onkeydown = function (e) {
        if (!e) {
            e = event;
        }
        if (e.keyCode == 27) {
            lightbox_close();
        }
    }

    function lightbox_open() {
        var lightBoxVideo = document.getElementById("VisaChipCardVideo");
        document.getElementById('light').style.display = 'block';
        document.getElementById('fade').style.display = 'block';
        lightBoxVideo.play();
    }

    function lightbox_close() {
        var lightBoxVideo = document.getElementById("VisaChipCardVideo");
        document.getElementById('light').style.display = 'none';
        document.getElementById('fade').style.display = 'none';
        lightBoxVideo.pause();
    }
</script>
<script>
    $(document).ready(function ($) {
        $(".owl-carousel").owlCarousel({
            loop: false,
            margin: 0,
            dots: false,
            nav: true,
            items: 1
        });
        var owl = $(".owl-carousel");
        owl.owlCarousel();
        $(".next-btn").click(function () {
            owl.trigger("next.owl.carousel");
        });
        $(".prev-btn").click(function () {
            owl.trigger("prev.owl.carousel");
        });
        $(".prev-btn").addClass("disabled");
        $(owl).on("translated.owl.carousel", function (event) {
            if ($(".owl-prev").hasClass("disabled")) {
                $(".prev-btn").addClass("disabled");
            } else {
                $(".prev-btn").removeClass("disabled");
            }
            if ($(".owl-next").hasClass("disabled")) {
                $(".next-btn").addClass("disabled");
            } else {
                $(".next-btn").removeClass("disabled");
            }
        });
    });
</script>
</body>

</html>
