<?php
function check_ajax($db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$action_name,$add,$link){
$result=$link->query("select $db_columna from $db_tabla where $db_columnaid = '$v_id' limit 1");

	if($row = $result->fetch_object()){
	$valor=$row->$db_columna;
	$identificador='_'.$db_tabla.'_'.$db_columna.'_'.$v_id;
		if($valor==1){
			$icono='<i class="mdi mdi-check-box"></i>';//			
			$valor_enviar=0;
			}else{ 
			$icono='<i class="mdi mdi-check-box-outline-blank"></i>';
			$valor_enviar=1;
	 	} ?>
<input name="texto_1<?php echo $identificador; ?>" id="texto_1<?php echo $identificador; ?>" type="hidden" value="<?php echo $valor_enviar; ?>" />
<input name="texto_2<?php echo $identificador; ?>" id="texto_2<?php echo $identificador; ?>" type="hidden" value="<?php echo $db_tabla; ?>" />
<input name="texto_3<?php echo $identificador; ?>" id="texto_3<?php echo $identificador; ?>" type="hidden" value="<?php echo $db_columna; ?>" />
<input name="texto_4<?php echo $identificador; ?>" id="texto_4<?php echo $identificador; ?>" type="hidden" value="<?php echo $db_columnaid; ?>" />
<input name="texto_5<?php echo $identificador; ?>" id="texto_5<?php echo $identificador; ?>" type="hidden" value="<?php echo $v_id; ?>" />
<input name="texto_6<?php echo $identificador; ?>" id="texto_6<?php echo $identificador; ?>" type="hidden" value="<?php echo $div_respuesta; ?>" />

	<a style="cursor:pointer" onclick="ing('<?php echo $div_respuesta; ?>','<?php echo $id_page ?>', '<?php echo $action_name ?>', '<?php echo $identificador ?>', '<?php echo $add ?>')"><?php echo $icono; ?></a>
	<?php }else{
	echo 'Error check';	echo "$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$action_name,$add,";
	}
}
//////////////////////////////////////////////////////////////////////////////////////
function mostrar_select_ajax($db_tabla,$db_columna,$db_columnaid,$select_name,$v_id,$div_respuesta,$id_page,$link){?>	
	
<select class="form-control"  name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>" onChange="form_mod1('<?php echo $db_tabla ?>','<?php echo $db_columna ?>','<?php echo $db_columnaid ?>','<?php echo $v_id ?>','<?php echo $div_respuesta ?>','<?php echo $id_page ?>','<?php echo $select_name; ?>',this)"   >
<option value=""></option>
<?php 
//$div_respuesta,$id_page,$input_name

$result=$link->query("select $db_columnaid, $db_columna from $db_tabla ") or die ($link->error);;

while($row =$result->fetch_object()){
$texto=$row->$db_columna;
?>
<option value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option>
<?php }

?></select><?php }
////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_select_ajax2($db_tabla,$db_columna,$db_columnaid,$select_name,$v_id,$div_respuesta,$id_page,$texto,$cons_ad,$link){?>	
	
<select class="form-control"  name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>" onChange="form_mod1('<?php echo $db_tabla ?>','<?php echo $db_columna ?>','<?php echo $db_columnaid ?>','<?php echo $v_id ?>','<?php echo $div_respuesta ?>','<?php echo $id_page ?>','<?php echo $select_name; ?>',this)"   >
<option value=""><?php echo $texto; ?></option>
<?php 
//$div_respuesta,$id_page,$input_name

$result=$link->query("select $db_columnaid, $db_columna from $db_tabla $cons_ad") or die ($link->error);;

while($row =$result->fetch_object()){
$texto=$row->$db_columna;
?>
<option value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option>
<?php }

?></select><?php }
////////////////////////////////////////////////////////////////////////////////////////////<select style="height:30px;font-size:13pt;" 
function mostrar_select_ajax_seleccionado($db_tabla,$db_columna,$db_columnaid,$select_name,$v_id,$div_respuesta,$id_page,$action_name,$id_seleccionado,$link){?>	
	
<select class="form-control" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>" onChange="form_mod1('<?php echo $db_tabla ?>','<?php echo $db_columna ?>','<?php echo $db_columnaid ?>','<?php echo $v_id ?>','<?php echo $div_respuesta ?>','<?php echo $id_page ?>','<?php echo $select_name; ?>','<?php echo $action_name; ?>',this)"   >
<option value=""></option>
<?php 
//$div_respuesta,$id_page,$input_name

$result=$link->query("select $db_columnaid, $db_columna from $db_tabla ") or die ($link->error);;

while($row =$result->fetch_object()){
$texto=htmlentities($row->$db_columna);
?>
<option <?php if($row->$db_columnaid==$id_seleccionado){ echo 'selected="selected"';} ?> value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option>
<?php }

?></select><?php }
////////////////////////////////////////////////////////////////////////////////////////////<select style="height:30px;font-size:13pt;" 
function mostrar_select_ajax_seleccionado2($db_tabla,$db_columna,$db_columnaid,$select_name,$v_id,$div_respuesta,$id_page,$action_name,$id_seleccionado,$cons_ad,$link){?>	
	
<select class="form-control" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>" onChange="form_mod1('<?php echo $db_tabla ?>','<?php echo $db_columna ?>','<?php echo $db_columnaid ?>','<?php echo $v_id ?>','<?php echo $div_respuesta ?>','<?php echo $id_page ?>','<?php echo $select_name; ?>','<?php echo $action_name; ?>',this)"   >
<option value=""></option>
<?php 
//$div_respuesta,$id_page,$input_name

$result=$link->query("select $db_columnaid, $db_columna from $db_tabla $cons_ad ") or die ($link->error);;

while($row =$result->fetch_object()){
$texto=htmlentities($row->$db_columna);
?>
<option <?php if($row->$db_columnaid==$id_seleccionado){ echo 'selected="selected"';} ?> value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option>
<?php }

?></select><?php }
////////////////////////////////////////////////////////////////////////////////////////////<select style="height:30px;font-size:13pt;" 
function mostrar_select_ajax_seleccionado3($texto,$db_tabla,$db_columna,$db_columnaid,$select_name,$v_id,$div_respuesta,$id_page,$action_name,$id_seleccionado,$cons_ad,$link){?>	
	
<select class="form-control" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>" onChange="form_mod1('<?php echo $db_tabla ?>','<?php echo $db_columna ?>','<?php echo $db_columnaid ?>','<?php echo $v_id ?>','<?php echo $div_respuesta ?>','<?php echo $id_page ?>','<?php echo $select_name; ?>','<?php echo $action_name; ?>',this)"   >
<option value=""><?php echo $texto; ?></option>
<?php 
//$div_respuesta,$id_page,$input_name

$result=$link->query("select $db_columnaid, $db_columna from $db_tabla $cons_ad ") or die ($link->error);;

while($row =$result->fetch_object()){
$texto=htmlentities($row->$db_columna);
?>
<option <?php if($row->$db_columnaid==$id_seleccionado){ echo 'selected="selected"';} ?> value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option>
<?php }

?></select><?php }
////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_select1($db_tabla,$db_columna,$db_columnaid,$select_name,$campo,$coincidencia,$link){
        
?>		
<select class="form-control" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>">
<option value=""></option>
<?php $result=$link->query("select $db_columnaid, $db_columna from $db_tabla where $campo like '$coincidencia' order by $db_columna ") or die ($link->error);;

while($row =$result->fetch_object()){
$texto=$row->$db_columna;
?>
<option value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option><?php } ?>
</select><?php }
/////////////////////////////////////////////////	CON EL PRIMER TEXTO		/////////////////////////////////////////// C
function mostrar_select2($texto,$db_tabla,$db_columna,$db_columnaid,$select_name,$campo,$coincidencia,$link){
        
?>		
<select class="form-control" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>">
<option value=""><?php echo $texto; ?></option>
<?php $result=$link->query("select $db_columnaid, $db_columna from $db_tabla where $campo like '$coincidencia' order by $db_columna ") or die ($link->error);;

while($row =$result->fetch_object()){
$texto=$row->$db_columna;
?>
<option value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option><?php } ?>
</select><?php }
////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_select_seleccionado($db_tabla,$db_columna,$db_columnaid,$select_name,$campo,$coincidencia,$id_seleccionado,$link){
        
?>		
<select class="form-control" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>">
<option value=""></option>
<?php $result=$link->query("select $db_columnaid, $db_columna from $db_tabla where $campo like '$coincidencia' order by $db_columna ") or die ($link->error);;

while($row =$result->fetch_object()){
$texto=$row->$db_columna;
?>
<option <?php if($row->$db_columnaid==$id_seleccionado){ echo 'selected="selected"';} ?> value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option><?php } ?>
</select><?php }
///////////////////////////////////////////		CON TEXTO inicial		/////////////////////////////////////////////////
function mostrar_select_seleccionado2($texto,$db_tabla,$db_columna,$db_columnaid,$select_name,$campo,$coincidencia,$id_seleccionado,$link){
        
?>		
<select class="form-control" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>">
<option value=""><?php echo $texto; ?></option>
<?php $result=$link->query("select $db_columnaid, $db_columna from $db_tabla where $campo like '$coincidencia' order by $db_columna ") or die ($link->error);;

while($row =$result->fetch_object()){
$texto=$row->$db_columna;
?>
<option <?php if($row->$db_columnaid==$id_seleccionado){ echo 'selected="selected"';} ?> value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option><?php } ?>
</select><?php }
//////////////////////////////////////////////////      SIN NADA INICIAL         //////////////////////////////////////////
function mostrar_select_seleccionado3($db_tabla,$db_columna,$db_columnaid,$select_name,$campo,$coincidencia,$id_seleccionado,$link){
        
?>		
<select class="form-control" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>">
<?php $result=$link->query("select $db_columnaid, $db_columna from $db_tabla where $campo like '$coincidencia' order by $db_columna ") or die ($link->error);;

while($row =$result->fetch_object()){
$texto=$row->$db_columna;
?>
<option <?php if($row->$db_columnaid==$id_seleccionado){ echo 'selected="selected"';} ?> value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option><?php } ?>
</select><?php }
////////////////////////////////////////////////////////////////////////////////////////////

function mostrar_form1_fecha($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$input_name,$id_ok,$id_cancel,$link){

//$result=mysql_query("select $db_columna from $db_tabla where $db_columnaid like '$v_id' limit 1",$link) or die (mysql_error());
$result=$link->query("select DATE($db_columna) from $db_tabla where $db_columnaid like '$v_id' limit 1");
//SELECT DATE_FORMAT($db_columna, ‘%T’), date($db_columna) FROM $db_tabla
//if($row = mysql_fetch_array($result)){
//if($row = $result->fetch_object()){
if($row = $result->fetch_row()){
	
$fecha=$row[0];

$trozos = explode("-", $fecha);
	
	$texto = $trozos[2].'-'.$trozos[1].'-'.$trozos[0];
	

return "
<input class=\"form-control\" id=\"$input_name\" type=\"text\" name=\"$input_name\" value=\"$texto\" size=\"17\" 
onkeypress=\"if (event.keyCode == 13) form_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$input_name','$id_ok')\" />

<a style=\"cursor:pointer\" onclick=\"form_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$input_name','$id_ok')\">  
<img align=\"absbottom\" src=\"img/accept.png\" width=\"16\" height=\"16\" alt=\"Aceptar\" title=\"Aceptar\" border=\"0\" />
</a>

<a style=\"cursor:pointer\" onclick=\"mostrar_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$id_cancel')\"> 
<img align=\"absbottom\" src=\"img/cancel.png\" width=\"16\" height=\"16\" alt=\"Cancelar\" title=\"Cancelar\" border=\"0\" />
</a>
";

}else{ echo '<font color="red">Error al seleccionar '.$db_columna.'!!</font><br>';
echo "consulta -> select $db_columna from $db_tabla where $db_columnaid like '$v_id' limit 1"; }


}
////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_form1($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$input_name,$id_ok,$id_cancel,$link){

$result=$link->query("select $db_columna from $db_tabla where $db_columnaid like '$v_id' limit 1");
	
if($row = $result->fetch_object()){

$texto = htmlentities($row->$db_columna, ENT_NOQUOTES, 'UTF-8'); // Convertir caracteres especiales a entidades
$texto = htmlspecialchars_decode($texto, ENT_NOQUOTES); // Dejar <, & y > como estaban
/*if (event.keyCode == 13) ing('div_cat','<?php echo $id; ?>', 'ing_categoria', '_ing_cat','1')*/
$texto = str_replace("<br />", "\n", $texto);
$texto = str_replace("\n\n", "\n", $texto);   
 
   
$ncaracteres=strlen($row->$db_columna);     if($db_columna=='letra'){$ncaracteres=100;}
//return ; 
if($ncaracteres>27){
$nsize=$ncaracteres;
$n_size = ' size="'.$nsize.'" ';
$caja="<textarea class=\"form-control\" name=\"$input_name\" id=\"$input_name\" cols=\"70\" rows=\"6\">$texto</textarea>";
}elseif($ncaracteres>27){
$n_size = ' size="'.$nsize.'" ';
$caja="<input class=\"form-control\" onkeypress=\"if (event.keyCode == 13) form_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$input_name','$id_ok')\"  id=\"$input_name\" type=\"text\" name=\"$input_name\" value=\"$texto\" $n_size />";
}else{
$n_size = '';
$caja="<input class=\"form-control\" onkeypress=\"if (event.keyCode == 13) form_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$input_name','$id_ok')\"  id=\"$input_name\" type=\"text\" name=\"$input_name\" value=\"$texto\" $n_size />";
}
//<input id=\"$input_name\" type=\"text\" name=\"$input_name\" value=\"$texto\" $n_size />
return "
$caja

<a style=\"cursor:pointer\" onclick=\"form_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$input_name','$id_ok')\">  
<img align=\"absbottom\" src=\"img/accept.png\" width=\"16\" height=\"16\" alt=\"Aceptar\" title=\"Aceptar\" border=\"0\" />
</a>

<a style=\"cursor:pointer\" onclick=\"mostrar_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$id_cancel')\"> 
<img align=\"absbottom\" src=\"img/cancel.png\" width=\"16\" height=\"16\" alt=\"Cancelar\" title=\"Cancelar\" border=\"0\" />
</a>
";

}else{ echo '<font color="red">Error al seleccionar '.$db_columna.'!!</font><br>';
echo "consulta -> select $db_columna from $db_tabla where $db_columnaid like '$v_id' limit 1"; }


}
////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////			sin boton de cancelar		//////////////////////////////////////////////////
function mostrar_form2($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$input_name,$id_ok,$link){

$result=$link->query("select $db_columna from $db_tabla where $db_columnaid like '$v_id' limit 1");

if($row = $result->fetch_object()){

$texto=html_entity_decode($row->$db_columna);
$texto=utf8_encode($texto);
$ncaracteres=strlen($texto);
//return ;
if($ncaracteres>27){
$nsize=$ncaracteres;
$n_size = ' size="'.$nsize.'" ';
}else{
$n_size = '';
}

return "
<input class=\"form-control\" id=\"$input_name\" type=\"text\" name=\"$input_name\" value=\"$texto\" $n_size />

<a style=\"cursor:pointer\" onclick=\"form_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$input_name','$id_ok')\">  
<img align=\"absbottom\" src=\"img/save.gif\" width=\"21\" height=\"21\" alt=\"Aceptar\" title=\"Guardar\" border=\"0\" />
</a>

";

}else{ echo '<font color="red">Error al seleccionar '.$db_columna.'!!</font><br>';
echo "consulta -> select $db_columna from $db_tabla where $db_columnaid like '$v_id' limit 1"; }


}
////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_form_pass($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$input_name,$input_name2,$id_ok,$id_cancel,$link){

return "
Nuevo password : <input class=\"form-control\" id=\"$input_name\" type=\"password\" name=\"$input_name\" size=\"14\"  /><br>
Repita password : <input class=\"form-control\" id=\"$input_name2\" type=\"password\" name=\"$input_name2\" size=\"14\"  /><br>

<a style=\"cursor:pointer\" onclick=\"form_mod1_d('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$input_name','$input_name2','$id_ok')\">  
<img align=\"absbottom\" src=\"img/accept.png\" width=\"16\" height=\"16\" alt=\"Aceptar\" title=\"Aceptar\" border=\"0\" />
</a>

<a style=\"cursor:pointer\" onclick=\"mostrar_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$id_cancel')\"> 
<img align=\"absbottom\" src=\"img/cancel.png\" width=\"16\" height=\"16\" alt=\"Cancelar\" title=\"Cancelar\" border=\"0\" />
</a>
";

}
////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////// PARA ADMIN ACTUAL
function mostrar_form_pass2($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$input_name,$input_name2,$input_name_actual,$id_ok,$id_cancel,$link){
$div_mensaje_pass='div_mensaje_pass_'.$v_id;
return "
Actual password : <input class=\"form-control\" id=\"$input_name_actual\" type=\"password\" name=\"$input_name_actual\" size=\"14\"   /><br>
Nuevo password : <input class=\"form-control\" id=\"$input_name\" type=\"password\" name=\"$input_name\" size=\"14\" onkeyup=\"ver_campos_pass('$input_name', '$input_name2', '1', '$div_mensaje_pass')\"  /><br>
Repita password : <input class=\"form-control\" id=\"$input_name2\" type=\"password\" name=\"$input_name2\" size=\"14\" onkeyup=\"ver_campos_pass('$input_name', '$input_name2', '1', '$div_mensaje_pass')\" /><br>

<a style=\"cursor:pointer\" onclick=\"form_mod1_t('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$input_name','$input_name2',',$input_name_actual','$id_ok')\">  
<img align=\"absbottom\" src=\"img/accept.png\" width=\"16\" height=\"16\" alt=\"Aceptar\" title=\"Aceptar\" border=\"0\" />
</a>

<a style=\"cursor:pointer\" onclick=\"mostrar_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$id_cancel')\"> 
<img align=\"absbottom\" src=\"img/cancel.png\" width=\"16\" height=\"16\" alt=\"Cancelar\" title=\"Cancelar\" border=\"0\" />
</a>
";

}
////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////// NO ADMIN
function mostrar_form_pass3($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$input_name,$input_name2,$input_name_actual,$id_ok,$id_cancel,$link){

return "
Actual password : <input class=\"form-control\" id=\"$input_name_actual\" type=\"password\" name=\"$input_name_actual\" size=\"14\"  /><br>
Nuevo password : <input class=\"form-control\" id=\"$input_name\" type=\"password\" name=\"$input_name\" size=\"14\"  /><br>
Repita password : <input class=\"form-control\" id=\"$input_name2\" type=\"password\" name=\"$input_name2\" size=\"14\"  /><br>

<a style=\"cursor:pointer\" onclick=\"form_mod1_t('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$input_name','$input_name2',',$input_name_actual','$id_ok')\">  
<img align=\"absbottom\" src=\"img/accept.png\" width=\"16\" height=\"16\" alt=\"Aceptar\" title=\"Aceptar\" border=\"0\" />
</a>

<a style=\"cursor:pointer\" onclick=\"mostrar_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$id_cancel')\"> 
<img align=\"absbottom\" src=\"img/cancel.png\" width=\"16\" height=\"16\" alt=\"Cancelar\" title=\"Cancelar\" border=\"0\" />
</a>
";

}
////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_textarea($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$input_name,$id_ok,$id_cancel,$link){

//$result=mysql_query("select $db_columna from $db_tabla where $db_columnaid like '$v_id' limit 1",$link) or die (mysql_error());
$result=$link->query("select $db_columna from $db_tabla where $db_columnaid like '$v_id' limit 1") or die ($link->error);

//if($row = mysql_fetch_array($result)){ if($result = $link->query($sql) or die ($link->error)){
if($row = $result->fetch_object()){
$texto=html_entity_decode($row->$db_columna);
$texto=utf8_encode($texto);

$texto=inversa_nl2br($texto);
$texto=inversa_nl2br($texto);

//$ncaracteres=strlen($texto);
//return ;
/*
if($ncaracteres>27){
$nsize=$ncaracteres;
$n_size = ' size="'.$nsize.'" ';
}else{
$n_size = '';
}
*/
return "
<textarea class=\"form-control\" name=\"$input_name\" id=\"$input_name\" cols=\"50\" rows=\"6\" maxlength=\"255\">$texto</textarea>

<a style=\"cursor:pointer\" onclick=\"form_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$input_name','$id_ok')\">  
<img align=\"absbottom\" src=\"img/accept.png\" width=\"16\" height=\"16\" alt=\"Aceptar\" title=\"Aceptar\" border=\"0\" />
</a>

<a style=\"cursor:pointer\" onclick=\"mostrar_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$id_cancel')\"> 
<img align=\"absbottom\" src=\"img/cancel.png\" width=\"16\" height=\"16\" alt=\"Cancelar\" title=\"Cancelar\" border=\"0\" />
</a>
";

}else{ echo '<font color="red">Error al seleccionar '.$db_columna.'!!</font><br>';
echo "consulta -> select $db_columna from $db_tabla where $db_columnaid like '$v_id' limit 1"; }


}
////////////////////////////////////////////////////////////////////////////////////////////
if (!function_exists('mostrar_mod1')) {
	function mostrar_mod1($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$action_name){
	
	return "
	<a style=\"cursor:pointer\" onclick=\"mostrar_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$action_name')\">  
	$texto
	</a>
	";	
	}
}
////////////////////////////////////////////////////////////////////////////////////////////

?>