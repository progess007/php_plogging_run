<!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!------------------------ Topbar --------------------->
        <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow"> <!-- class mb-4 -->

          <!-- Sidebar Menu (Topbar) -->
          <button class="btn btn-link d-md-none rounded-circle mr-3" onclick="openNav()">
            <i class="fa fa-bars"></i>
          </button>

          <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn nav-link" onclick="closeNav()">&times;</a>
            <div class="overlay-content">

              <a class="nav-link" href="./index">
                <i class="fas fa-fw fa-home"></i>
                <span>HOME</span>
              </a>

              <a class="nav-link" href="./about">
                <i class="fas fa-fw fa-exclamation-circle"></i>
                <span class="mx-1">ABOUT</span>
              </a>

              <a class="nav-link" href="./contract">
                <i class="fas fa-fw fa-address-card"></i>
                <span class="mx-1">CONTACT</span>
              </a>

            </div>
          </div>

          <!-- Top menu (Topbar) -->
          <ul class="navbar-nav d-md-hide">
            <li class="nav-item active">
              <a
               class="nav-link"
               href="./index"
              >
                <i class="fas fa-fw fa-home"></i>
                <span class="mx-1">HOME</span></a>
            </li>
            <li class="nav-item active">
              <a
               class="nav-link"
               href="./about"
              >
                <i class="fas fa-fw fa-exclamation-circle"></i>
                <span class="mx-1">ABOUT</span></a>
            </li>
            <li class="nav-item active">
              <a
               class="nav-link"
               href="./contract"
              >
                <i class="fas fa-fw fa-address-card"></i>
                <span class="mx-1">CONTRACT</span></a>
            </li>
          </ul>
          <!-- End Top menu -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Login -->
            <li class="nav-item dropdown no-arrow mx-4 mr-5">
              <a class="nav-link dropdown-toggle mr-2" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-sign-in-alt fa-fw" style="font-size: 13px;"> เข้าสู่ระบบ </i>
                <!-- Counter - Messages -->
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Login Box
                </h6>
<!---------------------------------------------- Form Login ------------------------------------------------------------------->
                <form class="d-flex align-items-center form-inline mr-auto validate-form w-100 p-3 font-weight-bold" method="post" action="">
                  
                <!-- Input username -->
                  <div class="text-truncate">Username / Email</div>

                  <div class="input-group w-100 my-3">
                    <div class="input-group-append d-none d-sm-block">
                      <span class="btn btn-dark" type="button">
                        <i class="fas fa-key fa-sm"></i>
                      </span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate="Valid Username">
                      <input 
                       type="text"
                       style="width: 100%;" 
                       class="form-control bg-white border-1 small text-gray-500 input100" 
                       id="id"
                       autofocus
                      >
                      <span class="focus-input100"></span>
                    </div>
                  </div>

                  <!-- Input password -->
                  <div class="text-truncate">Password</div>

                  <div class="input-group w-100 my-3">
                    <div class="input-group-append d-none d-sm-block">
                      <span class="btn btn-dark" type="button">
                        <i class="fas fa-lock fa-sm"></i>
                      </span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Enter Password">
                      <span class="btn-show-pass">
                        <i class="zmdi zmdi-eye"></i>
                      </span>
                        <input
                         type="password"
                         style="width: 100%;" 
                         class="form-control bg-white border-1 small text-gray-500 input100" 
                         id="pwd"
                        >
                        <span class="focus-input100"></span>
                    </div>
                  </div>

                  <!-- Input Login -->
                  <div class="input-group my-3">
                    <button
                     class="btn btn-primary"
                     onclick="login()"
                    >
                      Login
                    </button>

                    <span style="margin-left: 8rem;" class="navbar-nav d-none d-sm-block">
                      <a class="medium" href="forgot-password">ลืมรหัสผ่าน?</a>
                    </span>
                    <span style="margin-left: 4rem;" class="navbar-nav d-sm-none">
                      <a class="medium" href="forgot-password">ลืมรหัสผ่าน?</a>
                    </span>
                  </div>
                  
                </form>
<!---------------------------------------------------------- FROM ---------------------------------------------------------->
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - Register -->
            <li class="nav-item dropdown no-arrow" style="margin-right: 4rem;">
              <a
               class="nav-link dropdown-toggle"
               href="./register"
               id="messagesDropdown"
              >
                <i class="fas fa-user-plus fa-fw" style="font-size: 13px;"> สมัครสมาชิก</i>
                <!-- Counter - Messages -->
              </a>
              <!-- Dropdown - Messages -->
              
            </li>
          </ul>

        </nav>
      <!-- End of Topbar -->

<script type="text/javascript">

function login() {
  let check = "login-submit";
  let id = $('#id').val();
  let pwd = $('#pwd').val();

  if(id != "" && pwd != "") {
    event.preventDefault();
    $.ajax({
      url: './php/login',
      type: 'post',
      data: {lg_submit:check, id:id, pwd:pwd},
      success: function(res) {
        console.log(res);
        if(res == 3) {
          Swal.fire({
          icon: 'success',
          title: 'เข้าสู่ระบบสำเร็จ',
          showConfirmButton: false,
          timer: 1500
          }).then((result) => {
            $(location).attr('href','./user')
          })
        }
        else if(res == 2) {
          Swal.fire({
          icon: 'success',
          title: 'เข้าสู่ระบบสำเร็จ',
          showConfirmButton: false,
          timer: 1500
          }).then((result) => {
            $(location).attr('href','./student')
          })
        }
        else if(res == 1) {
          Swal.fire({
          icon: 'success',
          title: 'เข้าสู่ระบบสำเร็จ',
          showConfirmButton: false,
          timer: 1500
          }).then((result) => {
            $(location).attr('href','./admin')
          })
        }

        else {
          if(res == "errorU") {
            Swal.fire({
              icon: 'error',
              title: 'ขื่อผู้ใช้งาน หรือ รหัสผ่านผิดพลาด',
              showConfirmButton: false,
              timer: 2000
            }).then((result) => {
              $('#pwd').val('');
            })
          }
          if(res == "errorN") {
            Swal.fire({
              icon: 'error',
              title: 'ไม่มีชื่อผู้ใช้งานนี้อยู่ในระบบ',
              showConfirmButton: false,
              timer: 2000
            }).then((result) => {
              $('#pwd').val('');
            })
          }
        }

      }
    })
  }
  
}

function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}

</script>