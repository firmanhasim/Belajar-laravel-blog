<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                {{-- disini kita akan membuat file aktifnya menggunakan request sehingga tidak perlu lakukan variable dan kita tambahkan * unutk mengaktifkan semua menu yang masi berikatan dengan yang di telusuri --}}
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                    href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                    {{-- disini kita akan arahkan ke routes baru unutk mengelolah semua data post --}}
                    <span data-feather="file-text"></span>
                    My Post
                </a>
            </li>
        </ul>

        {{-- admin ini harus sama dengan define yang ada di providers kita yatu Gate::define('admin', function (User $user) --}}
        @can('admin')

            {{-- disini kita akan tambahkan link untuk admin --}}
            <h6 class="sidebar-heading d-flex justify-content-between align-item-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
            </h6>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/categoryes*') ? 'active' : '' }}"
                        href="/dashboard/categoryes">
                        {{-- disini kita akan arahkan ke routes baru unutk mengelolah semua data category dan kalau resource secara otomatis mengarah ke index --}}
                        <span data-feather="grid"></span>
                        Post Categoryes
                    </a>
                </li>
            </ul>
        @endcan

    </div>
</nav>
