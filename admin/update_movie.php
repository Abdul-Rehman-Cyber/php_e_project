<?php
session_start();
include('header.php');
include('connection.php');

if (!isset($_SESSION['admin_session'])) {

    echo
        "<script>
    window.location.href='login.php';

    </script>";
}

$query = "select * from movies where movie_id=$_GET[id]";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);



?>



<!-- Update Form -->

<div class="container" id="content">
    <h2 class="text-center">Update Movie</h2>
    <form method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label class="form-label">Movie_Poster</label>
            <input type="file" class="form-control" name="poster_url" value="<?php echo $row['poster_url']; ?>">

            <img class="mt-3" src="<?php echo $row['poster_url']; ?>" alt="" width="300px" height="auto">
        </div>

        <div class="form-group">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" required>
        </div>
        <div class="form-group">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description" value="<?php echo $row['description']; ?>"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Trailer_Code</label>
            <input type="text" class="form-control" name="trailer_link" value="<?php echo $row['trailer_link']; ?>"
                required>
        </div>
        <div class="form-group">
            <label class="form-label">Rating</label>
            <input type="text" class="form-control" name="rating" value="<?php echo $row['rating']; ?>" required>
        </div>


        <div class="form-group">
            <label class="form-label">Release_date</label>
            <input type="date" class="form-control" name="release_date" value="<?php echo $row['release_date']; ?>"
                required>
        </div>
        <div class="form-group">
            <label class="form-label">Age_rating</label>
            <select name="age" class="form-control">
                <option value="G" <?php echo ($row['age_rating'] == 'G' ? 'selected' : ''); ?>>G (General Audiences)
                </option>
                <option value="PG" <?php echo ($row['age_rating'] == 'PG' ? 'selected' : ''); ?>>PG (Parental Guidance
                    Suggested)</option>
                <option value="PG-13" <?php echo ($row['age_rating'] == 'PG-13' ? 'selected' : ''); ?>>PG-13 (Parents
                    Strongly Cautioned)</option>
                <option value="R" <?php echo ($row['age_rating'] == 'R' ? 'selected' : ''); ?>>R (Restricted)</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="Released" <?php echo ($row['movie_status'] == 'Released' ? 'selected' : ''); ?>>Released
                </option>
                <option value="Comming_Soon" <?php echo ($row['movie_status'] == 'Comming_Soon' ? 'selected' : ''); ?>>
                    Comming Soon</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Genre (Select at least one)</label><br>
            <?php
            // Check if the genre field exists and is not empty.
            if (isset($row['genre']) && !empty($row['genre'])) {
                // Explode the comma-separated string and trim each element to remove extra spaces.
                $selectedGenres = array_map('trim', explode(',', $row['genre']));
            } else {
                $selectedGenres = [];
            }

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
                $isChecked = in_array($genre, $selectedGenres) ? 'checked' : '';
                echo '<input type="checkbox" name="genre[]" value="' . $genre . '" ' . $isChecked . '> ' . $genre . '<br>';
            }
            ?>
        </div>




        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>
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