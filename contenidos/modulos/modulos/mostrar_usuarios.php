<?php if(isset($_SESSION['nivel']) and $_SESSION['nivel']>1){ 
$cant=50;//resultados de la consulta
$query_permitidas = array("userid", "user", "email", "nombres", "apellidos", "ult_login", "tipo", "fecha_reg");

if(isset($_GET['valor']) and in_array($_GET['valor'], $query_permitidas)){
$columna_consulta=$_GET['valor'];
	if(isset($_GET['valor2'])){
	$orden_consulta='ASC';
	}else{
	$orden_consulta='DESC';
	}
	
	if(isset($_GET['valor3']) and is_numeric($_GET['valor3']) ){//pagina
	$pagina=$_GET['valor3'];
	}else{
	$pagina=1;
	}


}else{
$columna_consulta='userid';
$orden_consulta='';
	if(isset($_GET['valor3']) and is_numeric($_GET['valor3']) ){//pagina
	$pagina=$_GET['valor3'];
	}else{
	$pagina=1;
	}
}

$total_record=contar_todos('userid',$tabla_usuarios,$link);
$paginas=ceil($total_record/$cant);
$inicio=($pagina-1)*$cant;
?>
<table class="table table-hover">

  <thead>
    <tr>
	  <th scope="col">T</th>
      <th scope="col"><a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,userid,1')?>">ID </a>   <a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,userid')?>"> <i class="fas fa-angle-down"  aria-hidden="true"></i></a></th>
      <th scope="col"><a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,user,1')?>">Username  </a>  <a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,user')?>"> <i class="fas fa-angle-down"  aria-hidden="true"></i></a></th>
      <th scope="col">nombres</th>
      <th scope="col"><a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,apellidos,1')?>">apellidos</a> <a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,apellidos')?>"><i class="fas fa-angle-down"  aria-hidden="true"></i></a> </th>
	  <th scope="col"><a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,ult_login,1')?>"> Ult. login </a>  <a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,ult_login')?>"> <i class="fas fa-angle-down"  aria-hidden="true"></i></a> </th>
	  <th scope="col"><a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,fecha_reg,1')?>"> Registro</a>  <a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,fecha_reg')?>">  <i class="fas fa-angle-down"  aria-hidden="true"></i></a></th>
	  <th scope="col">X</th>
    </tr>
  </thead>
  
  <tbody>
  
  <?php 
$result=@$link->query("select userid, user, email, nombres, apellidos, ult_login, tipo, fecha_reg from $tabla_usuarios order by $columna_consulta $orden_consulta limit $inicio,$cant") or die ($link->error);
while($row = $result->fetch_object()){
//echo $row->userid.' '.$row->user.'<br>';

?>
    <tr>
	  <th scope="row"><?php echo $tipo_usuario_logo[$row->tipo]; ?></th>
      <td><?php echo $row->userid; ?></td>
      <td><?php echo $row->user; ?></td>
      <td><?php echo $row->nombres; ?></td>
      <td><?php echo $row->apellidos; ?></td>
	  <td><?php echo $row->ult_login; ?></td>
	  <td><?php echo $row->fecha_reg; ?></td>
	  <td><ul class="navbar-nav ml-auto">
	  
			  <li class="nav-item dropdown no-arrow">		
					  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
					  </a>
		
		
					  <!-- Dropdown - User Information -->
		
					  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
		
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b style="text-align:center"> <i class="fa fa-edit" aria-hidden="true"></i> Cambiar ID: <?php echo $row->userid; ?></b>
		
						<div class="dropdown-divider"></div>
		
						<a class="dropdown-item" href="<?php echo $url.tipo_direccion($tipo_url,'musica,editar_usuario,'.$row->userid)?>" >
						  
						  Editar usuario
						</a>
		
						
						  <?php echo $row->email; ?>
						
						
						<a class="dropdown-item" href="#">
						  Apellidos
						</a>
		
						<a class="dropdown-item" href="#">
						  Email
						</a>
		
		
						<div class="dropdown-divider"></div>
		
						<a class="dropdown-item" href="#">		
						  <i class="fa fa-trash" aria-hidden="true"></i>
						  Eliminar
		
						</a>
		
					  </div>
		
					</li>

	  </ul></td>
    </tr>
<?php } ?>
  </tbody>
</table>


<a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,'.$columna_consulta.','.$orden_consulta.',1')?>"> <i class=" fas fa-angle-double-left" aria-hidden="true"></i> </a>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php 
//Paginador
if($pagina>4){ $p=$pagina;
$anterior=$pagina-1;
 ?>
<a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,'.$columna_consulta.','.$orden_consulta.','.$anterior)?>"> <i class="fas fa-angle-left" aria-hidden="true"></i> </a>
&nbsp;&nbsp;
<?php 
 }else{ $p = 1;}

$num=1;

while ($p <= $paginas) {
	if($pagina!=$p){
	?>
	&nbsp;&nbsp;<a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,'.$columna_consulta.','.$orden_consulta.','.$p)?>"> 
	<?php echo $p; ?> 
	</a>&nbsp;&nbsp;
	<?php 
	}else{
	echo $p;
	}

	if($num>7) { break;}
 $p++;  /* el valor presentado ser�a $i antes del incremento  (post-incremento) */
 $num++;
 $siguiente=$pagina+1;
 
} ?>&nbsp;&nbsp;
<a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,'.$columna_consulta.','.$orden_consulta.','.$siguiente)?>"> <i class="fas fa-angle-right" aria-hidden="true"></i> </a>
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="<?php echo $url.tipo_direccion($tipo_url,'musica,mostrar_usuarios,'.$columna_consulta.','.$orden_consulta.','.$paginas)?>"> <i class="fas fa-angle-double-right" aria-hidden="true"></i> </a>

<?php 

 } ?>