<?php



//$id_nivel=trim($_POST['aula']);

$n_dest=0;	


//// COMBINADA
$result_padres=$link->query("select matriculas.userid, 
							parentescos.apoderado
					from matriculas, parentescos
					where parentescos.alumno = matriculas.userid and matriculas.ano = $matricula_vigente GROUP BY parentescos.apoderado ") or die (mysql_error());

				while($row_padres = $result_padres->fetch_row()){
				$padre_id=$row_padres[1];
				$celular=mostrar('t_celular','padres','userid',$padre_id,$link);
					if(valida_celular($celular)){
					$n_dest++;
								if(isset($ver_dest)){//MOSTRAMOS LOS DESTINATARIOS
								echo '<div style="width:700px">'.$celular.' '.mostrar('apellidos','usuarios','userid',$padre_id,$link).' '.mostrar('nombre','usuarios','userid',$padre_id,$link);
								
								
								
//////////////////////////////////////////////////////////////////////////////////				
												 $result2=$link->query("select alumno, parentesco from parentescos where apoderado = '$padre_id'") or die (mysql_error());
												 
												 $result_parent=$link->query("select alumno, parentesco from parentescos where apoderado = '$padre_id' order by principal ASC LIMIT 1") or die (mysql_error());
												 
												 $num_result = $result2->num_rows;
												 
												 
												 echo ' (';
												 
												while ($row = $result_parent->fetch_object()) {
												$alumno_id = $row->alumno;
												$parentesco = $row->parentesco;
														if($parentesco==0){
														echo mostrar('apellidos','usuarios','userid',$alumno_id,$link).' '.mostrar('nombre','usuarios','userid',$alumno_id,$link);		
														}else{
														echo '<b>'.$parentesco_a["$parentesco"].' de: </b>',mostrar('apellidos','usuarios','userid',$alumno_id,$link).' '.mostrar('nombre','usuarios','userid',$alumno_id,$link);				}
														
													
													
												}
										if($num_result>2 ){
											echo ' y '.($num_result-1).' alumnos m&aacute;s';
										}elseif($num_result>1 ){
											echo ' y un alumno m&aacute;s';
										}else{}
			
								
								echo ') </div>';
								}
					}

				}



/*
		// obtenemos los alumnos matriculados en ese nivel id 

		$result_alumno=$link->query("select userid from matriculas where nivelid = $id_nivel and ano = $matricula_vigente") or die (mysql_error());
		//$num_result = $result_alumno->num_rows;
		//echo 'Alumnos alertados->'.$num_result;
		
		while($row_alumno = $result_alumno->fetch_row()){			
		$alumno_id=$row_alumno[0];

				// obtenemos los padres y alertamos
				// 
				
				
				
				$result_padres=$link->query("select apoderado from parentescos where alumno = $alumno_id ORDER BY principal DESC limit 2") or die (mysql_error());
				//$num_result = $result_padres->num_rows;
				//echo while($row_padres = $result_padres->fetch_row()){
				$padre_id=$row_padres[0];
				$celular=mostrar('t_celular','padres','userid',$padre_id,$link);
					if(valida_celular($celular)){
					$n_dest++;
								if(isset($ver_dest)){//MOSTRAMOS LOS DESTINATARIOS
								echo '<div>'.$celular.' '.mostrar('apellidos','usuarios','userid',$padre_id,$link).' '.mostrar('nombre','usuarios','userid',$padre_id,$link).'</div>';
								}
					}
				
				}'Padres alertados->'.$num_result;
							
		}
		
*/
?>