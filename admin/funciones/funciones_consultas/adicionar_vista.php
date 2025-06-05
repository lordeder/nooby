<?php
///////////////////////////////////////////////////////////////////////////7
function adicionar_vista($columna,$tabla,$campoid,$coincidencia,$link){
//$link=Conectarse();
$result=@$link->query("select $columna from $tabla where $campoid like '$coincidencia' limit 1") or die ($link->error);
//$result=mysql_query("select $columna from $tabla where $campoid = '$coincidencia' limit 1",$link) or die (mysql_error());
if($row = $result->fetch_object()){
//if($row = mysql_fetch_array($result)){
$numero_actual=$row->$columna;//$row[$columna];
$numero_aumentado=$numero_actual+1;
	$sql = "UPDATE $tabla SET $columna='$numero_aumentado' ";
	$sql .= "WHERE $campoid='$coincidencia' limit 1";
	//if($result2 = mysql_query($sql) or die (mysql_error()) )
	if($result2 = $link->query($sql) or die (mysql_error()) )
	{
	return true;		
	}
	else
	{
	echo '<font color="red">No se pudo aumentar vista '.$columna.'!!</font><br>'; 
	}
}
else
{ 
echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; 
}
}
////////////////////////////////////////////////////////////
?>