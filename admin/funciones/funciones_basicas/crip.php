<?php
function encrip1($cadena,$fuerza){
	/*
	$salt1 = md5(substr($cadena,-3, 1));
	$salt2 = md5(substr($cadena, 2, -1));//substr("abcdef", 2, -1);  // devuelve "cde"
$i = 1;
  while ($i <= $fuerza) {
    $cadena = md5($salt2.$cadena.$salt1);
    $i++;
  }
return $cadena; bcrypt
*/
$hash = password_hash($cadena, PASSWORD_BCRYPT);
return $hash;
}
?>