<!-- Modal จัดการ Profile -->
<div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">จัดการข้อมูลผู้ใช้</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="row">

          <div class="col-lg-8">
            <div class="card shadow mb-4">
    
              <div class="card-body">
      
                <!-- Form Start -->
                <form id="profile" method="post">
                  <div class="row">
                    <div class="col-md-4 mb-4">

                      <div class="form-group text-center" style="position: relative;" >
                        <span class="img-div">
                          <img 
                            src="<?php echo $row['m_img'] ?>"
                            id="profileDisplay2"
                          >
                        </span>
                      </div>

                    </div>

                    <div class="col-md-5">
                      <div class="profile-head">
                        <h5> <?php echo $row['m_name']."  &nbsp&nbsp".$row['m_lastname'] ?></h5>
                        <h6> - </h6>
                          <p class="proile-rating"> 
                            วันที่แก้ไข : <span><?php echo date_format($mo_date, "d/m/Y").'<span class="font-weight-bold text-danger"> เวลา </span>'.date_format($mo_date, "H:i:s") ?></span>
                          </p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <!-- button -->
                      <a
                      class="profile-edit-btn btn btn-warning mb-4"
                      onclick="userEdit()"
                      > Edit Profile </a>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                    
                    </div>
                    <div class="col-md-8">
                      <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          
                          <div class="row">
                            <div class="col-md-6">
                                <label>ระดับการใช้งาน</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['m_level'] ?></p>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                                <label>อีเมล</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['m_email'] ?></p>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                                <label>เบอร์โทรศัพท์</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['m_phone'] ?></p>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                                <label>วันที่สมัคร</label>
                            </div>
                            <div class="col-md-6">
                              <p>
                                <?php echo date_format($date, "d/m/Y").' ' ?>
                                <span class="font-weight-bold text-danger">เวลา </span>
                                <?= date_format($date, "H:i:s"); ?>
                              </p>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <!-- END FORM -->

                <!--============ EDIT USER FORM ============-->
                <form id="profile2" action="./php/edit-profile.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-4 mb-4">

                      <div class="form-group text-center" style="position: relative;" >
                        <span class="img-div">

                          <div class="text-center img-placeholder" onClick="triggerClick()">
                            <h4>คลิกเพื่ออัปโหลดรูป</h4><br>
                            <span style="font-size: 20px;">Profile</span>
                          </div>

                          <img 
                          src="<?php echo $row['m_img'] ?>"
                          onClick="triggerClick()"
                          id="profileDisplay"
                          >
                        </span>

                        <input 
                          type="file"
                          onChange="displayImage(this)"
                          id="profileImage" class="form-control"
                          style="display: none;"
                          name="profileImage"
                        >

                      </div>

                    </div>

                    <div class="col-md-5">
                      <div class="profile-head">
                        <h5> <?php echo $row['m_name']."  &nbsp&nbsp".$row['m_lastname'] ?></h5>
                        <h6> - </h6>
                          <p class="proile-rating"> 
                            วันที่แก้ไข : <span><?php echo date_format($mo_date, "d/m/Y").'<span class="font-weight-bold text-danger"> เวลา </span>'.date_format($mo_date, "H:i:s") ?></span>
                          </p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                              </li>
                            </ul>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <a class="profile-edit-btn btn btn-warning mb-4" onclick="userEdit()"> Edit Profile </a>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4"> </div>

                      <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            
                            <div class="row">
                              <div class="col-md-6">
                                  <label>อีเมล</label>
                              </div>
                              <div class="col-md-6">
                                <p>
                                  <input 
                                   type="text" 
                                   class="form-control form-control-user" 
                                   name="email" 
                                   value="<?php echo $row['m_email'] ?>" 
                                   readonly
                                  >
                                </p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                  <label>ชื่อ</label>
                              </div>
                              <div class="col-md-6">
                                <p>
                                  <input 
                                   type="hidden" name="id" 
                                   value="<?= $row['member_id'] ?>"
                                  >
                                  <input 
                                   type="hidden" name="level" 
                                   value="<?= $row['m_level'] ?>"
                                  >

                                  <input 
                                   type="text" 
                                   class="form-control form-control-user" 
                                   name="name" 
                                   value="<?= $row['m_name'] ?>"
                                  >
                                </p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                  <label>นามสกุล</label>
                              </div>
                              <div class="col-md-6">
                                <p>
                                  <input 
                                   type="text" 
                                   class="form-control form-control-user" 
                                   name="lastname" 
                                   value="<?= $row['m_lastname'] ?>"
                                  >
                                </p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                  <label>เบอร์โทรศัพท์</label>
                              </div>
                              <div class="col-md-6">
                                <p>
                                  <input 
                                    type="text" 
                                    class="form-control form-control-user" 
                                    name="phone" 
                                    value="<?= $row['m_phone'] ?>"
                                  >
                                </p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                
                              </div>
                              <div class="col-md-6">
                                <p>
                                  <button class="btn btn-primary form-control mt-4" name="edit"> บันทึกข้อมูล </button>
                                </p>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                  </div>

                </form>
                <!-- END FORM -->
              </div>
            </div>
          </div>

          <div class="col-lg-4">

          </div>

        </div>
      </div> <!-- END MoDal Body -->

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>