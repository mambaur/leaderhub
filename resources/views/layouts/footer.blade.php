<div class="container-fluid bg-dark">
    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 mt-5 d-flex justify-content-center">
            <div class="col-12 col-md-4 mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                    <img src="{{ get_logo() }}" height="32" alt="logo" />
                </a>
                <p class="text-muted">&copy; {{ date('Y') }} All Rights Reserved.</p>
            </div>
            <div class="col-md-1 d-none d-md-block border-start"></div>

            <div class="col-12 col-md-4 mb-3">
                <h5 class="text-white">Lokasi</h5>
                <ul class="nav flex-column mb-3">
                    <li class="nav-item mb-2"><a href="{{ route('contacts') }}"
                            class="nav-link p-0 text-muted">{{ get_locations() }}</a></li>
                </ul>
                <h5 class="text-white">Layanan Pelanggan</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="https://wa.me/{{ telp_format(get_contacts()) }}"
                            class="nav-link p-0 text-muted">{{ get_contacts() }}</a></li>
                </ul>
            </div>
        </footer>
    </div>
</div>
