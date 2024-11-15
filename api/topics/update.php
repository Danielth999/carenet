<?php
include "../../db.php";  // เชื่อมต่อกับฐานข้อมูล
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tid = $_POST['tid'];
    $title = $_POST['title'];

    // คำสั่ง SQL สำหรับอัปเดตชื่อหัวข้อ 
    $conn->query("UPDATE topics SET title = '$title' WHERE topic_id = '$tid'");
    // รีเฟรชหรือไปยังหน้าที่แสดงหัวข้อ
    header("Refresh:0;url=../../admin/manage_assessments.php");
    exit();
}
