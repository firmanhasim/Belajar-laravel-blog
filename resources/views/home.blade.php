{{-- untuk menghubungkan template yang berada di folder layout file main --}}
@extends('layout.main')

{{-- untuk memberitahu bahwa yield container di dalam folder layout mempunyai isi seperti ini --}}
@section('container')
    <h1>Halaman Home</h1>
@endsection
