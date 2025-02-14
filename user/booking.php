<?php
session_start();
include "../admin/connection.php";
if (!isset($_SESSION["user_session"])) {
	echo "
	<script>window.location.href='signin.php'</script>
	
	";
}

// Fetch theaters
$theaterQuery = "SELECT theater_id, theater_name FROM theaters";
$theaterResult = mysqli_query($connect, $theaterQuery);

// Fetch movies
$movieQuery = "SELECT movie_id, title FROM movies where movie_status = 'Released'";
$movieResult = mysqli_query($connect, $movieQuery);

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
    <title>Ticket Booking - FlixGo</title>
</head>

<body class="body">
    <!-- header -->
    <?php include "header.php"; ?>
    <!-- header -->

    <!-- Ticket Booking Section -->
    <section class="section section--first section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Booking</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="index.php">Home</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Booking</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- registration form -->
						<form action="process_booking.php" method="post" class="sign__form">
							<!-- logo -->
							<a href="index.php" class="sign__logo">
								<img src="img/logo.svg" alt="">
							</a>

							<div class="sign__group">
								<select name="theater_id" id="theater_id" class="form-control sign__input" required>
									<option value="">Choose Theater</option>
									<?php while ($row = mysqli_fetch_assoc($theaterResult)) { ?>
										<option value="<?php echo $row['theater_id']; ?>">
											<?php echo htmlspecialchars($row['theater_name']); ?>
										</option>
									<?php } ?>
								</select>
								<select name="movie_id" id="movie_id" class="form-control sign__input" required>
									<option value="">Choose Movie</option>
									<?php while ($row = mysqli_fetch_assoc($movieResult)) { ?>
										<option value="<?php echo $row['movie_id']; ?>">
											<?php echo htmlspecialchars($row['title']); ?>
										</option>
									<?php } ?>
								</select>
							</div>

							<div class="sign__group">
								<input type="date" name="show_date" id="show_date" class="form-control sign__input"
									required>
								<select name="show_time" id="show_time" class="form-control sign__input" required>
									<option value="">Select a show time</option>
									<option value="10:00 AM">10:00 AM</option>
									<option value="1:00 PM">1:00 PM</option>
									<option value="4:00 PM">4:00 PM</option>
									<option value="7:00 PM">7:00 PM</option>
									<option value="10:00 PM">10:00 PM</option>
								</select>
							</div>

							<div class="sign__group">
								<select name="seating_category" id="seating_category" class="form-control sign__input"
									required>
									<option value="">Select a category</option>
									<option value="Gold">Gold</option>
									<option value="Platinum">Platinum</option>
									<option value="Box">Box</option>
								</select>
							</div>
							<div class="sign__group">
							<input type="text"  class="sign__input" value="Number of Adult Tickets:" disabled>
								<input type="number" name="adult_tickets" id="adult_tickets"
									class="form-control sign__input" min="0" required>
							</div>
							<div class="sign__group">
								<input type="text"  class="sign__input" value="Number of Kid Tickets (Ages 3-12):" disabled>
								<input type="number" name="kid_tickets" id="kid_tickets"
									class="form-control sign__input" min="0" required>
							</div>

							<button class="sign__btn" type="submit" name="sign_up_btn">Book Tickets</button>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end pricing -->
    <!-- end Ticket Booking Section -->

    <!-- footer -->
    <?php include "footer.php"; ?>
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