<?php 

error_reporting (E_ALL);
ini_set("display_errors","1");

header("Content-Type: text/html;charset=utf-8");
ini_set("session.cookie_lifetime","999999");
ini_set("session.gc_maxlifetime","999999");
session_start();


include('config.php');
include_once($dir_file_conexion.'conexion.php');
include ('id.php');

////// Para las estadisticas ///////

include_once($dir_funciones_page.'funciones_basicas/ip.php');
include_once($dir_funciones_page.'funciones_consultas/stats.php');
$ip=getRealIP();
$ip='127.0.0.1'; // para localhost

////////////////////////////////////

?>



	<?php if($existe_page){					

		include ($page_contenido); // en id.php

		}else{

		echo '<br /><br /><br /><h2 align="center">Página no encontrada</h2>';

		if($mod_debug){
      mensaje_error('No se encontro archivo '.$archivo.'<br>','img/');
      echo '<br>carpeta '.$carpeta_contenidos.'/'.$carpeta_del_modulo.'/'.$archivo;		
      echo '<br>Identificador del modulo: '.$moduloid.'<br>
            <br>$id='.$id.'<br>

            consulta: Tabla ('.$tabla_items_pagina.') columna (id) valor ('.$id.')
      ';

    }

		} ?>

	

</body>

</html>