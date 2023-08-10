<?php 

require_once('./connect.php');

function val($data) {
    $data = htmlspecialchars(stripslashes(trim($data)));
    return $data;
}

if(isset($_POST['id_check'])) {
    $id = $_POST['id'];

    $sql = "SELECT m_username FROM m_member WHERE m_username=?";
    $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            echo $row['m_username'];
        }
}

if(isset($_POST['email_check'])) {
    $email = $_POST['email'];

    $sql = "SELECT m_email FROM m_member WHERE m_email=?";
    $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            echo $row['m_email'];
        }
}

if(isset($_POST['role']) == "ผู้ใช้ทั่วไป") {
    $id = val($_POST['id']);
    $email = val($_POST['email']);
    $pwd = $_POST['pwd'];
    $pwd_repeat = $_POST['pwd_repeat'];
    $tg_path = "./image/profile-image/df-user.png";
    $name = val($_POST['name']);
    $lastname = val($_POST['lastname']);
    $phone = val($_POST['phone']);

    // echo "$id $email $pwd $pwd_repeat $tg_path $name $lastname $phone";

    if (empty($id) || empty($email) || empty($pwd) || empty($pwd_repeat)) {
        echo "empty id,email,pwd,pwd_repeat";
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $id)) {
        echo "email and id format error";
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "email format error";
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $id)) {
        echo "id fotmat error";
        exit();
    }
    else if ($pwd !== $pwd_repeat) {
        echo "password not matching";
        exit();
    }
    else {
        $sql = "SELECT m_username, m_email FROM m_member WHERE m_username=? OR m_email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "sql error";
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $id, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                echo "user and mail used";
                exit();
            }
            else {
                $sql = "INSERT INTO m_member(m_username, m_email, m_password, m_name, m_lastname,
                        m_phone, m_img, m_verify, create_date, modify_date, m_level)
                        VALUES (?, ?, ?, ?, ?, ?, ?, 1, NOW(), NOW(), 3)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "sql error2";
                    exit();
                }
                else {
                    $encpwd = password_hash($pwd, PASSWORD_BCRYPT);

                    mysqli_stmt_bind_param($stmt, 'sssssss', $id , $email, $encpwd, $name, $lastname, 
                                            $phone, $tg_path);
                    mysqli_stmt_execute($stmt);

                    echo "regis success";
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

if(isset($_POST['role_s']) == "นักศึกษา") {
    $id = val($_POST['id']);
    $email = val($_POST['email']);
    $pwd = $_POST['pwd'];
    $pwd_repeat = $_POST['pwd_repeat'];
    $tg_path = "./image/profile-image/df-user.png";
    $name = val($_POST['name']);
    $lastname = val($_POST['lastname']);
    $phone = val($_POST['phone']);
    $faculty = $_POST['faculty'];

    // echo "$id $email $pwd $pwd_repeat $tg_path $name $lastname $phone $faculty";

    if (empty($id) || empty($email) || empty($pwd) || empty($pwd_repeat)) {
        echo "empty id,email,pwd,pwd_repeat";
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $id)) {
        echo "email and id format error";
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "email format error";
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $id)) {
        echo "id fotmat error";
        exit();
    }
    else if ($pwd !== $pwd_repeat) {
        echo "password not matching";
        exit();
    }
    else if ($faculty == "") {
        echo "faculty empty";
        exit();
    }
    else {
        $sql = "SELECT m_username, m_email FROM m_member WHERE m_username=? OR m_email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "sql error";
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $id, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                echo "user and mail used";
                exit();
            }
            else {
                $sql = "INSERT INTO m_member(m_username, m_email, m_password, m_name, m_lastname,
                        m_phone, m_img, faculty_id, m_verify, create_date, modify_date, m_level)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1, NOW(), NOW(), 2)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "sql error2";
                    exit();
                }
                else {
                    $encpas = password_hash($pwd, PASSWORD_BCRYPT);

                    mysqli_stmt_bind_param($stmt, 'ssssssss', $id , $email, $encpas, 
                                           $name, $lastname, $phone, $tg_path, $faculty);
                    mysqli_stmt_execute($stmt);
                    echo "stdregis success";
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

?>