<?php
session_start();
if (isset($_SESSION['uname'])) {
	

include("/connection.php");
$admnno=$_GET['admno'];

$qrydel="UPDATE hostel_stud_reg SET admn_status='rejected' where ADMNO='".$admnno."'";
print_r($qrydel);
$resold=mysqli_query($con,$qrydel);
if ($resold) {
	//echo "string";
	echo '<script type="text/javascript">alert("Successfully updated");window.location=\'admin/viewapplication.php\';</script>';
	//echo '<script type="text/javascript">alert('.$admnno.' deleted successfully);window.location=\'wrankdisplayLH.php\';</script>';
}
else {
	echo '<script type="text/javascript">alert("Updation failed");window.location=\'admin/viewapplication.php\';</script>';
}
}
?>