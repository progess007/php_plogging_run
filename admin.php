<?php
  // Contain html, meta ,tilt function , Path of CSS, Font awesome \\
  
  require "./php-html/admin-html.php";
  $crPage = "admin";

  // function change title dynamic \\
  echo ch_title("Dashboard ผู้ดูแลระบบ");

  // Contain User menu bar \\
  require "./php-html/admin-nav.php";

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
  .icon-img2 {width: 40px; height: 40px;}
  .bg-rank3 {
    background-color: #e8eff4;
    color: #000;
    font-weight: bolder;
    border-radius: 10%;
  }
  .text-menu {font-size: 14px;}

  @media (min-width: 1200px) {.modal-dialog {max-width: 1140px;}}

  @media (max-width: 425px) {
  .col-ssm-4{flex: 0 0 33.33333%; max-width: 33.33333%;}
  .col-ssm-6 {flex: 0 0 50%; max-width: 50%;}

  .text-s {font-size: 12px;}
  .txt-sm {font-size: 14px;}
  .text-menu {font-size: 12px;}

  .display-4 {font-size: 2rem;}
  .lead {font-size: 1rem;}

  .card-body {flex: 1 1 auto; min-height: 1px; padding: 1.5rem;}
  .card .card-body { padding: 0.75rem 0.75rem; }
  .h3 {font-size: 14px;}
  .h4 {font-size: 14px;}
  .btn-md {font-size: 10px;}

  .icon-img2 {width: 25px; height: 25px;}
  
  }

  @media (max-width: 320px) {
    .example-image-link {
      display: inline-block;
      padding: 3px;
      margin: 0 0 0 0;
      background-color: #f9f9f9;
      line-height: 0;
      border-radius: 50%;
    }
    .example-image-link:hover {background-color: #fc4c02;}
    .example-image {
      width: 25px;
      height: 25px;
      border-radius: 50%;
    }
    .icon-img2 {width: 15px; height: 15px;}
    .col-sssm-12 {flex: 0 0 100%;max-width: 100%;}
  }

  @media (min-width: 320px) {
    .d-ssm-flex {display: flex !important;}
  }

 /* Css Profile */
  .emp-profile{padding: 3%; margin-top: 3%;
    margin-bottom: 3%; border-radius: 0.5rem; background: #fff;
  }
  .profile-img{ text-align: center; }
  .profile-img img{width: 70%; height: 100%; }
  .profile-img .file {
    position: relative; overflow: hidden;
    margin-top: -20%; width: 70%; border: none;
    border-radius: 0; font-size: 15px; background: #212529b8;
  }
  .profile-img .file input { position: absolute; opacity: 0; right: 0; top: 0; }
  .profile-head h5{ color: #333; }
  .profile-head h6{ color: #0062cc; }
  .profile-edit-btn{
    border: none; border-radius: 1.5rem; width: 100%;
    padding: 2%; font-weight: 600; color: #6c757d; cursor: pointer;
  }
  .proile-rating{font-size: 12px; color: #818182; margin-top: 5%;}
  .proile-rating span{color: #495057; font-size: 15px; font-weight: 600;}
  .profile-head .nav-tabs{margin-bottom:5%;}
  .profile-head .nav-tabs .nav-link{font-weight:600; border: none;}
  .profile-head .nav-tabs .nav-link.active{border: none; border-bottom:2px solid #0062cc;}
  .profile-work{ padding: 14%; margin-top: -15%;}
  .profile-work p{font-size: 12px; color: #818182; font-weight: 600;margin-top: 10%;}
  .profile-work a{text-decoration: none; color: #495057; font-weight: 600;font-size: 14px;}
  .profile-work ul{list-style: none;}
  .profile-tab label{font-weight: 600;}
  .profile-tab p{font-weight: 600;color: #0062cc;}
  #profile2 {display: none;}

  .resume {display: none;}

  /* ========================================= */
  #profileDisplay, #profileDisplay2 { 
    display: block; 
    height: 190px; 
    width: 100%; 
    margin: 0px auto; 
    border-radius: 50%; 
  }
  .img-placeholder {
    width: 100%; color: white;
    height: 100%;
    background: black;
    opacity: .7;
    height: 190px;
    border-radius: 50%;
    z-index: 2;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    /* display: none; */
  }
  .img-placeholder h4 {margin-top: 40%; color: white;}
  .img-div:hover .img-placeholder {display: block; cursor: pointer;}

  @media (max-width: 1200px) {
    #profileDisplay, #profileDisplay2 {height: 150px; width: 100%;}
    .img-placeholder {height: 150px; width: 100%;}
  }
  @media (max-width: 992px) {
    #profileDisplay, #profileDisplay2 {height: 150px; width: 100%; }
    .img-placeholder {height: 150px; width: 100%;}
  }
  @media (max-width: 768px) {
    #profileDisplay, #profileDisplay2 {height: 150px; width: 90%; }
    .img-placeholder {height: 150px; width: 90%;}
  }
  @media (max-width: 576px) {
    #profileDisplay, #profileDisplay2 {height: 270px; width: 70%;}
    .img-placeholder {height: 270px; width: 70%;}
  }
  @media (max-width: 425px) {
    #profileDisplay, #profileDisplay2 {height: 250px; width: 80%;}
    .img-placeholder {height: 250px; width: 80%;}
  }
  @media (max-width: 375px) {
    #profileDisplay, #profileDisplay2 {height: 230px; width: 80%;}
    .img-placeholder {height: 230px; width: 80%;}
  }
  @media (max-width: 320px) {
    #profileDisplay, #profileDisplay2 {height: 220px; width: 100%;}
    .img-placeholder {height: 220px; width: 100%;}
  }
  a.aline:hover {text-decoration: underline;}

</style>

<script type="text/javascript">

</script>

<?php 

  // Sum All Distance and Trash
  $stmt = mysqli_query($conn, "SELECT SUM(data_distance) AS sum_distance, 
          SUM(data_trash_t1) AS t1, SUM(data_trash_t2) AS t2, SUM(data_trash_t3) AS t3,
          SUM(data_trash_t4) AS t4, SUM(data_trash_t5) AS t5  FROM approve_data
          WHERE status_id=1");
  $result = mysqli_fetch_assoc($stmt);

  $res_d = $result['sum_distance'];
  $t1 = $result['t1'];
  $t2 = $result['t2'];
  $t3 = $result['t3'];
  $t4 = $result['t4'];
  $t5 = $result['t5'];
  $res_t = $t1 + $t2 + $t3 + $t4 + $t5;

    // Data Time
    $date = date_create($row['create_date']);
    $mo_date = date_create($row['modify_date']);

  // Sum User
  $query = mysqli_query($conn, "SELECT COUNT(*) AS c1 FROM m_member
            WHERE m_level=3 OR m_level=2");
  $q_res = mysqli_fetch_assoc($query);
  $res_u = $q_res['c1'];

?>
    
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./admin">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
      </nav>

        
      <!-- Page Heading -->
      <div class="d-ssm-flex align-items-center justify-content-between my-5">
        <h1 class="h3 mb-3 text-gray-800">Dashboard Admin </h1>
        <a href="#" id="export" class="btn btn-md btn-success shadow-sm">
            <img src="./image/icon/excel.png" width="25px"> Generate Report
        </a>
      </div>

        <!-- Content Row -->

        <div class="row">

          <!-- จำนวนผู้ใช้งานทั้งหมด Card -->
          <div class="col-xl-3 col-md-6 col-ssm-6 mb-4">
            <div class="card border-left-c1 shadow h-100">
              <div class="card-body">
                <div class="text-s font-weight-bold text-c1 text-uppercase mb-2">
                  <a
                   href="#" data-toggle="modal" data-target="#modalAlluser"
                  ><span class="label2 bg-primary"> ดูรายชื่อทั้งหมด </span></a>
                  <br>
                  <span>จำนวนผู้ใช้งานทั้งหมด</span>
                </div>
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    
                    <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $res_u ?></div>
                  </div>
                  <div class="col-auto">
                      <span class="h4 text-gray-800 mr-2 "> คน </span>
                    </div>
                  <div class="col-auto">
                    <img src="./image/icon/hire.png" class="icon-img2">
                  </div>
                </div>
               
              </div>
            </div>
          </div>

          <!-- ระยะทางการวิ่ง Card -->
          <div class="col-xl-3 col-md-6 col-ssm-6 mb-4">
            <div class="card border-left-primary shadow h-100">
              <div class="card-body">

                <div class="text-s font-weight-bold text-primary text-uppercase mb-1">ระยะทางวิ่งรวม</div>
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    
                    <div class="h3 mb-0 font-weight-bold text-gray-800"><?= number_format($res_d,2) ?></div>
                  </div>
                  <div class="col-auto">
                    <span class="h4 text-gray-800 mr-2"> กิโล </span>
                  </div>
                  <div class="col-auto">
                    <img src="./image/icon/jogging.png" class="icon-img2">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- การเก็บขยะ Card -->
          <div class="col-xl-3 col-md-6 col-ssm-6 mb-4">
            <div class="card border-left-success shadow h-100">
              <div class="cad-b">

                <div class="text-s font-weight-bold text-success text-uppercase mb-2">

                  <a
                   href="#" data-toggle="modal" data-target="#modalTrash"
                  ><span class="label2 bg-primary"> ดูจำนวนขยะทั้งหมด </span></a>
                  <br>
                  
                  <span>จำนวนขยะที่เก็บทั้งหมด</span>
                </div>
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    
                    <div class="h3 mb-0 font-weight-bold text-gray-800" id="expe6"><?= $res_t ?></div>
                    
                  </div>
                  <div class="col-auto">
                      <span class="h4 text-gray-800 mr-2"> ชิ้น </span>
                    </div>
                  <div class="col-auto">
                    <img src="./image/icon/dump.png" class="icon-img2">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-12 mb-4">
            <div class="card shadow mb-4">
              <div class="card-header bg-dark p-2">
                <div class="row">
                  <div class="col">
                    <span class="m-0 font-weight-bold text-white">จัดการข้อมูลการวิ่ง</span>
                  </div>
                  <div class="col-auto">
                    <span class="m-0 font-weight-bold text-white">+</span>
                  </div>
                </div>
                
              </div>
            <!-- Icon MEnu -->
              <div class="card-body">
                <div class="row">

                  <div class="col-xl-3 col-md-6 col-ssm-6">
                    <a class="badge p-1 my-2 aline" href="#" data-toggle="modal" data-target="#modalApprove">
                      <img src="./image/icon/running.png" class="icon-img">
                      <span class="text-menu ml-2">ระบบอนุมัติข้อมูล</span>
                    </a>
                  </div>
                  <div class="col-xl-3 col-md-6">
                    <a class="badge p-1 my-2 aline" href="#" data-toggle="modal" data-target="#modalHistory">
                    <img src="./image/icon/history.png" class="icon-img">
                      <span class="text-menu ml-2">ตรวจสอบประวัติการอนุมัติ</span>
                    </a>
                  </div>
                  <div class="col-xl-4 col-md-6 col-sm-4">
                    <a class="badge p-1 my-2 aline" href="#" data-toggle="modal" data-target="#modalRankd">
                      <img src="./image/icon/rankrun.png" class="icon-img">
                      <span class="text-menu ml-2">ตรวจสอบอันดับการวิ่ง</span>
                    </a>
                  </div>
                  <div class="col-xl-3 col-md-6 col-sm-4">
                    <a class="badge p-1 my-2 aline" href="#" data-toggle="modal" data-target="#modalRankt">
                      <img src="./image/icon/trashrank.png" class="icon-img">
                      <span class="text-menu ml-2">ตรวจสอบอันดับการเก็บขยะ</span>
                    </a>
                  </div>
                  <div class="col-xl-4 col-md-6 col-sm-4">
                  <a class="badge p-1 my-2 aline" href="#" data-toggle="modal" data-target="#modalAlluser">
                    <img src="./image/icon/hire.png" class="icon-img">
                    <span class="text-menu ml-2">ตรวจสอบรายชื่อผู้ใช้งานทั้งหมด</span>
                  </a>
                </div>
                  
                </div>
              </div>

            </div>
          </div>

        <div class="col-xl-12 mb-4">
          <div class="card shadow mb-4">
            <div class="card-header bg-dark p-2">
              <div class="row">
                <div class="col">
                  <span class="m-0 font-weight-bold text-white">จัดการระบบทั่วไป</span>
                </div>
                <div class="col-auto">
                  <span class="m-0 font-weight-bold text-white">+</span>
                </div>
              </div>
              
            </div>
          <!-- Icon MEnu -->
            <div class="card-body">
              <div class="row">

                <div class="col-xl-3 col-md-6 col-ssm-6 col-sssm-12">
                  <a class="badge p-1 my-2 aline" href="./admin-news.php">
                    <img src="./image/icon/newspaper.png" class="icon-img">
                    <span class="text-menu ml-2">จัดการข่าว</span>
                  </a>
                </div>

                <div class="col-xl-3 col-md-6 col-ssm-6 col-sssm-12">
                  <a class="badge p-1 my-2 aline" href="./admin-carousel.php">
                    <img src="./image/icon/carousel.png" class="icon-img">
                    <span class="text-menu ml-2">จัดการ Banner</span>
                  </a>
                </div>

                <div class="col-xl-3 col-md-6 col-ssm-6 col-sssm-12">
                  <a class="badge p-1 my-2 aline" href="./admin-activity.php">
                    <img src="./image/icon/activity.png" class="icon-img">
                    <span class="text-menu ml-2">จัดการกิจกรรมวิ่ง</span>
                  </a>
                </div>
                
              </div>
            </div>

          </div>
        </div>

        <div class="col-xl-12 col-md- mb-4">
          <div class="card shadow mb-4">
            <div class="card-header bg-dark p-2">
              <div class="row">
                <div class="col">
                  <span class="m-0 font-weight-bold text-white">จัดการระบบ Database</span>
                </div>
                <div class="col-auto">
                  <span class="m-0 font-weight-bold text-white">+</span>
                </div>
              </div>
              
            </div>
          <!-- Icon MEnu -->
            <div class="card-body">
              <div class="row">

                <div class="col-xl-3 col-md-6 col-sm-4">
                  <a class="badge p-1 my-2 aline" href="#" data-toggle="modal" data-target="#">
                    <img src="./image/icon/database.png" class="icon-img">
                    <span class="text-menu ml-2">ระบบล้างฐานข้อมูล</span>
                  </a>
                </div>
                
              </div>
            </div>

          </div>
        </div>

        <div class="col-xl-12 mb-4">
            <div class="card shadow mb-4">
              <div class="card-header bg-dark p-2">
                <div class="row">
                  <div class="col">
                    <span class="m-0 font-weight-bold text-white">จัดการข้อมูล / ออกจากระบบ</span>
                  </div>
                  <div class="col-auto">
                    <span class="m-0 font-weight-bold text-white">+</span>
                  </div>
                </div>
                
              </div>
            <!-- Icon MEnu -->
              <div class="card-body">
                <div class="row">

                  <div class="col-xl-3 col-md-6 col-ssm-6 col-sssm-12">
                    <a class="badge p-1 my-2 aline" href="#"  data-toggle="modal" data-target="#modalProfile">
                      <img src="./image/icon/resume.png" class="icon-img">
                      <span class="text-menu ml-2">จัดการข้อมูลส่วนตัว</span>
                    </a>
                  </div>

                  <div class="col-xl-3 col-md-6 col-sm-4">
                    <a class="nav-link p-1 my-2 aline" href="#" onclick="resetPass(<?=$row['member_id']?>)">
                      <img src="./image/icon/reset.png" class="icon-img">
                      <span class="ml-3 fs-14">เปลี่ยนรหัสผ่าน</span>
                    </a>
                  </div>

                  <div class="col-xl-3 col-md-6 col-ssm-6 col-sssm-12">
                    <a class="badge badge-light p-1 my-2 aline" href="#" onclick="logout()">
                      <img src="./image/icon/logout.png" class="icon-img">
                      <span class="text-menu ml-2">ออกจากระบบ</span>
                    </a>
                  </div>

                </div>
              </div>

            </div>
          </div>

          <!-- อันดับของการวิ่ง -->
          <div class="col-xl-5 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 ">
              <div class="card-body">
              <div class="text-s font-weight-bold text-info text-uppercase mb-2">อันดับของการวิ่ง</div>
<?php 

$que1 = "SELECT r.r_distance, m.member_id, m.m_name, m.m_lastname, m.m_img, l.m_level 
        FROM ranking_data r
        JOIN m_member m ON r.m_id = m.member_id 
        JOIN m_level l ON m.m_level = l.m_id
        ORDER BY r.r_distance DESC
        LIMIT 3 OFFSET 0";
$rese = mysqli_query($conn, $que1);

$rank = 0;$last_score = false; $rows = 0;

if (mysqli_num_rows($rese) > 0) {
  while($row1 = mysqli_fetch_assoc($rese)) {
    $rows++;
    if( $last_score != $row1['r_distance'] ){
      $last_score = $row1['r_distance'];
      $rank = $rows;
    }

?>
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-1 font-weight-bold text-gray-800"><?= $rank ?></div>
                      </div>
                      <div class="col-3">
                        <div class="">
                          <a 
                          class="example-image-link" 
                          href="<?= $row1['m_img'] ?>"
                          onclick="popImg(this)"
                          >
                            <img
                            class="example-image mx-auto"
                            src="<?= $row1['m_img'] ?>"
                            >
                          </a>
                        </div>
                      </div>
                      <div class="col-auto txt-sm">
                        <?= $row1['m_name'].' &nbsp&nbsp'.$row1['m_lastname'] ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-auto txt-sm"> 
                    <div class="mr-2">
                      <span class="txt-sm text-c1 font-weight-bold">
                        <?= $row1['r_distance'] ?>
                      </span> กิโล
                    </div>
                  </div>

                  <div class="col-auto txt-sm">
                  <span 
                    <?php if($row1['m_level'] == "นักศึกษา") 
                      echo 'class="label2 bg-primary mr-1"';
                      if ($row1['m_level'] == "ผู้ใช้งานทั่วไป")
                      echo 'class="label2 bg-secondary mr-1"';
                    ?>
                  >
                    <?php if($row1['m_level'] == "นักศึกษา") 
                      echo 'นศ.';
                      if ($row1['m_level'] == "ผู้ใช้งานทั่วไป")
                      echo 'ผท.';
                     ?>
                  </span>
                  </div>
                </div>

                <hr>
<?php  }
}
?>
                

              </div>
            </div>
          </div>

          <!-- Comming Soon Card -->
          <div class="col-xl-5 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100">
              <div class="card-body">
              <div class="text-s font-weight-bold text-warning text-uppercase mb-2">อันดับของการเก็บขยะ</div>
<?php 

$que2 = "SELECT r.r_trash, m.member_id, m.m_name, m.m_lastname, m.m_img, l.m_level 
        FROM ranking_data r
        JOIN m_member m ON r.m_id = m.member_id 
        JOIN m_level l ON m.m_level = l.m_id
        ORDER BY r.r_trash DESC
        LIMIT 3 OFFSET 0";
$rese2 = mysqli_query($conn, $que2);

$rank = 0;
$last_score = false;
$rows = 0;

if (mysqli_num_rows($res) > 0) {
  while($row2 = mysqli_fetch_assoc($rese2)) {
    $rows++;
    if( $last_score != $row2['r_trash'] ){
      $last_score = $row2['r_trash'];
      $rank = $rows;
    }

?>

                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-2 font-weight-bold text-gray-800"><?= $rank ?></div>
                      </div>
                      <div class="col-3">
                        <div class="">
                          <a 
                          class="example-image-link" 
                          href="<?= $row2['m_img'] ?>"
                          onclick="popImg(this)"
                          >
                            <img
                            class="example-image mx-auto"
                            src="<?= $row2['m_img'] ?>"
                            >
                          </a>
                        </div>
                      </div>
                      <div class="col-auto txt-sm">
                        <?= $row2['m_name'].' &nbsp&nbsp'.$row2['m_lastname'] ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-auto txt-sm"> 
                    <div class="mr-2">
                      <span class="text-c1 font-weight-bold">
                        <?= $row2['r_trash'] ?>
                      </span> ชิ้น
                    </div>
                  </div>

                  <div class="col-auto txt-sm">
                  <span 
                    <?php if($row2['m_level'] == "นักศึกษา") 
                      echo 'class="label2 bg-primary mr-1"';
                      if ($row2['m_level'] == "ผู้ใช้งานทั่วไป")
                      echo 'class="label2 bg-secondary mr-1"';
                    ?>
                  >
                    <?php if($row2['m_level'] == "นักศึกษา") 
                      echo 'นศ.';
                      if ($row2['m_level'] == "ผู้ใช้งานทั่วไป")
                      echo 'ผท.';
                     ?>
                  </span>
                  </div>

                </div>
                <hr>
<?php  }
}
?>
              </div>
            </div>
          </div>

          
          <!-- End ROw -->
        </div>

      </div>
      <!-- /.container-fluid -->
    </div>
  <!-- End of Main Content -->

<script>

$(document).ready(function(){

});

</script>
<?php
  // Admin-Modal
  require "./admin-modal.php";

  // Contain Footer ท้ายเว็บ
  require "./php-html/footer-end.php";

  // Contain Path of Javascript
  require "./php-html/footer-java-sys.php";
?>



     