<?php
include "../../db.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $conn->query("DELETE FROM users WHERE user_id = '$id'");

    header("Refresh:0;url=../../index.php");
}
?>
