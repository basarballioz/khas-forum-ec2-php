<?php session_start();?>
<!doctype html>
<html>
<head>
<title>K-Has Discusisson Platform</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="icon" type="image/png" href="img/favicon.png"/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/script.js"></script>

</head>

<body>
<h1 class="siteTitle"> K-Has Discussion Platform </h1>
  <div id="wrapper">
  <div id="menu">
    <div class="topnav" id="myTopnav">
      <a href="index.php" class="active">Discussion Homepage</a>
      <a href="create_topic.php">Create A New Topic</a>
      <a href="create_cat.php">Add A New Category</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
      <div class="topnav-right">
      <?php 
      if(isset($_SESSION['signed_in']))  {
        echo '<a class="topnav-right" href="signout.php">Logout</a></div>';
      }
      else {
        echo '<a class="topnav-right" href="signin.php">Login</a>';
        echo '<a class="topnav-right" href="signup.php">Register</a></div>';
      }?>
  
    </div>
    </div>
  <div id="userbar">
  <br>
    </div>
    

  <div id="content">