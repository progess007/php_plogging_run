<?php
  // Contain html, meta ,tilt function , Path of CSS, Font awesome \\
  require "./php-html/admin-html.php";
  $crPage = 'admin-carousel';

  // function change title dynamic \\
  echo ch_title("Image Slider");

  // Contain User menu bar \\
  require "./php-html/admin-nav.php";

?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">จัดการ Carousel</h6>
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-bordered mt-4" width="50%" cellspacing="0">

                  <tr class="text-center bg-dark text-white">
                    <th>#</th>
                    <th>ชื่อภาพ</th>
                    <th>คำอธิบาย</th>
                    <th>ตัวอย่างภาพ</th>
                    <th style="min-width: 170px;">Operation</th>
                  </tr>
                  <tr>
<?php 

$id = $_GET['edit'];
$query = mysqli_query($conn, "SELECT * FROM carousel WHERE carousel_id=$id");
while ($row = mysqli_fetch_assoc($query)) {

?>

                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                  <td>
                      <?= $row['carousel_id'] ?>
                  </td>

                  <td>
                    <input type="text" class="form-control" name="ca-name" value="<?=$row['carousel_name']?>">
                  </td>

                  <td>
                    <input type="text" class="form-control" name="ca-des" value="<?=$row['carousel_description']?>">
                  </td>

                  <td>
                    <button class="btn btn-sm btn-info" name="ca-update">
                      <i class="fa fa-edit mr-1"></i> บันทึก
                    </button>
                  </td>
                </form>
                </tr>
<?php } ?>
              </table>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php 

if (isset($_POST['ca-update'])) {

  echo "asdasdasd";
  $name = $_POST['ca-name'];
  $des = $_POST['ca-des'];

  if (empty($_POST['ca-name']) AND empty($_POST['ca-des'])) {
    echo "<script>
            alert('ข้อมูลไม่ครบ')
            window.location.replace('./admin-carousel')
          </script>"; 
  } 
  else {

    $sql = "UPDATE carousel SET carousel_name=?, carousel_description=? WHERE carousel_id=?";
    $stmt = mysqli_prepare($conn , $sql);
    mysqli_stmt_bind_param($stmt, 'ssi', $name, $des, $id);
    if (mysqli_stmt_execute($stmt)) {
      echo "<script>
              alert('บันทึกข้อมูลสำเร็จ')
              window.location.replace('./admin-carousel')
            </script>"; 
    }
  }
}

?>

<?php
  // Contain Footer ท้ายเว็บ
  require "./php-html/footer-end.php";

  // Contain Path of Javascript
  require "./php-html/footer-java-sys.php";
?>
