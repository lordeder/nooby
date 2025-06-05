<?php
//////////////////////////////////AVG
function prom_relat($alumnoid,$cursoid,$ano,$link){
$result=@$link->query("select FORMAT(AVG(nota),2) from registros where alumnoid like '$alumnoid' and cursoid like '$cursoid' and ano like '$ano' ");
if($row =$result->fetch_row()){
$promedio=$row[0];
				//if($promedio<=10){ $color_nota='<font color="#FF0000">';}else{ $color_nota='<font color="#0000FF">';}
				 // if($promedio<10){ $cero='0';}else{ $cero='';}					  
				 // $texto=$color_nota.$cero.$promedio.'</font>';
//$texto=$row->0;

return $promedio;
}else{ echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; }
}
//////////////////////////////////
function prom_abs($alumnoid,$cursoid,$ano,$unidades,$link){
$result=@$link->query("select FORMAT((SUM(nota)/$unidades),2) from registros where alumnoid like '$alumnoid' and cursoid like '$cursoid' and ano like '$ano' ");
if($row =$result->fetch_row()){
$promedio=$row[0];
				//if($promedio<=10){ $color_nota='<font color="#FF0000">';}else{ $color_nota='<font color="#0000FF">';}
				//  if($promedio<10){ $cero='0';}else{ $cero='';}					  
				 // $texto=$color_nota.$cero.$promedio.'</font>';
//$texto=$row->0;

return $promedio;
}else{ echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; }
}
//////////////////////////////////AVG
function prom_total2($alumnoid,$ano,$link){
$result=@$link->query("select FORMAT(AVG(nota),2) from registros where alumnoid like '$alumnoid' and ano like '$ano' ");
if($row =$result->fetch_object()){

return $row->FORMAT(AVG(nota),2);
}else{ echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; }
}
//////////////////////////////////AVG
function prom_total($alumnoid,$ano,$link){
$result=@$link->query("select FORMAT(AVG(nota),2) from registros where alumnoid like '$alumnoid' and ano like '$ano' ");
if($row =$result->fetch_object()){
				if($row->FORMAT(AVG(nota),2)<=10){ $color_nota='<font color="#FF0000">';}else{ $color_nota='<font color="#0000FF">';}
				  if($row->FORMAT(AVG(nota),2)<10){ $cero='0';}else{ $cero='';}					  
				  $texto=$color_nota.$cero.$row->FORMAT(AVG(nota),2).'</font>';
//$texto=$row->0;

return $texto;
}else{ echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; }
}
//////////////////////////////////AVG cursos.nivelid
function ord_mer_total($alumnoid,$nivel_id,$ano,$link){

$ord=0;
$num=0;

$result=@$link->query("select registros.alumnoid, AVG(registros.nota) from registros, cursos where cursos.nivelid = $nivel_id and cursos.cursoid = registros.cursoid and registros.ano like '$ano' GROUP BY registros.nota order by AVG(registros.nota) desc ") or die ($link->error);
while($row =$result->fetch_object()) {
$num++;
	if($row->registros.alumnoid==$alumnoid){ $ord=$num;}
}
return $ord;
}
//////////////////////////////////
function otro_ord_mer_total_igual($alumnoid,$nivel_id,$promedio,$ano,$link){

$result=@$link->query("select registros.alumnoid, AVG(registros.nota), cursos.nivelid from registros, cursos where cursos.nivelid = $nivel_id and cursos.cursoid = registros.cursoid and registros.ano like '$ano' GROUP BY registros.nota order by AVG(registros.nota) desc ") or die ($link->error);

	$row =$result->fetch_object();	
	return $row->registros.alumnoid;
	
}
///////////////////////////////
//////////////////////////////////AVG cursos.nivelid
function pro_max($nivel_id,$ano,$link){

$result=@$link->query("select AVG(registros.nota), cursos.nivelid from registros, cursos where cursos.nivelid = $nivel_id and cursos.cursoid = registros.cursoid and registros.ano like '$ano' GROUP BY registros.nota order by AVG(registros.nota) desc ") or die ($link->error);
if($row =$result->fetch_object()){

						if($row->AVG(registros.nota)<=10){ $color_nota='<font color="#FF0000">';}
						else{ $color_nota='<font color="#0000FF">';}
					  if($row->AVG(registros.nota)<10){ $cero='0';}else{ $cero='';}					  
					  $texto=$color_nota.$cero.$row->AVG(registros.nota).'</font>';
	//$texto=$row->0;
	
	return $texto;
	}else{ echo '<font color="red">Error al seleccionar '.$columna.'!!</font><br>'; }

}
///////////////////////////////////////////////////////////////////////////
function ing_nota($nota,$alumnoid,$cursoid,$unidad,$ano,$link){
$sql = "INSERT INTO registros (nota,alumnoid,cursoid,unidad,ano) ";
$sql .= "VALUES ('$nota','$alumnoid','$cursoid','$unidad','$ano')";
	if($result = $link->query($sql)){
	return true;		
	}else{
	return false;
	}
}
?>