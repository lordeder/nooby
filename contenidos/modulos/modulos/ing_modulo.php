<?php 
if(isset($_POST['texto1'])){
include_once($dir_funciones_page.'funciones_consultas/ingresar.php');
$nombre_modulo=verifica_inyeccion($_POST['texto1']);
	if(existe_registro($tabla_modulos_pagina,'nombre',$nombre_modulo,$link)){
	mensaje_error('Ya existe un modulo registrado con ese nombre','');
	
	}elseif(ing_registro($nombre_modulo,'nombre',$tabla_modulos_pagina,$link)){
	include_once($dir_funciones_page.'funciones_consultas/mostrar_ajax.php');
	include_once($dir_funciones_page.'funciones_consultas/ultimo_id.php');
	
		$db_tabla=$tabla_modulos_pagina;//$_GET['db_tabla'];
		$db_columna='nombre';//$_GET['db_columna'];
		$db_columnaid='moduloid';//$_GET['db_columnaid'];
		$v_id=ultimo_id($tabla_modulos_pagina,'moduloid',$link);//$_GET['v_id'];
		$div_respuesta='div_modulo_'.$v_id;//$_GET['div_respuesta'];
		$id_page=$_GET['id'];
		$action_name='form_mod_valor';
		$texto='<button type="button" class="btn btn-outline-success"><i class="mdi mdi-edit"></i></button>';
		//$texto='<div style="float: right;" class="showme"><img src="img/pencil.png" width="16" height="16" title="Editar" /></div>';		
		//mostrar($db_columna,$db_tabla,$db_columnaid,$v_id,$link).mostrar_mod1($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$action_name);
		?>
		<table align="center" border="0">
	  <tr>
		<td><div align="center" id="div_modulo_<?php  echo $v_id; ?>"><?php  echo $nombre_modulo; ?></div></td>
		<td>	
			
<?php  echo mostrar_mod1($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$action_name); ?>
<a href="contenedor_ajax.php?id=admin&action=del_modulo&id_modulo=<?php  echo $v_id; ?>" rel="facebox">
<button type="button" class="btn btn-outline-danger"><i class="mdi mdi-delete"></i></button>
</a>
		</td>
	  </tr>
	</table>
<br />
<?php 
	}else{
	mensaje_error('No se pudo crear modulo','');
	}
}else{
mensaje_error('No se recibi� formulario para ingresar m�dulo','');
}
?>