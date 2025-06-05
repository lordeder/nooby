<?php 
//$ano=date("Y",time ());
//$mes=date("m",time ());
//$dia=date("d",time ());
$hoy=date("Y-m-d",time ());

	if(isset($_POST['texto1'])){
	include_once('admin/funciones/funciones_basicas/crip.php');
	$usuario=strtolower(trim($_POST['texto1']));
	$email=strtolower(trim($_POST['texto2']));
	$tipo_u=$_POST['texto3'];
	$apellidos=ucwords(strtolower(trim($_POST['texto4'])));
	$nombres=ucwords(strtolower(trim($_POST['texto5'])));
	$pass1=trim($_POST['texto6']);  
	$pass2=trim($_POST['texto7']);
	$paisid=$_POST['texto8'];
	$ciudadid=$_POST['texto9'];
	
		$texto_1=$_POST['texto1'];
		$texto_2=$_POST['texto2'];
		$texto_3=$_POST['texto3'];
		$texto_4=$_POST['texto4'];
		$texto_5=$_POST['texto5'];
		$texto_8=$_POST['texto8'];
		$texto_9=$_POST['texto9'];
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		mensaje_error('Email incorrecto','');
		
		}elseif(empty($usuario)){
		mensaje_error('Usuario en blanco','');
		
		}elseif(empty($apellidos)){
		mensaje_error('Apellidos en blanco','');
		
		}elseif(empty($tipo_u)){
		mensaje_error('No ha seleccionado tipo o nivel','');
		
		}elseif(empty($nombres)){
		mensaje_error('Apellidos en blanco','');
		
		}elseif(empty($pass1)){
		mensaje_error('Password en blanco','');
		
		}elseif($pass1!=$pass2){
		mensaje_error('Los password no coinciden','');
		
		}elseif(existe_registro($tabla_usuarios,'email',$email,$link)){
		mensaje_error('Ya existe un usuario con el email '.$email,'');
		
		}elseif(existe_registro($tabla_usuarios,'user',$usuario,$link)){
		mensaje_error('Ya existe un usuario '.$usuario,'');
		
		}else{ //TODO OK
		$pass1=encrip1($pass1,10);//Encriptando contrase�a
		$sql = "INSERT INTO $tabla_usuarios (user,email,nombres,apellidos,paisid,ciudadid,password,tipo,fecha_reg) ";
		$sql .= "VALUES ('$usuario','$email','$nombres','$apellidos','$paisid','$ciudadid','$pass1','$tipo_u',NOW())";			
				
				if($result = $link->query($sql)){
				mensaje_ok('Se ingres� usuario <b>'.$usuario.'</b> con �xito',''); ?><a href="<?php  echo tipo_direccion($tipo_url,"admin,usuarios"); ?>">Mostrar usuarios</a><br><?php 
					$texto_1='';
					$texto_2='';
					$texto_3='';
					$texto_4='';
					$texto_5='';
					$texto_8='';
					$texto_9='';
				}else{
				mensaje_error("Error al intentar registrar". "('$usuario','$email','$nombres','$apellidos','$paisid','$ciudadid','$pass1','$tipo_u','')");
				}
		}
		
	
		include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_usuario.php');
		
	}else{
	$texto_1='';
	$texto_2='';
	$texto_3='';
	$texto_4='';
	$texto_5='';
	$texto_8='';
	$texto_9='';
	include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_usuario.php');
	}
?>





