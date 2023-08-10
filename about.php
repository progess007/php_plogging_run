<?php
  // Contain html, meta ,tilt function , Path of CSS, Font awesome \\
  require "./php-html/header-html.php";

  // function change title dynamic \\
  echo ch_title("About Us");

  // Menu Header (Nav sidebar, Nav Topbar) \\
  require "./php-html/header-nav.php";

?>

      <!-- DIV Main content อยู่ใน header.php -->

      <div class="content-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="card" data-aos="fade-up">
                <div class="card-body">
                  <div class="aboutus-wrapper">
                    <h1 class="mt-5">
                      เกี่ยวกับเรา
                    </h1>
                    <p class="font-weight-600 fs-15">
                      
                    </p>
                    <p class="font-weight-600 fs-15 mb-5 mt-4">
                      
                    </p>
                    <img
                      src="./image/carousel/banner1.jpg"
                      alt="banner"
                      class="img-fluid mb-5"
                    />

                    <p class="font-weight-600 fs-15 text-center">
                      
                    </p>
                    <p class="font-weight-600 fs-15 mb-5 mt-4 text-center">
                      
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



     