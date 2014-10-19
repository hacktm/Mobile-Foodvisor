<?php
ob_start();
require_once("../engine/create_sess.php");
require_once("../engine/ini.php");
require_once("../engine/class/forms.php");
require_once("../engine/functions.php");
//require_once("verify_admin.php");
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-plus fa-fw"></i> Add Barcode
    </div>
    <div class="panel-body">
    
<div class="alert alert-success alert-dismissable" id="bcod_response" style="display: none;">
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
<span id="bcod_response_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
</div>
    
		<form id="additem_frm" method="post" action="bcod_add_sub.php" role="form">
			<h5>Barcode</h5>
			<div class="form-group input-group">				
				<input class="form-control" type="text" id="item_id" name="item_id" placeholder="Enter barcode"/>
				<span class="input-group-addon"><i class="fa fa-barcode fa-fw"></i></span>
			</div>	
			<h5>Product Name</h5>
			<div class="form-group input-group">				
				<input class="form-control" type="text" id="item_name" name="item_name" placeholder="Enter product name"/>
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
				?>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="ingred[<?=$ingr_id?>]" value="1"/>
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
				?>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="addits[<?=$addi_id?>]" value="1"/>
					<?=$addi_name?> (<?=$addi_val?>%)
				</label>
			</div>
				<?
			}
			?>
			</div>	<br /><br />
			<fieldset>
				<button class="btn btn-primary" type="submit" name="additem" value="2">Add product</button>
			</fieldset>
		</form>		
		<? new jsForm1 ("additem_frm","bcod_response_text","myform_submit");?>
    </div>

</div>