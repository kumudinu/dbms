<?php
 $server = "localhost:3307";
 $username = "root";
 $password = "";
 $dbName = "dbms";
 
$con = mysqli_connect($server,$username,$password,$dbName);

if(!$con){
  die("connection to this database failed due to " . mysqli_connect_error());
}
echo "Successfully Connected <br>";

$sql = "SELECT sup_id, sup_name, sup_ph FROM `supplier` where busy = 0 ORDER BY dt LIMIT 1";
$sql1 = "UPDATE `supplier` SET busy = 1 WHERE busy = 0 ORDER BY dt LIMIT 1";

$result = mysqli_query($con, $sql);
$result1 = mysqli_query($con, $sql1);
 
$num = mysqli_num_rows($result);

$row = mysqli_fetch_assoc($result);
 // We can fetch in a better way using the while loop
  // echo var_dump($row);
 if($row != NULL) {
  echo "ID is". $row['sup_id'] .  ". Your food is delivered by ". $row['sup_name'] ." and phone number is: ". $row['sup_ph'];
  echo "<br>";
 }
 else {
   echo "We will Get Back To You within some time <br>";
 }
?>








