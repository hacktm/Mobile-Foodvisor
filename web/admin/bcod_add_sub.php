<?php
ob_start();
require_once("../engine/create_sess.php");
require_once("../engine/ini.php");
require_once("../engine/functions.php");
//require_once("verify_admin.php");
?>



<?
$id=$db->sanitize($_POST['item_id']);
$name=$db->sanitize($_POST['item_name']);

$err="";
if(strlen($id)<13){
	$err.="Ivalid Barcode Format.<br/>";
}
if(strlen($name)==0){
	$err.="Product name is empty!<br/>";
}
$sql="SELECT * FROM items WHERE id='$id'";
$db->query($sql);
if($db->affectedRows()>0){
	$err.="This Barcode already exists!";
}

if(strlen($err)>0){
	?>
	<script>
	$('#bcod_response').removeClass("alert-success");
	$('#bcod_response').addClass('alert-danger');
	$('#bcod_response_text').html("<b>Error </b><br/><?=$err?>");
	$('#bcod_response').show(200);
	</script>
	<?
	exit();
}

$sql="INSERT INTO items SET id='$id',name='$name', active='1'";
$db->query($sql);
$last_id=$id;

if(isset($_POST['ingred'])){
	$ingred_arr=$_POST['ingred'];
    foreach ($ingred_arr as $key=>$value) {   
		$sql="INSERT INTO items_ingredients SET item_id=$last_id, ingredient_id=$key"; 		 
		$db->query($sql); 
    } 
}

if(isset($_POST['addits'])){
	$addits_arr=$_POST['addits'];
    foreach ($addits_arr as $key=>$value) {   
		$sql="INSERT INTO items_additives SET item_id=$last_id, additive_id=$key"; 		 
		$db->query($sql); 
    } 
}


$cached_json=addslashes(get_json($last_id));
//$cached_json=$db->sanitize(get_json($last_id));
$sql="UPDATE items SET cached_json='$cached_json' WHERE id='$last_id'";
$db->query($sql);
?>

<pre>
<?
print_r($ingred_arr);
print_r($ingred_arr);
?>
</pre>

<script>
$('#bcod_response').addClass("alert-success");
$('#bcod_response').removeClass('alert-danger');
document.getElementById("additem_frm").reset();
$('#bcod_response_text').text("Barcode saved OK !");
$('#bcod_response').show(200);
</script>