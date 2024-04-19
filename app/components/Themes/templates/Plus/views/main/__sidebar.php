<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile border-bottom">
            <a href="<?= $base_url ?>/me" class="nav-link flex-column">
                <div class="nav-profile-image">
                    <img src="<?= $base_url ?><?= $themePath ?>assets/images/faces/avatar_generico.png" alt="profile" />
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
                    <span class="font-weight-semibold mb-1 mt-2 text-center">ABATISTA</span>
                    <span class="text-secondary icon-sm text-center">Admin</span>
                </div>
            </a>
        </li>
        <li class="nav-item pt-3">
            <a class="nav-link d-block" href="<?= $base_url ?>">
                <img class="sidebar-brand-logo" src="<?= $base_url ?><?= $themePath ?>assets/images/logo_dreamedservices_sobre_negro.png" alt="" width="180" height="50">
            </a>
            <form class="d-flex align-items-center" action="#">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                    </div>
                    <input type="text" class="form-control border-0" placeholder="Search" />
                </div>
            </form>
        </li>
        <li class="pt-2 pb-1">
            <!--span class="nav-item-head">Template Pages</span-->
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $base_url ?>">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $base_url ?>clientes">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Clientes</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $base_url ?>servicios">
                <i class="mdi mdi mdi-book-plus menu-icon"></i>
                <span class="menu-title">Servicios</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi mdi-file-chart menu-icon"></i>
                <span class="menu-title">Facturación</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base_url ?>facturas">Facturas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base_url ?>cotizacion">Cotización</a>
                    </li>
                    <!--li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li-->
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= $base_url ?>proyectos">
                <i class="mdi mdi-code-not-equal-variant menu-icon"></i>
                <span class="menu-title">Proyectos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $base_url ?>integraciones">
                <i class="mdi mdi-buffer menu-icon"></i>
                <span class="menu-title">Integraciones</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $base_url ?>tickets">
                <i class="mdi mdi-ticket menu-icon"></i>
                <span class="menu-title">Tickets</span>
            </a>
        </li>
        <li class="nav-item pt-3">
            <a class="nav-link" href="http://dreamedservices.com" target="_blank">
                <i class="mdi mdi-file-document-box menu-icon"></i>
                <span class="menu-title">Informaciones</span>
            </a>
        </li>
    </ul>
</nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    