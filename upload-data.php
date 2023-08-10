<?php 

require_once('./php/connect.php');

$time = date_default_timezone_set("Asia/Bangkok");
$time = date_create();
$time = date_format($time,"Y-m-d H:i:s");

$id = $_POST['system_id'];
$level = $_POST['system_level'];

$distance = $_POST['system_distance'];
$trash_t1 = $_POST['trash_t1'];
$trash_t2 = $_POST['trash_t2'];
$trash_t3 = $_POST['trash_t3'];
$trash_t4 = $_POST['trash_t4'];
$trash_t5 = $_POST['trash_t5'];

$img_distance = basename($_FILES['img_distance']['name']);
$img_trash = basename($_FILES['img_trash']['name']);

    // function Random Image
    // $dran = rand(0, 100000); $tran = rand(0, 100000);
    date_default_timezone_set('Asia/Bangkok');
    $date = date('dmyHi');
    $d_rename = $id."_distance_".$date.$img_distance;
    $t_rename = $id."_trash_".$date.$img_trash;

    // Path img into folder distance
    $u_target_d = "./image/distance/".$d_rename;
    // Path img into folder trash
    $u_target_t = "./image/trash/".$t_rename;

// ===================== Upload file

if(empty($img_distance) and empty($img_trash)) {
    echo "กรุณาอัปโหลดภาพระยะทาง และ ภาพเซลฟี่เก็บขยะ";
    } else if(empty($img_distance)) {
        echo "กรุณาอัปโหลดภาพระยะทาง";
    } else if (empty($img_trash)) {
        echo "กรุณาอัปโหลดภาพเซลฟี่เก็บขยะ";
    } else if (empty($distance)) {
        echo "กรุณากรอก ระยะทางการวิ่ง (กิโลเมตร)";
    } else if (empty($trash_t1) and empty($trash_t2) and empty($trash_t3) and empty($trash_t4) and empty($trash_t5)) {
        echo "กรุณาเลือกประเภทขยะ และกรอกข้อมูล";
    } else {
        if ($level == "ผู้ใช้งานทั่วไป") {
            $sql = "INSERT INTO approve_data (data_distance_img, data_trash_img, data_distance, 
                    data_trash_t1, data_trash_t2, data_trash_t3, data_trash_t4, 
                    data_trash_t5, data_create_date, status_id, m_id)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 3, ?)";
            $stmt = mysqli_prepare($conn , $sql);
            mysqli_stmt_bind_param($stmt, "ssdiiiiisi", $u_target_d, $u_target_t, 
            $distance, $trash_t1, $trash_t2, $trash_t3, $trash_t4, $trash_t5, $time, $id);

            if(mysqli_stmt_execute($stmt)) {
                // Function Upload to folder
                move_uploaded_file($_FILES['img_distance']['tmp_name'], $u_target_d);
                move_uploaded_file($_FILES['img_trash']['tmp_name'], $u_target_t);

                echo "บันทึกข้อมูลสำเร็จ";
            }
        }
        if ($level == "นักศึกษา") {
            $sql = "INSERT INTO approve_data (data_distance_img, data_trash_img, data_distance, 
                    data_trash_t1, data_trash_t2, data_trash_t3, data_trash_t4, 
                    data_trash_t5, data_create_date, status_id, m_id)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 3, ?)";
            $stmt = mysqli_prepare($conn , $sql);
            mysqli_stmt_bind_param($stmt, "ssdiiiiisi", $u_target_d, $u_target_t, 
            $distance, $trash_t1, $trash_t2, $trash_t3, $trash_t4, $trash_t5, $time,$id);
    
            if(mysqli_stmt_execute($stmt)) {
                // Function Upload to folder
                move_uploaded_file($_FILES['img_distance']['tmp_name'], $u_target_d);
                move_uploaded_file($_FILES['img_trash']['tmp_name'], $u_target_t);
    
                echo "บันทึกข้อมูลสำเร็จ";
            }
            
        }
    mysqli_close($conn);
}

// echo "$id $level $distance $trash_t1 $trash_t2 $trash_t3 $trash_t4 $trash_t5 $img_distance $img_trash $time";

// if(isset($_POST['upload'])) {
//     // SettimeZone
//     $time = date_default_timezone_set("Asia/Bangkok");
//     $time = date_create();
//     $time = date_format($time,"Y-m-d H:i:s");

//     // Post data from user-system
//     $id = $_POST['system_id'];
//     $level = $_POST['system_level'];

//     // รูปภาพ
//     $img_distance = basename($_FILES['img_distance']['name']);
//     $img_trash = basename($_FILES['img_trash']['name']);
//     // ค่าตัวเลข
//     $distance = $_POST['system_distance'];
//     $trash_t1 = $_POST['trash_t1'];
//     $trash_t2 = $_POST['trash_t2'];
//     $trash_t3 = $_POST['trash_t3'];
//     $trash_t4 = $_POST['trash_t4'];
//     $trash_t5 = $_POST['trash_t5'];

    // function Random Image
    // $dran = rand(0, 100000); $tran = rand(0, 100000);
    date_default_timezone_set('Asia/Bangkok');
    $date = date('dmyHi');
    $d_rename = $id."_distance_".$date.$img_distance;
    $t_rename = $id."_trash_".$date.$img_trash;

//     // Path img into folder distance
//     $u_target_d = "./image/distance/".$d_rename;
//     // Path img into folder trash
//     $u_target_t = "./image/trash/".$t_rename;

//     if ($level == "ผู้ใช้งานทั่วไป") {
//         if (empty($img_distance) or empty($img_trash)) {
//             echo "<script>alert('กรุณาอัพรูปภาพให้ครบถ้วน (2 รูป)')
//                   window.location.replace('./user-system')
//                   </script>"; 
//         }
//         else if (empty($distance) or empty($trash_t1) and empty($trash_t2) and empty($trash_t3) and empty($trash_t4) and empty($trash_t5)) {
//             echo "<script>alert('ยังไม่มีข้อมูลระยะทาง และ จำนวนขยะ')
//                   window.location.replace('./user-system')
//                   </script>"; 
//         }
//         else {
//             $sql = "INSERT INTO approve_data (data_distance_img, data_trash_img, data_distance, 
//                     data_trash_t1, data_trash_t2, data_trash_t3, data_trash_t4, 
//                     data_trash_t5, data_create_date, status_id, m_id)
//                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 3, ?)";
//             $stmt = mysqli_prepare($conn , $sql);
//             mysqli_stmt_bind_param($stmt, "ssdiiiiisi", $u_target_d, $u_target_t, 
//             $distance, $trash_t1, $trash_t2, $trash_t3, $trash_t4, $trash_t5, $time, $id);
    
//             if(mysqli_stmt_execute($stmt)) {
//                 // Function Upload to folder
//                 move_uploaded_file($_FILES['img_distance']['tmp_name'], $u_target_d);
//                 move_uploaded_file($_FILES['img_trash']['tmp_name'], $u_target_t);
    
//                 echo "<script>alert('บันทึกข้อมูลสำเร็จ')
//                   window.location.replace('./user-history')
//                   </script>"; 
//             }
//         }
//     }

//     // level = 2
//     if ($level == "นักศึกษา") {
//         if (empty($img_distance) or empty($img_trash)) {
//             echo "<script>alert('กรุณาอัพรูปภาพให้ครบถ้วน (2 รูป)')
//                   window.location.replace('./student')
//                   </script>"; 
//         }
//         else if (empty($distance) or empty($trash_t1) and empty($trash_t2) and empty($trash_t3) and empty($trash_t4) and empty($trash_t5)) {
//             echo "<script>alert('ยังไม่มีข้อมูลระยะทาง และ จำนวนขยะ')
//                   window.location.replace('./student')
//                   </script>"; 
//         }
//         else {
//             $sql = "INSERT INTO approve_data (data_distance_img, data_trash_img, data_distance, 
//                     data_trash_t1, data_trash_t2, data_trash_t3, data_trash_t4, 
//                     data_trash_t5, data_create_date, status_id, m_id)
//                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 3, ?)";
//             $stmt = mysqli_prepare($conn , $sql);
//             mysqli_stmt_bind_param($stmt, "ssdiiiiisi", $u_target_d, $u_target_t, 
//             $distance, $trash_t1, $trash_t2, $trash_t3, $trash_t4, $trash_t5, $time,$id);
    
//             if(mysqli_stmt_execute($stmt)) {
//                 // Function Upload to folder
//                 move_uploaded_file($_FILES['img_distance']['tmp_name'], $u_target_d);
//                 move_uploaded_file($_FILES['img_trash']['tmp_name'], $u_target_t);
    
//                 echo "<script>alert('บันทึกข้อมูลสำเร็จ')
//                   window.location.replace('./student')
//                   </script>"; 
//             }
//         }
//     }
//     mysqli_close($conn);
// }
?>

