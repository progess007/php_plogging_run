
<!-- Modal อันดับการวิ่ง -->
<div class="modal fade" id="modalRankd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">อันดับรวมการวิ่ง</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="tableRankd" width="100%" cellspacing="0">
            <thead style="font-size: 14px;" class="bg-dark text-white">
              <tr>
                <th style="width: 10px;">อันดับ</th>
                <th style="width: 25px;">  </th>
                <th style="min-width: 120px;">ชื่อ - นามสกุล</th>
                <th>ระยะทางวิ่ง</th>
                <th>สถานะ</th>
              </tr>
            </thead>

            <tbody style="font-size: 14px;">
<?php 

$sql = "SELECT r.r_distance, m.member_id, m.m_name, m.m_lastname, m.m_img, l.m_level 
        FROM ranking_data r
        JOIN m_member m ON r.m_id = m.member_id 
        JOIN m_level l ON m.m_level = l.m_id
        ORDER BY r.r_distance DESC";
$res = mysqli_query($conn, $sql);

$rank = 0;
$last_score = false;
$rows = 0;

if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)) {
    $rows++;
    if( $last_score != $row['r_distance'] ){
      $last_score = $row['r_distance'];
      $rank = $rows;
    }

?>
              <tr>
                <td>
                  <?= $rank ?>
                </td>

                <td>
                  <a 
                    class="example-image-link" 
                    href="<?= $row['m_img'] ?>"
                    onclick="popImg(this)"
                  >
                    <img
                      class="example-image mx-auto"
                      src="<?= $row['m_img'] ?>"
                    >
                  </a>
                </td>

                <td>
                  <?= $row['m_name'].' &nbsp&nbsp'.$row['m_lastname'] ?>
                </td>

                <td>
                  <span class="text-c1 font-weight-bold">
                    <?= $row['r_distance'] ?>
                  </span>
                    Km
                </td>

                <td>
                  <span 
                    <?php if($row['m_level'] == "นักศึกษา") 
                      echo 'class="label2 bg-primary mr-1"';
                      if ($row['m_level'] == "ผู้ใช้งานทั่วไป")
                      echo 'class="label2 bg-secondary mr-1"';
                    ?>
                  >
                    <?= $row['m_level'] ?>
                  </span>
                </td>
              </tr>
<?php }
} 
?>
            </tbody>
          </table><br>
        </div>

      </div>

      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>


<!-- Modal อันดับการเก็บขยะ -->
<div class="modal fade" id="modalRankt" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">อันดับรวมการเก็บขยะ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <div class="table-responsive">
                <table class="table table-bordered" id="tableRankt" width="100%" cellspacing="0">
                  <thead style="font-size: 14px;" class="bg-dark text-white">
                    <tr>
                      <th style="width: 10px;">อันดับ</th>
                      <th style="width: 25px;">  </th>
                      <th style="min-width: 120px;">ชื่อ - นามสกุล</th>
                      <!-- <th>ระยะทางวิ่ง</th> -->
                      <th>จำนวนขยะที่เก็บ</th>
                      <th>สถานะ</th>
                    </tr>
                  </thead>

                  <tbody style="font-size: 14px;">
<?php 

$sql = "SELECT r.r_trash, m.member_id, m.m_name, m.m_lastname, m.m_img, l.m_level 
        FROM ranking_data r
        JOIN m_member m ON r.m_id = m.member_id 
        JOIN m_level l ON m.m_level = l.m_id
        ORDER BY r.r_trash DESC";
$res = mysqli_query($conn, $sql);

$rank = 0;
$last_score = false;
$rows = 0;

if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)) {
    $rows++;
    if( $last_score != $row['r_trash'] ){
      $last_score = $row['r_trash'];
      $rank = $rows;
    }

?>
              <tr>
                <td>
                  <?= $rank ?>
                </td>

                <td>
                  <a 
                    class="example-image-link" 
                    href="<?= $row['m_img'] ?>"
                    onclick="popImg(this)"
                  >
                    <img
                      class="example-image mx-auto"
                      src="<?= $row['m_img'] ?>"
                    >
                  </a>
                </td>

                <td>
                  <?= $row['m_name'].' &nbsp&nbsp'.$row['m_lastname'] ?>
                </td>

                <td>
                  <span class="text-c1 font-weight-bold">
                    <?= $row['r_trash'] ?>
                  </span>
                  ชิ้น
                </td>

                <td>
                  <span 
                    <?php if($row['m_level'] == "นักศึกษา") 
                      echo 'class="label2 bg-primary mr-1"';
                      if ($row['m_level'] == "ผู้ใช้งานทั่วไป")
                      echo 'class="label2 bg-secondary mr-1"';
                    ?>
                  >
                    <?= $row['m_level'] ?>
                  </span>
                </td>
              </tr>
<?php }
} 
?>
            </tbody>
          </table><br>
        </div>

      </div>

      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>