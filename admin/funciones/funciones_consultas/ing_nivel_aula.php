<?php

function ingresar_nivel($nivel,$grado,$seccion,$colegioid,$link){

$sql = "select nivel ";
$sql.= "from niveles where colegioid = $colegioid and nivel = '$nivel' and grado = '$grado' and nombre = '$seccion' limit 1" ;
$result = $link->query($sql);
//$cantidad = $result->num_rows;
//return $cantidad;
	if ($row_admin =$result->fetch_object()){
			return false;
	}else{
	//return false;
			$sql = "INSERT INTO niveles (nivel,grado,nombre,colegioid) ";
			$sql .= "VALUES ('$nivel','$grado','$seccion','$colegioid')";
			if($result = $link->query($sql)){
			return true;
			}else{
			return false;
			}
	}
	

}
?>