<?php 
require_once 'core/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="src/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="src/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="src/css/util.css">
	<link rel="stylesheet" type="text/css" href="src/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">


				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>

				</div>

								<?php

if (Input::exists()) {
	if (Token::check(Input::get('token'))) {
		
		$validate = new  Validate();
		 $validation = $validate->check($_POST, array(
		 	'username' => array('required' => true),
		 	'password' => array('required' => true)
		 ));

		 if ($validation->passed()) {
		 	$user = new User();

		 	$remember =(Input::get('remember')==='on') ? true : false;
		 	$login = $user->login(Input::get('username'),  Input::get('password'), $remember);

		 		if($login){


				 if ($user->hasPermission('admin')) {

						 			Redirect::to('admin.php');
						 }else{
						 			Redirect::to('staff.php');
						 }



		 			}else{
		 			echo '<div class="alert alert-danger" role="alert">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Error:</span>
					Sorry, login failed </div>';
		 		}

		 }else{
		 	foreach ($validation->errors() as $error) {
		 			echo'<div class="alert alert-danger" role="alert">
						  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						  <span class="sr-only">Error:</span>' .
						  $error . '</div>';
		 		
		 	}
		 }

	}
}
?>

				<form class="login100-form" method="POST">
					<div class="wrap-input100 validate-input m-b-26" >
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username" id="username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" >
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password" id="password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
					 <div>
				       <input type="checkbox"  name="remember" id="remember"> Remember Me 
				 		 </div>
				 		 <a href="#" class="txt1">
								Forgot Password?
							</a>
				 		</div>

					
							<input type="hidden" name="token" value="<?php echo Token::generate();?>">
							
					
					<div class="container-login100-form-btn">
						<input type="submit" value="Log In" class="login100-form-btn">
					</div> 
</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="src/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<!-- <script src="src/animsition/js/animsition.min.js"></script> -->
<!--===============================================================================================-->
	<script src="src/bootstrap/js/popper.js"></script>
	<script src="src/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<!-- <script src="src/select2/select2.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="src/daterangepicker/moment.min.js"></script> -->
	<!-- <script src="src/daterangepicker/daterangepicker.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="src/countdowntime/countdowntime.js"></script> -->
<!--===============================================================================================-->
	<script src="src/js/main.js"></script>

</body>
</html>