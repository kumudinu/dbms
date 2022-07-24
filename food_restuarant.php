
<?php
$confirm = false;
$corr = false;
 $server = "localhost:3307";
 $username = "root";
 $password = "";
 $dbName = "dbms";
 
$con = mysqli_connect($server,$username,$password,$dbName);

if(!$con){
  die("connection to this database failed due to " . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST["id"];

$var = "UPDATE restuarants set available = 1 where rest_id = '$name'";
$r = mysqli_query($con, $var);

$test = "SELECT * FROM `restuarants` WHERE rest_id = '$name'";
$test1 = mysqli_query($con, $test);
$test2 = mysqli_num_rows($test1);

if($test2 == 0){
  echo "<h4>---------------------------------------------------------------------------------------------------------------------Invalid User ID-----------------------------------------------------------------------------------------------------------------<h4>";
}

    $sql1 = "SELECT order_id FROM orders WHERE rest_id = 0 AND pgm_id = 0 ORDER BY dt DESC";
    $result1 = mysqli_query($con, $sql1);
    $num1 = mysqli_num_rows($result1);
    $data = mysqli_fetch_assoc($result1);

$sql3 = "SELECT sup_id, sup_name, sup_ph FROM orders WHERE rest_id = 0 AND pgm_id = 0 ORDER BY dt DESC LIMIT 1";
$result3 = mysqli_query($con, $sql3);

$num3 = mysqli_num_rows($result3);
$row3 = mysqli_fetch_assoc($result3);


   if($data != NULL) {
      $sql2 = "UPDATE orders SET rest_id = '$name'";
      $result2 = mysqli_query($con, $sql2);
  
      $sql2 = "UPDATE `restuarants` SET available = 1 WHERE rest_id = '$name'";
      $result2 = mysqli_query($con, $sql2);
    }   

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
<form action="food_restuarant.php" method="post">
          <input type="id" name="id" id="id" placeholder="Enter your User ID" class="input" style="  margin-left: 620px; padding: 10px 60px;
          margin-top: 30px; color:black; background-color:white">
            
            <button name = "submit" id = "submit" class="btn-transparent" style="margin-top: 30px; margin-left: 690px;color:black; background-color:white;border: 2px solid black;width: 10%;
  padding: 6px 0px;
  outline: none;
  border: 2px solid rgba(80, 78, 78, 0.548);
  border-radius: 20px;


  font-size: 18px;">ADD</button> 
      </form>
</div>
       <div class="container" style = "text-align:center; color: #40D3DC; font-size:30px;color: #375b5c; MARGIN-TOP: 50px;}">
<?php
if((isset($_POST['submit'])) && (($test2 == 1))){
      if($row3!=NULL){
        echo "Food will be Recieved by our team mate: " . $row3['sup_name'] ."<br>";
        echo "Reciever's ID: " . $row3['sup_id'] . "<br>";
        echo "Contact Number: " . $row3['sup_ph'];
      }
      else {
        echo "Kindly wait untill the request is raised";
      }
    }
?>



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
