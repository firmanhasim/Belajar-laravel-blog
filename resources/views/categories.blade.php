{{-- agar memanggil folder layout file main --}}
@extends('layout.main')

@section('container')
    {{-- untuk mengambil array kita luping menggunakan dengan cara --}}
    <h1 class="mb-5">Post Kategories</h1> {{-- diambil dari route categories --}}

    <div class="container">
        <div class="row">
            @foreach ($categories as $p)
                <div class="col-md-4">
                    <a href="/blog?category={{ $p->slug }}">
                        <div class="card bg-dark text-white">
                            <img src="https://source.unsplash.com/400x300?{{ $p->name }}" class="card-img-top mb-3"
                                alt="{{ $p->name }}">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-3 fs-3"
                                    style="background-color: rgba(0, 0, 0, 0.7)">{{ $p->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


@endsection
