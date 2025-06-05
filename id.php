<?php 
@session_start();
include_once('config.php');
@date_default_timezone_set('America/Lima');
include_once($dir_file_conexion.'conexion.php');
include_once($dir_file_conexion.'conexion2.php');
$link=conectarse();
$link2=conectarse2();
include_once($dir_funciones_page.'funciones_consultas/existe.php');
include_once($dir_funciones_page.'funciones_consultas/mostrar.php');
include_once($dir_funciones_page.'funciones_consultas/mostrar_varios.php');
include_once($dir_funciones_page.'funciones_basicas/normaliza.php');
include_once($dir_funciones_page.'funciones_basicas/verifica.php');
include_once($dir_funciones_page.'funciones_basicas/mensajes_error_ok.php');


////// Para las estadisticas ///////
include_once($dir_funciones_page.'funciones_basicas/ip.php');
include_once($dir_funciones_page.'funciones_consultas/stats.php');
$ip=getRealIP();
$ip='127.0.0.1'; // para localhost
////////////////////////////////////

if(isset($_GET['id'])){
$id=trim(verifica_inyeccion($_GET['id']));
	
	if(existe_registro($tabla_items_pagina,'id',$id,$link)){//
	
	$datos_page= explode('.,-',mostrar_varios2('titulo, archivo, head, moduloid, imagen, descripcion, meta_variable',$tabla_items_pagina,'id',$id,$link));
	$titulo_pagina=$datos_page[0];
	$archivo=$datos_page[1];
	$head=$datos_page[2];
	$moduloid=$datos_page[3];
	$imagen_redes=$datos_page[4];
	$descripcion=$datos_page[5];
	$meta_variable=$datos_page[6];
	$carpeta_del_modulo=normaliza(strtolower(mostrar('nombre',$tabla_modulos_pagina,'moduloid',$moduloid,$link)));
	
					if(file_exists($carpeta_contenidos.'/'.$carpeta_del_modulo.'/'.$archivo)){//verificamos en la carpeta del modulo 
					$page_contenido=$carpeta_contenidos.'/'.$carpeta_del_modulo.'/'.$archivo;	
								if(file_exists($carpeta_contenidos.'/'.$carpeta_del_modulo.'/config.php')){//Archivo de configuracion
								include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/config.php');
								}		
								if(file_exists($carpeta_contenidos.'/'.$carpeta_del_modulo.'/head_tags.php')){//PARA LOS TAGS del HEAD y redes sociales
								include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/head_tags.php');
								}		
					$existe_page=true;
					}else{ 					
					$existe_page=false;
					}		
	}else{
	$titulo_pagina='Pagina no encontrada';
	$archivo='';
	$head='';
	$imagen_redes='';
	$descripcion='';
	$meta_variable='';
	$existe_page=false;
	$carpeta_del_modulo='tienda';
	$page_contenido='/contenidos/index.php';
	$moduloid='No encontrado en DB';
	}

}else{

////////////////////////////////	p	o	r		d	e	f	e	c	t	o	//////////////////////////////

//if(!isset($_GET['id'])){
$id=mostrar('default_item','pagina_datos','id_page',$id_default,$link); //TABLA pagina_datos busca cual es el id por defecto

	if(existe_registro($tabla_items_pagina,'id',$id,$link)){//
			$datos_page= explode('.,-',mostrar_varios2('titulo, archivo, head, moduloid, imagen, descripcion, meta_variable',$tabla_items_pagina,'id',$id,$link));
			$titulo_pagina=$datos_page[0];
			$archivo=$datos_page[1];
			$head=$datos_page[2];
			$moduloid=$datos_page[3];
			$imagen_redes=$datos_page[4];
			$descripcion=$datos_page[5];
			$meta_variable=$datos_page[6];

			$carpeta_del_modulo=normaliza(strtolower(mostrar('nombre',$tabla_modulos_pagina,'moduloid',$moduloid,$link)));
							
							if(file_exists($carpeta_contenidos.'/'.$carpeta_del_modulo.'/'.$archivo)){//verificamos en la carpeta del modulo 
							//include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/'.$archivo);
							$page_contenido=$carpeta_contenidos.'/'.$carpeta_del_modulo.'/'.$archivo;
										if(file_exists($carpeta_contenidos.'/'.$carpeta_del_modulo.'/config.php')){//Archivo de configuracion
										include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/config.php');
										}		
										if(file_exists($carpeta_contenidos.'/'.$carpeta_del_modulo.'/head_tags.php')){//PARA LOS TAGS del HEAD y redes sociales
										include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/head_tags.php');
										}
							$existe_page=true;
							}else{ 					
							$existe_page=false;
							}		
	}else{
		echo 'No se ha encontrado el id por defecto ('.$id.') en la tabla de datos de la página (id_page = "'.$id_default.'") en "'.$tabla_items_pagina.'", por favor verifique la configuracion de la pagina.';
		$titulo_pagina='Pagina no encontrada';
		$archivo='';
		$head='';
		$imagen_redes='';
		$descripcion='';
		$meta_variable='';
		$moduloid='No encontrado en DB';
		$carpeta_del_modulo='No encontrado en DB';
		$existe_page=false;
	}
						
}
?>