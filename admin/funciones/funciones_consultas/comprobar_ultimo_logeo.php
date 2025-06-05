<?php

function getUserIP() {
    // Comprobar si está detrás de un proxy
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    // Si es IPv6 y la IP es ::1 (loopback), la cambiamos por 127.0.0.1
    if ($ip == '::1') {
        $ip = '127.0.0.1';
    }

    return $ip;
}
			
function comprobar_ultimo_logeo($tabla, $columna_logeos_bad, $columna_ultimo_logeo_bad,$campo_id,$id,$logeos_permitidos,$minutos_sancion,$ip,$link){
$link=Conectarse();
					if (filter_var($id, FILTER_VALIDATE_EMAIL)) {
						$campo='email';
					}else{
						$campo='user';
					}
					
$sql_exist_user = "select userid ";//comprobamos si existe usuario, sino ni nos molestamos en seguir
$sql_exist_user.= "from usuarios where $campo like '$id' limit 1" ;
$result_exist_user = $link->query($sql_exist_user);


$cant = $result_exist_user->num_rows;
	//if($row_exist_user =$result_exist_user->fetch_object()){
	if($cant>0){// comprobamos que existe el usuario
				
		$sql_exist = "select $columna_logeos_bad ";//comprobamos si existe registro de un logeo malo INET_NTOA(ip)
		$sql_exist.= "from $tabla where $campo_id = '$id' and ip = '$ip' limit 1" ;
		$result_exist = $link->query($sql_exist);
		
$cant2 = $result_exist->num_rows;

			//if($row_exist =$result_exist->fetch_object()){
			if($cant2>0){
				$sql = "select $columna_logeos_bad, $columna_ultimo_logeo_bad ";
				$sql.= "from $tabla where $campo_id like '$id' and ip = '$ip' " ;
				$result=$link->query($sql);
				$row = $result->fetch_object();
				//$row = mysql_fetch_array($result);
				$numero_logeos=$row->$columna_logeos_bad;
				
				$hora_ultimo_logeo=$row->$columna_ultimo_logeo_bad;
				$segundos_sancion=$minutos_sancion*60;
				$hora_actual=time();
				$diferencia=$hora_actual-$hora_ultimo_logeo;
				
					if( ( $diferencia < $segundos_sancion ) and  ($numero_logeos>=$logeos_permitidos) ){
					return true; // paso los logeos permitidos
					}else{
					return false; //aun no pasa los logeos permitidos
					}
			}else{
			return false;
			}
	}else{
	return false;	
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function aumentar_numero_logeos($tabla, $columna_logeos_bad, $columna_ultimo_logeo_bad,$campo_id,$id,$logeos_permitidos,$minutos_sancion,$ip,$link){//aumenta la cuenta  de logeos malos 

$link=conectarse();
					if (filter_var($id, FILTER_VALIDATE_EMAIL)) {
						$campo='email';
					}else{
						$campo='user';
					}
					
$sql_exist_user = "select userid ";//1 comprobamos si existe usuario, sino ni nos molestamos
$sql_exist_user.= "from usuarios where $campo = '$id' limit 1" ;
$result_exist_user = $link->query($sql_exist_user);
	
	if($row_exist_user =$result_exist_user->fetch_object()){ //---- SI EXISTE USUARIO
	//$ipv4=ip2long($ip_visit);
	$result=$link->query("select usuario from logeos_errados where usuario like '$id' and ip = '$ip' limit 1")  or die ($link->error);
	$numero = $result->num_rows;
	$hora_actual=time(); 
					
				if($numero<1){//----------NO EXISTE REGISTRO EN LOGEOS
				
				$sql = "INSERT INTO $tabla ($campo_id,$columna_logeos_bad,$columna_ultimo_logeo_bad,ip) ";
				$sql .= "VALUES ('$id','1','$hora_actual','$ip')";
			
						if($result = $link->query($sql)  or die ($link->error) ){
						echo '<center>Va 1 intentos de los '.$logeos_permitidos.' permitos, despues de agotado este numero de intentos tendra que esperar '.	$minutos_sancion.' minutos para volver a intentar iniciar sesion</center>';					
						
						}else{
						echo '<br><br><center>Error al intentar registrar la cuenta de logueos</center>';
						}
				
				}else{ // -----------------  YA HAY REGISTRO DE LOGEOS
						if($row = $result->fetch_object()){
						
						$sql_1 = "select $columna_logeos_bad, $columna_ultimo_logeo_bad ";
						$sql_1.= "from $tabla where $campo_id like '$id' and ip = '$ip' " ;
						$result_1=$link->query($sql_1) or die ($link->error);
		
						$row = $result_1->fetch_object();
						$numero_logeos_nuevo=$row->$columna_logeos_bad + 1;
						$hora_ultimo_logeo=$row->$columna_ultimo_logeo_bad;
						$segundos_sancion=$minutos_sancion*60;
						$hora_actual=time();
						$diferencia=$hora_actual-$row->$columna_ultimo_logeo_bad;
							
						if( $diferencia<$segundos_sancion ){ // si el ultimo logeo fue menor al tiempo de sancion establecido
							
						$sql = "UPDATE $tabla SET $columna_logeos_bad='$numero_logeos_nuevo', $columna_ultimo_logeo_bad='$hora_actual'";
						$sql .= "WHERE $campo_id='$id' and ip = '$ip'";
								
								if($result=$link->query($sql) or die ($link->error)){ 
								echo '<center>Va '.$numero_logeos_nuevo.' intentos de los '.$logeos_permitidos.' permitos, despues de agotado este numero de intentos tendra que esperar '.$minutos_sancion.' minutos para volver a intentar iniciar sesion</center>';
								}else{ echo '<br><center>ERROR: No se pudo actualizar conteo de logeos incorrectos</center><br>';}
								
						
						}else{
						$sql = "UPDATE $tabla SET $columna_logeos_bad='1', $columna_ultimo_logeo_bad='$hora_actual'";
						$sql .= "WHERE $campo_id='$id' and ip = '$ip'";
								
								if($result=$link->query($sql) or die ($link->error) ){
								echo 'Va 1 intento de los '.$logeos_permitidos.' permitos, despues de agotado este numero de intentos tendra que esperar '.$minutos_sancion.' minutos para volver a intentar iniciar sesion';
								}else{ 
								echo '<br><center>No se pudo actualizar conteo de logeos incorrectos</center><br>';
								}
					
						}
					}
			

	}//1
							$hace_30=$hora_actual-(60*60);//borrando entradas antiguas
							$sql = "DELETE FROM $tabla ";
							$sql .= "WHERE $columna_ultimo_logeo_bad < $hace_30";
							$result = $link->query($sql);
								if($result = $link->query($sql)){
								
								}

	}else{
	echo 'No se encontró -> '.$id;	
	}
}
?>