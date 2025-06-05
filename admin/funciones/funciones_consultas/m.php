<?php
function alertar($tipo,$id,$userid_emisor,$userid_receptor,$matricula_vigente,$link){
								$ano_actual=date("Y",time ());
								$mes_actual=date("m",time ());// numero del mes formato 01
								$nes_actual=date("n",time ());// numero del mes formato 1
								$dia_actual=date("d",time ());
								
								$hora_actual=date("H",time ());//hora 00
								$minutos_actual=date("i",time ());//hora 00
								$segundos_actual=date("s",time ());//hora 00
								//$fecha_actual="$ano_actual-$mes_actual-$dia_actual";
								$fecha_actual_completa="$ano_actual-$mes_actual-$dia_actual $hora_actual:$minutos_actual:$segundos_actual";

switch($tipo){
case '0':// Descarga
		//alertamos a los administradores
							$result_admin=$link->query("select userid from usuarios where nivel	= 1") or die (mysql_error());
							while($row_admin = $result_admin->fetch_row()){
							$admin_id=$row_admin[0];
							
								if($userid_emisor!=$admin_id){
								$sql = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
								$sql .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$admin_id')";
									if($result = $link->query($sql)){
										
									}else{
									echo 'No se pudo generar alerta a los administradores';	
									}
								}
							}
	
break;
/////////////////////////////////
case '1':// noticia
		//alertamos a los administradores
							$result_admin=$link->query("select userid from usuarios where nivel	= 1") or die (mysql_error());
							while($row_admin = $result_admin->fetch_row()){
							$admin_id=$row_admin[0];
							
								if($userid_emisor!=$admin_id){
								$sql = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
								$sql .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$admin_id')";
									if($result = $link->query($sql)){
										
									}else{
									echo 'No se pudo generar alerta a los administradores';	
									}
								}
							}
	
break;
////////////////////////////////
case '2':// Galeria
		//alertamos a los administradores
							$result_admin=$link->query("select userid from usuarios where nivel	= 1") or die (mysql_error());
							while($row_admin = $result_admin->fetch_row()){
							$admin_id=$row_admin[0];
							
								if($userid_emisor!=$admin_id){
								$sql = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
								$sql .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$admin_id')";
									if($result = $link->query($sql)){
										
									}else{
									echo 'No se pudo generar alerta a los administradores';	
									}
								}
							}
	
break;
////////////////////////////////
case '4':// mensaje personal
	if($userid_emisor==0 or $userid_emisor=='' or $userid_emisor==' ' or empty($userid_emisor)){
	echo 'Error al generar alerta, el remitente es ('.$userid_emisor.'';
	
	}elseif($userid_receptor==0 or $userid_receptor=='' or $userid_receptor==' ' or empty($userid_receptor)){
		
		echo 'Error al generar alerta, el destinatario es ('.$userid_receptor.'';
	}else{
			$userid_emisor=$_SESSION['userid'];
			$sql = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
			$sql .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$userid_receptor')";				
			if($result = $link->query($sql)){
				
			}else{
			echo 'No se pudo generar alerta ';	//('.$sql.')
			}
	}
break;
/////////////////////////////////////////
case '5':// mensajes grupal alumnos de nivel (y padres de un aula)

//obtenemos el nivel id
$result_curso=$link->query("select ident from comentarios where comentarioid = $id limit 1") or die (mysql_error());
if($row_curso = $result_curso->fetch_row()){
$id_nivel=$row_curso['0'];
//echo 'Nivel: '.$id_nivel.' matricula->'.$matricula_vigente;

		//alertamos a los administradores
		$result_admin=$link->query("select userid from usuarios where nivel	= 1 and userid !=$userid_emisor ") or die (mysql_error());
		//$num_result = $result_admin->num_rows;
		//echo 'Administradores alertados->'.$num_result;
		while($row_admin = $result_admin->fetch_row()){
		$admin_id=$row_admin[0];			
			$sql = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
			$sql .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$admin_id')";
			$result = $link->query($sql);			
		}
		//Alertamos profesores que enseñan en ese nivel	  and cursos_profes.profesorid !=$userid_emisor 	
		$result_prof=$link->query("select cursos_profes.profesorid, 
							cursos.nivelid							
					from cursos_profes, cursos
					where cursos_profes.cursoid = cursos.cursoid and cursos.nivelid = $id_nivel and cursos_profes.anio = $matricula_vigente and cursos_profes.profesorid != $userid_emisor ") or die (mysql_error());
		//$num_result = $result_prof->num_rows;
		//echo 'Profesores alertados->'.$num_result;
		while ($profe = $result_prof->fetch_row()){
		$id_profesor=$profe[0];
		$sql_pro = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
		$sql_pro .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$id_profesor')";
		$result_profe = $link->query($sql_pro);
		}
		


		// obtenemos los alumnos matriculados en ese nivel id 
		$result_alumno=$link->query("select userid from matriculas where nivelid = $id_nivel and ano = $matricula_vigente and userid !=$userid_emisor") or die (mysql_error());
		//$num_result = $result_alumno->num_rows;
		//echo 'Alumnos alertados->'.$num_result;
		while($row_alumno = $result_alumno->fetch_row()){			
		$alumno_id=$row_alumno[0];
		
		//enviamos alertas a los alumnos y alertamos
		$sql_al = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
		$sql_al .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$alumno_id')";
		$result_al = $link->query($sql_al);
		
				// obtenemos los padres y alertamos
				$result_padres=$link->query("select apoderado from parentescos where alumno = $alumno_id and apoderado != $userid_emisor limit 5") or die (mysql_error());
				//$num_result = $result_padres->num_rows;
				//echo 'Padres alertados->'.$num_result;
				while($row_padres = $result_padres->fetch_row()){
				$padre_id=$row_padres[0];
				
				$result_pa = $link->query("INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$padre_id')");
				}			
		}
		
		
		
		
	
}else{
	echo 'No se generaron alertas';	
}
break;
/////////////////////////////
case '9':// TODO EL COLEGIO

		//alertamos a los administradores
		$result_admin=$link->query("select userid from usuarios where nivel	= 1 and userid !=$userid_emisor ") or die (mysql_error());
		//$num_result = $result_admin->num_rows;
		//echo 'Administradores alertados->'.$num_result;
		while($row_admin = $result_admin->fetch_row()){
		$admin_id=$row_admin[0];			
			$sql = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
			$sql .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$admin_id')";
			$result = $link->query($sql);			
		}
		//Alertamos profesores que enseñan en ese nivel	  and cursos_profes.profesorid !=$userid_emisor 	
		$result_prof=$link->query("select cursos_profes.profesorid, 
							cursos.nivelid							
					from cursos_profes, cursos
					where cursos_profes.cursoid = cursos.cursoid and cursos_profes.anio = $matricula_vigente and cursos_profes.profesorid != $userid_emisor GROUP BY cursos_profes.profesorid ") or die (mysql_error());
		//$num_result = $result_prof->num_rows;
		//echo 'Profesores alertados->'.$num_result;
		while ($profe = $result_prof->fetch_row()){
		$id_profesor=$profe[0];
		$sql_pro = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
		$sql_pro .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$id_profesor')";
		$result_profe = $link->query($sql_pro);
		}
		


		// obtenemos los alumnos matriculados en ese nivel id 
		$result_alumno=$link->query("select userid from matriculas where ano = $matricula_vigente and userid !=$userid_emisor") or die (mysql_error());
		//$num_result = $result_alumno->num_rows;
		//echo 'Alumnos alertados->'.$num_result;
		while($row_alumno = $result_alumno->fetch_row()){			
		$alumno_id=$row_alumno[0];
		
		//enviamos alertas a los alumnos y alertamos
		$sql_al = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
		$sql_al .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$alumno_id')";
		$result_al = $link->query($sql_al);
		
				// obtenemos los padres y alertamos
				$result_padres=$link->query("select apoderado from parentescos where alumno = $alumno_id and apoderado != $userid_emisor limit 5") or die (mysql_error());
				//$num_result = $result_padres->num_rows;
				//echo 'Padres alertados->'.$num_result;
				while($row_padres = $result_padres->fetch_row()){
				$padre_id=$row_padres[0];
				
				$result_pa = $link->query("INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$padre_id')");
				}			
		}
break;
/////////////////////////////






case '21':// ----> FECHA DE EXAMEN   //$userid_emisor ->Profesorid   //id= examenid
// Obtenemos el curso,
$result_curso=$link->query("select cursoid from examenes_rol where examenid = $id limit 1") or die (mysql_error());
if($row_curso = $result_curso->fetch_row()){		
	$curso_id=$row_curso[0];	
	// obtenemos el nivel del curso
	$result_nivelid=$link->query("select nivelid from cursos where cursoid = $curso_id limit 1") or die (mysql_error());
	if($row_nivelid = $result_nivelid->fetch_row()){		
	$nivel_id=$row_nivelid[0];
		// obtenemos los alumnos matriculados en ese nivel id 
		$result_alumno=$link->query("select userid from matriculas where nivelid = $nivel_id and ano = $matricula_vigente") or die (mysql_error());
		while($row_alumno = $result_alumno->fetch_row()){
		$alumno_id=$row_alumno[0];
		//enviamos alertas a los alumnos y alertamos
		$sql = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
		$sql .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$alumno_id')";
		$result = $link->query($sql);
		
				// obtenemos los padres y alertamos
				$result_padres=$link->query("select apoderado from parentescos where alumno = $alumno_id limit 5") or die (mysql_error());
				while($row_padres = $result_padres->fetch_row()){
				$padre_id=$row_padres[0];
				
				$sql2 = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
				$sql2 .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$padre_id')";
				$result2 = $link->query($sql2);
				}			
		}
	}
}							//alertamos a los administradores
							$result_admin=$link->query("select userid from usuarios where nivel	= 1") or die (mysql_error());
							while($row_admin = $result_admin->fetch_row()){
							$admin_id=$row_admin[0];
							
							$sql3 = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
							$sql3 .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$admin_id')";
							$result3 = $link->query($sql3);
							
							}
break;
////////////////////////////////////////////////////////




case '22':// ----> TRABAJO ENCARGADO   //$userid_emisor ->Profesorid   //id= examenid
// Obtenemos el curso,
$result_curso=$link->query("select cursoid from examenes_rol where examenid = $id limit 1") or die (mysql_error());
if($row_curso = $result_curso->fetch_row()){		
	$curso_id=$row_curso[0];	
	//echo 'Cursoid '.$curso_id;
	// obtenemos el nivel del curso
	$result_nivelid=$link->query("select nivelid from cursos where cursoid = $curso_id limit 1") or die (mysql_error());
	if($row_nivelid = $result_nivelid->fetch_row()){		
	$nivel_id=$row_nivelid[0];
	//echo 'Nivelid '.$nivel_id;
		// obtenemos los alumnos matriculados en ese nivel id 
		$result_alumno=$link->query("select userid from matriculas where nivelid = $nivel_id and ano = $matricula_vigente") or die (mysql_error());
		$num_result = $result_alumno->num_rows;
		//echo 'Alumnos alertados->'.$num_result;
		while($row_alumno = $result_alumno->fetch_row()){
		$alumno_id=$row_alumno[0];
		//enviamos alertas a los alumnos y alertamos
		$sql = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
		$sql .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$alumno_id')";
		$result = $link->query($sql);
		
				// obtenemos los padres y alertamos
				$result_padres=$link->query("select apoderado from parentescos where alumno = $alumno_id limit 5") or die (mysql_error());
				while($row_padres = $result_padres->fetch_row()){
				$padre_id=$row_padres[0];
				
				$sql2 = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
				$sql2 .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$padre_id')";
				$result2 = $link->query($sql2);
				}			
		}
	}
}							//alertamos a los administradores
							$result_admin=$link->query("select userid from usuarios where nivel	= 1") or die (mysql_error());
							while($row_admin = $result_admin->fetch_row()){
							$admin_id=$row_admin[0];
							
							$sql3 = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
							$sql3 .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$admin_id')";
							$result3 = $link->query($sql3);
							
							}
break;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////



case '23':// ----> NOTA  //$userid_emisor ->Profesorid   //id= examenid

		//enviamos alertas a los alumnos y alertamos
		$sql = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
		$sql .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$userid_receptor')";
		$result = $link->query($sql);
		
				// obtenemos los padres y alertamos
				$result_padres=$link->query("select apoderado from parentescos where alumno = $userid_receptor limit 5") or die (mysql_error());
				while($row_padres = $result_padres->fetch_row()){
				$padre_id=$row_padres[0];
				
				$sql = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
				$sql .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$padre_id')";
				$result = $link->query($sql);
				}			
		
	
							
break;
////////////////////////////////////////////////////////



case '25':// ----> NOTA  trabajo //$userid_emisor ->Profesorid   //id= examenid

		//enviamos alertas a los alumnos y alertamos
		$sql = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
		$sql .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$userid_receptor')";
		$result = $link->query($sql);
		
				// obtenemos los padres y alertamos
				$result_padres=$link->query("select apoderado from parentescos where alumno = $userid_receptor limit 5") or die (mysql_error());
				while($row_padres = $result_padres->fetch_row()){
				$padre_id=$row_padres[0];
				
				$sql2 = "INSERT INTO alertas (tipo,fecha,id,userid_emisor,userid_receptor) ";
				$sql2 .= "VALUES ('$tipo','$fecha_actual_completa','$id','$userid_emisor','$padre_id')";
				$result2 = $link->query($sql2);
				}			
		
	
							
break;
////////////////////////////////////////////////////////


default:
break;

}//FIN switch

}
?>