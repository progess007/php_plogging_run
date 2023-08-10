<?php 

require './php/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin-Register</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="./icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="./font-awesome-4.7.0/css/font-awesome.min.css"  >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./fonts/iconic-font.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./css/admin-util.css">
	<link rel="stylesheet" type="text/css" href="./css/admin-main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter ">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="login100-form validate-form" >
					<span class="login100-form-title p-b-26">
					</span>
					<span class="login100-form-title p-b-48">
						Admin Register
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid Username is: ">
						<input class="input100" type="text" name="id">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid Email is: ">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pwd">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pwd_repeat">
						<span class="focus-input100" data-placeholder="*Password-Repeat"></span>
					</div>

					<span class="login100-form-title text-s p-b-26">
						ข้อมูลส่วนตัว Admin
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid name">
						<input class="input100" type="text" name="name">
						<span class="focus-input100" data-placeholder="ชื่อจริง"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid lastname">
						<input class="input100" type="text" name="lastname">
						<span class="focus-input100" data-placeholder="นามสกุล"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid Phone">
						<input class="input100" type="text" name="phone">
						<span class="focus-input100" data-placeholder="Phone 0xx-xxx-xxxx"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="ad_register">
								Submit
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	
	<?php 

function val($data) {
    $data = htmlspecialchars(stripslashes(trim($data)));
    return $data;
}

if(isset($_POST['ad_register'])) {
    $id = val($_POST['id']);
    $email = val($_POST['email']);
	$pwd = val($_POST['pwd']);
	$pwd_repeat = val($_POST['pwd_repeat']);
    $tg_path = "./image/profile-image/df-user.png";
    $name = val($_POST['name']);
    $lastname = val($_POST['lastname']);
	$phone = val($_POST['phone']);
	
	if(empty($id) || empty($email) || empty($pwd) || empty($name) || empty($lastname) || empty($phone)) {
		echo "<script>
					alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');
					window.location.replace('./security147896325?security=admin');
				</script>";
		exit();
	}
	else if($pwd !== $pwd_repeat) {
		echo "<script>
					alert('Password ไม่ตรงกัน');
					window.location.replace('./security147896325?security=admin');
				</script>";
		exit();
	}
	else {
		$sql = "SELECT m_username FROM m_member WHERE m_username=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<script>
						alert('Sql Error ยังสมัครไม่สำเร็จ');
						window.location.replace('./security147896325?security=admin');
					</script>";
            exit();
		}
		else {
            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
                echo "<script>
						alert('มี Username นี้อยู่ในระบบแล้ว');
						window.location.replace('./security147896325?security=admin');
					</script>";
                exit();
			}
			else {
				$sql = "INSERT INTO m_member(m_username, m_email, m_password, m_name, m_lastname,
					m_phone, m_img, m_verify, create_date, modify_date, m_level)
					VALUES (?, ?, ?, ?, ?, ?, ?, 1, NOW(), NOW(), 1)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "<script>
						alert('Sql Error ยังสมัครไม่สำเร็จ');
						window.location.replace('./security147896325?security=admin');
					</script>";
                    exit();
				}
				else {
					$encpas = password_hash($pwd, PASSWORD_BCRYPT);

					mysqli_stmt_bind_param($stmt, 'sssssss', $id , $email, $encpas, $name, 
								$lastname, $phone, $tg_path);
					mysqli_stmt_execute($stmt);
					echo "<script>
							alert('บันทึกข้อมูลสำเร็จ');
							window.location.replace('./index?success=admin');
					  	  </script>";
					exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="./js/jquery.min.js"></script>
	<!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
<!--===============================================================================================-->
	<script src="./js/admin-login.js"></script>

</body>
</html>