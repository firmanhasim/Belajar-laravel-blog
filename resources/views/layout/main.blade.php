<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    {{-- bootstrap icon untuk memanggil css icon yang di copi dari icon bostrap cdn --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    {{-- untuk style css --}}
    <link rel="stylesheet" href="/css/style.css">

    <title>Halaman || {{ $title }}</title>
</head>

<body>

    {{-- untuk memanggil navbar yang berada di folder partials --}}
    @include('partials.navbar')

    <div class="container mt-4">
        {{-- yield dugunakan untuk mengisi data yang berada di file home dan juga file lain lain, sehingga posisinya berada tepat pada yield container --}}
        @yield('container')
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

</body>

</html>
