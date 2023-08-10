<?php
  // Contain html, meta ,tilt function , Path of CSS, Font awesome \\
  require "./php-html/header-html.php";

  // function change title dynamic \\
  echo ch_title("Thank You");

?>
<?php 

$success = "";

if (isset($_GET['success']) == "user") {

  if($_GET['success'] == "user") $success = "ผู้ใช้ทั่วไป";
  if($_GET['success'] == "student") $success ="นักศึกษา";

}

?>
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- div class="col-lg-6 d-none d-lg-block">
                <img class="h-100 w-100">
              </div>< -->

              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2"></h1>
                    <p class="mb-4"></p>
                  </div>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">ขอบคุณสำหรับการ <span class="font-weight-bold text-info">สมัครสมาชิก</span></h1>
                    <p class="mb-4"></p>
                  </div>
                  <div class="text-center">
                    <h6 class="text-gray-900 mb-2">สถานะการใช้งานของคุณคือ 
                      <span class="text-danger">
                        <?php if (isset($_GET['success'])) {
                          echo $success;
                          } else { echo ""; }
                        ?>
                      </span></h6>
                    <p class="mb-4"></p>
                  </div>
                  <div class="text-center mt-5">
                    <a class="medium" href="./index">ต้องการเข้าสู่ระบบ เข้าสู่ระบบ!</a>
                  </div>
                  <!-- <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <a href="index" class="btn btn-primary btn-user btn-block">
                      Reset Password
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register">สร้างบัญชีผู้ใช้!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="index">หากมีบัญชีผู้ใช้แล้ว? เข้าสู่ระบบ!</a>
                  </div> -->
                </div>
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
