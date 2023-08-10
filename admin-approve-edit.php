<?php
  // Contain html, meta ,tilt function , Path of CSS, Font awesome \\
  require "./php-html/admin-html.php";
  $crPage = 'admin-approve';

  // function change title dynamic \\
  echo ch_title("แก้ไขข้อมูล");

  // Contain User menu bar \\
  require "./php-html/admin-nav.php";

?>
<script type="text/javascript">
  function eConfirm() {
      var x = confirm("แน่ใจมั้ย?");
      if (x)
          return true;
      else
          return false;        
  }
</script>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">ระบบอนุมัติข้อมูล</h6>
            </div>
            <div class="card-body">
<?php 

    if(isset($_POST['edit'])) {
      $data_id = $_POST['data_id'];
      
        if(!empty($_POST['distance'])) {
          $distance = $_POST['distance'];

          $sql = "UPDATE approve_data SET data_distance=? WHERE data_id=?";
          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, 'di', $distance, $data_id);
          mysqli_stmt_execute($stmt);
          echo "<script>
                  alert('แก้ไขข้อมูลสำเร็จ');
                  window.location.replace('./admin');
                </script>"; 
        }

        if(!empty($_POST['t1']) OR !empty($_POST['t2']) OR !empty($_POST['t3']) OR !empty($_POST['t4']) OR !empty($_POST['t5'])) {
          $t1 = $_POST['t1'];
          $t2 = $_POST['t2'];
          $t3 = $_POST['t3'];
          $t4 = $_POST['t4'];
          $t5 = $_POST['t5'];

          $sql = "UPDATE approve_data SET data_trash_t1=?, data_trash_t2=?,
          data_trash_t3=?, data_trash_t4=?, data_trash_t5=?
          WHERE data_id=?";
          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, 'iiiiii', $t1, $t2, $t3, $t4, $t5, $data_id);
          if(mysqli_stmt_execute($stmt)) {
            echo "<script>
                  alert('แก้ไขข้อมูลสำเร็จ');
                  window.location.replace('./admin');
                </script>"; 
          }
        }
    }

?>
<br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead style="font-size: 10px;">
                    <tr>
                    <th></th>
                    <th style="min-width: 100px;">ชื่อ - นามสกุล</th>
                    <th>รูปการวิ่ง</th>
                    <th>รูปเก็บขยะ</th>
                    <th style="max-width: 40px;">ระยะทางวิ่ง</th>
                    <th style="max-width: 40px;">จำนวนขยะที่เก็บ</th>
                    <th style="min-width: 84px;">วันที่ข้อมูลเข้า</th>
                    <th style="min-width: 66px;">สถานะ</th>
                    </tr>
                  </thead>
                  <!-- ส่วนกลาง -->
                  <tbody style="font-size: 14px;">
<!-- history -->
<?php

$no = 1;
if (isset($_GET['uid'])) {
$uid = $_GET['uid'];
$sql = "SELECT * FROM approve_data d 
        JOIN m_member m ON d.m_id = m.member_id
        JOIN status s ON d.status_id = s.status_id
        WHERE data_id=$uid AND d.status_id = 3
        ORDER BY d.data_create_date DESC";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)) {

    $trash = $row['data_trash_t1'] + $row['data_trash_t2'] + $row['data_trash_t3'] + $row['data_trash_t4'] + $row['data_trash_t5'];
    $date = date_create($row['data_create_date']);

?>
  
                  <tr>

                      <td> <!-- รูปผู่้ใช้งานทั่วไป -->
                        <input 
                         type="hidden"
                         value="<?= $row['data_id'] ?>"
                         name="data_id"
                        >

                        <input 
                         type="hidden"
                         value="<?= $row['m_id'] ?>"
                         name="id"
                        >

                        <?= $no; ?>
                      </td>

                      <td> <!-- ชื่อผู้ใช้งาน -->
                        <?= $row['m_name'].' &nbsp&nbsp'.$row['m_lastname'] ?>
                      </td>

                      <td> <!-- รูประยะทางการวิ่ง -->
                        <a 
                         class="example-image-link"
                         href="<?= $row['data_distance_img'] ?>"
                         data-lightbox="example-1"
                        >
                          <img 
                           class="example-image mx-auto"
                           src="<?php echo $row['data_distance_img'] ?>"
                           alt="image-1" 
                          >
                        </a>
                      </td>

                      <td> <!-- รูปการทึ้งขยะ -->
                        <a 
                         class="example-image-link"
                         href="<?php echo $row['data_trash_img'] ?>"
                         data-lightbox="example-1"
                        >
                          <img
                           class="example-image mx-auto"
                           src="<?php echo $row['data_trash_img'] ?>"
                           alt="image-1" 
                          >
                        </a>
                      </td>

                      <td> <!-- ระยะทางการวิ่ง -->
                        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                          <?php 
                            if (isset($_GET['distance'])) {
                              if($row['data_distance'] == $_GET['distance']) { 
                                echo '<input 
                                       type="hidden"
                                       value="'.$row['data_id'].'"
                                       name="data_id"
                                      >';

                                echo '<input
                                      type="text"
                                      style="max-width: 90px"
                                      class="form-control form-control-sm text-center"
                                      value="'.$row['data_distance'].'"
                                      name="distance">'.'<br>';

                                echo '<button
                                       class="mt-5 btn btn-primary btn-sm btn-block"
                                       name="edit"
                                       onclick="return eConfirm()">
                                        บันทึกข้อมูล
                                      </button>';
                              }
                            } 
                            else {
                              echo $row['data_distance'].' Km';
                            } 
                          ?>

                          
                        </form>
                      </td>

                      <td> <!-- จำนวนการเก็บขยะ -->
                        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                          <?php 
                            if (isset($_GET['t1']) AND isset($_GET['t2']) AND isset($_GET['t3']) AND isset($_GET['t4']) AND isset($_GET['t5'])):
                              if($row['data_trash_t1'] == $_GET['t1'] AND $row['data_trash_t2'] == $_GET['t2'] AND $row['data_trash_t3'] == $_GET['t3'] AND $row['data_trash_t4'] == $_GET['t4'] AND $row['data_trash_t5'] == $_GET['t5']): ?>
                                <input
                                  type="hidden"
                                  value="<?=$row['data_id']?>"
                                  name="data_id"
                                >
                                <input
                                  type="text"
                                  style="max-width: 90px"
                                  class="form-control form-control-sm text-center"
                                  value="<?=$row['data_trash_t1']?>"
                                  name="t1"
                                >
                                <input
                                  type="text"
                                  style="max-width: 90px"
                                  class="form-control form-control-sm text-center"
                                  value="<?=$row['data_trash_t2']?>"
                                  name="t2"
                                >
                                <input
                                  type="text"
                                  style="max-width: 90px"
                                  class="form-control form-control-sm text-center"
                                  value="<?=$row['data_trash_t3']?>"
                                  name="t3"
                                >
                                <input
                                  type="text"
                                  style="max-width: 90px"
                                  class="form-control form-control-sm text-center"
                                  value="<?=$row['data_trash_t4']?>"
                                  name="t4"
                                >
                                <input
                                  type="text"
                                  style="max-width: 90px"
                                  class="form-control form-control-sm text-center"
                                  value="<?=$row['data_trash_t5']?>"
                                  name="t5"
                                >

                                <button
                                  class="mt-5 btn btn-primary btn-sm btn-block"
                                  name="edit"
                                  onclick="return eConfirm()">
                                  บันทึกข้อมูล
                                </button>
                              
                              <?php else: ?>
                              <?php endif ?>
                            <?php else: echo $trash.' ชิ้น';?>
                            <?php endif ?>
                        </form>
                      </td>

                      <td> <!-- วันที่บันทึกข้อมูล -->                   
                        <?= date_format($date, "d/m/Y").'<br>'; ?>
                        <span class="font-weight-bold text-danger">
                          เวลา 
                        </span>

                        <span class="font-weight-bold text-gray-800">
                          <?= date_format($date, "H:i:s"); ?>
                        </span>
                      </td>

                      <td> <!-- สถานะข้อมูล -->
                        <span class="label2 bg-warning mr-1">
                          <?php echo $row['status'] ?>
                        </span>
                      </td>

                  </tr>
  
<?php $no++; }
  }
} 

?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
  // Contain Footer ท้ายเว็บ
  require "./php-html/footer-end.php";

  // Contain Path of Javascript
  require "./php-html/footer-java-sys.php";
?>
