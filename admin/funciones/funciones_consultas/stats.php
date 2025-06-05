<?php

function stats($tipo,$fecha,$identificador,$ip,$tabla_stats,$link){
if($tipo>0){
//verificamos si hay registro de visita en la base de datos con esa IP
$result=$link->query("select TIMESTAMPDIFF(SECOND, fecha, NOW() ) from $tabla_stats where id = '$identificador' and tipo = '$tipo' and ip = INET_ATON('$ip') order by fecha DESC limit 1") or die ($link->error);

	if ($row = $result->fetch_row()){ //SI HAY
	$hace_cuanto = $row[0];
			if($hace_cuanto>3600){// mas de una hora, entonces registramos nueva visita
					$sql = "INSERT INTO $tabla_stats (tipo,id,ip,fecha) ";
					$sql .= "VALUES ('$tipo','$identificador',INET_ATON('$ip'),NOW())";
						if($result = $link->query($sql) or die ($link->error)){
						//return true;
						echo '<br> ('.$hace_cuanto.')Registro despues de hora ->'.$tipo;		
						}else{
						//return false;
						}	
			}else{//menos de una hora, no registramos
			//echo $hace_cuanto;
			}
	
	}else{ //NO hay registro de visita (Por primera vez)
	//echo '<br>No hay registro';
				//return false;
				$sql = "INSERT INTO $tabla_stats (tipo,id,ip,fecha) ";
				$sql .= "VALUES ('$tipo','$identificador',INET_ATON('$ip'),NOW())";
						if($result = $link->query($sql) or die ($link->error)){
						//return true;
						echo '<br>registro x primera vez -> '.$tipo;				
						}else{
						//return false;
						}
	}
}
}

function stats_users($tipo,$fecha,$identificador,$userid,$tabla_stats,$link){
if($tipo>0){
//verificamos si hay registro de visita en la base de datos con esa IP
$result=$link->query("select TIMESTAMPDIFF(SECOND, fecha, NOW() ) from $tabla_stats where id = '$identificador' and tipo = '$tipo' and userid = '$userid'  order by fecha DESC limit 1") or die ($link->error);

	if ($row = $result->fetch_row()){ //SI HAY
	$hace_cuanto = $row[0];
			if($hace_cuanto>3600){// mas de una hora, entonces registramos nueva visita
					$sql = "INSERT INTO $tabla_stats (tipo,id,userid,fecha) ";
					$sql .= "VALUES ('$tipo','$identificador','$userid',NOW())";
						if($result = $link->query($sql) or die ($link->error)){
						//return true;
						echo '<br> ('.$hace_cuanto.')Registro despues de hora ->'.$tipo;		
						}else{
						//return false;
						}	
			}else{//menos de una hora, no registramos
			//echo $hace_cuanto;
			}
	
	}else{ //NO hay registro de visita (Por primera vez)
	//echo '<br>No hay registro';
				//return false;
				$sql = "INSERT INTO $tabla_stats (tipo,id,userid,fecha) ";
				$sql .= "VALUES ('$tipo','$identificador','$userid',NOW())";
						if($result = $link->query($sql) or die ($link->error)){
						//return true;
						echo '<br>registro x primera vez -> '.$tipo;				
						}else{
						//return false;
						}
	}
}
}

?>