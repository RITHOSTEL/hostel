<?php
$msg='';
$sex="";
session_start();

if (!isset($_SESSION['uname'])) 
{
  
  //echo '<script type="text/javascript">alert("You are out of session..Please login again");</script>';
	//session_start();
 }
 else{
 $uname=$_SESSION['uname'];
// echo $uname;
 include("../connection.php");
/*$qry_check="select * from hostel_stud_reg where admn_status='submitted' and ADMNO='".$uname."'";
$res_check=mysqli_query($con,$qry_check);
$num_rec=mysqli_num_rows($res_check);
	if($num_rec!=0)
		{
			$msg= 'You are already submitted the application...to download the application form <a href="applicationdownload.php"><i>click here</i></a>';
			
		}
		*/
$qrys="select * from stud_details sd,class_details cd ,current_class cc,hostel_stud_reg hsr where sd.admissionno='".$uname."' and cc.studid='".$uname."' and cd.classid=cc.classid and hsr.ADMNO=sd.admissionno";
//print_r($qrys);
$result=mysqli_query($con,$qrys);
$records=mysqli_num_rows($result);
	if($records==0)
		{
			echo '<script>alert("You are not yet registered in RIT SOFT")</script>';
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
        $dist=$row['distance'];
        $p1=$row['priority1'];
        $p2a=$row['priority2a'];
        $p2d=$row['priority2d'];
        $p2e=$row['priority2e'];
        $income=$row['income'];
        $p_mob=$row['parent_mob'];
        $p_address=$row['parent_address'];
        }
	
}

}/// this for else codition to check the sesson variable ha svalue or not 
?>


<html>
<head >


</head>
<body id="homebody">
	<?php
	include("studenthome.php");
		
	?>
	<div class="container">
		
	<form name="frm1" method ="POST" action="applicationsave.php">
		<div id="rfm"><h2>APPLICATION FORM</h2></div>
		<div>
			
	<h3><?php
	 if($msg!='')
	{
		echo $msg;

	 } 
	 else
	 {
	 	?><form name="frm1" method ="POST" action="applicationsave.php">
	</h3>

		<div class="table-responsive-lg">
<table class="table table-striped" border=1 align="left" class="tbl" cellpadding="7" cellspacing="2">
	

<tr><td align="center" colspan="3">
 <h2><B>RAJIV GANDHI INSTITUTE OF TECHNOLOGY</B></h2>
<br>(Govt.Engineering College)Kottayam-686 001
<br><b>Application for admission to Mens/Ladies Hostels for the period 2018-19
<br>(For First Year and Lateral Entry students)</b>

		
	
	</td>
</tr>

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
			</br></br>	mob:<input type="text" name="mob_p" value=<?php echo $p_mob ?>></td>
		
</tr>
<tr>
	<td>Gender</td>
	<td><input type="text" name="gender" <?php if($gender=="F"){ $sex="Female";} if($gender=="M"){ $sex="Male";}?> value=<?php  echo $sex; ?>  ></td>
	
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
	<td><input type="checkbox" name="prior" value="prior"<?php if($p1==1) echo "checked='checked'";?>/></td></tr>
		<tr><td>Priority II(a)</td><td><input type="checkbox" name="prior" value="prior"<?php if($p2a==1) echo "checked='checked'";?>/></td></tr>
	<tr><td>Priority II(d)</td><td><input type="checkbox" name="prior" value="prior"
		<?php if($p2d==1) echo "checked='checked'";?>></td></tr>
	<tr><td>Priority II(e)</td><td><input type="checkbox" name="prior" value="prior"<?php if($p2e==1) echo "checked='checked'";?>/></td></tr>
	
</table>
	</td>
</tr>
<tr>
	<td>Family annual Income (Only for BPL category)</br>(*valid income certificate should be attached)</td>
	<td><input type="text" name="txtincome" value=<?php echo $income ?>></td>
</tr>
<tr>
	<td>Minimum Google distance from the post</br>office in the address specified in the AAdhaar</br>card to RIT pampady</td>
	<td><input type="text" name="txtdist" value=<?php echo $dist ?>></td>
</tr>
<tr>
</tr>
	<td>Rank in entrance Exam</td>
	<td><input type="text" name="txtrank" value=<?php echo $rank ?>></td>
</tr>
</table>

		<ol type="1">
		<li>I hereby declare that all information given above are true to the best of my knowledge and beleief.</li>
		<li>If admitted,I agree to abide by the rules and regulations of the hostel.</li>
		<li>If any information given is bound to be incorrect,I understand that the hostel admission will be cancelled and disciplinary action will be taken.</li>
	</ol>Signature of student<br>Date   &nbsp   &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp     												 Name and signature of Parent
	                                                                           

</div>
</div>
</form>
</div>
</body>
</html>

<?php }

mysqli_close($con);
	 ?>









