<?php
include '../db.php'; // เชื่อมต่อฐานข้อมูล

// คำนวณข้อมูลรวมจากตารางต่างๆ
$query = "
    SELECT 
        (SELECT COUNT(*) FROM users) AS total_users,
        (SELECT COUNT(*) FROM posts) AS total_posts,
        (SELECT AVG(rating) FROM reviews) AS average_rating,
        (SELECT COUNT(*) FROM comments) AS total_comments
";
$stmt = $conn->query($query);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// ดึงข้อมูลแสดงความคิดเห็นจากตาราง comments
$commentsQuery = "SELECT c.comment_id, c.content, c.created_at, u.username FROM comments c JOIN users u ON c.user_id = u.user_id ORDER BY c.created_at DESC";
$commentsStmt = $conn->query($commentsQuery);
$comments = $commentsStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include('components/header.php'); ?>

<div class="container mt-5">
     <h1>ระบบรายงานผล</h1>
     <div class="row">
          <div class="col-md-3">
               <div class="card bg-info text-white">
                    <div class="card-body">
                         <h5 class="card-title">จำนวนสมาชิก</h5>
                         <p class="card-text"><?= $data['total_users'] ?></p>
                    </div>
               </div>
          </div>
          <div class="col-md-3">
               <div class="card bg-success text-white">
                    <div class="card-body">
                         <h5 class="card-title">จำนวนโพสต์</h5>
                         <p class="card-text"><?= $data['total_posts'] ?></p>
                    </div>
               </div>
          </div>
          <div class="col-md-3">
               <div class="card bg-warning text-white">
                    <div class="card-body">
                         <h5 class="card-title">คะแนนเฉลี่ยของแบบประเมิน</h5>
                         <p class="card-text"><?= round($data['average_rating'], 2) ?></p>
                    </div>
               </div>
          </div>
          <div class="col-md-3">
               <div class="card bg-primary text-white">
                    <div class="card-body">
                         <h5 class="card-title">จำนวนความคิดเห็น</h5>
                         <p class="card-text"><?= $data['total_comments'] ?></p>
                    </div>
               </div>
          </div>
     </div>

</div>