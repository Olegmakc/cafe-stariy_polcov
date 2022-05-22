<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&family=Roboto:wght@400;500;700&display=swap;subset=cyrillic"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/admin/admin.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
</head>

<body>
    <div class="wrapper">
        @include('layouts.header')
        <main class="page">
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="/js/main.min.js"></script>
    <script src="/js/app.js"></script>
</body>

</html>
