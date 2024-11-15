<?php
$sql = "SELECT * FROM topics";
$topics = $conn->query($sql);
$topics = $topics->fetchAll(PDO::FETCH_ASSOC);
?>

<div>
     <h1>แบบประเมินเว็บไซต์</h1>
     <div class="card card-width">
          <div class="card-body">
               <form action="api/review/create.php" method="post">
                    <!-- ลูปเพื่อแสดงคำถามจากฐานข้อมูล -->
                    <?php foreach ($topics as $index => $topic) : ?>
                         <div class="mb-3">
                              <p><?= ($index + 1) . '. ' . htmlspecialchars($topic['title']); ?></p>

                              <!-- ส่ง topic_id ไปกับคำตอบ -->
                              <input type="hidden" name="topic_id_<?= $topic['topic_id'] ?>"
                                   value="<?= $topic['topic_id'] ?>">

                              <div class="flex-col">
                                   <label><input type="radio" name="question_<?= $topic['topic_id'] ?>" value="1" required>
                                        ไม่พอใจ</label>
                                   <label><input type="radio" name="question_<?= $topic['topic_id'] ?>" value="3">
                                        ปานกลาง</label>
                                   <label><input type="radio" name="question_<?= $topic['topic_id'] ?>" value="5">
                                        พอใจมากพอ</label>
                              </div>
                         </div>
                    <?php endforeach; ?>

                    <!-- ปุ่มส่งแบบประเมิน -->
                    <button type="submit" class="btn btn-rose rounded-pill">ส่งแบบประเมิน</button>
               </form>
          </div>
     </div>
</div>