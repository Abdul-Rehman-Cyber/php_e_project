<?php
include "connection.php";

$query = "DELETE FROM admin WHERE id=$_GET[id]";
if (mysqli_query($connect, $query)) {
    header('Location: admin.php');
    exit;
} else {
    echo "Error deleting row: " . mysqli_error($connect);
}
?>
