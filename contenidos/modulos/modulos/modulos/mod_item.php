<?php
if(isset($_POST['texto1'])){
	$id_modulo=verifica_inyeccion($_POST['texto1']);
	$item_id=verifica_inyeccion(trim($_POST['texto2']));
	$item_titulo=verifica_inyeccion($_POST['texto3']);
	$item_archivo=verifica_inyeccion($_POST['texto4']);
	$item_head=$_POST['texto5'];//addslashes($_POST['texto5']); strlen($item_id)
	
	$id_id=$item_id;

	
	if(empty($item_id)){
	mensaje_error('El ID está vacio '.$_POST['texto2'],'');

	$item_id=mostrar('id',$tabla_items_pagina,'id',$id_id,$link);
	$item_titulo=mostrar('titulo',$tabla_items_pagina,'id',$id_id,$link);
	$item_archivo=mostrar('archivo',$tabla_items_pagina,'id',$id_id,$link);
	$item_head=mostrar('head',$tabla_items_pagina,'id',$id_id,$link);
	include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_mod_item.php');
	
	}elseif(empty($item_archivo)){
	mensaje_error('El archivo está vacio '.$_POST['texto2'],'');
	$item_id=mostrar('id',$tabla_items_pagina,'id',$id_id,$link);
	$item_titulo=mostrar('titulo',$tabla_items_pagina,'id',$id_id,$link);
	$item_archivo=mostrar('archivo',$tabla_items_pagina,'id',$id_id,$link);
	$item_head=mostrar('head',$tabla_items_pagina,'id',$id_id,$link);
	include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_mod_item.php');
	include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_mod_item.php');
	
	}else{
	
				$sql = "UPDATE $tabla_items_pagina SET titulo='$item_titulo', archivo='$item_archivo', head='$item_head', moduloid='$id_modulo' ";
				$sql .= "WHERE id='$item_id' limit 1";
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
echo 'No se recibió formulario (mod_item.php)';
}




?>