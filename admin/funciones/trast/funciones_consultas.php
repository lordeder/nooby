<?php /////////////////////////////////////////////////////////////////////////////////////////////
function contar($columna,$tabla,$id,$coincidencia,$link){
$result=$link->query("select COUNT($columna) from $tabla where $id = '$coincidencia'") or die ($link->error);
return $result->num_rows;

}
///////////////////////////////////////////////////////////////////////////////////////////
function existe_registro($tabla,$id,$coincidencia,$link){
$result=@$link->query("select $id from $tabla where $id like '$coincidencia' limit 1") or die ($link->error);
	if ($row = $result->fetch_object()){
	return true;
	}else{
	return false;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////
function mostrar($columna,$tabla,$id,$coincidencia,$link){
//$link=Conectarse();
$result=@$link->query("select $columna from $tabla where $id like '$coincidencia' limit 1") or die ($link->error);
//if($result = $link->query($sql) or die ($link->error)){

if($row = $result->fetch_object()){
return $row->$columna;
}else{ echo '<font color="red">Error al seleccionar columna ->'.$columna.'
		tabla -> '.$tabla.' columnaid -> '.$id.' coincidencia -> '.$coincidencia.'!!</font><br>'; }
}
/////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_u($columna,$tabla,$id,$coincidencia,$ident,$link){
//$link=Conectarse();
$result=@$link->query("select $columna from $tabla where $id = $coincidencia order by $ident DESC limit 1") or die ($link->error);
//if($result = $link->query($sql) or die ($link->error)){

if($row = $result->fetch_object()){
return $row->$columna;
}else{ echo '<font color="red">Error al seleccionar columna ->'.$columna.'
		tabla -> '.$tabla.' columnaid -> '.$id.' coincidencia -> '.$coincidencia.'!!</font><br>'; }
}
/////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_sm($columna,$tabla,$id,$coincidencia,$link){//SIN MENSAJE
//$link=Conectarse();
$result=$link->query("select $columna from $tabla where $id like '$coincidencia' limit 1");
	if($row = $result->fetch_object()){
	return $row->$columna;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_2($columna,$tabla,$campo1,$coincidencia1,$campo2,$coincidencia2,$link){
//$link=Conectarse();
$result=@$link->query("select $columna from $tabla where $campo1 like '$coincidencia1' and $campo2 like '$coincidencia2' limit 1") or die ($link->error);
if($row =$result->fetch_object()){
$texto=$row->$columna;
return $texto;
}else{ echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; }
}
/////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_3($columna,$tabla,$campo1,$coincidencia1,$campo2,$coincidencia2,$campo3,$coincidencia3,$link){
//$link=Conectarse();
$result=@$link->query("select $columna from $tabla where $campo1 like '$coincidencia1' and $campo2 like '$coincidencia2' and $campo3 like '$coincidencia3' limit 1") or die ($link->error);
if($row =$result->fetch_object()){
$texto=$row->$columna;
return $texto;
}else{ echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; }
}
/////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_4($columna,$tabla,$campo1,$coincidencia1,$campo2,$coincidencia2,$campo3,$coincidencia3,$campo4,$coincidencia4,$link){
//$link=Conectarse();
$result=@$link->query("select $columna from $tabla where $campo1 like '$coincidencia1' and $campo2 like '$coincidencia2' and $campo3 like '$coincidencia3' and $campo4 like '$coincidencia4' limit 1") or die ($link->error);
if($row =$result->fetch_object()){
$texto=$row->$columna;
return $texto;
}else{ echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; }
}
/////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_5($columna,$tabla,$campo1,$coincidencia1,$campo2,$coincidencia2,$campo3,$coincidencia3,$campo4,$coincidencia4,$campo5,$coincidencia5,$link){
//$link=Conectarse();
$result=@$link->query("select $columna from $tabla where $campo1 like '$coincidencia1' and $campo2 like '$coincidencia2' and $campo3 like '$coincidencia3' and $campo4 like '$coincidencia4' and $campo5 like '$coincidencia5' limit 1") or die ($link->error);
if($row =$result->fetch_object()){
$texto=$row->$columna;
return $texto;
}else{ echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; }
}
/////////////////////////////////////////////////////////////////////////////////////////////
function existe_2($tabla,$campo1,$coincidencia,$campo2,$coincidencia2,$link){
//$link=Conectarse();
$sql = "select $campo1 ";
$sql.= "from $tabla where $campo1 like '$coincidencia' and $campo2 like '$coincidencia2' limit 1" ;
$result = $link->query($sql) or die ($link->error);
	if ($row =$result->fetch_object()){
	return true;
	}else{
	return false;
	}
}
/////////////////////////*****************************************///////////////////////////
function existe_3($tabla,$campo1,$coincidencia,$campo2,$coincidencia2,$campo3,$coincidencia3,$link){
//$link=Conectarse();
$sql = "select $campo1 ";
$sql.= "from $tabla where $campo1 like '$coincidencia' and $campo2 like '$coincidencia2' and $campo3 like '$coincidencia3' limit 1" ;
$result = $link->query($sql);
//$cantidad = $result->num_rows;
//return $cantidad;
	if ($row_admin =$result->fetch_object()){
	return true;
	}else{
	return false;
	}
}
/////////////////////////*****************************************///////////////////////////
function existe_4($tabla,$campo1,$coincidencia,$campo2,$coincidencia2,$campo3,$coincidencia3,$campo4,$coincidencia4,$link){
//$link=Conectarse();
$sql = "select $campo1 ";
$sql.= "from $tabla where $campo1 like '$coincidencia' and $campo2 like '$coincidencia2' and $campo3 like '$coincidencia3' and $campo4 like '$coincidencia4' limit 1" ;
$result = $link->query($sql);
//$cantidad = $result->num_rows;
//return $cantidad;
	if ($row_admin =$result->fetch_object()){
	return true;
	}else{
	return false;
	}
}
/////////////////////////*****************************************///////////////////////////
function existe_5($tabla,$campo1,$coincidencia,$campo2,$coincidencia2,$campo3,$coincidencia3,$campo4,$coincidencia4,$campo5,$coincidencia5,$link){
//$link=Conectarse();
$sql = "select $campo1 ";
$sql.= "from $tabla where $campo1 like '$coincidencia' and $campo2 like '$coincidencia2' and $campo3 like '$coincidencia3' and $campo4 like '$coincidencia4' and $campo5 like '$coincidencia5' limit 1" ;
$result = $link->query($sql);
//$cantidad = $result->num_rows;
//return $cantidad;
	if ($row_admin =$result->fetch_object()){
	return true;
	}else{
	return false;
	}
}


//************/////////////////////////////////////////////////////////////////////////////////////
function eliminar_registro($tabla,$columnaid,$id,$link){
$sql = "DELETE FROM $tabla ";
$sql .= "WHERE $columnaid = '$id' limit 1";
$result = $link->query($sql);
	if($result = $link->query($sql)){
	return true;
	}else{
	return false;
	}
}
//************/////////////////////////////////////////////////////////////////////////////////////
function eliminar_registro_varios($tabla,$columnaid,$id,$link){
$sql = "DELETE FROM $tabla ";
$sql .= "WHERE $columnaid = '$id'";
$result = $link->query($sql);
	if($result = $link->query($sql)){
	return true;
	}else{
	return false;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////
function mod_1_dato($tabla,$campo,$valor,$campoid,$coincidenciaid,$link){
$sql = "UPDATE $tabla SET $campo='$valor' ";
$sql .= "WHERE $campoid='$coincidenciaid' limit 1";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////
function mod_1_dato_varios($tabla,$campo,$valor,$campoid,$coincidenciaid){
$sql = "UPDATE $tabla SET $campo='$valor' ";
$sql .= "WHERE $campoid='$coincidenciaid'";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////
function ajax_modificar_nivel($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid,$cerrar,$action_cerrar,$link){

if($cerrar='cerrar'){
$cerrar="<a onclick=\"pedirDatos2('$id_fila_userid','$id_ing_mod','$action_cerrar','$id_div','$campo','$valor_real','$tabla','$campoid')\">  
<img src=\"img/cerrar.png\" width=\"16\" height=\"16\" alt=\"Cerrar\" border=\"0\" title=\"Cerrar\" />
</a>";
}else{$cerrar='';}

$result=$link->query("select * from niveles order by nivel, grado, nombre");
?>
<select id="select_<?php echo $tabla.'_'.$id_fila_userid; ?>" onChange="nuevoIngresoSelect2('ingreso','<?php echo $id_fila_userid; ?>','<?php echo $id_ing_mod; ?>','<?php echo $action; ?>','<?php echo $campo; ?>','<?php echo $tabla; ?>','<?php echo $campoid; ?>','<?php echo $id_div; ?>','select_<?php echo $tabla.'_'.$id_fila_userid; ?>',this,'resultado_3')" >
              <?php
  while($row =$result->fetch_object()) {
  ?>
              <option value="<?php echo $row->nivelid ?>" <?php if($row->nivelid==$valor_real){echo 'selected="selected"';}?> > 
			  
			  <?php echo  grado_nivel_s('corto',$row->grado,$row->nivel,$row->nombre); ?> 
			  </option>
              <?php }   ?>
          </select>	<a onclick="pedirDatos2('<?php echo  $id_fila_userid; ?>','<?php echo  $id_ing_mod; ?>','<?php echo $action_cerrar; ?>','<?php echo  $id_div; ?>','<?php echo $campo; ?>','<?php echo $valor_real; ?>','<?php echo $tabla; ?>','<?php echo $campoid; ?>')">  
<img src="img/cerrar.png" width="16" height="16" alt="Cerrar" border="0" title="Cerrar" />
</a>
<?php 
}

//////////////////////////////////////////////////////////////////////////////////////////////////////
function ajax_modificar_categoria($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid,$cerrar,$action_cerrar,$link){

if($cerrar='cerrar'){
$cerrar="<a onclick=\"pedirDatos2('$id_fila_userid','$id_ing_mod','$action_cerrar','$id_div','$campo','$valor_real','$tabla','$campoid')\">  
<img src=\"img/cerrar.png\" width=\"16\" height=\"16\" alt=\"Cerrar\" border=\"0\" title=\"Cerrar\" />
</a>";
}else{$cerrar='';}
/*
*/
?>

<select id="select_<?php echo $tabla.'_'.$id_fila_userid; ?>" onChange="nuevoIngresoSelect2('ingreso','<?php echo $id_fila_userid; ?>','<?php echo $id_ing_mod; ?>','<?php echo $action; ?>','<?php echo $campo; ?>','<?php echo $tabla; ?>','<?php echo $campoid; ?>','<?php echo $id_div; ?>','select_<?php echo $tabla.'_'.$id_fila_userid; ?>',this,'resultado_2')" >
		
          <?php	  $resultc=$link->query("select * from categorias order by nombre");
		  while($row_prof = mysql_fetch_array($resultc)) {	 ?>
<option value="<?php echo $row_prof->nombre; ?>" <?php if($row_prof->nombre==$valor_real){echo 'selected="selected"';}?>>
		  <?php echo htmlentities($row_prof->nombre); ?></option>
          <?php } ?>
      </select>	
<a onclick="pedirDatos2('<?php echo $id_fila_userid; ?>','<?php echo  $id_ing_mod; ?>','<?php echo $action_cerrar; ?>','<?php echo  $id_div; ?>','<?php echo $campo; ?>','<?php echo $valor_real; ?>','<?php echo $tabla; ?>','<?php echo $campoid; ?>')">  
<img src="img/cerrar.png" alt="Cerrar" title="Cerrar" border="0" height="16" width="16">
</a>
<?php 
}
//////////////////////////////////////////////////////////////////////////////////////////////////////
function ajax_modificar_subcategoria($texto,$valor_real,$id_fila_userid,$id_div,$id_ing_mod,$action,$campo,$tabla,$campoid,$cerrar,$action_cerrar,$link){

if($cerrar='cerrar'){
$cerrar="<a onclick=\"pedirDatos2('$id_fila_userid','$id_ing_mod','$action_cerrar','$id_div','$campo','$valor_real','$tabla','$campoid')\">  
<img src=\"img/cerrar.png\" width=\"16\" height=\"16\" alt=\"Cerrar\" border=\"0\" title=\"Cerrar\" />
</a>";
}else{$cerrar='';}
/*
*/
?>

<select id="select_<?php echo $tabla.'_'.$id_fila_userid; ?>" onChange="nuevoIngresoSelect2('ingreso','<?php echo $id_fila_userid; ?>','<?php echo $id_ing_mod; ?>','<?php echo $action; ?>','<?php echo $campo; ?>','<?php echo $tabla; ?>','<?php echo $campoid; ?>','<?php echo $id_div; ?>','select_<?php echo $tabla.'_'.$id_fila_userid; ?>',this,'resultado_2')" >
		
          <?php	  $resultc=$link->query("select * from album order by nombre");
		  while($row_prof = mysql_fetch_array($resultc)) {	 ?>
<option value="<?php echo $row_prof->nombre; ?>" <?php if($row_prof->nombre==$valor_real){echo 'selected="selected"';}?>>
		  <?php echo htmlentities($row_prof->nombre); ?></option>
          <?php } ?>
      </select>	
<a onclick="pedirDatos2('<?php echo $id_fila_userid; ?>','<?php echo  $id_ing_mod; ?>','<?php echo $action_cerrar; ?>','<?php echo  $id_div; ?>','<?php echo $campo; ?>','<?php echo $valor_real; ?>','<?php echo $tabla; ?>','<?php echo $campoid; ?>')">  
<img src="img/cerrar.png" alt="Cerrar" title="Cerrar" border="0" height="16" width="16">
</a>
<?php 
}
///////////////////////////////////////////////////////////////////////////////////////////// '$fecha'
function ingresar_encuesta($nombre,$fecha_fin,$permitir_anonimo,$tiempo_por_voto,$colegioid,$link){
	$ano=date("Y",time ());
	$mes=date("m",time ());
	$dia=date("d",time ());
	$fecha="$ano-$mes-$dia";
	
	$sql = "INSERT INTO encuestas (nombre,fin,permitir_anonimo,fecha,tiempo_por_voto,colegioid) ";
	$sql .= "VALUES ('$nombre','$fecha_fin','$permitir_anonimo',NOW(),'$tiempo_por_voto','$colegioid')";
	
	if($result = $link->query($sql)){
		return true;
		}else{
		return false;
		}
}
///////////////////////////////////////////////////////////////////////////////////
function insertar_2($tabla,$campo_1,$valor_1,$campo_2,$valor_2,$link){
	$sql = "INSERT INTO $tabla ($campo_1,$campo_2) ";
	$sql .= "VALUES ('$valor_1','$valor_2')";
	if($result = $link->query($sql)){
		return true;
		}else{
		return false;
		}
}
///////////////////////////////////////////////////////////////////////////////////
function ultimo_id($tabla,$campoid,$link){
$result=$link->query("select $campoid from $tabla order by $campoid desc limit 1");
	if ($row =$result->fetch_object()){
	return $row->$campoid;
	}else{
	return false;
	}
	//$result_ua=$link->query("select alumnoid from alumnos order by alumnoid desc limit 1"))
}
////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
function ingresar_user($user,$nombre,$password,$nivel,$colegioid,$link){
$sql = "INSERT INTO usuarios (user,nombre,password,nivel,colegioid,f_registro) ";
$sql .= "VALUES ('$user','$nombre','$password','$nivel','$colegioid',NOW())";
	if($result = $link->query($sql) or die($link->error ) ){
	return true;
	}else{
	return false;
	}
}
//////////////////////////////////////////////////////////////
function ingresar_permiso($userid,$id,$link){
$sql = "INSERT INTO usuarios_permisos (userid,id) ";
$sql .= "VALUES ('$userid','$id')";
	if($result = $link->query($sql)){
	return true;
	}else{
	return false;
	}
}


//////////////////////////////////AVG cursos.nivelid

////////////////////////////////////////////////////////////////////////////
function mostrar_fecha($columna,$tabla,$id,$coincidencia,$link){
//$link=Conectarse();
$result=@$link->query(" SELECT
              CONCAT(	
			  
						  CASE DAYOFWEEK($columna)
							  WHEN 1 THEN 'Domingo '
							  WHEN 2 THEN 'Lunes '
							  WHEN 3 THEN 'Martes '
							  WHEN 4 THEN  CONCAT('Mi','&eacute;','rcoles ')
							  WHEN 5 THEN 'Jueves '
							  WHEN 6 THEN 'Viernes '
							  WHEN 7 THEN  CONCAT('S','&aacute;','bado ')
						 END,
						 
                        DAYOFMONTH($columna),
                        ' de ',
                        CASE MONTH($columna)
                             WHEN 1 THEN 'Enero'
                             WHEN 2 THEN 'Febero'
                             WHEN 3 THEN 'Marzo'
                             WHEN 4 THEN 'Abril'
                             WHEN 5 THEN 'Mayo'
                             WHEN 6 THEN 'Junio'
                             WHEN 7 THEN 'Julio'
                             WHEN 8 THEN 'Agosto'
                             WHEN 9 THEN 'Setiembre'
                             WHEN 10 THEN 'Octubre'
                             WHEN 11 THEN 'Noviembre'
                             WHEN 12 THEN 'Diciembre'
                        END,
                        ' del ',
                        YEAR($columna))
 from $tabla where $id like '$coincidencia' limit 1") or die ($link->error);
 
if($row =$result->fetch_row()){//if($row =$result->fetch_object()){
return $row[0];//$row->DAYOFWEEK($columna);
}else{ echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; }
}
////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_select_ajax($db_tabla,$db_columna,$db_columnaid,$select_name,$v_id,$div_respuesta,$id_page,$link){?>	
	
<select style="height:30px;font-size:13pt;" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>" onChange="form_mod1('<?php echo $db_tabla ?>','<?php echo $db_columna ?>','<?php echo $db_columnaid ?>','<?php echo $v_id ?>','<?php echo $div_respuesta ?>','<?php echo $id_page ?>','<?php echo $select_name; ?>',this)"   >
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
////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_select_ajax_seleccionado($db_tabla,$db_columna,$db_columnaid,$select_name,$v_id,$div_respuesta,$id_page,$action_name,$id_seleccionado,$link){?>	
	
<select style="height:30px;font-size:13pt;" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>" onChange="form_mod1('<?php echo $db_tabla ?>','<?php echo $db_columna ?>','<?php echo $db_columnaid ?>','<?php echo $v_id ?>','<?php echo $div_respuesta ?>','<?php echo $id_page ?>','<?php echo $select_name; ?>','<?php echo $action_name; ?>',this)"   >
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
////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_select1($db_tabla,$db_columna,$db_columnaid,$select_name,$campo,$coincidencia,$link){
        
?>		
<select style="height:30px;font-size:13pt;" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>">
<option value=""></option>
<?php //$div_respuesta,$id_page,$input_name

$result=$link->query("select $db_columnaid, $db_columna from $db_tabla where $campo like '$coincidencia' ") or die ($link->error);;

while($row =$result->fetch_object()){
$texto=$row->$db_columna;
?>
<option value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option>
<?php }

?></select><?php }
////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_select_album($db_tabla,$db_columna,$db_columnaid,$select_name,$campo,$coincidencia,$link){
        
?>		
<select style="height:30px;font-size:13pt;" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>">
<option value="0">En ning&uacute;n &aacute;lbum</option>
<?php //$div_respuesta,$id_page,$input_name

$result=$link->query("select $db_columnaid, $db_columna from $db_tabla where $campo = '$coincidencia' order by $db_columnaid DESC ") or die ($link->error);

while($row =$result->fetch_object()){
$texto=$row->$db_columna;
?>
<option value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option>
<?php }

?></select><?php }
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_select_carp($db_tabla,$db_columna,$db_columnaid,$select_name,$campo,$coincidencia,$campo2,$coincidencia2,$link){
        
?>		
<select style="height:30px;font-size:13pt;" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>">
<option value="0">En ning&uacute;n &aacute;lbum</option>
<?php //$div_respuesta,$id_page,$input_name

$result=$link->query("select $db_columnaid, $db_columna from $db_tabla where $campo = '$coincidencia' and $campo2 = $coincidencia2 order by $db_columnaid DESC ") or die ($link->error);

while($row =$result->fetch_object()){
$texto=$row->$db_columna;
?>
<option value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option>
<?php }

?></select><?php }
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_select_album1($albumid,$db_tabla,$db_columna,$db_columnaid,$select_name,$campo,$coincidencia,$link){
        
?>		
<select style="height:30px;font-size:13pt;" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>">
<option value="0">En ning&uacute;n &aacute;lbum</option>
<?php //$div_respuesta,$id_page,$input_name

$result=$link->query("select $db_columnaid, $db_columna from $db_tabla where $campo = '$coincidencia' order by $db_columnaid DESC ") or die ($link->error);

while($row =$result->fetch_object()){
$texto=$row->$db_columna;
		if($albumid!=$row->$db_columnaid){
?>
<option value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option>
<?php 		}
}

?></select><?php }
////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_select_album2($albumid,$db_tabla,$db_columna,$db_columnaid,$select_name,$campo,$coincidencia,$campo2,$coincidencia2,$link){
        
?>		
<select style="height:30px;font-size:13pt;" name="<?php echo $select_name; ?>" id="<?php echo $select_name; ?>">
<option value="0">En ning&uacute;n &aacute;lbum</option>
<?php //$div_respuesta,$id_page,$input_name

$result=$link->query("select $db_columnaid, $db_columna from $db_tabla where $campo = $coincidencia and $campo2 = $coincidencia2 order by $db_columnaid DESC ") or die ($link->error);

while($row =$result->fetch_object()){
$texto=$row->$db_columna;
		if($albumid!=$row->$db_columnaid){
?>
<option value="<?php echo $row->$db_columnaid; ?>"><?php echo $texto; ?></option>
<?php 		}
}

?></select><?php }
////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////7
function adicionar_vista($columna,$tabla,$campoid,$coincidencia,$link){
//$link=Conectarse();
$result=mysql_query("select $columna from $tabla where $campoid = '$coincidencia' limit 1",$link) or die (mysql_error());
if($row = mysql_fetch_array($result))
{
$numero_actual=$row[$columna];
$numero_aumentado=$numero_actual+1;
	$sql = "UPDATE $tabla SET $columna='$numero_aumentado' ";
	$sql .= "WHERE $campoid='$coincidencia' limit 1";
	if($result2 = mysql_query($sql) or die (mysql_error()) )
	{
	return true;		
	}
	else
	{
	echo '<font color="red">No se pudo aumentar vista '.$columna.'!!</font><br>'; 
	}
}
else
{ 
echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; 
}
}
////////////////////////////////////////////////////////////
function existe_db($basedatos,$link){

if (($link->select_db($basedatos))) { 
			return true;
        }else{
			return false;
		}
		
}

?>