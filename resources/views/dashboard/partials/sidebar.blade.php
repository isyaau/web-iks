<ul
    class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion"
    id="accordionSidebar"
>
    <!-- Sidebar - Brand -->
    <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href="/"
    >
        <div class="sidebar-brand-icon rotate-n-15">
            <img
                src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiyuQNMG-QHIXh45K4cybgoGtxuhTCNdQXL3x4GHL4D48EJ-D_2NIJRIstArog8uQRDLukwKK2s2maqDnt-FjRoMYk_qvkDWmh2hU7P3F1q31EOXiqbg0Ke79fbDcyAdYujtesj0NLcNkx4v5LyM3v6JLr6tK1S2-cPfOTEmjeIRnZZHbDSqRQsKYjwdQ/s1008/logo-kera-sakti.png"
                width="50px"
                alt=""
            />
        </div>
        <div class="sidebar-brand-text mx-3">Web IKS PI <sup>Madiun</sup></div>
    </a>
    <li
        class="nav-item {{ request()->segment('2')==''||request()->segment('2')=='index' ? 'active' : '' }}"
    >
        <a class="nav-link" href="/">
            <i class="bi bi-vinyl-fill"></i>
            <span>My Web</span></a
        >
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li
        class="nav-item {{ request()->segment('2')==''||request()->segment('2')=='index' ? 'active' : '' }}"
    >
        <a class="nav-link" href="/dashboard/index">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span></a
        >
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Halaman Utama</div>

    <!-- Nav Item - Tables -->
    <li
        class="nav-item {{ request()->segment('2')==''||request()->segment('2')=='beranda' ? 'active' : '' }}"
    >
        <a class="nav-link" href="/dashboard/beranda/1/edit">
            <i class="bi bi-house-gear-fill"></i>
            <span>Beranda</span></a
        >
    </li>
    <!-- Nav Item - Tables -->
    <li
        class="nav-item {{ request()->segment('2')==''||request()->segment('2')=='profil' ? 'active' : '' }}"
    >
        <a class="nav-link" href="/dashboard/profil/1/edit">
            <i class="bi bi-card-heading"></i>
            <span>Profil</span></a
        >
    </li>
    <!-- Nav Item - Tables -->
    <li
        class="nav-item {{ request()->segment('2')==''||request()->segment('2')=='slider' ? 'active' : '' }}"
    >
        <a class="nav-link" href="/dashboard/slider">
            <i class="bi bi-images"></i>
            <span>Slider</span></a
        >
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">Keanggotaan</div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li
        class="nav-item {{ request()->segment('2')==''||request()->segment('2')=='anggota' ? 'active' : '' }}"
    >
        <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseTwo"
            aria-expanded="true"
            aria-controls="collapseTwo"
        >
            <i class="bi bi-ui-checks"></i>
            <span>Pendaftaran</span>
        </a>
        <div
            id="collapseTwo"
            class="collapse"
            aria-labelledby="headingTwo"
            data-parent="#accordionSidebar"
        >
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tingkat:</h6>
                <a class="collapse-item" href="/dashboard/anggota/anggota-tk-1"
                    >Tingkat 1</a
                >
                <a class="collapse-item" href="/dashboard/anggota/anggota-tk-2"
                    >Tingkat 2</a
                >
            </div>
        </div>
    </li>

    <!-- Nav Item - Tables -->
    <li
        class="nav-item {{ request()->segment('2')==''||request()->segment('2')=='akun' ? 'active' : '' }}"
    >
        <a class="nav-link" href="/dashboard/akun">
            <i class="bi bi-people-fill"></i>
            <span>Akun</span></a
        >
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
