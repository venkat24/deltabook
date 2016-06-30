<?php
	require("config.php");
	$q=$_POST["t"];
	$query = "SELECT username FROM users WHERE username='$q';";
	$result = mysqli_query($db,$query);
	$count = mysqli_num_rows($result);
	if ($count == 0) {
		echo "tick";
	} else {
		echo "x";
	}


?>