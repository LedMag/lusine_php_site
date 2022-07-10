<?php
$hostname_gabrielle = "localhost";
$database_gabrielle = "abanicos_uno";
$username_gabrielle = "root";
$password_gabrielle = "";
$gabrielle = mysqli_connect($hostname_gabrielle, $username_gabrielle, $password_gabrielle) or trigger_error( mysqli_error($gabrielle),E_USER_ERROR); 
mysqli_set_charset($gabrielle, 'utf8');
?>