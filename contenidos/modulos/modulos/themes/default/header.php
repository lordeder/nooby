<?php  
if(isset($_SESSION['nivel'])){ //Limitando el nivel de acceso a los modulos
  if($_SESSION['nivel'] == 3){
      //include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/especie/ing_especie.php');
  } else {
      echo 'Acceso denegado';
      exit();
  }
} else {
  if($mod_debug){ echo 'Tiene que iniciar sesion'; }
  include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/form_login.php');
  exit();
}


if(isset($_GET['action'])){
$action=trim($_GET['action']);
}else{
$action="";
}
?>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded fixed-top">
<i class="mdi mdi-home"></i>
<a href="<?php  echo $url; ?>">Inicio</a>
&nbsp;&nbsp;&nbsp;
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" style="">
      <!--<ul class="navbar-nav mr-auto">-->
      <ul class="nav nav-pills">
 
        <li class="nav-item"> 
          <a class="nav-link<?php  if($action==''){ echo ' active"'; } ?>" href="<?php  echo $url.tipo_direccion($tipo_url,"admin"); ?>">
          <i class="mdi mdi-database"></i>
           Items </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link<?php  if($action=='lista_modulos'){ echo ' active"'; } ?>" href="<?php  echo $url.tipo_direccion($tipo_url,"admin,lista_modulos"); ?>">
          <i class="mdi mdi-folder-multiple"></i>
           Modulos</a>
        </li>

		 <li class="nav-item">
          <a class="nav-link<?php  if($action=='usuarios'){ echo ' active"'; } ?>" href="<?php  echo $url.tipo_direccion($tipo_url,"admin,usuarios"); ?>">
          <i class="mdi mdi-account-multiple"></i> Usuarios</a>
        </li>
        
		
		 <li class="nav-item">
          <a class="nav-link<?php  if($action=='paginas_datos'){ echo ' active"'; } ?>" href="<?php  echo $url.tipo_direccion($tipo_url,"admin,paginas_datos"); ?>">
          <i class="mdi mdi-account-multiple"></i> Datos página</a>
        </li>

          
        </li>


        <li class="nav-item">
          <a class="nav-link" href="<?php  echo $url; ?>/salir.php" onclick="return confirm('¿Seguro que desea cerrar la sesi�n?');">
          <i class="mdi mdi-logout-variant"></i> Salir</a>
          
        </li>

          
        </li>
      </ul>
      <form class="form-inline my-2 my-md-0">
        <input class="form-control" type="text" placeholder="Buscar" aria-label="Search">
      </form>
    </div>
  </nav>
  
</header>
<br><br>