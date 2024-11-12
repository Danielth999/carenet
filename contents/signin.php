<div class="form-container">
     <div class="card">
          <div class="card-body">
               <h3 class="card-title text-center">เข้าสู่ระบบ</h3>
               <p id="message"></p>
               <form id="loginForm">
                    <div class="mb-3">
                         <label for="email" class="form-label">Email</label>
                         <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                         <label for="password" class="form-label">Password</label>
                         <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn-rose rounded-pill  w-100">Login</button>
               </form>
               <p class="text-center mt-3">
                    Don't have an account? <a href="signup-form.php">Register</a>
               </p>
          </div>
     </div>
</div>

<script src="lib/jquery.js"></script>
<script>
$(document).ready(function() {
     // เมื่อฟอร์มถูก submit
     $('#loginForm').on('submit', function(event) {
          event.preventDefault(); // ป้องกันการ submit แบบปกติ

          // ดึงค่าจาก input fields
          const email = $('#email').val();
          const password = $('#password').val();

          // ตรวจสอบว่า fields ไม่ว่าง
          if (!email || !password) {
               $("#message").text('กรุณากรอกข้อมูลให้ครบ').css('color', 'red');
               return;
          }

          // ลบข้อความเก่าออก
          $("#message").text('');

          // ส่งข้อมูลไปยัง backend ผ่าน AJAX
          $.ajax({
               url: 'api/users/login.php', // ชื่อไฟล์ที่รับข้อมูล
               type: 'POST', // Method ที่ใช้
               data: {
                    email: email, // ส่งอีเมล์
                    password: password // ส่งรหัสผ่าน
               },
               success: function(response) {
                    // เช็คผลลัพธ์จาก response
                    if (response.status === 'success') {
                         // ถ้าล็อกอินสำเร็จ
                         $("#message").text('เข้าสู่ระบบสำเร็จ').css('color',
                              'green');
                         window.location.href =
                              'index.php'; // เปลี่ยนไปยังหน้าหลังจากล็อกอิน
                    } else {
                         // ถ้าล็อกอินไม่สำเร็จ
                         $("#message").text('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง').css(
                              'color', 'red');
                    }
               },
               error: function(xhr, status, error) {
                    // หากเกิดข้อผิดพลาดในการส่ง request
                    console.error('Error:', status, error);
                    $("#message").text('เกิดข้อผิดพลาดในการเข้าสู่ระบบ').css('color',
                         'red');
               }
          });
     });
});
</script>