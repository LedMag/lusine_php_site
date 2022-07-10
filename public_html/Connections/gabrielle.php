<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_gabrielle = "localhost";
$database_gabrielle = "abanicos_uno";
$username_gabrielle = "root";
$password_gabrielle = "";
$gabrielle = mysql_pconnect($hostname_gabrielle, $username_gabrielle, $password_gabrielle) or trigger_error(mysql_error(),E_USER_ERROR); 
?>