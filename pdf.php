<?php 
$password = 'fadian';
$password = hash("sha512", md5($password));
echo $password;
?>