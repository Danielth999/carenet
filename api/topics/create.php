<?php
include "db.php";  // เชื่อมต่อกับฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];

    // คำสั่ง SQL สำหรับเพิ่มหัวข้อใหม่
    $sql = "INSERT INTO topics (title) VALUES ('$title')";
    $conn->query($sql);

    // รีเฟรชไปยังหน้าหลักหรือหน้าที่แสดงหัวข้อ
    header("Refresh:0;url=../../index.php");
    exit();
}
?>