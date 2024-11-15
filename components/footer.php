<?php
if (isset($_SESSION['visit']) && $_SESSION['visit'] === "active") {
     $conn->query("UPDATE visits SET visit = visit + 1");
     $_SESSION['visit'] = "inactive"; // ปิดการทำงาน session visit
 }

// ดึงจำนวนการเข้าชมปัจจุบัน
$result = $conn->query("SELECT visit FROM visits");
$row = $result->fetch(PDO::FETCH_ASSOC);

// กำหนดค่าเริ่มต้นให้ $view เป็น 0 ถ้าไม่มีข้อมูล
$view = isset($row['visit']) ? $row['visit'] : 0;



?>

<footer>
     <small>
          &copy;<?php echo date('Y'); ?>. Rayong Technical College
     </small>
     <div>
          <small>
               ผู้เข้าชม: <?php echo number_format($view); ?>
          </small>
     </div>
</footer>