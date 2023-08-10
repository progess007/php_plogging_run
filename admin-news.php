<?php
  // Contain html, meta ,tilt function , Path of CSS, Font awesome \\
  require "./php-html/admin-html.php";
  $crPage = 'admin-news';

  // function change title dynamic \\
  echo ch_title("ระบบจัดการข่าว");

  // Contain User menu bar \\
  require "./php-html/admin-nav.php";

?>

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">จัดการข่าว</li>
          </ol>
        </nav>

          <!-- จัดการข่าว -->
          <div class="card shadow mb-4 mt-5">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">จัดการข่าว</h6>
            </div>
            <div class="card-body">

              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newModal">
                <i class="fa fa-plus mr-1"></i> เพิ่มข่าว
              </button>

              <div class="table-responsive">
                <table class="table table-bordered mt-4" width="50%" cellspacing="0">
                  <tr>
                    <th>#</th>
                    <th>ชื่อข่าว</th>
                    <th>ตัวอย่างภาพ</th>
                    <th>Operation</th>
                  </tr>
  <?php 

  $query = mysqli_query($conn, "SELECT * FROM news_post ORDER BY news_id DESC");
  while ($row = mysqli_fetch_assoc($query)) {

  ?>
                  <tr>

                    <td>
                      <?= $row['news_id'] ?>
                    </td>

                    <td>
                      <?= $row['news_title'] ?>
                    </td>

                    <td>
                      <a 
                        class="example-image-link" 
                        href="<?php echo $row['news_img'] ?>"
                        onclick="popImg(this)"
                      >
                        <img
                          class="example-image"
                          src="<?php echo $row['news_img'] ?>"
                        >
                      </a>
                    </td>

                    <td>
                      <a
                        class="btn btn-sm btn-warning my2 mt-2" 
                        href='admin-news-e?edit=<?php echo $row['news_id']; ?>'
                      >
                        <i class="fa fa-edit mr-1"></i> แก้ไข
                      </a>
                      <a
                        class="btn btn-sm btn-danger ml-2 mt-2" 
                        href='admin-news?del=<?php echo $row['news_id']; ?>'
                        onclick="return delConfirm()"
                      >
                        <i class="fa fa-trash mr-1"></i> ลบ
                      </a>
                    </td>

                  </tr>
  <?php } ?>
                </table>
              </div> <!-- End Table -->

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="carouselModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="newModalLabel">เพิ่มข่าว</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                
                  <div class="form-group">
                    <label >ชื่อข่าว</label>
                    <input type="text" class="form-control" name="new-title">
                  </div>
                  
                  <div class="form-group">
                    <label>เนื้อหาข่าว 1</label>
                    <textarea class="form-control" rows="3" name="new-post1"></textarea>
                  </div>

                  <div class="form-group">
                    <label>เนื้อหาข่าว 2</label>
                    <textarea class="form-control" rows="3" name="new-post2"></textarea>
                  </div>

                  <div class="form-group">
                    <label>เนื้อหาข่าว 3</label>
                    <textarea class="form-control" rows="3" name="new-post3"></textarea>
                  </div>

                  <div class="form-group">
                    <label>เนื้อหาข่าว 4</label>
                    <textarea class="form-control" rows="3" name="new-post4"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlFile1">อัพโหลด รูปภาพ</label>
                    <input type="file" class="form-control-file" name="new-img">
                  </div>
                
              </div>

              <div class="modal-footer">
                <button class="btn btn-primary" name="new-save">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

<?php 

if (isset($_POST['new-save'])) {
  $title = $_POST['new-title'];
  $post1 = $_POST['new-post1'];
  $post2 = $_POST['new-post2'];
  $post3 = $_POST['new-post3'];
  $post4 = $_POST['new-post4'];
  $img = basename($_FILES['new-img']['name']);

  if (empty($_POST['new-title']) AND empty($_POST['new-post1'])) {
    echo "<script>
            alert('ข้อมูลไม่ครบ')
            window.location.replace('./admin-news')
          </script>"; 
  } 
  else {

    // function Random Image
    $date = date('dmy');
    $rename = "news-".$date;
    $target_i = "./image/news/".$rename.$img;

    $sql = "INSERT INTO news_post(news_title, post_1, post_2, post_3, post_4, 
            news_category_id, news_img, news_status, news_date_published, news_date_updated)
            VALUES (?, ?, ?, ?, ?, 1, ?, 1, NOW(), NOW())";
    $stmt = mysqli_prepare($conn , $sql);
    mysqli_stmt_bind_param($stmt, 'ssssss', $title, $post1, $post2, $post3, $post4, $target_i);
    if (mysqli_stmt_execute($stmt)) {
      move_uploaded_file($_FILES['new-img']['tmp_name'], $target_i);

      echo "<script>
              alert('บันทึกข้อมูลสำเร็จ')
              window.location.replace('./admin-news')
            </script>"; 
    }
  }
}

if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $query = mysqli_query($conn, "DELETE FROM news_post WHERE news_id=$id");
  echo "<script>
          alert('ลบข้อมูลสำเร็จ')
          window.location.replace('./admin-news')
        </script>"; 
}

?>

<?php
  // Contain Footer ท้ายเว็บ
  require "./php-html/footer-end.php";

  // Contain Path of Javascript
  require "./php-html/footer-java-sys.php";
?>
