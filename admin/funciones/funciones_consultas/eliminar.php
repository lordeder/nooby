<?php
function eliminar_registro($tabla,$columnaid,$id,$link){
$sql = "DELETE FROM $tabla ";
$sql .= "WHERE $columnaid = '$id' limit 1";
$result = $link->query($sql);
	if($result = $link->query($sql)){
	return true;
	}else{
	return false;
	}
}
//************/////////////////////////////////////////////////////////////////////////////////////
function eliminar_registro_varios($tabla,$columnaid,$id,$link){
$sql = "DELETE FROM $tabla ";
$sql .= "WHERE $columnaid = '$id'";
$result = $link->query($sql);
	if($result = $link->query($sql)){
	return true;
	}else{
	return false;
	}
}
?>