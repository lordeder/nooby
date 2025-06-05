<?php
// Verificar si el formulario ha sido enviado
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recorrer todas las variables del formulario
  foreach ($_POST as $key => $value) {
      echo "Nombre de la variable: " . htmlspecialchars($key) . "<br>";
      echo "Valor de la variable: " . htmlspecialchars($value) . "<br><br>";
  }
} else {
  echo "No se ha enviado ningún formulario.";
}
*/

if(isset($_POST['texto1'])){
  include_once($dir_funciones_page.'funciones_consultas/existe.php');
  include_once($dir_funciones_page.'funciones_consultas/ingresar.php');

  $id_pagina=verifica_inyeccion($_POST['texto1']);//innecesario
  $pagina_id=verifica_inyeccion(trim($_POST['texto2']));
  $pagina_titulo=verifica_inyeccion($_POST['texto3']);
  $pagina_icono=verifica_inyeccion($_POST['texto4']);
  $pagina_descripcion=$_POST['texto5'];//addslashes($_POST['texto5']); strlen($pagina_id)
  $default_item=verifica_inyeccion($_POST['texto6']);
  $pagina_imagen_redes=verifica_inyeccion($_POST['texto7']);
  $pie_pagina=verifica_inyeccion($_POST['texto8']);

  if(existe_registro($pagina_datos,'id_page',$pagina_id,$link)){
    mensaje_error('El ID ya existe en la base de datos','');
  }else{
        if (ing_registro7($pagina_id,'id_page',$pagina_titulo,'titulo',$pagina_icono,'icono',$pagina_descripcion,'descripcion',$default_item,'default_item',$pagina_imagen_redes,'imagen_redes',$pie_pagina,'pie_pagina',$pagina_datos,$link)) {
          mensaje_ok('Página ingresada con éxito, actulice para visualizar','');
        } else {
          mensaje_error('Error al intentar registrar','');
        }
       exit(); 
  }
}
?>

<div align="center" id="div_form_mod_pagina">
<form action="#"> 
<table width="600" border="1" align="center">
    

    <?php if(isset($_GET['action'])){ 

            if($_GET['action']=='ing_pagina'){
              $pagina_id='0';
              $pagina_titulo='';
              $pagina_icono='';
              $pagina_imagen_redes='';
              $pagina_descripcion='';
              $default_item='';
              $pie_pagina='';
              $identificador=$pagina_id;              
            }else{
              $pagina_id=mostrar('id_page',$pagina_datos,'id_page',$id_id,$link);
              $pagina_titulo=mostrar('titulo',$pagina_datos,'id_page',$id_id,$link);
              $pagina_icono=mostrar('icono',$pagina_datos,'id_page',$id_id,$link);
              $pagina_imagen_redes=mostrar('imagen_redes',$pagina_datos,'id_page',$id_id,$link);
              $pagina_descripcion=mostrar('descripcion',$pagina_datos,'id_page',$id_id,$link);
              $default_item=mostrar('default_item',$pagina_datos,'id_page',$id_id,$link);
              $pie_pagina=mostrar('pie_pagina',$pagina_datos,'id_page',$id_id,$link);
              $identificador=$pagina_id;
              
             }  
        } ?>
  

    <input name="texto_1<?php echo $identificador; ?>" id="texto_1<?php echo $identificador; ?>" value="<?php echo $pagina_id; ?>" type="hidden" />
  <tr>
    <td>id_pagina</td>
    <td><label>
      <input name="texto_2<?php echo $identificador; ?>" type="text" id="texto_2<?php echo $pagina_id; ?>" value="<?php echo $pagina_id; ?>" />
    </label></td>
  </tr>
  <tr>
    <td>Titulo</td>
    <td><label>
      <input name="texto_3<?php echo $identificador; ?>" type="text" id="texto_3<?php echo $identificador; ?>" value="<?php echo $pagina_titulo; ?>" />
    </label></td>
  </tr>

  <tr>
    <td>Icono</td>
    <td><input name="texto_4<?php echo $identificador; ?>" type="text" id="texto_4<?php echo $identificador; ?>" value="<?php echo $pagina_icono; ?>" /></td>
  </tr>

  <tr>
    <td>Item default</td>
    <td><input name="texto_6<?php echo $identificador; ?>" type="text" id="texto_6<?php echo $identificador; ?>" value="<?php echo $default_item; ?>" /></td>
  </tr>

  <tr>
    <td>Imagen en redes</td>
    <td><input name="texto_7<?php echo $identificador; ?>" type="text" id="texto_7<?php echo $identificador; ?>" value="<?php echo $pagina_imagen_redes; ?>" /></td>
  </tr>

  <tr>
    <td>Pie de página</td>
    <td><input name="texto_8<?php echo $identificador; ?>" type="text" id="texto_8<?php echo $identificador; ?>" value="<?php echo $pie_pagina; ?>" /></td>
  </tr>

  <tr>
    <td colspan="2" align="center">Descripción
      <textarea name="texto_5<?php echo $identificador; ?>" cols="90" rows="6" id="texto_5<?php echo $identificador; ?>"><?php echo stripcslashes($pagina_descripcion); ?></textarea></td>
    </tr>
  <tr>
    <td colspan="2" align="center">
    <?php if(isset($_GET['action'])){ 
            if($_GET['action']=='ing_pagina'){
             ?>
            <input name="button" type="button" onclick="ing('div_form_mod_pagina','<?php echo $_GET['id']; ?>', 'ing_pagina', '<?php echo $identificador; ?>', '12');" value="Ingresar"/>
            <?php
            }else{
            ?>
            <input name="button" type="button" onclick="ing('div_form_mod_pagina','<?php echo $_GET['id']; ?>', 'mod_pagina', '<?php echo $identificador; ?>', '12');" value="Actualizar"/>
            <?php
            /*
            //add 1 aumenta el div al final, no lo reemplaza y borra los inputs
            //add 11 aumenta el div al inicio, no lo reemplaza y NO borra los inputs
            //add 12 reemplaza div y NO borra los inputs
            */
             }  
        } ?>
    </td>
    </tr>
</table>
</form>

</div>