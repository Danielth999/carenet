<?php include('components/header.php'); ?>

<div class="container mt-5">
     <h1>จัดการข้อความ</h1>
     <table class="table table-striped">
          <thead>
               <tr>
                    <th>#</th>
                    <th>ผู้ส่ง</th>
                    <th>ข้อความ</th>
                    <th>วันที่ส่ง</th>
                    <th>การกระทำ</th>
               </tr>
          </thead>
          <tbody>
               <tr>
                    <td>1</td>
                    <td>user1</td>
                    <td>สอบถามเกี่ยวกับระบบ</td>
                    <td>2024-11-15</td>
                    <td>
                         <button class="btn btn-primary btn-sm">ตอบกลับ</button>
                         <button class="btn btn-danger btn-sm">ลบ</button>
                    </td>
               </tr>
          </tbody>
     </table>
</div>