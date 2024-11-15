<?php
include('../db.php'); // เชื่อมต่อฐานข้อมูล
session_start();
?>
<?php include('components/header.php'); ?>

<?php
// คำค้นหาจากฟอร์ม
$search = isset($_GET['search']) ? $_GET['search'] : '';

// สร้าง SQL Query สำหรับค้นหาหรือแสดงข้อมูลทั้งหมด
$query = "SELECT * FROM users";
if (!empty($search)) {
     $search = htmlspecialchars($search);
     $query .= " WHERE username LIKE '%$search%' OR email LIKE '%$search%'";
}

// Fetch ข้อมูลจากฐานข้อมูล
$result = $conn->query($query);
$users = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
     <h1>จัดการสมาชิก</h1>
     <!-- ปุ่มเพิ่มสมาชิก -->
     <div class="d-flex justify-content-end mb-3">
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">+ เพิ่มสมาชิก</button>
     </div>

     <!-- Modal เพิ่มสมาชิก -->
     <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="addUserModalLabel">เพิ่มสมาชิกใหม่</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                         <!-- ฟอร์มเพิ่มสมาชิก -->
                         <form action="../api/users/create.php" method="POST">
                              <div class="mb-3">
                                   <label for="username" class="form-label">ชื่อผู้ใช้</label>
                                   <input type="text" class="form-control" id="username" name="uname"
                                        placeholder="กรอกชื่อผู้ใช้" required>
                              </div>
                              <div class="mb-3">
                                   <label for="email" class="form-label">อีเมล</label>
                                   <input type="email" class="form-control" id="email" name="email"
                                        placeholder="กรอกอีเมล" required>
                              </div>
                              <div class="mb-3">
                                   <label for="pass" class="form-label">รหัสผ่าน</label>
                                   <input type="password" class="form-control" id="pass" name="pass"
                                        placeholder="กรอกรหัส" required>
                              </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                         <button type="submit" class="btn btn-primary">เพิ่ม</button>
                    </div>
                    </form> <!-- ปิดฟอร์มที่นี่ -->
               </div>
          </div>
     </div>

     <!-- ส่วนค้นหา -->
     <form class="d-flex mb-4" method="GET" action="">
          <input class="form-control me-2" type="text" name="search" placeholder="ค้นหาชื่อผู้ใช้หรืออีเมล"
               value="<?php echo htmlspecialchars($search); ?>">
          <button class="btn btn-primary" type="submit">ค้นหา</button>
     </form>

     <!-- ตารางสมาชิก -->
     <table class="table table-striped">
          <thead>
               <tr>
                    <th>#</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>อีเมล</th>
                    <th>บทบาท</th>
                    <th>การกระทำ</th>
               </tr>
          </thead>
          <tbody>
               <?php if (!empty($users)): ?>
               <?php foreach ($users as $index => $user): ?>
               <tr>
                    <!-- แสดงข้อมูลในฟอร์ม -->
                    <form method="POST" action="../api/users/update.php">
                         <td><?php echo $index + 1; ?></td>
                         <td>
                              <input type="hidden" name="uid" value="<?php echo $user['user_id']; ?>">
                              <input type="text" name="uname" class="form-control"
                                   value="<?php echo htmlspecialchars($user['username']); ?>" required>
                         </td>
                         <td>
                              <input type="email" name="email" class="form-control" disabled
                                   value="<?php echo htmlspecialchars($user['email']); ?>" required>
                         </td>
                         <td>
                              <select name="role" class="form-select">
                                   <option value="Admin" <?php echo $user['role'] === 'admin' ? 'selected' : ''; ?>>
                                        Admin</option>
                                   <option value="User" <?php echo $user['role'] === 'user' ? 'selected' : ''; ?>>User
                                   </option>
                              </select>
                         </td>
                         <td>
                              <button type="submit" class="btn btn-primary btn-sm">บันทึก</button>
                              <a href="../api/users/delete.php?id=<?php echo $user['user_id']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบผู้ใช้นี้?');">ลบ</a>
                         </td>
                    </form>
               </tr>
               <?php endforeach; ?>
               <?php else: ?>
               <tr>
                    <td colspan="5" class="text-center">ไม่พบข้อมูลสมาชิก</td>
               </tr>
               <?php endif; ?>
          </tbody>
     </table>
</div>