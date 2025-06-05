<?php
function ultimo_voto($tipo,$userid,$encuestaid,$link){
$result=$link->query("select TIMESTAMPDIFF(SECOND, fecha, NOW() ) from encuestas_votos where encuestaid = '$encuestaid' and tipo = '$tipo' order by fecha desc limit 1") or die ($link->error);

	if ($row = $result->fetch_row()){
	return $row[0];
	}else{
	return false;
	}
}

/////////////////////////////////////////////////////////////////////////////////////////////
function ingresar_encuesta($autorid,$tipo,$opcionid,$encuestaid,$link){
$sql = "INSERT INTO encuestas_votos (autorid,tipo,opcion,encuestaid,fecha) ";
$sql .= "VALUES ('$autorid','$tipo','$opcionid','$encuestaid',NOW())";
	
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
	
}
?>