<!DOCTYPE html>
<html>
<head>
	<link href='styles/login-style.css' rel='stylesheet' type='text/css'>
	<title>Login to DeltaBook</title>
</head>
<body>
<br>
<header>
	Welcome to DeltaBook!	
</header>
<div class="login">
	<div class="form">
	<form id='login' action="login.php" method='post' accept-charset='UTF-8'>
		<input type='text' name='username' id='username' placeholder="username"><br>
		<input type='password' name='password' id='password' placeholder="password"><br>
		<input type='submit' name='Submit' value='login' class="submit_button">
		<span class="new_user">New User? <a href="register.php">Sign up Now!</a></span>
	</form>
	</div>
</div>
</body>
</html>