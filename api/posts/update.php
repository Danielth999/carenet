<?php
include "../../db.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = $_POST['pid'];
    $cid = $_POST['cid'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $conn->query("UPDATE posts SET category_id = '$cid', title = '$title', content = '$content' WHERE post_id = '$pid'");

    header("Refresh:0;url=../../admin/manage_posts.php");
}
?>

