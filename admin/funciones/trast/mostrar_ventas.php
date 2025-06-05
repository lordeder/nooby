<?php function mostrar_venta($n_venta,$tabla_ventas,$tabla_productos,$tabla_inventario,$link){
?>
<table width="421" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
  <td width="18">&nbsp;</td>
				  <td width="82"><strong>Codigo</strong></td>
                    <td width="273"><strong>Nombre</strong></td>
                    <td width="48"><strong>Precio</strong></td>
  </tr>
<?php $result=mysql_query("select $tabla_inventario.ventaid, $tabla_inventario.correlativo, $tabla_inventario.codigo, $tabla_productos.nombre, $tabla_inventario.precio_vendido, $tabla_productos.codigo from $tabla_inventario, $tabla_productos where $tabla_inventario.ventaid = $n_venta and $tabla_inventario.codigo = $tabla_productos.codigo ",$link) or die (mysql_error());
	
	while($row = mysql_fetch_array($result)){
	$nombre_producto=$row[3];
	$precio_vendido=$row[4];
	$codigo_producto=$row[2];
	$correlativo=$row[1];
	?>
	
                  <tr ONMOUSEOVER="this.style.backgroundColor='yellow'" ONMOUSEOUT="this.style.backgroundColor='white'"><!--! style="background:#FFFFFF"  -->
                    <td>
					<a title="Quitar de la venta" style="cursor:hand" onclick="desmarcar_producto('div_venta_producto','ing_venta','desmarcar_producto','<?php echo $correlativo; ?>');">
					<img align="absmiddle" src="img/eliminar.png"  width="16" height="16" />
					</a>
					</td>
				  <td><?php echo $codigo_producto; ?></td>
                    <td><?php echo $nombre_producto; ?></td>
                    <td align="right"><?php echo $precio_vendido; ?></td>
                  </tr>
                
	<?php 	}
	$result=mysql_query("select ventaid, total from $tabla_ventas where ventaid = $n_venta limit 1 ",$link) or die (mysql_error());
	
	if($row = mysql_fetch_array($result)){

	?>
	
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
                    <td align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td align="right">______</td>
  </tr>
	
                  <tr>
                    <td>&nbsp;</td>
				  <td>&nbsp;</td>
                    <td align="right"><strong>Total</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td align="right"><strong><?php echo $row['total']; ?></strong></td>
                  </tr>
                
	<?php 	}
	//else{ 
	//echo '<center><font color="red">No se hallo venta!!</font></center>'; 
	//echo "columna->$columna, tabla->$tabla, id->$id, coincidencia->$coincidencia"; 
	//}
?>
</table>
<?php }
?>