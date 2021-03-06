<!DOCTYPE html>
<html>
<head>
	<title>Registration Complete!</title>
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
		$password = $_POST["password"];
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$captcha = $_POST["g-recaptcha-response"];

    	//VALIDATION
    	//Verify Captcha (ONLY WORKS ON LOCALHOST FOR NOW. NO API KEY)
		if (empty($captcha)) {	
			//echo "<h2>Please tick the Captcha!</h2><br>";
			//echo "<a href='register.php'>Go back</a>";
			//die();
			//Captcha Validation off FOR TESTING
		}
		//Verify if Username Exists
		$username_query = "SELECT * FROM users WHERE username = '$username';";
		$username_result = mysqli_query($db,$username_query);
		$username_count = mysqli_num_rows($username_result);
		if($username_count == 1) {
			echo "Username already taken! <br>";
			die();
		}

		//Verify if Email Exists and validate
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			echo "Email is invalid"; 
		} else {
			$email_query = "SELECT * FROM users WHERE email = '$email';";
			$email_result = mysqli_query($db,$email_query);
			$email_count = mysqli_num_rows($email_result);
			if($email_count == 1) {
				echo "There is an existing account under the same email address. <br>";
				die();
			}
		}

		//Verify if Mobile number exists
		$mobile_number_query = "SELECT * FROM users WHERE mobile_number = '$mobile_number';";
		$mobile_number_result = mysqli_query($db,$mobile_number_query);
		$mobile_number_count = mysqli_num_rows($mobile_number_result);
		if($mobile_number_count == 1) {
			echo "Mobile number already registered <br>";
			die();
		}

		//Handle Profile Picture Upload
		$image_dir = "/srv/http/images/";
		$image_name = rand_string_gen(8);
		$good_image = true;
		$image_type = pathinfo($_FILES["profile_picture"]["name"], PATHINFO_EXTENSION);
		$target_file = $image_dir . $image_name . "." . $image_type;
		$storage_name = "/images" . "/" . $image_name . "." . $image_type;
		if($image_type != "jpg" && $image_type != "png" && $image_type != "jpeg" && $image_type != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$good_image = false;
		}
		if (!$good_image) {
			echo "<h1>Registration Failed. Please Check Image</h1>";
		} else {
			if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
				//echo "Image uploaded successfully!<br>";
			} else {
				echo "File upload error.";
				die();
			}
		}
		function rand_string_gen ($n) { //Generate Random filename to avoid conflicts
	        $output_string = '';
	        $ascii = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	        for ($i = 0; $i < $n; $i++) {
	            $output_string .= $ascii[rand(0, strlen($ascii) - 1)];
	        }
	        return $output_string;
    	}    	

		//DATABASE INSERTION
		if ($good_image) {
			$query = "INSERT INTO users (username,password,email,mobile_number,image_path) VALUES('$username','$hash','$email','$mobile_number','$storage_name');";
			$result = mysqli_query($db,$query);
			if ($result) {
				echo "Resigtrations Successful! <br>Welcome to DeltaBook.<br>";
				echo "<a href='index.php'>login</a>";
			} else {
				echo "Registrations Failed";
				die();
			}
		}
	?>
</body>
</html>