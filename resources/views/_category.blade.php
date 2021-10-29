{{-- agar memanggil folder layout file main --}}
@extends('layout.main')

@section('container')
    {{-- untuk mengambil array kita luping menggunakan dengan cara --}}
    <h1>Halaman Post Kategori : {{ $category }}</h1> {{-- diambil dari route categories --}}
    @foreach ($post as $p)
        <article class="mb-3 mt-5">
            <h3>
                <a href="/post/{{ $p->slug }}" class="text-decoration-none">{{ $p->title }}</a> {{-- agar membuat judulnya bisa diketik dan dirahkan dan dapat mengambil data berdasarkan judul slugnya --}}
            </h3> 
            <p>{{ $p->detail }}</p>
        </article>
    @endforeach

@endsection
