<?php
include_once ('connect.php');
include_once ('salt.php');
if (isset($_POST['user']) and isset($_POST['pwd'])) {
	$user = $_POST['user'];
	$pwd = sha1($_POST['pwd'] . $pepper);
	$sql = "SELECT COUNT(id) FROM users WHERE name='$user' AND pwd='$pwd'";
	$sql1 = "SELECT salt FROM users WHERE name='$user' AND pwd='$pwd'";
	$result = mysql_query($sql, $link);
	echo $sql . "<br>";
	echo $count . "<br>";
	echo $sql1 . "<br>";
	$result2 = mysql_query($sql1, $link);
	echo $result2;
	list($count) = mysql_fetch_array($result);
	if ($count > 0) {
		//setcookie('user',$user,strtotime('+1 day'));
		setcookie('user', $user);
		$time = time();
		setcookie('loginTime', $time);
		$hash = sha1($user . $time . $result2);
		setcookie('hash', $hash);
		//echo $_COOKIE['user'];
		header('location:secret.php');
	}
}
?>
<form method='post' action=''>
	User Name:
	<input type='text' name='user'>
	<br>
	Password:
	<input type='password' name='pwd'>
	<br>
	<input type='submit' value='Submit'>
</form>