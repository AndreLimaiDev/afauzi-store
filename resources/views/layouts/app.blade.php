<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <div class="w-full">
        @include('includes.navbar')

        @yield('content')
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const menuToggle = document.getElementById("menu-toggle");
        const dropdownMenu = document.getElementById("dropdown-menu");

        // Event untuk toggle dropdown menu (buka/close)
        menuToggle.addEventListener("click", () => {
          dropdownMenu.classList.toggle("hidden");
        });
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/swiper.js') }}"></script>
</body>

</html>