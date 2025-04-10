<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Readify</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto d-flex align-items-center gap-3">
                <li class="nav-item">
                    <span class="nav-link text-light">Halo, <?php echo $_SESSION['username']; ?></span>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-light btn-sm" href="aksi_logout.php">Keluar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>