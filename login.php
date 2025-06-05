<?php session_start();
error_reporting (E_ALL);
ini_set("display_errors","1");
include_once('admin/conexion.php');
$link=conectarse();
	if (!$link) {	die("Error al conectar a la base de datos: " . mysqli_connect_error()); 	}

$url_id=$_POST['id'];
$url_panel=$url_id;

$logeos_permitidos=5;
$minutos_sancion=15;

function login_admin($url_id,$alert){
	//header("Location: index.php?id=".$url_id."&action=iniciar_sesion&valor=".$alert);
	echo "<script type='text/javascript'>"; 
	echo 'window.location.replace("index.php?id='.$url_id.'&action=iniciar_sesion&valor='.$alert.'");';
	echo "</script>";
}

include('admin/funciones/funciones_consultas/comprobar_ultimo_logeo.php');
//include('admin/funciones/funciones_basicas/ip.php');
include('admin/funciones/funciones_basicas/mensajes_error_ok.php');
include_once('admin/funciones/funciones_basicas/crip.php');
include('admin/funciones/funciones_consultas/mostrar.php');
include('admin/funciones/funciones_consultas/existe.php');
//$url_panel='login.php';//login.php




if(isset($_POST['usuario']) and  isset($_POST['password']) ){
		$usuario = htmlspecialchars(trim($_POST['usuario']));//Sanitizamos el nombre de usuario

					if (filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
						$campo='email';
					}else{
						$campo='user';
					}

		$passwordIngresado=trim($_POST['password']);
		
		//Verificamos que existe usuario
		if(existe_registro('usuarios',$campo,$usuario,$link)){
		$existe_usuario=true;
		$hash_almacenado=mostrar('password','usuarios',$campo,$usuario,$link);
		}else{
		$existe_usuario=false;
		}
}
	

			//DATOS PARA LOGUEARSE
			$logeos_errados='logeos_errados';		
			
			
			if(!isset($_POST['usuario']) or !isset($_POST['password']) ){//NO HA USADO EL FORMULARIO PARA ACCEDER A LA PAGINA
			echo 'Tiene que iniciar sesion ';
			mensaje_error('Acceso denegado','img/');	
			login_admin($url_panel,'Acceso denegado !');
			exit();
			
			
			}elseif( empty($_POST['usuario']) or empty($_POST['password'])  ){//USO FORMULARIO PERO NO LLENO LOS CAMPOS
			mensaje_error('No ha llenado todos los campos, por favor reintente ','img/');
			login_admin($url_panel,'No ha llenado todos los campos, por favor reintente ------');				
			exit();
				
			
			}else{ //SI HA USADO FORMULARIO: PROCESAR FORMULARIO PARA LOGEARSE
					

					// COMPROBAR SI YA SE LOGUEO MAS VECES DE LO PERMITIDO  //	   $logeos_permitidos  ,   $minutos_sancion							
					$ip=getUserIP();

					if(comprobar_ultimo_logeo('logeos_errados', 'logeos_bad', 'ultimo_logeo_bad','usuario',$usuario,$logeos_permitidos,$minutos_sancion,$ip,$link)){//comprobar_ultimo_logeo.php						
						$ultimo_logeo=mostrar_2('ultimo_logeo_bad','logeos_errados','usuario',$usuario,'ip',$ip,$link);
						$hora_actual=time();
						$diferencia=($minutos_sancion*60) - ($hora_actual-$ultimo_logeo);
						$minutos_restantes=floor($diferencia/60);
						$segundos=$diferencia-($minutos_restantes*60);				
						mensaje_error('Ha superado el numero de intentos permitidos, se ha bloqueado el incicio de sesion, ud no podra volver a iniciar sesion en '.$minutos_restantes.' minutos '.$segundos.' segundos','img/');//funciones_basicas.php
										
						login_admin($url_panel,'Ha superado el numero de intentos permitidos, se ha bloqueado el incicio de sesion, ud no podra volver a iniciar sesion en '.$minutos_restantes.' minutos '.$segundos.' segundos');//	login_admin.php					
						exit();
							
					
					//}elseif ($row_admin = $result->fetch_object()){ // No hay registro que alla sobrepasado los intentos -  VERIFICANDO DATOS	

					}if(password_verify($passwordIngresado, $hash_almacenado)){//Comrpobando password
						$tipo_usuario=mostrar('tipo','usuarios',$campo,$usuario,$link);//$row_admin->tipo;
						$nombres=mostrar('nombres','usuarios',$campo,$usuario,$link);//$row_admin->tipo;
						$user_id=mostrar('userid','usuarios',$campo,$usuario,$link);//$row_admin->tipo;			
						$_SESSION['nivel'] = $tipo_usuario;
						$_SESSION['nombre_admin'] = $nombres;
						$_SESSION['userid'] = $user_id;
						
						//header("Location: ../");
						//login_admin($url_id,'');
						header("Location: index.php"); 
						echo 'Se inicio session';
						
					}else{// los datos de logeo son incorrectos - 
					aumentar_numero_logeos('logeos_errados', 'logeos_bad', 'ultimo_logeo_bad','usuario',$usuario,$logeos_permitidos,$minutos_sancion,$ip,$link);
					mensaje_error('Los datos ingresados son incorrectos, por favor vuelva a intentar<br>','img/');
					login_admin($url_panel,'Los datos ingresados son incorrectos, por favor vuelva a intentar '. getUserIP());						
					exit();
					}			
					
				
			
			}
		

?>