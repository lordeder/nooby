<?php /////////////////////////////////////////////////////////////////////////////////////////////
function mostrar($columna,$tabla,$id,$coincidencia,$link){
$result=@$link->query("select $columna from $tabla where $id like '$coincidencia' order by $id ASC limit 1") or die ($link->error);

if($row = $result->fetch_object()){
return $row->$columna;
}else{ echo '<font color="red">Error al seleccionar columna ->'.$columna.'
		tabla -> '.$tabla.' columnaid -> '.$id.' coincidencia -> '.$coincidencia.'!!</font><br>'; }
}
 /////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_fecha($columna,$tabla,$id,$coincidencia,$link){
$result=@$link->query("select DATE($columna) from $tabla where $id like '$coincidencia' order by $id ASC limit 1") or die ($link->error);

if($row = $result->fetch_row()){
	$fecha=$row[0];
	
	$apariciones=substr_count($fecha, '-');
	if($apariciones==2){
	$trozos = explode("-", $fecha);	
	return $trozos[2].'-'.$trozos[1].'-'.$trozos[0];
	}
//return $row[0];
}else{ echo '<font color="red">Error al seleccionar columna ->'.$columna.'
		tabla -> '.$tabla.' columnaid -> '.$id.' coincidencia -> '.$coincidencia.'!!</font><br>'; }
}
/////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_hora($columna,$tabla,$id,$coincidencia,$link){

$result=@$link->query("select time_format(TIME($columna), '%H:%i') from $tabla where $id like '$coincidencia' limit 1") or die ($link->error);

if($row = $result->fetch_row()){
	
	
return $row[0];
}else{ echo '<font color="red">Error al seleccionar columna ->'.$columna.'
		tabla -> '.$tabla.' columnaid -> '.$id.' coincidencia -> '.$coincidencia.'!!</font><br>'; }
}
/////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_u($columna,$tabla,$id,$coincidencia,$ident,$link){
$result=@$link->query("select $columna from $tabla where $id = $coincidencia order by $ident DESC limit 1") or die ($link->error);

if($row = $result->fetch_object()){
return $row->$columna;
}else{ echo '<font color="red">Error al seleccionar columna ->'.$columna.'
		tabla -> '.$tabla.' columnaid -> '.$id.' coincidencia -> '.$coincidencia.'!!</font><br>'; }
}

/////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_2($columna,$tabla,$campo1,$coincidencia1,$campo2,$coincidencia2,$link){

$result=@$link->query("select $columna from $tabla where $campo1 like '$coincidencia1' and $campo2 like '$coincidencia2' limit 1") or die ($link->error);
if($row =$result->fetch_object()){
$texto=$row->$columna;
return $texto;
}else{ echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; }
}
/////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_3($columna,$tabla,$campo1,$coincidencia1,$campo2,$coincidencia2,$campo3,$coincidencia3,$link){

$result=@$link->query("select $columna from $tabla where $campo1 like '$coincidencia1' and $campo2 like '$coincidencia2' and $campo3 like '$coincidencia3' limit 1") or die ($link->error);
if($row =$result->fetch_object()){
$texto=$row->$columna;
return $texto;
}else{ echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; }
}
/////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_4($columna,$tabla,$campo1,$coincidencia1,$campo2,$coincidencia2,$campo3,$coincidencia3,$campo4,$coincidencia4,$link){

$result=@$link->query("select $columna from $tabla where $campo1 like '$coincidencia1' and $campo2 like '$coincidencia2' and $campo3 like '$coincidencia3' and $campo4 like '$coincidencia4' limit 1") or die ($link->error);
if($row =$result->fetch_object()){
$texto=$row->$columna;
return $texto;
}else{ echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; }
}

///////////////////////////////////////		desfasada		////////////////////////////////////////////////////
function mostrar_foto($userid,$link){
$result=$link->query("select foto from usuarios where userid = '$userid' limit 1") or die ($link->error);

	if($row = $result->fetch_object()){
	$archivo_= $row->foto;
	if($archivo_=='' or $archivo_==' 'or $archivo_==NULL){
						$foto='<img align="left" src="/img/unknownUser50.jpg" width="50" height="50" border="0" align="absbottom" />';
				}else{
						$foto = '<img align="left" align="absbottom" src="/fotos/usuarios/mini3/'.$archivo_.'" width="50" height="50" border="0" />';
				}
				return $foto;
	}else{
	echo 'Foto '.$userid;
	}
}
 ?>