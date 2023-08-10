<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin-Login</title>
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
				<form action="./php/login" method="POST" class="login100-form validate-form" >
					<span class="login100-form-title p-b-26">
						Welcome to UGC
					</span>
					<span class="login100-form-title p-b-48">
						Admin
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid Username is: ">
						<input class="input100" type="text" name="id">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pwd">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="admin_login">
								Login
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="./js/jquery.min.js"></script>
	<!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
<!--===============================================================================================-->
	<script src="./js/admin-login.js"></script>

</body>
</html>