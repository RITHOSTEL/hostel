
<?php
session_start();
include("wardenhome.php");
//$_SESSION['admin']=$_POST['txtadmnno'];
if(isset($_POST['txtSearch']))
$item_search=$_POST['txtSearch'];
//echo "search=".$item_search;
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
$qry="SELECT * from hostel_stud_reg hsr 
LEFT JOIN stud_details sd  ON sd.admissionno=hsr.ADMNO
LEFT JOIN current_class cc ON cc.studid=sd.admissionno 
LEFT JOIN class_details cd ON cd.classid=cc.classid where  hsr.ADMNO like'%".$item_search."%' OR sd.admissionno like'%".$item_search."%' OR sd.name like'%".$item_search."%' or cd.courseid like'%".$item_search."%' or cd.semid like'%".$item_search. "%' OR sd.quota like'%".$item_search."%' OR sd.religion like'%".$item_search."%' or cd.branch_or_specialisation like'%".$item_search."%'";
#print_r($qry);
/*$qry="SELECT DISTINCT s.*, h.* from stud_details s ,hostel_stud_reg h,current_class c ,class_details cc  WHERE s.admissionno=h.ADMNO AND c.studid=s.admissionno and c.studid=h.ADMNO and cc.classid=c.classid AND h.ADMNO like'%".$item_search."%' AND s.admissionno LIKE '%".$item_search."%' OR s.name LIKE '%".$item_search."%' OR cc.branch_or_specialisation  like'%sru%'";*/

/*$qry="SELECT DISTINCT s.*, h.* from stud_details s ,hostel_stud_reg h,current_class c ,class_details cc  WHERE h.ADMNO=s.admissionno AND c.studid=s.admissionno and cc.classid=c.classid OR h.ADMNO like'%".$item_search."%' and s.admissionno LIKE '%".$item_search."%' OR s.name LIKE '%".$item_search."%'";*/
//print_r($qry);

/*$qry="SELECT DISTINCT * from stud_details sd,class_details cd ,current_class cc,hostel_stud_reg hsr where cc.studid=sd.admissionno and cd.classid=cc.classid and cc.studid=hsr.ADMNO and hsr.ADMNO=sd.admissionno and hsr.ADMNO like'%".$item_search."%' and sd.admissionno LIKE '%".$item_search."%' OR sd.name LIKE '%".$item_search."%'";*/
/*$qry="select DISTINCT * from stud_details sd,class_details cd ,current_class cc,hostel_stud_reg hsr where and cd.classid=cc.classid AND  cc.studid LIKE '%".$item_search."%' AND  hsr.ADMNO like'%".$item_search."%' and sd.admissionno LIKE '%".$item_search."%' OR sd.name LIKE '%".$item_search."%'";*/


/*$qry="SELECT * 
from stud_details sd  
 	NATURAL JOIN hostel_stud_reg hsr 
ON hsr.ADMNO=sd.admissionno
	NATURAL JOIN current_class cc 
ON cc.studid=sd.admissionno
	NATURAL JOIN class_details 
ON  cd.classid=cc.classid 
WHERE cc.studid LIKE '%".$item_search."%' AND  hsr.ADMNO like'%".$item_search."%' and sd.admissionno LIKE '%".$item_search."%' OR sd.name LIKE '%".$item_search."%'";*/



$res=mysqli_query($con,$qry);
/*$qry="select * from stud_details sd5,hostel_stud_reg sh where sh.ADMNO='".$admn."' and sd.admissionno='".$admn."'";
$res=mysqli_query($con,$qry)*/?>

<div class="col-auto" style=" height:300px;overflow-x: scroll; display:block;overflow-y:scroll; ">
		<div class="table-responsive-lg">
			
<table class="table table-striped table-dark " border=2 align="left" class="tbl" cellpadding="7" cellspacing="2" >
	
		<thead class="table-fixed thead thead-dark">
	
		
			<th class="col-xs-2">Admn No.</th>
			<th class="col-xs-2">Name</th>
			<th class="col-xs-2">Dob</th>
			<th class="col-xs-2">Gender</th>
			<th class="col-xs-2">Religion</th>
			<th class="col-xs-2">Email ID</th>
			<th class="col-xs-2">Student mob</th>
			<th class="col-xs-2">Land phno</th>
			<th class="col-xs-2">Parent mob</th>
			<th class="col-xs-2">Address</th>
			<th class="col-xs-2">Parent Address</th>
			<th class="col-xs-2">Category</th>

			<th class="col-xs-2">Course</th>
			<th class="col-xs-2">Branch</th>
			<th class="col-xs-2">Semester</th>

			<th class="col-xs-2">Year of admission</th>
			<th class="col-xs-2">SGPA</th>
			<th class="col-xs-2">Distance</th>
			<th class="col-xs-2">Income</th>
			<th class="col-xs-2">Disciplinary Actions</th>
			<th class="col-xs-2">Admission Status</th>


		
		</thead>
	
	<?php
while($row=mysqli_fetch_array($res))
{
?>
<tr>
	<td><?php echo $row['admissionno']?></td>
	<td><?php echo $row['name']?></td>
	<td><?php echo $row['dob']?></td>
	<td><?php echo $row['gender']?></td>
	<td><?php echo $row['religion']?></td>
	<td><?php echo $row['email']?></td>
	<td><?php echo $row['mobile_phno']?></td>
	<td><?php echo $row['land_phno']?></td>
	<td><?php echo $row['parent_mob']?></td>
	<td><?php echo $row['address']?></td>
	<td><?php echo $row['parent_address']?></td>
	
	<td><?php echo $row['quota']?></td>
	<td><?php echo $row['deptname']?></td>
	<td><?php echo $row['branch_or_specialisation']?></td>
	<td><?php echo $row['semid']?></td>


	<td><?php echo $row['year_of_admission']?></td>
	<td><?php echo $row['Entrance_rank']?></td>
	<td><?php echo $row['distance']?></td>
	
	<td><?php echo $row['income']?></td>
	<td><?php echo $row['disci_action']?></td>
	<td><?php echo $row['admn_status']?></td>


	<?php
	//break;

}
?>
</tr>

</table>
</div>
</div>

