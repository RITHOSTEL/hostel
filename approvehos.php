<?php
include("../connection.php");
$admn=$_POST['txtAdmno'];
$hosname=$_POST['hos_name'];


$qryold="SELECT vacancy,hosid from hostel_rit where HOSNAME='".$_POST['hos_name']."'";
	//print_r($qryold);
$resold=mysqli_query($con,$qryold);
while ( $row= mysqli_fetch_assoc($resold)) 
{	$today=date();
	$vcancy=$row['vacancy'];
	$hosid=$row['hosid'];
	}
	//ho $vcancyold;
	if($vcancy)
	{
		$qryUp="INSERT into hostel_student_details(ADMNO,hos_id,allocated_date)values ('".$admn."','".$hosid."','".$today."')";
		//print_r($qryUp);
		$resUp=mysqli_query($con,$qryUp);
		if($resUp)
		{
			$vcancy-=1;
			$qryup="UPDATE hostel_stud_reg set admn_status='allocated' where ADMNO='".$admn."'";
			$resup=mysqli_query($con,$qryup);

			$qryhos="UPDATE hostel_rit set vacancy='".$admn."' where hosid='".$hosid."'";
			$resup=mysqli_query($con,$qryup);
			echo '<script type="text/javascript">alert("Successfully allocated");window.location=\'wrankdisplayLH.php\';</script>';
		//	echo '<script type="text/javascript">alert("Succefully allocated");window.location=\'wrankdisplayLH.php\';</script>';

	//echo '<script type="text/javascript">alert("Succefully allocated <?php echo $admn; );window.location=\'wrankdisplayLH.php\';</script>';

		}
	}
	else
	{
		echo '<script type="text/javascript">alert("Failed to allocate check the vacancy");window.location=\'wrankdisplayLH.php\';</script>';
		//echo '<script type="text/javascript">alert( "failed to allocate");window.location=\'wrankdisplayLH.php\';</script>';
	}
	


	




?>