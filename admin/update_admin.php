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

$query = "select * from admin where id=$_GET[id]";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);



?>



<!-- Update Form -->
<div class="container">
    <h2 class="text-center">Update Admin</h2>
    <form method="post">
        <div class="form-group">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="admin_name" value="<?php echo $row['admin_name']; ?>" required>
        </div>
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="admin_email" value="<?php echo $row['admin_email']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="text" class="form-control" name="admin_password" value="<?php echo $row['admin_password']; ?>" required>
        </div>

        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>
<?php
if (isset($_POST['update'])) {

    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    $update_query = "UPDATE admin SET admin_name = '$admin_name', admin_email = '$admin_email', admin_password = '$admin_password' WHERE id = $_GET[id]";
    
    $result = mysqli_query($connect, $update_query); 


    if ($result) {
        echo "<script>
        
        alert('Update details Successfully');
        window.location.href='admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Failed to update details');
        console.log('" . mysqli_error($connect) . "');
        </script>";
    }

}
?>