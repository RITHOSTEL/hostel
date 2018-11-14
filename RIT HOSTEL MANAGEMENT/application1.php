<?php

 
$con=mysqli_connect('localhost','root','');
if ($con)
{
	echo "</br> mysql connected";
	
}
$db=mysqli_select_db($con,"rithostel");
if ($db)
{
	echo "</br> db connected";
	
}
$qrys="select * from stud_details where admissionno='".$uname."'";
print_r("select * from stud_details where admissionno='".$uname."'");
$result=mysqli_query($con,$qrys);
$records=mysqli_num_rows($result);
	if($records==0)
		{
			echo 'alert("You are not yet registered in RIT SOFT")';
		}
else{
        while ( $row= mysqli_fetch_assoc($result)) {
        $admn=$row['admissionno'];
        $name=$row['name'];
        $admn=$row['address'];
        $name=$row['gender'];
        $dob=$row['dob'];
        $brnch=$row['branch_or_specialisation'];
        $rank=$row['rank'];
        $name=$row['gender'];

        }
	
}
?>


<html>
<head >
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<title>Rajiv Gandhi Institute of Technology</title>
	<h1>RIT HOST SOFT</h1>

</head>
<body id="homebody">
	<div class= "reg">
	<form name="frm1" method ="POST" action="application.php">
		<div id="rfm">APPLICATION FORM</div>
<table border=0 align="left" class="tbl" cellpadding="7" cellspacing="2">
	
 
<tr>
		<td>Admission No</td>
		<td ><input type="text" name="txtadm" value=<?php echo $admn; ?> ></td>
	</tr>
<TR>
 	<td>Name</td>
 <td>
  <input type=text name=txtname />
</td>
</TR>
<tr>
	<td>Permanent address as in Aadhaar card</br>(attach copy of aadhar card)</br></td>
	<td><textarea name="txtaddr" rows="4" cols="35"></textarea></br></br>
		mob:<input type="text" name="mob_stu"></td></tr>
		<tr><td>Address of Parent/Guardian</br>
			<td><textarea name="txtpaddress" rows="4" cols="35"></textarea>
			</br></br>	mob:<input type="text" name="mob_p"></td>
		
</tr>
<tr>
	<td>Gender</td>
	<td><input type="radio" name="gender" value="male">Male &nbsp<input type="radio" name="gender" value="female">Female &nbsp<input type="radio" name="gender" value="others">Others</td>
</tr>
<tr><td>Date of birth</td>
<td><input  type="text" name="dob" placeholder="dd/mm/yyyy" min="01-01-1990" ></td></tr>
	<tr>
		<td>Semester</td>
		<td><select name="semester">
		<option>Select one option..</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4.</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>

	</select></td>
	
	<tr>
		<td>Branch</td>
		<td><select name="brnch">
		<option>Select one option..</option>
		<option>Civil</option>
		<option>EEE</option>
		<option>EC</option>
		<option>CS</option>
		<option>MECH</option>
		<option>MCA</option>
		<option>M.Tech</option>
		
	</select></td>

	</tr>
	

<tr>
	<td>Priority</BR>Priority I-SC/ST/PH/BPL/Other states/Central govt nominees</br>
		Priority II(a)-First year B.tech/B.Arch
	</br>Priority II(d)-Lateral Entry students</br>Priority II(e)-First year PG students
</br>(*priority I student must attach the copy of proof)</td>
	<td>
	<table border="1">
		<tr>
		<th>Priorities</th><th>Please tick</th></tr>
			<tr>
	<TD>Priority I</TD>
	<td><input type="checkbox" name="priority" value="priorityI"></td></tr>
		<tr><td>Priority II(a)</td><td><input type="checkbox" name="priority" value ="priorityIIa"></td></tr>
	<tr><td>Priority II(d)</td><td><input type="checkbox" name="Priority" value ="priorityIId"></td></tr>
	<tr><td>Priority II(e)</td><td><input type="checkbox" name="priority" value="priorityIIe"></td></tr>
	
</table>
	</td>
</tr>
<tr>
	<td>Family annual Income (Only for BPL category)</br>(*valid income certificate should be attached)</td>
	<td><input type="text" name="txtincome"></td>
</tr>
<tr>
	<td>Minimum Google distance from the post</br>office in the address specified in the AAdhaar</br>card to RIT pampady</td>
	<td><input type="text" name="txtdist"></td>
</tr>
<tr>
</tr>
	<td>Rank in entrance Exam</td>
	<td><input type="text" name="txtrank"></td>
</tr>

<tr align="center" rowspan="5">
	<br><td  colspan="3" ><input type="submit" name="btsub" value="submit">
</td>
<td colspan="3"><input type="Reset" name="btReset" value="Reset"></td>
	</tr></br>
</table>
</form>
</div>
</body>
</html>











<?php
/*
$sem=$_POST['semester'];
$dist=$_POST['txtdist'];
$income=$_POST['txtincome'];
$p_address=$_POST['txtpaddress'];
$p_mob=$_POST['mob_p'];
$priority=$_REQUEST['priority'];



$qry="insert into hostel_login(username,password,usertype)values('".$uname."','".$pass."','student')";
print_r($qry);
$res=mysqli_query($con,$qry);
$qryin="insert into hostel_stud_reg(username,password,usertype)values('".$uname."','registered',".$sem."','".$income."','".$p_address."','".$p_mob."','".$priority."')";
if ($res)
{
	//echo "alert('Succefully registered')";
	
	echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'registration.html\';</script>';
	
	//echo 'Redirect("registration.html")'.'alert("Succefully registered")';
	
}
else
	{
	echo "</br> Registration failed";
	
}

mysqli_close($con);*/
?>