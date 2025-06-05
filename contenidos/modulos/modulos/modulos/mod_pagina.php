<?php
if(isset($_POST['texto1'])){
	$id_pagina=verifica_inyeccion($_POST['texto1']);
	$pagina_id=verifica_inyeccion(trim($_POST['texto2']));
	$pagina_titulo=verifica_inyeccion($_POST['texto3']);
	$pagina_icono=verifica_inyeccion($_POST['texto4']);
	$pagina_descripcion=$_POST['texto5'];//addslashes($_POST['texto5']); strlen($pagina_id)
	$default_item=verifica_inyeccion($_POST['texto6']);
	$pagina_imagen_redes=verifica_inyeccion($_POST['texto7']);
	$pie_pagina=verifica_inyeccion($_POST['texto8']);
	$id_id=$pagina_id;

	
	if(empty($pagina_id)){
	mensaje_error('El ID está vacio '.$_POST['texto2'],'');

	$pagina_id=mostrar('id_page',$pagina_datos,'id_page',$id_id,$link);
	$pagina_titulo=mostrar('titulo',$pagina_datos,'id_page',$id_id,$link);
	$pagina_icono=mostrar('icono',$pagina_datos,'id_page',$id_id,$link);
	$pagina_descripcion=mostrar('descripción',$pagina_datos,'id_page',$id_id,$link);
	include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_mod_pagina.php');
	
	}elseif(empty($pagina_icono)){
	mensaje_error('El icono está vacio '.$_POST['texto2'],'');
	$pagina_id=mostrar('id_page',$pagina_datos,'id_page',$id_id,$link);
	$pagina_titulo=mostrar('titulo',$pagina_datos,'id_page',$id_id,$link);
	$pagina_icono=mostrar('icono',$pagina_datos,'id_page',$id_id,$link);
	$pagina_descripcion=mostrar('descripcion',$pagina_datos,'id_page',$id_id,$link);
	include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_mod_pag_datos.php');
	//include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_mod_pag_datos.php');
	
	}else{
	
				$sql = "UPDATE $pagina_datos SET titulo='$pagina_titulo', icono='$pagina_icono', descripcion='$pagina_descripcion', imagen_redes='$pagina_imagen_redes', default_item='$default_item', pie_pagina='$pie_pagina' ";
				$sql .= "WHERE id_page='$pagina_id' limit 1";
				if($result = $link->query($sql)){	
				mensaje_ok('Los datos se actualizaron con éxito','');
				}else{
				//return false;
				echo '

				<center>Error al intentar actualizar los datos</center>

				';
				}
	}

}else{
echo 'No se recibió formulario (mod_pagina.php)';
		// Verificar si el formulario ha sido enviado
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Recorrer todas las variables del formulario
			foreach ($_POST as $key => $value) {
				echo "Nombre de la variable: " . htmlspecialchars($key) . "<br>";
				echo "Valor de la variable: " . htmlspecialchars($value) . "<br><br>";
			}
		} else {
			echo "No se ha enviado ningún formulario.";
		}
}




?>