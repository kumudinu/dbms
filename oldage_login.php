<?php


  $server = "localhost:3307";
  $username = "root";
  $password = "";
  $dbName = "dbms";
  
 $conn = mysqli_connect($server,$username,$password,$dbName);

 if(!$conn){
   echo "connection to this database failed due to " . mysqli_connect_error();
 }

 if(isset($_POST['name'])){

 $name = $_POST['name'];
 $password1 = $_POST['password'];


 $sql = "SELECT * FROM `oldage_home` WHERE old_name = '$name' AND password = '$password1'";
 $result = mysqli_query($conn, $sql);


  
 $num = mysqli_num_rows($result);
 
 $row = mysqli_fetch_assoc($result);
  // We can fetch in a better way using the while loop
   // echo var_dump($row);
  if(($row != NULL) && (isset($_POST['login']))) {
      header("Location:welcome_oldage.php");
}
elseif(($row == NULL) && (isset($_POST['login']))){
  echo "<h2>----------------------------------------------------------INVALID CREDENTIALS--------------------------------------------------------------------------------</h2>";
}
/*
 if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      session_start();
      $_SESSION["username"] = $row['old_name'];
      $_SESSION["user_id"] = $row['old_id'];
      $_SESSION["user_password"] = $row['password'];

      header("Location: localhost/dbms/welcome.php");
      exit;
    }
 }
/* else {
   echo '<div class="alert alert-danger">Username and Password are not matched</div>';
 }
*/
 $conn->close();

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

        <div style="font-size:20px; color:white; background-color:red; text-align:center">
    <?php
   
    ?>
    </div>
<div class="login">
  
       <div class="h-blur" style="height: 500px;">

       <form action="oldage_login.php" method="post">
          <input type="name" name="name" id="name" placeholder="Enter your Username" class="input" style="  margin-left: 150px;
          margin-top: 110px;">
          <input type="password" name="password" id="password" placeholder="Password" class="input" style="  margin-left: 150px;
          margin-top: 30px;">

  
          <button class="btn-transparent"  name="login" style="margin-top: 30px; margin-left: -10px;" >REQUEST</button> 
      </form>

      <h2>Don't have an account?</h2>
      <a href="oldage_signup.php" style="font-size: 19px ; color:white">Sign Up</a>
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


