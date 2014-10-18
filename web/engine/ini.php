<?php
require_once("config.php");
require_once("class/dbi.php");
$db=new DB(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB);
require_once("functions.php");
//ini_set('precision', 14);
?>