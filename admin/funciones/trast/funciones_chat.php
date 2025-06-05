<?php function contar_comentarios($tabla_comentarios,$tipo,$ident,$link){
//$link=Conectarse();
$result=mysql_query("select COUNT(comentarioid) from $tabla_comentarios where tipo = '$tipo' and ident = '$ident'",$link) or die (mysql_error());
if($row = mysql_fetch_array($result)){
//$texto=$row[$columna];
return $row[0];
}else{ echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; }
}







function act_estado_chat($tabla_clientes,$tabla_usuarios,$emisor,$receptor,$link){

$conectado='<img src="img/online-icon.png" border="0" /> Conectado';
$desconectado='<img src="img/online-red-icon.png" border="0" /> Desconectado';

							$ano_actual=date("Y",time ());
							$mes_actual=date("m",time ());// numero del mes formato 01
							$nes_actual=date("n",time ());// numero del mes formato 1
							$dia_actual=date("d",time ());
							$hora_actual=date("H",time ());//hora 00
							$minutos_actual=date("i",time ());//hora 00
							$segundos_actual=date("s",time ());//hora 00
							$fecha_actual="$ano_actual-$mes_actual-$dia_actual $hora_actual:$minutos_actual:$segundos_actual";
							
							
							

		if(isset($_SESSION['clienteid'])){
//$usuarioid=$_SESSION['clienteid'];
$receptor=abs($receptor);
$usuarioid=0;
$usuario_foto=$_SESSION['clienteid'];

$sql = "UPDATE $tabla_clientes SET ult_login='$fecha_actual' ";
$sql .= "WHERE clienteid='$emisor' limit 1";
$result = mysql_query($sql)  or die (mysql_error());
	


$ult_login_receptor=mostrar('ult_login',$tabla_usuarios,'userid',$receptor,$link);
$diferencia_segundos=strtotime('now') - strtotime($ult_login_receptor);

	if($diferencia_segundos>2){
	//echo $desconectado;
	return 0;
	}else{
	//echo $conectado;
	return 1;
	}
}



if(isset($_SESSION['userid'])){//ADMIN
$userid_admin=$_SESSION['userid'];
$userid_admin=abs((int)$userid_admin);
$emisor=$userid_admin;
//mod_1_dato($tabla_usuarios,'ult_login',$fecha_actual,'userid',$emisor);

$sql = "UPDATE $tabla_usuarios SET ult_login='$fecha_actual' ";
$sql .= "WHERE userid='$emisor' limit 1";
$result = mysql_query($sql)  or die (mysql_error());

$ult_login_receptor=mostrar('ult_login',$tabla_clientes,'clienteid',$receptor,$link);
$diferencia_segundos=strtotime('now') - strtotime($ult_login_receptor);

	if($diferencia_segundos>1){
	//echo $desconectado;
	return 0;
	}else{
	//echo $conectado;
	return 1;
	}
//$usuarioid=$_SESSION['userid'];
//$usuarioid=-$usuarioid;
//$usuarioid=0;//($_SESSION['userid'])*(-1);
//$usuario_foto=$_SESSION['userid'];
//$usuario_foto=-1;
}

}
?>