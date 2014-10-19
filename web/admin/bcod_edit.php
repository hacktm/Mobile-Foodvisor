<?php
ob_start();
require_once("../engine/create_sess.php");
require_once("../engine/ini.php");
require_once("../engine/class/forms.php");
require_once("../engine/functions.php");
//require_once("verify_admin.php");
?>

<?php
$edit_id=$db->sanitize($_REQUEST['edit_id']); 
$sql="SELECT * FROM items WHERE id='$edit_id'";
$db->startQuery($sql);
while ($row=$db->nextRow()){
	$name_old=stripslashes($row['name']);
	$id_old=$row['id'];
}

$ingred_old_arr=array();
$sql="SELECT * FROM items_ingredients WHERE item_id='$edit_id'";
$db->startQuery($sql);
while ($row=$db->nextRow()){
	$ingred_old=$row['ingedient_id'];
	$ingred_old_arr[$ingred_old]=1;
}
$additives_old_arr=array();
$sql="SELECT * FROM items_additives WHERE item_id='$edit_id'";
$db->startQuery($sql);
while ($row=$db->nextRow()){
	$addi_id=$row['additive_id'];
	$additives_old[$addi_id]=1;
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-pencil fa-fw"></i> Edit Barcode
    </div>
    <div class="panel-body">
    
<div class="alert alert-success alert-dismissable" id="bcod_response" style="display: none;">
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
<span id="bcod_response_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
</div>
    
		<form id="edititem_frm" method="post" action="bcod_edit_sub.php" role="form">
			<h5>Barcode</h5>
			<div class="form-group input-group">				
				<input class="form-control" type="text" id="item_id" name="item_id" value="<?=$id_old?>" placeholder="Enter barcode"/>
				<span class="input-group-addon"><i class="fa fa-barcode fa-fw"></i></span>
			</div>	
			<h5>Product Name</h5>
			<div class="form-group input-group">				
				<input class="form-control" type="text" id="item_name" name="item_name" value="<?=$name_old?>" placeholder="Enter product name"/>
				<span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
			</div><br />
			<h5>Ingredients</h5>
			<div style="display: block; overflow: hidden; max-height: 160px; padding: 0px 8px 0px 0px; overflow-y: scroll;">
			<?
			$sql="SELECT * FROM ingredients";
			$db->startQuery($sql);
			while ($row=$db->nextRow()){
				$ingr_id=$row['id'];
				$ingr_name=$row['name'];
				$check="";
				//if(array_key_exists($ingr_id,$ingr_sel)) $check="CHECKED";
				if(isset($ingr_sel[$ingr_id])) $check="CHECKED";
				?>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="ingred[<?=$ingr_id?>]" <?=$check?> value="1"/>
					<?=$ingr_name?>
				</label>
			</div>
				<?
			}
			?>
			</div>	
			<h5>Additives</h5>
			<div style="display: block; overflow: hidden; max-height: 155px; padding: 0px 8px 0px 0px; overflow-y: scroll;">
			<?
			$sql="SELECT * FROM additives";
			$db->startQuery($sql);
			while ($row=$db->nextRow()){
				$addi_id=$row['id'];
				$addi_name=$row['name'];
				$addi_val=$row['val'];
				if(array_key_exists($addi_id,$addi_sel)) $check="CHECKED";
				?>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="addits[<?=$addi_id?>]" <?=$check?> value="1"/>
					<?=$addi_name?> (<?=$addi_val?>%)
				</label>
			</div>
				<?
			}
			?>
			</div>	<br /><br />
			<fieldset>
				<button class="btn btn-primary" type="submit" name="additem" value="2">Edit product</button>
			</fieldset>
		</form>		
		<? new jsForm1 ("edititem_frm","bcod_response_text","myform_submit");?>
    </div>

</div>