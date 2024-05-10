<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <i class="bi bi-buildings-fill"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Puskesmas Sehat</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= $url ?>index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    Puskesmas Sehat, Teman Sehat Keluarga
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= $url ?>kelurahan">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Kelurahan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= $url ?>pasien">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Pasien</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= $url ?>periksa">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Periksa</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= $url ?>paramedik">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Paramedik</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= $url ?>unit_kerja">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Unit Kerja</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

</ul>