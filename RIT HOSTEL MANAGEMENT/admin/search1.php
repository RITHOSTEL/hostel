<script type="text/javascript"><?php
//session_start();
//$_SESSION['admin']=$_POST['txtadmnno'];
if(isset($_POST['txtadmnno']))
$admn=$_POST['txtadmnno'];

$con=mysqli_connect('localhost','root','');
if (!$con) {
	echo "Error occured...Cannot be connected";
	# code...
}
$db=mysqli_select_db($con,'rithostel');
if (!$db) {
	echo "Error occured...Cannot be connected";
	# code...
}
$qry="select * from stud_details sd,hostel_stud_reg sh where sh.ADMNO like '%{$admn}%' and sd.admissionno like '%{$admn}%' and sh.ADMNO=sd.admissionno";
print_r($qry);
$res=mysqli_query($con,$qry);
$records=mysqli_num_rows($res);
	if($records==0)
		{
			echo '<script type=text/javascript> alert("No such student")</script>';
		}?>
<table border="1">
<tr>
			<td>Admn No.</td>
			<td>name</td>
			<td>dob</td>
			<td>gender</td>
			<td>relegion</td>
			<td>year of admission</td>

		</tr>
		
	
	<?php
 while ( $row= mysqli_fetch_assoc($res))
{
?>
<tr></tr>
<tr>
	<td><?php echo $row['ADMNO']?></td>
	<td><?php echo $row['name']?></td>
	<td><?php echo $row['dob']?></td>
	<td><?php echo $row['gender']?></td>
	<td><?php echo $row['religion']?></td>
	<td><?php echo $row['year_of_admission']?></td>
	<br>
	<!--<td><?php echo $row['email']?></td>
	<td><?php echo $row['mobile_phno']?></td>
	<td><?php echo $row['land_phno']?></td>
	<td><?php echo $row['address']?></td>
	<td><?php echo $row['rollno']?></td>
	<td><?php echo $row['rank']?></td>

	<td><?php echo $row['quota']?></td>
	
	<td><?php echo $row['dob']?></td>
	<td><?php echo $row['gender']?></td>
	<td><?php echo $row['religion']?></td>
	<td><?php echo $row['year_of_admission']?></td>
	<td><?php echo $row['email']?></td>
	<td><?php echo $row['mobile_phno']?></td>
	<td><?php echo $row['land_phno']?></td>
	<td><?php echo $row['address']?></td>
	<td><?php echo $row['rollno']?></td>
	<td><?php echo $row['rank']?></td>-->
</tr>

<?php
}
?>
</table>
</script>