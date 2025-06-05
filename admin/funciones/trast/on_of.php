<?php function ajax_ini_on_off($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid){ 
	if($valor_real=='1'){
	$switch="<img src=\"img/on.png\" alt=\"Activo\" border=\"0\" title=\"Activo\" />";
	}else{
	$switch="<img src=\"img/off.png\" alt=\"Desactivado\" border=\"0\" title=\"Desactivado\" />";
	}
	

return "<div id=\"$id_div\"  valign=\"bottom\">
<a style=\"cursor:pointer\" onclick=\"pedirDatos2('$id_fila_userid','$id_ing_mod','$action','$id_div','$campo','$valor_real','$tabla','$campoid')\">  
$switch
</a>
	</div>
";	
}
////////////////////////////////////////////    1�      ///////////////////////////////////
//('ingreso','44','mod_curso','action_fin_mod_valor','codigo','nombre_44','cursos','cursoid')
//pedirDatos2('44','mod_curso','action_mod_valor','nombre_44','nombre','Computaci�n','cursos','cursoid')
function ajax_ini_on_off2($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid){ 
	if($valor_real=='1'){
	$switch="<img src=\"../img/user-online.png\" width=\"16\" height=\"16\" alt=\"Activo\" border=\"0\" title=\"Activo\" />";
	}else{
	$switch="<img src=\"../img/user-offline.png\" width=\"16\" height=\"16\" alt=\"Desactivado\" border=\"0\" title=\"Desactivado\" />";
	}
	

return "<div id=\"$id_div\"  valign=\"bottom\">
<a onclick=\"pedirDatos2('$id_fila_userid','$id_ing_mod','$action','$id_div','$campo','$valor_real','$tabla','$campoid')\">  
$switch
</a>
	</div>
";	
}
////////////////////////////////////////////    1�      ///////////////////////////////////
//pedirDatos2('44','mod_curso','action_mod_valor','nombre_44','nombre','Computaci�n','cursos','cursoid')
function ajax_ini_on_off3($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid){ 
	if($valor_real=='1'){
	$switch="<img src=\"../img/b_usrcheck.png\" width=\"16\" height=\"16\" alt=\"Activo\" border=\"0\"  />";
	}else{
	$switch="<img src=\"../img/b_usrdrop.png\" width=\"16\" height=\"16\" alt=\"Desactivado\" border=\"0\" />";
	}
	

return "<div id=\"$id_div\"  valign=\"bottom\">
<a onclick=\"pedirDatos2('$id_fila_userid','$id_ing_mod','$action','$id_div','$campo','$valor_real','$tabla','$campoid')\">  
$switch
</a>
	</div>
";	
}
////////////////////////////////////////////    1�      ///////////////////////////////////
////////////////////////////////////////////    1�      ///////////////////////////////////
//pedirDatos2('44','mod_curso','action_mod_valor','nombre_44','nombre','Computaci�n','cursos','cursoid')
function ajax_ini_on_off4($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid){ 
	if($valor_real=='1'){
	$switch="<img title=\"Sacar de la papelera\" src=\"../img/ico_return.png\" width=\"16\" height=\"16\" alt=\"Activo\" border=\"0\"  />";
	}else{
	$switch="<img title=\"Enviar a la papelera\" src=\"../img/trash.png\" width=\"16\" height=\"16\" alt=\"Desactivado\" border=\"0\" />";
	}
	

return "<div id=\"$id_div\"  valign=\"bottom\">
<a onclick=\"pedirDatos2('$id_fila_userid','$id_ing_mod','$action','$id_div','$campo','$valor_real','$tabla','$campoid')\">  
$switch
</a>
	</div>
";	
}




////////////////////////////////////////////    1�      ///////////////////////////////////
//pedirDatos2('44','mod_curso','action_mod_valor','nombre_44','nombre','Computaci�n','cursos','cursoid')
function ajax_ini_on_off5($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid){ 
	if($valor_real=='1'){
	$switch="<img src=\"img/application_delete.png\" width=\"16\" height=\"16\" alt=\"Click para quitar de portada\" border=\"0\"  /> Sacar de $texto";
	}else{
	$switch="<img src=\"img/application_add.png\" width=\"16\" height=\"16\" alt=\"Click para poner de portada\" border=\"0\" /> Poner en $texto";
	}
	

return "<div id=\"$id_div\"  valign=\"bottom\">
<a style=\"cursor:pointer\" onclick=\"pedirDatos2('$id_fila_userid','$id_ing_mod','$action','$id_div','$campo','$valor_real','$tabla','$campoid')\">  
$switch
</a>
	</div>
";	
}
////////////////////////////////////////////    1�      ///////////////////////////////////
//pedirDatos2('44','mod_curso','action_mod_valor','nombre_44','nombre','Computaci�n','cursos','cursoid')
function ajax_ini_on_off6($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid){ 
	if($valor_real=='1'){
	$switch="<img src=\"img/lightbulb.png\" width=\"16\" height=\"16\" alt=\"Click para quitar de portada\" border=\"0\"  /> Quitar de $texto";
	}else{
	$switch="<img src=\"img/lightbulb_off.png\" width=\"16\" height=\"16\" alt=\"Click para poner de portada\" border=\"0\" /> Poner $texto";
	}
	

return "<div id=\"$id_div\"  valign=\"bottom\">
<a style=\"cursor:pointer\" onclick=\"pedirDatos2('$id_fila_userid','$id_ing_mod','$action','$id_div','$campo','$valor_real','$tabla','$campoid')\">  
$switch
</a>
	</div>
";	
}
////////////////////////////////////////////    1�      ///////////////////////////////////
//pedirDatos2('44','mod_curso','action_mod_valor','nombre_44','nombre','Computaci�n','cursos','cursoid')
function ajax_ini_on_check($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid){ 
	if($valor_real=='1'){
	$switch="<img src=\"img/check.png\"  title=\"Comprobado\" alt=\"Comprobado\" border=\"0\"  /> Quitar $texto";
	}else{
	$switch="<img src=\"img/error_1_24.png\"  title=\"No comprobado\" alt=\"No comprobado\" border=\"0\" /> Poner $texto";
	}
	

return "<div id=\"$id_div\"  valign=\"bottom\">
<a style=\"cursor:pointer\" onclick=\"pedirDatos2('$id_fila_userid','$id_ing_mod','$action','$id_div','$campo','$valor_real','$tabla','$campoid')\">  
$switch
</a>
	</div>
";	
}
////////////////////////////////////////////    1�      ///////////////////////////////////

////////////////////////////////////////////    1�      ///////////////////////////////////
//pedirDatos2(alumnoid,identificadorr,accion,divIdentificador,campo,valor,tabla,campoid)
//('ingreso','44','mod_curso','action_fin_mod_valor','codigo','nombre_44','cursos','cursoid')
//pedirDatos2('44','mod_curso','action_mod_valor','nombre_44','nombre','Computaci�n','cursos','cursoid')
function ajax_ini($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid){ 
//$texto=htmlentities($texto);
//pedirDatos2('93','mod_curso','action_mostrar_profesores','profesor_93','profesorid','14','cursos','cursoid')
return "<div id=\"$id_div\">
<a onclick=\"pedirDatos2('$id_fila_userid','$id_ing_mod','$action','$id_div','$campo','$valor_real','$tabla','$campoid')\">  
$texto
</a>
	</div>
";	
}
//////////////////////////////////////////    2�   ///////////////////////////////////////////////
//pedirDatos2(alumnoid,identificadorr,accion,divIdentificador,campo,valor,tabla,campoid)
//nuevoIngreso2(evento,alumnoid,identificadorr,accion,campoo,divIdentificador,tabla,campoid)
function ajax_modificar($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid,$cerrar,$action_cerrar){

if($cerrar='cerrar'){
$cerrar="<a onclick=\"pedirDatos2('$id_fila_userid','$id_ing_mod','$action_cerrar','$id_div','$campo','$valor_real','$tabla','$campoid')\">  
<img src=\"../img/cerrar.png\" width=\"16\" height=\"16\" alt=\"Cerrar\" border=\"0\" title=\"Cerrar\" />
</a>";
}else{$cerrar='';}
return "
<input type=\"text\" id=\"ingreso\" value=\"$texto\" onblur=\"nuevoIngreso2('ingreso','$id_fila_userid','$id_ing_mod','$action','$campo','$id_div','$tabla','$campoid')\">
$cerrar
";
}
//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////    2�   ///////////////////////////////////////////////
//pedirDatos2(alumnoid,identificadorr,accion,divIdentificador,campo,valor,tabla,campoid)
//nuevoIngreso2(evento,alumnoid,identificadorr,accion,campoo,divIdentificador,tabla,campoid)
function ajax_modificar_textarea($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid,$cerrar,$action_cerrar){

if($cerrar='cerrar'){
$cerrar="<a onclick=\"pedirDatos2('$id_fila_userid','$id_ing_mod','$action_cerrar','$id_div','$campo','$valor_real','$tabla','$campoid')\">  
<img src=\"../img/cerrar.png\" width=\"16\" height=\"16\" alt=\"Cerrar\" border=\"0\" title=\"Cerrar\" />
</a>";
}else{$cerrar='';}
return "
<textarea type=\"text\" id=\"ingreso\" onblur=\"nuevoIngreso2('ingreso','$id_fila_userid','$id_ing_mod','$action','$campo','$id_div','$tabla','$campoid')\">
$texto</textarea>

$cerrar
";
}
//////////////////////////////////////////////////////////////////////////////////////////////
function ajax_eliminar($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid){ 
//$texto=htmlentities($texto);
//pedirDatos2('93','mod_curso','action_mostrar_profesores','profesor_93','profesorid','14','cursos','cursoid')
return "
<a onclick=\"pedirDatos2('$id_fila_userid','$id_ing_mod','$action','$id_div','$campo','$valor_real','$tabla','$campoid')\" >  
$texto
</a>";	
}
//////////////////////////////////////////////////////////////////////////////////////////////
function ajax_eliminar_2($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid,$mensaje){ 
//$texto=htmlentities($texto);
//pedirDatos2('93','mod_curso','action_mostrar_profesores','profesor_93','profesorid','14','cursos','cursoid')
return "
<a onclick=\"eliminar('$id_fila_userid','$id_ing_mod','$action','$id_div','$campo','$valor_real','$tabla','$campoid','$mensaje')\" >  
$texto
</a>";	
}
//////////////////////////////////////////////////////////////////////////////////////////////
function ajax_eliminar_3($tabla,$campo,$valor_id,$id_div,$id_ing_mod,$texto){ 
//$texto=htmlentities($texto);
//pedirDatos2('93','mod_curso','action_mostrar_profesores','profesor_93','profesorid','14','cursos','cursoid')
return "
<a onclick=\"eliminar3('$tabla','$campo','$valor_id','$id_div','$id_ing_mod','eliminar')\" >  
$texto
</a>";	
}

?>