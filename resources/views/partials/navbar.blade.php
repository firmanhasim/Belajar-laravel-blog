<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="/"><b>Sahabat Ngoding</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="/"><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about"><b>About</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'post' ? 'active' : '' }}" href="/blog"><b>Bloger</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}"
                        href="/categories"><b>Categories</b></a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                {{-- jika user suda login maka yang akan di tampilkan menu di bawah ini --}}
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard"><i
                                        class="bi bi-layout-text-sidebar-reverse"></i> My
                                    Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            {{-- unutk membuat tombol keluar kita akan menggunakan form dan setiap form gunakan @csrf --}}
                            <li>
                                <form action="/keluar" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                        Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    {{-- dan jika user belum login maka yang akan tampil menu login di bawah ini --}}
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}"><b><i
                                    class="bi bi-box-arrow-in-right"></i>
                                Login</b></a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
