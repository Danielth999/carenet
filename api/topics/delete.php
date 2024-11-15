<?php
include "db.php";  // เชื่อมต่อกับฐานข้อมูล

// ตรวจสอบว่าได้รับ topic_id จาก URL หรือไม่
if (isset($_GET['topic_id'])) {
    $topic_id = $_GET['topic_id'];

    // คำสั่ง SQL สำหรับลบหัวข้อ
    $sql = "DELETE FROM topics WHERE topic_id = '$topic_id'";
    $conn->query($sql);

    // รีเฟรชหรือไปยังหน้าที่แสดงหัวข้อ
    header("Refresh:0;url=../../index.php");
    exit();
}
?>
