{{-- mengarah ke template layout main --}}
@extends('layout.main')

{{-- menangkap key dan kita gunaka milik blade yaitu {{ $name }} sebagai pengganti <php echo $name; > dan akan jalan jika nama file kita menggunakan .blade dan {{  }} sda tersedia htmlspesialchars didalamnya--}}

@section('container')

    <h1>Selamat datang di hlaman About</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img width="10%" src="img/{{ $image }}" alt="{{ $name }}">

@endsection
