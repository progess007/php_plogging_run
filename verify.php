<?php
  // Contain html, meta ,tilt function , Path of CSS, Font awesome \\
  require "./php-html/header-html.php";

  // function change title dynamic \\
  echo ch_title("Verify");

?>
<?php 

if (isset($_GET['token'])) {
  $token = $_GET['token'];

  $sql = "SELECT m_token,m_verify FROM m_member WHERE m_verify=0 AND m_token='$token' LIMIT 1";
  $query = mysqli_query($conn, $sql);

  if(mysqli_num_rows($query) > 0) {
    $update = "UPDATE m_member SET m_verify=1 WHERE m_token='$token' LIMIT 1";
    $row = mysqli_query($conn, $update);

    if($update) {
      echo "Your account has been verified. You my now login.";
    } else {
      echo mysqli_error($conn);
    }

  } else { echo "This is account invalid or already verified"; }

} else {
  die("Something went wrong");
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
              <div class="col-lg-6 d-none d-lg-block">
                <img class="h-100 w-100 bg-password-image">
              </div>

              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">ตั้งรหัสผ่านใหม่</h1>
                    <p class="mb-4"></p>
                  </div>
                  <form class="user">
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
                  </div>
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
