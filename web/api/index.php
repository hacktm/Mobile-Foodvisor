<?

$json='{"result":[{"name":"Mountain Dew","status":"1","status_details":"E11 ,E12, E13","attentions":"sugar, fats"}]}';



if ($_REQUEST['barcode']=='5941869600015') die($json);

require_once "../engine/ini.php";
require_once "../engine/class/api.php";

global $db;

$code= $db->sanitize($_REQUEST['barcode']);
$token=$db->sanitize($_REQUEST['token']);
$api=new API($code);
die($api->json);
?>