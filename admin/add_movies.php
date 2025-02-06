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
?>



<!-- Update Form -->
<div class="container">
    <h2 class="text-center">Add Movie</h2>
    <form method="post" onsubmit="return validateGenre()" enctype="multipart/form-data">
        <div class="form-group">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description" required>
        </div>
        <div class="form-group">
            <label class="form-label">Trailer Link</label>
            <input type="text" class="form-control" name="trailer_link" required>
        </div>
        <div class="form-group">
            <label class="form-label">Rating</label>
            <input type="text" class="form-control" name="rating" required>
        </div>
        <div class="form-group">
            <label class="form-label">Poster URL</label>
            <input type="file" class="form-control" name="poster_url" required>
        </div>
        <div class="form-group">
            <label class="form-label">Release Date</label>
            <input type="date" class="form-control" name="release_date" required>
        </div>
        <div class="form-group">
            <label class="form-label">Age Rating</label>
            <select name="age" class="form-control" required>
                <option value="G">G (General Audiences)</option>
                <option value="PG">PG (Parental Guidance Suggested)</option>
                <option value="PG-13">PG-13 (Parents Strongly Cautioned)</option>
                <option value="R">R (Restricted)</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Genre (Select at least one)</label><br>
            <input type="checkbox" name="genre[]" value="Action"> Action<br>
            <input type="checkbox" name="genre[]" value="Thriller"> Thriller<br>
            <input type="checkbox" name="genre[]" value="Romance"> Romance<br>
            <input type="checkbox" name="genre[]" value="Horror"> Horror<br>
            <input type="checkbox" name="genre[]" value="Science-fiction"> Science fiction<br>
            <input type="checkbox" name="genre[]" value="Comedy"> Comedy<br>
            <input type="checkbox" name="genre[]" value="Animation"> Animation<br>
            <input type="checkbox" name="genre[]" value="Fiction"> Fiction<br>
            <input type="checkbox" name="genre[]" value="Mystery"> Mystery<br>
            <input type="checkbox" name="genre[]" value="Western"> Western<br>
            <input type="checkbox" name="genre[]" value="Adventure"> Adventure<br>
            <p id="genre-error" style="color:red; display:none;">Please select at least one genre.</p>
        </div>

        <button type="submit" name="add" class="btn btn-primary">Add Movie</button>
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
if (isset($_POST['add'])) {
    // Escape special characters
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $trailer_link = mysqli_real_escape_string($connect, $_POST['trailer_link']);
    $rating = mysqli_real_escape_string($connect, $_POST['rating']);
    $poster_url = $_FILES['poster_url']['name'];
    $tmpname = $_FILES['poster_url']['tmp_name'];
    $path = "img/movie_posters/$poster_url";
    move_uploaded_file($tmpname, $path);
    $release_date = mysqli_real_escape_string($connect, $_POST['release_date']);
    $age_rating = mysqli_real_escape_string($connect, $_POST['age']);

    // Backend Validation: Ensure at least one genre is selected
    if (!isset($_POST['genre']) || empty($_POST['genre'])) {
        echo "<script>alert('Please select at least one genre.');</script>";
        exit;
    }

    // Handle genre (convert array to a comma-separated string)
    $genre = implode(", ", $_POST['genre']);
    $genre = mysqli_real_escape_string($connect, $genre);

    // Insert Query
    $insert_query = "INSERT INTO movies (title, description, trailer_link, rating, poster_url, release_date, age_rating, genre) 
    VALUES ('$title', '$description', '$trailer_link', '$rating', '$path', '$release_date', '$age_rating', '$genre')";

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