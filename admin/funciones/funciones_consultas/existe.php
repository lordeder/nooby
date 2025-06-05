<?php
///////////////////////////////////////////////////////////////////////////////////////////
function existe_registro($tabla,$id,$coincidencia,$link){
$result=@$link->query("select $id from $tabla where $id like '$coincidencia' limit 1") or die ($link->error);
	if ($row = $result->fetch_object()){
	return true;
	}else{
	return false;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
function existe_2($tabla,$campo1,$coincidencia,$campo2,$coincidencia2,$link){
//$link=Conectarse();
$sql = "select * ";
$sql.= "from $tabla where $campo1 like '$coincidencia' and $campo2 like '$coincidencia2' limit 1" ;
$result = $link->query($sql) or die ($link->error);
	if ($row =$result->fetch_object()){
	return true;
	}else{
	return false;
	}
}
/////////////////////////*****************************************///////////////////////////
function existe_3($tabla,$campo1,$coincidencia,$campo2,$coincidencia2,$campo3,$coincidencia3,$link){
//$link=Conectarse();
$sql = "select * ";
$sql.= "from $tabla where $campo1 like '$coincidencia' and $campo2 like '$coincidencia2' and $campo3 like '$coincidencia3' limit 1" ;
$result = $link->query($sql);
//$cantidad = $result->num_rows;
//return $cantidad;
	if ($row_admin =$result->fetch_object()){
	return true;
	}else{
	return false;
	}
}
/////////////////////////*****************************************///////////////////////////
function existe_4($tabla,$campo1,$coincidencia,$campo2,$coincidencia2,$campo3,$coincidencia3,$campo4,$coincidencia4,$link){
//$link=Conectarse();
$sql = "select * ";
$sql.= "from $tabla where $campo1 like '$coincidencia' and $campo2 like '$coincidencia2' and $campo3 like '$coincidencia3' and $campo4 like '$coincidencia4' limit 1" ;
$result = $link->query($sql);
//$cantidad = $result->num_rows;
//return $cantidad;
	if ($row_admin =$result->fetch_object()){
	return true;
	}else{
	return false;
	}
}
?>