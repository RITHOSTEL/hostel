<!DOCTYPE html>
 <html>
 <head>
 	<title>Rajiv Gandhi Institute of Technology</title>
 </head>
 <body>
 <?php
	include("../header.html");
	include('../connection.php');
		
	?>
		<div class="container">


		<form name="frmVACANCY" method ="GET" >
		<div id="rfm"><h3>ADD VACANCY</h3></div>
		<div class="table-responsive-lg">
			<table class="table table-striped" border=0 align="left" class="tbl" cellpadding="7" cellspacing="2">
	<tr>
		<td>
			<?php
			$qry="select HOSNAME from hostel_rit";
			$res=mysqli_query($con,$qry);
			?>

				<select name="hname">
					<option>Select hostel name....</option>
					<?php while($row=mysqli_fetch_assoc($res)) {  ?>
					<option value="<?php echo $row['HOSNAME']; ?> "><?php echo $row['HOSNAME']; ?></option>
			<?php
			}
			?>
				</select>
			
			
		<td> <input type="text" id="txthosvacncy" name="txthosvacncy" placeholder="Enter the No. of vacancy"></td>
		<td><input type="submit" name="btnsubmit" value="Submit" onClick="window.location.reload()"></td>
</tr>

		</div>
	
<div>
	
		<table class="table table-striped" border=0 align="left" class="tbl" cellpadding="7" cellspacing="2">
	<tr>
		<td>
			HOSTEL ID
		</td>
		<td>
			HOSTEL NAME
		</td>
		<td>
			HOSTEL TYPE
		</td>
		<td>
			TOTAL No. OF ROOMS
		</td>
		<td>
			TOTAL No.OF BEDS
		</td>
		<td>
			VACANCY
		</td>
	</tr>
	<?php
	 $qry_selct="select * from hostel_rit";
	 $res_selct=mysqli_query($con,$qry_selct);
	 while($row=mysqli_fetch_assoc($res_selct))
	 	{?>
	 		<tr>
	 			<td><?php echo $row['HOSID'];?></td>
	 			<td><?php echo $row['HOSNAME'];?></td>
	 			<td><?php echo $row['HOSTYPE'];?></td>
	 			<td><?php echo $row['TOTNOROOMS'];?></td>
	 			<td><?php echo $row['TOTNOBEDS'];?></td>
	 			<td><?php echo $row['VACANCY'];?></td>
	 		</tr>
	 		<?php }
	 ?>
</table>
	
</div>
</form>
</div>
</body>
</html>

<?php
if(!empty($_GET)) {
    $vacancy=$_GET['txthosvacncy'];
    include('../connection.php');
$qry_up="update hostel_rit set VACANCY='".$vacancy."' where HOSNAME='".$_GET['hname']."'";
$res_up=mysqli_query($con,$qry_up);
if ($res_up) {
	echo '<script type="text/javascript">alert("Succefully updated the vancancy of '.$_GET['hname'].' as '.$vacancy.'");window.location=\'hostel.php\';</script>';
}

else{
	echo '<script type="text/javascript">alert("Failed to update the vancancy of '.$_GET['hname'].' as '.$vacancy.'");window.location=\'hostel.php\';</script>';
}


}


?>
