<?php 
$url_login_face='http://www.g4mers.club';
$mod_debug=true;
$oblig_login_dow=false;//false default
$dir_funciones_page='admin/funciones/';
$dir_file_conexion='admin/';
$tabla_usuarios='usuarios';
$id_default='1'; //items_modu_panel
$files_front='';
$bootstrap='/bootstrap-4.4.1/';
$iconos='material-design-icons-master/';
$icono_pagina=$files_front.'images/iconotaki.png';
$url_p_redes='';

/*
tipos de usuarios
0 =>
1 => Normal
2 => SemiAdmin
3 => Root
9 => Ficticio
*/

// Obtener la URL base del archivo actual
$url = $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
// Construir el enlace dinámico


//////////		C O N T R O L   P A N E L	 ///////////////// $tabla_items_pagina
$dir_funciones='funciones/';
$carpeta_modulos='modulos';
$carpeta_contenidos='contenidos';// son los modulos, cada modulo es una carpeta

$tabla_modulos_panel='modulos_super_admin';//'modulos';//los modulos que usa el sistema actual
$tabla_items='items_modu_superadmin';//'items_modu_panel';//item de los modulos
$tabla_usuarios_permisos='usuarios_permisos_s_a';
$tabla_modulos_pagina='modulos';//'modulos';//los modulos que usa el sistema actual
$tabla_items_pagina='items_modu_panel';//'items_modu_panel';//item de los modulos  --  Cada ?id=nombre 
$pagina_datos='pagina_datos';
//////////		E N D    C O N T R O L   P A N E L	 /////////////////



/// instrucciones
// para la tabla de puntuaciones estos son los tipos
// 1 = audios		2 = album		3 = visitas del audio		4 visitas de perfil		5 descargas		6 agregados a favoritos 	7 Visitas a favoritos
// 8 = visitas de album

// ALERTAS	1 = musica			2 = album			3 = calificaciion 

// PARA LA TABLA DE COMENTARIOS ESTOS SON LO TIPOS
// 1 = musica		2 = album		3 = album_autor		4 = musica_autor
////////////////////////


$tipo_url='normal';

///////////////////////////////////////////////
function tipo_direccion($tipo_url,$columnas){
$nivel_0='id';
$nivel_1='action';
$nivel_2='valor';
$nivel_3='valor2';
$nivel_4='valor3';

$array_columnas= explode(',',$columnas);
$elementos = count($array_columnas);
$resultado1='';
$resultado='';

	if($tipo_url==='normal'){
		for($i=0;$i<$elementos;$i++){
		//$columna=trim($array_columnas[$i]);
		$resultado.= ${"nivel_$i"}.'='.trim($array_columnas[$i]).'&';
		}
		return '/'.substr('?'.$resultado,0,-1);
		
	}else{// amigable PARA google
	
		for($i=0;$i<$elementos;$i++){
		$resultado.= '/'.trim($array_columnas[$i]);
		}
		return  $resultado;
	}
}
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////
function tipo_direccion_2($tipo_url,$columnas){
$nivel_0='id';
$nivel_1='action';
$nivel_2='valor';
$nivel_3='valor2';
$nivel_4='valor3';

$array_columnas= explode(',',$columnas);
$elementos = count($array_columnas);
$resultado1='';
$resultado='';

	if($tipo_url==='normal'){
		for($i=0;$i<$elementos;$i++){
		//$columna=trim($array_columnas[$i]);
		$resultado.= ${"nivel_$i"}.'='.trim($array_columnas[$i]).'&';
		}
		return substr('?'.$resultado,0,-1);
		
	}else{// amigable PARA google
	
		for($i=0;$i<$elementos;$i++){
		$resultado.= trim($array_columnas[$i]);
		}
		return  $resultado;
	}
}
?>