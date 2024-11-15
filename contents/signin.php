<div class="form-container">
     <div class="card">
          <div class="card-body">
               <h3 class="card-title text-center">เข้าสู่ระบบ</h3>
               <p id="message"></p>
               <form id="loginForm" action="api/users/login.php" method="post">
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


<script>