<html>
<head>
	<title>Login</title>
	<link href='styles/profile_styles.css' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="window">
	<div class="center_obj">
	<?php
		require("config.php");
		$username = $_POST["username"];
		$password = $_POST["password"];
		$query = "SELECT username,password,email,mobile_number,image_path FROM users WHERE username='$username';";
		$result = mysqli_query($db,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		$successful_login=true;
		if($count != 1) {
			$successful_login=false;
		} else {
			$real_password = $row["password"];
			if (!password_verify($password,$real_password)) {
				$successful_login=false;
			}
		}
		if($successful_login) {
			echo "Welcome back $username!";
			$email=$row["email"];
			$mobile_number=$row["mobile_number"];
			$image_path=$row["image_path"];
			echo "<img src=http://localhost" . $image_path . ">";
			echo "<br>$email";
			echo "<br>$mobile_number";

		} else {
			echo "Invalid Credentials";
		}
	?>
	</div>
	</div>
</body>
</html>
<html>