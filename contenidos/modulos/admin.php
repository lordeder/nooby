<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES_LA" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>

<link rel="icon" type="image/png" href="<?php echo $icono_pagina; ?>" />

<script language="JavaScript" type="text/javascript" src="contenidos/modulos/js/ajax_ing_modulo.js"></script>
<script language="JavaScript" type="text/javascript" src="contenidos/modulos/js/ajax.js"></script>

<link rel="stylesheet" type="text/css" href="themes/bootstrap-4.4.1/css/bootstrap.min.css">
<script src="themes/bootstrap-4.4.1/js/jquery.min.js"></script>
<script src="themes/bootstrap-4.4.1/js/bootstrap.min.js"></script>
<script src="themes/bootstrap-4.4.1/js/popper.min.js"></script>
<link rel="stylesheet" type="text/css" href="themes/material-design-icons-master/css/material-icons.min.css">
<link rel="stylesheet" type="text/css" href="themes/material-design-icons-master/css/materialdesignicons.css">
  <style>
  @font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(themes/material-design-icons-master/fonts/iconos.woff2) format('woff2');
}

.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
  
}   </style>

<meta content='text/html; charset=utf-8' http-equiv='Content-Type' />
<meta name="description" content="<?php echo $descripcion; ?>"/>
<meta name="keywords" content="<?php  ?> " />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<?php //////  MODAL FACEBOOK /////// ?>
<script src="themes/facebox/facebox.js" type="text/javascript"></script>
<link href="themes/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox() 
    })
</script>

<!-- Open Graph protocol no cambia de posicion los metas http:// -->

<meta property="og:title" content="<?php echo $titulo_pagina; ?>" />

<meta property="og:type" content="article" />

<meta property="og:url" content="<?php echo $url_p_redes; ?>" />

<meta property="og:image" content="<?php echo $imagen_redes; ?>" />

<meta property="og:site_name" content="Taki.La" />

<meta property="og:description" content="<?php echo $descripcion; ?>" />
 <meta property="og:locale" content="es_LA" />

<title><?php echo $titulo_pagina; ?></title>

<?php echo $head.$head_html;  ?> 

</head>



<body>
<?php if(isset($theme_propio) and $theme_propio){////////----- header
	include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/themes/'.$theme.'/header.php');
} ?>

  


<?php
include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/action.php'); 
?>

	








</body>
</html>
