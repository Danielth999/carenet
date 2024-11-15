<?php include('components/header.php'); ?>

<div class="container mt-5">
     <h1>จัดการสมาชิก</h1>
     <table class="table table-striped">
          <thead>
               <tr>
                    <th>#</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>อีเมล</th>
                    <th>บทบาท</th>
                    <th>การกระทำ</th>
               </tr>
          </thead>
          <tbody>
               <tr>
                    <td>1</td>
                    <td>admin</td>
                    <td>admin@example.com</td>
                    <td>Admin</td>
                    <td>
                         <button class="btn btn-warning btn-sm">แก้ไข</button>
                         <button class="btn btn-danger btn-sm">ลบ</button>
                    </td>
               </tr>
          </tbody>
     </table>
</div>