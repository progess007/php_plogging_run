<?php 
require_once('./connect.php');

if (isset($_POST['approve'])) {
    $data_id = $_POST['data_id'];
    $m_id = $_POST['id'];
    $distance = $_POST['distance'];
    $trash = $_POST['trash'];

    echo $data_id.' '.$m_id.' '.$distance.' '.$trash;

    $approve = "UPDATE approve_data SET status_id=1, data_approve_date=NOW()
            WHERE data_id=?";
            
    $stmt = mysqli_prepare($conn, $approve);
    mysqli_stmt_bind_param($stmt, 'i', $data_id);
    mysqli_stmt_execute($stmt);
    if ($approve) {
        $query = mysqli_query($conn, "SELECT * FROM ranking_data WHERE m_id=$m_id");

        if (mysqli_num_rows($query) == 0) {

            $insert = mysqli_query($conn, "INSERT INTO ranking_data(r_distance,r_trash,m_id)
                                            VALUES($distance, $trash, $m_id)");
            echo "<script>
                    alert('อนุมัติข้อมูลสำเร็จ');
                    window.location.replace('../admin-approve');
                  </script>";
        }
        else {
            // Update data from approve data
            $fetch_r = mysqli_query($conn, "SELECT * FROM ranking_data WHERE m_id=$m_id");
            $res_r = mysqli_fetch_assoc($fetch_r);
    
            $new_distance = $res_r['r_distance'] + $distance;
            $new_trash = $res_r['r_trash'] + $trash;
    
            if($fetch_r) {
                $update = mysqli_query($conn, "UPDATE ranking_data 
                SET r_distance=$new_distance, r_trash=$new_trash
                WHERE m_id=$m_id");
    
                echo "<script>
                        alert('อนุมัติข้อมูลสำเร็จ');
                        window.location.replace('../admin-approve');
                      </script>";
            }
        }
    }
    mysqli_close($conn);
}

if (isset($_POST['unapprove'])) {
    $data_id = $_POST['data_id'];

    $sql = "UPDATE approve_data SET status_id = 2, data_unapprove_date=NOW() 
            WHERE data_id=?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i' , $data_id);
    mysqli_stmt_execute($stmt);

    header('location: ../admin-approve');
}

?>