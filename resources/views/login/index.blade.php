{{-- mengarah ke template layout main --}}
@extends('layout.main')

{{-- menangkap key dan kita gunaka milik blade yaitu {{ $name }} sebagai pengganti <php echo $name; > dan akan jalan jika nama file kita menggunakan .blade dan {{  }} sda tersedia htmlspesialchars didalamnya --}}

@section('container')

    <div class="row justify-content-center">
        <div class="col-lg-4 mt-5">
            {{-- guanakan lg agar resposive --}}

            {{-- disini kita akan lakukan pengkondisian jika jika berhasil tampilkan pesan --}}
            @if (session()->has('success'))
                {{-- diambil dari bootstrap --}}
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }} {{-- data diatas diambil dari flashdata controler register kita --}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- unutk menampilkan kesalahan jika password salah --}}
            @if (session()->has('errorr'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('errorr') }} {{-- data diatas diambil dari flashdata controler register kita --}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center">Silahkan Login</h1>
                <form action="/login" method="post">
                    {{-- dan jangan lupa unutk membuat form kita gunakan @csrf sebagai pengaman agar tidak dibajak --}}
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                        {{-- @error('name') is-invalid @enderror" kita tambahkan ini unutk memberitahukan kesalahan jika namenya tidak di isi dan error name harus sama dengan name="name", serta kita tambahkan value old 'name' bertujuan agar nama yang suda benar ketika di isi tidak hilang --}}
                        <label for="email">Email address</label>
                        {{-- dan kita akan tampilkan ini jika ada kesalahan namenya maka kita tampilkan informasi dibawah ini dan harus $massage karena bawaan dari laravel --}}
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                            required>
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-danger" type="submit">Login</button>
                </form>
                <small class="d-block text-center mt-3">Belum punya akunt? <a href="/register">Buat akunt!</a></small>
            </main>
        </div>
    </div>

@endsection
