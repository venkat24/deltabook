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
	<form>
		<input type="text" onkeyup="search(this.value);">
		<div id="livesearch"></div>
		<div id="returnString"></div>
	</form>
	<div class="center_obj">
	<script type="application/javascript"> //Ajax script
		function search(str) {
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4) {
					document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
				}
  			}
			xmlhttp.open("POST","livesearch.php",true);
			xmlhttp.send("t=" + str);
		}
	</script>
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
			echo "Welcome back $username!<br>";
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
<footer>
	<a href="index.php"> 
	<?php
		if ($successful_login) {
			echo "Sign Out";
		} else {
			echo "Go Back";
		}
	?>
	</a>
</footer>
</body>
</html>