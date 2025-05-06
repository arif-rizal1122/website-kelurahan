<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="<?php echo e(route('root')); ?>" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/logo-dark.png')); ?>" alt="" height="17">
            </span>
        </a>

        <a href="<?php echo e(route('root')); ?>" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/logo-light.png')); ?>" alt="" height="17">
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
                    <a href="<?php echo e(route('root')); ?>" class="nav-link logo logo-light d-flex align-items-center">
                        <span class="logo-sm me-2">
                            <img src="<?php echo e(URL::asset('build/images/logo-sm.png')); ?>" alt="" height="22">
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(request()->routeIs('penduduk.*') ? 'active' : ''); ?>"
                       href="<?php echo e(route('penduduk.index')); ?>">
                        <i class="bx bxs-user-check me-2"></i> <span>Data Penduduk</span>
                    </a>
                </li>
                

                


                

                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(request()->routeIs('jenis-surat.*') ? 'active' : ''); ?>"
                       href="<?php echo e(route('jenis-surat.index')); ?>">
                        <i class="bx bx-file me-2"></i> Jenis Surat
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(request()->routeIs('pengajuan-surat.*') ? 'active' : ''); ?>"
                       href="<?php echo e(route('pengajuan-surat.index')); ?>">
                        <i class="bx bx-send me-2"></i> Pengajuan
                    </a>
                </li>

                <?php if(Auth::user()->role === 'admin'): ?>
                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(request()->routeIs('users.*') ? 'active' : ''); ?>" href="<?php echo e(route('users.index')); ?>" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                        <i class='bx bx-grid-alt'></i> <span>User Form</span>
                    </a>
                </li>
                <?php endif; ?>
                

            </ul>
        </div>
        </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>