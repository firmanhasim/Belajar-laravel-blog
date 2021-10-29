@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h3">My Postingan</h3>
    </div>

    {{-- kita akan buat pesan di sini dengan melakukan pengkondisian --}}
    @if (session()->has('success'))
        <div class="alert alert-info col-lg-10" role="alert">
            {{-- kita ambil dari controler kita unutk session validasinya --}}
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-10">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Tambah Postingan</a>
        {{-- raute ini sda otomatis ada methotnya yaitu create pada controler karena kita gunakan controler resource --}}
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th style="text-align: center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tampil as $tmp)
                    <tr>
                        {{-- unutk meluping nomor kita bisa gunakan ini bawaan dari laravel dan --}}
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tmp->title }}</td>
                        <td>{{ $tmp->category->name }}</td>
                        {{-- karen ini dari table relasi kita yaitu harus menggunakan name --}}
                        <td style="text-align: center">
                            <a href="/dashboard/posts/{{ $tmp->slug }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a>
                            {{-- kita akan membuat tampilan show pada controler kita --}}
                            <a href="/dashboard/posts/{{ $tmp->slug }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            {{-- dan pada tampilan edit kita akan tambahkan edit di belakang blade kita {{ $tmp->slug }}/edit yang suda memang aturan default dari resource laravel --}}

                            {{-- unutk membuat tombol hapus kita akan gunakan form unutk menggunakan method delete, dan kita akan kirimkan slug kemudian slugnya mencari id dalam controler kita method distroy --}}
                            <form action="/dashboard/posts/{{ $tmp->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin!')"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
