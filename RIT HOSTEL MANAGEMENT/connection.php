<?php
$con=mysqli_connect('localhost','root','');
if ($con)
{
	//echo "</br> mysql connected";
	
}
$db=mysqli_select_db($con,"rithostel");
if ($db)
{
	//echo "</br> db connected";
	
}
?>