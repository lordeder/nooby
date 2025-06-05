<?php
error_reporting(E_ALL);
ini_set("display_errors", "1");

include_once($carpeta_contenidos.'/'.$carpeta_del_modulo.'/config.php');

function link_ini_session(){
    echo '<a class="nav-link" style="cursor:pointer" href="index.php?id=admin&action=iniciar_sesion" title="Iniciar sesion"> <i class="mdi mdi-account-circle"></i> Iniciar sesion</a>';
}

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
    $action = $_GET['action'];

    switch($action){
        case 'paginas_datos':
            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/datos/lista_pagina.php');
            break;

        case 'del_usuario':
            include_once($dir_funciones_page.'funciones_consultas/eliminar.php');
            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/del_usuario.php');
            break;

        case 'ing_usuario':
            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/ing_usuario.php');
            break;

        case 'usuarios':
            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/lista_usuarios.php');
            break;
///////////////////////////////////////////////////////// 

        case 'editar_usuario': 
            $titlulo_contenedor='Datos personales';
            $archivo_contenedor=$carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_editar_usuario.php';
            $tipo_e=1;
            
            $col_xl=12;
            $col_lg=5;
            include ($carpeta_contenidos.'/'.$carpeta_del_modulo.'/themes/'.$theme.'/contenedor1.php');	
            
            $titlulo_contenedor='Modificar contrase&ntilde;a';
            $archivo_contenedor=$carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/mod_pass.php';
            $tipo_e=1;
            $col_xl=12;
            $col_lg=6;
            include ($carpeta_contenidos.'/'.$carpeta_del_modulo.'/themes/'.$theme.'/contenedor1.php');	
            
            $titlulo_contenedor='Cambiar imagen de perfil';
            $archivo_contenedor=$carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/mod_foto.php';
            $tipo_e=1;
            $col_xl=12;
            $col_lg=6;
            include ($carpeta_contenidos.'/'.$carpeta_del_modulo.'/themes/'.$theme.'/contenedor1.php');
            
            break;

//////////////////// --------------------         ----------------

    case 'mod_pass_admin':
    include ($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/mod_pass.php');		
    break;
    
//////////////////// --------------------         ----------------
    
    case 'mod_pass':
    include ($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_mod_pass.php');		
    break;
///////////////////////////////////////////////////////////
        case 'ing_item':
            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/ing_item.php');
            break;

        case 'ing_modulo':
            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/ing_modulo.php');
            break;

        case 'del_modulo':
            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/del_modulo.php');
            break;

        case 'lista_modulos':
            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/lista_modulos.php');
            break;

        case 'del_item':
            if(isset($_GET['id_item'])){
                $id_id = trim($_GET['id_item']);
                $identificador = $id_id;

                if(isset($_GET['hash'])){
                    include_once($dir_funciones_page.'funciones_consultas/eliminar.php');
                    if(eliminar_registro($tabla_items_pagina, 'id', $id_id, $link)){
                        mensaje_ok('Item eliminado', '');
                        include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/lista_items.php');
                    } else {
                        mensaje_error('Error al intentar eliminar', '');
                        include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/lista_items.php');
                    }
                } else {
                    $result = $link->query("select titulo, id, moduloid, archivo from $tabla_items_pagina where id ='$id_id' limit 1") or die ($link->error);
                    while($row = $result->fetch_object()) {
                        echo '<center>¿Está seguro que desea eliminar '.$row->id.'?<br>'; ?>
                        <a href="?id=admin&action=del_item&id_item=<?php echo $row->id; ?>&hash=<?php echo md5($row->id); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"> Si </a>
                        <button class="btn btn-primary btn-lg active" onclick="jQuery('#facebox_overlay').click()"> No </button>
                        </center>
                        <?php
                    }
                }
            } else {
                mensaje_error('No se ha recibido id_item', '');
            }
            break;

        case 'mod_item':
            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/mod_item.php');
            break;
/////////////////////////////////////////////////////////
        case 'mod_pagina':
            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/mod_pagina.php');
          break;
///////////////////////////////////////////////////////////
        case 'ing_pagina':
            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_mod_pag_datos.php');
            break;
///////////////////////////////////////////////////////////
        case 'del_pagina':
                if(isset($_GET['id_pagina'])){
                    $id_id = trim($_GET['id_pagina']);
                    $identificador = $id_id;
    
                    if(isset($_GET['hash'])){
                        include_once($dir_funciones_page.'funciones_consultas/eliminar.php');
                        if(eliminar_registro($pagina_datos, 'id_page', $id_id, $link)){
                            mensaje_ok('Página eliminada', '');
                            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/datos/lista_pagina.php');
                        } else {
                            mensaje_error('Error al intentar eliminar', '');
                            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/datos/lista_pagina.php');
                        }
                    } else {
                        $titulo_pagina=mostrar('titulo',$pagina_datos,'id_page',$id_id,$link);
                        
                            $hash=md5($identificador);
                            echo '<center>¿Está seguro que desea eliminar: <b>'.$titulo_pagina.' ?</b><br>'; ?>
                            <a href="?id=admin&action=del_pagina&id_pagina=<?php echo $id_id; ?>&hash=<?php echo $hash; ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"> Si </a>
                            <button class="btn btn-primary btn-lg active" onclick="jQuery('#facebox_overlay').click()"> No </button>
                            </center>
                            <?php
                        
                    }
                } else {
                    mensaje_error('No se ha recibido id_pagina', '');
                }
                break;
//////////////////////////////////////////////////
        case 'form_mod_item':
            if(isset($_GET['id_item'])){
                $id_id = trim($_GET['id_item']);
                $identificador = $id_id;
                $moduloid = trim($_GET['moduloid']);
            } else {
                mensaje_error('No se ha recibido id_item', '');
            }
            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_mod_item.php');
            break;
//////////////////////////////////////////////
            case 'form_mod_pag_datos':
                if(isset($_GET['id_pagina'])){
                    $id_id = trim($_GET['id_pagina']);
                    $identificador = $id_id;
                } else {
                    mensaje_error('No se ha recibido id_item', '');
                }
                include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/form_mod_pag_datos.php');
                break;
////////////////////////////////////////////
        case 'form_mod_valor':
            include_once($dir_funciones_page.'funciones_consultas/mostrar_ajax.php');
            $texto = '';
            $id_page = $_GET['id_page'];
            $db_tabla = $_GET['db_tabla'];
            $db_columna = $_GET['db_columna'];
            $db_columnaid = $_GET['db_columnaid'];
            $v_id = $_GET['v_id'];
            $div_respuesta = $_GET['div_respuesta'];
            $input_name = 'input_'.$db_columna.'_'.$v_id;
            $id_ok = 'fin_mod_valor';
            $id_cancel = 'mostrar_valor_normal';
            echo mostrar_form1($texto, $db_tabla, $db_columna, $db_columnaid, $v_id, $div_respuesta, $id_page, $input_name, $id_ok, $id_cancel, $link);
            break;

        case 'fin_mod_valor':
        include_once($dir_funciones_page.'funciones_consultas/modificar.php');
		include_once($dir_funciones_page.'funciones_consultas/mostrar_ajax.php');		
		include_once($dir_funciones_page.'funciones_consultas/existe.php');
		$db_tabla=$_GET['db_tabla'];
		$db_columna=$_GET['db_columna'];
		$db_columnaid=$_GET['db_columnaid'];
		$v_id=$_GET['v_id'];
		$div_respuesta=$_GET['div_respuesta'];
		$id_page=$_GET['id_page'];
		$action_name='form_mod_valor';
		$input_valor=nl2br($_GET['input_valor']);
		//$texto='<div style="float: right;" class="showme"><h4 class="text-warning"> <i class="mdi mdi-mode-edit"></i>';
		$texto='';
		//$texto=' <img align="absbottom" src="img/pencil.png" width="16" height="16" alt="Editar" title="Editar" border="0"> ';
		// Verificando permisos
		//include ($carpeta_contenidos.'/'.$carpeta_del_modulo.'/seguridad.php');
		
		//if(!existe_2($db_tabla,$db_columnaid,$v_id,'colegioid',$colegio_id,$link)){ echo 'Proceso prohibido'; exit();}//Limitando solo a su tienda

		/*
		if(isset($rol_user_tipo) ){
				if($rol_user_tipo==0){//Super usuario
						if (!in_array($db_tabla, $tablas_permitidas_super_usuario)) {
							echo 'No tiene permitido modificar esta tabla ';
							exit();
						}
				}
		}else{
			exit();// No est� registrado en la tabla de roles 
		//}
		*/
		
		$valor_previo=mostrar($db_columna,$db_tabla,$db_columnaid,$v_id,$link);
		
					// ---  MODIFICANDO
					if(mod_1_dato($db_tabla,$db_columna,$input_valor,$db_columnaid,$v_id,$link)){						
						echo $input_valor.mostrar_mod1($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$action_name);
						//include ($carpeta_contenidos.'/'.$carpeta_del_modulo.'/mis_productos/gen_log_producto.php');
					}else{					
						echo 'No se pudo modificar';
					}
        break;

        case 'mostrar_valor_normal':
            $db_tabla=$_GET['db_tabla'];
            $db_columna=$_GET['db_columna'];
            $db_columnaid=$_GET['db_columnaid'];
            $v_id=$_GET['v_id'];
            $div_respuesta=$_GET['div_respuesta'];
            $id_page=$_GET['id_page'];
            $action_name='ajax_form_mod_input';
            //$texto='<div style="float: right;" class="showme"><h4 class="text-warning"> <i class="mdi mdi-mode-edit"></i></div>';
            //$texto='';
            //$texto=' <img align="absbottom" src="img/pencil.png" width="16" height="16" alt="Editar" title="Editar" border="0"> ';
            echo mostrar($db_columna,$db_tabla,$db_columnaid,$v_id,$link);//.mostrar_mod1($texto,$db_tabla,$db_columna,$db_columnaid,$v_id,$div_respuesta,$id_page,$action_name);
            break;

        case 'mostrar_ciudades':
            include_once($dir_funciones_page.'funciones_consultas/mostrar_ajax.php');
            $input_valor = $_GET['input_valor'];
            $db_tabla = 'lista_estados';
            $db_columna = 'nombre';
            $db_columnaid = 'id';
            $select_name = 'texto_9u';
            $campo = 'paisid';
            $coincidencia = $input_valor;
            mostrar_select1($db_tabla, $db_columna, $db_columnaid, $select_name, $campo, $coincidencia, $link);
            break;

        default:
            include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/lista_items.php');
            break;
    } // Cierra el switch
} else {
    include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/lista_items.php');
}
?>