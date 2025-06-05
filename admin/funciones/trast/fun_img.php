<?php function crear_thumb($imagen,$altura,$direct_thum,$prefijo) { 

    // Lugar donde se guardar�n los thumbnails respecto a la carpeta donde est� la imagen "grande".
     $dir_thumb = $direct_thum;//"miniaturas/"; 
     // Prefijo que se a�adir� al nombre del thumbnail. Ejemplo: si la imagen grande fuera "imagen1.jpg", 
     // el thumbnail se llamar�a "tn_imagen1.jpg" 
     $prefijo_thumb = $prefijo;//"mini_"; 
     // Aqu� tendremos el nombre de la imagen. 
     $nombre=basename($imagen); 
	 
	 $extension = strtolower(substr($nombre,-4,4));
	 
	 
     // Aqu� la ruta especificada para buscar la imagen. 
     $camino=dirname($imagen)."/"; 
     // Intentamos crear el directorio de thumbnails, si no existiera previamente. 
     // Aqu� comprovamos que la imagen que queremos crear no exista previamente 
     if (!file_exists($camino.$dir_thumb.$prefijo_thumb.$nombre)) { 
          //echo $camino.$dir_thumb.$prefijo_thumb.$nombre." NO exist�a<br>\n"; 
		  if($extension=='.jpg' || $extension=='jpeg'){
          		$img = @imagecreatefromjpeg($camino.$nombre) or die("No se encuentra la imagen $camino$nombre<br>\n"); 
		}elseif($extension=='.png'){
				$img = @imagecreatefrompng($camino.$nombre) or die("No se encuentra la imagen $camino$nombre<br>\n"); 
		}elseif($extension==".gif"){
				$img = @imagecreatefromgif($camino.$nombre) or die("No se encuentra la imagen $camino$nombre<br>\n"); 
		}elseif ($extension==".bmp"){  
				$img = @imagecreatefrompng($camino.$nombre) or die("No se encuentra la imagen $camino$nombre<br>\n"); 
		}else{
		echo '<script> alert("Formato no soportado");</script>';
		echo 'Formato no soportado';
		}
          // miramos el tama�o de la imagen original... 
          $datos = getimagesize($camino.$nombre) or die("Problemas con $camino$nombre<br>\n"); 
          // intentamos escalar la imagen original a la medida que nos interesa 
          $ratio = ($datos[1] / $altura); 
          $anchura = round($datos[0] / $ratio); 
          // esta ser� la nueva imagen reescalada 
          $thumb = imagecreatetruecolor($anchura,$altura); 
          // con esta funci�n la reescalamos 
          imagecopyresampled ($thumb, $img, 0, 0, 0, 0, $anchura, $altura, $datos[0], $datos[1]); 
          // voil� la salvamos con el nombre y en el lugar que nos interesa. 
		  
		 						if($extension=='.jpg' || $extension=='jpeg')
								{
									if(!imagejpeg($thumb,$camino.$dir_thumb.$prefijo_thumb.$nombre)){ echo 'No se pudo crear THUMB';}
								}elseif($extension=='.png'){
								imagepng($thumb,$camino.$dir_thumb.$prefijo_thumb.$nombre); 
								}elseif($extension==".gif"){
								imagegif($thumb,$camino.$dir_thumb.$prefijo_thumb.$nombre);
								}elseif ($extension==".bmp"){  
								imagewbmp($thumb,$camino.$dir_thumb.$prefijo_thumb.$nombre);
								}else{
								echo 'Formato no soportado';
								}
		  
         
     } 
	 }?>