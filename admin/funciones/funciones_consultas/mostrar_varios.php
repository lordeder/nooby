<?php

function mostrar_varios($columnas,$tabla,$id,$coincidencia,$link){
//$link=Conectarse();
$result=@$link->query("select $columnas from $tabla where $id like '$coincidencia' limit 1") or die ($link->error);
//if($result = $link->query($sql) or die ($link->error)){

$array_columnas= explode(',',$columnas);
$elementos = count($array_columnas);

$resultado='';
if($row = $result->fetch_object()){
	
	for($i=0;$i<$elementos;$i++){
		$columna=trim($array_columnas[$i]);
		$resultado1=$row->$columna;
	$resultado.= $resultado1.',';
	}
//$resultado=(string)$resultado;

return $resultado;//$row->$columna;
}else{ echo '<font color="red">Error al seleccionar columnas ->'.$columna.'
		tabla -> '.$tabla.' columnaid -> '.$id.' coincidencia -> '.$coincidencia.'!!</font><br>'; }
}
///////////////////////////////////////////////////////////////////
function mostrar_varios2($columnas,$tabla,$id,$coincidencia,$link){
//$link=Conectarse();
$result=@$link->query("select $columnas from $tabla where $id like '$coincidencia' limit 1") or die ($link->error);
//if($result = $link->query($sql) or die ($link->error)){

$array_columnas= explode(',',$columnas);
$elementos = count($array_columnas);

$resultado='';
if($row = $result->fetch_object()){
	
	for($i=0;$i<$elementos;$i++){
		$columna=trim($array_columnas[$i]);
		$resultado1=$row->$columna;
	$resultado.= $resultado1.'.,-';
	}
//$resultado=(string)$resultado;

return $resultado;//$row->$columna;
}else{ echo '<font color="red">Error al seleccionar columnas ->'.$columna.'
		tabla -> '.$tabla.' columnaid -> '.$id.' coincidencia -> '.$coincidencia.'!!</font><br>'; }
}
///////////////////////////////////////////////////////////////////
?>