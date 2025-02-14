<?php
session_start();
include('../admin/connection.php');

// if (!isset($_SESSION['admin_session'])) {
//     echo "<script>window.location.href='login.php';</script>";
//     exit();
// }

// Validate theater_id from URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('Invalid theater ID.'); window.location.href='theaters.php';</script>";
    exit();
}

$theater_id = intval($_GET['id']);

$query = "SELECT * FROM theaters WHERE theater_id = $theater_id";
$result = mysqli_query($connect, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "<script>alert('Theater not found.'); window.location.href='theaters.php';</script>";
    exit();
}

$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php include "sidebar.php"; ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include "navbar.php"; ?>
            <!-- Navbar End -->

            <!-- tabel start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Update Theater Details</h6>
                            <form method="POST" enctype="multipart/form-data">

                                <!-- movie poster input -->
                                <div class="row mb-3">
                                    <label for="theater_name" class="col-sm-2 col-form-label">Theater_name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="theater_name" name="name" value="<?php echo htmlspecialchars($row['theater_name']); ?>" required>
                                    </div>
                                </div>
                                <!-- movie poster input -->

                                <!-- movie title input -->
                                <div class="row mb-3">
                                    <label for="city" class="col-sm-2 col-form-label">Theater City</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlspecialchars($row['city']); ?>" required>
                                    </div>
                                </div>
                                <!-- movie title input -->

                                <!-- movie description input -->
                                <div class="row mb-3">
                                    <label for="address" class="col-sm-2 col-form-label">Theater Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="description" name="address" value="<?php echo htmlspecialchars($row['address']); ?>" required>
                                    </div>
                                </div>
                                <!-- movie description input -->


                                <!-- movie Trailer_Code input -->
                                <div class="row mb-3">
                                    <label for="capacity" class="col-sm-2 col-form-label">Capacity</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="trailer_link" name="capacity" value="<?php echo htmlspecialchars($row['capacity']); ?>" min="1" required>
                                    </div>
                                </div>
                                <!-- movie Trailer_Code input -->


                                <div class="row mb-3">
                                    <label for="release_date" class="col-sm-2 col-form-label">Available Seat Classes</label>
                                    <div class="col-sm-10">
                                        <div class="bg-secondary rounded h-100">
                                          
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" class="form-check-input" id="Gold" name="seat_classes[]" value="Gold" <?php echo (strpos($row['available_seat_classes'], 'Gold') !== false) ? 'checked' : ''; ?> required>
                                                <label class="form-check-label" for="Gold">Gold</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" class="form-check-input" id="Platinum" name="seat_classes[]" value="Platinum" <?php echo (strpos($row['available_seat_classes'], 'Platinum') !== false) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="Platinum">Platinum</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" class="form-check-input" id="Box" name="seat_classes[]" value="Box" <?php echo (strpos($row['available_seat_classes'], 'Box') !== false) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="Box">Box</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                


                                <!-- movie Update button -->
                                <div class="row mb-3">
                                    <label for="release_date" class="col-sm-2 col-form-label">Update Button</label>
                                    <div class="col-sm-10">
                                        <button type="submit" name="update" class="btn btn-outline-primary w-100 mb-3">Update</button>
                                    </div>
                                </div>
                                <!-- movie Update button -->

                            </form>
                            <?php
if (isset($_POST['update'])) {
    // Ensure all fields are filled
    if (
        !empty($_POST['name']) &&
        !empty($_POST['city']) &&
        !empty($_POST['address']) &&
        !empty($_POST['capacity']) &&
        isset($_POST['seat_classes']) // Ensure at least one seat class is selected
    ) {
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $city = mysqli_real_escape_string($connect, $_POST['city']);
        $address = mysqli_real_escape_string($connect, $_POST['address']);
        $capacity = mysqli_real_escape_string($connect, $_POST['capacity']);
        $seat_classes_string = implode(", ", $_POST['seat_classes']);

        // Update Query
        $update_query = "UPDATE theaters SET theater_name = '$name', city = '$city', address = '$address', capacity = '$capacity', available_seat_classes = '$seat_classes_string' 
                         WHERE theater_id = $theater_id";

        $result = mysqli_query($connect, $update_query);

        if ($result) {
            echo "<script>
                alert('Theater updated successfully.');
                window.location.href = 'theaters.php';
            </script>";
        } else {
            die("Error: " . mysqli_error($connect));
        }
    } else {
        echo "<script>alert('All fields are required. Please fill in everything.');</script>";
    }
}
?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- tabel start -->


            <!-- Blank End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4 ">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>