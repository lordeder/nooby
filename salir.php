<?php
// Inicializa de la sesion_
// Si est usando session_name("algo"), &iexcl;no lo olvide ahora!
session_start();
// Destruye todas las variables de la sesion
//$_SESSION = array();

// Destruye todas las variables de la sesion
session_unset();

// Finalmente, destruye la sesion
session_destroy();
//header ("Location: ../index.php");

//$pagina = $_GET['url'];

header("Location: index.php"); 
?>
