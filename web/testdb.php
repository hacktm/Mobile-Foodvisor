<?php
require_once("engine/ini.php");
?>

<h1>Clear table</h1>
<h2>(similar update, insert)</h2>
<?php
$sql="DELETE FROM test";
//$db->Query($sql);
?>




<h1>Select with ressources</h1>
<?php
$sql="SELECT * FROM test";
$db->startQuery($sql);
WHILE ($row=$db->nextRow()) {
	$field1=$row['field1'];
	$field2=$row['field2'];
	echo "Record: $field1 / $field2 <br>";
}
?>
