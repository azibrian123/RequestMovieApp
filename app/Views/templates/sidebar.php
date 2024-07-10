<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-play-circle"></i>
        </div>
        <div class="sidebar-brand-text mx-3">RequestVideoApp</div>
    </a>


    <?php if (in_groups('customer')) : ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Videos
        </div>

        <!-- Nav Item - All Videos -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>customer/videos">
                <i class="fas fa-video"></i>
                <span>All Videos</span></a>
        </li>

        <!-- Nav Item - My Videos -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>customer/myvideos">
                <i class="fas fa-video"></i>
                <span>My Videos</span></a>
        </li>

        <!-- Nav Item - My Request Videos -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>customer/myrequest">
                <i class="fas fa-video"></i>
                <span>My Request Videos</span></a>
        </li>

    <?php endif; ?>

    <?php if (in_groups('admin')) : ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Data
        </div>

        <!-- Nav Item - My Request -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>admin/videos">
                <i class="fas fa-video"></i>
                <span>Videos</span></a>
        </li>

        <!-- Nav Item - Customer -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>admin/customers">
                <i class="fas fa-users"></i>
                <span>Customers</span></a>
        </li>

        <!-- Nav Item - Requested Videos -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>admin/requestvideos">
                <i class="fab fa-buffer"></i>
                <span>Requested Videos</span></a>
        </li>

    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>