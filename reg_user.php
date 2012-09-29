<?php
include_once('connect.php');
include_once('salt.php');
if(isset($_POST['user']) and isset($_POST['pwd']) and isset($_POST['gen'])){
	$user=$_POST['user'];
	$pwd=sha1($_POST['pwd'].$pepper);
	$gen=$_POST['gen'];
	$sql="INSERT INTO users(name,pwd,gender,salt) VALUES('$user','$pwd',$gen,'$salt')";
	echo $sql."<br>";
	mysql_query($sql,$link);
	header('location:login.php');
}
?>
<form method='post' action=''>
User Name: <input type='text' name='user'><br>
Password: <input type='password' name='pwd'><br>
Gender:<br>
Male <input type='radio' name='gen' value='0'> 
Female<input type='radio' name='gen' value='1'><br>
<input type='submit' value='Submit'>
</form>