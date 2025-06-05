<?php
function seccion_id($nivelid,$link){
$result=$link->query("select nombre from niveles where nivelid like '$nivelid' limit 1") or die ($link->error);
$row =$result->fetch_object();
	//if($row = $result->fetch_object()){
	return $row->nombre;
	//}else{
	//echo 'Error';
	//}
}
?>