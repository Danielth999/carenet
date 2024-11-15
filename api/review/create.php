<?php
include "../../db.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['uid'];

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'question_') === 0) {
            $topic_id = str_replace('question_', '', $key);
            $rating = $_POST["question_$topic_id"];

            // เช็คว่าผู้ใช้ให้คะแนนหัวข้อนี้หรือยัง
            $check = $conn->query("SELECT 1 FROM reviews WHERE user_id = '$user_id' AND topic_id = '$topic_id'");
            if ($check->rowCount() == 0) {
                $conn->query("INSERT INTO reviews (topic_id, user_id, rating) VALUES ('$topic_id', '$user_id', '$rating')");
                ?>
                <script>alert("ส่งแบบปะเมินสำเร็จ");</script> 
                <?php
            } else {
                ?>
                <script>alert("คุณได้ให้คะแนนหัวข้อนี้แล้ว.");</script> 
                <?php
                header("Refresh:0;url=../../assessment-form.php");
                exit;
            }
        }
    }

    header("Refresh:0;url=../../assessment-form.php");
    exit();
}
