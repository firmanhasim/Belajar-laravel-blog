@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h3">Edit Category Baru</h3>
    </div>

    <div class="col-lg-8">
        <form class="mb-4" method="post" action="/dashboard/categoryes/{{ $category->slug }}">
            @csrf
            {{-- disini action kita mengarah ke rautes yang otomatis mengarah ke controler method create karena kita melakukan cotrorel menggunakan resource --}}
            <div class="mb-3">
                <label for="name" class="form-label">Category</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required
                    autofocus value="{{ old('name', $category->name) }}">
                {{-- old name agar tulisannya tidak terhapus jika terjadi kesalahan dan kita akan tampilkan ini jika ada kesalahan namenya maka kita tampilkan informasi dibawah ini dan harus $massage karena bawaan dari laravel --}}
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required
                    value="{{ old('slug', $category->slug) }}">
                {{-- untuk menampilkan data validasi --}}
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Buat Category</button>
        </form>
    </div>

    <script>
        // disini kitamakan mengambil kedua inputan di atas berdasarkan id dengan membuat variable const
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        // kemudian disini kita buat addevent untuk menangani ketika yanf dituliskan kedalam name itu berubah pada inputan slugnya
        name.addEventListener('change', function() {
            fetch('/dashboard/categoryes/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>

@endsection
