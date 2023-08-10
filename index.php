
<?php
  // Contain html, meta ,tilt function , Path of CSS, Font awesome \\
  require "./php-html/header-html.php";

  // function change title dynamic \\
  echo ch_title("Home");

  // Menu Header (Nav sidebar, Nav Topbar) \\
  require "./php-html/header-nav.php";

  $query = "SELECT * FROM carousel ORDER BY carousel_id DESC LIMIT 3";
  $result = mysqli_query($conn, $query);

?>
<style>
.videoWrapper {
	position: relative;
	padding-bottom: 56.25%; /* 16:9 */
	padding-top: 25px;
	height: 0;
}
.videoWrapper iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
</style>
      <!-- DIV Main content อยู่ใน header.php -->

        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php
              $i=0;
              foreach($result as $row) {
                $actives='';
                if($i==0){
                $actives='active';
              }
            ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>" class="<?php echo $actives;?> "></li>
            <?php $i++;} ?>
          </ol>
          <div class="carousel-inner">
            <?php
                $i=0;
                foreach($result as $row){
                $actives='';
                if($i==0){
                $actives='active';
                }
            ?>

            <div class="carousel-item <?php echo $actives;?>">
              <a href="#">
                <img class="d-block w-100" src="<?php echo $row['carousel_img'];?>" alt="<? echo $row['carousel_name'] ?>">
              </a>
            </div>
<?php 
    $i++; }
    // mysqli_close($conn);          
?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
  <!-- End Carousel -->


        <!-- Begin Page Content -->
        <div class="content-wrapper">
            <div class="container">
              <div class="row" data-aos="fade-up">
                <div class="col-xl-8 stretch-card grid-margin">
                  <div class="position-relative">
<?php 

$sql = "SELECT * FROM news_post p 
        JOIN news_category c ON p.news_category_id = c.category_id
        ORDER BY news_id DESC
        LIMIT 1 OFFSET 0";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

?>
                    <img
                      src="<?php echo $row['news_img'] ?>"
                      alt="banner"
                      class="img-fluid rounded"
                    />
                    <div class="banner-content rounded" style="background-color:rgba(66, 68, 78, 0.5);">
                      <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                        UGC <?php echo $row['category_name'] ?>
                      </div>
                      <h3 class="mb-0">
                        <a href="news?page_id=<?php echo $row['news_id'] ?>" class="text-white med">
                          <?php echo $row['news_title']  ?>
                        </a>
                      </h3>
                      <h3 class="mb-2">
                        
                      </h3>
                      <div class="fs-12">
                        <span class="mr-2"> </span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ข่าวเก่า -->
                <div class="col-xl-4 stretch-card grid-margin">
                  <div class="card bg-dark text-white">
                    <div class="card-body">
                      <h2>ข่าวล่าสุด</h2>

<?php 
$sql = "SELECT * FROM news_post p 
JOIN news_category c ON p.news_category_id = c.category_id
ORDER BY news_id DESC
LIMIT 3 OFFSET 0";

$query = mysqli_query($conn , $sql);
if (mysqli_num_rows($query) > 0) {
  while ($row = mysqli_fetch_assoc($query)) {

?>
                      <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                        <div class="pr-3">
                          <h6>
                            <a href="news?page_id=<?php echo $row['news_id'] ?>" 
                                class="text-white">
                              <?php echo $row['news_title']; ?>
                            </a>
                          </h6>
                          <div class="fs-12">
                            <span class="mr-2"> </span>
                          </div>
                        </div>
                        <div class="rotate-img">
                          <img
                            src="<?php echo $row['news_img'] ?>"
                            alt="thumb"
                            class="img-fluid img-lg2"
                          />
                        </div>
                      </div>
<?php }
}
?>
                    </div>
                  </div>
                </div>
              </div>
              
    <!-- Video Content -->
              <div class="row" data-aos="fade-up">
                <div class="col-sm-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">

                        <div class="col-sm-12">
                          <div class="card-title">
                            คลิปแนะนำ We care We share By UBU Green Club
                          </div>
                          <div class="row">
                            <div class="col-lg-12 grid-margin">
                              <div class="position-relative">
                                <div class="rotate-img videoWrapper">
                                  <iframe
                                    src="https://www.youtube.com/embed/n4rwdy-TGAI"
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                                  </iframe>
                                  <!-- <img
                                    src="img/te1.jpg"
                                    alt="thumb"
                                    class="img-fluid"
                                  /> -->
                                </div>
                                <div class="badge-positioned w-90">
                                  <div
                                    class="d-flex justify-content-between align-items-center"
                                  >
                                      <!-- <span class="badge badge-danger font-weight-bold">
                                      How To
                                      </span> -->
                                    <!-- <div class="video-icon">
                                      <i class="mdi mdi-play"></i>
                                    </div> -->
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>

                        <!-- <div class="col-lg-4">
                          <div
                            class="d-flex justify-content-between align-items-center"
                          >
                            <div class="card-title">
                              Latest Video
                            </div>
                            <p class="mb-3">See all</p>
                          </div>
                          <div
                            class="d-flex justify-content-between align-items-center border-bottom pb-2"
                          >
                            <div class="div-w-80 mr-3">
                              <div class="rotate-img">
                                <img
                                  src="img/te2.jpg"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </div>
                            </div>
                            <h3 class="font-weight-600 mb-0">
                              Comming Soon
                            </h3>
                          </div>

                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            
  <!-- Content News=============== -->

              <div class="row" data-aos="fade-up">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-body">

                      <div class="row">
                        <div class="col-xl-6">
                          <div class="card-title">
                            UBU Green Club
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <img 
                              src="image/news/news-2.jpg" 
                              class="img-fluid"
                              >
                            </div>
                          </div>
                        </div>

                        <div class="col-xl-6">
                          <div class="row">

                            <div class="col-sm-6">
                              <div class="card-title">
                                ข่าวทั่วไป
                              </div>

                              <div class="border-bottom pb-3">
<?php 

$sql = "SELECT * FROM news_post p 
JOIN news_category c ON p.news_category_id = c.category_id
ORDER BY news_id DESC
LIMIT 1 OFFSET 0";

$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
  while ($row = mysqli_fetch_assoc($query)) {

?>
                                <div class="rotate-img">
                                  <img
                                    src="<?=$row['news_img'] ?>"
                                    alt="thumb"
                                    class="img-fluid"
                                  />
                                </div>
                                <a href="news?page_id=<?php echo $row['news_id'] ?>">
                                  <p class="fs-16 font-weight-600 mb-0 mt-3">
                                    <?=$row['news_title'] ?>
                                  </p>
                                </a>

                              </div>
<?php } 
}
?>
                            </div>
        <!--=========== End news ============-->

                            <div class="col-sm-6">
                              <div class="card-title">
                                ข่าวอื่นๆ
                              </div>
<?php 
$sql = "SELECT * FROM news_post p 
JOIN news_category c ON p.news_category_id = c.category_id
ORDER BY news_id DESC
LIMIT 3 OFFSET 1";

$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
  while ($row = mysqli_fetch_assoc($query)) {


?>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="border-bottom pb-2 pt-2">
                                    <div class="row">
                                      <div class="col-sm-5 pr-2">
                                        <div class="rotate-img">
                                          <img
                                            src="<?=$row['news_img'] ?>"
                                            alt="Img"
                                            class="img-fluid w-100"
                                          />
                                        </div>
                                      </div>
                                      <div class="col-sm-7 pl-2">
                                        <a href="news?page_id=<?php echo $row['news_id'] ?>">
                                          <p class="fs-10 font-weight-600 mb-0">
                                            <?=$row['news_title'] ?>
                                          </p>
                                        </a>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
<?php }
}
?>

                       
                            </div>

                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
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
  require "./php-html/footer-java.php";
?>



     