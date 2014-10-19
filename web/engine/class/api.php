<?
class API {

private $jsopn;

function __construct($id) {


$this->ingredients=array();
$this->additives=array();
$this->score=100;

if ($id<=0) return false;
$this->get($id);	
	
}

function get($id) {

global $db;

$sql="SELECT * FROM items where id='$id' and active=1";
$db->startQuery($sql);

if ($db->numRows()>0) {
	$row=$db->nextRow();
	$this->json=$row['cached_json'];
	} else $this->json=json_encode(array("error_code"=>1)); // the item has not been found
}



}
?>