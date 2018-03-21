<!DOCTYPE html>
<html>
<head>
	<title>Calendar Page</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css">
    

	<link rel="stylesheet" href="css/view.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

  <script>
  //Display FullCalendar on the screen with buttons
    $(document).ready(function () {
      var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
          left:'prev,next today',
          center:'title',
          right:'month,agendaWeek,agendaDay'
        },
      
        events: 'load.php',
        selectable: true,
        selectHelper: true,

        editable:true,

        //Allows resizing of events to change time
        eventResize:function(event)
        {
          var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");
          var title = event.title;
          var id = event.id;

          $.ajax({
            url:"update.php",
            type:"POST",
            data:{title:title, start:start, end:end, id:id},

            success:function(){
              calendar.fullCalendar('refetchEvents');
              alert('Event Updated');
            }
          })
        },

        //Allows draging and droping changes of the events on the calendar
        eventDrop:function(event)
        {
          var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");
          var title = event.title;
          var id = event.id;

          $.ajax({
            url:"update.php",
            type:"POST",
            data:{title:title, start:start, end:end, id:id},
            
            success:function()
            {
              calendar.fullCalendar('refetchEvents');
              alert("Event Updated");
            }

          });
        },
      });
    });
  </script>

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
    <a href="overview.php" class="w3-bar-item button padding"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="todo.php" class="w3-bar-item button padding"><i class="fa fa-list-alt fa-fw"></i>  Lists</a>
    <a href="#" class="w3-bar-item button padding blue"><i class="fa fa-calendar fa-fw"></i>  Calendar</a>
    <a href="logout.php" class="w3-bar-item button padding"><i class="fa fa-sign-out fa-fw"></i>  Logout</a>
   </div>

</nav>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-list-alt"></i> My Calendar</b></h5>
  </header>

  <div class="w3-panel">

    <div class="w3-row-padding" style="margin:0 -16px">
      <div id="calendar" class="cal-list">
      </div>
    </div>

  </div>

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

<script type="text/javascript">
//Handles Date-time picker
  $(function () {
    $('#datetimepicker1').datetimepicker({
      step: 5
    });
    $('#datetimepicker2').datetimepicker({
      step: 5
    });
  });
</script>

</body>
</html>

