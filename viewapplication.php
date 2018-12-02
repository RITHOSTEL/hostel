<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <?php
	include("adminhome.php");

		
	?>	
	

		<div class="container">

			<div >
			<form style="color:red" class="navbar-form navbar-left" method="POST"action="viewapplication.php">
  <div style="color:red" class="input-group" align="left">
    <input style="color:red" type="text" class="form-control" name="txtsearch" placeholder="Search">
    <div style="color:red" class="input-group-btn">
      <button style="color:blue" class="btn btn-default" type="submit" name="btsearch">
        <i style="color:red" class="glyphicon glyphicon-search"></i style="color:mediumblue">
      </button style="color:mediumblue" >
    </div style="color:mediumblue">
  </div style="color:mediumblue">
</form style="color:mediumblue">
</div>
<div>

		<form name="frm1" method ="POST" action="viewapplication.php">
		<div id="rfm"><h3>LIST OF APPLICATIONS</h3></div>
		<div class="col-auto" style=" height:420px;overflow-x: scroll; display:block;overflow-y:scroll; width: 1200px">
		<div class="table-responsive-lg">
<table class="table table-fixed " border=2 align="left" class="tbl" cellpadding="7" cellspacing="2">
	
	<tr>
		<th>Edit</th>
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
		<th>Verify</th>
		<th>Remarks</th>
		
	</tr>
	
	<?php
	session_start();
	if (isset($_SESSION['uname'])) {
		# code...
	}
	include("../connection.php");
$i=1;
$qrys="SELECT * from stud_details sd,class_details cd ,current_class cc,hostel_stud_reg hsr where  cd.classid=cc.classid and hsr.ADMNO=sd.admissionno and cc.studid=sd.admissionno and hsr.admn_status IN('submitted','rejected','resubmitted')";
//print_r($qrys);
$res=mysqli_query($con,$qrys);
$records=mysqli_num_rows($res);
if(isset($_POST['txtsearch']))
{
//	echo "string";
$item_search=$_POST['txtsearch'];
//echo "search=".$item_search;
include("../connection.php");
$qry="SELECT * from hostel_stud_reg hsr 
LEFT JOIN stud_details sd  ON sd.admissionno=hsr.ADMNO
LEFT JOIN current_class cc ON cc.studid=sd.admissionno 
LEFT JOIN class_details cd ON cd.classid=cc.classid where  hsr.ADMNO like'%".$item_search."%' OR sd.admissionno like'%".$item_search."%' OR sd.name like'%".$item_search."%' or cd.courseid like'%".$item_search."%' or cd.semid like'%".$item_search. "%' OR sd.quota like'%".$item_search."%' OR sd.religion like'%".$item_search."%'  or cd.branch_or_specialisation like'%".$item_search."%' OR hsr.admn_status like'%".$item_search."%' and hsr.admn_status in('submitted','rejected','resubmitted')";

$res=mysqli_query($con,$qry);
}
	if($records==0)
		{
			echo '<script>alert("No applications found")</script>';
		}
else{
        while ( $row= mysqli_fetch_assoc($res)) {?>
        <tr>
        	<td><input type="checkbox" class="checkEdit" name="checkEdit" id="checkEdit" ></td>
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
				<td><a href="../approve.php?type='LH' & status='approve' & admno=<?php echo $row['ADMNO'];?> ">Approved/</a>
					<a href="../reject.php?type='LH'?status='reject' & admno=<?php echo $row['ADMNO'];?>">Rejected/</a></td>
					<td><textarea name="txtRemarks" class="txtRemarks" id="txtRemarks" disabled=><?php echo $row['remarks']; ?></textarea>
						<input type="submit" name="btSub"></td>
				</tr>
       

       <?php }
	
}


?>
</table>
	</div>
</div>

</form>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){


		$(document).on('click', '.checkEdit', function()  {

// $('.txtRemarks').prop('disabled', true);
if($(this).is(":checked")) {
	$(this).closest('tr').find('.txtRemarks').prop('disabled', false);
} else {
	$(this).closest('tr').find('.txtRemarks').prop('disabled', true);
}



		});
	});
</script>



</body>
</html>
