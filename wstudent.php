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
			<form name="frm1" method="post" action="wstudent.php">
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
		
		
	</td>
	<TD>&nbsp&nbsp&nbsp<input type="submit" name="subhosname" value="Submit"></TD>
</tr>
		
		

<!--<label  name="txtVold" >vacancy in <?php //echo $_POST['hos_name'];?> is <?php //echo $vcancyold;?></label>-->
<?php
if(isset($_POST['hos_name']))
{?>
</table></form>
<div id="rfm"><h2>HOSTELLER LIST</h2></div>
		<label><h4><?php echo $_POST['hos_name'];?></h4></label>
		
		<div class="col-auto" style=" height:300px;overflow-x: scroll; display:block;overflow-y:scroll; ">
		<div class="table-responsive-lg">
			
<table class="table table-fixed" border=2 align="left" class="tbl" cellpadding="7" cellspacing="2" >
	<thead class="thead-dark">
		
	<tr>
		
		<th>SI.</th>
		<th>Admission No</th>
		<th>Name</th>

		<th>Hostel Id</th>
		<th>Hostel Name</th>

		<th>Course</th>
		<th>Branch</th>
		<th>Semester</th>
		

		<th>Distance</th>
		<th>Distance metric</th>
		<th>Entrance Rank</th>
		<th>Merit Metric</th>
		<th>Distance & merit metric</th>
		<th>Admission status</th>
		<th>Verify</th>
		
	</tr>
	</thead>
	<?php
	include("../connection.php");
	/*.......status have to be check whether ranked*/
$qry_rank="SELECT * from hostel_stud_reg hsr 
LEFT JOIN stud_details sd  ON sd.admissionno=hsr.ADMNO
LEFT JOIN current_class cc ON cc.studid=sd.admissionno 
LEFT JOIN class_details cd ON cd.classid=cc.classid 
LEFT JOIN hostel_student_details hsd ON hsd.ADMNO=hsr.ADMNO
LEFT JOIN hostel_rit hr ON hr.hosid=hsd.hos_id
 where hsr.admn_status in ('allocated') AND hr.hosname='".$_POST['hos_name']."'";




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

				<td><?php echo $row['hos_id']?></td>
				<td><?php echo $row['HOSNAME']?></td>

				<td><?php echo $row['courseid']?></td>
				<td><?php echo $row['branch_or_specialisation']?></td>
				<td><?php echo $row['semid']?></td>
			 
				<td> <?php echo $row['distance'];?></td>
				<td> <?php echo $row['distance_metric'];?></td>
				<td> <?php echo $row['Entrance_rank'];?></td>
				<td><?php echo $row['rank_metric'];?></td>
				<td> <?php echo $row['hos_rank'];?></td>
				<td> <?php echo $row['admn_status'];?></td>
				<td>
					<a href="reject.php?type='LH'?status='reject' & admno=<?php echo $row['ADMNO'];?>">Delete</a></td>
				
			</tr>
			<?php }
			
			mysqli_close($con);
 			?>
 			</tbody>
 			</tr>
		</table>


		<?php
	}
	?>
	
</div>
</div>
</form>
</div>
</body>
</html>