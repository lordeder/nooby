<?php
///////////////////////////////////////////////////////////////////////////////////
function ultimo_id($tabla,$campoid,$link){
$result=$link->query("select $campoid from $tabla order by $campoid desc limit 1");
	if ($row =$result->fetch_object()){
	return $row->$campoid;
	}else{
	return false;
	}
}
///////////////////////////////////////////////////////////////////////////////////
function ultimo_id2($tabla,$campoid,$id,$coincidencia,$link){
$result=$link->query("select $campoid from $tabla where $id = '$coincidencia' order by $campoid desc limit 1");
	if ($row =$result->fetch_object()){
	return $row->$campoid;
	}else{
	return false;
	}
}

?>