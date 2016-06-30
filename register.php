<!DOCTYPE html>
<html>
<head>
	<link href='styles/registration-style.css' rel='stylesheet' type='text/css'>
	<title>Register for DeltaBook!</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<br>
<header>Welcome to DeltaBook!</header>
<div class="login">
<div class="form">
	<form enctype="multipart/form-data" action="process_new_user.php" method="POST">
		<input class="field" type="text" name="email" placeholder="email" required /><br>
		<input class="field" type="text" name="username" placeholder="username" onkeyup="check(this.value);" required />
		<span class="tick_image" id="check_img">
			<img src="assets/empty.png">
		</span><br>
		<input class="field" type="password" name="password" placeholder="password" pattern=".{6,}" required /><br>
		<input class="field" type="text" name="mobile_number" placeholder="mobile number" pattern="\d{10}" required><br>
		<input class="field" type="file" name="profile_picture" /><br>
		<div class="g-recaptcha" data-sitekey="6LcqniMTAAAAADMqUjXqC9XdpTjiiTnJfZVq1jxj"></div><br>
		<input class="button" type="submit" name="submit" value="Register "placeholder="register" />
		<span class="new_user">Have an account? <a href="index.php">Login Now!</a></span>
	</form>
	<script type="text/javascript">
		function check(str) {
			if (str.length==0) {
				document.getElementById("check_img").innerHTML="<img src='assets/empty.png'>";
				return;
			}
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("check_img").innerHTML="<img src='assets/"+xmlhttp.responseText+".png' >";
				}
  			}
			xmlhttp.open("POST","verify_username.php",true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("t=" + str);
		}
	</script>
</div>
</div>
</body>
</html>