<?php
include '../db.php';
session_start();
include('components/header.php');


$query = "SELECT * FROM messages join users on messages.user_id = users.user_id ORDER BY messages.created_at DESC";
$stmt = $conn->query($query);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
     <h1>จัดการข้อความ</h1>
     <table class="table table-striped">
          <thead>
               <tr>
                    <th>#</th>
                    <th>ผู้ส่ง</th>
                    <th>ข้อความ</th>
                    <th>วันที่ส่ง</th>

               </tr>
          </thead>
          <tbody>
               <?php foreach ($messages as $index => $message): ?>
                    <tr>
                         <td><?= $index + 1 ?></td>
                         <td><?= htmlspecialchars($message['username']) ?></td>
                         <td><?= htmlspecialchars($message['message']) ?></td>
                         <td><?= $message['created_at'] ?></td>

                    </tr>
               <?php endforeach; ?>
          </tbody>
     </table>
</div>