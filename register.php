<!DOCTYPE html>
<html>
<head>
	<link href='styles/registration-style.css' rel='stylesheet' type='text/css'>
	<title>Register for DeltaBook!</title>
</head>
<body>
<br>
<header>Welcome to DeltaBook!</header>
<div class="login">
<div class="form">
	<form enctype="multipart/form-data" action="process_new_user.php" method="POST">
		<input type="text" name="email" placeholder="email" required /><br>
		<input type="text" name="username" placeholder="username" required /><br>
		<input type="password" name="password" placeholder="password" required /><br>
		<input type="text" name="mobile_number" placeholder="mobile number" required><br>
		<input type="file" name="profile_picture" size=20  /><br>
		<input type="submit" name="submit" value="Register"placeholder="register" >
		<span class="new_user">Have an account? <a href="index.php">Login Now!</a></span>
	</form>
</div>
</div>
</body>
</html>