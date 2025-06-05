<div id="div_form_usuario">

<?php 
include_once($dir_funciones_page.'funciones_consultas/mostrar_ajax.php');

$n_post = count($_POST);
//maxlength="255"
/*<input <?php  if(isset($_GET['id'])){if($_GET['id']=='form_mod_item'){ echo 'disabled="disabled"';} } ?> name="texto_2<?php  echo $identificador; ?>" type="text" id="texto_2<?php  echo $identificador; ?>" value="<?php  echo $item_id; ?>" />
*/
$identificador='u';
?>

Usuario:
<input name="texto_1<?php  echo $identificador; ?>" type="text" id="texto_1<?php  echo $identificador; ?>" value="<?php  echo $texto_1; ?>" class="form-control" placeholder="Usuario" />

<br>Email:
<input name="texto_2<?php  echo $identificador; ?>" type="email" id="texto_2<?php  echo $identificador; ?>" value="<?php  echo $texto_2; ?>" class="form-control" placeholder="Email" />

<br>Tipo o nivel: (1 por defecto, 3 SUPERADMIN)
<select name="texto_3<?php  echo $identificador; ?>" id="texto_3<?php  echo $identificador; ?>" class="form-control ">
		 <option value="">Tipo</option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
         <option value="7">7</option>
         <option value="8">8</option>
         <option value="9">9</option>
     </select>

<br>Apellidos:
<input name="texto_4<?php  echo $identificador; ?>" type="text" id="texto_4<?php  echo $identificador; ?>" value="<?php  echo $texto_4; ?>" class="form-control" placeholder="Apellidos" />

<br>Nombres:
<input name="texto_5<?php  echo $identificador; ?>" type="text" id="texto_5<?php  echo $identificador; ?>" value="<?php  echo $texto_5; ?>" class="form-control" placeholder="Nombres" />

<br>Password:
<input name="texto_6<?php  echo $identificador; ?>" type="password" id="texto_6<?php  echo $identificador; ?>" value="" class="form-control" placeholder="Password" />

<br>Repetir password:
<input name="texto_7<?php  echo $identificador; ?>" type="password" id="texto_7<?php  echo $identificador; ?>" value="" class="form-control" placeholder="Repetir password" />

<br>Paises:
<?php 
    $db_tabla='lista_paises';
    $db_columna='nombre';
    $db_columnaid='paisid';
    $select_name='texto_8'.$identificador;
    $v_id='123';
    $div_respuesta='div_ciudades';
    $id_page=$id;
    $action_name='mostrar_ciudades';
    $id_seleccionado='';    
    mostrar_select_ajax_seleccionado($db_tabla,$db_columna,$db_columnaid,$select_name,$v_id,$div_respuesta,$id_page,$action_name,$id_seleccionado,$link); ?></td>
Ciudad:
<div id="div_ciudades"><input name="texto_9<?php  echo $identificador; ?>" id="texto_9<?php  echo $identificador; ?>"  type="text" class="form-control" placeholder="Ciudad" ></div>
	
	<?php  if(isset($_GET['action'])){ 
			if($_GET['action']=='ing_usuario'){
			 ?>
			<input name="button" type="button" onclick="ing('div_form_usuario','<?php  echo $_GET['id']; ?>', 'ing_usuario', '<?php  echo $identificador; ?>', '12');" value="Ingresar"/>
			<?php 
			}else{
			?>
			<input name="button" type="button" onclick="ing('div_form_usuario','<?php  echo $_GET['id']; ?>', 'mod_usuario', '<?php  echo $identificador; ?>', '12');" value="Actualizar"/>
			<?php 
			/*
			//add 1 aumenta el div al final, no lo reemplaza y borra los inputs
			//add 11 aumenta el div al inicio, no lo reemplaza y NO borra los inputs
			//add 12 reemplaza div y NO borra los inputs
			*/
			 }  
		}?>
		
		
</div>

