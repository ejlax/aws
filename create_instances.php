<?php
include_once('connect.php');
  	//$os = $row['os'];
  	//$cpu = $row['cpu'];
  	//$ram = $row['ram'];
  //$price    = $row['buyPrice'];

  $sql = "SELECT DISTINCT awsId FROM instanceTypes";
  $result = mysql_query($sql,$link);
  echo "<tr><th>API Name</th><th>Operating System</th><th>CPU</th><th>RAM</th>";
    echo "<form method=POST action=''>";
  echo "<tr><td style='width: 600px;'>";
     echo "<select name='awsId'>";
   while($row = mysql_fetch_array($result)){
  	$name = $row['awsId'];
	echo "<option value='awsId'>".$name."</option>";
} // End our while loop
  echo "</select>";
  echo "</td>";
  //NEW TABLE COLUMN
  $sql = "SELECT DISTINCT os FROM instanceTypes";
  $result = mysql_query($sql,$link);
  //echo "<th>Operating System</th>";//<th>CPU</th><th>RAM</th>";
  echo "<tr><td style='width: 200px;'>";
     echo "<select name='os'>";
   while($row = mysql_fetch_array($result)){
  	$name = $row['os'];
	echo "<option value='os'>".$name."</option>";
} // End our while loop
  echo "</select>";
  // NEW TABLE COLUMN
    $sql = "SELECT DISTINCT cpu FROM instanceTypes";
  $result = mysql_query($sql,$link);
  //echo "<th>Operating System</th>";//<th>CPU</th><th>RAM</th>";
  echo "<tr><td style='width: 200px;'>";
     echo "<select name='os'>";
   while($row = mysql_fetch_array($result)){
  	$name = $row['cpu'];
	echo "<option value='cpu'>".$name."</option>";
} // End our while loop
  echo "</select>";
  echo "</td></tr>";
echo "</form>";

?>