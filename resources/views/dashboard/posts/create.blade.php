@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h3">Tambah Postingan Baru</h3>
    </div>

    <div class="col-lg-8">
        <form class="mb-4" method="post" action="/dashboard/posts" enctype="multipart/form-data">
            @csrf
            {{-- disini action kita mengarah ke rautes yang otomatis mengarah ke controler method create karena kita melakukan cotrorel menggunakan resource --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required
                    autofocus value="{{ old('title') }}">
                {{-- old title agar tulisannya tidak terhapus jika terjadi kesalahan dan kita akan tampilkan ini jika ada kesalahan namenya maka kita tampilkan informasi dibawah ini dan harus $massage karena bawaan dari laravel --}}
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required
                    readonly value="{{ old('slug') }}">
                {{-- untuk menampilkan data validasi --}}
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- kita akan tambahkan disini unutk upload filenya unutk itu kita perlu tambahkan atribut enctype pada form kita --}}
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Postingan</label>

                {{-- nanti gambar yang kita pilih akan kelihatan disini img-fluid agar responsive --}}
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                    onchange="previewImage()">
                {{-- kita akan tambahkan onchange untuk menampilkan gambar yang igin diupload sehingga ketika previewImage() jalan maka gambarnya akan tampil di atas, dan kemudian kita jalannka javascript di bawah --}}

                {{-- untuk menampilkan data validasi, dan unutk image tidak bisa kita tambahkan {{ old('image')  }} --}}
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    {{-- name kita ambil berdasarkan category_id yang berada dalam migrate post kita sebagai forenky agar bisa kita luping dari table category --}}
                    @foreach ($categories as $ct)
                        {{-- disini kita akan lakukan pengkondisian agar ketika terjadi error maka category yan kita pilih tidak berubah --}}
                        @if (old('category_id') == $ct->id) {{-- maka kita tampilkan yang ada slectednya --}}
                            <option value="{{ $ct->id }}" selected>{{ $ct->name }}</option>
                        @else
                            <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
                {{-- unutk body kita akan hanya berikan saka $error karena dya buka bawaan dari html --}}
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Buat Post</button>
        </form>
    </div>

    {{-- disini kita akan buat slugnya agar terisi otomatis berdasarkan title yang diisi unutk itu kita gunakan java script --}}
    <script>
        // disini kitamakan mengambil kedua inputan di atas berdasarkan id dengan membuat variable const
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        // kemudian disini kita buat addevent untuk menangani ketika yanf dituliskan kedalam title itu berubah pada inputan slugnya
        title.addEventListener('change', function() {
            fetch('/dashboard/posts/chekSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        // dan ini untuk memberhentikan tombol upload file yang di hilangkan tadi pda trix editor kita
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });


        // ingat unutk menggunakan kemal keys
        // disini kita akan jalannkan extensi javascriptnya untuk menampilkan gambar dan kita masukkan kedalam function
        function previewImage() { // functionnya diambil dari onchange="previewImage"
            const image = document.querySelector('#image');
            // kemudian kita ambil tag image kosong tdi
            const imgPreview = document.querySelector('.img-preview');

            //style gambarnya kita akan ubah menjadi block
            imgPreview.style.display = 'block';

            // kemudian kita lakukan perintah unutk mengambil gambarnya
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            // kemudian kita load dan kita jalanakan function yang parameternya oFREvent
            oFReader.onload = function(oFREvent) {
                // kemudian imgPreview.srcnya kita isi dengan oFREvent.target
                imgPreview.src = oFREvent.target.result;
            }
        }


        // ket = .img-preview diambil dari class dna juga imgPreview, # dari id
    </script>


@endsection
