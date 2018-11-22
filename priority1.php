<?php
$rank=1;
$i=0;

	include("adminhome.php");

include("../connection.php");
$tot_vacancy_LH=0;
$qry_vacancy="select vacancy from hostel_rit where hostype='LH'";
$res_vancancy=mysqli_query($con,$qry_vacancy);
while ($row=mysqli_fetch_assoc($res_vancancy)) {
	$tot_vacancy_LH+=$row['vacancy'];
}
$p1vacancy=(20/100)*$tot_vacancy_LH;
//echo "percentage=".$p1vacancy;
/*..............................................LADIES............................................*/
while ($i<=$p1vacancy) {
	//echo $i;

/*...............................................CENTRAL GOVT NOMINEES..............................................*/
$qry_central="select ADMNO from stud_details sd,hostel_stud_reg hsr where hsr.admn_status='submitted' and hsr.priority1=1 and sd.admissionno=hsr.ADMNO and sd.quota in ('central') and gender='F' order by hos_rank ";
$res_central=mysqli_query($con,$qry_central);
$rec=mysqli_num_rows($res_central);
if($rec==0)
{
	
}
else
{
	while ($row=mysqli_fetch_assoc($res_central)) 
	{
		$admnNo=$row['ADMNO'];
		
		$qry_up_status="update hostel_stud_reg set admn_status='allocated' ,final_rank='".$rank."' where ADMNO='".$admnNo."'";
	//	print_r($qry_up_status);
		$res_up_status=mysqli_query($con,$qry_up_status);
		/*$qry_final_central="update hostel_stud_reg set final_rank='".$rank."' where ADMNO='".$admnNo."'";
		$res_final_central=mysqli_query($con,$qry_final_central);*/
		$rank+=1;
		$p1vacancy-=1;
	//	echo $p1vacancy;

	}
}
/*...........................................................SC...............................................*/
$qry="select ADMNO from stud_details sd,hostel_stud_reg hsr where hsr.admn_status='submitted' and hsr.priority1=1 and sd.admissionno=hsr.ADMNO and sd.quota in ('sc') and gender='F' order by hos_rank ";
$res=mysqli_query($con,$qry);
/*$rec=mysqli_num_records($res);*/
if($rec==0)
{
	echo '<script>alert(" No records found");</script>';
}
while ($row=mysqli_fetch_assoc($res)) {
	$admnNo=$row['ADMNO'];
		$qry_up_sc="update hostel_stud_reg set admn_status='allocated' ,final_rank='".$rank."'where ADMNO='".$admnNo."'";
	//	print_r($qry_up_status);
		$res_up_sc=mysqli_query($con,$qry_up_sc);
		$rank+=1;
		/*$qry_final_sc="update hostel_stud_reg set final_rank='".$rank."' where ADMNO='".$admnNo."'";
		$res_final_sc=mysqli_query($con,$qry_final_sc);*/
		$p1vacancy-=1;
	//	echo $p1vacancy;
}

/*...........................................................ST..............................................*/
$qry_st="select ADMNO from stud_details sd,hostel_stud_reg hsr where hsr.admn_status='submitted' and hsr.priority1=1 and sd.admissionno=hsr.ADMNO and sd.quota in ('st') and gender='F' order by hos_rank ";
$res_st=mysqli_query($con,$qry_st);
/*$rec=mysqli_num_records($res);
if($rec==0)
{
	echo '<script>alert(" No records found");</script>';
}*/
while ($row=mysqli_fetch_assoc($res_st)) {
	$admnNo=$row['ADMNO'];
		$qry_up_st="update hostel_stud_reg set admn_status='allocated' ,final_rank='".$rank."' where ADMNO='".$admnNo."'";
	//	print_r($qry_up_status);
		$res_up_st=mysqli_query($con,$qry_up_st);
		$rank+=1;
	/*	$qry_final_st="update hostel_stud_reg set final_rank='".$rank."' where ADMNO='".$admnNo."'";
		$res_final_st=mysqli_query($con,$qry_final_st);*/
		$p1vacancy-=1;
	//	echo $p1vacancy;
}
/*...........................................................BPL...............................................*/
$qry_bpl="select ADMNO from stud_details sd,hostel_stud_reg hsr where hsr.admn_status='submitted' and hsr.priority1=1 and sd.admissionno=hsr.ADMNO and sd.quota in ('BP') and gender='F' order by hos_rank ";
$res_bpl=mysqli_query($con,$qry_bpl);
/*$rec=mysqli_num_records($res);
if($rec==0)
{
	echo '<script>alert(" No records found");</script>';
}*/
while ($row=mysqli_fetch_assoc($res_bpl)) {
	$admnNo=$row['ADMNO'];
		$qry_up_bpl="update hostel_stud_reg set admn_status='allocated' ,final_rank='".$rank."' where ADMNO='".$admnNo."'";
	//	print_r($qry_up_status);
		$res_up_bpl=mysqli_query($con,$qry_up_bpl);
		$rank+=1;
		/*$qry_final_bpl="update hostel_stud_reg set final_rank='".$rank."' where ADMNO='".$admnNo."'";
		echo "rank=".$rank;
		print_r($qry_final_bpl);
		$res_final_bpl=mysqli_query($con,$qry_final_bpl);*/
		$p1vacancy-=1;
		//echo $p1vacancy;
		}
		$i++;
	}
	mysqli_close($con);
	/*.......................................................LADIES.................................................*/

	/*....................................................priority IIa..............................................*/

echo '<br> vacancy='.$p1vacancy;
$p1vacancy=(30/100)*$p1vacancy;
echo '<br> vacancy='.$p1vacancy;



	/*....................................................priority IIa..............................................*/
?>