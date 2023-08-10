<!--======================== Modal ประวัติการบันทึกข้อมู ========================-->
<div class="modal fade" id="modalHistory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">ประวัติการอนุมัติข้อมูล</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <a href="#" id="export" class="btn btn-md btn-success shadow-sm mb-5">
            <img src="./image/icon/excel.png" width="25px"> Generate Report
        </a>

        <div class="table-responsive">
            <table class="table table-bordered" id="tableHistory" width="100%" cellspacing="0">
                  <thead style="font-size: 10px;" class="bg-dark text-white">
                    <tr>
                      <th></th>
                      <th style="min-width: 100px;">ชื่อ - นามสกุล</th>
                      <th>รูปการวิ่ง</th>
                      <th>รูปเก็บขยะ</th>
                      <th style="min-width: 30px;">ระยะทางวิ่ง</th>
                      <th>จำนวนขยะที่เก็บ</th>
                      <th style="min-width: 84px;">วันที่อนุมัติ</th>
                      <th style="width: 60px;">สถานะ</th>
                    </tr>
                  </thead>
                  <!-- ส่วนกลาง -->
                  <tbody style="font-size: 14px;">
<!-- history -->
<?php 

// Approve

$sql = "SELECT * FROM approve_data d 
        JOIN m_member m ON d.m_id = m.member_id
        JOIN status s ON d.status_id = s.status_id
        WHERE d.status_id = 1
        ORDER BY d.data_create_date DESC";
$no = 1;
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)) {

    $trash = $row['data_trash_t1'] + $row['data_trash_t2'] + $row['data_trash_t3'] + $row['data_trash_t4'] + $row['data_trash_t5'];
    $date = date_create($row['data_create_date']);
    $app_date = date_create($row['data_approve_date']);

?>
  
                    <tr>
                      <td>
                        <?= $no; ?>
                      </td>

                      <td>
                        <?= $row['m_name'].' &nbsp&nbsp'.$row['m_lastname'] ?>
                      </td>

                      <td>
                        <a 
                         class="example-image-link" 
                         href="<?php echo $row['data_distance_img'] ?>"
                         onclick="popImg(this)"
                        >
                          <img
                           class="example-image"
                           src="<?php echo $row['data_distance_img'] ?>"
                          >
                        </a>
                      </td>

                      <td>
                        <a
                         class="example-image-link" 
                         href="<?= $row['data_trash_img'] ?>"
                         onclick="popImg(this)"
                        >
                          <img
                           class="example-image"
                           src="<?= $row['data_trash_img'] ?>"
                          >
                        </a>
                      </td>

                      <td>
                        <span class="font-weight-bold text-danger"> 
                          <?=$row['data_distance']?>
                        </span> กิโล
                      </td>

                      <td>
                        <span class="font-weight-bold text-danger"> 
                          <?=$trash?>
                        </span> ชิ้น
                      </td>

                      <td>
                        <?= date_format($app_date, "d/m/Y").'<br>'; ?>
                        <span class="font-weight-bold text-danger">
                          เวลา 
                        </span>

                        <span class="font-weight-bold text-gray-800">
                          <?= date_format($app_date, "H:i:s"); ?>
                        </span>
                      </td>

                      <td>
                        <span class="label2 bg-info">
                          <?= $row['status'] ?>
                        </span>
                      </td>
                    </tr>
  
<?php $no++;  }
} 

// Fetch Unaprrove Table
$sql = "SELECT * FROM approve_data d 
        JOIN m_member m ON d.m_id = m.member_id
        JOIN status s ON d.status_id = s.status_id
        WHERE d.status_id = 2
        ORDER BY d.data_create_date DESC";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)) {

    $trash = $row['data_trash_t1'] + $row['data_trash_t2'] + $row['data_trash_t3'] + $row['data_trash_t4'] + $row['data_trash_t5'];
    $date = date_create($row['data_create_date']);
    $unapp_date = date_create($row['data_unapprove_date']);

?>
                    <tr>
                      <td>
                        <?= $no; ?>
                      </td>

                      <td>
                        <?= $row['m_name'].' &nbsp&nbsp'.$row['m_lastname'] ?>
                      </td>

                      <td>
                        <a 
                         class="example-image-link" 
                         href="<?= $row['data_distance_img'] ?>"
                         onclick="popImg(this)"
                        >
                          <img 
                           class="example-image" 
                           src="<?= $row['data_distance_img'] ?>"
                          >
                        </a>
                      </td>

                      <td>
                        <a
                         class="example-image-link" 
                         href="<?= $row['data_trash_img'] ?>"
                         onclick="popImg(this)"
                        >
                          <img
                           class="example-image"
                           src="<?= $row['data_trash_img'] ?>"
                          >
                        </a>
                      </td>

                      <td>
                        <span class="font-weight-bold text-danger"> 
                          <?=$row['data_distance']?>
                        </span> กิโล
                      </td>

                      <td>
                        <span class="font-weight-bold text-danger"> 
                          <?=$trash?>
                        </span> ชิ้น
                      </td>

                      <td>
                        <?= date_format($unapp_date, "d/m/Y").'<br>'; ?>
                        <span class="font-weight-bold text-danger">
                          เวลา 
                        </span>
                        <span class="font-weight-bold text-gray-800">
                          <?= date_format($unapp_date, "H:i:s"); ?>
                        </span>
                      </td>

                      <td>
                        <span class="label2 bg-danger mr-1">
                          <?= $row['status'] ?>
                        </span>

                      </td>
                    </tr>
<?php $no++; } 
    }
?>
                  </tbody>
                </table><br>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>