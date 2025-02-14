<!-- header -->
<header class="header">
	<div class="header__wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__content">
						<!-- header logo -->
						<a href="index.php" class="header__logo">
							<img src="img/logo.svg" alt="">
						</a>
						<!-- end header logo -->
						<?php
						$currentPage = basename($_SERVER['PHP_SELF']);
						?>

						<!-- header nav -->
						<ul class="header__nav">

							<li class="header__nav-item">
								<a href="index.php"
									class="header__nav-link <?= ($currentPage == 'index.php') ? ' header__nav-link--active' : '' ?>">Home</a>
							</li>

							<li class="header__nav-item">
								<a href="movies.php"
									class="header__nav-link <?= ($currentPage == 'movies.php') ? ' header__nav-link--active' : '' ?>">Movies</a>
							</li>

							<li class="header__nav-item">
								<a href="booking.php"
									class="header__nav-link <?= ($currentPage == 'booking.php') ? ' header__nav-link--active' : '' ?>">Booking</a>
							</li>

							<li class="header__nav-item">
								<a href="faq.php"
									class="header__nav-link <?= ($currentPage == 'faq.php') ? ' header__nav-link--active' : '' ?>">Help</a>
							</li>

							<!-- dropdown -->
							<li class="dropdown header__nav-item">
								<a class="dropdown-toggle header__nav-link header__nav-link--more" href="#"
									role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false"><i class="icon ion-ios-more"></i></a>

								<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
									<li><a href="about.php">About</a></li>
									<li>
										<a href="<?php echo isset($_SESSION['user_session']) ? 'profile.php' : 'signin.php'; ?>">Profile</a>
									</li>


								</ul>
							</li>
							<!-- end dropdown -->
						</ul>
						<!-- end header nav -->

						<!-- header auth -->

						<div class="header__auth">
							<?php
							if (isset($_SESSION['user_session'])) {
								echo "
								<a href='logout.php' class='header__sign-in'>
								<i class='icon ion-ios-log-in'></i>
								<span>Logout</span>
								</a>
								";
							} else {
								echo "
								<a href='signin.php' class='header__sign-in'>
								<i class='icon ion-ios-log-in'></i>
								<span>sign in</span>
								</a>
								";
							}

							?>
						</div>
						<!-- end header auth -->

						<!-- header menu btn -->
						<button class="header__btn" type="button">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- end header menu btn -->
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- end header -->