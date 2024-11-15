<?php
include "../../db.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $conn->query("DELETE FROM users WHERE user_id = '$id'");

    header("Refresh:0;url=../../admin/manage_users.php");
}
