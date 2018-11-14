<?php
$p0=0;
$p1=0;
$p2=0;
$p3=0;
session_start();

if (!isset($_SESSION['uname'])) 
{
  
 echo "NO SESSION VARIABLE";
 }
 $uname=$_SESSION['uname'];
// $pass=$_POST['txtpass'];
 $dist=$_POST['txtdist'];
 $p_address=$_POST['txtpaddress'];
 $p_mob=$_POST['mob_p'];
 $income=$_POST['txtincome'];
for($i=0;$i<sizeof($_POST['prior']);$i++)
 {
 	 $priority[$i]=$_POST['prior'][$i];
 	 echo "<br>".$priority[$i];

 /*
 if ($priority[$i]=="prior1") {
 	$p0=1;
 	echo "<br> first p0=".$p0;
 }
 else {
 	$p0=0;
 	echo "   &nbsp &nbsp &nbsp second             p0=".$p0;
 
 }
 if ($priority[$i]=="prior2a") {
 	$p1=1;
 	echo"<br>". $p1;
 }
 else {
 	$p1=0;
 
 }
 if ($priority[$i]=="prior2d") {
 	$p2=1;
 	echo "<br>".$p2;
 }
 else {
 	$p2=0;
 
 }
 if ($priority[$i]=="prior2e") {
 	$p3=1;
 	echo "<br>".$p3;
 }
 else {
 	$p3=0;
 
 }
*/
switch($priority[$i])
{
	case "prior1": $p0=1;break;
	case "prior2a": $p1=1;break;
	case "prior2d": $p2=1;break;
	case "prior2e": $p3=1;break;
	default:$p0=0;$p1=0;$p2=0;$p3=0;
}
}
if ($p0!=1) {
	$p0=0;
}
if ($p1!=1) {
	$p1=0;
}
if ($p2!=1) {
	$p2=0;
}
if ($p3!=1) {
	$p3=0;
}
echo "<br> p0=".$p0;echo "<br>p1=".$p1;echo "<br>p2=".$p2;echo "<br>p3=".$p3;
 $con=mysqli_connect('localhost','root','');
if (!$con)
{
	echo "</br> Error occured!";
	
}
$db=mysqli_select_db($con,"rithostel");
if (!$db)
{
	echo "</br> Error occured!";
	
}

 $qrydob="select dob from stud_details where admissionno='".$uname."'";

$dobres=mysqli_query($con,$qrydob);
while ( $row= mysqli_fetch_assoc($dobres)) {
	$dob=$row['dob'];
}
$qry="insert into hostel_login(username,password,usertype)values('".$uname."','".$dob."','student')";
print_r($qry);
$res=mysqli_query($con,$qry);
$qryin="insert into hostel_stud_reg(admno,admn_status,distance,income,parent_address,parent_mob,priority1,priority2a,priority2d,priority2e)values('".$uname."','submitted','".$dist."','".$income."','".$p_address."','".$p_mob."','".$p0."','".$p1."','".$p2."','".$p3."')";
print_r($qryin);
$result=mysqli_query($con,$qryin);
if ($result)
{
	echo '<script type="text/javascript">alert("Succefully registered");</script>';
	//echo "alert('Succefully registered')";
	
	//echo '<script type="text/javascript">alert("Succefully registered");window.location=\'application.php\';</script>';

	
	//echo 'Redirect("registration.html")'.'alert("Succefully registered")';
	
}
else
	{
		//need to change the location of the web page when registration failed to......echo '<script type="text/javascript">alert("Registration failed");window.location=\'application.php\';</script>';
	//echo '<script type="text/javascript">alert("Registration failed");window.location=\'applicationsave.php\';</script>';
		echo "Registration failed";
	
}

mysqli_close($con);
?>

