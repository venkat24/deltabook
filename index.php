<html>
<head>
	<link href='styles/login-style.css' rel='stylesheet' type='text/css'>
	<title>Login to DeltaBook</title>
</head>
<body>
<br>
<header>
	DeltaBook
</header>
<div class="login">
	<div class="form">
	<form id='login' action="login.php" method='post' accept-charset='UTF-8' autocomplete="on">
		<input class="field" type='text' name='username' id='username' placeholder="username" autofocus required><br>
		<input class="field" type='password' name='password' id='password' placeholder="password" required><br>
		<input class="button" type='submit' name='Submit' value='login' class="submit_button">
		<span class="new_user">New User? <a href="register.php">Sign up Now!</a></span>
	</form>
	</div>
</div>
</body>
</html>