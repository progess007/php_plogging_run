<?php 
require_once('./connect.php');

    if(isset($_POST['oldPass'])) {
        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $id = $_POST['id'];

        
        $stmt = mysqli_prepare($conn, "SELECT * FROM m_member WHERE member_id=?");
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($res);

        if(password_verify($oldPass, $row['m_password'])) {
            $encpas = password_hash($newPass, PASSWORD_BCRYPT);
            $stmt = mysqli_prepare($conn, "UPDATE m_member SET m_password = ? WHERE member_id = ?");
            mysqli_stmt_bind_param($stmt, 'si', $encpas, $id);
            mysqli_stmt_execute($stmt);
            echo "success";
        } else echo "error";
    }


?>