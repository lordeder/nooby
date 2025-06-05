<?php
//////////////////////////////////AVG
function contrasena($text,$link){
$result=@$link->query("SELECT PASSWORD('$text')");
if($row =$result->fetch_row()){
$pass=$row[0];

return $pass;
}
}
//////////////////////////////////
?>