
<!-- Modal ประวัติบันทึกข้อมูลการวิ้่ง -->
<div class="modal fade" id="modalHistory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">ประวัติบันทึกข้อมูล</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="table-responsive">
                <table class="table table-bordered" id="tableHistory" width="100%" cellspacing="0">
                  <thead style="font-size: 10px;">
                    <tr>
                      <th style="min-width: 10px;"></th>
                      <th style="min-width: 100px;">ชื่อ - นามสกุล</th>
                      <th style="min-width: 40px;">รูปการวิ่ง</th>
                      <th style="min-width: 40px;">รูปเก็บขยะ</th>
                      <th style="max-width: 40px;">ระยะทางวิ่ง</th>
                      <th style="max-width: 57px;">จำนวนขยะที่เก็บ</th>
                      <th style="min-width: 84px;">วันที่บันทึก</th>
                      <th style="min-width: 84px;">วันที่อนุมัติ</th>
                      <th style="min-width: 66px;">สถานะ</th>
                    </tr>
                  </thead>
                  <!-- ส่วนกลาง -->
                  <tbody style="font-size: 14px;">
<!-- history -->
<?php 
// Unapprove
// $s_id = $row['member_id'];
$sql = "SELECT * FROM approve_data d 
        JOIN m_member m ON d.m_id = m.member_id
        JOIN status s ON d.status_id = s.status_id
        WHERE d.m_id = $s_id AND d.status_id = 2";
$no = 1;
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)) {

    $date = date_create($row['data_create_date']);
    $un_date = date_create($row['data_unapprove_date']);

    $dImg = $row['data_distance_img'];
    $tImg = $row['data_trash_img'];

    $trash = $row['data_trash_t1'] + $row['data_trash_t2'] + $row['data_trash_t3'] + $row['data_trash_t4'] + $row['data_trash_t5'];
    
?>
                    <tr>
                      
                      <td> <?= $no; ?> </td>

                      <td>
                        <?php echo $row['m_name'].' &nbsp&nbsp'.$row['m_lastname'] ?>
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
                        </span> Km
                      </td>

                      <td>
                        <span class="font-weight-bold text-danger"> 
                          <?=$trash?>
                        </span> ชิ้น
                      </td>

                      <td>
                        <?= date_format($date, "d/m/Y").'<br>'; ?>
                        <span class="font-weight-bold text-danger">เวลา </span>
                        <span class="font-weight-bold text-gray-800"><?= date_format($date, "H:i:s"); ?></span>
                      </td>

                      <td> - </td>

                      <td>
                        <span class="label2 bg-danger mr-1">
                          <?php echo $row['status'] ?>
                        </span>

                          <a
                           href="#"
                           class="label3 bg-primary"
                           onclick="delUn(<?= $row['data_id'] ?>)"
                          >
                            <i class="fas fa-trash text-white"> ลบ</i>
                          </a>
                      </td>

                    </tr>
<?php $no++; } 
  }

// Wait Approve

$sql = "SELECT * FROM approve_data d 
        JOIN m_member m ON d.m_id = m.member_id
        JOIN status s ON d.status_id = s.status_id
        WHERE d.m_id = $s_id AND d.status_id = 3
        ORDER BY d.data_create_date DESC";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)) {

    $trash = $row['data_trash_t1'] + $row['data_trash_t2'] + $row['data_trash_t3'] + $row['data_trash_t4'] + $row['data_trash_t5'];
    $date = date_create($row['data_create_date']);
?>
                    <tr>

                      <td>
                        <?= $no; ?>
                      </td>

                      <td>
                        <?php echo $row['m_name'].' &nbsp&nbsp'.$row['m_lastname'] ?>
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
                        </span> Km
                      </td>

                      <td>
                        <span class="font-weight-bold text-danger"> 
                          <?=$trash?>
                        </span> ชิ้น
                      </td>

                      <td>
                      <?= date_format($date, "d/m/Y").'<br>'; ?>
                        <span class="font-weight-bold text-danger">เวลา </span>
                        <span class="font-weight-bold text-gray-800"><?= date_format($date, "H:i:s"); ?></span>
                      </td>

                      <td> - </td>

                      <td>
                        <span class="label2 bg-orange">
                          <?php echo $row['status'] ?>
                        </span>
                      </td>
                    </tr>
<?php $no++; }
} 

// Aprrove

$sql = "SELECT * FROM approve_data d 
        JOIN m_member m ON d.m_id = m.member_id
        JOIN status s ON d.status_id = s.status_id
        WHERE d.m_id = $s_id AND d.status_id = 1";

$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)) {

    $date = date_create($row['data_create_date']);
    $app_date = date_create($row['data_approve_date']);

    $trash = $row['data_trash_t1'] + $row['data_trash_t2'] + $row['data_trash_t3'] + $row['data_trash_t4'] + $row['data_trash_t5'];
    
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
                           class="example-image mx-auto"
                           src="<?php echo $row['data_distance_img'] ?>"
                          >
                        </a>
                      </td>

                      <td>
                        <a
                         class="example-image-link" 
                         href="<?php echo $row['data_trash_img'] ?>"
                         onclick="popImg(this)"
                        >
                          <img
                           class="example-image mx-auto"
                           src="<?php echo $row['data_trash_img'] ?>"
                          >
                        </a>
                      </td>

                      <td>
                        <span class="font-weight-bold text-danger"> 
                          <?=$row['data_distance']?>
                        </span> Km
                      </td>

                      <td>
                        <span class="font-weight-bold text-danger"> 
                          <?=$trash?>
                        </span> ชิ้น
                      </td>

                      <td>
                        <?= date_format($date, "d/m/Y").'<br>'; ?>
                        <span class="font-weight-bold text-danger">เวลา </span>
                        <span class="font-weight-bold text-gray-800"><?= date_format($date, "H:i:s"); ?></span>
                      </td>

                      <td>
                        <?= date_format($app_date, "d/m/Y").'<br>'; ?>
                        <span class="font-weight-bold text-danger">เวลา </span>
                        <span class="font-weight-bold text-gray-800"><?= date_format($app_date, "H:i:s"); ?></span>
                      </td>

                      <td>
                        <span class="label2 bg-success">
                          <?php echo $row['status'] ?>
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