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
	
	$sql = "SELECT password FROM hiragana WHERE username='".$username."'";
	
	if($dbpass = mysqli_query($conn,$sql)) {
		$obj=mysqli_fetch_object($dbpass);
	}
	
	$responsepword = $obj->password;
	
	echo("Grades for user ".$username.":");
	
	if($password==$responsepword) {
		$vg="SELECT quiz_v FROM hiragana WHERE username ='".$username."'";
		
		if(!$vg=mysqli_query($conn,$vg)) {
			echo("Error: ".$sql."<br>".mysqli_error($conn));
		}
		else {
			$v = mysqli_fetch_object($vg);
			echo("<br>Vowels quiz: ".$v->quiz_v."0%");
		}
		
		$kg="SELECT quiz_k FROM hiragana WHERE username ='".$username."'";
		
		if(!$kg=mysqli_query($conn,$kg)) {
			echo("Error: ".$sql."<br>".mysqli_error($conn));
		}
		else {
			$k = mysqli_fetch_object($kg);
			echo("<br>Ks quiz: ".$k->quiz_k."0%");
		}
		
		$sg="SELECT quiz_s FROM hiragana WHERE username ='".$username."'";
		
		if(!$sg=mysqli_query($conn,$sg)) {
			echo("Error: ".$sql."<br>".mysqli_error($conn));
		}
		else {
			$s = mysqli_fetch_object($sg);
			echo("<br>Ss quiz: ".$s->quiz_s."0%");
		}
		
		$tg="SELECT quiz_t FROM hiragana WHERE username ='".$username."'";
		
		if(!$tg=mysqli_query($conn,$tg)) {
			echo("Error: ".$sql."<br>".mysqli_error($conn));
		}
		else {
			$t = mysqli_fetch_object($tg);
			echo("<br>Ts quiz: ".$t->quiz_t."0%");
		}
		
		$ng="SELECT quiz_n FROM hiragana WHERE username ='".$username."'";
		
		if(!$ng=mysqli_query($conn,$ng)) {
			echo("Error: ".$sql."<br>".mysqli_error($conn));
		}
		else {
			$n = mysqli_fetch_object($ng);
			echo("<br>Ns quiz: ".$n->quiz_n."0%");
		}
		
		$hg="SELECT quiz_h FROM hiragana WHERE username ='".$username."'";
		
		if(!$hg=mysqli_query($conn,$hg)) {
			echo("Error: ".$sql."<br>".mysqli_error($conn));
		}
		else {
			$h = mysqli_fetch_object($hg);
			echo("<br>Hs quiz: ".$h->quiz_h."0%");
		}
		
		$mg="SELECT quiz_m FROM hiragana WHERE username ='".$username."'";
		
		if(!$mg=mysqli_query($conn,$mg)) {
			echo("Error: ".$sql."<br>".mysqli_error($conn));
		}
		else {
			$m = mysqli_fetch_object($mg);
			echo("<br>Ms quiz: ".$m->quiz_m."0%");
		}
		
		$rg="SELECT quiz_r FROM hiragana WHERE username ='".$username."'";
		
		if(!$rg=mysqli_query($conn,$rg)) {
			echo("Error: ".$sql."<br>".mysqli_error($conn));
		}
		else {
			$r = mysqli_fetch_object($rg);
			echo("<br>Rs quiz: ".$r->quiz_r."0%");
		}
		
		$ywg="SELECT quiz_yw FROM hiragana WHERE username ='".$username."'";
		
		if(!$ywg=mysqli_query($conn,$ywg)) {
			echo("Error: ".$sql."<br>".mysqli_error($conn));
		}
		else {
			$yw = mysqli_fetch_object($ywg);
			echo("<br>Ys/Ws quiz: ".$yw->quiz_yw."0%<br>");
		}
	}

	$res = $conn->query($sql);

	mysqli_close($conn);
?>