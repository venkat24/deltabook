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
		<input class="field" type="text" name="username" placeholder="username" required /><br>
		<input class="field" type="password" name="password" placeholder="password" pattern=".{6,}" required /><br>
		<input class="field" type="text" name="mobile_number" placeholder="mobile number" pattern="\d{10}" required><br>
		<input class="field" type="file" name="profile_picture" /><br>
		<div class="g-recaptcha" data-sitekey="6LcqniMTAAAAADMqUjXqC9XdpTjiiTnJfZVq1jxj"></div>
		<input class="button" type="submit" name="submit" value="Register"placeholder="register" />
		<span class="new_user">Have an account? <a href="index.php">Login Now!</a></span>
	</form>
</div>
</div>
</body>
</html>