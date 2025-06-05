 <?php $process=false;
  if(isset($_SESSION['userid']) and $_SESSION['nivel']>1 ){
	 
	 	if( isset($_POST['texto1']) and isset($_POST['texto2']) ){
			include_once($dir_funciones_page.'funciones_basicas/mensajes_error_ok.php');			
			include_once($dir_funciones_page.'funciones_basicas/crip.php');
			include_once($dir_funciones_page.'funciones_consultas/mostrar.php');
			include_once($dir_funciones_page.'funciones_consultas/modificar.php');
			
			$p1=$_POST['texto1'];
			$p2=$_POST['texto2'];
			//$pass=encrip1($_POST['texto3'],10);
			$userid=$_POST['texto3'];//$_SESSION['userid'];
			//$pass_act=mostrar('password',$tabla_usuarios,'userid',$userid,$link);
			$pass_in=encrip1($p1,10);		
			$process=false;
			
			if(empty($_POST['texto1']) or empty($_POST['texto2'])  ){ //or empty($_POST['texto3'])
			mensaje_error('No ha llenado todos los campos','');
				 
			}elseif($p1!=$p2){
			mensaje_error('Las contraseñas no coinciden','');
			
			}elseif(strlen($p2)<5){
			mensaje_error('La contraseña debe de tener un mínimo de 6 caracteres','');
			
			}elseif(ctype_alpha($p1)){
			mensaje_error('La contraseña debe de tener por lo menos un número','');
			
			}elseif(is_numeric($p1)){
			mensaje_error('La contraseña debe de tener tambien letras','');
			
			//}elseif($pass!=$pass_act){
			//mensaje_error('La contraseña es incorrecta','');
			
			}else{
				
				if(mod_1_dato($tabla_usuarios,'password',$pass_in,'userid',$userid,$link)){
					mensaje_ok(' Se modificó la contraseña de '.$userid,'x');
					$process=true;
				}else{
					mensaje_error('No se pudo hacer la modificación, contátese con el administrador del sistema','');
				}
				
			}
		}
	 
	 
	 
	 
	 
if(!$process){	  ?>
 
<div id="div_mod_pass">

  <div class="form-group">


    <input name="texto_1m_p" type="password" class="form-control" placeholder="Contraseña nueva" id="texto_1m_p"><br />


    <input name="texto_2m_p" type="password" class="form-control" placeholder="Repita contraseña nueva" id="texto_2m_p"><br />
	
	<input name="texto_3m_p" type="hidden"  class="form-control" id="texto_3m_p" value="<?php echo $_GET['valor'];?>">
  </div>


 <center> <button type="submit" class="btn btn-primary" onclick="ing('div_mod_pass','<?php echo $id; ?>', 'mod_pass_admin', 'm_p', 'add')">Modificar</button></center>
  
  
</div>

<?php } 


	 }else{  ?>
Acceso denegado
<?php  }  ?>