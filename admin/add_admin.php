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



<!-- Update Form -->
<div class="container">
    <h2 class="text-center">Add Admin</h2>
    <form method="post">
        <div class="form-group">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="admin_name" required>
        </div>
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="admin_email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="admin_password" required>
        </div>

        <button type="submit" name="add" class="btn btn-primary">Add Admin</button>
    </form>
</div>
<?php
if (isset($_POST['add'])) {
    // Escape special characters
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    
    

    // Insert Query
    $insert_query = "INSERT INTO admin (admin_name, admin_email, admin_password) 
    VALUES ('$admin_name', '$admin_email', '$admin_password')";

    $result = mysqli_query($connect, $insert_query);

    if ($result) {
        echo "<script>
            alert('New admin added successfully');
            window.location.href = 'admin.php';
        </script>";
    } else {
        die("Error: " . mysqli_error($connect));
    }
}


?>