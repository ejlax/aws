<?php
include_once('connect.php');
  // For the purpose of saving space on my post I'm going to limit the amount of results to 4, see "LIMIT 4" below.
  $sql = "SELECT * FROM instanceTypes";
  $result = mysql_query($sql,$link);
  // Now let's start building our table, I'll go line by line just like HTML so it's easier to read.  
  // I don't think we need every one of the details about each model so I'm going to just include what 
  // I think my customer needs to know on a product overview page.  This will just list the name, description, 
  // quantity in stock, scale, and price of each item.  We need to put the table opening tag and first row 
  // outside of the while loop first otherwise every time we process a row we'll get a new table and tr.
  echo "<table>";
  echo "<tr><th>API Name</th><th>Operating System</th><th>CPU</th><th>RAM</th>";
  while($row = mysql_fetch_array($result)){
  // Before we close out of PHP, lets define all of our variables so they are easier to remember and work with,
  // you can skip this though if you just want to directly reference each row.
 
  $name = $row['awsId'];
  $os = $row['os'];
  $cpu = $row['cpu'];
  $ram = $row['ram'];
  //$price    = $row['buyPrice'];
 
// Now for each looped row
 
echo "<tr><td style='width: 200px;'>".$name."</td><td>".$os."</td><td style='width: 200px;'>".$cpu."</td><td>".$ram."</td></tr>";
 
} // End our while loop
echo "</table>";

?>