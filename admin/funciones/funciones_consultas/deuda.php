<?php
function cuanto_debe($alumnoid,$ano,$link){

$result=$link->query("select perfilid from matriculas where userid = '$alumnoid' and ano = '$ano' limit 1") or die ($link->error);
if($row =$result->fetch_object()){

$perfilid=$row->perfilid;
		//$perfilid=mostrar_2('perfilid','matriculas','userid',$alumnoid,'ano',$ano_academico,$link);

		$result2_deuda=$link->query("select SUM(monto) as monto_deuda  from pagos_programados where perfilid = '$perfilid' and vencimiento <= CURDATE() ") or die (mysql_error());
		$row2_deuda = $result2_deuda->fetch_row();
		$haber_pagado=$row2_deuda[0];
		
			$result_pagado=$link->query("select SUM(monto) as total from pagos where alumnoid = '$alumnoid' and ano_academico = '$ano' ") or die (mysql_error());
			if($row_pagado = $result_pagado->fetch_row()) {
				return  $haber_pagado-$row_pagado[0];
				}else{
				return 'error 1';
				}

}else{ return 'error 2'; }//No 

}

/////////////////////////////////////////////////////////
function cuanto_debe2($alumnoid,$ano,$perfilid,$link){

		$result2_deuda=$link->query("select SUM(monto) as monto_deuda  from pagos_programados where perfilid = '$perfilid' and vencimiento <= CURDATE() ") or die (mysql_error());
		$row2_deuda = $result2_deuda->fetch_row();
		$haber_pagado=$row2_deuda[0];
		
			$result_pagado=$link->query("select SUM(monto) as total from pagos where alumnoid = '$alumnoid' and ano_academico = '$ano' ") or die (mysql_error());
			if($row_pagado = $result_pagado->fetch_row()) {
				return  $haber_pagado-$row_pagado[0];
				}else{
				return 'error 1';
				}

}
/////////////////////////////////////////////////////////
function haber_pagado2($alumnoid,$perfilid,$link){

		$result2_deuda=$link->query("select SUM(monto) as monto_deuda  from pagos_programados where perfilid = '$perfilid' and vencimiento <= CURDATE() ") or die (mysql_error());
		$row2_deuda = $result2_deuda->fetch_row();
		$haber_pagado=$row2_deuda[0];
		return $haber_pagado;
			

}
/////////////////////////////////////////////////////////
function pagado($alumnoid,$ano_academico,$link){

$result=$link->query("select SUM(monto) as monto_pagado from pagos where alumnoid = $alumnoid and ano_academico = $ano_academico") or die (mysql_error());
	if($row = $result->fetch_row()){
	return $row[0];
	}else{
	return 0;
	}

}

?>