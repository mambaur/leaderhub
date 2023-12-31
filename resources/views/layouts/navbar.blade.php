<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" aria-label="Third navbar example">
    <div class="container" style="font-size:13px">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ get_logo() }}" height="24" alt="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsMain"
            aria-controls="navbarsMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsMain">
            <ul class="navbar-nav m-auto mb-2 mb-sm-0">
                <li class="nav-item">
                    <a class="nav-link @if (@$menu == 'dashboard') active fw-bold @endif" aria-current="page"
                        href="{{ route('dashboard') }}">BERANDA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (@$menu == 'about') active fw-bold @endif"
                        href="{{ route('about') }}">TENTANG KAMI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (@$menu == 'posts') active fw-bold @endif"
                        href="{{ route('post') }}">BERITA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (@$menu == 'contacts') active fw-bold @endif"
                        href="{{ route('contacts') }}">KONTAK
                        KAMI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (@$menu == 'download_centers') active fw-bold @endif"
                        href="{{ route('download_centers') }}">DOWNLOAD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (@$menu == 'guarantees') active fw-bold @endif"
                        href="{{ route('guarantees') }}">GARANSI</a>
                </li>
                {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> --}}
            </ul>
            <form class="position-relative" style="width: 200px;">
                <input class="form-control w-100" type="text"
                    style="font-family: system-ui, FontAwesome; font-size:12px"
                    placeholder="&#xf002 Cari produk disini..." name="product_name" id="product_name"
                    aria-label="Cari produk disini...">
            </form>
        </div>
    </div>
</nav>
