<div>
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank">
            <span class="ms-1 font-weight-bold">Helpdesk Pengawasan (v2.1)
            </span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Menu Dashboard</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ \Request::route()->getName() == 'tiket' ? 'active' : '' }} " href="/tiket"
                    wire:navigate>
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-email-83 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Buat Pertanyaan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ \Request::route()->getName() == 'pertanyaan' ? 'active' : '' }}"
                    href="./pages/billing.html">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Pertanyaan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ \Request::route()->getName() == 'dashboard.index' ? 'active' : '' }}"
                    href="/dashboard" wire:navigate>
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./pages/billing.html">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profil</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman Beranda</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center me-2" aria-current="page" href="/" wire:navigate>
                    <i class="fa fa-home opacity-6 text-dark me-1"></i>
                    Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link me-2" href="../pages/profile.html">
                    <i class="fa fa-book opacity-6 text-dark me-1"></i>
                    Arsip
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link me-2" href="../pages/sign-up.html">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Petunjuk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link me-2" href="../pages/sign-in.html">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Pusat Informasi
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 mt-5">
        <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank"
            class="btn btn-dark btn-sm w-100 mb-3">Dashboard Auditor</a>
        <a class="btn btn-primary btn-sm mb-0 w-100"
            href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Dashboard
            Admin</a>
    </div>
</div>
