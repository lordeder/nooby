<?php function insertar_juego($nombre,$codigo,$imagen,$categoria,$microprocesador,$video,$ram,$stock,$formato,$unidades,$descripcion,$instalacion){ 
	$link=Conectarse();
	$sql = "INSERT INTO juegos (nombre,juegoid,imagen,categoriaid,microprocesador,video,ram,stock,formato,unidades,descripcion,instalacion) ";
	$sql .= "VALUES ('$nombre','$codigo','$imagen','$categoria','$microprocesador','$video','$ram','$stock','$formato','$unidades','$descripcion','$instalacion')";
			if($result = mysql_query($sql) or die (mysql_error()) )
				{ 
				echo '<b><font color="blue">Ingresado</font><br></b>'.$nombre.'<br>';
				}else{
				echo '<font color="red">No se pudo ingresar los datos</font><br>';
				}	
	}
?>