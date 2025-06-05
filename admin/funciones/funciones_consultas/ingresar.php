<?php
/////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro($nombre,$columna,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna) ";
$sql .= "VALUES ('$nombre')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
	
	
}
/////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro2($nombre1,$columna1,$nombre2,$columna2,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2) ";
$sql .= "VALUES ('$nombre1','$nombre2')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro3($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro4($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$nombre4,$columna4,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3,$columna4) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3','$nombre4')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro5($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$nombre4,$columna4,$nombre5,$columna5,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3,$columna4,$columna5) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3','$nombre4','$nombre5')";

	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro6($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$nombre4,$columna4,$nombre5,$columna5,$nombre6,$columna6,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3,$columna4,$columna5,$columna6) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3','$nombre4','$nombre5','$nombre6')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro7($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$nombre4,$columna4,$nombre5,$columna5,$nombre6,$columna6,$nombre7,$columna7,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3,$columna4,$columna5,$columna6,$columna7) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3','$nombre4','$nombre5','$nombre6','$nombre7')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro8($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$nombre4,$columna4,$nombre5,$columna5,$nombre6,$columna6,$nombre7,$columna7,$nombre8,$columna8,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3,$columna4,$columna5,$columna6,$columna7,$columna8) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3','$nombre4','$nombre5','$nombre6','$nombre7','$nombre8')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro9($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$nombre4,$columna4,$nombre5,$columna5,$nombre6,$columna6,$nombre7,$columna7,$nombre8,$columna8,$nombre9,$columna9,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3,$columna4,$columna5,$columna6,$columna7,$columna8,$columna9) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3','$nombre4','$nombre5','$nombre6','$nombre7','$nombre8','$nombre9')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro10($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$nombre4,$columna4,$nombre5,$columna5,$nombre6,$columna6,$nombre7,$columna7,$nombre8,$columna8,$nombre9,$columna9,$nombre10,$columna10,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3,$columna4,$columna5,$columna6,$columna7,$columna8,$columna9,$columna10) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3','$nombre4','$nombre5','$nombre6','$nombre7','$nombre8','$nombre9','$nombre10')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro11($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$nombre4,$columna4,$nombre5,$columna5,$nombre6,$columna6,$nombre7,$columna7,$nombre8,$columna8,$nombre9,$columna9,$nombre10,$columna10,$nombre11,$columna11,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3,$columna4,$columna5,$columna6,$columna7,$columna8,$columna9,$columna10,$columna11) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3','$nombre4','$nombre5','$nombre6','$nombre7','$nombre8','$nombre9','$nombre10','$nombre11')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro12($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$nombre4,$columna4,$nombre5,$columna5,$nombre6,$columna6,$nombre7,$columna7,$nombre8,$columna8,$nombre9,$columna9,$nombre10,$columna10,$nombre11,$columna11,$nombre12,$columna12,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3,$columna4,$columna5,$columna6,$columna7,$columna8,$columna9,$columna10,$columna11,$columna12) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3','$nombre4','$nombre5','$nombre6','$nombre7','$nombre8','$nombre9','$nombre10','$nombre11','$nombre12')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro13($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$nombre4,$columna4,$nombre5,$columna5,$nombre6,$columna6,$nombre7,$columna7,$nombre8,$columna8,$nombre9,$columna9,$nombre10,$columna10,$nombre11,$columna11,$nombre12,$columna12,$nombre13,$columna13,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3,$columna4,$columna5,$columna6,$columna7,$columna8,$columna9,$columna10,$columna11,$columna12,$columna13) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3','$nombre4','$nombre5','$nombre6','$nombre7','$nombre8','$nombre9','$nombre10','$nombre11','$nombre12','$nombre13')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro14($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$nombre4,$columna4,$nombre5,$columna5,$nombre6,$columna6,$nombre7,$columna7,$nombre8,$columna8,$nombre9,$columna9,$nombre10,$columna10,$nombre11,$columna11,$nombre12,$columna12,$nombre13,$columna13,$nombre14,$columna14,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3,$columna4,$columna5,$columna6,$columna7,$columna8,$columna9,$columna10,$columna11,$columna12,$columna13,$columna14) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3','$nombre4','$nombre5','$nombre6','$nombre7','$nombre8','$nombre9','$nombre10','$nombre11','$nombre12','$nombre13','$nombre14')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro15($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$nombre4,$columna4,$nombre5,$columna5,$nombre6,$columna6,$nombre7,$columna7,$nombre8,$columna8,$nombre9,$columna9,$nombre10,$columna10,$nombre11,$columna11,$nombre12,$columna12,$nombre13,$columna13,$nombre14,$columna14,$nombre15,$columna15,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3,$columna4,$columna5,$columna6,$columna7,$columna8,$columna9,$columna10,$columna11,$columna12,$columna13,$columna14,$columna15) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3','$nombre4','$nombre5','$nombre6','$nombre7','$nombre8','$nombre9','$nombre10','$nombre11','$nombre12','$nombre13','$nombre14','$nombre15')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro16($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$nombre4,$columna4,$nombre5,$columna5,$nombre6,$columna6,$nombre7,$columna7,$nombre8,$columna8,$nombre9,$columna9,$nombre10,$columna10,$nombre11,$columna11,$nombre12,$columna12,$nombre13,$columna13,$nombre14,$columna14,$nombre15,$columna15,$nombre16,$columna16,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3,$columna4,$columna5,$columna6,$columna7,$columna8,$columna9,$columna10,$columna11,$columna12,$columna13,$columna14,$columna15,$columna16) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3','$nombre4','$nombre5','$nombre6','$nombre7','$nombre8','$nombre9','$nombre10','$nombre11','$nombre12','$nombre13','$nombre14','$nombre15','$nombre16')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function ing_registro18($nombre1,$columna1,$nombre2,$columna2,$nombre3,$columna3,$nombre4,$columna4,$nombre5,$columna5,$nombre6,$columna6,$nombre7,$columna7,$nombre8,$columna8,$nombre9,$columna9,$nombre10,$columna10,$nombre11,$columna11,$nombre12,$columna12,$nombre13,$columna13,$nombre14,$columna14,$nombre15,$columna15,$nombre16,$columna16,$nombre17,$columna17,$nombre18,$columna18,$tabla,$link){
$sql = "INSERT INTO $tabla ($columna1,$columna2,$columna3,$columna4,$columna5,$columna6,$columna7,$columna8,$columna9,$columna10,$columna11,$columna12,$columna13,$columna14,$columna15,$columna16,$columna17,$columna18) ";
$sql .= "VALUES ('$nombre1','$nombre2','$nombre3','$nombre4','$nombre5','$nombre6','$nombre7','$nombre8','$nombre9','$nombre10','$nombre11','$nombre12','$nombre13','$nombre14','$nombre15','$nombre16','$nombre17','$nombre18')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}


?>