<div class="form-container">
     <div class="card">
          <div class="card-body">
               <h3 class="card-title text-center">สมัครสมาชิก</h3>
               <form id="submitForm">
                    <div class="mb-3">
                         <label for="username" class="form-label">Username</label>
                         <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                         <label for="email" class="form-label">Email</label>
                         <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                         <label for="password" class="form-label">Password</label>
                         <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                         <label for="fname" class="form-label">ชื่อ</label>
                         <input type="text" id="fname" name="fname" class="form-control" required>
                    </div>
                    <div class="mb-3">
                         <label for="lname" class="form-label">นามสกุล</label>
                         <input type="text" id="lname" name="lname" class="form-control" required>
                    </div>

                    <div class="mb-3">
                         <label for="age" class="form-label">อายุ</label>
                         <input type="number" id="age" name="age" class="form-control" required>
                    </div>
                    <button type="submit" class="rounded-pill w-100 btn-rose">สมัครสมาชิก</button>
               </form>
               <p class="text-center mt-3">
                    Already have an account? <a href="signin-form.php">Login</a>
               </p>
          </div>
     </div>
</div>

<script src="lib/jquery.js"></script>
<script>
$(document).ready(function() {
     $('#submitForm').submit(function(e) {
          e.preventDefault();

          $.ajax({
               url: 'api/users/regis.php',
               type: 'POST',
               data: $(this).serialize(),
               dataType: 'json',
               success: function(response) {
                    if (response.status === 'success') {
                         alert(response.message);
                         window.location.href = 'signin-form.php';
                    } else {
                         alert(response.message || 'เกิดข้อผิดพลาดในการลงทะเบียน');
                    }
               },
               error: function(xhr, status, error) {
                    try {
                         const response = JSON.parse(xhr.responseText);
                         alert(response.message || 'เกิดข้อผิดพลาดในการเชื่อมต่อ');
                    } catch (e) {
                         alert('เกิดข้อผิดพลาดในการเชื่อมต่อ: ' + error);
                    }
               }
          });
     });
});
</script>