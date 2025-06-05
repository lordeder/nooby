<?php
////////////////////////////////////////////////////////////////
function grado_nivel_s($tipo,$grado,$nivel,$seccion){
// NIVELes 1
$niv_array=array();
$niv_array['0'] = 'Jard&iacute;n / inicial';
$niv_array['1'] = 'Primaria';
$niv_array['2'] = 'Secundaria';
// NIVELes 2
$niv2_array=array();
$niv2_array['0'] = ' A&ntilde;os ';
$niv2_array['1'] = ' Grado ';
$niv2_array['2'] = ' A&ntilde;o ';
$niv2_array['3'] = ' ???? ';
// SECCIONES
$seccion_array=array();
$seccion_array['0'] = '&Uacute;nica';
$seccion_array['1'] = '"A"';
$seccion_array['2'] = '"B"';
$seccion_array['3'] = '"C"';
$seccion_array['4'] = '"D"';
$seccion_array['5'] = '"E"';
$seccion_array['6'] = '"F"';
$seccion_array['7'] = '"G"';
$seccion_array['8'] = '"H"';
$seccion_array['9'] = '"I"';
$seccion_array['10'] = '"J"';
$seccion_array['11'] = '"K"';

		if($nivel==0){
		
					if($tipo=='largo'){
					
								if($seccion=='0'){
										if($grado==5){
										return 'Jardin';
										}else{
										return 'Inicial de '.$grado.' a&ntilde;os';
										}
								}else{ //$seccion
								
								
								}
					
					}else{
							if($grado==5){
							return 'Jardin';
							}else{
							return 'Inicial de '.$grado;
							}
					}
		
		
		
		}else{
				if($tipo=='largo'){ //1� de secundaria seccion A
					 return $grado.'&ordm; de '.$niv_array["$nivel"].' seccion '.$seccion_array["$seccion"];
					 
				}elseif($tipo=='corto'){  //1� A�o A
				
					if($seccion=='0'){
					 return $grado.'&ordm; '.$niv2_array["$nivel"];
					 }else{
					 return $grado.'&ordm; 
					 '.$niv2_array["$nivel"].' 
					 '.$seccion_array["$seccion"];
					 }
					 
				}else{
				echo 'Primer parametro de la funcion no esta definido correctamente';
				}
		}
}
?>