<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <?php
	include("adminhome.php");

		
	?>		 

	<a href="ranklistgenerate.php"></a>
	<a href="priority1.php"></a>
		<div class="container">
		<form name="frm1" method ="POST" action="rankpdf.php">
		<div id="rfm"><h3>RANK LIST</h3></div>
		<div class="table-responsive-lg">
<table class="table table-striped" border=2 align="left" class="tbl" cellpadding="7" cellspacing="2">
	<tr>
		<th>SI.</th>
		<th>Admission No</th>
		<th>Name</th>
		<th>Distance</th>
		<th>Distance metric</th>
		<th>Entrance Rank</th>
		<th>Merit Metric</th>
		<th>Distance & merit metric</th>
		<th>Admission status</th>
		<th>Final rank</th>
	</tr>
	<?php
	include("../connection.php");
	$qry_rank="select * from hostel_stud_reg hsr,stud_details sd where sd.admissionno=hsr.ADMNO order by hos_rank desc";
	//print_r($qry_rank);
	/*$qry_rank="select distinct * from hostel_stud_reg hsr,hostel_student_details hsd where (select name from stud_details sd where sd.admissionno=hsr.ADMNO)and hsr.admn_status in ('submitted','allocated') or hsd.ADMNO=hsr.ADMNO";*/
	/*"select * from hostel_student_details,hostel_stud_reg,stud_details where ";*/
$res_rank=mysqli_query($con,$qry_rank);
$rec=mysqli_num_rows($res_rank);
if ($rec==0) {
	echo '<h3>No records found</h3>';
}
$i=1;
while ( $row= mysqli_fetch_assoc($res_rank)) {?>
	<tr>
				<td><?php echo $i++;?></td>
				<td> <?php echo $row['ADMNO'];?></td>
			 
				<td> <?php echo $row['name'];?></td>
			 
				<td> <?php echo $row['distance'];?></td>
				<td> <?php echo $row['distance_metric'];?></td>
				<td> <?php echo $row['rank'];?></td>
				<td><?php echo $row['rank_metric'];?></td>
				<td> <?php echo $row['hos_rank'];?></td>
				<td> <?php echo $row['admn_status'];?></td>
				<td><?php echo $row['final_rank'];?></td>
			</tr>
			<?php }
			
			mysqli_close($con);
 			?>
		</table>
	</div>
</form>
</div>
</body>
</html>