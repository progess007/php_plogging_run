<?php
// Connection 
header('Content-Type: text/html; charset=utf-8');
 
header("Content-Type: application/vnd.ms-excel"); // ประเภทของไฟล์
header('Content-Disposition: attachment; filename="myexcel.xls"'); //กำหนดชื่อไฟล์
header("Content-Type: application/force-download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Transfer-Encoding: binary"); 
// header("Content-Length: ".filesize("myexcel.xls"));   

$conn = mysqli_connect('localhost','root','123456','test_app');

mysqli_set_charset($conn, 'utf8');

    $no = 1;

    $sql = "SELECT * FROM approve_data a
    JOIN m_member m ON m.member_id = a.m_id
    JOIN faculty f ON f.faculty_id = m.faculty_id
    WHERE m.m_level = 2";

$res = mysqli_query($conn, $sql);

echo '<table class="table" bordered="1"';
echo '  <tr>
            <th> No. </th>
            <th> รหัสนักศึกษา </th>
            <th> ชื่อ-สกุล </th>
            <th> คณะ </th>
            <th> ระยะทางวิ่ง(กิโล) </th>
            <th> จำนวนขยะ </th>
            <th> ชั่วโมงกิจกรรม(นาที) </th>
        </tr>
        ';
while($row = $res->fetch_array()){
    $sum_trash = $row['data_trash_t1'] + $row['data_trash_t2'] + $row['data_trash_t3'] + $row['data_trash_t4'] + $row['data_trash_t5'];
    echo '<tr>
                <td>'.$no.'</td>
                <td>'.$row['m_username'].'</td>
                <td>'.$row['m_name'].' '.$row['m_lastname'].'</td>
                <td>'.$row['faculty'].'</td>
                <td>'.$row['data_distance'].'</td>
                <td>'.$sum_trash.'</td>
                <td>'.$sum_trash.'</td>
            </tr>';
    $no++;
}
echo '</table>';



// $no = 1;
// $output = '';

// if(isset($_POST['Export'])) {
    // $sql = "SELECT * FROM approve_data a
    // JOIN m_member m ON m.member_id = a.m_id
    // JOIN faculty f ON f.faculty_id = m.faculty_id
    // WHERE m.m_level = 2";
//     $result = mysqli_query($conn, $sql);

    // if(mysqli_num_rows($result) > 0) {
    //     $output .= '
    //         <table class="table" bordered="1">
    //             <tr>
    //                 <th> No. </th>
    //                 <th> รหัสนักศึกษา </th>
    //                 <th> ชื่อ-สกุล </th>
    //                 <th> คณะ </th>
    //                 <th> ระยะทางวิ่ง </th>
    //                 <th> จำนวนขยะ </th>
    //                 <th> ชั่วโมงกิจกรรม </th>
    //             </tr>
    //     ';
    //     while($row = mysqli_fetch_assoc($result)) {
    //         $sum_trash = $row['data_trash_t1'] + $row['data_trash_t2'] + $row['data_trash_t3'] + $row['data_trash_t4'] + $row['data_trash_t5'];
    //         $output .= '
    //             <tr>
    //                 <td>'.$no.'</td>
    //                 <td>'.$row['m_username'].'</td>
    //                 <td>'.$row['m_name'].' '.$row['m_lastname'].'</td>
    //                 <td>'.$row['faculty'].'</td>
    //                 <td>'.$row['data_distance'].'</td>
    //                 <td>'.$sum_trash.'</td>
    //                 <td>'.$sum_trash.'</td>
    //             </tr>
    //         ';
    //         $no++;
    //     }
//         $output .= '</table>';
//         // header("Content-Type: application/xls");
// 		// header("Content-Disposition: attachment; filename=export.xls"); 
//         // header("Pragma: no-cache");
// 		// header("Expires: 0");
//         echo $output;
//     }

// }


?>


