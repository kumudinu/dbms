
<?php
 $server = "localhost:3307";
 $username = "root";
 $password = "";
 $dbName = "dbms";
 
$con = mysqli_connect($server,$username,$password,$dbName);

if(!$con){
  die("connection to this database failed due to " . mysqli_connect_error());
}
//echo "Successfully Connected <br>";

//$old_id = $_POST['name'];


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
*/


$sql = "SELECT sup_id, sup_name, sup_ph FROM `supplier` where busy = 0 ORDER BY dt LIMIT 1";

$result = mysqli_query($con, $sql);

 
$num = mysqli_num_rows($result);

$row = mysqli_fetch_assoc($result);
//$row_id = $row['sup_id'];
//$row_name = $row['sup_name'];
//$row_ph = $row['sup_ph'];
 
 // We can fetch in a better way using the while loop
  // echo var_dump($row);
//$id = "SELECT old_id FROM `orders` ORDER BY dt DESC LIMIT 1";
//$_id = mysqli_query($con, $id);
//$num1 = mysqli_num_rows($_id);
//$final_id = mysqli_fetch_assoc($_id);

if($row!=NULL){
$sql1 = "UPDATE `supplier` SET busy = 1 WHERE busy = 0 ORDER BY dt LIMIT 1";
$result1 = mysqli_query($con, $sql1);

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

       <div class="container" style = "text-align:center; color: #40D3DC; font-size:30px;color: #375b5c; MARGIN-TOP: 90px;}">
<?php
 if($row != NULL) {
  echo "Your food will be delivered by our team mate: ". $row['sup_name'] . "<br>";
   echo  "Having ID: ". $row['sup_id'] ."<br>"; 
   echo "Contact Number: ". $row['sup_ph'] . "<br>";
 }
 else {
   echo "We will Get Back To You within some time <br>";
 }
?>
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
