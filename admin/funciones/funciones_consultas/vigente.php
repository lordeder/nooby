<?php /////////////////////////////////////////////////////////////////////////////////////////////
function vigente($columna_fecha,$tabla,$id,$coincidencia,$link){
//$link=Conectarse();
$result=@$link->query("select $columna_fecha from $tabla where $id = '$coincidencia' and $columna_fecha >= NOW() limit 1") or die ($link->error);
	if($row = $result->fetch_object()){
	return true;
	}else{ 
	return false; 
	}
}
 

 ?>