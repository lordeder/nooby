<?php 
$identificador='321';
?>
<table align="center" border="0">
	  <tr>
		<td><input name="texto_1<?php  echo $identificador; ?>" type="text" id="texto_1<?php  echo $identificador; ?>" value="" /></td>
		<td>	
<input name="button" type="button" onclick="ing('div_listar_modulos','<?php  echo $_GET['id']; ?>', 'ing_modulo', '<?php  echo $identificador; ?>', '11');" value="Registrar módulo"/>
<?php 
/*
			//add 1 aumenta el div al final, no lo reemplaza y borra los inputs
			//add 11 aumenta el div al inicio, no lo reemplaza y NO borra los inputs
			//add 12 reemplaza div y NO borra los inputs
			*/
			?>
		</td>
	  </tr>
	</table>
	
	<div id="div_listar_modulos">
	<?php 
	
	$result=$link->query("select moduloid, nombre from $tabla_modulos_pagina order by nombre asc") or die ($link->error);
	while($row = $result->fetch_object()) { 
	include_once($dir_funciones_page.'funciones_consultas/mostrar_ajax.php');
		$db_tabla=$tabla_modulos_pagina;//$_GET['db_tabla'];
		$db_columna='nombre';//$_GET['db_columna'];
		$db_columnaid='moduloid';//$_GET['db_columnaid'];
		$v_id=$row->moduloid;//$_GET['v_id'];
		$div_respuesta='div_modulo_'.$v_id;//$_GET['div_respuesta'];
		$id_page=$_GET['id'];
		$action_name='form_mod_valor';
		$texto='<button type="button" class="btn btn-outline-success"><i class="mdi mdi-pencil"></i></button>';
		//$texto='<div style="float: right;" class="showme"><img src="img/pencil.png" width="16" height="16" title="Editar" /></div>';		
		//mostrar($db_columna,$db_tabla,$db_columnaid,$v_id,$link).mostrar_mod1($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$action_name);
		?>
		<table align="center" border="0">
	  <tr>
		<td><div align="center" id="div_modulo_<?php  echo $row->moduloid; ?>"><?php  echo $row->nombre; ?></div></td>
		<td>	
			
<?php  echo mostrar_mod1($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$action_name); ?>
<a href="contenedor_ajax.php?id=admin&action=del_modulo&id_modulo=<?php  echo $row->moduloid; ?>" rel="facebox">
<button type="button" class="btn btn-outline-danger"><i class="mdi mdi-delete"></i></button>
</a>
		</td>
	  </tr>
	</table>
<br />
	

	  

	

	
	
	<?php 	}	?>
	</div>
