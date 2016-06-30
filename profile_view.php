<html>
<head>
	<title>Login</title>
	<link href='styles/profile_styles.css' rel='stylesheet' type='text/css'>
</head>
<body>
<header>
	DeltaBook
</header>
	<div class="window">
	<div class="center_obj">
	<?php
		require("config.php");
		$username = $_POST["username"];
		$query = "SELECT username,email,mobile_number,image_path FROM users WHERE username='$username';";
		$result = mysqli_query($db,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		echo "<h2>$username's Profile</h2><br>";
		$email=$row["email"];
		$mobile_number=$row["mobile_number"];
		$image_path=$row["image_path"];
		echo "<img src=http://localhost" . $image_path . ">";
		echo "<br>$email";
		echo "<br>$mobile_number<br>";
	?>
	</div>
	</div>

<script>
function goBack() {
    window.history.back();
}
</script>
<footer>
	<a href="#" onclick="goBack()">
			Go Back
	</a>
</footer>
</body>
</html>