<?php
include "../../db.php";
session_start();
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass =  $_POST['password'];

    $stmt = $conn->query("SELECT * FROM users WHERE email = '$email'");

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($pass, $user['password'])) {
        // Login สำเร็จ
        $_SESSION['uid'] = $user['user_id'];
        $_SESSION['uname'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['login'] = true;

        echo json_encode(['status' => 'success']);
    } else {
        // Login ไม่สำเร็จ
        echo json_encode(['status' => 'fail', 'message' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง']);
    }
}