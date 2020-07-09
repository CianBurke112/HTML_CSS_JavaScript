<?php

	$score = $_GET['v1'];

	echo "Test score: ".((intval($score)/10)*100)."%";
	
	$type = $_GET['type'];
	
	
	echo('<br><br>Log in/Register to save results<br>');
	
	echo('<br>Username: <input type="text" id="username" style="backgroundColor: #C0C0C0;"><br>Password: <input type="password" id="password" style="backgroundColor: #C0C0C0;">');
	echo('<br><input type="button" value="Login" onClick="login('.$type.','.$score.');"><input type="button" value="Register" onClick="register('.$type.','.$score.');">');
?>