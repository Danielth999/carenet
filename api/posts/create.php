<?php
include "../../db.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uid = $_POST['uid'];
    $cid = $_POST['cid'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $imageUrl = null;
    if ($_FILES['image']['name']) {
        $imageName = uniqid() . "_" . basename($_FILES['image']['name']);
        $imageUrl = 'http://localhost/carenet/uploads/' . $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/" . $imageName);
    }

    $conn->query("INSERT INTO posts (user_id, category_id, title, content, image) 
                  VALUES ('$uid', '$cid', '$title', '$content', '$imageUrl')");

header("Refresh:0;url=../../index.php");
}
