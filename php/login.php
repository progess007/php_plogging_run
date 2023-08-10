<?php 

session_start();
require_once('./connect.php');

if(isset($_POST['lg_submit'])) {
    $id = $_POST['id'];
    $pwd = $_POST['pwd'];

    $stmt = mysqli_prepare($conn, "SELECT * FROM m_member 
        WHERE m_username=? OR m_email=?");

        mysqli_stmt_bind_param($stmt, 'ss', $id, $id );
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($res) == 1) {
            $row = mysqli_fetch_assoc($res);
            if(password_verify($pwd, $row['m_password'])) {
                $_SESSION['level'] = $row['m_level'];

                if($_SESSION['level'] == 3) {
                    $_SESSION['user_id'] = $row['member_id'];
                    echo "3";
                }
                if($_SESSION['level'] == 2) {
                    $_SESSION['std_id'] = $row['member_id'];
                    echo "2";
                }
                if($_SESSION['level'] == 1) {
                    $_SESSION['admin_id'] = $row['member_id'];
                    echo "1";
                }
            }
            else {
                echo "errorU"; 
            }

        }
        else {
            echo "errorN";
        }
    mysqli_close($conn);
}

//ad_login
if (isset($_POST['admin_login'])) {
    $id = $_POST['id'];
    $pwd = $_POST['pwd'];
    $encpwd = password_hash($pwd, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conn, "SELECT * FROM m_member 
                WHERE m_username=? OR m_email=?");
        mysqli_stmt_bind_param($stmt, 'ss', $id, $id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);

        if (password_verify($pwd, $row['m_password'])) {
            $_SESSION['level'] = $row['m_level'];
            
            if($_SESSION['level'] == 1) {
                $_SESSION['admin_id'] = $row['member_id'];
                header('location: ../admin');
            }
        }
        else {
            echo "<script>
                alert('ไม่สามารถเข้าสู่ระบบได้')
                window.location.replace('../index')
                </script>"; 
        }
    } 
    else {
        echo "<script>
                alert('ไม่สามารถเข้าสู่ระบบได้')
                window.location.replace('../admin-login?login-failed')
              </script>"; 
    }
    mysqli_close($conn);
}

// =================================== Logout
if (isset($_POST['logout'])) {
    unset($_SESSION['user_id']);
    unset($_SESSION['std_id']);
    unset($_SESSION['admin_id']);
    session_destroy();
    echo "logout-success";
}

?>
