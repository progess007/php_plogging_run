<?php 
require_once('./connect.php');

if(isset($_POST['edit'])) {
    $time = date_default_timezone_set("Asia/Bangkok");
    $time = date_create();
    $time = date_format($time,"Y-m-d H:i:s");

    $id = $_POST['id'];
    $level = $_POST['level'];

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];

        $image = basename($_FILES['profileImage']['name']);

        // function Random Image
        date_default_timezone_set('Asia/Bangkok');
        $date = date('dmyHi');
        $image_rename = $id."-profile-".$date.$image;

        // Target Image
        $image_target = "./image/profile-image/".$image_rename;

    if ($level == "ผู้ใช้งานทั่วไป") {

        if ($_FILES['profileImage']['name'] == "") {
            $sql = "UPDATE m_member SET m_name=?, m_lastname=?, m_phone=?,
                    modify_date=? WHERE member_id=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'ssssi', $name, $lastname, $phone, $time, $id);
            if(mysqli_stmt_execute($stmt)) {
                echo "<script>
                        alert('บันทึกข้อมูลสำเร็จ'); 
                        window.location.replace('../user'); 
                      </script>";
            }

        }
        else {
          // Function Unlink
          $fetch = mysqli_query($conn, "SELECT * FROM m_member WHERE member_id=$id");
          $fetch = mysqli_fetch_assoc($fetch);

          if($fetch) {
            $img_path = ".".$fetch['m_img'];
            unlink($img_path);

            $sql = "UPDATE m_member SET m_name=?, m_lastname=?, m_phone=?, 
            m_img=? ,modify_date=? WHERE member_id=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'sssssi', $name, $lastname, $phone, $image_target, $time, $id);

              if(mysqli_stmt_execute($stmt)) {

              // Function Upload to folder
              $image_target = "../image/profile-image/".$image_rename;
              move_uploaded_file($_FILES['profileImage']['tmp_name'], $image_target);
            
              echo "<script>
                     alert('บันทึกข้อมูลสำเร็จ'); 
                     window.location.replace('../user'); 
                    </script>";
              }
          }
        }
        
    }

    if ($level == "นักศึกษา") {

      $faculty = $_POST['faculty'];

      if($_FILES['profileImage']['name'] == "") {

      $sql = "UPDATE m_member SET m_name=?, m_lastname=?, m_phone=?,
              faculty_id=?, modify_date=? WHERE member_id=?";
      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, 'sssisi', $name, $lastname, $phone, $faculty, $time, $id);
        if(mysqli_stmt_execute($stmt)) {

          echo "<script>
                 alert('บันทึกข้อมูลสำเร็จ'); 
                 window.location.replace('../student'); 
                </script>";
        }
      }

      else {
        // Function Unlink
        $fetch = mysqli_query($conn, "SELECT * FROM m_member WHERE member_id=$id");
        $fetch = mysqli_fetch_assoc($fetch);

        if($fetch) {
          $img_path = ".".$fetch['m_img'];
          unlink($img_path);

          $sql = "UPDATE m_member SET m_name=?, m_lastname=?, m_phone=?, 
                  m_img=?, faculty_id=?, modify_date=? WHERE member_id=?";
          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, 'ssssisi', $name, $lastname, $phone, $image_target, $faculty, $time, $id);
          
          if(mysqli_stmt_execute($stmt)) {
            $image_target = "../image/profile-image/".$image_rename;
            move_uploaded_file($_FILES['profileImage']['tmp_name'], $image_target);

            echo "<script>
                    alert('บันทึกข้อมูลสำเร็จ'); 
                    window.location.replace('../student');
                  </script>";
          }
        } 
            
      }
        
    }

    if($level == "ผู้ดูแลระบบ") {

      $email = $_POST['email'];

      if ($_FILES['profileImage']['name'] == "") {

        $sql = "UPDATE m_member SET m_email=?, m_name=?, m_lastname=?,
                m_phone=?, modify_date=? WHERE member_id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sssssi', $email, $name, $lastname, $phone, $time, $id);
        if(mysqli_stmt_execute($stmt)) {
          echo "<script>
                 alert('บันทึกข้อมูลสำเร็จ');
                 window.location.replace('../admin');
                </script>";
        }
      }

      else {
        // Function Unlink
        $fetch = mysqli_query($conn, "SELECT * FROM m_member WHERE member_id=$id");
        $fetch = mysqli_fetch_assoc($fetch);

        if($fetch) {
          $img_path = ".".$fetch['m_img'];
          unlink($img_path);

          $sql = "UPDATE m_member SET m_email=?, m_name=?, m_lastname=?,
                  m_phone=?, m_img=?, modify_date=? WHERE member_id=?";
          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, 'ssssssi', $email, $name, $lastname, $phone, $image_target, $time, $id);

          if(mysqli_stmt_execute($stmt)) {
            $image_target = "../image/profile-image/".$image_rename;
            move_uploaded_file($_FILES['profileImage']['tmp_name'], $image_target);

            echo "<script>
                    alert('บันทึกข้อมูลสำเร็จ');
                    window.location.replace('../admin');
                  </script>";
          }
        }
      }  
    }
  mysqli_close($conn);
}

?>