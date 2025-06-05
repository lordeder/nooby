<?php 
$id_id='';
include_once($dir_funciones_page.'funciones_consultas/ingresar.php');
if(isset($_POST['texto1'])){
	$id_modulo=verifica_inyeccion($_POST['texto1']);
	$item_id=verifica_inyeccion(trim($_POST['texto2']));
	$item_titulo=verifica_inyeccion($_POST['texto3']);
	$item_archivo=verifica_inyeccion($_POST['texto4']);
	$item_head=$_POST['texto5'];//addslashes($_POST['texto5']); strlen($item_id)	
	$id_id=$item_id;
	
	
	if(empty($item_id)){
	mensaje_error('No ha escrito el ID','');
	include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_mod_item.php');
	
	}elseif(ing_registro5($item_titulo,'titulo',$item_archivo,'archivo',$item_head,'head',$id_modulo,'moduloid',$item_id,'id',$tabla_items_pagina,$link)){
	mensaje_ok('Se ingres� item con �xito','');
	?><a href="<?php  echo tipo_direccion($tipo_url,"admin"); ?>">Listar items </a>
<?php 
	}else{
	mensaje_error('No se pudo ingresar item','');
	include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_mod_item.php');
	}
	
	
}else{
$identificador='q';
include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_mod_item.php');
}
?>
