<?php
$ano=date("Y",time ());
$mes=date("m",time ());
$dia=date("d",time ());
function invertir_fecha($fecha){// 20-04-2009 -> 2009-04-20
	$apariciones=substr_count($fecha, '-');
	if($apariciones==2){
	$trozos = explode("-", $fecha);	
	return $trozos[2].'-'.$trozos[1].'-'.$trozos[0];
	}

}

function validar_fecha_sin_invertir($fecha){
	$valores = explode('-', $fecha);
	$apariciones=substr_count($fecha,'-');
	if(is_numeric($valores[1]) & is_numeric($valores[0]) & is_numeric($valores[2]) ){
		if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
		//if($apariciones == 2 && checkdate($valores[1], $valores[0], $valores[2])){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

function validateTime($time){
    $pattern="/^([0-1][0-9]|[2][0-3])[\:]([0-5][0-9])[\:]([0-5][0-9])$/";
    if(preg_match($pattern,$time)){
        return true;
	}else{
    return false;
	}
}

function fecha_es_pasada($fecha){
	//$fecha="2012-02-14 00:00:00";
	//$segundos=strtotime('now') - strtotime($fecha);
	
	if(strtotime('now')>strtotime($fecha)){
		return true;
	}else{
		return false;
	}
}
?>