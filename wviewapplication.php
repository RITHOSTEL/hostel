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
		<form name="frm1" method ="POST" action="rankpdf.php">
		<div id="rfm"><h3>LIST OF APPLICATIONS</h3></div>
		<div class="col-auto" style=" height:300px;overflow-x: scroll; display:block;overflow-y:scroll; ">
		<div class="table-responsive-lg">
<table class="table table-fixed " border=2 align="left" class="tbl" cellpadding="7" cellspacing="2" >
	
	<tr>
		<th>SI.</th>
		<th>Admission No</th>
		<th>Name</th>
		<th>Gender</th>
		<th>Course</th>
		<th>Branch</th>
		<th>Semester</th>
		<th>Permenant Address</th>
		<th>Parent Address</th>
		<th>Student Mob</th>
		<th>Parent mob</th>
		<th>priority I</th>
		<th>priority IIa</th>
		<th>priority IId</th>
		<th>priority IIe</th>
		<th>Income</th>
		<th>Distance</th>
		<th>Entrance Rank</th>
		<th>Admission status</th>
		
	</tr>
	
	<?php
	include("../connection.php");
$i=1;
$qrys="select * from stud_details sd,class_details cd ,current_class cc,hostel_stud_reg hsr where  cd.classid=cc.classid and hsr.ADMNO=sd.admissionno and cc.studid=sd.admissionno and hsr.admn_status='submitted'";
//print_r($qrys);
$result=mysqli_query($con,$qrys);
$records=mysqli_num_rows($result);
	if($records==0)
		{
			echo '<script>alert("No applications found yet")</script>';
		}
else{
        while ( $row= mysqli_fetch_assoc($result)) {?>
        <tr>
        <td><?php echo $i++;?></td>
				<td> <?php echo $row['ADMNO'];?></td>
				<td> <?php echo $row['name'];?></td>
			 
				<td> <?php echo $row['gender'];?></td>
				<td> <?php echo $row['courseid'];?></td>
				<td> <?php echo $row['branch_or_specialisation'];?></td>
				<td><?php echo $row['semid'];?></td>
				<td> <?php echo $row['address'];?></td>
				<td> <?php echo $row['parent_address'];?></td>
				<td> <?php echo $row['mobile_phno'];?></td>
				<td> <?php echo $row['parent_mob'];?></td>
				<td><?php echo $row['priority1'];?></td>
				<td><?php echo $row['priority2a'];?></td>
				<td><?php echo $row['priority2d'];?></td>
				<td><?php echo $row['priority2e'];?></td>
				<td><?php echo $row['income'];?></td>

				<td> <?php echo $row['distance'];?></td>
				<td> <?php echo $row['Entrance_rank'];?></td>

				<td> <?php echo $row['admn_status'];?></td>
				</tr>
       

       <?php }
	
}


?>
</table>
	</div>
</div>

</form>
</div>
</body>
</html>

