<?php
include "../../db.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['uid'];
    $uname = $_POST['uname'];
    $role = $_POST['role'];

    // อัพเดทข้อมูลโปรไฟล์ในฐานข้อมูล
    $conn->query("UPDATE users SET username = '$uname', role = '$role' WHERE user_id = '$id'");
    ?>
    <script>alert("อัพเดทข้อมูลสำเร็จ");</script> 
    <?php
    header("Refresh:0;url=../../admin/manage_users.php");
} else {
    header("Refresh:0;url=../../admin/manage_users.php");
    ?>
    <script>alert("อัพเดทข้อมูลล้มเหลว");</script> 
    <?php
}