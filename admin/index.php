<?php session_start();include('func.php');
//Form handeler
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["Login"]))
{
$DEFAULTPASS="GetRegData";
$pass=$_POST["password"];
if($pass===$DEFAULTPASS)
{
  $_SESSION["admin"]=1;
}
}
?>

<html>
<head>
  <link href="http://impulse2k17.in/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://impulse2k17.in/css/framework.css.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../css/modern-business.css" rel="stylesheet">

</head>
<body>
  <div class="container">
<!-- Heading -->
    <div class="row">
      <div class="col-lg-2"></div>
    <div class="col-lg-8 text-center">
      <h2>View Registration</h2>
    </div>
    <div class="col-lg-2">
      <?php
      if(isset($_SESSION["admin"]))
      {
      ?>
      <a href="logout.php">Logout</a>
      <?php
      }
      ?>
    </div>
  </div>
<!-- Body -->
  <div class="row">
    <?php if(!isset($_SESSION["admin"]))
    getloginform();
    else {
      getdata();
      ?>
      <p>Export all Details to an Excel File <a href="http://admin.impulse2k17.in/download.php">Click Here</a></p>
      <?php
    }
    ?>

  </div>
</div>
</body>
</html>
