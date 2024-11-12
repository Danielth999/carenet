<?php
$menu = [
     [
          'title' => 'โปรไฟล์',
          'url' => 'profile.php'
     ],
     [
          'title' => 'ออกจากระบบ',
          'url' => 'logout.php'
     ]
]

?>
<div class="dropdown">
     <button class="btn btn-light rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <?php if (isset($_SESSION['uname'])) : ?>
          <?php echo $_SESSION['uname']; ?>
          <?php endif; ?>
     </button>
     <ul class="dropdown-menu">
          <?php foreach ($menu as $item): ?>
          <li><a class="dropdown-item" href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a></li>
          <?php endforeach; ?>

     </ul>
</div>