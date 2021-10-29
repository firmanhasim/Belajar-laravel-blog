@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            {{-- my mengatur jarak atas bawah --}}
            <div class="col-lg-8">
                <h2 class="mb-3">{{ $detail->title }}</h2>

                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
                <a href="/dashboard/posts/{{ $detail->slug }}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span> Edit</a>
                {{-- unutk membuat tombol hapus kita akan gunakan form unutk menggunakan method delete, dan kita akan kirimkan slug kemudian slugnya mencari id dalam controler kita method distroy --}}
                <form action="/dashboard/posts/{{ $detail->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin!')"><span
                            data-feather="x-circle"></span> Hapus</button>
                </form>

                {{-- disini kita akan melakukan pengecekkan jika gambarnya terisi dan jika tidak terisi kita tampilkan gambar dari unplash --}}
                @if ($detail->image)
                    <img style="height: 300px; width: 700px" src="{{ asset('storage/' . $detail->image) }}"
                        class="card-img-top mb-3 mt-3" alt="{{ $detail->category->name }}">
                    {{-- {{ asset('storage/' . $detail->image) }} kita arahkan memang di asset kemudian kita masuk folder storage/, dan post-imagenya tidak usah di tulis karena suda kebawa denga post imagenya kedalam database --}}
                @else
                    <img src="https://source.unsplash.com/1100x300?{{ $detail->category->name }}"
                        class="card-img-top mb-3 mt-3" alt="{{ $detail->category->name }}">
                @endif




                <article>
                    {!! $detail->body !!} {{-- kita gunakan {!!  !!}  untuk dapat memasukkan script HTML untuk melakukan ini harus hati hati dan pastikan inputan yang dilakukan itu tidak aneh aneh dari scrip jahat karena untuk halamn blog jdi tidak apa apa --}}
                </article>

            </div>
        </div>
    </div>
@endsection
