<?php
include "../../db.php";
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าจาก form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];

    // เช็คว่ามีข้อมูลในระบบหรือยัง
    $check = $conn->query("SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    $result = $check->fetch();

    if ($result) {
        echo json_encode(['status' => 'fail', 'message' => 'Username หรือ Email นี้มีผู้ใช้งานแล้ว']);
        exit;
    }

    // เข้ารหัสรหัสผ่าน
    $hashpass = password_hash($password, PASSWORD_DEFAULT);

    // เพิ่มข้อมูลผู้ใช้
    $conn->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashpass')");

    // ดึง ID ล่าสุด
    $uid = $conn->lastInsertId();

    // เพิ่มข้อมูลโปรไฟล์
    $conn->query("INSERT INTO profiles (user_id, first_name, last_name, age) 
                  VALUES ('$uid', '$fname', '$lname', '$age')");

    echo json_encode(['status' => 'success', 'message' => 'ลงทะเบียนสำเร็จ']);
}