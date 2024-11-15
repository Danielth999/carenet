<?php include('components/header.php'); ?>

<div class="container mt-5">
     <h1>จัดการโพสต์</h1>
     <table class="table table-striped">
          <thead>
               <tr>
                    <th>#</th>
                    <th>ชื่อโพสต์</th>
                    <th>ผู้สร้าง</th>
                    <th>วันที่สร้าง</th>
                    <th>การกระทำ</th>
               </tr>
          </thead>
          <tbody>
               <tr>
                    <td>1</td>
                    <td>โพสต์ตัวอย่าง</td>
                    <td>admin</td>
                    <td>2024-11-15</td>
                    <td>
                         <button class="btn btn-warning btn-sm">แก้ไข</button>
                         <button class="btn btn-danger btn-sm">ลบ</button>
                    </td>
               </tr>
          </tbody>
     </table>
     <button class="btn btn-primary mt-3">เพิ่มโพสต์</button>
</div>