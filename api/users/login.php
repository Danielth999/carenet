<?php
include "../../db.php";
session_start();
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
        $_SESSION['visit'] = "active";
        $_SESSION['login'] = true;

        header("Refresh:0;url=../../index.php");
    } else {
        // Login ไม่สำเร็จ
        header("Refresh:0;url=../../signup-form.php");
    }
}