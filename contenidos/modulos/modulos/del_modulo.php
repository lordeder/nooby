<?php 
	if(isset($_GET['id_modulo'])){
	$id_modulo=trim($_GET['id_modulo']);
	$identificador=$id_modulo;
	
	
		if(isset($_GET['hash'])){
		include_once($dir_funciones_page.'funciones_consultas/eliminar.php');
			if(eliminar_registro($tabla_modulos_pagina,'moduloid',$id_modulo,$link)){ //-------Elimina
			eliminar_registro_varios($tabla_items_pagina,'moduloid',$id_modulo,$link);
			mensaje_ok('M�dulo eliminado','');
			include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/lista_modulos.php'); 
			}else{
			mensaje_error('Error al intentar eliminar','');
			include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/lista_modulos.php'); 
			}
		}else{
			$result=$link->query("select moduloid, nombre from $tabla_modulos_pagina where moduloid ='$id_modulo' limit 1") or die ($link->error);
			while($row = $result->fetch_object()) {
			echo '<center>�Est� seguro que desea eliminar '.$row->nombre.'?<br>';?>
			<a href="?id=admin&action=del_modulo&id_modulo=<?php  echo $row->moduloid; ?>&hash=<?php  echo md5($row->moduloid); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"> Si </a>
			
			<button class="btn btn-primary btn-lg active" onclick="jQuery('#facebox_overlay').click()"> No </button>
			</center>
			<?php 
			
			}
		}
	}else{
	mensaje_error('No se ha recibido id_item','');
	}
?>