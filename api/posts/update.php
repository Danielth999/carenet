<?php
include "../../db.php";
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = $_POST['pid'];
    $cid = $_POST['cid'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $imageUrl = null;
    if ($_FILES['image']['name']) {
        $imageName = uniqid() . "_" . basename($_FILES['image']['name']);
        $imageUrl = 'http://localhost/carenet/uploads/' . $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/" . $imageName);
    }

    $conn->query("UPDATE posts SET category_id = '$cid', title = '$title', content = '$content', image = '$imageUrl' WHERE post_id = '$pid' AND user_id = '{$_SESSION['uid']}'");

    header("Refresh:0;url=../../index.php");
}
?>

