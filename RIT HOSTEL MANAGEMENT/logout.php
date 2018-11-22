<?php
if (!isset($_SESSION['uname'])) {
  session_start();
}
$_SESSION['uname'] = NULL;

unset($_SESSION['uname']);


/*echo $r='<script type="text/javascript">confirm("Do you really want to logout?")</script>';
echo $r;
 if ($r==true) {*/
 	echo '<script type="text/javascript">window.location=\'masterhome.html\';</script>';
 /*}
   else
  {
      echo '<script type="text/javascript">window.location=\';</script>'; 
  }*/


?>

