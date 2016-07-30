<?php
	$body = json_decode(file_get_contents('php://input'));
	echo $body->temp;
?>
