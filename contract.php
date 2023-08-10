<?php
  // Contain html, meta ,tilt function , Path of CSS, Font awesome \\
  require "./php-html/header-html.php";

  // function change title dynamic \\
  echo ch_title("Contract");

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
                    <h1 class="mt-5 text-center mb-5">
                      ติดต่อเรา
                    </h1>

                    <div class="row">
                      <div class="col-lg-12 mb-5 mb-sm-2">
                        <form>
                          
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <textarea
                                  class="form-control textarea"
                                  style="height: 190px;"
                                  placeholder="Comment *"
                                  id="message"
                                ></textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row">

                            <div class="col-sm-6">
                              <div class="form-group">
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  aria-describedby="name"
                                  placeholder="Name *"
                                />
                              </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="form-group">
                                <input
                                  type="email"
                                  class="form-control"
                                  id="email"
                                  aria-describedby="email"
                                  placeholder="Email *"
                                />
                              </div>
                            </div>

                          </div>

                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <a
                                  href="#"
                                  class="btn btn-lg btn-dark font-weight-bold mt-3"
                                  >Send Message</a
                                >
                              </div>
                            </div>
                          </div>

                        </form>

                      </div>
                    </div>
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



     