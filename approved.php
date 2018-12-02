
<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
	<?php

	/*$type=$_REQUEST['type'];
	$status=$_REQUEST['status'];*/
	if (isset($_REQUEST['admno'])) {
		$admnno=$_REQUEST['admno'];
	
	
	//echo date("d/m/y") . "<br>";
	//echo $admnno;
	//include("wardenhome.php");
	include("connection.php");
	$msg='';
	?>
	<h2>Allocate Hostel</h2>
	
	<form name="frm1" method="post" action="approved.php">
<table align="centre">
	<tr><td>
		&nbsp&nbsp&nbsp<select name="hos_name">
			<option value="OLD LH">OLD LH</option>
			<option value="NEW LH">NEW LH</option>
			<option value="AICTE">AICTE</option>
			<option value="OLD MH">OLD MH</option>
			<option value="PG MH">PG MH</option>
			</select>
			<td>
		&nbsp&nbsp&nbsp<input type="text" name="txtAdmno" value=<?php echo $admnno; ?> readonly>
		
		
	</td>
	<TD>&nbsp&nbsp&nbsp<input type="submit" name="subhosname" value="Submit"></TD>
</tr>
		
		


</table></form>

</body>
	</html>
	<?php
}
	if(isset($_POST['txtAdmno']))
	{
include("../connection.php");
$admn=$_POST['txtAdmno'];
$hosname=$_POST['hos_name'];

$qry="SELECT * FROM hostel_stud_reg WHERE ADMNO='".$admn."'";
$res=mysqli_query($con,$qry);
$rec=mysqli_num_rows($res);
if($rec<=0)
{
	echo '<script type="text/javascript">alert("'.$admn.' is already allocated ");window.location=\'wrankdisplayLH.php\';</script>';
}
else
{


$qryold="SELECT vacancy,hosid from hostel_rit where HOSNAME='".$_POST['hos_name']."'";
	//print_r($qryold);
$resold=mysqli_query($con,$qryold);
while ( $row= mysqli_fetch_assoc($resold)) 
{	
	$vcancy=$row['vacancy'];
	$hosid=$row['hosid'];
	}
	//ho $vcancyold;
	
$today=date('Y-m-d');
	//echo date('Y/m/d')."<BR>";
	echo '<label> Available vacancy of '.$hosname.'is '.$vcancy.'';
	if($vcancy>0)
	{
		$qrySel="SELECT * FROM hostel_stud_reg where ADMNO='".$admn."'";
		$resSel=mysqli_query($con,$qrySel);
while ( $row= mysqli_fetch_assoc($resSel)) 
{
		//$aStatus=$row['admn_status'];
		$pAddress=$row['parent_address'];
		$pMob=$row['parent_mob'];
		$income=$row['income'];

		$distance=$row['distance'];
		$hrank=$row['hos_rank'];
		$dmetric=$row['distance_metric'];

		
		$rankMetric=$row['rank_metric'];
		$fRank=$row['final_rank'];


}
		$qryins="INSERT into hostel_student_details(ADMNO,hos_id,allocated_date,admnStatus,parentMob,income,distance,hosRank,distanceMetric,rankMetric,HosFinalRank,parentAddress)values ('".$admn."','".$hosid."','".$today."','allocated','".$pMob."','".$income."','".$distance."','".$hrank."','".$dmetric."','".$rankMetric."','".$fRank."','".$pAddress."')";
		//print_r($qryins);
		$resins=mysqli_query($con,$qryins);
		if($resins)
		{
			$vcancy-=1;
		$qrydel="DELETE FROM hostel_stud_reg where ADMNO='".$admn."'";
		print_r($qrydel);
			/*$qryup="UPDATE hostel_stud_reg set admn_status='allocated' where ADMNO='".$admn."'";*/
			$resup=mysqli_query($con,$qrydel);

			$qryhos="UPDATE hostel_rit set vacancy='".$admn."' where hosid='".$hosid."'";
			$reshos=mysqli_query($con,$qryhos);
			echo '<script type="text/javascript">alert("'.$admn.' successfully allocated to '.$hosname.'");window.location=\'wrankdisplayLH.php\';</script>';
		//	echo '<script type="text/javascript">alert("Succefully allocated");window.location=\'wrankdisplayLH.php\';</script>';

	//echo '<script type="text/javascript">alert("Succefully allocated <?php echo $admn; );window.location=\'wrankdisplayLH.php\';</script>';

		}
	}
	else
	{
		echo '<script type="text/javascript">alert("Failed to allocate check the vacancy of the hostel ");window.location=\'wrankdisplayLH.php\';</script>';
		//echo '<script type="text/javascript">alert( "failed to allocate");window.location=\'wrankdisplayLH.php\';</script>';
	}
}
	}
?>