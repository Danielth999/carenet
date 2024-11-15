<?php
include "../../db.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = $_POST['pid'];

    $conn->query("DELETE FROM posts WHERE post_id = '$pid' AND user_id = '{$_SESSION['uid']}'");

    header("Refresh:0;url=../../index.php");
}
?>
