
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <?php
	include("../header.html");
		
	?>
		<div class="container">
		<form name="frm1" method ="POST" action="rankpdf.php">
		<div id="rfm"><h3>RANK LIST</h3></div>
		<div class="table-responsive-lg">
<table class="table table-striped" border=1 align="left" class="tbl" cellpadding="7" cellspacing="2">
	<tr>
		<th>Admission No</th>
		<th>Name</th>
		<th>Original Distance</th>
		<th>Original Rank</th>
		<th>Ranked distance</th>
		<th>Ranked rank</th>
		<th>Combined Rank</th>
	</tr>
	<?php 
include("../connection.php");
/*DISTANCE CALCULATION..........................*/
$qrymin_d="select min(distance) from hostel_stud_reg,stud_details sd where sd.admissionno=hostel_stud_reg.ADMNO";
$resmin_d=mysqli_query($con,$qrymin_d);
while ( $row= mysqli_fetch_assoc($resmin_d)) {
$x_min=$row['min(distance)'];
}

$qrymax_d="select max(distance) from hostel_stud_reg,stud_details sd where sd.admissionno=hostel_stud_reg.ADMNO";
$resmax_d=mysqli_query($con,$qrymax_d);
while ( $row= mysqli_fetch_assoc($resmax_d)) {
$x_max=$row['max(distance)'];}


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

$qrymax_rank="select max(rank) from stud_details sd,hostel_stud_reg where sd.admissionno=hostel_stud_reg.ADMNO";
$resmax_rank=mysqli_query($con,$qrymax_rank);
while ( $row= mysqli_fetch_assoc($resmax_rank)) {
$x_max_r=$row['max(rank)'];}

$y_min=1;
$y_max=50;
$y_min_r=50;
$y_max_r=1;
//doubt on the condition
$qry_rank="select * from stud_details sd,hostel_stud_reg where sd.admissionno=hostel_stud_reg.ADMNO and admn_status='submitted '" ;
$res_rank=mysqli_query($con,$qry_rank);
while ( $row= mysqli_fetch_assoc($res_rank)) {?>
	<tr>
				<td> <?php echo $row['admissionno'];?></td>
			 
				<td> <?php echo $row['name'];?></td>
			 
				<td> <?php echo $row['distance'];?></td>
				<td> <?php echo $row['rank'];?></td>
			  
	<?php
	 $y1=$y_min+((($row['distance']-$x_min)*($y_max-$y_min))/($x_max-$x_min));

     $y1_r=$y_min_r+((($row['rank']-$x_max_r)*($y_max_r-$y_min_r))/($x_min_r-$x_max_r));
?>
<td><?php echo $y1;?></td> 
<td><?php echo $y1_r;?></td> 
<td><?php echo $y1+$y1_r;?></td> 
<?php } ?>
</tr>     
</table>
</div>
</form>
 </body>
 </html>