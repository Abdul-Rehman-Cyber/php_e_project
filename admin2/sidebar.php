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
                    
            
                
                </div>
            </nav>
        </div>
        <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.php" class="dropdown-item">Buttons</a>
                            <a href="typography.php" class="dropdown-item">Typography</a>
                            <a href="element.php" class="dropdown-item">Other Elements</a>
                        </div>
        </div> -->