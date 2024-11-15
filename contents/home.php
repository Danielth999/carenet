<?php
$sql = "SELECT * FROM posts join users on posts.user_id = users.user_id join category on posts.category_id = category.category_id ORDER BY posts.created_at DESC";
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