<?php 

require './admin-profile.php';
require './admin-approve.php';
require './admin-history.php';
require './admin-alluser.php';
require './admin-rank.php';


?>

<div class="modal fade bd-example-modal-lg" id="modalView" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" id="tests">
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modalTrash" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">รายการเก็บขยะท้้งหมด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="tableHistory" cellspacing="0">
            <thead class="bg-dark text-white fs-14">
              <tr class="text-center">
                <th>ประเภท</th>
                <th>จำนวน (ชิ้น)</th>
              </tr>
            </thead>
            <!-- ส่วนกลาง -->
            <tbody class="text-dark">
              <tr>
                <td> กระดาษ </td>
                <td class="text-center "><span class="text-c1"><?= $t1 ?></span> ชิ้น</td>
              </tr>
              <tr>
                <td> ถุงพลาสติก </td>
                <td class="text-center "><span class="text-c1"><?= $t2 ?></span> ชิ้น</td>
              </tr>
              <tr>
                <td> ขวดพลาสติก </td>
                <td class="text-center"><span class="text-c1"><?= $t3 ?></span> ชิ้น</td>
              </tr>
              <tr>
                <td> ขวดแก้ว </td>
                <td class="text-center"><span class="text-c1"><?= $t4 ?></span> ชิ้น</td>
              </tr>
              <tr>
                <td> กระป๋องเหล็ก </td>
                <td class="text-center"><span class="text-c1"><?= $t5 ?></span> ชิ้น</td>
              </tr>

              <tr>
                <td class="text-dark font-weight-bold"> 
                  <div class="row">
                    <div class="col">
                     รวม 
                    </div>
                    <div class="col-auto">
                      <span class="text-c1"><?= $res_t ?></span> ชิ้น
                    </div>
                  </div>
                </td>
              </tr>
              
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


<script type="text/javascript">


  value = $('#trash').val();

  function userEdit() {
    $( "#profile" ).toggle();
    $( "#profile2" ).toggle();
  }

  function triggerClick(e) {
    document.querySelector('#profileImage').click();
  }
  function displayImage(e) {
    if (e.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]);
    }
  }

$(document).ready(function(){
    $('#tableHistory').DataTable();
    $('#tableAlluser').DataTable();
    $('#tableRankd').DataTable();
    $('#tableRankt').DataTable();
    

    if(value = $('#trash').val()) {
        $("#modalApprove").modal("show");
    }

    // Tooltip ประเภทขยะ admin
    $(".test1").click(function(e){
      e.preventDefault();
        $("#expe1").show();
        $("#expe2, #expe3, #expe4, #expe5, #expe6").hide();
    });

    $(".test2").click(function(e){
      e.preventDefault();
        $("#expe2").show();
        $("#expe1, #expe3, #expe4, #expe5, #expe6").hide();
    });
    $(".test3").click(function(e){
      e.preventDefault();
        $("#expe3").show();
        $("#expe1, #expe2, #expe4, #expe5, #expe6").hide();
    });
    $(".test4").click(function(e){
      e.preventDefault();
        $("#expe4").show();
        $("#expe1, #expe2, #expe3, #expe5, #expe6").hide();
    });
    $(".test5").click(function(e){
      e.preventDefault();
        $("#expe5").show();
        $("#expe1, #expe2, #expe3, #expe4, #expe6").hide();
    });
    $(".test6").click(function(e){
      e.preventDefault();
        $("#expe6").show();
        $("#expe1, #expe2, #expe3, #expe4, #expe5").hide();
    });

    // ดูด้าต้า
    $('.view_data').click(function(){
        var uid=$(this).attr("id");
        $.ajax({
            url: './php/operation',
            method: 'post',
            data: {id:uid},
            success: function(data){
                $('#tests').html(data);
                $('#modalView').modal('show');
            }
        })
    });

// Export Excel File
  $(document).on('click', '#export', function(e){
    e.preventDefault();

    $.ajax({
      url: './php/export',
      type: 'post',
      data: {Export:1},
      success: function(res){
        console.log(res);
        window.open('./php/export');
        Swal.fire({
          icon: 'success',
          title: 'Export ไฟล์สำเร็จ',
          showConfirmButton: false,
          timer: '1300'
        })
      }
    })

  });

  $('[data-toggle="tooltip"]').tooltip();

  // Button Unapprove
  // $(document).on('click', '#btn-un', function(e){
  //   e.preventDefault();

  //   let unapprove = $(this).attr('name');
  //   let data_id = $('#data_id').val();

  //   Swal.fire({
  //     icon: 'warning',
  //     title: 'ยืนยัน ไม่อนุมัติข้อมูล',
  //     text: '',
  //     showCloseButton: true,
  //     showCancelButton: true,
  //     cancelButtonColor: '#d1011c',
  //     cancelButtonText: 'ยกเลิก',
  //     confirmButtonText: 'ยืนยัน',
  //     confirmButtonColor: '#4e73df'
  //   }).then((result) => {

  //     if(result.isConfirmed) {
  //       $.ajax({
  //         url: './php/admin-upload',
  //         type: 'post',
  //         data: {unapprove:unapprove, data_id:data_id},
  //         success: function(res){
  //           console.log(res);
  //           Swal.fire({
  //             icon: 'success',
  //             title: 'ไม่อนุมัติข้อมูลสำเร็จ',
  //             showConfirmButton: false,
  //             timer: 1500
  //           }).then(()=>{
  //             $(location).attr('href','./admin-approve');
  //           });
  //         }
  //       });
  //     } // End if

  //   });

  // });

}); // End ready Jquery

  // Approve Data 
  function approve(data_id, id, distance, trash) {

    event.preventDefault();

    let approve = "approve";

    Swal.fire({
      title: 'ยืนยันการอนุมัติข้อมูล',
      text: '',
      showCloseButton: true,
      showCancelButton: true,
      cancelButtonColor: '#d1011c',
      cancelButtonText: 'ยกเลิก',
      confirmButtonColor: '#4e73df',
      confirmButtonText: 'ยืนยัน'
    }).then((result) => {
      if(result.isConfirmed) {
        $.ajax({
          url: 'php/admin-upload',
          type: 'post',
          data: {data_id:data_id, id:id, distance:distance, trash:trash, approve:approve},
          success: function(res) {
            console.log(res);
            Swal.fire({
              icon: 'success',
              title: 'ยืนยัน การอนุมัติข้อมูล',
              showConfirmButton: false,
              timer: 1500
            }).then(() => {
                location.reload();
            })
          }
        })
      } // End if
    })
  } // End Function Approve

  // UnApprove Data
  function unApprove(data_id){

    event.preventDefault();
    let unapprove = "unapprove";

    Swal.fire({
      icon: 'warning',
      title: 'ยืนยัน ไม่อนุมัติข้อมูล',
      text: '',
      showCloseButton: true,
      showCancelButton: true,
      cancelButtonColor: '#d1011c',
      cancelButtonText: 'ยกเลิก',
      confirmButtonText: 'ยืนยัน',
      confirmButtonColor: '#4e73df'
    }).then((result) => {
      if(result.isConfirmed) {
        $.ajax({
          url: 'php/admin-upload',
          type: 'post',
          data: {unapprove:unapprove, data_id:data_id},
          success: function(res) {
            console.log(res);
            Swal.fire({
              icon: 'success',
              title: 'ไม่อนุมัติข้อมูลสำเร็จ',
              showConfirmButton: false,
              timer: 1500
            }).then((result) => {
              $(location).attr('href','admin');
              $('#modalApprove').modal("show");
            })
          }
        })
      }
    })
  } // End Function UnApprove

  // $(document).on('click', '#edit2', function(e) {
  //   e.preventDefault();

  //   let edt = "edit_trash";
  //   let t1 = $('#t1').text();
  //   let t2 = $('#t2').text();
  //   let t3 = $('#t3').text();
  //   let t4 = $('#t4').text();
  //   let t5 = $('#t5').text();
  //   let data_id = $(this).data('id');
  //   alert(data_id);
  //   // let test = edit_trash + ' ' + t1 + ' ' +t2 +' '+ t3 + ' '+ t4 + ' ' + t5 
  //   // alert(test);

  //   // $.ajax({
  //   //   url: 'php/admin-upload',
  //   //   type: 'post',
  //   //   data: {edit_trash:edt, t1:t1, t2:t2, t3:t3, t4:t4, t5:t5},
  //   //   success: function(res) {
  //   //     console.log(res);
  //   //   }
  //   // })

  // })



</script>