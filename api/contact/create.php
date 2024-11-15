<?php
include "../../db.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['uid'];  // รับค่า user_id จาก session
    $message = $_POST['message']; // รับข้อความจากฟอร์ม

    // สั่งเพิ่มข้อความเข้าไปในตาราง messages
    $conn->query("INSERT INTO messages (user_id, message) VALUES ($user_id, '$message')");

    // รีเฟรชไปยังหน้าติดต่อแอดมิน
    echo "<script>alert('ส่งข้อความสำเร็จ.'); window.location.href = '../../contact-form.php';</script>";
    exit();
}
?>
