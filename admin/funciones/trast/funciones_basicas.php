<?php function encrip($cadena){
md5($cadena);

}
//////////////////////////////////////////////////////////////
function caracteres_html($texto){
   $texto = htmlentities($texto, ENT_NOQUOTES, 'UTF-8'); // Convertir caracteres especiales a entidades
   $texto = htmlspecialchars_decode($texto, ENT_NOQUOTES); // Dejar <, & y > como estaban
   return $texto;
   
	   if ( !function_exists('htmlspecialchars_decode') )
	 {
	   function htmlspecialchars_decode($text)
	   {
		 return strtr($text, array_flip(get_html_translation_table(HTML_SPECIALCHARS)));
	   }
	 }
 
}
///////////////////////////////////////////////////////////////////////////////////////
function mensaje_error($mensage,$url_img){
	echo '
	<table border="0" align="center" cellpadding="20" cellspacing="0" bgcolor="#FFFF84">
  	<tr>
    <td align="center">

	<font color="#FF0000"> 
	<img src="'.$url_img.'error.png" alt="Error" width="16" height="16" /><br>
	'.$mensage.'
	</font><br>
	</td>
  </tr>
</table>
	';
	}
////////////////////////////////////////////////////////////////////////////////////////	
function mensaje_ok($mensage,$url_img){
	echo '
	<table border="0" align="center" cellpadding="0" cellspacing="0">
  	<tr>
    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />
	
	<img src="'.$url_img.'ok.png" alt="OK" width="16" height="16" />
	<strong><font color="#009900">
	<br />
      '.$mensage.'</font></strong></font> 
	  
	  <br />
	  &nbsp;&nbsp;&nbsp;</font>&nbsp;&nbsp;&nbsp; </td>
  	</tr>
	</table>';
	}
		////////////////////////////////////////////////////////////////////////////////////////	
function mensaje_ok_2($mensage,$url_img){
	echo '
	<center>
	<img src="'.$url_img.'ok.png" alt="OK" width="16" height="16" align="absmiddle" />
	<strong><font color="#009900">

      '.$mensage.'</font></strong></font> </center>'
	  
	 ;
	}
	///////////////////////////////////////////////////////////////////////////////////////
function mensaje_error_2($mensage,$url_img){
	echo '
	<center>
	<img src="'.$url_img.'error.png" alt="Error" width="16" height="16" align="absmiddle" /><strong>
	<font color="#FF0000">'.$mensage.'
	</font></center>';
	}
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////	
function mensaje_alert2($mensage,$url_img){
	echo '
	<center>
	<img src="'.$url_img.'alert.png" alt="Alert" width="16" height="16" align="absmiddle" /><strong>
	<font color="#FF0000">'.$mensage.'
	</font></center>';
	}
//////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////	
function mensaje_alert($mensage,$url_img){
	echo '
	<table border="0" align="center" cellpadding="0" cellspacing="0">
  	<tr>
    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />
	
	<img src="'.$url_img.'alert.png" alt="alert" width="16" height="16" />
	<strong><font color="#0000ff">
	<br />
      '.$mensage.'</font></strong></font> 
	  
	  <br />
	  &nbsp;&nbsp;&nbsp;</font>&nbsp;&nbsp;&nbsp; </td>
  	</tr>
	</table>';
	}
//////////////////////////////////////////////////////////////
function verifica_inyeccion($cod)
    {
    $patron_cod = '^([0-9a-z\/\@\:\�\�\�\�\�\�\�\�\�\�\?\�\;\,]*([-|_|.|\r|\n| ]?[0-9a-z\/\@\:\�\�\�\�\�\?\�\;\,]+)*)(([-|_|.|\r|\n| ]?)([-|_|.|\r|\n| ]?)[0-9a-z\/\@\:\�\�\�\�\�\?\�\;\,]*([-|_|.|\r|\n| ]?[0-9a-z\/\@\:\�\�\�\�\�\?\�\;\,]+)+)*([-|_|.|\r|\n| ]?)$';
        $veri_cod = preg_match( '/'.$patron_cod.'/i', $cod );

	    if ($veri_cod)
        {
        return $cod;
        }
        else
        {
        return NULL;
        }
    }
/////////////////////////////////////////////////////////////////
function redireccionar_x_seg($direccion,$contenido,$titulo,$seg){
	
	echo '
	<html><head><title>'.$titulo.'</title>
	<META HTTP-EQUIV="Refresh" CONTENT="'.$seg.';URL='.$direccion.'">
	</head>
	<body>'.$contenido.'</body></html>
	';
	}

//////////////////////////////////////////////////////////////////////
function extraer_fecha($parte,$fecha){

	$trozos = explode("-", $fecha);
	
	if($parte=='ano'){
	return $trozos[0];
	
	}elseif($parte=='mes'){	
	return $trozos[1];
	
	}elseif($parte=='dia'){	
	return $trozos[2];
	
	}else{
	return 'ERROR';
	
	}

}
////////////////////////////////////////////////////////////////////////////
function invertir_fecha($fecha){// 20-04-2009 -> 2009-04-20
	$apariciones=substr_count($fecha, '-');
	if($apariciones==2){
	$trozos = explode("-", $fecha);	
	return $trozos[2].'-'.$trozos[1].'-'.$trozos[0];
	}

}

/////////////////////////////////////////////////////////////////////////////////////////////
function tamano_archivo($numero){
	if($numero<1024){
	return $numero.' Bytes';
	}elseif($numero<1048576)
	{
	$numero=number_format(($numero/1024),2);
	return $numero.' KB';
	}else{
	$numero=($numero/1024)/1024;
	$numero=number_format($numero,2);
	return $numero.' MB';
	}
}

function hora_minutos($hora,$tipo){

	if($tipo=='24')
	{
	$hora_1=explode( ":", $hora);
	return $hora_1[0].':'.$hora_1[1];
	
	}
	else
	{
		$hora_1=explode( ":", $hora);
		if($hora_1[0]>12)
		{
		$hora_2=$hora_1[0]-12;
		return $hora_2.':'.$hora_1[1].' p.m';
		}
		else
		{
		return $hora_1[0].':'.$hora_1[1].' a.m';
		}	
	}
}
///////////////////////////////////////////////
function tiempo_segundos($segundos){
$minutos=$segundos/60;
$horas=floor($minutos/60);
$minutos2=$minutos%60;
$segundos_2=$segundos%60%60%60;
if($minutos2<10)$minutos2='0'.$minutos2;
if($segundos_2<10)$segundos_2='0'.$segundos_2;

if($segundos<60){ /* segundos */
$resultado= round($segundos).' Segundos';
}elseif($segundos>60 && $segundos<3600){/* minutos */
$resultado= $minutos2.':'.$segundos_2.' Minutos';
}else{/* horas */
$resultado= $horas.':'.$minutos2.':'.$segundos_2.' Horas';
}
return $resultado;
}
/////////////////////////////////////////////////////////////
function solocaracteresyguion($cadena){
$expresion='/^[a-zA-Z0-9_-]{2,40}$/';//'^[a-zA-Z0-9]{4,10}$';
	$resp=preg_match($expresion, $cadena);
	//echo "Preg_match:$resp, Nueva: $cadena<br>";
	if ($resp>0) {
		//echo "TODO EN ORDEN, cadena => $cadena";
		return true;
	} else {
		//echo "La clave no cumple con los parametros establecidos<br>";
		return false;
                }  
}
/////////////////////////////////////////////////////////////
function validar_ruta($cadena){
$expresion='/^[a-zA-Z0-9_-\/]{2,200}$/';//'^[a-zA-Z0-9]{4,10}$';
	$resp=preg_match($expresion, $cadena);
	//echo "Preg_match:$resp, Nueva: $cadena<br>";
	if ($resp>0) {
		//echo "TODO EN ORDEN, cadena => $cadena";
		return true;
	} else {
		//echo "La clave no cumple con los parametros establecidos<br>";
		return false;
                }  
}



function inversa_nl2br($string) {
//$buscar=array("\r\n", "\r", "\n");
$string = str_replace("<br />", "\n", $string);
$string = str_replace("\n\n", "\n", $string);
return $string;

//$Texto = str_replace ("<br />", "\r\n", $Texto)

} 
////////////////////////////////////////////////////////////////////////////////////
function validar_clave_1($clave,$mostrar_error){

if($mostrar_error=1){
	if(strlen($clave) < 6){
      echo "La clave debe tener al menos 6 caracteres<br>";
   }
   if(strlen($clave) > 18){
      echo "La clave no puede tener m�s de 18 caracteres<br>";
   }
   if (!preg_match('`[a-z]`',$clave)){
      echo "La clave debe tener al menos una letra min&uacute;scula<br>";
   }
   if (!preg_match('`[A-Z]`',$clave)){
      echo "La clave debe tener al menos una letra may&uacute;scula<br>";
   }
   if (!preg_match('`[0-9]`',$clave)){
      echo "La clave debe tener al menos un caracter num&eacute;rico";
   }
   
}else{
   if(strlen($clave) < 6){
      return false;
   }elseif(strlen($clave) > 18){
      return false;
   }elseif (!preg_match('`[a-z]`',$clave)){
      return false;
   }elseif (!preg_match('`[A-Z]`',$clave)){
      return false;
   }elseif (!preg_match('`[0-9]`',$clave)){
      return false;
   }else{
   return true;
   }
}
 
} 
///////////////////////////////////////////////////
function limpia_espacios($cadena){
    $cadena = ereg_replace( "([ ]+)", "", $cadena );
    return $cadena;
}


/*
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
					if($segundos<60){
					return 'Hace menos de un minuto ';
					}elseif($diferencia_minutos<2){
					return 'Hace un minuto';
					}elseif($diferencia_minutos<60){
					return 'Hace '.$diferencia_minutos.' minutos ';
					}elseif($diferencia_horas<2){
					return 'Hace aproximadamente 1 hora ('.$hora.':'.$minutos.' '.$meridiano.')';
					}elseif($diferencia_horas>=2){
					return 'Hace '.$diferencia_horas.' horas ('.$hora.':'.$minutos.' '.$meridiano.')';
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

	return 'Hace '.$dias_diferencia_relativa.' dias';
}


//echo "La cantidad de d�as entre el ".$fecha." y hoy es <b>".$diferencia_dias."</b>";
}
*/
	?>