<html>
<head>
	<title>Login</title>
	<link href='styles/profile_styles.css' rel='stylesheet' type='text/css'>
</head>
<body>
<header>
	DeltaBook <br><br>
</header>
	<div class="window">
	<div class="center_obj">
	<script type="application/javascript"> //Ajax script
		function search(str) {
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
				}
  			}
			xmlhttp.open("POST","livesearch.php",true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("t=" + str);
		}
		function profiler(username) {
			var form=document.createElement("form");
			form.setAttribute("method", "POST");
    		form.setAttribute("action", "profile_view.php");
    		var hiddenField=document.createElement("input");
    		hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", "username");
            hiddenField.setAttribute("value", username);
            form.appendChild(hiddenField);
            document.body.appendChild(form);
            form.submit();
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
			echo "<h3>Welcome back $username!</h3><br><br>";
			$email=$row["email"];
			$mobile_number=$row["mobile_number"];
			$image_path=$row["image_path"];
			echo "<img src=" . $image_path . ">";
			echo "<br><br>$email";
			echo "<br>$mobile_number<br>";
		} else {
			echo "<h2>Invalid Credentials</h2>";
			echo "<a href='index.php'>Go Back</a>";
			die();
		}
	?>
	<br>
	<form action="edit_details.php" method="POST">
		<input type="hidden" name="username" value="<?php echo $username;?>">
		<input type="submit" name="submit" class="button" value="Edit Details">
	</form>
	<br>
	<h2> Search for Other DeltaBookers!</h2>
	<input class="field" type="text" onkeyup="search(this.value);" placeholder="Enter username">
		<div id="livesearch">
		</div>
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