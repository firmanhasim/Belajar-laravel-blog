{{-- agar memanggil folder layout file main --}}
@extends('layout.main')

@section('container')
    {{-- untuk mengambil array kita luping menggunakan dengan cara --}}
    <h1 class="mb-3 text-center">{{ $title }}</h1> {{-- diambil dari route categories --}}

    {{-- membuat vitur pencarian --}}
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/blog">
                {{-- /blog untuk mengarah ke web route get /blog dan diarahkan ke controler index --}}

                {{-- kita gunakan pengkondisian untuk mengecek pencarian berdasarkan category --}}
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="input-group mb-4 mt-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    {{-- value="{{ request('search') }} agar nama hasil dari pencarian kita tidak hilang --}}
                    <button class="btn btn-danger" type="submit">Search</button>
                    {{-- kemudian kita akan menjalankan pencariannya, dan untuk melakukan ini kita bisa lakukan methot request --}}
                </div>
            </form>
        </div>
    </div>

    {{-- disini kita akan lakukan pengkondisian untuk menampilkan card berdasrkan postingan yang baru dinuat menggunakan count --}}

    @if ($post->count())
        <div class="card mb-3">

            {{-- disini kita akan melakukan pengecekkan jika gambarnya terisi dan jika tidak terisi kita tampilkan gambar dari unplash --}}
            @if ($post[0]->image)
                <img style="height: 400px" src="{{ asset('storage/' . $post[0]->image) }}" class="card-img-top mb-3"
                    alt="{{ $post[0]->category->name }}">
                {{-- {{ asset('storage/' . $post->image) }} kita arahkan memang di asset kemudian kita masuk folder storage/, dan post-imagenya tidak usah di tulis karena suda kebawa denga post imagenya kedalam database --}}
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post[0]->category->name }}" class="card-img-top"
                    alt="{{ $post[0]->category->name }}">
            @endif

            <div class="card-body text-center">
                <h3 class="card-title"><a href="/post/{{ $post[0]->slug }}"
                        class="text-decoration-none text-dark">{{ $post[0]->title }}</a></h3> {{-- untuk judulnya kita ambil jadul yang ada di post dengan index ke 0  sehingga akan menampilkan postinga yang baru --}}
                <small class="text-muted">
                    <p>By: <a href="/blog?author={{ $post[0]->author->username }}" {{-- blog?author= diambil dari name raoutes kita yaitu method default index --}}
                            class="text-decoration-none">{{ $post[0]->author->name }}</a> in
                        <a href="/blog?category={{ $post[0]->category->slug }}" {{-- masi bermasalah kita gunakan post?category= bertujuan unutk mencari postingan berdasarkan category yang dipilih --}}
                            class="text-decoration-none">{{ $post[0]->category->name }}</a>
                        {{ $post[0]->created_at->diffForHumans() }}
                        {{-- {{ $post[0]->created_at->diffForHumans() }} ini suda tersedia di setiap table kita dan kita tambahkan diffForHumans() agar waktu pembuatannya mudah dibaca oleh kita --}}
                    </p>
                    <p class="card-text">{{ $post[0]->detail }}</p>
                    <a href="/post/{{ $post[0]->slug }}" class="text-decoration-none btn btn-primary py-0">Read more</a>
                </small>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($post->skip(1) as $p)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="position-absolute px-3 py-1 text-white" style="background-color: #000.7"><a
                                    href="/blog?category={{ $p->category->slug }}"
                                    class="text-decoration-none text-white">{{ $p->category->name }}</a></div>
                            {{-- disini kita akan melakukan pengecekkan jika gambarnya terisi dan jika tidak terisi kita tampilkan gambar dari unplash --}}
                            @if ($p->image)
                                <img src="{{ asset('storage/' . $p->image) }}" class="card-img-top mb-3"
                                    alt="{{ $p->category->name }}">
                                {{-- {{ asset('storage/' . $p->image) }} kita arahkan memang di asset kemudian kita masuk folder storage/, dan post-imagenya tidak usah di tulis karena suda kebawa denga post imagenya kedalam database --}}
                            @else
                                <img src="https://source.unsplash.com/400x300?{{ $p->category->name }}"
                                    class="card-img-top" alt="...">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $p->title }}</h5>
                                <p>By: <a href="/blog?author={{ $p->author->username }}"
                                        class="text-decoration-none">{{ $p->author->name }}</a>
                                    <a href="/categories/{{ $p->category->slug }}" class="text-decoration-none"></a>
                                    {{-- /categories sebelum menggunakan pemangilan berdasarkan categori dan author --}}
                                    {{ $p->created_at->diffForHumans() }}
                                </p>
                                <p>{{ $p->detail }}</p>
                                <a href="/post/{{ $p->slug }}" class="text-decoration-none btn btn-primary py-0">Read
                                    more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @else {{-- jika tidak ada postingam maka --}}
        <p class="text-center fs-4">No post fount.</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $post->links() }}
    </div>
    {{-- kita akan tambahkan $post link sebagai tampilan bostrap halaman kita dan unutk melakukan ini kita perlu tambahkan method pagination kita yang berada di file Providers file AppServiceProvider --}}

@endsection
