<?php
include "../../db.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['pid'];
    $content = $_POST['com'];
    $userId = $_SESSION['uid'];

    $conn->query("INSERT INTO comments (user_id, post_id, content) VALUES ('$userId', '$postId', '$content')");
    header("Refresh:0;url=../../comment-form.php?id=" . $postId);
}
