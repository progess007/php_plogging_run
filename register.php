<?php
  // Contain html, meta ,tilt function , Path of CSS, Font awesome \\
  require "./php-html/header-html.php";

  // function change title dynamic \\
  echo ch_title("สมัครสมาชิก");

?>
<script src="./js/reg-val.js"></script>

<style>

  .title {text-transform: uppercase; font-weight: 700;margin-bottom: 37px; color: red;}
  .hero {
    background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(img/banner.jpg);
    background-position: center;
    background-size: cover;
  }
  .hero2 {
    background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url(img/banner.jpg);
    background-position: center;
    background-size: cover;
  }
</style>


<body class="hero">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <!-- image upload -->
          <div class="col-lg-5 d-none d-lg-block bg-login-image">
            <!-- <img class="h-100 w-100" src="">
            <div class=" h-100 w-100 my-5 mx-5"> 
            </div> -->
          </div>

          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h2 class="title text-dark">สมัครสมาชิก</h2>
              </div>

              <div class="form-group row "> <!-- class hero2 -->
                  <label class="col-md-5 col-form-label">
                    <h6 class="h5">*เลือกประเภทการสมัคร </h6>
                  </label>
                    <div class="col-md-7">
                      <select class="form-control my-1"
                       style="font-size:1rem; border-radius: 10rem;"
                       id="mySelect" name="role"
                      >
                        <option id="hideOption" value="ผู้ใช้ทั่วไป" selected="selected">ผู้ใช้ทั่วไป</option>
                        <option id="showOption"value="นักศึกษา">นักศึกษา</option>
                      </select>
                  </div>
                </div>

              <form 
               id="form1" 
               class="user" 
               action="#" 
               method="post"
               style="position: relative;"
              >
                
                <div class="form-group mt-5">
                  <input 
                   type="text"
                   class="form-control form-control-user" 
                   id="id_u" name="id" 
                   placeholder="ชื่อผู้เข้าใช้งาน (Username) *เฉพาะภาษาอังกฤษ"
                   
                  >
                  <div class="ml-4" id="id_t1">

                  </div>
                </div>

                <div class="form-group">
                  <input 
                   type="email" 
                   class="form-control form-control-user" 
                   id="email_u" name="email" 
                   placeholder="อีเมล"
                  >
                  <div class="ml-4" id="id_t2">

                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <!-- <span class="btn-show-pass" style="right: 30px; top:0">
                      <i class="zmdi zmdi-eye"></i>
                    </span> -->
                    <input 
                     type="password" 
                     class="form-control form-control-user" 
                     id="pwd_u"
                     name="pwd"
                     placeholder="รหัสผ่าน"
                    >
                    <div class="ml-4" id="id_t3">
                      
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <!-- <span class="btn-show-pass" style="right: 30px; top:0">
                      <i class="zmdi zmdi-eye"></i>
                    </span> -->
                    <input 
                     type="password" 
                     class="form-control form-control-user " 
                     id="pwd_re_u" 
                     name="pwd_repeat" 
                     placeholder="*ยืนยันรหัสผ่าน"
                    >
                    <div class="ml-4" id="id_t4">
                      
                    </div>
                  </div>
                </div>

                <!-- Information Person -->
                <div class="text-left">
                  <h1 class="h5 text-gray-900 mb-4">*ข้อมูลส่วนตัว ผู้ใช้งาน</h1>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input 
                     type="text" 
                     class="form-control form-control-user" 
                     id="name_u"
                     name="name"
                     placeholder="ชื่อ"
                    >
                    <div class="ml-4" id="id_t5">
                      
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <input 
                     type="text" 
                     class="form-control form-control-user" 
                     id="lastname_u"
                     name="lastname"
                     placeholder="นามสกุล"
                    >
                    <div class="ml-4" id="id_t6">

                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <input 
                   type="tel" 
                   class="form-control form-control-user" 
                   id="phone_u"
                   name="phone"
                   placeholder="เบอร์โทร"
                  >
                  <div class="ml-4" id="id_t7">
                    
                  </div>
                </div>

                <button type="text" name="register" class="btn btn-primary btn-user btn-block">
                  ยืนยันการสมัคร
                </button>
              </form>

              <form 
               id="form2" 
               class="user" 
               action="#" 
               method="post"
               style="position: relative;"
              >
              
                <div class="form-group mt-5">
                  <input 
                   type="text"
                   class="form-control form-control-user" 
                   id="id_s"
                   name="id_s" 
                   placeholder="รหัสนักศึกษา (62xxxxxxx38)"
                  >
                  <div class="ml-4" id="stxt1">
                    
                  </div>
                </div>

                <div class="form-group">
                  <input 
                   type="email" 
                   class="form-control form-control-user" 
                   id="email_s"
                   name="email_s" 
                   placeholder="อีเมล"
                  >
                  <div class="ml-4" id="stxt2">
                    
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input 
                     type="password" 
                     class="form-control form-control-user" 
                     id="pwd_s"
                     name="pwd_s"
                     placeholder="รหัสผ่าน"
                    >
                    <div class="ml-4" id="stxt3">
                    
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <input 
                     type="password" 
                     class="form-control form-control-user" 
                     id="pwd_re_s"
                     name="pwd_re_s"
                     placeholder="*ยืนยันรหัสผ่าน"
                    >
                    <div class="ml-4" id="stxt4">
                    
                    </div>
                  </div>
                </div>

                <div class="text-left">
                  <h1 class="h5 text-gray-900 mb-4">*ข้อมูลส่วนตัว ผู้ใช้งาน</h1>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input 
                     type="text" 
                     class="form-control form-control-user" 
                     id="name_s"
                     name="name_s"
                     placeholder="ชื่อ"
                    >
                    <div class="ml-4" id="stxt5">
                    
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <input 
                     type="text" 
                     class="form-control form-control-user" 
                     id="lastname_s" name="lastname_s" 
                     placeholder="นามสกุล"
                    >
                    <div class="ml-4" id="stxt6">
                    
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <input 
                   type="tel" 
                   class="form-control form-control-user" 
                   id="phone_s" name="phone_s" 
                   placeholder="เบอร์โทร"
                  >
                  <div class="ml-4" id="stxt7">
                    
                  </div>
                </div>

                <div class="form-group" id="showIfClicked">
                  <select class="form-control" 
                   style="font-size:1rem; border-radius: 10rem;"
                   id="faculty_s" name='faculty_s'
                   
                  >
                    <option value="" disabled selected><-- กรุณาเลือกคณะ --></option>
                    <?php 
                    $sql = "SELECT * FROM faculty";
                    $sql = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($sql)) {
                      echo'<option value="'.$row['faculty_id'].'">'.$row["faculty"].'</option>';
                    } ?>
                  </select>
                </div>

                <button type="text" name="register" class="btn btn-danger btn-user btn-block">
                  ยืนยันการสมัคร
                </button>
              </form>

              <hr>
              <div class="text-center">
                <a class="small" href="./forgot-password">ลืมรหัสผ่าน?</a>
              </div>
              <div class="text-center">
                <a class="small" href="./index">หากมีบัญชีผู้ใช้แล้ว? เข้าสู่ระบบ!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php

  // Contain Path of Javascript
  require "./php-html/footer-java-sys.php";

?>


