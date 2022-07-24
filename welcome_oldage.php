<?php
error_reporting(E_ERROR | E_PARSE);
 $server = "localhost:3307";
 $username = "root";
 $password = "";
 $dbName = "dbms";
 
$con = mysqli_connect($server,$username,$password,$dbName);

if(!$con){
  die("connection to this database failed due to " . mysqli_connect_error());
}
//echo "Successfully Connected <br>";

$old_id = $_POST['name'];

$sql = "SELECT sup_id, sup_name, sup_ph FROM `supplier` where busy = 0 ORDER BY dt LIMIT 1";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);


$row_id = $row['sup_id'];
$row_name = $row['sup_name'];
$row_ph = $row['sup_ph'];


$sql = "SELECT * FROM `oldage_home` WHERE old_id = '$old_id'";
$result = mysqli_query($con, $sql);


 
$num = mysqli_num_rows($result);

$row1 = mysqli_fetch_assoc($result);


 // We can fetch in a better way using the while loop
  // echo var_dump($row);
 if(($row != NULL) && (isset($_POST['go'])) && ($row1 != NULL)) {
  $request = "INSERT INTO `orders`(`rest_id`, `pgm_id`, `old_id`, `orph_id`, `sup_id`, `sup_name`, `sup_ph`, `dt`) VALUES ('', '', '$old_id', '', '$row_id' , '$row_name', '$row_ph', current_timestamp());";
  $request1 = mysqli_query($con, $request);
  $pop = "UPDATE `oldage_home` SET request = 1 WHERE old_id = '$old_id'";
  $pop1 = mysqli_query($con, $pop);
     //header("Location:food_oldage.php");
}
  
if(($row1 != NULL) && (isset($_POST['go']))) {
  header("Location:food_oldage.php");
}


if(($row1 != NULL) && (isset($_POST['yes']))) {
  $var = "UPDATE `orders` SET success = 1 WHERE order_id = (SELECT order_id FROM orders ORDER BY dt DESC LIMIT 1) ";
  $var1 = mysqli_query($con,$var);
  $var = "UPDATE `orders` SET success = 1 WHERE order_id = (SELECT order_id FROM orders ORDER BY dt DESC LIMIT 1) ";
  $var1 = mysqli_query($con,$var);
  header("Location:thanks.php");
}
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
<form action="welcome_oldage.php" method="post">
          <input type="name" name="name" id="name" placeholder="Enter your ID" style="   margin-left: 620px; padding: 10px 60px;
          margin-top: 30px; color:black; background-color:white">
            <div style = "display:flex; margin-top: 30px;">
            <button name="go"  style="margin-top: 30px; margin-left: 600px;color:black; background-color:white;border: 2px solid black;width: 10%;
  padding: 6px 0px;
  outline: none;
  border: 2px solid rgba(80, 78, 78, 0.548);
  border-radius: 20px;


  font-size: 18px;">Submit</button> 
            <button name="yes"  style="margin-top: 30px; margin-left: 40px;color:black; background-color:white;border: 2px solid black;width: 10%;
  padding: 6px 0px;
  outline: none;
  border: 2px solid rgba(80, 78, 78, 0.548);
  border-radius: 20px;
  font-size: 18px;">Recieved Food</button> 
  </div>
      </form>
</div>

  <div class="video-container" style="height: 100vh;"> <video autoplay loop muted style="width:100%">
    <source src="welcome.mp4" type="video/mp4">
 </video></div>
</div>>










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
