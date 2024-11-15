<?php
include "../../db.php";
session_start();

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
    $result = $check->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        ?>
        <script>alert("ชื่อผู้ใช้หรืออีเมลถูกใช้งานแล้ว")</script>
        <?php
        header("Refresh:0;url=../../signup-form.php");
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
 ?>
 <script>alert("ลงทะเบียนสำเร็จไอ้แก่")</script>
 <?php
    header("Refresh:0;url=../../signin-form.php");
}