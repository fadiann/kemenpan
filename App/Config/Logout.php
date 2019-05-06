<?php
session_start ();
include_once "../Classes/Login.php";
$logins = new Login ();
$logins->log_out ( $_SESSION ['ses_userId'] );
session_destroy ();
echo "<script>window.open('../../index.php','_parent');</script>";
?>
