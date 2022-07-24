<?php
    $insert = false; 
    if(isset($_POST['name'])){
    $server = "localhost:3307";
    $username = "root";
    $password = "";
    $dbName = "dbms";
    
   $con = mysqli_connect($server,$username,$password,$dbName);

   if(!$con){
     die("connection to this database failed due to " . mysqli_connect_error());
   }

   //echo "success connecting to db";

   $name = $_POST['name'];
   $location = $_POST['location'];
   $phoneNumber = $_POST['phone'];
   $password1 = $_POST['password'];
   $cpassword = $_POST['confirmpassword'];

   if(isset($_POST['submit'])){
    if($password1 == $cpassword){
   $sql = "INSERT INTO dbms.events(`user_id`,`sup_id`, `pgm_name`, `pgm_loc`, `pgm_ph`, `dt`, `password`) VALUES ('000', '', '$name', '$location', '$phoneNumber', current_timestamp(),'$password1');";
   $work = mysqli_query($con, $sql);
   $insert = true;
   //echo $sql;

   $userid = "SELECT pgm_id FROM `events` ORDER BY dt DESC LIMIT 1";
   $res = mysqli_query($con, $userid);
   $num = mysqli_num_rows($res);




   }



  }


    //if($con->query($sql) == true) {
    //  //echo "Successfully inserted";
//
    //  $insert = true;
    //}
    //else {
    //  echo "ERROR: $sql <br> $con->error";
    //}


    if(isset($_POST['request'])){
      header("Location:event_login.php");
    }
    $con->close();  
}
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
<<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
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

       
<div class="login">
  
       <div class="h-blur">
        <h1 style="color: aliceblue; margin-top: 10px; color: #0080FF;">SIGN UP</h1>
        <div style = "color:green">
        <?php
        if($insert==true){
          echo "<h3>Your Signed Up </h3>";
          while ($row = $res->fetch_assoc()) {
            echo "Your User ID is " . $row['pgm_id']."<br>";
        }
        }
        ?>
</div>
       <form action="event.php" method="post">
          <input type="text" name="name" id="name" placeholder="Enter your name" class="input" style="  margin-left: 150px;
          margin-top: 30px;">
           <input type="text" name="location" id="location" placeholder="Enter your location" class="input" style="  margin-left: 150px;
           margin-top: 30px;">
          <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" class="input" style="  margin-left: 150px;
          margin-top: 30px;">
          <input type="password" name="password" id="password" placeholder="Password" class="input" style="  margin-left: 150px;
          margin-top: 30px;">
          <input type="password" name="confirmpassword" id="cpassword" placeholder="Confirm Password" class="input" style="  margin-left: 150px;
         margin-top: 30px;">

  
<h7>After filling the above information, press Submit to get Your User_id.</h7>
<div class="container" style="display:flex; margin-left:30px; padding:1px 30px">
          <button name = "submit" class="btn-transparent" style="margin-top: 30px; margin-left: 10px;">Submit</button> 
          <button name = "request" class="btn-transparent" style="margin-top: 30px; margin-left: 30px;">Login</button> 
      </div>

      </form>
  </div>

  <div class="video-container"> <video autoplay loop muted style="width:100%">
    <source src="videoplayback.mp4" type="video/mp4">
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





