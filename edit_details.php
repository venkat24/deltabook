<html>
<head>
	<title>Login</title>
	<link href='styles/registration-style.css' rel='stylesheet' type='text/css'>
</head>
<body>
<header>
	DeltaBook
</header>
<div class="login">
	<div class="form">
	<?php
		require("config.php");
		$username = $_POST["username"];
		$query = "SELECT username,email,mobile_number,image_path FROM users WHERE username='$username';";
		$result = mysqli_query($db,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		echo "<h2>$username</h2><br>";
		$email=$row["email"];
		$mobile_number=$row["mobile_number"];
	?>
	<h3> Edit your information: </h3>
	<form method="post" action="update_info.php">
		<input type="hidden" name="username" value="<?php echo $username;?>" **/>**
		<input type="hidden" name="curr_email" value="<?php echo $email;?>" />
		<input type="hidden" name="curr_mobile_number" value="<?php echo $mobile_number;?>" />
		<input class="field" type="text" name="email" placeholder="email" required value="<?php echo $email?>" /><br>
		<input class="field" type="text" name="mobile_number" placeholder="mobile number" pattern="\d{10}" required value="<?php echo $mobile_number?>"><br>
		<input class="button" type="submit" name="submit" value="Update Information" />
	</form>
	</div>
</div>
<script>
</script>
<footer>
	<a href="#" onclick="goBack()">
			Go Back
	</a>
</footer>
</body>
</html>