<nav class="navbar navbar-expand-lg navbar-light bg-danger bg-gradient">
    <div class="container">
        <img
            src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiyuQNMG-QHIXh45K4cybgoGtxuhTCNdQXL3x4GHL4D48EJ-D_2NIJRIstArog8uQRDLukwKK2s2maqDnt-FjRoMYk_qvkDWmh2hU7P3F1q31EOXiqbg0Ke79fbDcyAdYujtesj0NLcNkx4v5LyM3v6JLr6tK1S2-cPfOTEmjeIRnZZHbDSqRQsKYjwdQ/s1008/logo-kera-sakti.png"
            alt=""
            width="30"
            class="d-inline-block align-text-top mx-3"
        />
        <a class="navbar-brand text-light" href="/">Pendaftaran Warga IKS PI</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a
                        class="nav-link text-light active"
                        aria-current="page"
                        href="/"
                        >Beranda</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/cek-anggota"
                        >Cek Data Anggota</a
                    >
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link text-light dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Pendaftaran
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a
                                class="dropdown-item"
                                href="/pendaftaran-tingkat-1/create"
                                >Warga Tingkat 1</a
                            >
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="/pendaftaran-tingkat-2/create"
                                >Warga Tingkat 2</a
                            >
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/profil" tabindex="-1"
                        >Profil</a
                    >
                </li>
            </ul>
            @auth

            <li class="nav-item dropdown">
                <a
                    class="nav-link dropdown-toggle text-white"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    Welcome back, {{auth()->user()->nama}}
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="/dashboard/index"
                            ><i class="bi bi-card-checklist"></i> My
                            Dashboard</a
                        >
                    </li>

                    <li><hr class="dropdown-divider" /></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-left"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            @else
            <div class="d-flex">
                <a class="btn btn-outline-light" href="/login">Login</a>
            </div>
            @endauth
        </div>
    </div>
</nav>
