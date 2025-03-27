<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin Panel</h3>
                </a>
                
                <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link" <?= ($currentPage == 'movies.php') ? ' active' : '' ?>><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="movies.php" class="nav-item nav-link <?= ($currentPage == 'movies.php') ? ' active' : '' ?>"><i class="fa fa-chart-bar me-2"></i>Movies</a>
                    <a href="theaters.php" class="nav-item nav-link <?= ($currentPage == 'theaters.php') ? ' active' : '' ?>"><i class="fa fa-chart-bar me-2"></i>Theaters</a>
                    <a href="users.php" class="nav-item nav-link <?= ($currentPage == 'users.php') ? ' active' : '' ?>"><i class="fa fa-chart-bar me-2"></i>Users</a>
                    <a href="admins.php" class="nav-item nav-link <?= ($currentPage == 'admins.php') ? ' active' : '' ?>"><i class="fa fa-chart-bar me-2"></i>Admins</a>
                    <a href="bookings.php" class="nav-item nav-link <?= ($currentPage == 'bookings.php') ? ' active' : '' ?>"><i class="fa fa-chart-bar me-2"></i>Bookings</a>
                    <a href="logout.php" class="nav-item nav-link <?= ($currentPage == 'logout.php') ? ' active' : '' ?>"><i class="fa fa-chart-bar me-2"></i>Logout</a>
                    
            
                
                </div>
            </nav>
        </div>
    