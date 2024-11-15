<?php
$menu = [
     [
          'title' => 'โปรไฟล์',
          'url' => 'profile-form.php'
     ],
     [
          'title' => 'ออกจากระบบ',
          'url' => 'logout.php'
     ]
]

?>

<div class="dropdown-center">
     <button class="btn btn-light dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <?php if (isset($_SESSION['uname'])) : ?>
               <?php echo $_SESSION['uname']; ?>
          <?php endif; ?>
     </button>
     <ul class="dropdown-menu ">
          <?php foreach ($menu as $item): ?>
               <li><a class="dropdown-item" href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a></li>
          <?php endforeach; ?>
     </ul>
</div>