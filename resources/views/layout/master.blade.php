<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/headercart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cta.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('js/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.min.css') }}">

    <title>Tiles Ceramic</title>
    <style>
        #logout {
            display: none;
        }

        .dropdown-menu {
            display: none;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>

<!-- Các thẻ link và meta khác -->

<body>
    @include('layout.header')
    @yield('content')
    @include('layout.footer')

    <script src="{{ asset('js/headerscript.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/footerscript.js') }}"></script>
    <script src="{{ asset('js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('js/price-filter.js') }}"></script>
    <script>
        function removeItemFromCart(rowId) {
            $('#rowId_D').val(rowId);
            $('#deleteFromCart').submit();
        }
    </script>

    @stack('scripts')


</body>

</html>
