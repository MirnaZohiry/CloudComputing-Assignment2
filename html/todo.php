<!DOCTYPE html>
<html>
<head>
	<title>Lists Page</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="css/view.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Bootstrap Date-Picker Plugin -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

  <!--Date-Time-Picker Plugin-->
  <link rel="stylesheet" href="jquery.datetimepicker.min.css">
  <script src="jquery.datetimepicker.js"></script>
  <script src="jquery.datetimepicker.full.js"></script>


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
    <a href="#" class="w3-bar-item button padding blue"><i class="fa fa-list-alt fa-fw"></i>  Lists</a>
    <a href="calendar.php" class="w3-bar-item button padding"><i class="fa fa-calendar fa-fw"></i>  Calendar</a>
    <a href="logout.php" class="w3-bar-item button padding"><i class="fa fa-sign-out fa-fw"></i>  Logout</a>
   </div>

</nav>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-list-alt"></i> My Lists</b></h5>
  </header>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="list">
        <h1 class="header">To Do List</h1>
        <table class="table striped hoverable white" id="todo_table">

          <?php include ('fetch.php')?>
          <?php

          if ($rowCount > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              echo '<tr>';
              echo "<td>" . $title = $row["title"] . "</td>"; 
              echo "<td>" . $start_event = $row["start_event"] . "</td>";
              echo "<td>" . $end_event = $row["end_event"] . "</td>";
              echo '<td><a href="" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">delete</i></a></td>'; 
              echo "</tr>";
            }
          }
          else {
            //do nothing
          }

          ?>

        </table>

        <button class="button blue" type="button" class="submit" data-toggle="modal" data-target="#myModal">Add Tasks  <i class="fa fa-plus"></i></button>

      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enter Task Information</h4>
        </div>
        
        <div class="modal-body">
          <form class="form-horizontal" method="post" action="insert.php" id="insert_form">

            <div class="form-group">
              <label for="inputTask" class="col-sm-2 control-label" style="text-align: left;">Task</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="inputTask" id="inputTask" placeholder="Enter Task Description">
              </div>
            </div>

            <div class="form-group">
              <label for="inputDate" class="col-sm-2 control-label" style="text-align: left;">Start Date</label>
              <div class='col-sm-10' >
                <input type='text' id='datetimepicker1' name="datetimepicker1" class="form-control" placeholder="Enter Task Start Date"/>
              </div>
            </div>

            <div class="form-group">
              <label for="inputDate" class="col-sm-2 control-label" style="text-align: left;">End Date</label>
              <div class='col-sm-10'>
                <input type='text' id='datetimepicker2' name="datetimepicker2" class="form-control" placeholder="Enter Task End Date"/>
              </div>
            </div>
        
            <div class="modal-footer">
              <button type="submit" name="insert" id="insert" form="insert_form" class="btn btn-default">Add</button>
            </div>

          </form>
        </div>
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

<script>
//Mark selected row as checked from the list
function selectedRow() {

  var index,
  table = document.getElementById("todo_table");

  for(var i = 0; i < table.rows.length; i++)
  {
    table.rows[i].onclick = function()
    {
      index = this.rowIndex;
      this.classList.toggle("checked");
    };
  }
}
selectedRow();
</script>

<script>
//Handles the delete button to remove entries from table
$('table').on('click', 'a[href=""]', function(e){
  var tr = $(this).closest('tr');
  var td = tr.children('td');
  
  for (var i = 0; i < td.length; ++i) {
    window.location.assign('delete.php?title=' + td[0].innerText + '&start_event=' + td[1].innerText + '&end_event=' + td[2].innerText);
  }

});
</script>

</body>
</html>
