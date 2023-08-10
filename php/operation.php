<?php 

require_once('./connect.php');


// ลบช้อมูลที่ไม่อนุมัติ (User มีสิทใช้งาน)

if(isset($_POST['delU'])) {
    $data_id = $_POST['data_id'];

    $fetch = mysqli_query($conn, "SELECT * FROM approve_data WHERE data_id=$data_id");
    $fetch = mysqli_fetch_assoc($fetch);
    if ($fetch) {
        $dImg = ".".$fetch['data_distance_img'];
        $tImg = ".".$fetch['data_trash_img'];
        $del = mysqli_query($conn, "DELETE FROM approve_data WHERE data_id=$data_id");
        if($del) {
            unlink($dImg);
            unlink($tImg);
        }
        else {
            echo "<script>
                   alert('ไม่สามารถทำรายการได้')
                   window.location.replace('../user-history')
                  </script>"; 
         }
    }
    else {
       echo "<script>
              alert('ไม่สามารถทำรายการได้')
              window.location.replace('../user-history')
             </script>"; 
    }
}

?>