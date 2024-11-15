<?php
include "../../db.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_SESSION['verify_email'];
    $npass = $_POST['npass'];
    $cpass = $_POST['cpass'];
    if ($npass !== $cpass) {
        header("Location:../../reset_password.php");
        exit();
    }
    $hashpass = password_hash($npass, PASSWORD_DEFAULT);

    $conn->query("UPDATE users SET `password` = '$npass' WHERE email ='$email'");

    unset($_SESSION['verify_email']);

    header("Location:../../login.php");
}

?>