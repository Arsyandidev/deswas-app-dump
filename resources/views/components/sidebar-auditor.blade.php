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
                @if (
                    \Request::route()->getName() == 'dashboard.auditor.index' ||
                        \Request::route()->getName() == 'dashboard.auditor.ticket-list')
                    <a class="nav-link {{ \Request::route()->getName() == 'dashboard.auditor.ticket-list' ? 'active' : '' }}"
                        href="{{ route('dashboard.auditor.ticket-list') }}" wire:navigate>
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Daftar Pertanyaan</span>
                    </a>
                @endif

                @if (
                    \Request::route()->getName() == 'dashboard.inspektur.index' ||
                        \Request::route()->getName() == 'dashboard.inspektur.ticket-list')
                    <a class="nav-link {{ \Request::route()->getName() == 'dashboard.inspektur.ticket-list' ? 'active' : '' }}"
                        href="{{ route('dashboard.inspektur.ticket-list') }}" wire:navigate>
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Daftar Pertanyaan</span>
                    </a>
                @endif
            </li>

            <li class="nav-item">
                <a class="nav-link {{ \Request::route()->getName() == 'dashboard.auditor.index' ? 'active' : '' }}"
                    href="{{ route('dashboard.auditor.index') }}" wire:navigate>
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
        </ul>
    </div>
    <div class="sidenav-footer mx-3 mt-5">
        <a class="btn btn-primary btn-sm mb-0 w-100" href="{{ route('dashboard.index') }}" type="button"
            wire:navigate>Dashboard
        </a>
    </div>
</div>
