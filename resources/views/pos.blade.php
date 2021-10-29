@extends('layout.main')

{{-- halaman detail --}}
@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $post->title }}</h2>

                {{-- untuk menampilkan categorinya bis kita lakukan disini dengan ketiikan {{ $post->category->name }} untuk menampilkan nama categorinya yaitu diambil dari model post untuk categorinya --}}
                <p>By: <a href="/blog?author={{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a> in <a
                        href="/blog?category={{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a></p>
                {{-- a nya kita arahkan ke raoutes kita file web.php --}}

                {{-- disini kita akan melakukan pengecekkan jika gambarnya terisi dan jika tidak terisi kita tampilkan gambar dari unplash --}}
                @if ($post->image)
                    <img style="height: 300px" src="{{ asset('storage/' . $post->image) }}" class="card-img-top mb-3"
                        alt="{{ $post->category->name }}">
                    {{-- {{ asset('storage/' . $post->image) }} kita arahkan memang di asset kemudian kita masuk folder storage/, dan post-imagenya tidak usah di tulis karena suda kebawa denga post imagenya kedalam database --}}
                @else
                    <img src="https://source.unsplash.com/1100x300?{{ $post->category->name }}" class="card-img-top mb-3"
                        alt="{{ $post->category->name }}">
                @endif

                <article>
                    {!! $post->body !!} {{-- kita gunakan {!!  !!}  untuk dapat memasukkan script HTML untuk melakukan ini harus hati hati dan pastikan inputan yang dilakukan itu tidak aneh aneh dari scrip jahat karena untuk halamn blog jdi tidak apa apa --}}
                </article>

                <a href="/blog">Back To Blog</a>
            </div>
        </div>
    </div>
@endsection
