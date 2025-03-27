<?php
session_start();
include("../admin/connection.php");

if (!isset($_SESSION['admin_session'])) {

    echo
        "<script>
    window.location.href='signin.php';

    </script>";
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
                                        <input class="form-control bg-dark" type="file" id="formFile" name="poster_url">
                                    </div>
                                </div>
                                
                                <!-- movie poster input -->

                                <!-- movie title input -->
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Movie Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                </div>
                                <!-- movie title input -->

                                <!-- movie description input -->
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="description" name="title" required>
                                    </div>
                                </div>
                                <!-- movie description input -->


                                <!-- movie Trailer_Code input -->
                                <div class="row mb-3">
                                    <label for="trailer_link" class="col-sm-2 col-form-label">Trailer_Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="trailer_link" name="title" required>
                                    </div>
                                </div>
                                <!-- movie Trailer_Code input -->


                                <!-- movie Rating input -->
                                <div class="row mb-3">
                                    <label for="rating" class="col-sm-2 col-form-label">Rating</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="rating" name="rating" required>
                                    </div>
                                </div>
                                <!-- movie Rating input -->


                                <!-- movie Release_date input -->
                                <div class="row mb-3">
                                    <label for="release_date" class="col-sm-2 col-form-label">Release_date</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="release_date" name="release_date" required>
                                    </div>
                                </div>
                                <!-- movie Release_date input -->


                                <!-- movie Age_rating input -->
                                <div class="row mb-3">
                                    <label for="release_date" class="col-sm-2 col-form-label">Age_Rating</label>
                                    <div class="col-sm-10">
                                        <select class="form-select mb-3" required>
                                            <option selected hidden>Age_rating</option>
                                            <option value="G">G (General Audiences)</option>
                                            <option value="PG">PG (Parental Guidance Suggested)</option>
                                            <option value="PG-13">PG-13 (Parents Strongly Cautioned)</option>
                                            <option value="R">R (Restricted)</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- movie Age_rating input -->

                                <!-- movie Status input -->
                                <div class="row mb-3">
                                    <label for="release_date" class="col-sm-2 col-form-label">Movie Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-select mb-3" aria-label="Default select example">
                                            <option value="Released">Released</option>
                                            <option value="Comming_Soon">Comming Soon</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- movie Status input -->

                                <div class="row mb-3">
                                    <label for="release_date" class="col-sm-2 col-form-label">Movie Genre</label>
                                    <div class="col-sm-10">
                                        <div class="bg-secondary rounded h-100">
                                            <?php
                                                // List of available genres
                                                $genres = [
                                                    "Action",
                                                    "Thriller",
                                                    "Romance",
                                                    "Horror",
                                                    "Science-fiction",
                                                    "Comedy",
                                                    "Animation",
                                                    "Fiction",
                                                    "Mystery",
                                                    "Western",
                                                    "Adventure"
                                                ];

                                                // Generate checkboxes dynamically
                                                foreach ($genres as $genre) {
                                                    // Check if the current genre is in the selected genres array
                                                    
                                                    echo '
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="' . $genre . '" name="genre[]" value="' . $genre . '"> 
                                                        <label class="form-check-label" for="' . $genre . '">'.$genre.'</label>
                                                    </div>';
                                                }
                                                ?>
                                        </div>
                                    </div>
                                </div>

                                


                                <!-- movie Update button -->
                                <div class="row mb-3">
                                    <label for="release_date" class="col-sm-2 col-form-label">Add Button</label>
                                    <div class="col-sm-10">
                                        <button type="submit" name="add"
                                            class="btn btn-outline-primary w-100 mb-3">Add Movie</button>
                                    </div>
                                </div>
                                <!-- movie Update button -->

                            </form>
                            <script>
    function validateGenre() {
        var checkboxes = document.querySelectorAll('input[name="genre[]"]:checked');
        if (checkboxes.length === 0) {
            document.getElementById("genre-error").style.display = "block";
            return false;
        }
        return true;
    }
</script>

<?php

if (isset($_POST['add'])) {
    // Escape special characters for text fields
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $trailer_link = mysqli_real_escape_string($connect, $_POST['trailer_link']);
    $rating = mysqli_real_escape_string($connect, $_POST['rating']);
    $release_date = mysqli_real_escape_string($connect, $_POST['release_date']);
    $age_rating = mysqli_real_escape_string($connect, $_POST['age']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);

    // Ensure at least one genre is selected
    if (!isset($_POST['genre']) || empty($_POST['genre'])) {
        echo "<script>alert('Please select at least one genre.');</script>";
        exit;
    }
    $genre = implode(", ", $_POST['genre']);
    $genre = mysqli_real_escape_string($connect, $genre);
    
    // Process the file upload
    $raw_file_name = $_FILES['poster_url']['name'];
    $poster_name = basename($raw_file_name);
    // Optionally, remove characters like apostrophes
    $poster_name = str_replace("'", "", $poster_name);
    $tmpname = $_FILES['poster_url']['tmp_name'];
    $path = "img/movie_posters/" . $poster_name;

    if (!move_uploaded_file($tmpname, $path)) {
        die("File upload failed.");
    }

    // Insert Query
    $insert_query = "INSERT INTO movies (title, description, trailer_link, rating, poster_url, release_date, age_rating, genre, movie_status) 
    VALUES ('$title', '$description', '$trailer_link', '$rating', '$path', '$release_date', '$age_rating', '$genre', '$status')";

    $result = mysqli_query($connect, $insert_query);

    if ($result) {
        echo "<script>
            alert('New movie added successfully');
            window.location.href = 'movies.php';
        </script>";
    } else {
        die("Error: " . mysqli_error($connect));
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