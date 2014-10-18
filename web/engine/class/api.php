<?
class API {

private $jsopn;
private $cript_key="meme";

function __construct($id,$token) {


$this->ingredients=array();
$this->additives=array();
$this->score=100;

if ($id<=0) return false;
if ($this->goodToken($id,$token)) return false;
$this->get($id);	
	
}

function gootToken($id,$token) {
$key=substr($id.$this->crypt_key,0,20);
}
function get($id) {

$sql="SELECT * FROM items where id='$id' and active=1";
$db->startQuery($sql);

if ($db->numRows()>0) {
	$row=$db->nextRow();
	$this->json=$row['cached_json'];
	} else $this->json=json_encode(array("error_code"=>1)); // the item has not been found
}



}
?>