<?php
include('db.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home</title>
     <link rel="stylesheet" href="lib/bootstrap.min.css">
     <link rel="stylesheet" href="globals.css">
</head>

<body>
     <!-- navbar -->
     <header>
          <?php include('components/navbar.php'); ?>
     </header>
     <!-- end navbar -->
     <aside class="container-fluid">
          <div class="row">
               <!-- Sidebar -->

               <?php include('components/sidebar.php'); ?>


               <!-- Content area -->
               <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mt-2 d-flex justify-content-center ">
                    <main role="main" class="main-content-width">
                         <div>
                              <?php include('contents/editpro.php'); ?>
                         </div>
                    </main>
               </div>
          </div>
     </aside>
     <script src="lib/bootstrap.bundle.js"></script>
     <script src="lib/jquery.js"></script>

</body>

</html>