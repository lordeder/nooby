<?php
function hace_cuanto($fecha){
//$fecha="2012-02-14 00:00:00";

$fecha_fecha = explode(" ", $fecha);
$fecha_sin_hora=$fecha_fecha[0];
$trozos = explode("-", $fecha_sin_hora);
$anio = $trozos[0];
$mes = $trozos[1];
$dia = $trozos[2];

if(isset($fecha_fecha[1])){

$solo_hora_fecha=$fecha_fecha[1];
$trozo = explode(":", $solo_hora_fecha);
$hora=$trozo[0];
$minutos=$trozo[1];

		if($hora>=12){
		$meridiano='p.m.';
			if($hora>12){$hora=$hora-12;}
		}else{
		$meridiano='a.m.';
		}
		
}
//$fecha_fecha_actual=explode(" ", strtotime('now'));
//$fecha_actual_sin_hora=$fecha_fecha_actual[0];
$ano_actual=date("Y",time ());
							$mes_actual=date("m",time ());// numero del mes formato 01
							$nes_actual=date("n",time ());// numero del mes formato 1
							$dia_actual=date("d",time ());
							$dia_actual_sin_cero=date("j",time ());
							//$hora_actual=date("H",time ());//hora 00
							//$minutos_actual=date("i",time ());//hora 00
							//$segundos_actual=date("s",time ());//hora 00
$fecha_actual_sin_hora="$ano_actual-$mes_actual-$dia_actual";


$segundos=strtotime('now') - strtotime($fecha) ;
$diferencia_dias=intval($segundos/60/60/24);


$timestamp1 = mktime(0,0,0,$mes_actual,$dia_actual,$ano_actual);
$timestamp2 = mktime(0,0,0,$mes,$dia,$anio); 

$segundos_diferencia = $timestamp1 - $timestamp2;
$dias_diferencia_relativa = $segundos_diferencia / (60 * 60 * 24); 



//$diferencia_horas=intval($segundos/60/60);
//$diferencia_minutos=intval($segundos/60);
//$diferencia_segundos=intval($segundos);

if($fecha_actual_sin_hora==$fecha_sin_hora){// es en el mismo dia

$diferencia_horas=intval($segundos/60/60);
$diferencia_minutos=intval($segundos/60);

		if(isset($fecha_fecha[1])){//si la fecha tiene la hora
					if($segundos<60 and $segundos>0){
					return 'Hace menos de un minuto ';
					}elseif($diferencia_minutos<2  and $segundos>0){
					return 'Hace un minuto';
					}elseif($diferencia_minutos<60  and $segundos>0){
					return 'Hace '.$diferencia_minutos.' minutos ';
					}elseif($diferencia_horas<2  and $segundos>0){
					return 'Hace aproximadamente 1 hora ('.$hora.':'.$minutos.' '.$meridiano.')';
					}elseif($diferencia_horas>=2  and $segundos>0){
					return 'Hace '.$diferencia_horas.' horas ('.$hora.':'.$minutos.' '.$meridiano.')';
					
					}elseif($segundos<0){
						$diferencia_minutos=$diferencia_minutos*-1;
						$segundos=$segundos*-1;
						$diferencia_horas=$diferencia_horas*-1;
						
									if($segundos<60){
									return 'En menos de un minuto ';
									}elseif($diferencia_minutos<2){
									return 'En un minuto';
									}elseif($diferencia_minutos<60){
									return 'En '.$diferencia_minutos.' minutos ';
									}elseif($diferencia_horas<2){
									return 'Aproximadamente en 1 hora ('.$hora.':'.$minutos.' '.$meridiano.')';
									}elseif($diferencia_horas>=2){
									return 'Dentro de '.$diferencia_horas.' horas ('.$hora.':'.$minutos.' '.$meridiano.')';
									}
					}else{
					return ' error de fecha';
					}
		}else{
		return 'Hoy';
		}

}elseif($dias_diferencia_relativa==1){// fue dia anterior
	
	if(isset($fecha_fecha[1])){//Si la fecha dada tiene hora
	return 'Ayer a las '.$hora.':'.$minutos.' '.$meridiano;
	}else{
	return 'Ayer';
	}
	


}else{//mas de 1 dia
	if($dias_diferencia_relativa<0){
		$dias_diferencia_relativa=$dias_diferencia_relativa*-1;
			if($dias_diferencia_relativa==1){
				return 'Ma&ntilde;ana ('.$dia.'-'.$mes.'-'.$anio.')';
			}else{
			return 'En '.$dias_diferencia_relativa.' dias ('.$dia.'-'.$mes.'-'.$anio.')';
			}
	}else{
	return 'Hace '.$dias_diferencia_relativa.' dias';
	}
}


//echo "La cantidad de d�as entre el ".$fecha." y hoy es <b>".$diferencia_dias."</b>";
}
?>