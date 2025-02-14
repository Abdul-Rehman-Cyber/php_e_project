<?php
session_start();
include("../admin/connection.php");

if (isset($_POST['update'])) {

    $movie_id = mysqli_real_escape_string($connect, $_GET['id']);
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $trailer_link = mysqli_real_escape_string($connect, $_POST['trailer_link']);
    $rating = mysqli_real_escape_string($connect, $_POST['rating']);
    $release_date = mysqli_real_escape_string($connect, $_POST['release_date']);
    $age_rating = mysqli_real_escape_string($connect, $_POST['age']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);

    // Handle poster upload
    if (isset($_FILES['poster_url']) && $_FILES['poster_url']['error'] === UPLOAD_ERR_OK) {
        // A new file was uploaded
        $poster_url = $_FILES['poster_url']['name'];
        $tmpname = $_FILES['poster_url']['tmp_name'];
        $path = "img/movie_posters/$poster_url";
        move_uploaded_file($tmpname, $path);
    } else {
        // No new file uploaded; retrieve the previous image from the database
        $query = "SELECT poster_url FROM movies WHERE movie_id = '$movie_id'";
        $resultImage = mysqli_query($connect, $query);
        if ($resultImage && mysqli_num_rows($resultImage) > 0) {
            $row = mysqli_fetch_assoc($resultImage);
            $path = $row['poster_url'];
        } else {
            $path = ''; // Optionally handle the case where no previous image exists
        }
    }



    // Handle genres
    if (!isset($_POST['genre']) || empty($_POST['genre'])) {
        echo "<script>alert('Please select at least one genre.');</script>";
        exit;
    }
    // Handle genre (convert array to a comma-separated string)
    $genre = implode(", ", $_POST['genre']);
    $genre = mysqli_real_escape_string($connect, $genre);

    // Update query
    $update_query = "UPDATE movies SET 
        title = '$title', 
        description = '$description', 
        trailer_link = '$trailer_link', 
        rating = '$rating', 
        poster_url = '$path', 
        release_date = '$release_date', 
        age_rating = '$age_rating', 
        genre = '$genre' ,
        movie_status = '$status'
        WHERE movie_id = '$movie_id'";

    $result = mysqli_query($connect, $update_query);

    if ($result) {
        echo "<script>
            alert('Update successful');
            window.location.href='movies.php';
        </script>";
    } else {
        echo "<script>
            alert('Update failed: " . mysqli_error($connect) . "');
        </script>";
    }
}

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
                            <h6 class="mb-4">Update Movie Details</h6>
                            <form method="POST" enctype="multipart/form-data">

                                <!-- movie poster input -->
                                <div class="row mb-3">
                                    <label for="formFile" class="col-sm-2 col-form-label">Movie Poster</label>
                                    <div class="col-sm-10">
                                        <input class="form-control bg-dark" type="file" id="formFile" name="poster_url"
                                            value="<?php echo $row['poster_url']; ?>">
                                    </div>
                                    <img class="mt-3" src="<?php echo $row['poster_url']; ?>" alt="" width="300px"
                                        height="auto">

                                </div>
                                <!-- movie poster input -->

                                <!-- movie title input -->
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Movie Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="<?php echo $row['title']; ?>" required>
                                    </div>
                                </div>
                                <!-- movie title input -->

                                <!-- movie description input -->
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="description" name="title"
                                            value="<?php echo $row['description']; ?>" required>
                                    </div>
                                </div>
                                <!-- movie description input -->


                                <!-- movie Trailer_Code input -->
                                <div class="row mb-3">
                                    <label for="trailer_link" class="col-sm-2 col-form-label">Trailer_Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="trailer_link" name="title"
                                            value="<?php echo $row['trailer_link']; ?>" required>
                                    </div>
                                </div>
                                <!-- movie Trailer_Code input -->


                                <!-- movie Rating input -->
                                <div class="row mb-3">
                                    <label for="rating" class="col-sm-2 col-form-label">Rating</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="rating" name="rating"
                                            value="<?php echo $row['rating']; ?>" required>
                                    </div>
                                </div>
                                <!-- movie Rating input -->


                                <!-- movie Release_date input -->
                                <div class="row mb-3">
                                    <label for="release_date" class="col-sm-2 col-form-label">Release_date</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="release_date" name="release_date"
                                            value="<?php echo $row['release_date']; ?>" required>
                                    </div>
                                </div>
                                <!-- movie Release_date input -->


                                <!-- movie Age_rating input -->
                                <div class="row mb-3">
                                    <label for="release_date" class="col-sm-2 col-form-label">Age_Rating</label>
                                    <div class="col-sm-10">
                                        <select class="form-select mb-3">
                                            <option selected hidden>Age_rating</option>
                                            <option value="G" <?php echo ($row['age_rating'] == 'G' ? 'selected' : ''); ?>>
                                                G (General Audiences)</option>
                                            <option value="PG" <?php echo ($row['age_rating'] == 'PG' ? 'selected' : ''); ?>>PG (Parental Guidance Suggested)</option>
                                            <option value="PG-13" <?php echo ($row['age_rating'] == 'PG-13' ? 'selected' : ''); ?>>PG-13 (Parents Strongly Cautioned)</option>
                                            <option value="R" <?php echo ($row['age_rating'] == 'R' ? 'selected' : ''); ?>>R (Restricted)</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- movie Age_rating input -->

                                <!-- movie Status input -->
                                <div class="row mb-3">
                                    <label for="release_date" class="col-sm-2 col-form-label">Movie Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-select mb-3" aria-label="Default select example">
                                            <option value="Released" <?php echo ($row['movie_status'] == 'Released' ? 'selected' : ''); ?>>Released
                                            </option>
                                            <option value="Comming_Soon" <?php echo ($row['movie_status'] == 'Comming_Soon' ? 'selected' : ''); ?>>
                                                Comming Soon</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- movie Status input -->


                                <!-- movie Update button -->
                                <div class="row mb-3">
                                    <label for="release_date" class="col-sm-2 col-form-label">Update Button</label>
                                    <div class="col-sm-10">
                                        <button type="submit" name="update"
                                            class="btn btn-outline-primary w-100 mb-3">Update</button>
                                    </div>
                                </div>
                                <!-- movie Update button -->

                            </form>
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