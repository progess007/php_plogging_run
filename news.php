<?php
  // Contain html, meta ,tilt function , Path of CSS, Font awesome \\
  require "./php-html/header-html.php";

  // function change title dynamic \\
  echo ch_title("ข่าว");

  // Menu Header (Nav sidebar, Nav Topbar) \\
  require "./php-html/header-nav.php";


?>

<?php 
$id = $_GET['page_id'];

$sql = "SELECT * FROM news_post p 
        JOIN news_category c ON p.news_category_id = c.category_id
        WHERE news_id = $id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

?>

      <!-- DIV Main content อยู่ใน header.php -->

      <div class="content-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="card" data-aos="fade-up">
                <div class="card-body">
                  <div class="aboutus-wrapper">
                    <h1 class="my-5 text-center">
                      <?php echo $row['news_title'] ?>
                    </h1>
                    <p class="font-weight-600 fs-15">
                      <?php echo $row['post_1'] ?>
                    </p>
                    <p class="font-weight-600 fs-15 mb-5 mt-4">
                      <?php echo $row['post_2'] ?>
                    </p>
                    <img
                      src="<?php echo $row['news_img'] ?>"
                      alt="banner"
                      class="img-fluid mb-5"
                    />

                    <p class="font-weight-600 fs-15 text-center">
                      <?php echo $row['post_3'] ?>
                    </p>
                    <p class="font-weight-600 fs-15 mb-5 mt-4 text-center">
                      <?php echo $row['post_4'] ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        

<?php
  // Contain Footer ท้ายเว็บ
  require "./php-html/footer-end.php";

  // Contain Path of Javascript
  
  require "./php-html/footer-java.php";
?>



     