<?php 
error_reporting (E_ALL);
header("Content-Type: text/html;charset=utf-8");
ini_set("display_errors","1");
ini_set("session.cookie_lifetime","999999");
ini_set("session.gc_maxlifetime","999999");
@session_start();
include_once('config.php');
include_once($dir_file_conexion.'conexion.php');
include('id.php');

/*
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES_LA" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" lang="es" xml:lang="ES">
<head>
<title></title>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" rightmargin="0">


<?php 
*/
include ($carpeta_contenidos.'/'.$carpeta_del_modulo.'/'.'action.php');
/*
?>

</body>
</html>
<?php */ ?>