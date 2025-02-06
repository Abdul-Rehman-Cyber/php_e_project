<?php
include "connection.php";

$query = "DELETE FROM movies WHERE movie_id=$_GET[id]";
if (mysqli_query($connect, $query)) {
    header('Location: movies.php');
    exit;
} else {
    echo "Error deleting row: " . mysqli_error($connect);
}
?>
