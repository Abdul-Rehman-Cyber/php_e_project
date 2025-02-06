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
            <label class="form-label">Poster_url</label>
            <input type="file" class="form-control" name="poster_url" required>

            <img src="<?php echo $row['poster_url']; ?>" alt="">
        </div>

        <div class="form-group">
            <label class="form-label">title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" required>
        </div>
        <div class="form-group">
            <label class="form-label">description</label>
            <input type="text" class="form-control" name="description" value="<?php echo $row['description']; ?>"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Trailer_link</label>
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

    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $trailer_link = mysqli_real_escape_string($connect, $_POST['trailer_link']);
    $rating = mysqli_real_escape_string($connect, $_POST['rating']);
    $release_date = mysqli_real_escape_string($connect, $_POST['release_date']);
    $age_rating = mysqli_real_escape_string($connect, $_POST['age']);
    $movie_id = mysqli_real_escape_string($connect, $_GET['id']);
    
    // Handle poster upload
    if (!empty($_FILES['poster_url']['name'])) {
        $poster_url = $_FILES['poster_url']['name'];
        $tmpname = $_FILES['poster_url']['tmp_name'];
        $path = "img/movie_posters/$poster_url";
        move_uploaded_file($tmpname, $path);
    } else {
        $path = $row['poster_url']; // Keep existing image if no new upload
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
        genre = '$genre' 
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