<div align="center" id="div_form_ing_modulo">
<form action="#"> 
<table width="600" border="1" align="center">
    <td>Modulo</td>
    <td>
    <select name="texto_1<?php echo $identificador; ?>" id="texto_1<?php echo $identificador; ?>">
    <option value=""> Seleccione </option>
    <?php
    $item_id=mostrar('id',$tabla_items_pagina,'id',$id_id,$link);
    $item_titulo=mostrar('titulo',$tabla_items_pagina,'id',$id_id,$link);
    $item_archivo=mostrar('archivo',$tabla_items_pagina,'id',$id_id,$link);
    $item_head=mostrar('head',$tabla_items_pagina,'id',$id_id,$link);

    $result=$link->query("select moduloid, nombre from $tabla_modulos_pagina ") or die ($link->error);
    while($row = $result->fetch_object()) {
    ?>
     <option <?php if( isset($moduloid) ){ if($moduloid==$row->moduloid){echo 'selected="selected"';} }?> value="<?php echo $row->moduloid ?>"> <?php echo $row->nombre; ?> </option>
        <?php 
        }
        ?>
    </select>&nbsp;</td>
  </tr>
  <tr>
    <td>ID</td>
    <td><label>
      <input <?php if(isset($_GET['id'])){if($_GET['id']=='form_mod_item'){ echo 'disabled="disabled"';} } ?> name="texto_2<?php echo $identificador; ?>" type="text" id="texto_2<?php echo $identificador; ?>" value="<?php echo $item_id; ?>" />
    </label></td>
  </tr>
  <tr>
    <td>Titulo</td>
    <td><label>
      <input name="texto_3<?php echo $identificador; ?>" type="text" id="texto_3<?php echo $identificador; ?>" value="<?php echo $item_titulo; ?>" />
    </label></td>
  </tr>
  <tr>
    <td>Archivo</td>
    <td><input name="texto_4<?php echo $identificador; ?>" type="text" id="texto_4<?php echo $identificador; ?>" value="<?php echo $item_archivo; ?>" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">Head
      <textarea name="texto_5<?php echo $identificador; ?>" cols="90" rows="6" id="texto_5<?php echo $identificador; ?>"><?php echo stripcslashes($item_head); ?></textarea></td>
    </tr>
  <tr>
    <td colspan="2" align="center">
    <?php if(isset($_GET['action'])){ 
            if($_GET['action']=='ing_item'){
             ?>
            <input name="button" type="button" onclick="ing('div_form_ing_modulo','<?php echo $_GET['id']; ?>', 'ing_item', '<?php echo $identificador; ?>', '12');" value="Ingresar"/>
            <?php
            }else{
            ?>
            <input name="button" type="button" onclick="ing('div_form_ing_modulo','<?php echo $_GET['id']; ?>', 'mod_item', '<?php echo $identificador; ?>', '12');" value="Actualizar"/>
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