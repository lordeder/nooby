<div align="center" id="mensaje"></div>
<a href="contenedor_ajax.php?id=admin&action=ing_item" rel="facebox">Nuevo item</a>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Modulo (Carpeta)</th>
	  <th scope="col">Archivo</th>
      <th scope="col">Titulo</th>
      <th scope="col">item (?id=...)</th>
      <th scope="col">...</th>
    </tr>
  </thead>
  
  <tbody>
<?php
$result=$link->query("select titulo, id, moduloid, archivo from $tabla_items_pagina order by moduloid ") or die ($link->error);
while($row = $result->fetch_object()) {

$moduloid=$row->moduloid;
$nombre_modulo=mostrar('nombre',$tabla_modulos_pagina,'moduloid',$moduloid,$link);
$nombre_carpeta=strtolower($nombre_modulo);

$carpeta_del_modulo=normaliza(strtolower(mostrar('nombre',$tabla_modulos_pagina,'moduloid',$moduloid,$link)));
$archivo=$row->archivo;
if(file_exists($carpeta_contenidos.'/'.$carpeta_del_modulo.'/'.$archivo)){

}else{
$archivo='<p style="color:red;">'.$archivo.'</p>';
}
?>
    <tr>
      <th scope="row"><?php echo $nombre_modulo; ?>/</th>
	  <td><?php echo $archivo; ?></td>
      <td><?php echo $row->titulo; ?></td>
      <td><?php echo $row->id; ?></td>
      
	  <td>
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light">


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ...
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="contenedor_ajax.php?id=admin&action=form_mod_item&moduloid=<?php echo $moduloid; ?>&id_item=<?php echo $row->id; ?>" rel="facebox">Editar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="contenedor_ajax.php?id=admin&action=del_item&moduloid=<?php echo $moduloid; ?>&id_item=<?php echo $row->id; ?>" rel="facebox">Eliminar</a>
        </div>
      </li>

    </ul>

  </div>
</nav>
		
		
		
		
	  </td>
	  
    </tr>
	<?php } ?>

  </tbody>
</table>




	
	
	
	
	



