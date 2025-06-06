# nooby

## Licencia y derechos

Este repositorio se publica con fines de consulta, análisis y aprendizaje. **Todos los derechos están reservados** por el autor.

- Se permite la lectura del código fuente.
- **No se autoriza la copia, modificación, redistribución ni uso comercial** sin el consentimiento expreso y por escrito del titular de los derechos.
- **Está prohibida la solicitud de patentes o cualquier tipo de registro derivado de este código** o de versiones modificadas del mismo.

Si estás interesado en utilizar este software con fines comerciales o de otro tipo, puedes comunicarte con el autor para evaluar una **licencia personalizada o acuerdo de uso**.

**© 2025 Eder**

Este proyecto es un sitio web basado en PHP con una estructura modular. Los archivos de clave se encuentran en la raíz del repositorio: configuración (), punto de entrada (), autenticación (, ) y un volcado de SQL (). El directorio contiene scripts de conexión a la base de datos y una gran colección de funciones auxiliares de procedimientos. Todos los módulos de contenido viven bajo , con fragmentos HTML/PHP más JavaScript para interacciones AJAX. Los activos de front-end (Bootstrap, Material Icons, etc.) se proporcionan en el directorio.config.phpindex.phplogin.phpsalir.phpnooby.sqladmincontenidos/themes


Core Configuration
config.php Define la configuración global y los nombres de las tablas de la base de datos y los directorios de módulos:

$dir_funciones_page='admin/funciones/';
$dir_file_conexion='admin/';
$tabla_usuarios='usuarios';
$id_default='1';  // items_modu_panel
...
$carpeta_modulos='modulos';
$carpeta_contenidos='contenidos';
$tabla_modulos_panel='modulos_super_admin';
$tabla_items='items_modu_superadmin';
$tabla_modulos_pagina='modulos';
$tabla_items_pagina='items_modu_panel';


Dynamic Page Loading
id.php Se ejecuta cada vez que se solicita una página. Carga funciones auxiliares, comprueba la base de datos para la página identificada por , y se configura para incluir el archivo de módulo adecuado:id$page_contenido

include_once($dir_file_conexion.'conexion.php');
...
if(isset($_GET['id'])){
    $id = trim(verifica_inyeccion($_GET['id']));
    if(existe_registro($tabla_items_pagina,'id',$id,$link)){
        $datos_page = explode('.,-', mostrar_varios2('titulo, archivo, head, moduloid, imagen, descripcion, meta_variable',
                                 $tabla_items_pagina,'id',$id,$link));
        ...
        $carpeta_del_modulo = normaliza(strtolower(mostrar('nombre',$tabla_modulos_pagina,'moduloid',$moduloid,$link)));
        if(file_exists($carpeta_contenidos.'/'.$carpeta_del_modulo.'/'.$archivo)){
            $page_contenido = $carpeta_contenidos.'/'.$carpeta_del_modulo.'/'.$archivo;
            ...
        } else {
            $existe_page = false;
        }
    } else {
        $existe_page = false;
        ...
    }
}

When index.php runs, it simply includes $page_contenido if the lookup succeeded, otherwise shows an error message.








User Authentication
login.php performs authentication against the database. It reads the username/email and password, checks the user record, verifies the bcrypt hash stored in the usuarios table, and sets session variables:

if(password_verify($passwordIngresado, $hash_almacenado)){
    $tipo_usuario = mostrar('tipo','usuarios',$campo,$usuario,$link);
    $nombres = mostrar('nombres','usuarios',$campo,$usuario,$link);
    $user_id = mostrar('userid','usuarios',$campo,$usuario,$link);
    $_SESSION['nivel'] = $tipo_usuario;
    $_SESSION['nombre_admin'] = $nombres;
    $_SESSION['userid'] = $user_id;
    header("Location: index.php");
} else {
    aumentar_numero_logeos(...);
    mensaje_error('Los datos ingresados son incorrectos, por favor vuelva a intentar<br>','img/');
    login_admin($url_panel,'Los datos ingresados son incorrectos, por favor vuelva a intentar '. getUserIP());
    exit();
}








A pair of connection scripts (admin/conexion.php and admin/conexion2.php) create mysqli connections using credentials set in those files:

function conectarse()
{
    if (!($link = new mysqli('localhost', 'root', 'youruser'))) {
        echo "Error conectando al servidor de base de datos principal.";
        exit();
    }
    if (!($link->select_db('yourdb'))) {
        echo "Error seleccionando la base de datos de colegios.";
        exit();
    }
    return $link;
}



Helper Functions
A continuación se encuentran numerosos ayudantes procesales:admin/funciones/funciones_basicasfunciones_consultas

ingresar.php implementa muchas funciones para crear consultas INSERT con diferentes números de columnas.ing_registro*

stats.php registra estadísticas, insertando una fila cuando una visita se produce más de una hora desde la última visita registrada para la misma IP.

function ing_registro($nombre,$columna,$tabla,$link){
    $sql = "INSERT INTO $tabla ($columna) VALUES ('$nombre')";
    if($result = $link->query($sql)){
        return true;
    } else {
        return false;
    }
}
...
function stats($tipo,$fecha,$identificador,$ip,$tabla_stats,$link){
    if($tipo>0){
        $result=$link->query("select TIMESTAMPDIFF(SECOND, fecha, NOW() ) from $tabla_stats where id = '$identificador' and tipo = '$tipo' and ip = INET_ATON('$ip') order by fecha DESC limit 1") or die ($link->error);
        if ($row = $result->fetch_row()){
            $hace_cuanto = $row[0];
            if($hace_cuanto>3600){
                $sql = "INSERT INTO $tabla_stats (tipo,id,ip,fecha) VALUES ('$tipo','$identificador',INET_ATON('$ip'),NOW())";
                ...
            }
        } else {
            $sql = "INSERT INTO $tabla_stats (tipo,id,ip,fecha) VALUES ('$tipo','$identificador',INET_ATON('$ip'),NOW())";
            ...
        }
    }
}

Content Modules & AJAX
El contenido real de la página reside en subdirectorios bajo . Muchos formularios administrativos utilizan JavaScript para las actualizaciones basadas en AJAX a través de . Por ejemplo:contenidos/moduloscontenedor_ajax.php

function nuevoAjax(){
    var xmlhttp=false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
        catch (E) { xmlhttp = false; }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function ing_nombre_modulo(){
    var t1, contenedor, input_t1;
    contenedor = document.getElementById('respuesta_ing_nombre_modulo');
    t1 = document.getElementById('nombre_modulo').value;
    ajax=nuevoAjax();
    ajax.open("POST", "contenedor_ajax.php?id=ing_modulo_colegiopro&action=ing_nombre",true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) { contenedor.innerHTML = ajax.responseText }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("nombre_modulo="+t1);
    input_t1.value="";
}

These scripts call server-side PHP endpoints to create or modify content without reloading the page.

Database Schema
El archivo SQL agrupado define tablas como (cuentas de usuario), (entradas de página) y otras para estadísticas y datos administrativos. Fragmento de ejemplo:nooby.sqlusuariositems_modu_panel

CREATE TABLE `usuarios` (
  `userid` int(11) NOT NULL,
  `user` char(30) NOT NULL,
  `email` char(50) NOT NULL,
  `nombres` char(26) NOT NULL,
  `apellidos` char(40) NOT NULL,
  ...
  `password` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  ...
);








Getting Started
Prepare a PHP environment and MySQL database.
Update admin/conexion.php (and conexion2.php if used) with your database credentials.

Import nooby.sql to create the necessary tables and initial data.

Explore config.php to understand directory paths, table names, and default page IDs.

Follow the request flow:

index.php ➜ includes id.php which determines which page module to load.

Modules are stored under contenidos/modulos/[module] and may include their own config.php or head_tags.php.

Check the helper functions in admin/funciones. They implement all database CRUD operations, security checks, and message templates. Familiarity with these is essential when adding new features.

Review the JavaScript under contenidos/modulos/modulos/js/ for AJAX interactions with contenedor_ajax.php.

Understand session management through login.php (login) and salir.php (logout). Passwords are hashed with bcrypt.

Suggested Next Steps for Learning
Explore each module folder under contenidos/modulos/modulos to see how forms and pages are structured.

Map the database tables from nooby.sql to the corresponding PHP functions that manipulate them.

Check admin/funciones/funciones_consultas for query helpers (insert, update, stats, etc.) and replicate small modifications to get familiar with the code style.

Look into the included themes (themes/bootstrap-4.4.1, etc.) to understand how the front-end styling is organized.

This should give you a solid starting point for navigating and experimenting with the project. The code is largely procedural PHP with manual SQL queries, so brushing up on classic PHP/MySQL patterns will help.

