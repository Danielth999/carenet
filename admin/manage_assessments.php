<?php
include '../db.php'; // เชื่อมต่อฐานข้อมูล

// ดึงข้อมูลจากตาราง topics
$query = "SELECT * FROM topics ORDER BY created_at DESC";
$stmt = $conn->query($query);
$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include('components/header.php'); ?>

<div class="container mt-5">
     <h1>จัดการแบบประเมิน</h1>
     <div class="d-flex justify-content-end mb-3">
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPostModal">+ แบบประเมิน</button>
     </div>

     <!-- Modal เพิ่มโพสต์ -->
     <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="addPostModalLabel">เพิ่มโพสต์ใหม่</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                         <!-- ฟอร์มเพิ่มโพสต์ -->
                         <form action="../api/topics/create.php" method="POST">
                              <div class="mb-3">
                                   <label for="title" class="form-label">หัวข้อโพสต์</label>
                                   <input type="text" class="form-control" id="title" name="title"
                                        placeholder="กรอกหัวข้อ" required>
                              </div>
                              <button type="submit" class="btn btn-primary">เพิ่มแบบประเมิน</button>
                    </div>
                    <!-- CREATE BUTTON FOR SUBMIT -->

                    </form> <!-- ปิดฟอร์มที่นี่ -->
               </div>
          </div>
     </div>

     <!-- ตารางแสดงข้อมูล topics -->
     <table class="table table-striped">
          <thead>
               <tr>
                    <th>#</th>
                    <th>หัวข้อ</th>
                    <th>วันที่สร้าง</th>
                    <th>วันที่แก้ไข</th>
                    <th>การกระทำ</th>
               </tr>
          </thead>
          <tbody>
               <form method="POST" action="../api/topics/update.php">
                    <?php foreach ($topics as $index => $topic): ?>
                         <tr>
                              <td><?= $index + 1 ?></td>
                              <td>
                                   <input type="hidden" name="tid" value="<?= $topic['topic_id'] ?>">
                                   <input type="text" name="title" class="form-control"
                                        value="<?= htmlspecialchars($topic['title']) ?>">
                              </td>
                              <td><?= $topic['created_at'] ?></td>
                              <td><?= $topic['updated_at'] ?></td>
                              <td>
                                   <button type="submit" class="btn btn-warning btn-sm">แก้ไข</button>
                                   <a href="../api/topics/delete.php?id=<?php echo $topic['topic_id']; ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบ?');">ลบ</a>
                              </td>
                         </tr>
                    <?php endforeach; ?>
               </form>
          </tbody>
     </table>


</div>