{{-- mengarah ke template layout main --}}
@extends('layout.main')

{{-- menangkap key dan kita gunaka milik blade yaitu {{ $name }} sebagai pengganti <php echo $name; > dan akan jalan jika nama file kita menggunakan .blade dan {{  }} sda tersedia htmlspesialchars didalamnya --}}

@section('container')

    <div class="row justify-content-center">
        <div class="col-lg-5 mt-5">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center">Silahkan Registrasi</h1>
                <form action="/register" method="post">
                    @csrf
                    {{-- setelah kita membuat action register kita maka kita akan membuat raute kita pada file web dan kita tambahkan @csrf unutk menambahkan keamanan pada sistem login kita --}}
                    <div class="form-floating mb-2">
                        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror"
                            id="name" placeholder="name" required value="{{ old('name') }}">
                        {{-- @error('name') is-invalid @enderror" kita tambahkan ini unutk memberitahukan kesalahan jika namenya tidak di isi dan error name harus sama dengan name="name", serta kita tambahkan value old 'name' bertujuan agar nama yang suda benar ketika di isi tidak hilang --}}
                        <label for="name">Name</label>
                        {{-- dan kita akan tampilkan ini jika ada kesalahan namenya maka kita tampilkan informasi dibawah ini dan harus $massage karena bawaan dari laravel --}}
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" placeholder="username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-2">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="floatingInput" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-danger mt-3" type="submit">Registrasi</button>
                </form>
                <small class="d-block text-center mt-3">Suda punya akunt? <a href="/login">Login!</a></small>
            </main>
        </div>
    </div>

@endsection
