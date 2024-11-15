<div class="card card-width">
     <h3 class="card-title text-center">สร้างโพสต์</h3>
     <p class="text-center" id="message"></p>
     <form id="handleSubmit" action="api/posts/create.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
               <label for="title" class="form-label">หัวข้อ</label>
               <input type="text" id="title" name="title" class="form-control">
          </div>
          <div class="mb-3">
               <label for="content" class="form-label">เนื้อหา</label>
               <textarea id="content" name="content" class="form-control"></textarea>
          </div>
          <div class="mb-3">
               <label for="image" class="form-label">รูปภาพ</label>
               <input type="file" id="image" name="image" class="form-control">
               <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
          </div>

          <?php
          if ($_SESSION['role'] === 'user') {
               $sql = "SELECT * FROM category WHERE category_name != 'ประชาสัมพันธ์'";
          } else {
               $sql = "SELECT * FROM category";
          }
          $category = $conn->query($sql);
          $result = $category->fetchAll(PDO::FETCH_ASSOC);
          ?>
          <div class="mb-3">
               <label for="category" class="form-label">หมวดหมู่</label>
               <select id="cid" name="cid" class="form-control">
                    <option value="0" selected>เลือกหมวดหมู่</option>
                    <?php foreach ($result as $row) : ?>
                         <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                    <?php endforeach; ?>
               </select>
               <button type="submit" class="btn-rose rounded-pill mt-2 w-100">สร้างโพสต์</button>
     </form>
</div>
<script src="lib/jquery.js"></script>
<!-- <script>
$(document).ready(function() {
     $('#handleSubmit').on('submit', function(event) {
          event.preventDefault();
          const title = $('#title').val();
          const content = $('#content').val();
          const image = $('#image').prop('files')[0];
          const category = $('#cid').val();
          const formData = new FormData(this);
          $.ajax({
               url: 'api/posts/create.php',
               type: 'POST',
               data: formData,
               success: function(response) {
                    if (response.status === 'success') {
                         $("#message").text('สร้างโพสต์สำเร็จ').css('color',
                              'green');
                         window.location.href = 'index.php';
                    } else {
                         $("#message").text('เกิดข้อผิดพลาด').css('color', 'red');
                    }
               }
          })

     })
})
</script> -->