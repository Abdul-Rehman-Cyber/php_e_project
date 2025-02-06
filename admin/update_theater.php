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

$query = "select * from theaters where theater_id=$_GET[id]";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);



?>



<!-- Update Form -->

<div class="container" id="content">
    <h2 class="text-center">Update Theater</h2>
    <form method="post">
        <div class="form-group">
            <label class="form-label">Theater Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row['theater_name']; ?>"
                required>
        </div>
        <div class="form-group">
            <label class="form-label">City</label>
            <input type="text" class="form-control" name="city" value="<?php echo $row['city']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" required>
        </div>
        <div class="form-group">
            <label class="form-label">Capacity</label>
            <input type="text" class="form-control" name="capacity" value="<?php echo $row['capacity']; ?>" required>
        </div>

        <div class="form-group">
            <label class="form-label">Available Seat Classes</label><br>
            <input type="checkbox" name="seat_classes[]" value="Gold" <?php echo (strpos($row['available_seat_classes'], 'Gold') !== false) ? 'checked' : ''; ?>> Gold<br>
            <input type="checkbox" name="seat_classes[]" value="Platinum" <?php echo (strpos($row['available_seat_classes'], 'Platinum') !== false) ? 'checked' : ''; ?>> Platinum<br>
            <input type="checkbox" name="seat_classes[]" value="Box" <?php echo (strpos($row['available_seat_classes'], 'Box') !== false) ? 'checked' : ''; ?>> Box<br>
        </div>

        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>

<?php
session_start();
include('header.php');
include('connection.php');

if (!isset($_SESSION['admin_session'])) {
    echo "<script>window.location.href='login.php';</script>";
    exit();
}

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

<!-- Update Form -->
<div class="container" id="content">
    <h2 class="text-center">Update Theater</h2>
    <form method="post">
        <div class="form-group">
            <label class="form-label">Theater Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($row['theater_name']); ?>" required>
        </div>
        <div class="form-group">
            <label class="form-label">City</label>
            <input type="text" class="form-control" name="city" value="<?php echo htmlspecialchars($row['city']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($row['address']); ?>" required>
        </div>
        <div class="form-group">
            <label class="form-label">Capacity</label>
            <input type="number" class="form-control" name="capacity" value="<?php echo htmlspecialchars($row['capacity']); ?>" min="1" required>
        </div>

        <div class="form-group">
            <label class="form-label">Available Seat Classes (Select at least one)</label><br>
            <input type="checkbox" name="seat_classes[]" value="Gold" <?php echo (strpos($row['available_seat_classes'], 'Gold') !== false) ? 'checked' : ''; ?> required> Gold<br>
            <input type="checkbox" name="seat_classes[]" value="Platinum" <?php echo (strpos($row['available_seat_classes'], 'Platinum') !== false) ? 'checked' : ''; ?>> Platinum<br>
            <input type="checkbox" name="seat_classes[]" value="Box" <?php echo (strpos($row['available_seat_classes'], 'Box') !== false) ? 'checked' : ''; ?>> Box<br>
        </div>

        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>

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
