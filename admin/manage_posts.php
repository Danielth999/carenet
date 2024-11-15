<?php
include('../db.php'); // เชื่อมต่อฐานข้อมูล
session_start();
?>
<?php include('components/header.php'); ?>

<?php
// สร้าง SQL Query สำหรับดึงข้อมูลโพสต์และหมวดหมู่จากตาราง categories
$query = "
    SELECT p.post_id, p.category_id, p.title, p.content, p.image, p.view, p.created_at, p.updated_at, c.category_name
    FROM posts p
    INNER JOIN category c ON p.category_id = c.category_id
";

// Fetch ข้อมูลจากฐานข้อมูล
$result = $conn->query($query);
$posts = $result->fetchAll(PDO::FETCH_ASSOC);

// ดึงข้อมูลหมวดหมู่ทั้งหมดจากฐานข้อมูล
$categoryQuery = "SELECT category_id, category_name FROM category";
$categoryResult = $conn->query($categoryQuery);
$categories = $categoryResult->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
     <h1>จัดการโพสต์</h1>
     <!-- ปุ่มเพิ่มโพสต์ -->
     <div class="d-flex justify-content-end mb-3">
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPostModal">+ เพิ่มโพสต์</button>
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
                         <form action="../api/posts/create.php" method="POST" enctype="multipart/form-data">
                              <div class="mb-3">
                                   <label for="title" class="form-label">หัวข้อโพสต์</label>
                                   <input type="text" class="form-control" id="title" name="title"
                                        placeholder="กรอกหัวข้อโพสต์" required>
                              </div>
                              <div class="mb-3">
                                   <label for="content" class="form-label">เนื้อหาของโพสต์</label>
                                   <textarea class="form-control" id="content" name="content"
                                        placeholder="กรอกเนื้อหาโพสต์" required></textarea>
                              </div>
                              <div class="mb-3">
                                   <label for="category_id" class="form-label">หมวดหมู่</label>
                                   <select name="cid" class="form-select" required>
                                        <option value="">เลือกหมวดหมู่</option>
                                        <!-- แสดงหมวดหมู่จากฐานข้อมูล -->
                                        <?php foreach ($categories as $category): ?>
                                             <option value="<?php echo $category['category_id']; ?>">
                                                  <?php echo htmlspecialchars($category['category_name']); ?>
                                             </option>
                                        <?php endforeach; ?>
                                   </select>
                              </div>
                              <div class="mb-3">
                                   <label for="image" class="form-label">อัปโหลดรูปภาพ</label>
                                   <input type="file" class="form-control" id="image" name="image">
                              </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                         <button type="submit" class="btn btn-primary">เพิ่มโพสต์</button>
                    </div>
                    </form> <!-- ปิดฟอร์มที่นี่ -->
               </div>
          </div>
     </div>

     <!-- ตารางโพสต์ -->
     <table class="table table-striped">
          <thead>
               <tr>
                    <th>#</th>
                    <th>หัวข้อโพสต์</th>
                    <th>หมวดหมู่</th>
                    <th>เนื้อหา</th>
                    <th>รูปภาพ</th>
                    <th>การมองเห็น</th>
                    <th>วันที่สร้าง</th>
                    <th>วันที่อัพเดต</th>
                    <th>การกระทำ</th>
               </tr>
          </thead>
          <tbody>
               <?php if (!empty($posts)): ?>
                    <?php foreach ($posts as $index => $post): ?>
                         <tr>
                              <form method="POST" action="../api/posts/update.php">
                                   <td><?php echo $index + 1; ?></td>
                                   <td>
                                        <input type="hidden" name="pid" value="<?php echo $post['post_id']; ?>">
                                        <input type="text" name="title" class="form-control"
                                             value="<?php echo htmlspecialchars($post['title']); ?>" required>
                                   </td>
                                   <td>
                                        <!-- แก้ไขหมวดหมู่ -->
                                        <select name="cid" class="form-select" required>
                                             <?php foreach ($categories as $category): ?>
                                                  <option value="<?php echo $category['category_id']; ?>"
                                                       <?php echo $post['category_id'] == $category['category_id'] ? 'selected' : ''; ?>>
                                                       <?php echo htmlspecialchars($category['category_name']); ?>
                                                  </option>
                                             <?php endforeach; ?>
                                        </select>
                                   </td>
                                   <td>
                                        <textarea name="content" class="form-control"
                                             required><?php echo htmlspecialchars($post['content']); ?></textarea>
                                   </td>
                                   <td>
                                        <?php if ($post['image']): ?>
                                             <img src="<?php echo $post['image']; ?>" alt="image" width="100">
                                        <?php else: ?>
                                             ไม่มีรูปภาพ
                                        <?php endif; ?>
                                   </td>
                                   <td>
                                        <input type="number" disabled name="view" class="form-control"
                                             value="<?php echo $post['view']; ?>" required>
                                   </td>
                                   <td>
                                        <?php echo $post['created_at']; ?>
                                   </td>
                                   <td>
                                        <?php echo $post['updated_at']; ?>
                                   </td>
                                   <td>
                                        <div>
                                             <button type="submit" class="btn btn-primary w-100 btn-sm">บันทึก</button>
                                        </div>
                                        <div>
                                             <a href="../api/posts/delete.php?id=<?php echo $post['post_id']; ?>"
                                                  class="btn btn-danger btn-sm w-100"
                                                  onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบโพสต์นี้?');">ลบ</a>
                                        </div>
                                   </td>
                              </form>
                         </tr>
                    <?php endforeach; ?>
               <?php else: ?>
                    <tr>
                         <td colspan="9" class="text-center">ไม่พบข้อมูลโพสต์</td>
                    </tr>
               <?php endif; ?>
          </tbody>

     </table>
</div>