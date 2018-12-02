<?php
session_start();
if (isset($_SESSION['uname'])) {
include("../connection.php");
$admnno=$_GET['admno'];

$qrydel="UPDATE hostel_stud_reg SET admn_status='accepted' where ADMNO='".$admnno."'";
$resold=mysqli_query($con,$qrydel);
if ($resold) {
	echo '<script type="text/javascript">alert("Successfully updated");window.location=\'viewapplication.php\';</script>';
	//echo '<script type="text/javascript">alert('.$admnno.' deleted successfully);window.location=\'wrankdisplayLH.php\';</script>';
}
else {
	echo '<script type="text/javascript">alert("Updation failed");window.location=\'viewapplication.php\';</script>';
}
}
?>