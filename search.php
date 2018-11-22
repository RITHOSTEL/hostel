
<?php
session_start();
include("adminhome.php");
//$_SESSION['admin']=$_POST['txtadmnno'];
if(isset($_POST['txtSearch']))
$item_search=$_POST['txtSearch'];

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
$qrys=" and hsr.admn_status='submitted'";
$qry="select * from stud_details sd,class_details cd ,current_class cc,hostel_stud_reg hsr where cc.studid=sd.admissionno and cd.classid=cc.classid and cc.studid=hsr.ADMNO and hsr.ADMNO=sd.admissionno or hsr.ADMNO like'%".$item_search."%' or sd.admissionno LIKE '%".$item_search."%' OR cd.courseid LIKE '%".$item_search."%'";
print_r($qry);
$res=mysqli_query($con,$qry);
/*$qry="select * from stud_details sd5,hostel_stud_reg sh where sh.ADMNO='".$admn."' and sd.admissionno='".$admn."'";
$res=mysqli_query($con,$qry)*/?>

<table border="3">
<tr>
			<td>Admn No.</td>
			<td>Name</td>
			<td>Dob</td>
			<td>Gender</td>
			<td>Relegion</td>
			<td>Student mob</td>
			<td>Land phno</td>
			<td>Parent mob</td>
			<td>Address</td>
			<td>Parent Address</td>
			<td>Category</td>
			<td>Year of admission</td>
			<td>Search</td>
			<td>Distance</td>
			<td>Income</td>
			<td>Disciplinary Actions</td>

		</tr>
		
	
	<?php
while($row=mysqli_fetch_array($res))
{
?>
<tr>
	<td><?php echo $row['ADMNO']?></td>
	<td><?php echo $row['name']?></td>
	<td><?php echo $row['dob']?></td>
	<td><?php echo $row['gender']?></td>
	<td><?php echo $row['email']?></td>
	<td><?php echo $row['mobile_phno']?></td>
	<td><?php echo $row['land_phno']?></td>
	<td><?php echo $row['parent_mob']?></td>
	<td><?php echo $row['address']?></td>
	<td><?php echo $row['parent_address']?></td>
	
	<td><?php echo $row['quota']?></td>
	<td><?php echo $row['year_of_admission']?></td>
	<td><?php echo $row['sgpa']?></td>
	<td><?php echo $row['distance']?></td>
	
	<td><?php echo $row['income']?></td>
	<td><?php echo $row['disci_action']?></td>
</tr>
</table>
<?php
}
?>
