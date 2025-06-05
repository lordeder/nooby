<?php
function getUserIP() {
    // Comprobar si est� detr�s de un proxy
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
/////////////////////////////////////////////////////////////////////////////////////////////
function comprobar_ultimo_logeo($tabla, $logeos_bad, $ultimo_logeo_bad,$campo_id,$id,$logeos_permitidos,$minutos_sancion,$ip,$link){

$sql = "select logeos_bad, ultimo_logeo_bad, ip ";
$sql.= "from $tabla where $campo_id like '$id' and ip = $ip limit 1" ;
$result = $link->query($sql);

if($row =$result->fetch_object()){
		$numero_logeos=$row->logeos_bad;
		
		$hora_ultimo_logeo=$row->ultimo_logeo_bad;
		$segundos_sancion=$minutos_sancion*60;
		$hora_actual=time();
		$diferencia=$hora_actual-$hora_ultimo_logeo;
		
			if( ( $diferencia < $segundos_sancion ) and  ($numero_logeos>=$logeos_permitidos) ){
			return true;
			}else{
			return false; // Denegar acceso
			}
		}else{
		return false; // Denegar acceso
		}
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function aumentar_numero_logeos($tabla, $logeos_bad, $ultimo_logeo_bad,$campo_id,$id,$logeos_permitidos,$minutos_sancion,$link){//aumenta la cuenta  de logeos malos 
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
  $ip=$_SERVER['REMOTE_ADDR'];
}
$ip_conv = ip2long($ip);//convierte IP a solo numeros
// SELECT INET_NTOA(ip) FROM 'user' WHERE 1		//convertir consulta numerica a IP

$result_2=@$link->query("select user from usuarios where user like '$id' limit 1") or die ($link->error);// SI EXISTE USUARIO
	if ($row_2 = $result_2->fetch_object()){
	
	////////////////////////////////////////////////////////////
	$result=@$link->query("select $campo_id from $tabla where $campo_id like '$id' and ip = $ip_conv limit 1");
$numero = @$result->num_rows;

if($numero<1){
	$hora_actual=time();
	$sql = "INSERT INTO $tabla ($campo_id,logeos_bad,ultimo_logeo_bad,ip) ";
	$sql .= "VALUES ('$id','1','$hora_actual','$ip_conv')";

	if($result = $link->query($sql)){
		echo '<center>Va 1 intentos de los '.$logeos_permitidos.' permitos, despues de agotado este numero de intentos tendra que esperar '.	$minutos_sancion.' minutos para volver a intentar iniciar sesion</center>';					
	}else{
	echo 'Error al intentar registrar la cuenta de logueos';
	}
	
}else{
		$sql_1 = "select logeos_bad, ultimo_logeo_bad,ip ";
		$sql_1.= "from $tabla where $campo_id like '$id' and ip = $ip_conv " ;
		$result_1 = $link->query($sql_1);
		
		//$row = mysql_fetch_array($result_1);
		$row = $result_1->fetch_object();
		
		$numero_logeos_nuevo=$row->logeos_bad + 1;
		$hora_ultimo_logeo=$row->ultimo_logeo_bad;
		$segundos_sancion=$minutos_sancion*60;
		$hora_actual=time();
		$diferencia=$hora_actual-($row->ultimo_logeo_bad);
		
		if( $diferencia<$segundos_sancion ){ // si el ultimo logeo fue menor al tiempo de sancion establecido
			
			$sql = "UPDATE $tabla SET logeos_bad='$numero_logeos_nuevo', ultimo_logeo_bad='$hora_actual'";
			$sql .= "WHERE $campo_id='$id' and ip = $ip_conv";
				if($result = $link->query($sql)){
				echo '<center>Va '.$numero_logeos_nuevo.' intentos de los '.$logeos_permitidos.' permitos, despues de agotado este numero de intentos tendra que esperar '.$minutos_sancion.' minutos para volver a intentar iniciar sesion</center>';
				}else{ echo '<br>No se pudo actualizar conteo de logeos incorrectos<br>';}
				
		
		}else{
			$sql = "UPDATE $tabla SET logeos_bad='1', ultimo_logeo_bad='$hora_actual'";
			$sql .= "WHERE $campo_id='$id' and ip = $ip_conv";
				if($result = $link->query($sql)){
				echo 'Va 1 intento de los '.$logeos_permitidos.' permitos, despues de agotado este numero de intentos tendra que esperar '.$minutos_sancion.' minutos para volver a intentar iniciar sesion';
				}else{ 
				echo '<br>No se pudo actualizar conteo de logeos incorrectos<br>';
				}

		}
	}

	///////////////////////////////////////////////////////////	
	}else{//EL USUARIO NO EXISTE
	
	}
			
		
		}
///////////////////////////////////////////////////////////////////////////////////////
?>