<?php
$currentPage = basename($_SERVER['PHP_SELF']);

$menuItems = [
     [
          'title' => 'หน้าหลัก',
          'url' => 'index.php'
     ],

     [
          'title' => 'สินค้า',
          'url' => 'product-form.php'
     ],
     [
          'title' => 'ติดต่อผู้ดูแล',
          'url' => 'contact-form.php'
     ],
     [
          'title' => 'แบบประเมิน',
          'url' => 'assessment-form.php'
     ],
     // สร้าง menu ระบบจัดการ สำหรับคนที่มี role เป็น admin
     [
          'title' => 'ระบบจัดการ',
          'url' => 'admin/admin.php'
     ]


];
?>


<div class="sidebar-sticky ">

     <ul class="nav flex-column ">
          <?php foreach ($menuItems as $item): ?>
               <li class="nav-item">
                    <a class="nav-link <?php echo ($currentPage == $item['url']) ? 'active' : ''; ?>"
                         href="<?php echo $item['url']; ?>">
                         <?php echo $item['title']; ?>
                    </a>
               </li>
          <?php endforeach; ?>
     </ul>
     <div class="">
          <?php include("footer.php"); ?>
     </div>

</div>


<style>
     /* Base link style */
     .nav-link {
          color: #666 !important;
          padding: 0.5rem 1rem;
          transition: all 0.3s ease;
          background-color: transparent !important;
     }

     /* Hover effect */
     .nav-link:hover {
          color: #f43f5e !important;
          background-color: #fff1f2 !important;
     }

     /* Active state */
     .nav-link.active {
          color: #f43f5e !important;
          background-color: #fff1f2 !important;
          font-weight: bold;
          border-right: 3px solid #f43f5e !important;
     }
</style>