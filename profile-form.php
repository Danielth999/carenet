<?php
include('db.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Fixed Layout</title>
     <link rel="stylesheet" href="lib/bootstrap.min.css">
     <link rel="stylesheet" href="globals.css">
</head>

<body>
     <!-- Navbar -->
     <header class=" fixed-top  nav-bg">
          <?php include('components/navbar.php'); ?>
     </header>

     <div class="container-fluid">
          <div class="row" style="margin-top: 70px;">
               <!-- Sidebar ซ้าย -->
               <nav class="col-md-2 bg-light">
                    <?php include('components/sidebar.php'); ?>
               </nav>

               <!-- Content ตรงกลาง -->
               <main class="col-md-8 d-flex justify-content-center">
                    <div>
                         <?php include('contents/profile.php'); ?>
                    </div>

               </main>

               <!-- Sidebar ขวา -->
               <nav class="col-md-2 bg-light">
                    <?php include('components/rightbar.php'); ?>
               </nav>>
          </div>
     </div>



     <script src="lib/bootstrap.bundle.js"></script>
     <script src="lib/jquery.js"></script>
</body>

</html>