<div class="container mt-5">
     <h1 class="text-center mb-4">ติดต่อแอดมิน</h1>
     <div class="row">
          <!-- ฟอร์มส่งข้อความ -->
          <div class="col-md-6">
               <div class="card" style="width: 30rem;">
                    <div class="card-body">
                         <h5 class="card-title">ส่งข้อความถึงแอดมิน</h5>
                         <form action="api/contact/create.php" method="post">
                              <div class="mb-3">
                                   <label for="message" class="form-label">ข้อความของคุณ</label>
                                   <textarea id="message" name="message" class="form-control" rows="5"
                                        placeholder="พิมพ์ข้อความของคุณ..." required></textarea>
                              </div>
                              <button type="submit" class="btn btn-rose rounded-pill">ส่งข้อความ</button>
                         </form>
                    </div>
               </div>
          </div>
          <!-- fetch from table Messages -->
          <?php
          if (isset($_SESSION['uid'])) {
               $uid = $_SESSION['uid'];

               // ปรับ SQL ให้ใช้เฉพาะตาราง messages และ users
               $sql = "SELECT m.*, u.username 
            FROM messages m 
            LEFT JOIN users u ON m.user_id = u.user_id 
            WHERE m.user_id = '$uid' 
            ORDER BY m.created_at DESC";

               $stmt = $conn->query($sql);
               $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
          ?>

          <!-- กล่องข้อความตอบกลับ -->
          <div class="col-md-6">
               <div class="card" style="width: 30rem;">
                    <div class="card-body">
                         <h5 class="card-title">ข้อความจากแอดมิน</h5>
                         <div class="border p-3" style="overflow-y: auto; max-height: 400px;">
                              <?php if (!empty($result)): ?>
                              <?php foreach ($result as $row): ?>
                              <div class="mb-3">
                                   <!-- แสดงข้อความของผู้ใช้ -->
                                   <div class="user-message mb-2">
                                        <p class="mb-1">
                                             <strong><?= htmlspecialchars($row['username']) ?>:</strong>
                                             <?= htmlspecialchars($row['message']) ?>
                                        </p>
                                        <small class="text-muted">
                                             <?= date('d/m/Y H:i', strtotime($row['created_at'])) ?>
                                        </small>
                                   </div>



                                   <?php endforeach; ?>
                                   <?php else: ?>
                                   <p class="text-muted">ยังไม่มีข้อความในระบบ</p>
                                   <?php endif; ?>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>