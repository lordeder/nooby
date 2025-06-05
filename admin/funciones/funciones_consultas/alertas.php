<?php
//TIENDA
function n_alertas_admin($userid,$link){
$result=$link->query("select alertaid from tienda_alertas where userid_receptor = $userid and (tipo = 21 or tipo = 22) and revizado = 0")  or die ($link->error);
$total_records = $result->num_rows;
return $total_records;
}


function n_mensajes($userid,$link){
$result=$link->query("select alertaid from tienda_alertas where userid_receptor = $userid and tipo = 5 and revizado = 0")  or die ($link->error);
$total_records = $result->num_rows;
return $total_records;
}

function n_coments($userid,$link){
$result=$link->query("select alertaid from tienda_alertas where userid_receptor = $userid and (tipo = 0 or tipo = 1 or tipo = 2 or tipo = 4) and revizado = 0")  or die ($link->error);
$total_records = $result->num_rows;
return $total_records;
}


?>