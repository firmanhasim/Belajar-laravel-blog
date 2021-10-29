@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h3">Post CAtegoryes</h3>
    </div>

    {{-- kita akan buat pesan di sini dengan melakukan pengkondisian --}}
    @if (session()->has('success'))
        <div class="alert alert-info col-lg-6" role="alert">
            {{-- kita ambil dari controler kita unutk session validasinya --}}
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-6">
        <a href="/dashboard/categoryes/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Tambah
            Category</a>
        {{-- raute ini sda otomatis ada methotnya yaitu create pada controler karena kita gunakan controler resource --}}
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Category</th>
                    <th style="text-align: center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $ctg)
                    <tr>
                        {{-- unutk meluping nomor kita bisa gunakan ini bawaan dari laravel dan --}}
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ctg->name }}</td>
                        <td style="text-align: center">
                            <a href="/dashboard/categoryes/{{ $ctg->slug }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            {{-- dan pada tampilan edit kita akan tambahkan edit di belakang blade kita {{ $ctg->slug }}/edit yang suda memang aturan default dari resource laravel --}}

                            {{-- unutk membuat tombol hapus kita akan gunakan form unutk menggunakan method delete, dan kita akan kirimkan slug kemudian slugnya mencari id dalam controler kita method distroy --}}
                            <form action="/dashboard/categoryes/{{ $ctg->slug }}" method="post" class="d-inline">
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
