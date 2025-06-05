<div align="center" id="mensaje"></div>
<a href="contenedor_ajax.php?id=admin&action=ing_pagina" rel="facebox">Nueva página</a>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id_page</th>
	  <th scope="col">Titulo</th>
      <th scope="col">Icono</th>
      <th scope="col">Imagen_redes</th>
      <th scope="col">Nombre</th>
	  <th scope="col">Pie de pagina </th>
	  <th scope="col">default_item (id=...)</th>
    </tr>
  </thead>
  
  <tbody>
<?php 
$result=$link->query("select id_page, titulo, icono, imagen_redes, nombre, pie_pagina, descripcion, default_item from $pagina_datos order by id_page ") or die ($link->error);
while($row = $result->fetch_object()) {

$id_page=$row->id_page;


if(file_exists($carpeta_contenidos.'/'.$carpeta_del_modulo.'/'.$archivo)){

}else{
$archivo='<p style="color:red;">'.$archivo.'</p>';
}
?>
    <tr>
      <th scope="row"><?php  echo $row->id_page; ?></th>
	  <td><?php  echo $row->titulo; ?></td>
      <td><?php  echo $row->icono; ?></td>
      <td><?php  echo $row->imagen_redes; ?></td>
	  <td><?php  echo $row->descripcion; ?></td>
	  <td><?php  echo $row->nombre; ?></td>
	  <td><?php  echo $row->pie_pagina; ?></td>
	  <td><?php  echo $row->default_item; ?></td>
      
	  <td>
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light">


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ...
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    
          <a class="dropdown-item" href="contenedor_ajax.php?id=admin&action=form_mod_pag_datos&id_page=<?php  echo $id_page; ?>&id_pagina=<?php  echo $row->id_page; ?>" rel="facebox">Editar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="contenedor_ajax.php?id=admin&action=del_pagina&id_page=<?php  echo $id_page; ?>&id_pagina=<?php  echo $row->id_page; ?>" rel="facebox">Eliminar</a>
        </div>
      </li>

    </ul>

  </div>
</nav>
		
		
		
		
	  </td>
	  
    </tr>
	<?php  } ?>

  </tbody>
</table>




	
	
	
	
	



