<?php function insertar_mp3($carpeta,$archivo,$artista,$titulo,$album){
	if($archivo==NULL or $archivo==''){
	echo 'Entrada vacia';
	}else{
	
	$vinculo_=$archivo;
	$vinculo=trim($vinculo_);
	$titulo=trim($titulo);
			$link=Conectarse();
			$sql = "select titulo ";
			$sql.= "from musica_mp3 where titulo like '$titulo' limit 1 " ;
			$result = mysql_query($sql);
			$cantidad = mysql_num_rows($result);
			
	if(file_exists("$carpeta$vinculo")){ //if 01		
		if($cantidad==1){ 
		$row = mysql_fetch_array($result);	
		echo '<font color="red">El titulo de la cancion ya existe en la base de datos</font>'; 
		echo '<br>'.$row['titulo'].'<br><br>';
		}else{
	$artista=trim($artista);	
	$iden_ul=$album;
	$link=Conectarse();
	$sql = "INSERT INTO musica_mp3 (titulo,vinculo,autor,fecha,iden_ul) ";
	$sql .= "VALUES ('$titulo','$vinculo','$artista',NOW(),'$iden_ul')";
			if($result = mysql_query($sql)){ 
				echo '<font color="blue">Ingresado ('.$titulo.')<br>'.$vinculo.'</font><br><br>';
				}else{
				echo '<font color="red">No se pudo ingresar los datos</font><br>';
				}
	
		}
	
	}else{ echo '<font color="red">No se encontro el archivo </font>'.$carpeta.$vinculo.'<br>';}
	}
	
	}
?>