<?php
ob_start();
require_once("../engine/create_sess.php");
require_once("../engine/ini.php");
?>

<?php
	$bcsel=0;
	if(isset($_REQUEST['bcsel'])) $bcsel=$_REQUEST['bcsel'];
?>

<style type="text/css">
<!--
.itemb{
	display: block; overflow: hidden; padding: 8px; border: solid 1px #DDDDDD; background: #F5F5F5; border-radius: 3px; margin-bottom: 10px;
}
.itemb_sel{
	background: #D9EDF7;
	color:#3170B2;
	border-color: #BCE8F1;
}	
-->
</style>

<?php
$sql="SELECT * FROM items ORDER BY id DESC";
$db->startQuery($sql);
while ($row=$db->nextRow()){
	$name=$row['name'];
	$id=$row['id'];
	?>
	<div id="itm_<?=$id?>" class="itemb">
	<?=$name?>
	<div style="float: right;">
		<button class="btn btn-primary btn-circle" type="button" onclick="$('#form_bcod_div').load('bcod_edit.php?edit_id=<?=$id?>'); $('#itm_<?=$id?>').addClass('itemb_sel')">
			<i class="fa fa-pencil"></i>
		</button>
		<button class="btn btn-danger btn-circle" type="button">
			<i class="fa fa-times"></i>
		</button>
	</div>
	</div>
	<?
}	
?>
<script>
$('#itm_<?=$bcsel?>').addClass('itemb_sel');
</script>