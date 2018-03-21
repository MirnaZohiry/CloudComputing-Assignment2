<!DOCTYPE html>
<html>
<head>
	<title>Overview Page</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/view.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="light-grey">

<!-- Top container -->
<div class="w3-bar w3-top black" style="z-index:4">
  <button class="w3-bar-item button w3-hide-large hover-none hover-text-light-grey" onclick="slide_open();"><i class="fa fa-bars"></i> Menu</button>
  <span class="w3-bar-item right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse white animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="https://www.w3schools.com/w3images/avatar2.png" class="margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>
      	<?php require "loginform.php"; ?>
      	<?php
      		session_start();
			$loggenOnUser = $_SESSION['user'];
			echo $loggenOnUser;
		?>	
      	</strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>

  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item button padding blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="todo.php" class="w3-bar-item button padding"><i class="fa fa-list-alt fa-fw"></i>  Lists</a>
    <a href="calendar.php" class="w3-bar-item button padding"><i class="fa fa-calendar fa-fw"></i>  Calendar</a>
    <a href="logout.php" class="w3-bar-item button padding"><i class="fa fa-sign-out fa-fw"></i>  Logout</a>
 </div>

</nav>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding margin-bottom">
    <div class="w3-half">
      <div class="w3-container blue padding-16">
        <div class="left"><i class="fa fa-list-alt xxxlarge"></i></div>
        <div class="w3-clear"></div>
        <h4><a style="color:#ffffff;" href="todo.php">Lists</a></h4>
      </div>
    </div>
    
    <div class="w3-half">
      <div class="w3-container red padding-16">
        <div class="left"><i class="fa fa-calendar xxxlarge"></i></div>
        <div class="w3-clear"></div>
        <h4><a style="color:#ffffff;" href="calendar.php">Calendar</a></h4>
      </div>
    </div>
    
  </div>
  <hr>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Regions</h5>
        <img src="https://www.w3schools.com/w3images/region.jpg" style="width:100%" alt="Google Regional Map">
      </div>
      <div class="w3-twothird">
        <h5>Feeds</h5>
        <table class="table striped white">
          <tr>
            <td><i class="fa fa-user text-blue"></i></td>
            <td>New record, "Ethics Assignment" done.</td>
            <td style="width: 100px;"><i>10 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bell text-red"></i></td>
            <td>"Cloud Computing Midterm" coming up.</td>
            <td style="width: 100px;"><i>15 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-users text-yellow"></i></td>
            <td>"Analytical Research Paper" deadline extended.</td>
            <td style="width: 100px;"><i>17 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-comment text-red"></i></td>
            <td>"HCI Presentation" added.</td>
            <td style="width: 100px;"><i>25 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bookmark text-blue"></i></td>
            <td>Check last week's progress.</td>
            <td style="width: 100px;"><i>28 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-laptop text-red"></i></td>
            <td>Four tasks achieved.</td>
            <td style="width: 100px;"><i>35 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt text-green"></i></td>
            <td>"Computer Networks Quiz 3" passed due.</td>
            <td style="width: 100px;"><i>39 mins</i></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  
 
  <!-- Footer -->
  <footer class="footer">
    <p>© Cloud Computing Assignment 2</p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function slide_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}
</script>


</body>
</html>
