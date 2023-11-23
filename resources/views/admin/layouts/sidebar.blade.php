<!-- partial -->
<!-- partial:partials/_sidebar.html -->
{{-- https://mdisearch.com/ --}}
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item @if (@$menu == 'dashboard') active @endif">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item @if (@$menu == 'products') active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false"
                aria-controls="products">
                <i class="menu-icon mdi mdi-archive"></i>
                <span class="menu-title">Produk</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if (@$menu == 'products') show @endif" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'product-list') active @endif"
                            href="{{ route('product_list') }}">Daftar Produk</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'product-create') active @endif"
                            href="{{ route('product_create') }}">Tambah Produk</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if (@$menu == 'categories') active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#product-categories" aria-expanded="false"
                aria-controls="product-categories">
                <i class="menu-icon mdi mdi-shape-outline"></i>
                <span class="menu-title">Kategori</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if (@$menu == 'categories') show @endif" id="product-categories">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'product-category-list') active @endif"
                            href="{{ route('product_category_list') }}">Daftar Kategori</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'product-category-create') active @endif"
                            href="{{ route('product_category_create') }}">Tambah Kategori</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if (@$menu == 'download-centers') active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#download-centers" aria-expanded="false"
                aria-controls="download-centers">
                <i class="menu-icon mdi mdi-download"></i>
                <span class="menu-title">Download Center</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if (@$menu == 'download-centers') show @endif" id="download-centers">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'download-center-list') active @endif"
                            href="{{ route('download_center_list') }}">Daftar
                            Download Centers</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'download-center-create') active @endif"
                            href="{{ route('download_center_create') }}">Tambah Download Center</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if (@$menu == 'posts') active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#posts" aria-expanded="false" aria-controls="posts">
                <i class="menu-icon mdi mdi-pencil-box-outline"></i>
                <span class="menu-title">Berita</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if (@$menu == 'posts') show @endif" id="posts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'post-list') active @endif"
                            href="{{ route('post_list') }}">Daftar Berita</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'post-create') active @endif"
                            href="{{ route('post_create') }}">Tambah Berita</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if (@$menu == 'guarantees') active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#guarantees" aria-expanded="false"
                aria-controls="guarantees">
                <i class="menu-icon mdi mdi-security"></i>
                <span class="menu-title">Garansi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if (@$menu == 'guarantees') show @endif" id="guarantees">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'guarantee-list') active @endif"
                            href="{{ route('guarantee_list') }}">Daftar Garansi</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'guarantee-create') active @endif"
                            href="{{ route('guarantee_create') }}">Tambah Garansi</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Tentang</li>
        <li class="nav-item @if (@$menu == 'sliders') active @endif">
            <a class="nav-link" href="{{ route('sliders') }}">
                <i class="menu-icon mdi mdi-image-multiple"></i>
                <span class="menu-title">Sliders</span>
            </a>
        </li>
        <li class="nav-item @if (@$menu == 'services') active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#services" aria-expanded="false"
                aria-controls="services">
                <i class="menu-icon mdi mdi-face-agent"></i>
                <span class="menu-title">Layanan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if (@$menu == 'services') show @endif" id="services">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'service-list') active @endif"
                            href="{{ route('service_list') }}">Daftar Layanan</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'service-create') active @endif"
                            href="{{ route('service_create') }}">Tambah Layanan</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if (@$menu == 'certificates') active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#certificates" aria-expanded="false"
                aria-controls="certificates">
                <i class="menu-icon mdi mdi-certificate"></i>
                <span class="menu-title">Sertifikat</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if (@$menu == 'certificates') show @endif" id="certificates">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'certificate-list') active @endif"
                            href="{{ route('certificate_list') }}">Daftar Sertifikat</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'certificate-create') active @endif"
                            href="{{ route('certificate_create') }}">Tambah Sertifikat</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if (@$menu == 'company') active @endif">
            <a class="nav-link" href="{{ route('company') }}">
                <i class="menu-icon mdi mdi-domain"></i>
                <span class="menu-title">Perusahaan</span>
            </a>
        </li>
        <li class="nav-item @if (@$menu == 'locations') active @endif">
            <a class="nav-link" href="{{ route('location') }}">
                <i class="menu-icon mdi mdi-map-marker"></i>
                <span class="menu-title">Lokasi</span>
            </a>
        </li>
        <li class="nav-item nav-category">Akun</li>
        @if (auth()->user()->hasRole(['superadmin']))
            <li class="nav-item @if (@$menu == 'user-managements') active @endif">
                <a class="nav-link" data-bs-toggle="collapse" href="#user-managements" aria-expanded="false"
                    aria-controls="user-managements">
                    <i class="menu-icon mdi mdi-account-multiple-outline"></i>
                    <span class="menu-title">Manajemen User</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse @if (@$menu == 'user-managements') show @endif" id="user-managements">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link @if (@$submenu == 'user-management-list') active @endif"
                                href="{{ route('user_management_list') }}">Daftar User</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link @if (@$submenu == 'user-management-create') active @endif"
                                href="{{ route('user_management_create') }}">Tambah
                                User</a></li>
                    </ul>
                </div>
            </li>
        @endif
        <li class="nav-item @if (@$menu == 'profile') active @endif">
            <a class="nav-link" href="{{ route('profile_update') }}">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">Profil</span>
            </a>
        </li>
        <li class="nav-item @if (@$menu == 'logout') active @endif">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                <i class="menu-icon mdi mdi-logout"></i>
                <span class="menu-title">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
