<?php
//session_start();
$uname=$_POST['txtuname'];
$pass=$_POST['txtpass'];




	$c=mysqli_connect("localhost","root","");
	if(!$c)
	{
		echo "error";
	}
	mysqli_select_db($c,"rithostel");
	$q="select usertype from hostel_login where username='".$uname."' and password='".$pass."' ";
	print_r("select usertype from stud_details where username='".$uname."' and password='".$pass."' ");
	$result=mysqli_query($c,$q);

        while ( $row= mysqli_fetch_assoc($result)) {
        $utype=$row['usertype'];
        echo $utype;
        }
	$records=mysqli_num_rows($result);
	if($records==0)
	{
		echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'login.html<!DOCTYPE html>
		<html>
		<head>
			<title></title>
		</head>
		<body>
		
		</body>
		</html>\';</script>';
	}
	else
	{
		if($utype=='student')
		{
		session_start();
        $_SESSION['uname']=$_POST['txtuname'];
       // echo "uname" $row['username'];
        print_r($_SESSION);
		//$_SESSION['name']=$row['name'];
		//$_SESSION['student']=true;
		header("location:student/studenthome.html");
	}
		 if($utype=='admin')
		{
		session_start();
        $_SESSION['uname']=$_POST['txtuname'];
		//$_SESSION['name']=$row['name'];
		//$_SESSION['student']=true;
		header("location:admin/adminhome.html");
	}
	 if($utype=='warden')
		{
		session_start();
        $_SESSION['uname']=$_POST['txtuname'];
		//$_SESSION['name']=$row['name'];
		//$_SESSION['student']=true;
		header("location:warden/wardenhome.html");
	}
	if($utype=='secretary')
		{
		session_start();
        $_SESSION['uname']=$_POST['txtuname'];;
		//$_SESSION['name']=$row['name'];
		//$_SESSION['student']=true;
		header("location:hs/hshome.html");
	}
}
	?>
	
