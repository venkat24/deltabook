<?php
	require("config.php");
	$entry = $_POST['t'];
	if (empty($entry)) {
		die();
	}
	$query = "SELECT username,image_path FROM users WHERE username like '%$entry%';";
	$result = mysqli_query($db,$query);
	$counter=0;
	while($row = mysqli_fetch_array($result)) {
		if ($counter > 4) {
			break;
		}
		$uname = $row["username"];
		$uimage = $row["image_path"];
		echo "<img src='$uimage' style='width:40px;height;40px'>"; 
		echo "<a href='#' onclick=\"profiler('$uname');return false;\">$uname</a><br>";
		$counter++;
	}
?>
