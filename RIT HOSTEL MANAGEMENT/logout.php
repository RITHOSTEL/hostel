<?php
if (!isset($_SESSION['uname'])) {
  session_start();
}
$_SESSION['uname'] = NULL;

unset($_SESSION['uname']);

 echo '<script type="text/javascript">alert("logged out sucessfully");window.location=\'masterhome.html\';</script>';

?>

