<?php 
include_once($dir_funciones_page.'funciones_consultas/mostrar_ajax.php');
$db_tabla=$tabla_usuarios;//$_GET['db_tabla'];

$db_columnaid='userid';//$_GET['db_columnaid'];
//$v_id=$row->moduloid;//$_GET['v_id'];

$id_page=$_GET['id'];
$action_name='form_mod_valor';
$texto='<button type="button" class="btn btn-outline-success"><i class="mdi mdi-edit"></i></button>';
?>
<a href="contenedor_ajax.php?id=admin&action=ing_usuario" rel="facebox">Nuevo usuario</a>

<table class="table table-hover">
  <thead>
    <tr>
		<th scope="col">id</th>
      <th scope="col">Usuario</th>
	  <th scope="col">Email</th>
      <th scope="col">Tipo</th>
      <th scope="col">Apellidos y nombres</th>
	  <th scope="col">Registro</th>
	  <th scope="col">Ult. login</th>
      <th scope="col">...</th>
    </tr>
  </thead>
  
  <tbody>
<?php 
$result=$link->query("select userid, user, tipo, email, apellidos, nombres, fecha_reg, ult_login from $tabla_usuarios order by userid ") or die ($link->error);
while($row = $result->fetch_object()) {
$v_id=$row->userid;
$div_respuesta='div_user_'.$v_id;//$_GET['div_respuesta'];
?>
    <tr>
	<td><?php  echo $row->userid; ?></td>
      <th scope="row"><div id="div_user_<?php  echo $v_id; ?>"><?php  echo $row->user; ?></div></th>
	  <td><div id="div_email_<?php  echo $v_id; ?>"><?php  echo $row->email; ?></div></td>
      <td><?php  echo $row->tipo; ?></td>
      <td><?php  echo $row->apellidos.' '.$row->nombres; ?></td>
      <td><?php  echo $row->fecha_reg; ?></td>
	  <td><?php  echo $row->ult_login; ?></td>
	  <td>
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light">


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ...
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><b>Editar</b></a>
		  <?php  echo mostrar_mod1('Usuario',$db_tabla,'user',$db_columnaid,$v_id,'div_user_'.$v_id,$id_page,$action_name); ?><br />
		  <?php  echo mostrar_mod1('Email',$db_tabla,'email',$db_columnaid,$v_id,'div_email_'.$v_id,$id_page,$action_name); ?>
		  
<?php  /*<a class="dropdown-item" href="contenedor_ajax.php?id=admin&action=form_mod_item&moduloid=<?php  echo $moduloid; ?>&id_item=<?php  echo $row->id; ?>" rel="facebox">Editar</a> */ ?>
          <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="contenedor_ajax.php?id=admin&action=editar_usuario&valor=<?php  echo $row->userid; ?>" rel="facebox">Editar datos</a>

          <a class="dropdown-item" href="contenedor_ajax.php?id=admin&action=del_usuario&id_user=<?php  echo $row->userid; ?>" rel="facebox">Eliminar</a>
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








      
	
	
	
	



