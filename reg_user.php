<?php
include_once('connect.php');
include_once('salt.php');
if(isset($_POST['user']) and isset($_POST['pwd']) and isset($_POST['gen'])){
	$user=$_POST['user'];
	$pwd=sha1($_POST['pwd'].$pepper);
	$gen=$_POST['gen'];
	//$sql="SELECT "
	$sql="INSERT INTO users(name,pwd,gender,salt) VALUES('$user','$pwd',$gen,'$salt')";
	echo $sql."<br>";
	mysql_query($sql,$link);
	header('location:login.php');
}
?>
<form method='post' action=''>
	Register your Account:
	<br>
	User Name:
	<input type='text' name='user'>
	<br>
	Password:
	<input type='password' name='pwd'>
	<br>
	Email:
	<input type="text" value="email">
	CostCenter:
	<select name="costCenter">
		<option value="69333">Implementation Services</option>
		<option value="69101">Cloud Operations</option> 
		<option value="69501">SIS Operations</option>
		<option value="69555">Quality Assurance</option>
		<option value="69599">Development</option>
	</select>
	<input type='submit' value='Submit'>
</form>