<?php
include "db.php";  // เชื่อมต่อกับฐานข้อมูล

// ตรวจสอบว่าได้รับ topic_id จาก URL หรือไม่
if (isset($_POST['topic_id'])) {
    $topic_id = $_POST['topic_id'];

    // ดึงข้อมูลหัวข้อที่ต้องการแก้ไข
    $sql = "SELECT * FROM topics WHERE topic_id = '$topic_id'";
    $result = $conn->query($sql);
    $topic = $result->fetch(PDO::FETCH_ASSOC);

    if (!$topic) {
        die("ไม่พบหัวข้อนี้ในระบบ");
    }

    // เมื่อมีการแก้ไข
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];

        // คำสั่ง SQL สำหรับอัปเดตชื่อหัวข้อ
        $sql = "UPDATE topics SET title = '$title' WHERE topic_id = '$topic_id'";
        $conn->query($sql);

        // รีเฟรชหรือไปยังหน้าที่แสดงหัวข้อ
        header("Location: view_topics.php");
        exit();
    }
}
?>
