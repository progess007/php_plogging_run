<?php 
    require './user-profile.php';
    require './user-his.php';
    require './user-rank.php';
    require './user-sys.php';
?>

<script>

$(document).ready(function(){
  $('#tableHistory').DataTable();
  $('#tableRankd').DataTable();



  // File Input เอาปุ่ม Upload ออก และ Resize Image
  $("#input-b1").fileinput({
      'showUpload':false,
      'previewFileType':'any'
  }).imageUploadResizer({
      quality: 0.8, // Defaults 1
      do_not_resize: ['gif', 'svg'], // Defaults []
  });

  $("#input-b2").fileinput({
      'showUpload':false,
      'previewFileType':'any'
  }).imageUploadResizer({
      quality: 0.8, // Defaults 1
      do_not_resize: ['gif', 'svg'], // Defaults []
  });

  //
  $(document).on('submit', '#form_std', function(e){
    e.preventDefault();

    var formData = new FormData(this); 

    $.ajax({
        url: './upload-data.php',
        type: 'POST',
        data: formData,
        // cache: false,
        processData: false,
        contentType: false,
        success: function(res)
        {
          console.log(res);
          alert(res);
          if (res = "บันทึกข้อมูลสำเร็จ") {
            $(location).attr('href','./user');
          }
        }
    });
  });

});

  // Profile Image เอาภาพ show
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

function func() {

  var chb = document.getElementsByClassName('chb');
                 
  if(chb[0].checked) { 
    $('#v1').removeAttr('readonly'); $('#v1').removeAttr('placeholder');
  }
  else {
    document.getElementById('v1').setAttribute('readonly', true);
    document.getElementById('v1').setAttribute('placeholder', 'ระบุจำนวนขยะ');
    document.getElementById('v1').value = ''; 
  }

  if(chb[1].checked) {
    $('#v2').removeAttr('readonly'); $('#v2').removeAttr('placeholder');
  }
  else {
    document.getElementById('v2').setAttribute('readonly', true);
    document.getElementById('v2').setAttribute('placeholder', 'ระบุจำนวนขยะ');
    document.getElementById('v2').value = ''; 
  }

  if(chb[2].checked) { 
    $('#v3').removeAttr('readonly'); $('#v3').removeAttr('placeholder');
  }
  else {
    document.getElementById('v3').setAttribute('readonly', true);
    document.getElementById('v3').setAttribute('placeholder', 'ระบุจำนวนขยะ');
    document.getElementById('v3').value = ''; 
  }

  if(chb[3].checked) { 
    $('#v4').removeAttr('readonly'); $('#v4').removeAttr('placeholder');
  }
  else {
    document.getElementById('v4').setAttribute('readonly', true);
    document.getElementById('v4').setAttribute('placeholder', 'ระบุจำนวนขยะ');
    document.getElementById('v4').value = ''; 
  }

  if(chb[4].checked) {
    $('#v5').removeAttr('readonly'); $('#v5').removeAttr('placeholder');
  }
  else {
    document.getElementById('v5').setAttribute('readonly', true);
    document.getElementById('v5').setAttribute('placeholder', 'ระบุจำนวนขยะ');
    document.getElementById('v5').value = ''; 
  }
}

// function Delete
function delUn(data_id) {
  
  event.preventDefault();
  let delS = "delete";

  Swal.fire({
    title: 'ยืนยันการลบข้อมูล',
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
        url: './php/operation',
        type: 'post',
        data: {data_id:data_id, delU:delS},
        success: function(res) {
          console.log(res);
          Swal.fire({
            icon: 'success',
            title: 'ลบข้อมูลสำเร็จ',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            $(location).attr('href','user');
          })
        }
      })
    }  // End if
  })
}

</script>

