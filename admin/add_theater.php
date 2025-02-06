<?php
session_start();
include('header.php');
include('connection.php');

if(!isset($_SESSION['admin_session'])){

    echo
    "<script>
    window.location.href='login.php';

    </script>";
}
?>



<!-- Add Theater Form -->
<div class="container">
    <h2 class="text-center">Add Theater</h2>
    <form method="post">
        <div class="form-group">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label class="form-label">City</label>
            <input type="text" class="form-control" name="city" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="address" required>
        </div>
        <div class="form-group">
            <label class="form-label">Capacity</label>
            <input type="number" class="form-control" name="capacity" min="1" required>
        </div>
        <div class="form-group">
            <label class="form-label">Available Seat Classes (Select at least one)</label><br>
            <input type="checkbox" name="seat_classes[]" value="Gold" required> Gold<br>
            <input type="checkbox" name="seat_classes[]" value="Platinum"> Platinum<br>
            <input type="checkbox" name="seat_classes[]" value="Box"> Box<br>
        </div>

        <button type="submit" name="add" class="btn btn-primary">Add Theater</button>
    </form>
</div>

<?php

if (isset($_POST['add'])) {
    // Check if all fields are filled
    if (
        !empty($_POST['name']) &&
        !empty($_POST['city']) &&
        !empty($_POST['address']) &&
        !empty($_POST['capacity']) &&
        isset($_POST['seat_classes']) // Ensures at least one seat class is selected
    ) {
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $city = mysqli_real_escape_string($connect, $_POST['city']);
        $address = mysqli_real_escape_string($connect, $_POST['address']);
        $capacity = mysqli_real_escape_string($connect, $_POST['capacity']);
        $seat_classes_string = implode(", ", $_POST['seat_classes']);

        // Insert Query
        $insert_query = "INSERT INTO theaters (theater_name, city, address, capacity, available_seat_classes) 
                         VALUES ('$name', '$city', '$address', '$capacity', '$seat_classes_string')";

        $result = mysqli_query($connect, $insert_query);

        if ($result) {
            echo "<script>
                alert('New theater added successfully');
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