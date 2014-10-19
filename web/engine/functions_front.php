<?

function show_result_table($type,$val,$val_name) {

global $db;

if (($type==1) && ($val_name!="")) { $cond="name LIKE '%$val_name%' LIMIT 10";}
	else if (($type==2) && ($val!="")) {$cond="id = '$val' LIMIT 10";}
		else {
		$cond="id>0 order by id desc limit 5 ";
		}

$sql="SELECT * FROM `items` WHERE $cond";
$db->startQuery($sql);

if ($db->numRows()>0) {
?>
<table width="100%">
<tr>
<th>Status</th>
<th>Name</th>
<th>Details</th>
</tr>
<? 
while($row=$db->nextRow()) {

$json=json_decode($row['cached_json']);	
$status=max(1,$json->status);
$img='<img src="/img/'.$status.'.png" />';	
$details="";
if (($json->status_details!="") && ($json->status_details!="null")) $details.="Additives: ".$json->status_details."<br />";
if (($json->attentions!="") && ($json->attentions!="null")) $details.="Attentions: ".$json->attentions."<br />";


if ($details=="") $details="No data";
?>
<tr>
<td><?=$img; ?></td>
</td>
<td><?=$row['name'];?></td>
<td><?=$details;?></td>
</tr>
<?	
}
?>
<? } ?>
</table>
<?
}

?>