<?php
include "../../db.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $stmt = $conn->query("SELECT * FROM users WHERE email = '$email'");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['verified_email'] = $email;
        header("Refresh:0;url=../../reset_password.php");
        exit();
    } else {
        header("Refresh:0;url=../../comfirm_email.php");
    }
}
?>
