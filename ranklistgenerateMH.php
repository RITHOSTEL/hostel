
 
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
	
	echo '<script type="text/javascript">alert("Ranklist generated");window.location=\'ranklistdisplayMH.php\';</script>';
}
else
{
	//echo "udation failed";
}
 } 
 //mysqli_close($con);
/*...........................................PRIORITY BASED RANKING................................................*/



$rank=1;
$i=0;

	//include("adminhome.php");

//include("../connection.php");
$tot_vacancy_LH=0;
$qry_vacancy="SELECT vacancy from hostel_rit where hostype='MH'";
$res_vancancy=mysqli_query($con,$qry_vacancy);
while ($row=mysqli_fetch_assoc($res_vancancy))
{
	$tot_vacancy_LH+=$row['vacancy'];
}
$p1vacancy=floor((20/100)*$tot_vacancy_LH);
//echo "percentage=".$p1vacancy;
//echo "percentage=".floor($p1vacancy);

/*..............................................LADIES............................................*/
//while ($i<=$p1vacancy) {
	//echo $i;

	
	

/*...............................................CENTRAL GOVT NOMINEES..............................................*/
	$qry_central="SELECT ADMNO ,hsr.central from stud_details sd,hostel_stud_reg hsr where hsr.admn_status='submitted' and hsr.priority1=1 and sd.admissionno=hsr.ADMNO and hsr.central=1 and gender='M' order by hos_rank ";
	$res_central=mysqli_query($con,$qry_central);
	$rec=mysqli_num_rows($res_central);
	if($rec==0)
	{
		
	}
	else
	{
		while ($row=mysqli_fetch_assoc($res_central)) 
		{
			if ($p1vacancy>0) 
			{	
				$admnNo=$row['ADMNO'];
				
				$qry_up_status="UPDATE hostel_stud_reg set admn_status='ranked',final_rank='M".$rank."' WHERE ADMNO='".$admnNo."'";
			//	print_r($qry_up_status);
				$res_up_status=mysqli_query($con,$qry_up_status);
				/*$qry_final_central="update hostel_stud_reg set final_rank='".$rank."' where ADMNO='".$admnNo."'";
				$res_final_central=mysqli_query($con,$qry_final_central);*/
				if ($res_up_status) {
					$rank+=1;
				$p1vacancy-=1;
				//echo"<br>central=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy;
				}
				
			//	echo $p1vacancy;
				
			}

		}
	}


	/*$qry_ALL="SELECT ADMNO FROM hostel_stud_reg h where h.admn_status='submitted' and priority1=1 and h.sc=1 or h.st=1 or h.ph=1 or h.bpl=1 or h.other_state=1 and gender='F' order by hos_rank";*/
	
	/*$qry_ALL="SELECT h.ADMNO,s.name,s.gender,h.sc,h.st,h.ph,h.bpl,h.other_state FROM hostel_stud_reg h,stud_details s where h.admn_status='submitted' and s.admissionno=h.ADMNO and h.priority1=1 and h.sc=1 or h.st=1 or h.ph=1 or h.bpl=1 or h.other_state=1 and s.gender='F' order by hos_rank";*/

	/*$qry_ALL="SELECT h.ADMNO,(SELECT name FROM stud_details WHERE s.admissionno=h.ADMNO and s.gender='F')name,s.gender,h.sc,h.st,h.ph,h.bpl,h.other_state FROM hostel_stud_reg h,stud_details s where h.admn_status='submitted' and h.priority1=1 and h.sc=1 or h.st=1 or h.ph=1 or h.bpl=1 or h.other_state=1  order by hos_rank";*/
	$qry_ALL= "SELECT h.ADMNO,s.name,h.sc,h.sc,h.st,h.ph,h.bpl,h.other_state from stud_details s,hostel_stud_reg h where s.admissionno=h.ADMNO and gender='M' and h.admn_status='submitted' order by hos_rank";


	$res_all=mysqli_query($con,$qry_ALL);
	while ($row=mysqli_fetch_assoc($res_all)) 
	{
		if ($p1vacancy>0) 
		{
			if ($row['sc']==1) 
			{

				$qry_up_sc="UPDATE hostel_stud_reg set admn_status='ranked' ,final_rank='M".$rank."' where ADMNO='".$row['ADMNO']."'";
				$res_up_sc=mysqli_query($con,$qry_up_sc);
				if ($res_up_sc) {
					$rank+=1;
				$p1vacancy-=1;
				}
				
				//echo"<br>SC=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];

			}
		}
		if ($p1vacancy>0) 
		{
			if ($row['st']==1) 
			{
				$qry_up_st="UPDATE hostel_stud_reg set admn_status='ranked',final_rank='M".$rank."' where ADMNO='".$row['ADMNO']."'";
				$res_up_st=mysqli_query($con,$qry_up_st);
				if ($res_up_st) {
					$rank+=1;
				$p1vacancy-=1;
				}
				
				//echo"<br>ST=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];

			}
		}
		if ($p1vacancy>0) 
		{
			if ($row['ph']==1) 
			{
				$qry_up_ph="UPDATE hostel_stud_reg set admn_status='ranked',final_rank='M".$rank."' where ADMNO='".$row['ADMNO']."'";
				$res_up_ph=mysqli_query($con,$qry_up_ph);
				if ($res_up_ph) {
					$rank+=1;
				$p1vacancy-=1;
				}
				//echo"<br>PH=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];
			}
		}
		if ($p1vacancy>0) 
		{
			if ($row['bpl']==1) 
			{
				$qry_up_bpl="UPDATE hostel_stud_reg set admn_status='ranked',final_rank='M".$rank."' where ADMNO='".$row['ADMNO']."'";
				$res_up_bpl=mysqli_query($con,$qry_up_bpl);
				if ($res_up_bpl) {
					$rank+=1;
				$p1vacancy-=1;
				}
				//echo"<br>BPL=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];

			}
		if ($p1vacancy>0) 
		{
			if ($row['other_state']==1) 
			{
				$qry_up_os="UPDATE hostel_stud_reg set admn_status='ranked',final_rank='M".$rank."' where ADMNO='".$row['ADMNO']."'";
				$res_up_os=mysqli_query($con,$qry_up_os);
				if ($res_up_os) {
					$rank+=1;
				$p1vacancy-=1;
				}
				//echo"<br>OTHER STATE=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];

			}
		}
	//$i++;
	}
}
/*...........................................................SC...............................................*/


	//mysqli_close($con);
	/*.......................................................LADIES.................................................*/

	/*....................................................priority IIa..............................................*/
$p1vacancy=$tot_vacancy_LH-$p1vacancy;
//echo '<br> priority 1vacancy='.$p1vacancy;
$p1vacancy=floor((30/100)*$p1vacancy);
//echo '<br> vacancy='.$p1vacancy;

$qry_btech_c="SELECT count(ADMNO) from class_details cd ,current_class cc,hostel_stud_reg h,stud_details s where cc.studid=h.ADMNO and cd.classid=cc.classid and s.admissionno=h.ADMNO and gender='M' and cd.courseid IN('BTECH') AND cd.semid in (1,2) and h.priority2a=1 AND h.admn_status='submitted'order by hos_rank";
$res_btech_c=mysqli_query($con,$qry_btech_c);
while ($row=mysqli_fetch_assoc($res_btech_c)) 
	{
		$btech_count=$row['count(ADMNO)'];
		//echo "<br>BTECH count=".$row['count(ADMNO)'];
	}
$qry_barch_c="SELECT count(ADMNO) from class_details cd ,current_class cc,hostel_stud_reg h,stud_details s where cc.studid=h.ADMNO and cd.classid=cc.classid and s.admissionno=h.ADMNO and gender='M' and cd.courseid IN('BARCH') AND cd.semid in (1,2) and h.priority2a=1 AND h.admn_status='submitted' order by hos_rank";
$res_barch_c=mysqli_query($con,$qry_barch_c);
while ($row=mysqli_fetch_assoc($res_barch_c)) 
	{
		$barch_count=$row['count(ADMNO)'];
		//echo "<br>BARCH count=".$row['count(ADMNO)'];
	}

	


	if ($p1vacancy> 0)
	 {
		
	
	$total_count=$barch_count+$btech_count;

	$btech_vacancy=floor(($btech_count/$total_count)*$p1vacancy);
	//echo "<br>btech vacancy".$btech_vacancy;
	$barch_vacancy=floor(($barch_count/$total_count)*$p1vacancy);
	//echo "<br>barch vacancy".$barch_vacancy;

$qrys="SELECT * from stud_details sd,class_details cd ,current_class cc,hostel_stud_reg h,stud_details s where sd.admissionno=h.ADMNO and cc.studid=h.ADMNO and cd.classid=cc.classid and s.admissionno=h.ADMNO and gender='M' and cd.courseid IN('BTECH','BARCH') AND cd.semid in (1,2) and h.priority2a=1 AND h.admn_status='submitted' order by hos_rank";
$res_s=mysqli_query($con,$qrys);
	while ($row=mysqli_fetch_assoc($res_s)) 
	{
		if($btech_vacancy>0 and $p1vacancy>0)
		{
			//echo'hi';
			if ($row['courseid']=='BTECH') 
			{
				$qry_up_btech="UPDATE hostel_stud_reg set admn_status='ranked',final_rank='M".$rank."' where ADMNO='".$row['ADMNO']."'";
				$res_up_btech=mysqli_query($con,$qry_up_btech);
				if ($res_up_btech)
				{
					//echo '<br>Name='.$row['name'];
					//echo"<br>PH=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];
					$rank+=1;
					$btech_vacancy-=1;
					$p1vacancy-=1;
				}
				
			}
		}
		if($barch_vacancy>0 and $p1vacancy>0)
		{
			//echo "hello";
			if ($row['courseid']=='BARCH') 
			{

				$qry_up_barch="UPDATE hostel_stud_reg set admn_status='ranked',final_rank='M".$rank."' where ADMNO='".$row['ADMNO']."'";
				$res_up_barch=mysqli_query($con,$qry_up_barch);
				if ($res_up_barch)
				 {
					/*echo '<br>Name='.$row['name'];
					echo"<br>PH=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];*/
					$rank+=1;
					$barch_vacancy-=1;
					$p1vacancy-=1;
				}
				
			}
		
		//echo '<br>Name='.$row['name'];

	   	}
	   }
}

	/*....................................................priority IIa..............................................*/

/*....................................................priority IIb..............................................*/
/*echo '<br> priority 1vacancy='.$p1vacancy;
$p1vacancy=floor((30/100)*$p1vacancy);
echo '<br> vacancy='.$p1vacancy;

$qry_fbtech_c="SELECT count(ADMNO) from class_details cd ,current_class cc,hostel_stud_reg h where cc.studid=h.ADMNO and cd.classid=cc.classid  and cd.courseid IN('BTECH') AND cd.semid=3 or cd.semid=4 and h.priority2b=1 AND h.admn_status='submitted'";
$res_fbtech_c=mysqli_query($con,$qry_fbtech_c);
while ($row=mysqli_fetch_assoc($res_fbtech_c)) 
	{
		$fbtech_count=$row['count(ADMNO)'];
		echo "<br>BTECH count=".$row['count(ADMNO)'];
	}
$qry_fbarch_c="SELECT count(ADMNO) from class_details cd ,current_class cc,hostel_stud_reg h where cc.studid=h.ADMNO and cd.classid=cc.classid  and cd.courseid IN('BARCH') AND cd.semid=3 or cd.semid=4 and h.priority2c=1 AND h.admn_status='submitted'";
$res_fbarch_c=mysqli_query($con,$qry_fbarch_c);
while ($row=mysqli_fetch_assoc($res_fbarch_c)) 
	{
		$fbarch_count=$row['count(ADMNO)'];
		echo "<br>BARCH count=".$row['count(ADMNO)'];
	}
	if ( $p1vacancy>0) {
		

	$ftotal_count=$fbarch_count+$fbtech_count;

	$fbtech_vacancy=floor(($fbtech_count/$ftotal_count)*$p1vacancy);
	echo "<br>btech vacancy".$btech_vacancy;
	$fbarch_vacancy=floor(($fbarch_count/$ftotal_count)*$p1vacancy);
	echo "<br>barch vacancy".$fbarch_vacancy;

$qrysp2b="SELECT * from stud_details sd,class_details cd ,current_class cc,hostel_stud_reg h where sd.admissionno=h.ADMNO and cc.studid=h.ADMNO and cd.classid=cc.classid  and cd.courseid IN('BTECH','BARCH') AND cd.semid=1 and h.priority2c=1 AND h.admn_status='submitted'";
$res_sp2b=mysqli_query($con,$qrysp2b);
	while ($row=mysqli_fetch_assoc($res_sp2b)) 
	{
		if($fbtech_vacancy>0 and $p1vacancy>0)
		{
			echo'hi';
			if ($row['courseid']=='BTECH') 
			{
				$qry_up_fbtech="UPDATE hostel_stud_reg set admn_status='ranked' where ADMNO='".$row['ADMNO']."'";
				$res_up_fbtech=mysqli_query($con,$qry_up_fbtech);
				if ($res_up_btech)
				{
					echo '<br>Name='.$row['name'];
					echo"<br>PH=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];
					$rank+=1;
					$fbtech_vacancy-=1;
					$p1vacancy-=1;
				}
				
			}
		}
		if($fbarch_vacancy>0 and $p1vacancy>0)
		{
			echo "hello";
			if ($row['courseid']=='BARCH') 
			{

				$qry_up_fbarch="UPDATE hostel_stud_reg set admn_status='ranked' where ADMNO='".$row['ADMNO']."'";
				$res_up_fbarch=mysqli_query($con,$qry_up_fbarch);
				if ($res_up_fbarch)
				 {
					echo '<br>Name='.$row['name'];
					echo"<br>PH=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];
					$rank+=1;
					$fbarch_vacancy-=1;
					$p1vacancy-=1;
				}
				
			}
		
		echo '<br>Name='.$row['name'];

	   	}
	   }





/*....................................................priority IIb..............................................*/

/*....................................................priority IIc..............................................*/

/*echo '<br> priority 1vacancy='.$p1vacancy;
$p1vacancy=floor((20/100)*$p1vacancy);
echo '<br> vacancy='.$p1vacancy;

$qry_tbtech_c="SELECT count(ADMNO) from class_details cd ,current_class cc,hostel_stud_reg h where cc.studid=h.ADMNO and cd.classid=cc.classid  and cd.courseid IN('BTECH') AND cd.semid=5 or cd.semid=6 and h.priority2c=1 AND h.admn_status='submitted'";
$res_tbtech_c=mysqli_query($con,$qry_tbtech_c);
while ($row=mysqli_fetch_assoc($res_tbtech_c)) 
	{
		$tbtech_count=$row['count(ADMNO)'];
		echo "<br>BTECH count=".$row['count(ADMNO)'];
	}
$qry_tbarch_c="SELECT count(ADMNO) from class_details cd ,current_class cc,hostel_stud_reg h where cc.studid=h.ADMNO and cd.classid=cc.classid  and cd.courseid IN('BARCH') AND cd.semid in(5,6,7,8) and h.priority2c=1 AND h.admn_status='submitted'";
$res_tbarch_c=mysqli_query($con,$qry_tbarch_c);
while ($row=mysqli_fetch_assoc($res_tbarch_c)) 
	{
		$tbarch_count=$row['count(ADMNO)'];
		echo "<br>BARCH count=".$row['count(ADMNO)'];
	}
	if  ($p1vacancy>0) {
		
	$ttotal_count=$tbarch_count+$tbtech_count;

	$tbtech_vacancy=floor(($tbtech_count/$ttotal_count)*$p1vacancy);
	echo "<br>btech vacancy".$btech_vacancy;
	$tbarch_vacancy=floor(($tbarch_count/$ttotal_count)*$p1vacancy);
	echo "<br>barch vacancy".$tbarch_vacancy;

$qrysp2c="SELECT * from stud_details sd,class_details cd ,current_class cc,hostel_stud_reg h where sd.admissionno=h.ADMNO and cc.studid=h.ADMNO and cd.classid=cc.classid  and cd.courseid IN('BTECH','BARCH') AND cd.semid=1 and h.priority2a=1 AND h.admn_status='submitted'";
$res_sp2c=mysqli_query($con,$qrysp2c);
	while ($row=mysqli_fetch_assoc($res_sp2c)) 
	{
		if($tbtech_vacancy>0 and $p1vacancy>0)
		{
			echo'hi';
			if ($row['courseid']=='BTECH') 
			{
				$qry_up_tbtech="UPDATE hostel_stud_reg set admn_status='ranked' where ADMNO='".$row['ADMNO']."'";
				$res_up_tbtech=mysqli_query($con,$qry_up_tbtech);
				if ($res_up_tbtech)
				{
					echo '<br>Name='.$row['name'];
					echo"<br>PH=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];
					$rank+=1;
					$tbtech_vacancy-=1;
					$p1vacancy-=1;
				}
				
			}
		}
		if($tbarch_vacancy>0 and $p1vacancy>0)
		{
			echo "hello";
			if ($row['courseid']=='BARCH') 
			{

				$qry_up_tbarch="UPDATE hostel_stud_reg set admn_status='ranked' where ADMNO='".$row['ADMNO']."'";
				$res_up_tbarch=mysqli_query($con,$qry_up_tbarch);
				if ($res_up_tbarch)
				 {
					echo '<br>Name='.$row['name'];
					echo"<br>PH=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];
					$rank+=1;
					$tbarch_vacancy-=1;
					$p1vacancy-=1;
				}
				
			}
		}
		echo '<br>Name='.$row['name'];

	   	
	   }







/*....................................................priority IId...............................................*/

$p1vacancy=$tot_vacancy_LH-$p1vacancy;
//echo '<br> priority 1 vacancy='.$p1vacancy;
$p1vacancy=floor((10/100)*$p1vacancy);
//echo '<br> vacancy='.$p1vacancy;

$qry_sbtech_c="SELECT count(ADMNO) from class_details cd ,current_class cc,hostel_stud_reg h,stud_details s where cc.studid=h.ADMNO and cd.classid=cc.classid and s.admissionno=h.ADMNO and gender='M' and cd.courseid IN('BTECH') AND cd.semid in(3,4) and h.priority2d=1 AND h.admn_status='submitted'";
$res_sbtech_c=mysqli_query($con,$qry_sbtech_c);
while ($row=mysqli_fetch_assoc($res_sbtech_c)) 
	{
		$sbtech_count=$row['count(ADMNO)'];
	//	echo "<br>BTECH count=".$row['count(ADMNO)'];
	}
$qry_sbarch_c="SELECT count(ADMNO) from class_details cd ,current_class cc,hostel_stud_reg h,stud_details s where cc.studid=h.ADMNO and cd.classid=cc.classid and s.admissionno=h.ADMNO and gender='M' and cd.courseid IN('BARCH') AND cd.semid in(3,4) and h.priority2d=1 AND h.admn_status='submitted'";
$res_sbarch_c=mysqli_query($con,$qry_sbarch_c);
while ($row=mysqli_fetch_assoc($res_sbarch_c)) 
	{
		$sbarch_count=$row['count(ADMNO)'];
		//echo "<br>BARCH count=".$row['count(ADMNO)'];
	}

	if ($p1vacancy>0) {
	
	$stotal_count=$sbarch_count+$sbtech_count;

	$sbtech_vacancy=floor(($sbtech_count/$stotal_count)*$p1vacancy);
	//echo "<br>btech vacancy".$sbtech_vacancy;
	$sbarch_vacancy=floor(($tbarch_count/$ttotal_count)*$p1vacancy);
	//echo "<br>barch vacancy".$sbarch_vacancy;

$qrysp2d="SELECT * from stud_details sd,class_details cd ,current_class cc,hostel_stud_reg h,stud_details s where sd.admissionno=h.ADMNO and cc.studid=h.ADMNO and cd.classid=cc.classid and s.admissionno=h.ADMNO and gender='M' and cd.courseid IN('BTECH','BARCH') AND cd.semid in(3,4) and h.priority2d=1 AND h.admn_status='submitted'order BY hos_rank";
$res_sp2d=mysqli_query($con,$qrysp2d);
	while ($row=mysqli_fetch_assoc($res_sp2d)) 
	{
		if($sbtech_vacancy>0 and $p1vacancy>0)
		{
			//echo'hi';
			if ($row['courseid']=='BTECH') 
			{
				$qry_up_sbtech="UPDATE hostel_stud_reg set admn_status='ranked',final_rank='M".$rank."' where ADMNO='".$row['ADMNO']."'";
				$res_up_sbtech=mysqli_query($con,$qry_up_sbtech);
				if ($res_up_sbtech)
				{
					/*echo '<br>Name='.$row['name'];
					echo"<br>PH=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];*/
					$rank+=1;
					$sbtech_vacancy-=1;
					$p1vacancy-=1;
				}
				
			}
		}
		if($sbarch_vacancy>0 and $p1vacancy>0)
		{
			//echo "hello";
			if ($row['courseid']=='BARCH') 
			{

				$qry_up_sbarch="UPDATE hostel_stud_reg set admn_status='ranked',final_rank='M".$rank."' where ADMNO='".$row['ADMNO']."'";
				$res_up_sbarch=mysqli_query($con,$qry_up_sbarch);
				if ($res_up_sbarch)
				 {
					/*echo '<br>Name='.$row['name'];
					echo"<br>PH=".$row['ADMNO'].'&nbsp rank='.$rank.'&nbsp vacancy='.$p1vacancy.'&nbsp &nbsp..... NMAE='.$row['name'];*/
					$rank+=1;
					$sbarch_vacancy-=1;
					$p1vacancy-=1;
				}
				
			}
		
		//echo '<br>Name='.$row['name'];
       }
	   	
	}

}
/*...........................................PRIORITY BASED RANKING................................................*/
 ?>
