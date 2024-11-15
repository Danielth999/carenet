<?php
$sql = "SELECT * FROM posts join users on posts.user_id = users.user_id  
 join category on posts.category_id = category.category_id
 where category.category_name = 'ประชาสัมพันธ์'
 ORDER BY posts.created_at DESC LIMIT 3";
$post = $conn->query($sql);
$result = $post->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="sidebar-sticky">
     <div class="d-flex justify-content-center align-items-center mb-3">
          <h5 class="mb-0 ">ประชาสัมพันธ์</h5>
     </div>

     <div class="post-list">
          <!-- Post item 1 -->
          <?php
          foreach ($result as $row) : ?>
               <div class="card mb-3 border-bottom ">
                    <div class="card-body p-2">
                         <div class="d-flex ">
                              <div>
                                   <small class="text-muted"><?= $row['username'] ?>
                                        <span class="badge bg-danger"><?= $row['category_name'] ?></span>

                                   </small>
                                   <h6 class="mb-1"><?= $row['content'] ?></h6>

                              </div>
                         </div>
                    </div>
               </div>
          <?php endforeach; ?>
     </div>
</div>

<style>
     .card:hover {
          background-color: #f8f9fa !important;
          cursor: pointer;
     }

     .text-muted {
          font-size: 0.8rem;
     }

     .card-body h6 {
          font-size: 0.95rem;
          color: #1a1a1a;
     }
</style>