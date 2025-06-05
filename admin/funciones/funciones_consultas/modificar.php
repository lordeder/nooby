<?php
/////////////////////////////////////////////////////////////////////////////////////////////
function mod_1_dato($tabla,$campo,$valor,$campoid,$coincidenciaid,$link){
$sql = "UPDATE $tabla SET $campo='$valor' ";
$sql .= "WHERE $campoid='$coincidenciaid' limit 1";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////
function mod_1_dato_varios($tabla,$campo,$valor,$campoid,$coincidenciaid,$link){
$sql = "UPDATE $tabla SET $campo='$valor' ";
$sql .= "WHERE $campoid='$coincidenciaid'";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
?>