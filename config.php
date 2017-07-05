<?php

$db_username = '2371978_shopping';
$db_password = 'dream2017';
$db_name = '2371978_shopping';
$db_host = 'fdb17.biz.nf';

//connect to MySql						
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

?>