<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Halam || {{ $title }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">


    {{-- ini dari boostrap versi online --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- unutk memnaggil file css kita Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    {{-- trix editor dan jangan lupa kita hubungkan /css/trixt.css begitu pula scriptnya --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    {{-- unutk menghilangkan tombol upload file pada text trix kita --}}
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

    </style>

</head>

<body>


    @include('dashboard.layout.header')

    <div class="container-fluid">
        <div class="row">
            @include('dashboard.layout.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                {{-- yield dugunakan untuk mengisi data yang berada di file home dan juga file lain lain, sehingga posisinya berada tepat pada yield container --}}
                @yield('container')
            </main>
        </div>
    </div>


    {{-- ini juga dari botstrap versi online --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>___scripts_2______scripts_3___

    {{-- unutk memanggik js di dalam foldel js kita --}}
    <script src="/js/dashboard.js"></script>
</body>

</html>
