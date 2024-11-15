<?php include('components/header.php'); ?>

<div class="container mt-5">
     <h1>จัดการแบบประเมิน</h1>
     <table class="table table-striped">
          <thead>
               <tr>
                    <th>#</th>
                    <th>ชื่อผู้ประเมิน</th>
                    <th>คะแนน</th>
                    <th>วันที่ส่ง</th>
                    <th>การกระทำ</th>
               </tr>
          </thead>
          <tbody>
               <tr>
                    <td>1</td>
                    <td>user2</td>
                    <td>85</td>
                    <td>2024-11-15</td>
                    <td>
                         <button class="btn btn-warning btn-sm">แก้ไข</button>
                         <button class="btn btn-danger btn-sm">ลบ</button>
                    </td>
               </tr>
          </tbody>
     </table>
     <button class="btn btn-primary mt-3">เพิ่มแบบประเมิน</button>
</div>