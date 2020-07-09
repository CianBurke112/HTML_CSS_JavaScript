<?php
	$servername="localhost";
	$username="u180257";
	$password="CS230LAB3";
	$dbname="phpmyadmin";

	$conn = mysqli_connect($servername,$username,$password,$dbname);

	if(!$conn) {
		die("Connection failed: ".mysqli_connect_error());
	}
	
	$username=$_GET['username'];
	$password=$_GET['password'];
	$type = $_GET['type'];
	$score= $_GET['v1'];
	
	$sql = "INSERT INTO hiragana (username,password,quiz_v,quiz_k,quiz_s,quiz_t,quiz_n,quiz_h,quiz_m,quiz_r,quiz_yw) VALUES ('".$username."','".$password."','0','0','0','0','0','0','0','0','0');";

	if(!mysqli_query($conn,$sql)) {
		echo("Error: ".$sql."<br>".mysqli_error($conn));
	}
	
	$newGrade = "UPDATE hiragana SET quiz_".$type."=".$score." WHERE username='".$username."'";
	
	if(!mysqli_query($conn,$newGrade)) {
		echo("Error: ".$sql."<br>".mysqli_error($conn));
	}
	
	$res = $conn->query($sql);

	mysqli_close($conn);
?>