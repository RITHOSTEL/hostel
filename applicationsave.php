<?php
$p0=0;
$p1=0;
$p2=0;
$p3=0;
$sc=0;
$st=0;
$bpl=0;
$ph=0;
$o_state=0;
$central=0;
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
 $rank=$_POST['txtrank'];
for($i=0;$i<sizeof($_POST['prior']);$i++)
 {
 	 $priority[$i]=$_POST['prior'][$i];
 	// echo "<br>".$priority[$i];

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
//echo 'cat='.sizeof($_POST['category']);
for($j=0;$j<sizeof($_POST['category']);$j++)
 {
 	 $category[$j]=$_POST['category'][$j];
 	 //echo "<br>".$category[$j]."<br>";
switch($category[$j])
{
	case "catsc": $sc=1;break;
	case "catst": $st=1;break;
	case "catph": $ph=1;break;
	case "catbpl": $bpl=1;break;
	case "catoherstate": $o_state=1;break;
	case "catcentral": $central=1;break;
	default:$sc=0;$st=0;$ph=0;$bpl=0;$o_state=0;$central=0;
}
}
if ($sc!=1) {
	$sc=0;
}
if ($st!=1) {
	$st=0;
}
if ($ph!=1) {
	$ph=0;
}
if ($o_state!=1) {
	$o_state=0;
}
if ($bpl!=1) {
	$bpl=0;
}
if ($central!=1) {
	$central=0;
}

/*echo "<br>sc=".$sc."<br>".$st."<br>";
echo "<br>central=".$central."<br> ph=".$ph."<br>";
echo "<br>bpl=".$bpl;*/


include("../connection.php");

 $qrydob="select dob from stud_details where admissionno='".$uname."'";

$dobres=mysqli_query($con,$qrydob);
while ( $row= mysqli_fetch_assoc($dobres)) {
	$dob=$row['dob'];
}
$qry="insert into hostel_login(username,password,usertype)values('".$uname."','".$dob."','student')";
$res=mysqli_query($con,$qry);
$qryin="insert into hostel_stud_reg(admno,admn_status,distance,income,parent_address,parent_mob,priority1,priority2a,priority2d,priority2e,Entrance_rank,sc,st,ph,bpl,other_state,central)values('".$uname."','submitted','".$dist."','".$income."','".$p_address."','".$p_mob."','".$p0."','".$p1."','".$p2."','".$p3."','".$rank."','".$sc."','".$st."','".$ph."','".$bpl."','".$o_state."','".$central."')";
//print_r($qryin);
$result=mysqli_query($con,$qryin);
if ($result)
{
	mysqli_close($con);
	?>
	
	<?php 
	//echo '<script type="text/javascript">alert("Succefully registered");window.location=\'application.php\';</script>';
	//echo "alert('Succefully registered')";
	
	echo '<script type="text/javascript">alert("Succefully registered");window.location=\'application.php\';</script>';

	
	//echo 'Redirect("registration.html")'.'alert("Succefully registered")';?>
	
	<?php
}
else
	{
		//need to change the location of the web page when registration failed to......echo '<script type="text/javascript">alert("Registration failed");window.location=\'application.php\';</script>';
	//echo '<script type="text/javascript">alert("Registration failed");window.location=\'applicationsave.php\';</script>';
		echo '<script type="text/javascript">alert("Registration failed");window.location=\'application.php\';</script>';

	
}


?>

