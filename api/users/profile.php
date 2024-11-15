<?php
include "../../db.php";
session_start();
header('Content-Type: application/json');

// ตรวจสอบว่ามีการล็อกอินหรือไม่
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];

    // คำสั่ง SQL ที่ไม่มีการป้องกัน SQL Injection (ใช้เพียงเพื่อการทดสอบหรือความเข้าใจ)
    $query = "
        SELECT users.username, users.email, profiles.first_name, profiles.last_name, profiles.birth_date, profiles.age
        FROM users
        JOIN profiles ON users.user_id = profiles.user_id
        WHERE users.user_id = '$uid'
    ";
    
    // ดำเนินการกับฐานข้อมูล
    $stmt = $conn->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // ส่งข้อมูลโปรไฟล์กลับเป็น JSON
        echo json_encode([
            'status' => 'success',
            'data' => $result
        ]);
    } else {
        echo json_encode(['status' => 'fail', 'message' => 'ไม่พบข้อมูลโปรไฟล์']);
    }
} else {
    echo json_encode(['status' => 'fail', 'message' => 'กรุณาเข้าสู่ระบบก่อน']);
}
?>
