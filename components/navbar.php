<?php

?>
<nav class="navbar nav-bg  ">
     <div class="container-fluid d-flex justify-content-between align-items-center">
          <div>
               <a href="index.php" class="navbar-brand text-white fw-bold me-auto">Carenet</a>
          </div>
          <form class="search-box " role="search">
               <input class="form-control me-2 w-full rounded-pill custom-input" type="search" placeholder="Search"
                    aria-label="Search">
          </form>

          <div class="d-flex justify-content-center gap-2">
               <div>
                    <a href="create-post-form.php" class="btn  btn-light rounded-pill">
                         สร้างโพสต์
                    </a>
               </div>
               <?php if (isset($_SESSION['login']) && ($_SESSION['login'] == true)) : ?>
                    <?php include('btn-profile.php');  ?>
               <?php else : ?>
                    <a href="signin-form.php" class="btn btn-light rounded-pill px-3 me-2">Login</a>
               <?php endif; ?>
          </div>
     </div>
</nav>

<style>
     /* Navbar */
     .nav-bg {
          background-color: #f43f5e;
          height: 56px;
          z-index: 1030;
          /* ให้อยู่ด้านหน้าสุด */
     }

     .search-box {
          min-width: 500px;
     }

     .custom-input {
          border: 2px solid white;
          outline: none;
     }

     .custom-input:focus {
          border-color: #ffc107;
          box-shadow: 0 0 5px #ffc107;
     }

     /* Sidebar ซ้าย */
     nav.bg-light {
          top: 56px;
          /* ระยะห่างจาก Navbar */
          left: 0;
          width: 16.666%;
          /* เท่ากับ col-md-2 */
          border-right: 1px solid #ddd;
          padding-top: 20px;
          overflow-y: auto;
          height: calc(100vh - 56px);
          /* เต็มหน้าจอแต่ลบระยะ Navbar */
     }

     /* Sidebar ขวา */
     div.end-0 {
          top: 56px;
          /* ระยะห่างจาก Navbar */
          right: 0;
          width: 16.666%;
          /* เท่ากับ col-md-2 */
          border-left: 1px solid #ddd;
          padding-top: 20px;
          overflow-y: auto;
          height: calc(100vh - 56px);
          /* เต็มหน้าจอแต่ลบระยะ Navbar */
     }

     /* Content ตรงกลาง */
     main.content {
          margin-top: 20px;
     }
</style>