<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_informeUrb = "localhost";
$database_informeUrb = "sreventa";
$username_informeUrb = "root";
$password_informeUrb = "";
$informeUrb = mysql_pconnect($hostname_informeUrb, $username_informeUrb, $password_informeUrb) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
