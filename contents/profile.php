<?php
if (isset($_SESSION['uid'])) {
     $user_id = $_SESSION['uid'];
}

$sql = "SELECT * FROM profiles join users on profiles.user_id = users.user_id  WHERE profiles.user_id = '$user_id'";
$stmt = $conn->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<div class="card card-width">
     <div class="card-body">

          <!-- ส่วนโปรไฟล์ -->

          <div class="d-flex align-items-start">
               <div>
                    <img id="profileImage" src="https://via.placeholder.com/80" width="80" height="80"
                         alt="Profile Image" class="rounded-circle me-2">
               </div>
               <div>
                    <div class="d-flex align-items-center ">

                         <p id="username" class="fw-bold mb-0"><?= $result['username'] ?></p>
                         <a href="editpro-form.php" class="btn btn-light rounded-pill btn-sm">แก้ไขข้อมูล</a>
                    </div>
                    <p id="email" class="text-muted mb-0"><?= $result['email'] ?></p>
                    <p id="fullName" class="text-muted mb-0"><?= $result['first_name'] ?> <?= $result['last_name'] ?>
                    </p>
                    <p id="age" class="text-muted mb-0"><?= $result['age'] ?></p>
               </div>
          </div>
          <hr>
          <div>
               <h4 class="text-center mb-0">โพสต์ของฉัน</h4>

               <?php
               $sql = "SELECT * FROM posts join users on posts.user_id = users.user_id join category on posts.category_id = category.category_id where posts.user_id = '$user_id' ORDER BY posts.created_at DESC ";
               $post = $conn->query($sql);
               $result = $post->fetchAll(PDO::FETCH_ASSOC);
               ?>
               <!-- post of this account -->
               <?php foreach ($result as $row) : ?>
                    <div class="card card-width border ">
                         <div class="card-body">
                              <div class="d-flex align-items-start">
                                   <img src="https://plus.unsplash.com/premium_photo-1691784781482-9af9bce05096?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjF8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D"
                                        width="40" height="40" alt="a girl" class="rounded-circle me-2">
                                   <div>
                                        <div class="d-flex  align-items-center">

                                             <p class=" fw-bold mb-0"><?php echo $row['username']; // Display username from the row 
                                                                      ?></p>
                                             <small class="text-muted ms-2"><?php echo $row['created_at']; ?></small>
                                             <span class="badge bg-danger ms-2"><?php echo $row['category_name']; // Display category name from the row 
                                                                                ?></span>

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
                                                  <a href="comment-form.php?id=<?= $row['post_id']; ?>"
                                                       class="btn btn-sm btn-light rounded-pill me-2">Reply</a>
                                             </div>
                                             <div>
                                                  <button class="btn btn-sm btn-light rounded-pill me-2 ">
                                                       <?= $row['view'] ?> view
                                                  </button>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               <?php endforeach; ?>
          </div>
     </div>
</div>