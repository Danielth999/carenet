<?php
include "../../db.php";
session_start();

// รับข้อมูลจากฟอร์ม
$message_id = $_POST['message_id'];  // รับ message_id
$response = $_POST['response'];      // รับข้อความตอบกลับจากแอดมิน

// อัปเดตข้อความในฐานข้อมูล
$conn->query("UPDATE messages SET response = '$response' WHERE id = $message_id");

echo "Response sent!";
?>
