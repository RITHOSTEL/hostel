<?php
session_start();

if (!isset($_SESSION['uname'])) 
{
  
 echo "NO SESSION VARIABLE";
 }
 $uname=$_SESSION['uname'];
 
$con=mysqli_connect('localhost','root','');
if (!$con)
{
	echo "</br> Error occured!";
	
}
$db=mysqli_select_db($con,"rithostel");
if (!$db)
{
	echo "</br> Error occured!";
	
}
$qrys="select * from stud_details sd,class_details cd ,current_class cc where sd.admissionno='".$uname."' and cc.studid='".$uname."' and cd.classid=cc.classid";
//print_r($qrys);
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
        $address=$row['address'];
        $gender=$row['gender'];
        $dob=$row['dob'];
        $brnch=$row['courseid'];
        $rank=$row['rank'];
        $sem=$row['semid'];
        $rank=$row['rank'];
        $mob=$row['mobile_phno'];

        }
	
}
?>


<html>
<head >


</head>
<body id="homebody">
	<?php
	include("../header.html");
		
	?>
	<div class="container">
		
	<form name="frm1" method ="POST" action="applicationsave.php">
		<div id="rfm"><h3>APPLICATION FORM</h3></div>
		<div class="table-responsive-lg">
<table class="table table-striped" border=1 align="left" class="tbl" cellpadding="7" cellspacing="2">
	
 
<tr>
		<td>Admission No</td>
		<td ><?php echo $admn ?> </td>
	</tr>
<TR>
 	<td>Name</td>
 <td>
 	 <?php echo $name  ?>
  
</td>
</TR>
<tr>
	<td>Permanent address as in Aadhaar card</br>(attach copy of aadhar card)</br></td>
	<td><textarea name="txtaddr" rows="4" cols="35"><?php echo $address ?> </textarea></br></br>
		mob:<input type="text" name="mob_stu" value=<?php echo $mob ?>></td></tr>
		<tr><td>Address of Parent/Guardian</br>
			<td><textarea name="txtpaddress" rows="4" cols="35"><?php echo $address ?> </textarea>
			</br></br>	mob:<input type="text" name="mob_p"></td>
		
</tr>
<tr>
	<td>Gender</td>
	<td><input type="radio" name="gender" <?php if($gender=="M"){ echo "checked";}?>  value="M">Male &nbsp<input type="radio" name="gender" <?php if($gender=="F"){ echo "checked";}?> value="F" >Female &nbsp<input type="radio" name="gender"  value="others">Others</td>
	
</tr>
<tr><td>Date of birth</td>
<td><input  type="text" name="dob" placeholder="dd/mm/yyyy" min="01-01-1990" value=<?php echo $dob ?> disabled></td></tr>
	<tr>
		<td>Semester</td>
		<td><select name="semester">
		<option>Select one option..</option>
		<option value="1" <?php if($sem==1) echo 'selected="selected"'; ?>>1</option>
		<option value="2" <?php if($sem==2) echo 'selected="selected"'; ?>>2</option>
		<option value="3" <?php if($sem==3) echo 'selected="selected"'; ?>>3</option>
		<option value="4" <?php if($sem==4) echo 'selected="selected"'; ?>>4</option>
		<option value="5" <?php if($sem==5) echo 'selected="selected"'; ?>>5</option>
		<option value="6" <?php if($sem==6) echo 'selected="selected"'; ?>>6</option>
		<option value="7" <?php if($sem==7) echo 'selected="selected"'; ?>>7</option>
		<option value="8" <?php if($sem==8) echo 'selected="selected"'; ?>>8</option>

	</select></td>
	
	<tr>
		<td>Branch</td>
		<td><select name="brnch">
		<option value="1">Select one option..</option>
		<option value="CIVIL" <?php if($brnch=="CIVIL") echo 'selected="selected"'; ?> >Civil</option>
		<option value="ELECTRICAL AND ELECTRONICS" <?php if($brnch=="ELECTRICAL AND ELECTRONICS") echo 'selected="selected"'; ?> >EEE</option>
		<option value="ELECTRONICS AND COMMUNICATION" <?php if($brnch=="ELECTRONICS AND COMMUNICATION") echo 'selected="selected"'; ?>>EC</option>
		<option value="COMPUTER SCIENCE" <?php if($brnch=="COMPUTER SCIENCE") echo 'selected="selected"'; ?>>CS</option>
		<option value="	MECHANICAL" <?php if($brnch=="	MECHANICAL") echo 'selected="selected"'; ?>>MECH</option>
		<option value="MCA" <?php if($brnch=="MCA") echo 'selected="selected"'; ?>>MCA</option>
		
		
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
	<td><input type="checkbox" name="prior[]" value="prior1"></td></tr>
		<tr><td>Priority II(a)</td><td><input type="checkbox" name="prior[]" value="prior2a"></td></tr>
	<tr><td>Priority II(d)</td><td><input type="checkbox" name="prior[]" value="prior2d"></td></tr>
	<tr><td>Priority II(e)</td><td><input type="checkbox" name="prior[]" value="prior2e"></td></tr>
	
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
	<td><input type="text" name="txtrank" value=<?php echo $rank ?>></td>
</tr>

<tr align="center" rowspan="5">
	<br><td  colspan="3" ><input type="submit" name="btsub" value="submit">
</td>
<td colspan="3"><input type="Reset" name="btReset" value="Reset"></td>
	</tr></br>
</table>
</div>
</form>
</div>
</body>
</html>











