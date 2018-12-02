<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <?php
	include("wardenhome.php");

		
	?>		 

		<div class="container">
		<table>
			<tr>
				<td>
				<form name="frm1" method ="POST" action="wrankdisplayLH.php">
					&nbsp &nbsp &nbsp<input type="submit" name="subrankgenerate" value="Rank list for LH" >
				</form>
				</td>
				<td>
				<form name="frm2" method ="POST" action="wrankdisplayMH.php">
					&nbsp &nbsp &nbsp<input type="submit" name="subrankgenerateMH" value="Rank list for MH" >
				</form>
				</td>
				<td>
				<form name="frm3" method ="POST" action="wrankdisplayPG.php">
					&nbsp &nbsp &nbsp<input type="submit" name="subrankgeneratePG" value="Rank list for PG" >
				</form>
				</td>
				</tr>
		</table>
		<div id="rfm"><h3>RANK LIST</h3></div>
		<div class="col-auto" style=" height:300px;overflow-x: scroll; display:block;overflow-y:scroll; ">
		<div class="table-responsive-lg">
			
<table class="table table-fixed" border=2 align="left" class="tbl" cellpadding="7" cellspacing="2" >
	<thead class="thead-dark">
		
	<tr>
		
		<th>SI.</th>
		<th>Admission No</th>
		<th>Name</th>

		<th>Course</th>
		<th>Branch</th>
		<th>Semester</th>
		

		<th>Distance</th>
		<th>Distance metric</th>
		<th>Entrance Rank</th>
		<th>Merit Metric</th>
		<th>Distance & merit metric</th>
		<th>Admission status</th>
		<th>Rank</th>
		
	</tr>
	</thead>
	<?php
	include("../connection.php");
	/*.......status have to be check whether ranked*/
$qry_rank="SELECT * from hostel_stud_reg hsr 
LEFT JOIN stud_details sd  ON sd.admissionno=hsr.ADMNO
LEFT JOIN current_class cc ON cc.studid=sd.admissionno 
LEFT JOIN class_details cd ON cd.classid=cc.classid where hsr.admn_status in ('ranked') AND  cd.courseid in('MTECH','MCA') and sd.gender='M' order by hsr.final_rank ";




/*
	$qry_rank="select * from hostel_stud_reg hsr,stud_details sd where sd.admissionno=hsr.ADMNO and hsr.admn_status in ('submitted','ranked') and gender='F' order by admn_status asc ";*/
	//print_r($qry_rank);
	/*$qry_rank="select distinct * from hostel_stud_reg hsr,hostel_student_details hsd where (select name from stud_details sd where sd.admissionno=hsr.ADMNO)and hsr.admn_status in ('submitted','allocated') or hsd.ADMNO=hsr.ADMNO";*/
	/*"select * from hostel_student_details,hostel_stud_reg,stud_details where ";*/
$res_rank=mysqli_query($con,$qry_rank);
$rec=mysqli_num_rows($res_rank);
if ($rec==0) {
	echo '<h3>No records found</h3>';
}
$i=1;
?>
<tr>
	

<?php
while ( $row= mysqli_fetch_assoc($res_rank)) {?>
	<tr>
		
				<td><?php echo $i++;?></td>
				<td> <?php echo $row['ADMNO'];?></td>
			 
				<td> <?php echo $row['name'];?></td>
				<td><?php echo $row['courseid']?></td>
				<td><?php echo $row['branch_or_specialisation']?></td>
				<td><?php echo $row['semid']?></td>
			 
				<td> <?php echo $row['distance'];?></td>
				<td> <?php echo $row['distance_metric'];?></td>
				<td> <?php echo $row['Entrance_rank'];?></td>
				<td><?php echo $row['rank_metric'];?></td>
				<td> <?php echo $row['hos_rank'];?></td>
				<td> <?php echo $row['admn_status'];?></td>
				<td> <?php echo $row['final_rank'];?></td>
				<td><a href="approved.php?type='LH' & status='approve' & admno=<?php echo $row['ADMNO'];?> ">Approved/</a>
					<a href="reject.php?type='LH'?status='reject' & admno=<?php echo $row['ADMNO'];?>">Rejected/</a></td>
				
			</tr>
			<?php }
			
			mysqli_close($con);
 			?>
 			</tbody>
 			</tr>
		</table>
	
</div>
</div>
</form>
</div>
</body>
</html>