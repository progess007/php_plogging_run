<div class="modal fade bd-example-modal-lg" id="modalApprove" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">จัดการข้อมูลวิ่ง</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead style="font-size: 10px;" class="bg-dark text-white">
                    <tr>
                        <th></th>
                        <th style="min-width: 100px;">ชื่อ - นามสกุล</th>
                        <th>รูปการวิ่ง</th>
                        <th>รูปเก็บขยะ</th>
                        <th style="min-width: 50px;">ระยะทางวิ่ง</th>
                        <th style="min-width: 120px;">จำนวนขยะที่เก็บ</th>
                        <th style="min-width: 84px;">วันที่ข้อมูลเข้า</th>
                        <th style="max-width: 66px;">สถานะ</th>
                        <th>อนุมัติ</th>
                        <th>ไม่อนุมัติ</th>
                    </tr>
                  </thead>
                  <!-- ส่วนกลาง -->
                  <tbody style="font-size: 12px;">
<!-- history -->
<?php 

// Wait Approve

$sql = "SELECT * FROM approve_data d 
        JOIN m_member m ON d.m_id = m.member_id
        JOIN status s ON d.status_id = s.status_id
        WHERE d.status_id = 3
        ORDER BY d.data_create_date DESC";
$no = 1;
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)) {

    $trash = $row['data_trash_t1'] + $row['data_trash_t2'] + $row['data_trash_t3'] + $row['data_trash_t4'] + $row['data_trash_t5'];
    $date = date_create($row['data_create_date']);

?>
  
                  <tr>
                    <form action="" method="post">

                      <td> <!-- รูปผู่้ใช้งานทั่วไป -->
                        <input 
                         type="hidden"
                         value="<?php echo $row['data_id'] ?>"
                         id="data_id"
                         name="data_id"
                        >

                        <input 
                         type="hidden"
                         value="<?php echo $row['m_id'] ?>"
                         id="id"
                         name="id"
                        >

                        <?php echo $no; ?>
                      </td>

                      <td> <!-- ชื่อผู้ใช้งาน -->
                        <?= $row['m_name'].' &nbsp&nbsp'.$row['m_lastname'] ?>
                      </td>

                      <td> <!-- รูประยะทางการวิ่ง -->
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

                      <td> <!-- รูปการทึ้งขยะ -->
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

                      <td> <!-- ระยะทางการวิ่ง -->
                        <input 
                         type="hidden" 
                         value="<?php echo $row['data_distance'] ?>" 
                         name="distance"
                         id="distance"
                        >

                        <p>
                          <?= '<span class="text-c1">'.$row['data_distance'].'</span>' ?>
                          Km
                        </p>

                        <a 
                         href="admin-approve-edit?uid=<?=$row['data_id']?>&distance=<?=$row['data_distance']?>" 
                         class="label2 bg-warning"
                         id="edit1"
                         data-toggle="tooltip"
                         data-placement="right"
                         title="แก้ไข"
                        >
                         <i class="fa fa-edit">
                          แก้ไข
                         </i>
                        </a>
                      </td>

                      <td> <!-- ขยะ 1 -->
                        <input 
                         type="hidden"
                         value="<?=$trash?>"
                         name="trash"
                         id="trash"
                        >

                        <span>
                          กระดาษ 
                          <?= '<span class="text-c1" id="t1">'.$row['data_trash_t1'].'</span>' ?>
                          ชิ้น
                        </span><br>

                        <span>
                          ถุงพลาสติก 
                          <?= '<span class="text-c1" id="t2">'.$row['data_trash_t2'].'</span>' ?>
                          ชิ้น
                        </span><br>

                        <span>
                          ขวดพลาสติก 
                          <?= '<span class="text-c1" id="t3">'.$row['data_trash_t3'].'</span>' ?>
                          ชิ้น
                        </span><br>

                        <span>
                          ขวดแก้ว 
                          <?= '<span class="text-c1" id="t4">'.$row['data_trash_t4'].'</span>' ?>
                          ชิ้น
                        </span><br>

                        <p>
                          กระป๋องเหล็ก
                          <?= '<span class="text-c1" id="t5">'.$row['data_trash_t5'].'</span>' ?>
                          ชิ้น
                        </p>

                        
                        <a 
                         href="admin-approve-edit?uid=<?=$row['data_id']?>&t1=<?=$row['data_trash_t1']?>&t2=<?=$row['data_trash_t2']?>&t3=<?=$row['data_trash_t3']?>&t4=<?=$row['data_trash_t4']?>&t5=<?=$row['data_trash_t5']?>"
                         class="label2 bg-warning"
                         title="แก้ไข"
                         data-id="<?= $row['data_id'] ?>"
                        >
                          <i class="fas fa-edit">
                          แก้ไข
                          </i>
                        </a>
                        
                      </td>


                      <td> <!-- วันที่บันทึกข้อมูล -->
                        <?= date_format($date, "d/m/Y").'<br>'; ?>

                        <span class="font-weight-bold text-danger">เวลา </span>
                        <span class="font-weight-bold text-gray-800"><?= date_format($date, "H:i:s"); ?></span>
                      </td>

                      <td> <!-- สถานะข้อมูล -->
                        <span class="label2 bg-orange" 
                         data-toggle="tooltip" title="รอการอนุมัติ">
                          <?= $row['status'] ?>
                        </span>
                      </td>

                      <td>
                        <a 
                         href="#"
                         class="label3 bg-primary"
                         title="แก้ไข"
                         onclick="approve(<?=$row['data_id'];?>,<?=$row['m_id']?>,<?=$row['data_distance']?>,<?=$trash?>)"
                        >
                          <i class="fas fa-check">
                            อนุมัติ 
                          </i>
                        </a>

                      </td>

                      <td>
                        <a 
                         href="#"
                         class="label3 bg-danger"
                         title="แก้ไข"
                         onclick="unApprove(<?=$row['data_id']?>)"
                        >
                          <i class="fas fa-check">
                            ไม่อนุมัติ 
                          </i>
                        </a>
                      </td>

                    </form>
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