<?php 

require_once('./connect.php');

function val($data) {
    $data = htmlspecialchars(stripslashes(trim($data)));
    return $data;
}

if (isset($_POST['register'])) {

// role check permission
$role = val($_POST['role']);

// data insert to database
$id = val($_POST['id']);
$email = val($_POST['email']);
$pwd = $_POST['pwd'];
$pwd_repeat = $_POST['pwd_repeat'];
$tg_path = "./image/profile-image/df-user.png";
$name = val($_POST['name']);
$lastname = val($_POST['lastname']);
$phone = val($_POST['phone']);

if ($role == "ผู้ใช้ทั่วไป") {

    if (empty($id) || empty($email) || empty($pwd) || empty($pwd_repeat)) {
        header("Location: ../register?error=emptyfields&id=".$id."&mail=".$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $id)) {
        header("Location: ../register?error=invalididmailid");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register?error=invalidmail&id=".$id);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $id)) {
        header("Location: ../register?error=invalidid&mail=".$email);
        exit();
    }
    else if ($pwd !== $pwd_repeat) {
        header("Location: ../register?error=passwordcheck&id=".$id."&mail=".$email);
        exit();
    }
    else {
        $sql = "SELECT m_username, m_email FROM m_member WHERE m_username=? OR m_email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $id, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../register?error=usertaken&mail=".$email);
                exit();
            }
            else {
                $sql = "INSERT INTO m_member(m_username, m_email, m_password, m_name, m_lastname,
                        m_phone, m_img, m_verify, create_date, modify_date, m_level)
                        VALUES (?, ?, ?, ?, ?, ?, ?, 1, NOW(), NOW(), 3)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../register?error=sqlerror");
                    exit();
                }
                else {
                    $encpwd = password_hash($pwd, PASSWORD_BCRYPT);

                    mysqli_stmt_bind_param($stmt, 'sssssss', $id , $email, $encpwd, $name, $lastname, 
                                            $phone, $tg_path);
                    mysqli_stmt_execute($stmt);
                    echo "<script>
                            alert('บันทึกข้อมูลสำเร็จ'); 
                            window.location.replace('../thankyou?success=user'); 
                          </script>";
                    // header("Location: ../index?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    /* if($sql) {
            $to = $email;
            $subject = "Email Vertification";
            $message = "<a href='http://localhost/aoject/verify?token=$activationcode'>
                        Register Account</a>"; 
            $headers = "From: progess007@hotmail.com \r\n";
            $headers .= "MIME-Version: 1.0"."\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

            mail($to, $subject, $message, $headers);

            header('location: ../thankyou');
        } */
    
}

if ($role == "นักศึกษา") {
    $id = val($_POST['id_s']);
    
    $faculty = $_POST['faculty'];

        if (empty($id) || empty($email) || empty($pwd) || empty($pwd_repeat)) {
            header("Location: ../register?error=emptyfields&id=".$id."&mail=".$email);
            exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $id)) {
            header("Location: ../register?error=invalididmailid");
            exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../register?error=invalidmail&id=".$id);
            exit();
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $id)) {
            header("Location: ../register?error=invalidid&mail=".$email);
            exit();
        }
        else if ($pwd !== $pwd_repeat) {
            header("Location: ../register?error=passwordcheck&id=".$id."&mail=".$email);
            exit();
        }
        else if ($faculty == "") {
            header("Location: ../register?error=emptyfaculty");
            exit();
        }
        else {
            $sql = "SELECT m_username, m_email FROM m_member WHERE m_username=? OR m_email=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../register?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "ss", $id, $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    header("Location: ../register?error=usertaken&mail=".$email);
                    exit();
                }
                else {
                    $sql = "INSERT INTO m_member(m_username, m_email, m_password, m_name, m_lastname,
                            m_phone, m_img, faculty_id, m_verify, create_date, modify_date, m_level)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1, NOW(), NOW(), 2)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../register?error=sqlerror");
                        exit();
                    }
                    else {
                        $encpas = password_hash($pwd, PASSWORD_BCRYPT);
    
                        mysqli_stmt_bind_param($stmt, 'ssssssss', $id , $email, $encpas, 
                                               $name, $lastname, $phone, $tg_path, $faculty);
                        mysqli_stmt_execute($stmt);
                        echo "<script>
                                alert('บันทึกข้อมูลสำเร็จ'); 
                                window.location.replace('../thankyou?success=student'); 
                              </script>";
                        // header('location: ../thankyou');
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

}

?>

