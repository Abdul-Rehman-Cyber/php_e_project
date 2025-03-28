<?php
session_start();
include "../admin/connection.php"
	?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/plyr.css">
	<link rel="stylesheet" href="css/photoswipe.css">
	<link rel="stylesheet" href="css/default-skin.css">
	<link rel="stylesheet" href="css/main.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>FlixGo – Online Movies, TV Shows & Cinema HTML Template</title>

</head>

<body class="body">

	<!-- header -->
	<?php include "header.php" ?>
	<!-- header -->

	<!-- page title -->
	<section class="section section--first section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Movies</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="index.php">Home</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Movies</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- filter -->
	<div class="filter">
	</div>
	<!-- end filter -->

	<!-- catalog -->
	<div class="catalog">
		<div class="container">
			<div class="row">
				<!-- card -->
				<?php
				$query = "SELECT * FROM movies";
				$result = mysqli_query($connect, $query);
				if ($result) {
					while ($row = mysqli_fetch_array($result)) {
						echo "
						<div class='col-6 col-sm-4 col-lg-3 col-xl-2'>
							<div class='card'>
								<div class='card__cover'>
									<img src='../admin/".htmlspecialchars($row['poster_url']) ."' alt=''>
									<a href='details.php?id=$row[movie_id]' class='card__play'>
										<i class='icon ion-ios-play'></i>
									</a>
								</div>
								<div class='card__content'>
									<h3 class='card__title'><a href='details.php?id=$row[movie_id]'>".htmlspecialchars($row['title']) ."</a></h3>
									<span class='card__category'>";
										$catagories = explode("," , $row["genre"]);
										foreach ($catagories as $category) {
											echo "<a href='#'>". htmlspecialchars(trim($category)) ."</a>";
										}

									echo "</span>
									<span class='card__rate'><i class='icon ion-ios-star'></i>".htmlspecialchars($row['rating']) ."</span>
								</div>
							</div>
						</div>";
					}
				}

				?>
				<!-- end card -->

		
			</div>
		</div>
	</div>
	<!-- end catalog -->


	<!-- footer -->
	<?php include "footer.php" ?>
	<!-- end footer -->

	<!-- JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/wNumb.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/jquery.morelines.min.js"></script>
	<script src="js/photoswipe.min.js"></script>
	<script src="js/photoswipe-ui-default.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>