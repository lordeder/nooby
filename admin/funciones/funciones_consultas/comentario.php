<?php          //$_SESSION['userid'],$tipo,$_GET['ident'],'usuarios','alertas','suscripciones',$ultimo_id,$link
function suscripcion($userid,$tipo,$id,$tabla_clientes,$alertas,$suscripciones,$comentarioid,$link){
$ultimo_id=$comentarioid;
	//verificamos si esta suscrito

	$result=$link->query("select suscripcionid from suscripciones where tipo = '$tipo' and id = '$id' and usuarioid = '$userid' limit 1") or die ($link->error);
	//echo 'sql='."select suscripcionid from suscripciones where tipo = '$tipo' and id = '$id' and usuarioid = '$userid' limit 1";
	if ($row =$result->fetch_row()){//SI esta, generamos alertas

						//generamos alertas a los suscritos
						$result2=$link->query("select usuarioid from suscripciones where tipo = '$tipo' and id = '$id' and usuarioid != '$userid' ") or die (mysql_error());//
						while($row =$result2->fetch_row()){
							if($usuario_id>0){
								$usuario_id=$row['usuarioid'];
								
								$sql3 = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
								$sql3 .= "VALUES ('$tipo',NOW(),'$ultimo_id','$userid','$usuario_id')";											
								$result3 = $link->query($sql3);
								
							}
						}
	
	}else{/// NO esta, entonces creamos suscripcion
	
			if($userid>0){
					$sql = "INSERT INTO suscripciones (tipo,id,usuarioid) ";
					$sql .= "VALUES ('$tipo','$id','$userid')";
					if($result = $link->query($sql)){
					return true;		
					}else{
					return false;
					
					}
			}
			
						//generamos alertas a los suscritos
						$result2=mysql_query("select usuarioid from suscripciones where tipo = '$tipo' and id = '$id' and usuarioid != '$userid' ",$link) or die (mysql_error());//
						while($row = mysql_fetch_array($result2)){
								$usuario_id=$row['usuarioid'];
								$sql3 = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
								$sql3 .= "VALUES ('$tipo',NOW(),'$ultimo_id','$userid','$usuario_id')";											
								//$result3 = mysql_query($sql3) or die (mysql_error());
								$result3 = $link->query($sql3);
						}
	
	}
	

}

function seguir_boton($userid,$tipo,$id,$suscripciones,$mensaje_seguir,$mensaje_no_seguir,$link){

$result=mysql_query("select suscripcionid from suscripciones where tipo = '$tipo' and id = '$id' and usuarioid = '$userid' limit 1",$link) or die (mysql_error());
	
	$div_name='seguir_'.$userid.'_'.$tipo.'_'.$id;
	
	if ($row = mysql_fetch_array($result)){//SI esta, no seguir
	
	
		echo '
		<div id="'.$div_name.'">
		<input name="input" id="input" type="button" value=" '.$mensaje_no_seguir.' " onclick="pedirDatos2(\''.$id.'\',\'seguir\',\''.$mensaje_seguir.'\',\''.$div_name.'\',\''.$mensaje_no_seguir.'\',\''.$tipo.'\',\'tabla,campoid\');" />
		</div>
		';	
		
	}else{
	
	echo '<div id="'.$div_name.'">
	<input name="input" id="input" type="button" value=" '.$mensaje_seguir.' " onclick="pedirDatos2(\''.$id.'\',\'seguir\',\''.$mensaje_seguir.'\',\''.$div_name.'\',\''.$mensaje_no_seguir.'\',\''.$tipo.'\',\'tabla,campoid\');" />
	</div>
	';	
	}
}


function seguir($userid,$tipo,$id,$suscripciones,$link){
$result=mysql_query("select suscripcionid from suscripciones where tipo = '$tipo' and id = '$id' and usuarioid = '$userid' limit 1",$link) or die (mysql_error());
	
	
	if ($row = mysql_fetch_array($result)){//SI esta, eliminamos suscripcion
	
					$sql = "DELETE FROM suscripciones ";
					$sql .= "WHERE tipo = '$tipo' and id = '$id' and usuarioid = '$userid' limit 1";
					$result = mysql_query($sql);
						if($result = mysql_query($sql)){
						return true;
						}else{
						return false;
						}
		
	}else{//no esta, generamos suscripcion
	
					$sql = "INSERT INTO suscripciones (tipo,id,usuarioid) ";
					$sql .= "VALUES ('$tipo','$id','$userid')";
					if($result = mysql_query($sql) or die (mysql_error()) ){
					return true;		
					}else{
					return false;
					
					}	

	}

}
?>