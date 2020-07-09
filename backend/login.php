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
	
	$sql = "SELECT password FROM hiragana WHERE username='".$username."'";
	
	if($dbpass = mysqli_query($conn,$sql)) {
		$obj=mysqli_fetch_object($dbpass);
	}
	
	$responsepword = $obj->password;
	
	if($password==$responsepword) {
		$newGrade = "UPDATE hiragana SET quiz_".$type."=".$score." WHERE username='".$username."'";
		
		if(!mysqli_query($conn,$newGrade)) {
			echo("Error: ".$sql."<br>".mysqli_error($conn));
		}
	}
	else {
		echo "Incorrect username or password!";
	}

	$res = $conn->query($sql);

	mysqli_close($conn);
?>