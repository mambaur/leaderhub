<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" aria-label="Third navbar example">
    <div class="container" style="font-size:13px">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('/') }}/admin-assets/images/leaderhub/logo.png" height="24" alt="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsMain"
            aria-controls="navbarsMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsMain">
            <ul class="navbar-nav m-auto mb-2 mb-sm-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">BERANDA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">TENTANG KAMI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">BERITA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">KONTAK KAMI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">DOWNLOAD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">GARANSI</a>
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
            <form>
                <input class="form-control" type="text" style="font-family: system-ui, FontAwesome; font-size:12px"
                    placeholder="&#xf002 Cari produk disini..." aria-label="Cari produk disini...">
            </form>
        </div>
    </div>
</nav>
