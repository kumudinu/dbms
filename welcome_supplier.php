<?php
$rest_err = false;
$pgm_err = false;
$old_err = false;
$orph_err = false;
 $server = "localhost:3307";
 $username = "root";
 $password = "";
 $dbName = "dbms";
 
$con = mysqli_connect($server,$username,$password,$dbName);

if(!$con){
  die("connection to this database failed due to " . mysqli_connect_error());
}
//echo "Successfully Connected <br>";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$sup_id = $_POST['name'];

if(isset($_POST['go'])){
$sql = "SELECT * FROM `supplier` WHERE sup_id = '$sup_id'";
$result = mysqli_query($con, $sql);


 
$num = mysqli_num_rows($result);

$row1 = mysqli_fetch_assoc($result);

//echo $num;
}

$sql = "SELECT rest_id, pgm_id, old_id, orph_id FROM orders where sup_id = '$sup_id' AND success = 0 and ((rest_id > 0 ) or (pgm_id > 0))";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$sqlj = "SELECT rest_id, pgm_id, old_id, orph_id FROM orders where sup_id = '$sup_id' AND success = 0 and ((rest_id = 0 and pgm_id = 0))";
$resultj = mysqli_query($con, $sqlj);
$numj = mysqli_num_rows($resultj);
$rowj = mysqli_fetch_assoc($resultj);


if(($numj == 0) && ($num == 0)){
  header("Location:wait_supplier.php");
  
}



  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($row['rest_id'] != 0){
$sql1 = "SELECT rest_name, rest_ph, rest_id, rest_loc FROM `restuarants` WHERE rest_id = (SELECT rest_id FROM orders where sup_id = '$sup_id' AND success = 0)";
$result0 = mysqli_query($con, $sql1);
$num0 = mysqli_num_rows($result0);
$row0 = mysqli_fetch_assoc($result0);
//echo "rest_name is:" . $row0['rest_name'] . "<br>";
}
else {
  $rest_err = true;
}

if($row['pgm_id'] != 0){
$pgm = "SELECT pgm_name, pgm_ph, pgm_id, pgm_loc FROM `events` WHERE pgm_id = (SELECT pgm_id FROM orders where sup_id = '$sup_id' AND success = 0)";
$result1 = mysqli_query($con, $pgm);
$num1 = mysqli_num_rows($result1);
$row1 = mysqli_fetch_assoc($result1);
//echo "pgm_name is:" . $row1['pgm_name'] . "<br>";
}
else{
  $pgm_err = true;
}


if($row['old_id'] != 0){
$old = "SELECT old_name, old_ph, old_id, old_loc FROM `oldage_home` WHERE old_id = (SELECT old_id FROM orders where sup_id = '$sup_id' AND success = 0)";
$result2 = mysqli_query($con, $old);
$num2 = mysqli_num_rows($result2);
$row2 = mysqli_fetch_assoc($result2);
//echo "old_name is: " . $row2['old_name'] . "<br>";
}
elseif($row['old_id'] = 0) {
  $old_err = true;
}


if($row['orph_id'] != 0){
$orph = "SELECT orph_name, orph_ph, orph_id, orph_loc FROM `orphanage` WHERE orph_id = (SELECT orph_id FROM orders where sup_id = '$sup_id' AND success = 0)";
$result3 = mysqli_query($con, $orph);
$num3 = mysqli_num_rows($result3);
$row3= mysqli_fetch_assoc($result3);
//echo "orph_name is:" . $row3['orph_name'] . "<br>";
}
else {
  $orph_err = true;
}

}


    if(($row['rest_id'] > 0) && ($row['orph_id'] > 0)){
      
      echo "<h3>--------------Food Pickup Details:  ---------------------------------------------------------------------------------------------------- Food Delivery Details: ------------------</h3><br>";
      echo "-------------------------------Name: " . $row0['rest_name'] . "-                               ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------" . "Name: " . $row3['orph_name'] . "-------------------------------------------<br>";
      echo "-------------------------------------ID: " . $row0['rest_id'] . "-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------" . "ID: " . $row3['orph_id'] ."----------------------------------------------------<br>";
      echo "----------Location: " . $row0['rest_loc'] . "-----------------------------------------------------------------------------------------------------------------------------------------" . "Location: " . $row3['orph_loc'] . "------------------------------------------------<br>";
      echo "-----------------------Phone Number: " . $row0['rest_ph'] . "----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------" . "Phone Number: " . $row3['orph_ph'] . "---------------------------------<br>";
  }
  
  //elseif($rest_id = true) {
  
  //}
  elseif(($row['pgm_id'] > 0) && ($row['old_id'] > 0)) {
    echo "<h3>--------------Food Pickup Details:  ---------------------------------------------------------------------------------------------------- Food Delivery Details: ------------------</h3><br>";
      echo "-------------------------------Name: " . $row1['pgm_name'] . "-                               ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------" . "Name: " . $row2['old_name'] . "-------------------------------------------<br>";
      echo "-------------------------------------ID: " . $row1['pgm_id'] . "-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------" . "ID: " . $row2['old_id'] ."----------------------------------------------------<br>";
      echo "----------Location: " . $row1['pgm_loc'] . "-----------------------------------------------------------------------------------------------------------------------------------------" . "Location: " . $row2['old_loc'] . "------------------------------------------------<br>";
      echo "-----------------------Phone Number: " . $row1['pgm_ph'] . "----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------" . "Phone Number: " . $row2['old_ph'] . "---------------------------------<br>";
  }
  elseif(($row['pgm_id'] > 0) && ($row['orph_id'] > 0)){
    echo "<h3>--------------Food Pickup Details:  ---------------------------------------------------------------------------------------------------- Food Delivery Details: ------------------</h3><br>";
    echo "-------------------------------Name: " . $row1['pgm_name'] . "-                               ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------" . "Name: " . $row3['orph_name'] . "-------------------------------------------<br>";
    echo "-------------------------------------ID: " . $row1['pgm_id'] . "-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------" . "ID: " . $row3['orph_id'] ."----------------------------------------------------<br>";
    echo "----------Location: " . $row1['pgm_loc'] . "-----------------------------------------------------------------------------------------------------------------------------------------" . "Location: " . $row3['orph_loc'] . "------------------------------------------------<br>";
    echo "-----------------------Phone Number: " . $row1['pgm_ph'] . "----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------" . "Phone Number: " . $row3['orph_ph'] . "---------------------------------<br>";
  }
  elseif(($row['rest_id'] > 0) && ($row['old_id'] > 0)){
    echo "<h3>--------------Food Pickup Details:  ---------------------------------------------------------------------------------------------------- Food Delivery Details: ------------------</h3><br>";
    echo "-------------------------------Name: " . $row0['rest_name'] . "-                               ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------" . "Name: " . $row2['old_name'] . "-------------------------------------------<br>";
    echo "-------------------------------------ID: " . $row0['rest_id'] . "-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------" . "ID: " . $row2['old_id'] ."----------------------------------------------------<br>";
    echo "----------Location: " . $row0['rest_loc'] . "-----------------------------------------------------------------------------------------------------------------------------------------" . "Location: " . $row2['old_loc'] . "------------------------------------------------<br>";
    echo "-----------------------Phone Number: " . $row0['rest_ph'] . "----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------" . "Phone Number: " . $row2['old_ph'] . "---------------------------------<br>";
   

  }
  elseif(($pgm_id = true) && ($rest_id = true)) {
    echo "wait";
  }

  

//$sql = "SELECT rest_id, pgm_id, old_id, orph_id FROM orders where sup_id = '$sup_id' AND success = 0";
//
//$result = mysqli_query($con, $sql);
//$num0 = mysqli_num_rows($result);
//$row = mysqli_fetch_assoc($result);
////echo $num0;
//
//
//if ($num0 == 1){
//  
//
//      $rest_id = $row['rest_id'];
//      $rest = "SELECT rest_name, rest_ph, rest_id, rest_loc FROM `restuarants` WHERE rest_id = //'$rest_id'";
//      $rest1 = mysqli_query($con, $rest);
//      $num1 = mysqli_num_rows($rest1);
//      $rest2 = mysqli_fetch_assoc($rest1);
//      echo $num1;
//    
//     //if($row['pgm_id'] != 0){
//     // $pgm_id = $row['pgm_id'];
//     // $pgm = "SELECT pgm_name, pgm_ph, pgm_id, pgm_loc FROM `events` WHERE pgm_id = '$rest_id'";
//     // $pgm1 = mysqli_query($con, $pgm);
//     // $num2 = mysqli_num_rows($pgm1);
//     // $pgm2 = mysqli_fetch_assoc($pgm1);
//     // //echo $num2;
//     //}
//     //if($row['old_id'] != 0){
//     // $old_id = $row['old_id'];
//     // $old = "SELECT old_name, old_ph, old_id, old_loc FROM `oldage_home` WHERE old_id = '$old_id'";
//     // $old1 = mysqli_query($con, $old);
//     // $old2 = mysqli_fetch_assoc($old1);
//     //}
//     //if($row['orph_id'] != 0){
//     // $orph_id = $row['orph_id'];
//     // $orph = "SELECT orph_name, orph_ph, orph_id, orph_loc FROM `orphanage` WHERE orph_id = ////'$orph_id'";
//     // $orph1 = mysqli_query($con, $orph);
//     // $orph2 = mysqli_fetch_assoc($orph1);
//     //}
//  }
//
//
//
//if(($row1 != NULL) && (isset($_POST['go'])) && ($row != NULL)){
//  $verify = true;
//}


  /*
$id = "SELECT sup_id FROM `supplier` where busy = 0 ORDER BY dt LIMIT 1";
$id2 = mysqli_query($con, $id);
$id3 = mysqli_fetch_assoc($id2);

$name = "SELECT sup_name FROM `supplier` where busy = 0 ORDER BY dt LIMIT 1";
$name2 = mysqli_query($con, $name);
$name3 = mysqli_fetch_assoc($name2);

$ph = "SELECT sup_ph FROM `supplier` where busy = 0 ORDER BY dt LIMIT 1";
$ph2 = mysqli_query($con, $ph);
$ph3 = mysqli_fetch_assoc($ph2);


$sql = "SELECT sup_id, sup_name, sup_ph FROM `supplier` where busy = 0 ORDER BY dt LIMIT 1";
$sql1 = "UPDATE `supplier` SET busy = 1 WHERE busy = 0 ORDER BY dt LIMIT 1";

$result = mysqli_query($con, $sql);
$result1 = mysqli_query($con, $sql1);
 
$num = mysqli_num_rows($result);

$row = mysqli_fetch_assoc($result);
$row_id = $row['sup_id'];
$row_name = $row['sup_name'];
$row_ph = $row['sup_ph'];

 // We can fetch in a better way using the while loop
  // echo var_dump($row);

  $request = "INSERT INTO dbms.orders(`rest_id`, `pgm_id`, `old_id`, `orph_id`, `sup_id`, `sup_name`, `sup_ph`, `dt`) VALUES ('', '', '$old_id', '', '$row_id' , '$row_name', '$row_ph', current_timestamp());";
  $request1 = mysqli_query($con, $request);


 if($row != NULL) {
  echo "Your food will be delivered by our team mate ". $row['sup_name'] .  ". His ID will be". $row['sup_id'] ." and you can contact with him by: ". $row['sup_ph'] . "<br>";
 }
 else {
   echo "We will Get Back To You within some time <br>";
 }
*/
}


$con->close();


?>




























<!DOCTYPE html>

<html lang="en">


<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Meghna One page parallax responsive HTML Template ">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">


	<title>Replenish Hunger, No Poors Longer</title>

<link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
  <!-- Animate.css -->
  <link rel="stylesheet" href="plugins/animate-css/animate.css">
  <!-- Magnific popup css -->
  <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
  <!-- Main Stylesheet -->
	<link rel="stylesheet" href="css/main.css">


</head>

<body>
  <div class="preloader">
		<div class="sk-cube-grid">
			<div class="sk-cube sk-cube1"></div>
			<div class="sk-cube sk-cube2"></div>
			<div class="sk-cube sk-cube3"></div>
			<div class="sk-cube sk-cube4"></div>
			<div class="sk-cube sk-cube5"></div>
			<div class="sk-cube sk-cube6"></div>
			<div class="sk-cube sk-cube7"></div>
			<div class="sk-cube sk-cube8"></div>
			<div class="sk-cube sk-cube9"></div>
		</div>
    </div>
	<!-- End Preloader
        ==================================== -->

       
<div style="color:red">
<form action="welcome_supplier.php" method="post">
          <input type="name" name="name" id="name" placeholder="Enter your ID" style=" margin-left: 620px; padding: 10px 60px;
          margin-top: 30px; color:black; background-color:white">
            
            <button name="go" style="margin-top: 30px; margin-left: 690px;color:black; background-color:white;border: 2px solid black;width: 10%;
  padding: 6px 0px;
  outline: none;
  border: 2px solid rgba(80, 78, 78, 0.548);
  border-radius: 20px;">Submit</button> 
      </form>
</div>

  <div class="video-container" style="height: 100vh;"> <video autoplay loop muted style="width:100%">
    <source src="welcome.mp4" type="video/mp4">
 </video></div>
</div>>

<div class= "container">
  <div>
<?php

?>
  </div>
  <div>
<?php
//if($_SERVER["REQUEST_METHOD"] == "POST"){
//if((isset($_POST['go'])) && ($row != NULL)){
//  if($orph_err = true){
//    echo "<h2>Food Delivery Details:  </h2> <br>";
//    echo "Name: " . $row2['old_name'] ."<br>";
//    echo "id: " . $row2['old_id'] ."<br>";
//    echo "Phone Number: " . $row2['old_ph'] ."<br>"; 
//    echo "Location: " . $row2['old_loc'] ."<br>";
//    }
//    elseif($old_id = true) {
//      echo "<h2>Food Delivery Details:  </h2> <br>";
//  
//    echo "Name: " . $row3['orph_name'] ."<br>";
//    echo "id: " . $row3['orph_id'] ."<br>";
//    echo "Phone Number: " . $row3['orph_ph'] ."<br>"; 
//    echo "Location: " . $row3['orph_loc'] ."<br>";
//    }
//    elseif(($old_id = true) && ($orph_id = true)) {
//      echo "No orders Yet";
//    }
//  }
//}
?>
  </div>
</div>










<script src="index.js"></script>
<!-- Main jQuery -->
<script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.1 -->
<script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slick Carousel -->
<script type="text/javascript" src="plugins/slick-carousel/slick/slick.min.js"></script>
<!-- Portfolio Filtering -->
<script type="text/javascript" src="plugins/filterzr/jquery.filterizr.min.js"></script>
<!-- Smooth Scroll -->
<script type="text/javascript" src="plugins/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
<!-- Magnific popup -->
<script type="text/javascript" src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<!-- Google Map API -->
<script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<!-- Sticky Nav -->
<script type="text/javascript" src="plugins/Sticky/jquery.sticky.js"></script>
<!-- Number Counter Script -->
<script type="text/javascript" src="plugins/count-to/jquery.countTo.js"></script>
<!-- wow.min Script -->
<script type="text/javascript" src="plugins/wow/dist/wow.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="js/script.js"></script>

    </body>
</html>
