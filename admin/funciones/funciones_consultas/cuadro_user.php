<?php
function cuadro_user($id_usuario,$link){
	
?>
<table width="100%" border="0"><tr><td>
<?php $result2=$link->query("select apellidos, nombre, foto, nivel from usuarios where userid = $id_usuario limit 1") or die ($link->error);
				if($row2 = $result2->fetch_row()){ 
							$archivo_=$row2[2];
							
							if($archivo_=='' or $archivo_==' 'or $archivo_==NULL){
							$foto= '<img align="left"  align="absbottom" src="/img/unknownUser50.jpg" border="0" width="50" height="50" />';
							}else{
						$foto= '<img align="left" align="absbottom" src="/fotos/usuarios/mini3/'.$archivo_.'" border="0" alt="'.$archivo_.'" />';
							}
			}else{
			
			}
			if($row2[3]==4){
						$ano_actual=date("Y",time ());
						$nes_actual=date("n",time ());
						if($nes_actual>1){
						$matricula_vigente = $ano_actual;
						}else{
						$matricula_vigente = ($ano_actual-1);
						}
			$result_anio=$link->query("select ano, nivelid from matriculas where userid = $id_usuario and ano = $matricula_vigente limit 1") or die (mysql_error());
						if($row_ano = $result_anio->fetch_row()){
						$nivelid=$row_ano[1];
						}
						
			$result_grado=$link->query("select nivel, grado from niveles where nivelid = $nivelid limit 1") or die (mysql_error());	
				
						if($row_grado = $result_grado->fetch_row()){
						$c_nivel=$row_grado[0];
						$c_grado=$row_grado[1];		
						}
					if($c_nivel==0){
					$aula='inicial';
					}elseif($c_nivel==1){
					$aula=$row_grado[1].'&ordm; de primaria';
					}elseif($c_nivel==2){
					$aula=$row_grado[1].'&ordm; de secundaria';
					}else{
					$aula='';
					}
						
			$nivel_usuario='Estudiante de '.$aula;
			}elseif($row2[3]==3){
			$nivel_usuario='Padre de familia';
			}elseif($row2[3]==2){
			$nivel_usuario='Docente';
			}else{
			$nivel_usuario='Administrativo';	
			}
			
			echo $foto.' '.$row2[0].' '.$row2[1].'<br> <div  style="bottom:0;color:#808080;font-size:12px">'.$nivel_usuario.'<div>';
			
			?>
			</td></tr></table>
			
			<?php }

//////////////////////////////////////////////////////////////////////////////////











function cuadro_user2($id_usuario,$link){
$result2=$link->query("select apellidos, nombre, foto, nivel from usuarios where userid = $id_usuario limit 1") or die ($link->error);
				if($row2 = $result2->fetch_row()){ 
							$archivo_=$row2[2];
							
							if($archivo_=='' or $archivo_==' 'or $archivo_==NULL){
							$foto= '<img align="left"  align="absbottom" src="/img/unknownUser50.jpg" border="0" width="130" height="130" />';
							}else{
						$foto= '<img align="left" align="absbottom" src="/fotos/usuarios/130/'.$archivo_.'" border="0" alt="'.$archivo_.'" />';
							}
			}else{
			
			}
					
			echo $foto.' '.$row2[0].' '.$row2[1];
}

function foto_user($id_usuario,$link){
$result2=$link->query("select foto from usuarios where userid = $id_usuario limit 1") or die ($link->error);
				if($row2 = $result2->fetch_row()){ 
							$archivo_=$row2[0];
							
							if($archivo_=='' or $archivo_==' 'or $archivo_==NULL){
							$foto= '<img align="left"  align="absbottom" src="/img/unknownUser50.jpg" border="0" width="50" height="50" />';
							}else{
						$foto= '<img align="left" align="absbottom" src="/fotos/usuarios/mini3/'.$archivo_.'" border="0" alt="'.$archivo_.'" />';
							}
			}else{
			
			}
					
			echo $foto;
}


function nombre_cargo($id_usuario,$link){
$result2=$link->query("select apellidos, nombre, foto, nivel from usuarios where userid = $id_usuario limit 1") or die ($link->error);
				
				$row2 = $result2->fetch_row();
				
			if($row2[3]==4){
						$ano_actual=date("Y",time ());
						$nes_actual=date("n",time ());
						if($nes_actual>1){
						$matricula_vigente = $ano_actual;
						}else{
						$matricula_vigente = ($ano_actual-1);
						}
			$result_anio=$link->query("select ano, nivelid from matriculas where userid = $id_usuario and ano = $matricula_vigente limit 1") or die (mysql_error());
						if($row_ano = $result_anio->fetch_row()){
						$nivelid=$row_ano[1];
						}
						
			$result_grado=$link->query("select nivel, grado from niveles where nivelid = $nivelid limit 1") or die (mysql_error());	
				
						if($row_grado = $result_grado->fetch_row()){
						$c_nivel=$row_grado[0];
						$c_grado=$row_grado[1];		
						}
					if($c_nivel==0){
					$aula='inicial';
					}elseif($c_nivel==1){
					$aula=$row_grado[1].'&ordm; de primaria';
					}elseif($c_nivel==2){
					$aula=$row_grado[1].'&ordm; de secundaria';
					}else{
					$aula='';
					}
						
			$nivel_usuario='Estudiante de '.$aula;
			}elseif($row2[3]==3){
			$nivel_usuario='Padre de familia';
			}elseif($row2[3]==2){
			$nivel_usuario='Docente';
			}else{
			$nivel_usuario='Administrativo';	
			}
			
			echo '<strong><div  style="font-size:12px">'.$row2[0].' '.$row2[1].'</font></strong><br> <div  style="bottom:0;color:#808080;font-size:12px">('.$nivel_usuario.')<div>';
			
			
}
///////////////////////////////
function nombre_cargo2($id_usuario,$link){
$result2=$link->query("select apellidos, nombre, foto, nivel from usuarios where userid = $id_usuario limit 1") or die ($link->error);
				
				$row2 = $result2->fetch_row();
				
			if($row2[3]==4){
						$ano_actual=date("Y",time ());
						$nes_actual=date("n",time ());
						if($nes_actual>1){
						$matricula_vigente = $ano_actual;
						}else{
						$matricula_vigente = ($ano_actual-1);
						}
			$result_anio=$link->query("select ano, nivelid from matriculas where userid = $id_usuario and ano = $matricula_vigente limit 1") or die (mysql_error());
						if($row_ano = $result_anio->fetch_row()){
						$nivelid=$row_ano[1];
						}
						
			$result_grado=$link->query("select nivel, grado from niveles where nivelid = $nivelid limit 1") or die (mysql_error());	
				
						if($row_grado = $result_grado->fetch_row()){
						$c_nivel=$row_grado[0];
						$c_grado=$row_grado[1];		
						}
					if($c_nivel==0){
					$aula='inicial';
					}elseif($c_nivel==1){
					$aula=$row_grado[1].'&ordm; de primaria';
					}elseif($c_nivel==2){
					$aula=$row_grado[1].'&ordm; de secundaria';
					}else{
					$aula='';
					}
						
			$nivel_usuario='Estudiante de '.$aula;
			}elseif($row2[3]==3){
			$nivel_usuario='Padre de familia';
			}elseif($row2[3]==2){
			$nivel_usuario='Docente';
			}else{
			$nivel_usuario='Administrativo';	
			}
			
echo '<strong><font style="font-size:12px">'.$row2[0].' '.$row2[1].'</font></strong> <font style="bottom:0;color:#808080;font-size:12px">('.$nivel_usuario.')</font>';
			
			
}

function foto_noticia($noticia_id,$link){

$result_anio=$link->query("select foto from noticias where noticiaid = $noticia_id limit 1") or die (mysql_error());
				if($row_ano = $result_anio->fetch_row()){
				$archivo_=$row_ano[0];
				
						
						if($archivo_=='' or $archivo_==' 'or $archivo_==NULL){
						$foto= '<img align="left"  align="absbottom" src="/img/sinimg.gif" border="0" width="50" height="50" />';
							}else{
						$foto= '<img align="left" align="absbottom" src="/fotos/noticias/mini3/'.$archivo_.'" width="65" height="65" border="0" alt="'.$archivo_.'" />';
						}
				echo $foto;
							
				}
}



function foto_galeria($foto_id,$link){
$result_anio=$link->query("select nombre from descargas where descargaid = $foto_id limit 1") or die (mysql_error());
				if($row_ano = $result_anio->fetch_row()){
				$archivo_=$row_ano[0];
						
						if($archivo_=='' or $archivo_==' 'or $archivo_==NULL){
						$foto= '<img align="left"  align="absbottom" src="/img/sinimg.gif" border="0" width="50" height="50" />';
							}else{
						$foto= '<img align="left" align="absbottom" src="/fotos/galeria/mini3/'.$archivo_.'" width="65" height="65" border="0" alt="'.$archivo_.'" />';
						}
				echo $foto;
							
				}else{
				echo '('.$foto_id.')';	
				}
}
?>