<?php
$msg='';
$c=0;
session_start();

if (!isset($_SESSION['uname'])) 
{
  
  echo '<script type="text/javascript">alert("You are out of session..Please login again");</script>';;
 }
 else{
 $uname=$_SESSION['uname'];
 include("../connection.php");
$qry_check="SELECT * from hostel_stud_reg where admn_status in('submitted','ranked','allocated') and ADMNO='".$uname."'";
$res_check=mysqli_query($con,$qry_check);
$num_rec=mysqli_num_rows($res_check);
	if($num_rec!=0)
		{
			//$msg= 'You are already submitted the application...to download the application form <a href="applicationdownload.php"><i>click here</i></a>';
			$msg= 'You submitted the application...to download the application form <a href="applicationdownload.php"><i>click here</i></a>';
			
		}
		
$qrys="SELECT * from stud_details sd,class_details cd ,current_class cc where sd.admissionno='".$uname."' and cc.studid='".$uname."' and cd.classid=cc.classid";
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

        }
	
}

}/// this for else codition to check the sesson variable ha svalue or not 
?>


<html>
<head >

<script type="text/javascript">
	function validation() {
		var valid=false;
		if(document.getElementById('pMob').value=="")
       			{
       				alert("Please enter your Contact No.");
       				valid=true;
       				return false;
       			}
       			if(document.getElementById('distance').value=="")
       			{
       				alert("Please enter your distance");
       				valid=true;
       				return false;
       			}
		
	}
</script>
</head>
<body id="homebody">
	<?php
	include("studenthome.php");
		
	?>
	<div class="container">
		
	<form name="frm1" method ="POST" action="applicationsave.php" onsubmit="return validation()">
		<div id="rfm"><h2>APPLICATION FORM</h2></div>
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
			</br></br>	mob:<input type="text" name="mob_p" id="pMob" min="10" maxlength="10" required="10 digits should be entered"></td>
		
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
	
	<!--<tr>
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

	</tr>-->
	

<tr>
	<td>Priority</BR>Priority I-SC/ST/PH/BPL/Other states/Central govt nominees</br>
		Priority II(a)-First year B.tech/B.Arch
	</br>Priority II(d)-Lateral Entry students</br>Priority II(e)-First year PG students
</br>(*priority I student must attach the copy of proof)</td>
	<td>
	<table border="2" cellpadding="1" cellspacing="1">
		<tr>
		<th>Priorities</th><th colspan="2">Please tick</th></tr>
			<tr>
	<TD>Priority I</TD>
	<td ><input type="checkbox" name="prior[]" value="prior1" ><script type="text/javascript"> if($(this). prop("checked") == true){
<?php  $c=1; echo $c;?>

}</script></td>

	<td > SC<input type="checkbox" name="category[]" value="catsc" >
			ST<input type="checkbox" name="category[]" value="catst">
			PH<input type="checkbox" name="category[]" value="catph">
			BPL<input type="checkbox" name="category[]" value="catbpl">
			<br>Other State<input type="checkbox" name="category[]" value="catoherstate">
			<br>Central govt. nominee<input type="checkbox" name="category[]" value="catcentral"></TD>
	</tr>
		<tr><td>Priority II(a)</td>
			<td colspan="2"><input type="checkbox" name="prior[]" value="prior2a"></td>
		</tr>
	<tr><td>Priority II(d)</td><td colspan="2"><input type="checkbox" name="prior[]" value="prior2d"></td></tr>
	<tr><td>Priority II(e)</td><td colspan="2"><input type="checkbox" name="prior[]" value="prior2e"></td></tr>
	
</table>
	</td>
</tr>
<tr>
	<td>Family annual Income (Only for BPL category)</br>(*valid income certificate should be attached)</td>
	<td><input type="text" name="txtincome" id="income"></td>
</tr>
<tr>
	<td>Minimum Google distance from the post</br>office in the address specified in the AAdhaar</br>card to RIT pampady</td>
	<td><input type="text" name="txtdist" id="distance" required="Plz fill this field"></td>
</tr>
<tr>
</tr>
	<td>Rank in entrance Exam</td>
	<td><input type="text" name="txtrank" value=<?php echo $rank ?>></td>
</tr>

<tr align="center" rowspan="5">
	<br><td  colspan="3" ><input type="submit" name="btsub" value="submit" >
</td>
<td colspan="3"><input type="Reset" name="btReset" value="Reset"></td>
	</tr></br>
</table>
</div>
</form>
</div>
</body>
</html>

<?php }

mysqli_close($con);
	 ?>









