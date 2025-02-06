<?php
include "connection.php";

$query = "DELETE FROM theaters WHERE theater_id=$_GET[id]";
if (mysqli_query($connect, $query)) {
    header('Location: theaters.php');
    exit;
} else {
    echo "Error deleting row: " . mysqli_error($connect);
}
?>
