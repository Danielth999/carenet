<?php
$post_id = $_GET['id'];
$sql = "UPDATE posts SET view = view + 1 WHERE post_id = $post_id"; // ไม่ใช้การป้องกัน SQL Injection
$update = $conn->query($sql);

$sql = "SELECT * FROM posts join users on posts.user_id = users.user_id where posts.post_id = '$post_id' ";
$post = $conn->query($sql);
$result = $post->fetchAll(PDO::FETCH_ASSOC);

?>
<?php foreach ($result as $row) : ?>
     <div class="card card-width border ">
          <div class="card-body">
               <div class="d-flex align-items-start">
                    <img src="https://plus.unsplash.com/premium_photo-1691784781482-9af9bce05096?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjF8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D"
                         width="40" height="40" alt="a girl" class="rounded-circle me-2">
                    <div>
                         <div class="d-flex align-items-center">
                              <p class="fw-bold mb-0"><?php echo $row['username']; // Display username from the row 
                                                       ?></p>
                              <small class="text-muted ms-2"><?php echo $row['created_at']; // Format and display created date 
                                                                 ?></small>
                         </div>
                         <h4><?= $row['title'] ?></h4>
                         <p class="card-text mt-1"><?php echo $row['content']; // Display post content 
                                                       ?></p>
                         <?php if (!empty($row['image'])) : // Check if post has an image 
                         ?>
                              <img src="<?php echo $row['image']; ?>" class="card-img-top my-2" alt="post image">
                         <?php endif; ?>
                         <div class="d-flex justify-content-between align-items-center mt-2">
                              <div>
                                   <button class="btn btn-sm btn-light rounded-pill me-2">Like</button>
                                   <a href="comment-form.php<?= $row['post_id']; ?>"
                                        class="btn btn-sm btn-light rounded-pill me-2">Reply</a>
                              </div>
                              <div>
                                   <button class="btn btn-sm btn-light rounded-pill me-2 ">
                                        view
                                   </button>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
<?php endforeach; ?>
<!-- ส่วนแสดงความคิดเห็น -->
<?php if (!isset($_SESSION['login'])): ?>
<?php else: ?>
     <div class="mt-3 card-width">
          <form action="api/comment/create.php" method="post">
               <input type="hidden" name="pid" value="<?= $post_id ?>">
               <textarea name="com" class="form-control" placeholder="แสดงความคิดเห็น"></textarea>
               <div class="d-flex justify-content-end mt-2">
                    <button type="reset" class="btn btn-light rounded-pill me-2">ยกเลิก</button>
                    <button type="submit" class="btn-rose rounded-pill">ยืนยัน</button>
               </div>
          </form>
     </div>
<?php endif; ?>

<!-- ส่วนแสดงความคิดเห็นเพิ่มเติม -->
<div class="card-width mt-5" id="com">
     <h5>ความคิดเห็น </h5>

     <!-- Comment เดี่ยว -->
     <?php
     $sql = "SELECT * FROM comments join users on comments.user_id = users.user_id where comments.post_id = '$post_id' ORDER BY comments.created_at DESC";
     $com = $conn->query($sql);
     $result = $com->fetchAll(PDO::FETCH_ASSOC);
     ?>
     <?php foreach ($result as $row) : ?>
          <div class="card w-75 mb-3">
               <div class="card-body">
                    <div class="d-flex align-items-start">
                         <img src="https://plus.unsplash.com/premium_photo-1691784781482-9af9bce05096?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjF8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D"
                              width="40" height="40" alt="a girl" class="rounded-circle me-2">
                         <div>
                              <div class="d-flex align-items-center">
                                   <p class="fw-bold mb-0"><?= $row['username'] ?></p>
                                   <small class="text-muted ms-2">
                                        <?= date("d/m/y", strtotime($row['created_at'])) ?>
                                   </small>
                              </div>
                              <p class="card-text mt-1"><?= $row['content'] ?></p>

                         </div>
                    </div>
               </div>
          </div>
     <?php endforeach; ?>

</div>