<?
require_once "../engine/ini.php";
require_once "../engine/class/api.php";

global $db;

$query= $db->sanitize($_REQUEST['query']);
if ($query!="") die(front_autocomplete($query));


?>