$(document).ready(function(){

    // Global Class
    let inVal = "is-invalid";
    let isVal = "is-valid";
    let isValf = 'valid-feedback';
    let inValf = 'invalid-feedback';
  
    // Global ID
    let t1 = '#id_t1'; let t2 = '#id_t2'; let t3 = '#id_t3'; let t4 = '#id_t4';
    let t5 = '#id_t5'; let t6 = '#id_t6'; let t7 = '#id_t7';
  
    let s1 = "#stxt1"; let s2 = "#stxt2"; let s3 = "#stxt3"; let s4 = "#stxt4";
    let s5 = "#stxt5"; let s6 = "#stxt6"; let s7 = "#stxt7";
      
      $("#mySelect").change(function () {
        $("#mySelect option:selected").each(function () {
          if($(this).attr("id") == "showOption") {  //นักศุกษา
                    $("#showIfClicked").show();
            if($("#form1").css("left", "-1080px")) {
              $("#form1").css({"display": "none"});
              $("#form2").show();
              $("#form2").css({"left": "0", "transition": ".8s"});
            }
                }
                else { // ผู้ใช้ทั่วไป
            $("#form1").show();
            $("#form1").css({"left": "0", "transition": ".8s"});
  
            $("#form2").hide();
            $("#form2").css("left", "700px");
  
                    $("#showIfClicked").hide();
                }
        });
      }).change();
  
      $('#id_u').on('keyup', function(e){
        let id = $(this).val();
        let uid_check = "id_check";
  
        if(id.length < 6){
          $(this).addClass(inVal).removeClass(isVal);
          $(t1).text("Username น้อยกว่า 6 ตัวอักษร").addClass(inValf).removeClass(isValf);
        }
        else if(!id.match(/^[a-zA-Z0-9]*$/)){
          $(this).addClass(inVal).removeClass(isVal);
          $(t1).text("กรอกได้เฉพาะตัวเลข 0-9 และ ภาษาอังกฤษ a-Z!").addClass(inValf).removeClass(isValf);
        }
        else if(id.match(/^[0-9]{11}$/)){
          $(this).addClass(inVal).removeClass(isVal);
          $(t1).text("ห้ามกรอกตัวเลขทั้งหมดเป็น Username !").addClass(inValf).removeClass(isValf);
        }
        else {
          $(this).addClass(isVal).removeClass(inVal);
          $(t1).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
          $.ajax({
            url: './php/register',
            type: 'post',
            data: {id_check:uid_check, id:id},
            success: function(res) {
              if(id == res) {
                $('#id_u').addClass(inVal).removeClass(isVal);
                $(t1).text("Username นี้ถูกใช้ไปแล้ว").addClass(inValf).removeClass(isValf);
              }
              else {
                $('#id_u').addClass(isVal).removeClass(inVal);
                $(t1).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
              }
             // console.log("response : "+res)
            }
          });
        }
        if (e.keyCode == 8) {
          if(id.length == 0){
            $(this).removeClass(inVal).removeClass(isVal);
            $(t1).text("").removeClass(inValf).removeClass(isVal);
          }
        }
      //  console.log(id)
      });
  
      $('#email_u').on('keyup', function(e){
        let email = $(this).val();
        let email_check = "email_check";
  
        if(!email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)){
          $(this).addClass(inVal).removeClass(isVal);
          $(t2).text("รูปแบบ Email ไม่ถูกต้อง").addClass(inValf).removeClass(isValf);
        }
        else if(email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)){
          $(this).addClass(isVal).removeClass(inVal);
          $(t2).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
          $.ajax({
            url: './php/register',
            type: 'post',
            data: {email_check:email_check, email:email},
            success: function(res) {
              if(email == res) {
                $('#email_u').addClass(inVal).removeClass(isVal);
                $(t2).text("Email นี้ถูกใช้งานไปแล้ว").addClass(inValf).removeClass(isValf);
              }
              else {
                $('#email_u').addClass(isVal).removeClass(inVal);
                $(t2).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
              }
              // console.log("response : "+res);
            }
          })
        }
        else {
          $(this).addClass(isVal).removeClass(inVal);
          $(t2).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
        }
        if (e.keyCode == 8) {
          if(email.length == 0){
            $(this).removeClass(inVal).removeClass(isVal);
            $(t2).text("").removeClass(inValf).removeClass(isVal);
          }
        }
        // console.log(email)
      });
  
      $('#pwd_u').on('keyup', function(e){
        let pwd = $(this).val();
        let pwd_re = $('#pwd_re_u').val();
        let reg1 = /[0-9]/
        let reg2 = /[a-z]/
  
        if(pwd.length <= 9){
          $(this).addClass(inVal).removeClass(isVal);
          $(t3).text("Password น้อยกว่า 9 ตัวอักษร").addClass(inValf).removeClass(isValf);
        } 
        else {
          $(this).addClass(isVal).removeClass(inVal);
          $(t3).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
        }

      });
  
      $('#pwd_re_u').on('keyup', function(e){
        let pwd = $('#pwd_u').val();
        let pwd_re = $(this).val();
  
        if(pwd_re.length <= 9){
          $(this).addClass(inVal).removeClass(isVal);
          $(t4).text("Password น้อยกว่า 9 ตัวอักษร").addClass(inValf).removeClass(isValf);
        }
        else if(pwd != pwd_re) {
          $(this).addClass(inVal).removeClass(isVal);
          $('#pwd_u').addClass(inVal).removeClass(isVal);
          $(t3).text("Password ไม่ตรงกัน").addClass(inValf).removeClass(isValf);
          $(t4).text("Password ไม่ตรงกัน").addClass(inValf).removeClass(isValf);
        }
        else {
          $(this).addClass(isVal).removeClass(inVal);
          $('#pwd_u').addClass(isVal).removeClass(inVal);
          $(t4).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
          $(t3).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
        }
        // console.log(pwd,pwd_re);
      });
  
      // Check Information
      $('#name_u').on('keyup', function(e){
        let name = $(this).val();
  
        if(!name.match(/^[ก-๙]*$/)){
            $(this).addClass(inVal).removeClass(isVal);
            $(t5).text('กรอกได้เฉพาะชื่อ ภาษาไทย').addClass(inValf).removeClass(isValf);
          }
          else if(name.match(/^[ก-๙]*$/)){
            $(this).addClass(isVal).removeClass(inVal);
            $(t5).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
          }
          if(e.keyCode == 8) {
            if(name==null || name == "") {
              $(this).removeClass(isVal).removeClass(inVal);
              $(t5).text("").removeClass(isValf).removeClass(inValf);
            }
          }
        // console.log(name);
      });
  
      $('#lastname_u').on('keyup', function(e){
        let lastname = $('#lastname_u').val();

        if(!lastname.match(/^[ก-๙]*$/)){
          $(this).addClass(inVal).removeClass(isVal);
          $(t6).text('กรอกได้เฉพาะนามสกุล ภาษาไทย').addClass(inValf).removeClass(isValf);
        }
        else if(lastname.match(/^[ก-๙]*$/)){
          $(this).addClass(isVal).removeClass(inVal);
          $(t6).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
        }
        if(e.keyCode == 8) {
          if(lastname==null || lastname == "") {
            $(this).removeClass(isVal).removeClass(inVal);
            $(t6).text("").removeClass(isValf).removeClass(inValf);
          }
        }
        // console.log(lastname);
      });
  
      $('#phone_u').on('keyup', function(e){
        let phone = $(this).val();
  
        if(!phone.match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)){
          $(this).addClass(inVal).removeClass(isVal);
          $('#id_t7').text("กรุณากรอกเบอร์โทร ตามรูปแบบนี้ XXX-XXX-XXXX !").addClass(inValf).removeClass(isValf);
        }
        else {
          $(this).addClass(isVal).removeClass(inVal);
          $(t7).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
        }
        // console.log(phone);
      })
  
    //===================================== Student ==============================
  
      $('#id_s').on('keyup',function(e){
        let id_s = $(this).val();
        let sid_check = "id_check";
  
        if(id_s.match(/^[0-9]{11}$/)) {
          $(this).addClass(isVal).removeClass(inVal);
          $(s1).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
          $.ajax({
            url: './php/register',
            type: 'post',
            data: {id_check:sid_check, id:id_s},
            success: function(res) {
              if(id_s == res) {
                $('#id_s').addClass(inVal).removeClass(isVal);
                $(s1).text("รหัสนักศึกษา นี้ถูกใช้ไปแล้ว").addClass(inValf).removeClass(isValf);
              }
              else {
                $('#id_s').addClass(isVal).removeClass(inVal);
                $(s1).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
              }
            //  console.log("response : "+res)
            }
          });
        }
        else {
          $(this).addClass(inVal).removeClass(isVal);
          $(s1).text("กรุณากรอกรหัสนักศึกษา (62xxxxxxx38)").addClass(inValf).removeClass(isValf);
        }
        if (e.keyCode == 8) {
          if(id_s.length == 0){
            $(this).removeClass(inVal).removeClass(isVal);
            $(s1).text("").removeClass(inValf).removeClass(isVal);
          }
        }
        // console.log(id_s);
      });
  
      $('#email_s').on('keyup', function(e){
        let email_s = $(this).val();
        let email_check = "email_check";
  
        if(!email_s.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)){
          $(this).addClass(inVal).removeClass(isVal);
          $(s2).text("รูปแบบ Email ไม่ถูกต้อง").addClass(inValf).removeClass(isValf);
        }
        else if(email_s.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)){
          $(this).addClass(isVal).removeClass(inVal);
          $(s2).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
          $.ajax({
            url: './php/register',
            type: 'post',
            data: {email_check:email_check, email:email_s},
            success: function(res) {
              if(email_s == res) {
                $('#email_s').addClass(inVal).removeClass(isVal);
                $(s2).text("Email นี้ถูกใช้งานไปแล้ว").addClass(inValf).removeClass(isValf);
              }
              else {
                $('#email_s').addClass(isVal).removeClass(inVal);
                $(s2).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
              }
            //   console.log("response : "+res);
            }
          })
        }
        else {
          $(this).addClass(isVal).removeClass(inVal);
          $(s2).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
        }
        if (e.keyCode == 8) {
          if(email_s.length == 0){
            $(this).removeClass(inVal).removeClass(isVal);
            $(t2).text("").removeClass(inValf).removeClass(isVal);
          }
        }
        // console.log(email_s);
      });
  
      $('#pwd_s').on('keyup', function(e){
        let pwd_s = $(this).val();
        let pwd_re_s = $('#pwd_re_s').val();
  
        if(pwd_s.length <= 9){
          $(this).addClass(inVal);
          $(s3).text("Password น้อยกว่า 9 ตัวอักษร").addClass(inValf).removeClass(isValf);
        }
        else {
          $(this).addClass(isVal).removeClass(inVal);
          $(s3).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
        }
        // console.log(pwd_s,pwd_re_s);
      });
  
      $('#pwd_re_s').on('keyup', function(e){
        let pwd_s = $('#pwd_s').val();
        let pwd_re_s = $(this).val();
        let check = "#pwd_s"
  
        if(pwd_re_s.length <= 9){
          $(this).addClass(inVal).removeClass(isVal);
          $(s4).text("Password น้อยกว่า 9 ตัวอักษร").addClass(inValf).removeClass(isValf);
        }
        else if(pwd_s != pwd_re_s) {
          $(this).addClass(inVal).removeClass(isVal);
          $(check).addClass(inVal).removeClass(isVal);
          $(s3).text("Password ไม่ตรงกัน").addClass(inValf).removeClass(isValf);
          $(s4).text("Password ไม่ตรงกัน").addClass(inValf).removeClass(isValf);
        }
        else {
          $(this).addClass('is-valid').removeClass(inVal);
          $(check).addClass('is-valid').removeClass(inVal);
          $(s4).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
          $(s3).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
        }
        // console.log(pwd_s,pwd_re_s);
      });
  
      // Check Information
      $('#name_s').on('keyup', function(e){
        let name = $(this).val()
  
        if(!name.match(/^[ก-๙]*$/)){
          $(this).addClass(inVal).removeClass(isVal);
          $(s5).text('กรอกได้เฉพาะชื่อ ภาษาไทย').addClass(inValf).removeClass(isValf);
        }
        else if(name.match(/^[ก-๙]*$/)){
          $(this).addClass(isVal).removeClass(inVal);
          $(s5).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
        }
        if(e.keyCode == 8) {
          if(name==null || name == "") {
            $(this).removeClass(isVal).removeClass(inVal);
            $(s5).text("").removeClass(isValf).removeClass(inValf);
          }
        }
        // console.log(name);
      });
  
      $('#lastname_s').on('keyup', function(e){
        let lastname = $(this).val();
  
        if(!lastname.match(/^[ก-๙]*$/)){
          $(this).addClass(inVal).removeClass(isVal);
          $(s6).text('กรอกได้เฉพาะนามสกุล ภาษาไทย').addClass(inValf).removeClass(isValf);
        }
        else if(lastname.match(/^[ก-๙]*$/)){
          $(this).addClass(isVal).removeClass(inVal);
          $(s6).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
        }
        if(e.keyCode == 8) {
          if(lastname==null || lastname == "") {
            $(this).removeClass(isVal).removeClass(inVal);
            $(s6).text("").removeClass(isValf).removeClass(inValf);
          }
        }
        // console.log(lastname);
      });
  
      $('#phone_s').on('keyup', function(e){
        let phone = $(this).val();
  
        if(!phone.match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)){
          $(this).addClass(inVal).removeClass(isVal);
          $(s7).text("กรุณากรอกเบอร์โทร ตามรูปแบบนี้ XXX-XXX-XXXX !").addClass(inValf).removeClass(isValf);
        }
        else {
          $(this).addClass(isVal).removeClass(inVal);
          $(s7).text("ไม่มีข้อผิดพลาด").addClass(isValf).removeClass(inValf);
        }
        // console.log(phone);
      })
  
  });

// Form Submit ================================================================================

  $(document).on('submit', '#form1', function(e){
    e.preventDefault();
    let role = "ผู้ใช้ทั่วไป";
    let id = $('#id_u').val();
    let email = $('#email_u').val();
    let pwd = $('#pwd_u').val();
    let pwd_repeat = $('#pwd_re_u').val();
    let name = $('#name_u').val();
    let lastname = $('#lastname_u').val();
    let phone = $('#phone_u').val();
  
    let test = id+' '+email+' '+pwd+' '+pwd_repeat+' '+name+' '+lastname+' '+phone;
  
    // alert(test);
    $.ajax({
      url: './php/register',
      type: 'post',
      data: {role:role, id:id, email:email, pwd:pwd, pwd_repeat:pwd_repeat, 
             name:name, lastname:lastname, phone:phone},
      success: function(res) {
        if (res == "empty id,email,pwd,pwd_repeat") {
          Swal.fire({icon: 'error',title: 'ยังไม่มีข้อมูล Username, Email, Password'})
        }
        else if(res == "email and id format error") {
          Swal.fire({icon: 'error',title: 'Username และ Email format ไม่ผ่าน'})
        }
        else if(res == "email format error") {
          Swal.fire({icon: 'error',title: 'Email format ไม่ผ่าน'})
        }
        else if(res == "id fotmat error") {
          Swal.fire({icon: 'error',title: 'Username format ไม่ผ่าน'})
        }
        else if(res == "password not matching") {
          Swal.fire({icon: 'error',title: 'รหัสผ่านไม่ตรงกัน'})
        }
        else {
          if(res == "sql error") {
            Swal.fire({icon: 'error',title: 'ฐานข้อมูลผิดพลาด'})
          }
          else {
            if(res == "user and mail used") {
              Swal.fire({icon: 'error',title: 'Username หรือ Email ถูกใช้งานไปแล้ว'})
            }
            else {
              if(res == "sql error2") {
                Swal.fire({icon: 'error',title: 'ฐานข้อมูลผิดพลาด 2'})
              }
              else {
                Swal.fire({
                  icon: 'success',
                  title: 'สมัครสมาชิกสำเร็จ',
                }).then((result) => {
                  if(result.isConfirmed) {
                    $(location).attr('href','./index');
                  }
                  else {
                    $(location).attr('href','./index');
                  }
                })
              }
            }
          }
        }
  
        console.log(res);
      } // res success
    })
  
  });
  
  $(document).on('submit', '#form2', function(e){
    e.preventDefault();
  
    let role = "นักศึกษา";
    let id = $('#id_s').val();
    let email = $('#email_s').val();
    let pwd = $('#pwd_s').val();
    let pwd_repeat = $('#pwd_re_s').val();
    let name = $('#name_s').val();
    let lastname = $('#lastname_s').val();
    let phone = $('#phone_s').val();
    let faculty = $('#faculty_s').val();
  
    let test = id+' '+email+' '+pwd+' '+pwd_repeat+' '+name+' '+lastname+' '+phone+' '+faculty;
    $.ajax({
      url: './php/register',
      type: 'post',
      data: {role_s:role, id:id, email:email, pwd:pwd, pwd_repeat:pwd_repeat, 
             name:name, lastname:lastname, phone:phone, faculty:faculty},
      success: function(res) {
        if (res == "empty id,email,pwd,pwd_repeat") {
          Swal.fire({icon: 'error',title: 'ยังไม่มีข้อมูล Username, Email, Password'})
        }
        else if(res == "email and id format error") {
          Swal.fire({icon: 'error',title: 'Username และ Email format ไม่ผ่าน'})
        }
        else if(res == "email format error") {
          Swal.fire({icon: 'error',title: 'Email format ไม่ผ่าน'})
        }
        else if(res == "id fotmat error") {
          Swal.fire({icon: 'error',title: 'Username format ไม่ผ่าน'})
        }
        else if(res == "password not matching") {
          Swal.fire({icon: 'error',title: 'รหัสผ่านไม่ตรงกัน'})
        }
        else if(res == "faculty empty") {
          Swal.fire({icon: 'error',title: 'ยังไม่ได้เลือกเลือกคณะ'})
        }
        else {
          if(res == "sql error") {
            Swal.fire({icon: 'error',title: 'ฐานข้อมูลผิดพลาด'})
          }
          else {
            if(res == "user and mail used") {
              Swal.fire({icon: 'error',title: 'Username หรือ Email ถูกใช้งานไปแล้ว'})
            }
            else {
              if(res == "sql error2") {
                Swal.fire({icon: 'error',title: 'ฐานข้อมูลผิดพลาด 2'})
              }
              else {
                Swal.fire({
                  icon: 'success',
                  title: 'สมัครสมาชิกสำเร็จ',
                }).then((result) => {
                  if(result.isConfirmed) {
                    $(location).attr('href','./index');
                  }
                  else {
                    $(location).attr('href','./index');
                  }
                })
              }
            }
          }
        }
  
        console.log(res);
      } // res success
    });
    
    // alert(test);
  });