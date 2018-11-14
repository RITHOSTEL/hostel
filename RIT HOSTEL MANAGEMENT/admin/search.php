
<html>
<head >
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<script type="text/javascript" src="bootstrap.js"></script>
	<script type="text/javascript" href="searchall.php"></script>
	<title>Rajiv Gandhi Institute of Technology</title>
	<h1>RIT HOSTEL SOFT</h1>

</head>
<body id="homebody">
	<div id="rfm">Student search</div>
</br></br></br>

	<form name="frm1" method ="POST" action="Search.php">
	<table border="2">
		<tr><td>Enter Admn no.</td>
			<td><input type="search" name="txtadmnno"  id="txtadmno" onkeyup="search(txtadmno.value)"></td>
			<td><input type="Submit" name="sadm" value="Search"></td></tr>
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




