<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="{{ route('root') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>

        <a href="{{ route('root') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item d-block d-sm-none">
                    <a href="{{ route('root') }}" class="nav-link logo logo-light d-flex align-items-center">
                        <span class="logo-sm me-2">
                            <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('penduduk.*') ? 'active' : '' }}"
                       href="{{ route('penduduk.index') }}">
                        <i class="bx bxs-user-check me-2"></i> <span>Data Penduduk</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('surat-masuk.*') || request()->routeIs('surat-keluar.*') ? 'active' : '' }}" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="{{ request()->routeIs('surat-masuk.*') || request()->routeIs('surat-keluar.*') ? 'true' : 'false' }}" aria-controls="sidebarApps">
                        <i class="bx bx-envelope"></i></i> <span>Persuratan</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('surat-masuk.*') || request()->routeIs('surat-keluar.*') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('surat-masuk.index') }}" class="nav-link {{ request()->routeIs('surat-masuk.index') ? 'active' : '' }}" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                     Surat Masuk
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('surat-keluar.index') }}" class="nav-link {{ request()->routeIs('surat-keluar.index') ? 'active' : '' }}" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                     Surat Keluar
                                </a>
                            </li>
                            </ul>
                    </div>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('jenis-surat.*') || request()->routeIs('pengajuan-surat.*') ? 'active' : '' }}"
                       href="#sidebarPengajuan"
                       data-bs-toggle="collapse"
                       role="button"
                       aria-expanded="{{ request()->routeIs('jenis-surat.*') || request()->routeIs('pengajuan-surat.*') ? 'true' : 'false' }}"
                       aria-controls="sidebarPengajuan">
                        <i class="bx bx-user-voice me-2"></i> <span>Pengajuan</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('jenis-surat.*') || request()->routeIs('pengajuan-surat.*') ? 'show' : '' }}"
                         id="sidebarPengajuan">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('jenis-surat.index') }}"
                                   class="nav-link {{ request()->routeIs('jenis-surat.index') ? 'active' : '' }}"
                                   role="button"
                                   aria-expanded="false"
                                   aria-controls="sidebarJenisPengajuan"
                                   data-key="t-jenis-pengajuan">
                                    <i class="bx bx-file-document me-2"></i> Jenis Surat
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pengajuan-surat.index') }}"
                                   class="nav-link {{ request()->routeIs('pengajuan-surat.index') ? 'active' : '' }}"
                                   role="button"
                                   aria-expanded="false"
                                   aria-controls="sidebarPengajuanSurat"
                                   data-key="t-pengajuan">
                                   <i class="bx bx-file-document me-2"></i>  Pengajuan
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}


                {{-- <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('units.*') ? 'active' : '' }}" href="{{ route('units.index') }}" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                        <i class='bx bx-grid-alt'></i> <span>Units</span>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('jenis-surat.*') ? 'active' : '' }}"
                       href="{{ route('jenis-surat.index') }}">
                        <i class="bx bx-file me-2"></i> Jenis Surat
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('pengajuan-surat.*') ? 'active' : '' }}"
                       href="{{ route('pengajuan-surat.index') }}">
                        <i class="bx bx-send me-2"></i> Pengajuan
                    </a>
                </li>

                @if (Auth::user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                        <i class='bx bx-grid-alt'></i> <span>User Form</span>
                    </a>
                </li>
                @endif
                

            </ul>
        </div>
        </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>