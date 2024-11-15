<div class="card card-width">
     <div class="card-body">
          <!-- ส่วนโปรไฟล์ -->
          <div class="d-flex">
               <!-- รูปโปรไฟล์ -->
               <div>
                    <img id="profileImage" src="https://via.placeholder.com/80" width="80" height="80"
                         alt="Profile Image" class="rounded-circle me-3">
               </div>
               <!-- แบบฟอร์มแก้ไขข้อมูล -->
               <div class="flex-grow-1">
                    <form id="editProfileForm" action="api/users/update.php" method="post">
                         <div class="mb-3 d-flex justify-content-between align-items-center">
                              <label for="username" class="fw-bold">ชื่อผู้ใช้</label>
                              <input id="username" name="username" type="text" class="form-control form-control-sm w-75"
                                   required>
                         </div>
                         <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input id="email" name="email" type="email" class="form-control form-control-sm" required>
                         </div>
                         <div class="row">
                              <div class="col-md-6 mb-3">
                                   <label for="firstName" class="form-label">ชื่อ</label>
                                   <input id="firstName" name="fname" type="text" class="form-control form-control-sm"
                                        required>
                              </div>
                              <div class="col-md-6 mb-3">
                                   <label for="lastName" class="form-label">นามสกุล</label>
                                   <input id="lastName" name="lname" type="text" class="form-control form-control-sm"
                                        required>
                              </div>
                         </div>
                         <div class="mb-3">
                              <label for="age" class="form-label">อายุ</label>
                              <input id="age" name="age" type="number" class="form-control form-control-sm" required>
                         </div>
                         <div class="d-grid">
                              <button type="submit" class="btn-rose rounded-pill">บันทึกข้อมูล</button>
                         </div>
                    </form>
               </div>
          </div>

          <hr>
     </div>
</div>