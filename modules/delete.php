<?php
include '../config/db.php';
session_start();
$user_id = $_SESSION['user']['id'];
$id = $_GET['id'];
$sql_query = "DELETE FROM characters where id='$id' and author_id = '$user_id'";
if (mysqli_query($conn, $sql_query)) {
    header("Location: ../my_posts.php");
} else {
}
?>;