<?php
session_start();
$auth = $_SESSION['salt'];
$pwd = $_SESSION['pwd'];
include_once ('salt.php');
include_once ('connect.php');
if(isset($_SESSION['user']) and isset($_SESSION['loginTime']) and isset($_SESSION['hash'])) {
	$user = $_SESSION['user'];
	$time = $_SESSION['loginTime'];
	$hash = $_SESSION['hash'];
	//echo $hash."<br>";
	//echo $auth."<br>";
	$sql = "SELECT firstName,lastName FROM users WHERE email='$user' AND password='$pwd'";
$result = mysql_query($sql, $link);
$name = mysql_fetch_array($result);
//echo $sql."<br>";
	$hashCalculated = sha1($user.$time.$auth);
	//echo $hashCalculated."<br>";
	if ($hash != $hashCalculated) {
		//header('location:login_form.php');
		echo "check the log files, the user was not authenticated!";
	}else{
		echo "Welcome " . $name[0]."&nbsp".$name[1]. "!<br>";
	}
} 
?>

<a href="logout.php">Log Out</a>
