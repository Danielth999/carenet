<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin Panel</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="../lib/bootstrap.min.css">
</head>

<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
               <a class="navbar-brand" href="/admin/report.php">Admin Panel</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                         <li class="nav-item"><a class="nav-link" href="../index.php">หน้าหลัก</a></li>
                         <li class="nav-item"><a class="nav-link" href="manage_users.php">จัดการสมาชิก</a></li>
                         <li class="nav-item"><a class="nav-link" href="manage_posts.php">จัดการโพสต์</a></li>
                         <li class="nav-item"><a class="nav-link" href="manage_messages.php">จัดการข้อความ</a>
                         </li>
                         <li class="nav-item"><a class="nav-link" href="manage_assessments.php">จัดการแบบประเมิน</a>
                         </li>
                         <li class="nav-item"><a class="nav-link" href="reports.php">รายงานผล</a></li>
                    </ul>
               </div>
          </div>
     </nav>

     <script src="lib/bootstrap.bundle.js"></script>
</body>