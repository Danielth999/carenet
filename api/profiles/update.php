<?php
include "../../db.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['uid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];

    // อัพเดทข้อมูลโปรไฟล์ในฐานข้อมูล
    $conn->query("UPDATE profiles SET first_name = '$fname', last_name = '$lname', age = '$age' WHERE user_id = '$user_id'");
    ?>
    <script>alert("อัพเดทข้อมูลสำเร็จ");</script> 
    <?php
    header("Refresh:0;url=../../profile-form.php");
} else {
    header("Refresh:0;url=../../profile-form.php");
    ?>
    <script>alert("อัพเดทข้อมูลล้มเหลว");</script> 
    <?php
}