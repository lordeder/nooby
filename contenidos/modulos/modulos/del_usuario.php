<?php 
	if(isset($_GET['id_user'])){
	$id_user=trim($_GET['id_user']);
	$identificador=$id_user;
	$id_logeado=$_SESSION['userid'];
	
		if($id_logeado==$id_user){
		mensaje_error('No puedes eliminar tu propia cuenta','');
		
		}elseif(isset($_GET['hash'])){
			
			if(eliminar_registro($tabla_usuarios,'userid',$id_user,$link)){ //-------Elimina
			mensaje_ok('Usuario eliminado','');
			include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/lista_usuarios.php');
			}else{
			mensaje_error('Error al intentar eliminar','');
			include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/lista_usuarios.php');
			}
			
		}else{
		$result=$link->query("select userid, user, nombres, apellidos from $tabla_usuarios where userid ='$id_user' limit 1") or die ($link->error);
			while($row = $result->fetch_object()) {
			echo '<center>�Est� seguro que desea eliminar <b>('.$row->user.')</b> '.$row->apellidos.' '.$row->nombres.'?<br>';?>
			<a href="?id=admin&action=del_usuario&id_user=<?php  echo $row->userid; ?>&hash=<?php  echo md5($row->userid); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"> Si </a>
			
			<button class="btn btn-primary btn-lg active" onclick="jQuery('#facebox_overlay').click()"> No </button>
			</center>
	<?php 		}
		}
		
	}else{
	mensaje_error('No se ha recibido id_user','');
	}
	
	//include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/lista_usuarios.php');
?>



