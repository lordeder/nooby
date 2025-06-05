<?php
////////////////////////////////////////////////////////////////////////////////////////////
if (!function_exists('mostrar_mod1')) {
	function mostrar_mod1($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$action_name){
	
	return "
	<a style=\"cursor:pointer\" onclick=\"mostrar_mod1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$action_name')\">  
	$texto
	</a>
	";	
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_mod1_1($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$action_name){

return "
<a style=\"cursor:hand\" onclick=\"mostrar_mod1_1('$db_tabla','$db_columna','$db_columnaid','$v_id','$div_respuesta','$id_page','$action_name')\">  
$texto
</a>
";	
}
////////////////////////////////////////////////////////////////////////////////////////////

?>