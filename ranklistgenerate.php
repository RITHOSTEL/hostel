
 
	<?php 
	
	include("adminhome.php");

		
	
include("../connection.php");

/*DISTANCE CALCULATION..........................*/
$qrymin_d="select min(distance) from hostel_stud_reg,stud_details sd where sd.admissionno=hostel_stud_reg.ADMNO";
$resmin_d=mysqli_query($con,$qrymin_d);
while ( $row= mysqli_fetch_assoc($resmin_d)) {
$x_min=$row['min(distance)'];

}
echo "<br>min distance=".$x_min;

$qrymax_d="select max(distance) from hostel_stud_reg,stud_details sd where sd.admissionno=hostel_stud_reg.ADMNO";
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
$qrymin_rank="select min(rank) from stud_details sd,hostel_stud_reg where sd.admissionno=hostel_stud_reg.ADMNO";
$resmin_rank=mysqli_query($con,$qrymin_rank);
while ( $row= mysqli_fetch_assoc($resmin_rank)) {
$x_min_r=$row['min(rank)'];

}
echo "<br>min rank=".$x_min_r;

$qrymax_rank="select max(rank) from stud_details sd,hostel_stud_reg where sd.admissionno=hostel_stud_reg.ADMNO";
$resmax_rank=mysqli_query($con,$qrymax_rank);
while ( $row= mysqli_fetch_assoc($resmax_rank)) {
$x_max_r=$row['max(rank)'];}
echo "<br>max rank=".$x_max_r;

$y_min=1;
$y_max=50;
$y_min_r=1;
$y_max_r=50;
//doubt on the condition
/*$qry_rank="select * from stud_details sd,hostel_stud_reg where sd.admissionno=hostel_stud_reg.ADMNO and admn_status='submitted' or admn_status='allocated'" ;*/
$qry_rank="select * from stud_details sd,hostel_stud_reg where sd.admissionno=hostel_stud_reg.ADMNO " ;
$res_rank=mysqli_query($con,$qry_rank);
 while ( $row= mysqli_fetch_assoc($res_rank)) {
	
		 $admnn= $row['ADMNO'];
		 echo '<br> rank='.$row['rank'].'<br>';
			/*	<td> <?php echo $row['admissionno'];?></td>
			 
				<td> <?php echo $row['name'];?></td>
			 
				<td> <?php echo $row['distance'];?></td>
				<td> <?php echo $row['rank'];?></td>
			  
	<?php*/
	$y1=1+((($row['distance']-$x_min)*49)/($x_max-$x_min));
	
	$y1_r=1+((($row['rank']-$x_max_r)*49)/($x_min_r-$x_max_r));
	 
	 /*$y1=$y_min+((($row['distance']-$x_min)*($y_max-$y_min))/($x_max-$x_min));

     $y1_r=$y_min_r+((($row['rank']-$x_max_r)*($y_max_r-$y_min_r))/($x_min_r-$x_max_r));*/

/*<td><?php echo $y1;?></td> */
 echo '<br>'.$y1_r;
 
  $hos_rank=$y1+$y1_r;?></td> <?php $qry_update="update hostel_stud_reg set hos_rank='".$hos_rank."',distance_metric='".$y1."',rank_metric='".$y1_r."' where ADMNO='".$admnn."'" ;
print_r($qry_update);
$res_update=mysqli_query($con,$qry_update);
if ($res_update) {
	
	echo "<br>";
}
else
{
	//echo "udation failed";
}
 } 
 mysqli_close($con);
 ?>
