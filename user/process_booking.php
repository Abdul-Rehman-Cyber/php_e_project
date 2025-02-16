<?php
session_start();
include "../admin/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $theater_id = $_POST['theater_id'];
    $movie_id = $_POST['movie_id'];
    $show_date = $_POST['show_date'];
    $show_time = $_POST['show_time'];
    $seating_category = $_POST['seating_category'];
    $adult_tickets = intval($_POST['adult_tickets']);
    $kid_tickets = intval($_POST['kid_tickets']);

    // Define pricing for each seating category (adjust prices as needed)
    $pricing = array(
        "Gold" => 700,
        "Platinum" => 2000,
        "Box" => 5000
    );

    // Validate seating category
    if (!array_key_exists($seating_category, $pricing)) {
        die("Invalid seating category selected.");
    }

    // Calculate costs: adult tickets at full price, kid tickets at 50% discount
    $adult_cost = $adult_tickets * $pricing[$seating_category];
    $kid_cost = $kid_tickets * ($pricing[$seating_category] * 0.5);
    $total_cost = $adult_cost + $kid_cost;

    // Optional: Retrieve the logged in user id from session if available
    $user_id = isset($_SESSION['user_session']) ? $_SESSION['user_session'] : NULL;

    // Insert booking record into the bookings table
    $stmt = $connect->prepare("INSERT INTO bookings (user_id, theater_id, movie_id, show_date, show_time, seating_category, adult_tickets, kid_tickets, total_cost) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($connect->error));
    }
    $stmt->bind_param("iiisssiid", $user_id, $theater_id, $movie_id, $show_date, $show_time, $seating_category, $adult_tickets, $kid_tickets, $total_cost);

    if (!$stmt->execute()) {
        die("Execute failed: " . htmlspecialchars($stmt->error));
    }

    // Get the inserted booking id if needed
    $booking_id = $stmt->insert_id;
    $stmt->close();
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

    <body>
        <?php include "header.php"; ?>

        <section class="section section--first section--bg" data-bg="img/section/section.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section__wrap">
                            <!-- section title -->
                            <h2 class="section__title">Booking Conformation</h2>
                            <!-- end section title -->

                            <!-- breadcrumb -->
                            <ul class="breadcrumb">
                                <li class="breadcrumb__item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb__item"><a href="booking.php">Booking</a></li>
                                <li class="breadcrumb__item breadcrumb__item--active">Booking Conformation</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!-- pricing -->
        <div class="section  d-flex">
            <div class="container ">
                <div class="row ">
                    <!-- price -->
                    <div class="col-5">
                        <div class="price">
                            <div class="price__item price__item--first"><span>Booking Confirmation</span></div>
                            <div class="price__item"><span><strong>Booking ID:</strong> <?php echo $booking_id; ?></span>
                            </div>
                            <div class="price__item"><span><strong>Show Date:</strong>
                                    <?php echo htmlspecialchars($show_date); ?></span></div>
                            <div class="price__item"><span><strong>Show Time:</strong>
                                    <?php echo htmlspecialchars($show_time); ?></span></div>
                            <div class="price__item"><span><strong>Seating Category:</strong>
                                    <?php echo htmlspecialchars($seating_category); ?></span></div>
                            <div class="price__item"><span><strong>Adult Tickets:</strong> <?php echo $adult_tickets; ?> x
                                    <?php echo number_format($pricing[$seating_category]); ?> =
                                    <?php echo number_format($adult_cost); ?></span></div>
                            <div class="price__item"><span><strong>Kid Tickets:</strong> <?php echo $kid_tickets; ?> x
                                    <?php echo number_format($pricing[$seating_category] * 0.5); ?> =
                                    <?php echo number_format($kid_cost); ?></span></div>
                            <hr>
                            <div class="price__item"><span><stron>Total Cost:</strong>
                                    <?php echo number_format($total_cost); ?></span></div>
                            <a href="booking.php" class="price__btn">Book Another Ticket</a>
                        </div>
                    </div>
                    <!-- end price -->
                </div>
            </div>
        </div>
        <!-- end pricing -->

        
        <?php include "footer.php"; ?>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
    <?php
} else {
    // If not a POST request, redirect back to booking page
    header("Location: booking.php");
    exit();
}
?>