<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>ShortStays | Best rooms near you</title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800|Old+Standard+TT' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<!-- bootstrap -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />

<!-- uniform -->
<link type="text/css" rel="stylesheet" href="assets/uniform/css/uniform.default.min.css" />

<!-- animate.css -->
<link rel="stylesheet" href="assets/wow/animate.css" />


<!-- gallery -->
<link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css">


<!-- favicon -->
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

<link rel="stylesheet" href="assets/style.css">

<style>
  table{
    width: 100%;
    margin-bottom: 20px;
  }
  td{
    padding: 15px;
    border-bottom: 1px solid #ddd;
    font-size: medium;
  }
.dropbtn {
  /* background-color: #bfa145; */
  background-color: whitesmoke;
  color: black;
  margin: 12px;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #5F5021;
}
</style>


</head>

<body id="home">


<!-- header -->
<nav class="navbar  navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="images/logo2.png" alt="holiday crown"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->

    <?php
    if(@$_SESSION['username'])
    {?>
      <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      
        <ul class="nav navbar-nav">        
          <li><a href="index.php">Home </a></li>
          <li><a href="rooms-tariff.php">Rooms</a></li>        
          <li><a href="introduction.php">Introduction</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li>
            <div class="dropdown">
              <button class="dropbtn"><img src="images/favicon.png"  alt="holiday crown" height="30px" width="30px"><?php echo @$_SESSION['username']; ?></button>
                <div class="dropdown-content">
                  <a href="profile.php">Profile</a>
                  <a href="logout.php">LogOut</a>
                </div>
            </div>
          </li>
        </ul>
      </div>
    <?php
    }
    else
    {?>

      <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      
        <ul class="nav navbar-nav">        
          <li><a href="index.php">Home </a></li>
          <li><a href="rooms-tariff.php">Rooms</a></li>        
          <li><a href="introduction.php">Introduction</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="signin.php"> Login</a></li>
          <li><a href="Signup.php">Register</a></li>
        </ul> 
      </div>

    <?php
    }

    ?>

   <!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>
<!-- header -->

