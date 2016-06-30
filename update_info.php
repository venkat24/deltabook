<!DOCTYPE html>
<html>
<head>
	<title>Update Complete!</title>
	<link rel="stylesheet" type="text/css" href="styles/profile_styles.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class="window">
	<div class="center_obj">
	<?php
		require("config.php"); //MySQL Config File
		//Handle Credentials and Hash PW
		$username = $_POST["username"];
		$email = $_POST["email"];
		$mobile_number = $_POST["mobile_number"];
		
		//Verify if Email Exists and validate
		if($_POST["curr_email"]!=$_POST["email"]) {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  			echo "Email is invalid"; 
			} else {
				$email_query = "SELECT id FROM users WHERE email = '$email';";
				$email_result = mysqli_query($db,$email_query);
				$email_count = mysqli_num_rows($email_result);
				if($email_count == 1) {
					echo "There is an existing account under the same email address. <br>";
					die();
				}
			}
		}
		//Verify if Mobile number exists
		if ($_POST["mobile_number"]!=$_POST["curr_mobile_number"]) {
			$mobile_number_query = "SELECT id FROM users WHERE mobile_number = '$mobile_number';";
			$mobile_number_result = mysqli_query($db,$mobile_number_query);
			$mobile_number_count = mysqli_num_rows($mobile_number_result);
			if($mobile_number_count == 1) {
				echo "Mobile number already registered <br>";
				die();
			}
		}
		//DATABASE INSERTION
		$query = "UPDATE users SET mobile_number='$mobile_number',email='$email' WHERE username='$username';";
		$result = mysqli_query($db,$query);
		if ($result) {
			echo "<h2>Updation Successful!</h2>";
			echo "<a href='index.php'>Login</a>";
		} else {
			echo "Updation Failed";
			die();
		}
	?>
</body>
</html>