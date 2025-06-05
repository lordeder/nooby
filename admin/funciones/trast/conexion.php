<?php
function conectarse()
{
   if (!($link=mysql_connect("localhost","hidalgo_musica","pGR2yHt_MkfT")))//servidor,usuario,contrase単a preciosaunt006
   {
      echo "Error conectando a la base de datos, el usuario o contrase単a usados en el archivo conexion.php estan incorrectos";
      exit();
   }
   if (!mysql_select_db("hidalgo_tienda",$link))//nombre de la base de datos
   {
      echo "Error seleccionando la base de datos, posiblemente el nombre de la base de datos sea incorrecto";
      exit();
   }
   return $link;
}

?>

