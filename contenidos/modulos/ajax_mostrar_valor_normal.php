<?php

include_once($dir_funciones_page.'funciones_consultas/mostrar_ajax.php');
		$db_tabla=$_GET['db_tabla'];
		$db_columna=$_GET['db_columna'];
		$db_columnaid=$_GET['db_columnaid'];
		$v_id=$_GET['v_id'];
		$div_respuesta=$_GET['div_respuesta'];
		$id_page=$_GET['id_page'];
		$action_name='ajax_form_mod_input';
		//$texto='<div style="float: right;" class="showme"><h4 class="text-warning"> <i class="mdi mdi-mode-edit"></i></div>';
		//$texto='';
		$texto=' <img align="absbottom" src="img/pencil.png" width="16" height="16" alt="Editar" title="Editar" border="0"> ';
		echo mostrar($db_columna,$db_tabla,$db_columnaid,$v_id,$link).mostrar_mod1($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$action_name);
		
?>