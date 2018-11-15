<!DOCTYPE html>
 <html>
 <head>
 	<title>Rajiv Gandhi Institute of Technology</title>
 </head>
 <body>
 <?php
	include("../header.html");
		
	?>
		<div class="container">
		<form name="frm1" method ="POST" >
		<div id="rfm"><h3>HOSTEL DETAILS</h3></div>
		<div class="table-responsive-lg">
			<table class="table table-striped" border=0 align="left" class="tbl" cellpadding="7" cellspacing="2">
	<tr>
		<td>
			<?php 
			include('../connection.php');
			$qry="select HOSNAME from hostel_rit";
			$res=mysqli_query($con,$qry);
			?>
				<select>
					<option><?php 
					while ($row=mysqli_fetch_assoc($res)) {
						echo $row['HOSNAME']; ?></option>
				</select>
			<?php
			}
			?>
			<select>
			
		</select></td>
		<td> <input type="text" name="txthosvacncy" placeholder="Enter the No. of vacancy"></td>
</tr>
		</div>
	</form>
</div>
</body>
</html>
<?php

?>