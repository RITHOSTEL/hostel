<?php
session_start();
//print_r($_SESSION['uname']);
if(!isset($_SESSION['uname']))
{
    // echo '<script type="text/javascript">alert("You are not logged in to see this page: please login");window.location=\'login.php\';</script>';
}
?> 
<html>
<head >
	<link rel="stylesheet" type="text/css" href="masterhometemplate.css">
	<title>Rajiv Gandhi Institute of Technology</title>
	

</head>
<body id="homebody">
	
<?php
	include("../header.html");
		
	?>
<a href="application.php">Application</a>&nbsp &nbsp 
	<a href="vfeedet.html"> fee details</a>&nbsp &nbsp
	<a href="vattendance.html">attendance</a>&nbsp &nbsp
	<a href="sendcomplaint.html">complaints</a>&nbsp &nbsp
	</body>
</html>