<?

function get_json($barcode) {

global $db;

$sql="SELECT * FROM items where id='$barcode'";

$db->startQuery($sql);

$result="";

if ($db->numRows()>0) {
	$row=$db->nextRow();
	
	$item_name=$row['name'];
	
 	$sql="SELECT additive_id FROM items_additives where item_id='$barcode'";
	$db->startQuery($sql);
	
	$additives_ids=array();
		
	if ($db->numRows()>0) {
		while($row=$db->nextRow())
		$additives_ids[]=$row['additive_id'];
		}
	

	if (sizeof($additives_ids)>0) {
		$additives_ids_list=implode(", ",$additives_ids);
		$sql="select group_concat(`name` SEPARATOR ', ') as additives_names, sum(`val`) as additives_val from additives where id in( $additives_ids_list) and active=1";
		$db->startQuery($sql);
		if ($db->numRows()>0) {
		$row=$db->nextRow();
		$additives_names=$row['additives_names'];
		$additives_val=$row['additives_val'];
		}
		}
		
	
	$ingredients_ids=array();
		
	$sql="SELECT ingredient_id FROM items_ingredients where item_id='$barcode'";
	$db->startQuery($sql);
		
	if ($db->numRows()>0) {
		while($row=$db->nextRow())
		$ingredients_ids[]=$row['ingredient_id'];
		}
	
	
	if (sizeof($ingredients_ids)>0) {
		$ingredients_ids_list=implode(", ",$ingredients_ids);
		$sql="select group_concat(`name` SEPARATOR ', ') as ingredients_names from ingredients where id in( $ingredients_ids_list) and active=1";
		$db->startQuery($sql);
		if ($db->numRows()>0) {
		$row=$db->nextRow();
		$ingredients_names=$row['ingredients_names'];
		}
		}
	
	
	$status=$additives_val<50?1:($additives_val>=100?3:2);
	
	$json_array=array(
	"status"=>$status,
	"name"=>$item_name,
	"status_details" => $additives_names,
	"attentions" => $ingredients_names 
	);
	$result= json_encode($json_array);
	}
	return $result;
}

function front_autocomplete($q) {

	$items_list=array();
	global $db;	
    $sql="SELECT * FROM items WHERE id like '%$q%' or name like '%$q%' limit 10";
	$db->startQuery($sql);
		
	if ($db->numRows()>0) {
		while($row=$db->nextRow())
		$items_list[]=$row['name'];
		}
return json_encode($items_list);		
}

?>