
<html>
<head >
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets\css\bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets\css\bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="assets\css\bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


	<title>Rajiv Gandhi Institute of Technology</title>
	<h1>RIT HOSTEL SOFT</h1>

	<title>Rajiv Gandhi Institute of Technology</title>
	

</head>
<body >
	<?php
  session_start();
  if (isset($_SESSION['uname'])) { 
    ?>
   
 
	<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header" >
					<a class="navbar-brand" href="#">RIT HOSTEL SOFT</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="adminhome.php"><span class="glyphicon glyphicon-home"> Administrator <br> &nbsp Home</a></li>
           
           

<li  class="dropdown">
        <a  class="dropdown-toggle" data-toggle="dropdown" href="#" >Admission<span class="caret"></span>
        </a>
        <ul  class="dropdown-menu">
          <li><a  href="viewapplication.php">Applications</a></li>
          <li><a  href="ranklistdisplay.php">Ranklist</a></li>
          
        <!--  <li ><a > href="color:mediumblue">="#"="color:mediumblue">>Page 1-3</a ></li >-->
        </ul >
        
      </li >


	<li><a href="hosteller.php">Hosteller</a></li>
	<li><a href="feedetails.html">Fee</a> </li>
	<li><a href="adminnotification.html">Notifications</a></li>
	<li><a href="certicate.html"> Inmate certificate</a></li>
	

	<li  class="dropdown">
        <a  class="dropdown-toggle" data-toggle="dropdown" href="#" >Hostel<span class="caret"></span>
        </a>
        <ul  class="dropdown-menu">
          <li><a href="hostel.php">View hostel details</a></li>
          <li><a href="hoschange.html">Change hostel</a></li>
          
        <!--  <li ><a > href="color:mediumblue">="#"="color:mediumblue">>Page 1-3</a ></li >-->
        </ul >
        
      </li >
	
	
	<!--<li><a href="ranklistgenerate.php">Rank list generate</a></li>
	<li><a href="ranklistdisplay.php">Rank list display</a></li>-->
	

    <ul class="nav navbar-nav navbar-right">
<form style="color:red" class="navbar-form navbar-left" method="POST"action="search.php">
  <div style="color:red" class="input-group">
    <input style="color:red" type="text" class="form-control" name="txtSearch" placeholder="Search">
    <div style="color:red" class="input-group-btn">
      <button style="color:blue" class="btn btn-default" type="submit" name="btSearch">
        <i style="color:red" class="glyphicon glyphicon-search"></i style="color:mediumblue">
      </button style="color:mediumblue" >
    </div style="color:mediumblue">
  </div style="color:mediumblue">
</form style="color:mediumblue">





     <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
    </ul>
  </div>
</nav>

	<div class="container">
	<?php
   }
   ?>
</div>
</body>
</html>