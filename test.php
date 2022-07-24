<?php

$server = "localhost:3307";
$username = "root";
$password = "";
$dbName = "dbms";

$con = mysqli_connect($server,$username,$password,$dbName);

if(!$con){
 die("connection to this database failed due to " . mysqli_connect_error());
}

$sql3 = "SELECT sup_id, sup_name, sup_ph FROM orders WHERE rest_id = 0 AND pgm_id = 0 ORDER BY dt DESC LIMIT 1";
$result3 = mysqli_query($con, $sql3);

$num3 = mysqli_num_rows($result3);
$row3 = mysqli_fetch_assoc($result3);

echo $num3;

if($row3!=NULL){
  echo "id:" .$row3['sup_id'] . "<br>" . "Name: " . $row3['sup_name'] . "<br>" . "ph: " .$row3['sup_ph'];
}
?>