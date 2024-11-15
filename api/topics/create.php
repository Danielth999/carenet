<?php
include "../../db.php";  // เชื่อมต่อกับฐานข้อมูล
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];

    // คำสั่ง SQL สำหรับเพิ่มหัวข้อใหม่
    $conn->query("INSERT INTO topics (title) VALUES ('$title')");

    // รีเฟรชไปยังหน้าหลักหรือหน้าที่แสดงหัวข้อ
    header("Refresh:0;url=../../admin/manage_assessments.php");
    exit();
}
?>