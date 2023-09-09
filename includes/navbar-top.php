<nav class="sb-topnav navbar navbar-expand navbar-dark bg-color-nav">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 text-center" href="#">Barangay System</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar -->
    <span class="ms-auto">
        <ul class="navbar-nav ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?php echo $_SESSION['username']; ?> </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="#!"></a></li> -->
                    <!-- <li><hr class="dropdown-divider" /></li> -->
                    <li><a class="dropdown-item" href="../../login.php">Logout <i class="float-end bi bi-box-arrow-right"></i></a></li>
                </ul>
            </li>
        </ul>
    </span>
</nav>