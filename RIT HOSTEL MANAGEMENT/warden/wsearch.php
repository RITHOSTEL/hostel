<!--
<html>
<head >
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<script type="text/javascript" src="bootstrap.js"></script>
	<title>Rajiv Gandhi Institute of Technology</title>
	<h1>RIT HOSTEL SOFT</h1>
<script>
	function showResult(str) {
		// body...
	}
</script>
</head>
<body id="homebody">
	<div id="rfm">Student search</div>
</br></br></br>

	<form name="frm1" method ="POST" action="wsearch.php">
	<table border="2">
		<tr><td>Enter Admn no.</td>
			<td><input type="text" name="txtadmnno" onkeyup="showResult(this.value)"></td>
			<td><input type="Submit" name="sadm" value="Search" ></td></tr>
			<tr><td>Enter name of the student</td>
				
			<td><input type="text" name="txtname"></td>
			<td><input type="Submit" name="sname" value="Search"></td></tr>
		<tr><td>select the category</td>
			<td><select name="scat">
				<option value="sc">sc/st</option>
				<option value=obc>OBC</option>
				<option value="gen">General</option></td>
				<td><input type="Submit" name="scat" value="Search"></td>
				<tr><td>select the branch</td>
			<td><select name="scat">
				<option value="mca">mca</option>
				<option value="eee">EEE</option>
				<option value="civil">civil</option>
			</select></td><td><input type="Submit" name="sbrnch" value="Search"></td></tr>
			</table>
		
</form>
</body>
</html>


-->

<?php
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
$qry="select * from stud_details sd,hostel_stud_reg sh where sh.ADMNO='".$admn."' and sd.admissionno='".$admn."'";
$res=mysqli_query($con,$qry);
/*$qry="select * from stud_details sd5,hostel_stud_reg sh where sh.ADMNO='".$admn."' and sd.admissionno='".$admn."'";
$res=mysqli_query($con,$qry)*/?>

<table border="1">
<tr>
			<td>Admn No.</td>
			<td>name</td>
			<td>dob</td>
			<td>gender</td>
			<td>relegion</td>
			<td>Student mob</td>
			<td>Land phno</td>
			<td>parent mob</td>
			<td>Address</td>
			<td>Parent Address</td>
			<td>Category</td>
			<td>year of admission</td>
			<td>sgpa</td>
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
