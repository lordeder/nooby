<?php
/////////////////////////////////////////////////////////////////////////////////////////////
function contar($columna,$tabla,$id,$coincidencia,$link){
//$result=$link->query("select COUNT($columna) from $tabla where $id = '$coincidencia'") or die ($link->error);
$result=$link->query("select $columna from $tabla where $id = '$coincidencia'") or die ($link->error);
return $result->num_rows;
}

function contar_2($columna,$tabla,$id,$coincidencia,$id2,$coincidencia2,$link){
//$result=$link->query("select COUNT($columna) from $tabla where $id = '$coincidencia'") or die ($link->error);
$result=$link->query("select $columna from $tabla where $id = '$coincidencia' and $id2 = '$coincidencia2'") or die ($link->error);
return $result->num_rows;
}

function contar_todos($columna,$tabla,$link){
$result=$link->query("select $columna from $tabla") or die ($link->error);
return $result->num_rows;
}
?>