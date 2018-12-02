



 
	<?php 
	
	include("adminhome.php");

		
	
include("../connection.php");

/*DISTANCE CALCULATION..........................*/
$qrymin_d="SELECT min(distance) from hostel_stud_reg,stud_details where admn_status='submitted' and gender='M'";
$resmin_d=mysqli_query($con,$qrymin_d);
while ( $row= mysqli_fetch_assoc($resmin_d)) {
$x_min=$row['min(distance)'];

}
echo "<br>min distance=".$x_min;

$qrymax_d="SELECT max(distance) from hostel_stud_reg,stud_details where admn_status='submitted' and gender='M'";
$resmax_d=mysqli_query($con,$qrymax_d);
while ( $row= mysqli_fetch_assoc($resmax_d)) {
$x_max=$row['max(distance)'];}
echo "<br>max distance=".$x_max;


//doubt on the condition
/*$qry_d="select distance from hostel_stud_reg";
$res_d=mysqli_query($con,$qry_d);
while ( $row= mysqli_fetch_assoc($res_d)) {
$y1=($y_min+($row['distance']-$x_min)*($y_max-$y_min))/($x_max-$x_min);
echo "<br>".$y1;
}
*/
$qrymin_rank="SELECT min(Entrance_rank) from hostel_stud_reg,stud_details where admn_status='submitted' and gender='M'";
$resmin_rank=mysqli_query($con,$qrymin_rank);
while ( $row= mysqli_fetch_assoc($resmin_rank)) {
$x_min_r=$row['min(Entrance_rank)'];

}
//echo "<br>min rank=".$x_min_r;

$qrymax_rank="SELECT max(Entrance_rank) from hostel_stud_reg,stud_details where admn_status='submitted' and gender='M'";
$resmax_rank=mysqli_query($con,$qrymax_rank);
while ( $row= mysqli_fetch_assoc($resmax_rank)) {
$x_max_r=$row['max(Entrance_rank)'];}
//echo "<br>max rank=".$x_max_r;

$y_min=1;
$y_max=50;
$y_min_r=1;
$y_max_r=50;
//doubt on the condition
/*$qry_rank="select * from stud_details sd,hostel_stud_reg where sd.admissionno=hostel_stud_reg.ADMNO and admn_status='submitted' or admn_status='allocated'" ;*/
$qry_rank="SELECT * from stud_details sd,hostel_stud_reg where sd.admissionno=hostel_stud_reg.ADMNO and hostel_stud_reg.admn_status='submitted' and gender='M' order by hos_rank" ;
$res_rank=mysqli_query($con,$qry_rank);
 while ( $row= mysqli_fetch_assoc($res_rank)) {
	
		 $admnn= $row['ADMNO'];
		// echo '<br> rank='.$row['rank'].'<br>';
			/*	<td> <?php echo $row['admissionno'];?></td>
			 
				<td> <?php echo $row['name'];?></td>
			 
				<td> <?php echo $row['distance'];?></td>
				<td> <?php echo $row['rank'];?></td>
			  
	<?php*/
	$y1=1+((($row['distance']-$x_min)*49)/($x_max-$x_min));
	
	$y1_r=1+((($row['Entrance_rank']-$x_max_r)*49)/($x_min_r-$x_max_r));
	 
	 /*$y1=$y_min+((($row['distance']-$x_min)*($y_max-$y_min))/($x_max-$x_min));

     $y1_r=$y_min_r+((($row['rank']-$x_max_r)*($y_max_r-$y_min_r))/($x_min_r-$x_max_r));*/

/*<td><?php echo $y1;?></td> */
 //echo '<br>'.$y1_r;
 
  $hos_rank=$y1+$y1_r;?></td> <?php $qry_update="UPDATE hostel_stud_reg set hos_rank='".$hos_rank."',distance_metric='".$y1."',rank_metric='".$y1_r."' where ADMNO='".$admnn."'" ;
//print_r($qry_update);
$res_update=mysqli_query($con,$qry_update);
if ($res_update) {
	
	echo '<script type="text/javascript">alert("Ranklist generated");window.location=\'ranklistdisplaypg.php\';</script>';
}
else
{
	//echo "udation failed";
}
 } 




/*..............................................PRIORITY BASED RANKING FOR PG STUDNTS................................*/

$rank=1;
$qry_vacancy="SELECT vacancy from hostel_rit where hosid=125 ";
$res_vancancy=mysqli_query($con,$qry_vacancy);
while ($row=mysqli_fetch_assoc($res_vancancy))
{
	$p1vacancy=$row['vacancy'];
}


//echo '<br> priority 1 vacancy='.$p1vacancy;
$p1vacancy=floor((5/100)*$p1vacancy);
//echo '<br> vacancy='.$p1vacancy;

$qry_mtech_c="SELECT count(ADMNO) from class_details cd ,current_class cc,hostel_stud_reg h where cc.studid=h.ADMNO and cd.classid=cc.classid  and cd.courseid IN('MTECH') AND cd.semid in(1,2) and h.priority2e=1 AND h.admn_status='submitted'";
$res_mtech_c=mysqli_query($con,$qry_mtech_c);
while ($row=mysqli_fetch_assoc($res_mtech_c)) 
	{
		$mtech_count=$row['count(ADMNO)'];
		echo "<br>BTECH count=".$row['count(ADMNO)'];
	}
$qry_mca_c="SELECT count(ADMNO) from class_details cd ,current_class cc,hostel_stud_reg h where cc.studid=h.ADMNO and cd.classid=cc.classid  and cd.courseid IN('MCA') AND cd.semid in(1,2) and h.priority2e=1 AND h.admn_status='submitted'";
$res_mca_c=mysqli_query($con,$qry_mca_c);
while ($row=mysqli_fetch_assoc($res_mca_c)) 
	{
		$mca_count=$row['count(ADMNO)'];
		echo "<br>BARCH count=".$row['count(ADMNO)'];
	}
	if ($p1vacancy>0) {
		

	$total_count=$mca_count+$mtech_count;

	$mtech_vacancy=floor(($mtech_count/$total_count)*$p1vacancy);
	echo "<br>btech vacancy".$mtech_vacancy;
	$mca_vacancy=floor(($mca_count/$total_count)*$p1vacancy);
	echo "<br>barch vacancy".$sbarch_vacancy;

$qrysp2e="SELECT * from stud_details sd,class_details cd ,current_class cc,hostel_stud_reg h where sd.admissionno=h.ADMNO and cc.studid=h.ADMNO and cd.classid=cc.classid  and cd.courseid IN('MTECH','MCA') AND d.semid in(1,2) and h.priority2d=1 AND h.admn_status='submitted'";
$res_sp2e=mysqli_query($con,$qrysp2e);
	while ($row=mysqli_fetch_assoc($res_sp2e)) 
	{
		if($mtech_vacancy>0 and $p1vacancy>0)
		{
			//echo'hi';
			if ($row['courseid']=='MTECH') 
			{
				$qry_up_mtech="UPDATE hostel_stud_reg set admn_status='ranked'final_rank='P".$rank."' where ADMNO='".$row['ADMNO']."'";
				$res_up_mtech=mysqli_query($con,$qry_up_mtech);
				if ($res_up_mtech)
				{
					/*echo '<br>Name='.$row['name'];
					echo"<br>PH=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];*/
					$rank+=1;
					$mtech_vacancy-=1;
					$p1vacancy-=1;
				}
				
			}
		}
		if($mca_vacancy>0 and $p1vacancy>0)
		{
			//echo "hello";
			if ($row['courseid']=='MCA') 
			{

				$qry_up_mca="UPDATE hostel_stud_reg set admn_status='ranked'final_rank='P".$rank."' where ADMNO='".$row['ADMNO']."'";
				$res_up_mca=mysqli_query($con,$qry_up_mca);
				if ($res_up_mca)
				 {
					/*echo '<br>Name='.$row['name'];
					echo"<br>PH=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];*/
					$rank+=1;
					$mca_vacancy-=1;
					$p1vacancy-=1;
				}
				
			}
		
	//	echo '<br>Name='.$row['name'];
		}
	   	
	   }

}
?>