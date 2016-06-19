<!DOCTYPE html>
<html>
<head>
	<title>Register for DeltaBook!</title>
	<h1>Welcome to DeltaBook!</h1>
</head>
<body>
	<form enctype="multipart/form-data" action="process_new_user.php" method="POST">
		Email <input type="text" name="email" required /><br>
		Username  <input type="text" name="username" required /><br>
		Password <input type="password" name="password" required /><br>
		Mobile Number <input type="text" name="mobile_number" required><br>
		Upload Image <input type="file" name="profile_picture" /><br>
		<input type="submit" name="submit" value="Register">
	</form>
</body>
</html>