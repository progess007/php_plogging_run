<?php
  // Contain html, meta ,tilt function , Path of CSS, Font awesome \\
  require "./php-html/admin-html.php";
  $crPage = 'admin-carousel';

  // function change title dynamic \\
  echo ch_title("Image Slider");

  // Contain User menu bar \\
  require "./php-html/admin-nav.php";

?>

<script type="text/javascript">
  function delConfirm() {
      var x = confirm("แน่ใจมั้ย?");
      if (x)
          return true;
      else
          return false;        
  }
</script> 

          <nav aria-label="breadcrumb">   
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./admin">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">จัดการ ฺBanner เว็บ</li>
            </ol>
          </nav>

          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-5">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">จัดการ Banner เว็บ</h6>
            </div>
            <div class="card-body">

              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#carouselModal">
                <i class="fa fa-plus mr-1"></i> เพิ่ม Carousel
              </button>

              <div class="table-responsive">
                <table class="table table-bordered mt-4" width="50%" cellspacing="0">
                  
                  <tr class="text-center bg-dark text-white">
                    <th>#</th>
                    <th>ชื่อภาพ</th>
                    <th>คำอธิบาย</th>
                    <th>ตัวอย่างภาพ</th>
                    <th style="min-width: 100px;">Operation</th>
                  </tr>
<?php 

$query = mysqli_query($conn, "SELECT * FROM carousel ORDER BY carousel_id DESC");
while ($row = mysqli_fetch_assoc($query)) {

?>
                  <tr class="text-center">

                    <td>
                      <?= $row['carousel_id'] ?>
                    </td>

                    <td>
                      <?= $row['carousel_name'] ?>
                    </td>

                    <td>
                      <?= $row['carousel_description'] ?>
                    </td>

                    <td>
                      <a 
                        class="example-image-link" 
                        href="<?php echo $row['carousel_img'] ?>"
                        onclick="popImg(this)"
                      >
                        <img
                          class="example-image"
                          src="<?php echo $row['carousel_img'] ?>"
                        >
                      </a>
                    </td>

                    <td>
                      <a
                        class="btn btn-sm btn-danger ml-2 " 
                        href='admin-carousel?del=<?php echo $row['carousel_id']; ?>'
                        onclick="return delConfirm()"
                      >
                        <i class="fa fa-trash mr-1"></i> ลบ
                      </a>
                    </td>
                  </tr>
  <?php } ?>
                </table>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

        <!-- Modal -->
      <div class="modal fade" id="carouselModal" tabindex="-1" role="dialog" aria-labelledby="carouselModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="carouselModalLabel">เพิ่ม Carousel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                
                  <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" name="ca-name">
                  </div>
                  
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="ca-des" value=" "></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlFile1">อัพโหลด รูปภาพ</label>
                    <input type="file" class="form-control-file" name="ca-img">
                  </div>
                
              </div>

              <div class="modal-footer">
                <button class="btn btn-primary" name="ca-save">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

<?php 

if (isset($_POST['ca-save'])) {
  $name = $_POST['ca-name'];
  $des = $_POST['ca-des'];
  $img = basename($_FILES['ca-img']['name']);

  if (empty($_POST['ca-name']) AND empty($_FILES['ca-img']['name'])) {
    echo "<script>
            alert('ข้อมูลไม่ครบ')
            window.location.replace('./admin-carousel')
          </script>"; 
  } 
  else {

    // function Random Image
    $date = date('dmy');
    $rename = "carousel-".$date;
    $target_i = "./image/carousel/".$rename.$img;

    $sql = "INSERT INTO carousel(carousel_name, carousel_img, carousel_description)
            VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn , $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $name, $target_i, $des);
    if (mysqli_stmt_execute($stmt)) {
      move_uploaded_file($_FILES['ca-img']['tmp_name'], $target_i);

      echo "<script>
              alert('บันทึกข้อมูลสำเร็จ')
              window.location.replace('./admin-carousel')
            </script>"; 
    }
  }
}

if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $query = mysqli_query($conn, "DELETE FROM carousel WHERE carousel_id= $id");
  echo "<script>
          alert('ลบข้อมูลสำเร็จ')
          window.location.replace('./admin-carousel')
        </script>"; 
}

?>

<?php
  // Contain Footer ท้ายเว็บ
  require "./php-html/footer-end.php";

  // Contain Path of Javascript
  require "./php-html/footer-java-sys.php";
?>
