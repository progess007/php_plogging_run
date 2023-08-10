(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

  // Image Rezier
  $.fn.imageUploadResizer = function(options) {
    var settings = $.extend({
        max_width: 1000,
        max_height: 1000,
        quality: 1,
        do_not_resize: [],
    }, options );

    this.filter('input[type="file"]').each(function () {
        this.onchange = function() {
            const that = this; // input node
            const originalFile = this.files[0];

            if (!originalFile || !originalFile.type.startsWith('image')) {
                return;
            }

            // Don't resize if doNotResize is set
            if (settings.do_not_resize.includes('*') || settings.do_not_resize.includes( originalFile.type.split('/')[1])) {
                return;
            }

            var reader = new FileReader();

            reader.onload = function (e) {
                var img = document.createElement('img');
                var canvas = document.createElement('canvas');

                img.src = e.target.result
                img.onload = function () {
                    var ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0);

                    if (img.width < settings.max_width && img.height < settings.max_height) {
                        // Resize not required
                        return;
                    }

                    const ratio = Math.min(settings.max_width / img.width, settings.max_height / img.height);
                    const width = Math.round(img.width * ratio);
                    const height = Math.round(img.height * ratio);

                    canvas.width = width;
                    canvas.height = height;

                    var ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, width, height);

                    canvas.toBlob(function (blob) {
                        var resizedFile = new File([blob], originalFile.name, originalFile);

                        var dataTransfer = new DataTransfer();
                        dataTransfer.items.add(resizedFile);

                        // temporary remove event listener, change and restore
                        var currentOnChange = that.onchange;

                        that.onchange = null;
                        that.files = dataTransfer.files;
                        that.onchange = currentOnChange;

                    }, 'image/jpeg', settings.quality);
                }
            }

            reader.readAsDataURL(originalFile);
        }
    });

    return this;
  };

})(jQuery); // End of use strict


function logout() {
  event.preventDefault();
  let logout = "logout";

  Swal.fire({
    icon: 'warning',
    title: 'ยืนยันการออกจากระบบ',
    showCloseButton: true,
    showCancelButton: true,
    cancelButtonColor: '#d1011c',
    confirmButtonColor: '#4e73df',
    confirmButtonText: 'ยืนยัน',
    cancelButtonText: 'ยกเลิก'
  }).then((result) => {
    if(result.isConfirmed) {
      $.ajax({
        url: './php/login',
        type: 'post',
        data: {logout:logout},
        success: function(res) {
          Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'ออกจากระบบสำเร็จ',
            timer: 1500
          }).then(() => {
            $(location).attr('href', './index')
          })
        }
      })
    }
  })
}

// Pop Image
function popImg(pImg) {
  event.preventDefault();
  
  let path = $(pImg).attr('href');
  Swal.fire({
    imageUrl: path,
    imageHeight: 400,
    imageAlt: 'image',
    confirmButtonColor: '#4e73df'
  }); // End Swal
  // console.log(path);
}

// Login
function login() {
  let check = "login-submit";
  let id = $('#id').val();
  let pwd = $('#pwd').val();

  if(id != "" && pwd != "") {
    event.preventDefault();
    $.ajax({
      url: './php/login',
      type: 'post',
      data: {lg_submit:check, id:id, pwd:pwd},
      success: function(res) {
        console.log(res);
        if(res == 3) {
          Swal.fire({
          icon: 'success',
          title: 'เข้าสู่ระบบสำเร็จ',
          showConfirmButton: false,
          timer: 1500
          }).then((result) => {
            $(location).attr('href','./user')
          })
        }
        else if(res == 2) {
          Swal.fire({
          icon: 'success',
          title: 'เข้าสู่ระบบสำเร็จ',
          showConfirmButton: false,
          timer: 1500
          }).then((result) => {
            $(location).attr('href','./student')
          })
        }
        else if(res == 1) {
          Swal.fire({
          icon: 'success',
          title: 'เข้าสู่ระบบสำเร็จ',
          showConfirmButton: false,
          timer: 1500
          }).then((result) => {
            $(location).attr('href','./admin')
          })
        }

        else {
          if(res == "errorU") {
            Swal.fire({
              icon: 'error',
              title: 'ขื่อผู้ใช้งาน หรือ รหัสผ่านผิดพลาด',
              showConfirmButton: false,
              timer: 2000
            }).then((result) => {
              $('#pwd').val('');
            })
          }
          if(res == "errorN") {
            Swal.fire({
              icon: 'error',
              title: 'ไม่มีชื่อผู้ใช้งานนี้อยู่ในระบบ',
              showConfirmButton: false,
              timer: 2000
            }).then((result) => {
              $('#pwd').val('');
            })
          }
        }

      }
    })
  }
  
}

// Reset Password
function resetPass(mid) {
  event.preventDefault();
  let id = mid;

  Swal.fire({
  title: 'เปลี่ยนรหัสผ่าน',
  html: `<input type="password" id="old_pwd" class="swal2-input" placeholder="Password เก่า">
       <input type="password" id="new_pwd" class="swal2-input" placeholder="Password ใหม่">
       <input type="password" id="new_pwd2" class="swal2-input" placeholder="ยืนยัน Password ใหม่">`,
  confirmButtonText: 'บันทึก',
  focusConfirm: false,
    preConfirm: () => {
      const oldPass = Swal.getPopup().querySelector('#old_pwd').value
      const newPass = Swal.getPopup().querySelector('#new_pwd').value
      const newPass2 = Swal.getPopup().querySelector('#new_pwd2').value
      if (!oldPass || !newPass) {
        Swal.showValidationMessage('กรุณากรอกข้อมูลให้ครบ')
      } else if (newPass != newPass2) {
        Swal.showValidationMessage('Password ใหม่ไม่ตรงกัน')
      }
      return { oldPass: oldPass, newPass: newPass, newPass2 : newPass2}
    }
  }).then((result) => {

      if(result.isConfirmed) {
        $.ajax({
          url: './php/password.php',
          type: 'post',
          data: {oldPass: result.value.oldPass, newPass: result.value.newPass, newPass2 : result.value.newPass2, id:id},
          success: function(res) {
            // console.log(res)
            if(res == "success") {
              Swal.fire({
                icon: 'success',
                title: 'เปลี่ยนรหัสสำเร็จ',
                showConfirmButton: false,
                timer: 1500
              })
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Password เก่าไม่ถูกต้อง',
                showConfirmButton: false,
                timer: 1500
              })
            }
          }
        })

      }
    })
}

