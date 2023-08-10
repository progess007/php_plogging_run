<!-- Modal จัดการ Profile -->
<div class="modal fade" id="modalAlluser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">รายชื่อผู้ใช้งานทั้งหมด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="tableAlluser" width="100%" cellspacing="0">
                
                <thead style="font-size: 14px;" class="bg-dark text-white">
                  <tr>
                    <th style="width: 5px;">#</th>
                    <th style="width: 10px;">รูปภาพ</th>
                    <th>Username</th>
                    <th style="min-width: 100px;">ชื่อ - นามสกุล</th>
                    <th style="min-width: 84px;">เบอร์โทร</th>
                    <th>คณะ</th>
                    <th>สถานะ</th>
                  </tr>
                </thead>
  
                <tbody>
                  <tr>
  <?php 
  
  $query = mysqli_query($conn, "SELECT * FROM m_member m LEFT JOIN faculty f ON f.faculty_id = m.faculty_id WHERE m.m_level=3 OR m.m_level=2");
  while ($row = mysqli_fetch_assoc($query)) {
  
  ?>
  
  
                    <td>
                      <?= $row['member_id'] ?>
                    </td>
  
                    <td>
                      <a 
                        class="example-image-link" 
                        href="<?php echo $row['m_img'] ?>"
                        onclick="popImg(this)"
                      >
                        <img
                          class="example-image"
                          src="<?php echo $row['m_img'] ?>"
                        >
                      </a>
                    </td>
  
                    <td>
                      <?= $row['m_username'] ?>
                    </td>
  
                    <td>
                      <?= $row['m_name'].' &nbsp&nbsp'.$row['m_lastname'] ?>
                    </td>
  
                    <td>
                      <?= $row['m_phone'] ?>
                    </td>
  
                    <td>
                      <?= $row['faculty'] ?>
                    </td>
  
                    <td>
                      <?php if($row['m_level'] == "2") 
                              echo '<span class="label2 bg-primary mr-1">นักศึกษา</span>';
                            if ($row['m_level'] == "3")
                            echo '<span class="label2 bg-secondary mr-1">ผู้ใช้งานทั่วไป</span>';
                      ?>
                    </td>
  
                  </tr>
  <?php } ?>
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