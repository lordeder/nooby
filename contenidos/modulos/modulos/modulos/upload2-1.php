 <style type="text/css">
 .custom-input-file {
    overflow: hidden;
    position: relative;
    cursor: pointer;
}

.custom-input-file .input-file {
    margin: 0;
    padding: 0;
    outline: 0;
    font-size: 10000px;
    border: 10000px solid transparent;
    opacity: 0;
    filter: alpha(opacity=0);
    position: absolute;
    right: -1000px;
    top: -1000px;
    cursor: pointer;
	
	
}
 </style>
<!--  REEMPLAZA LA FOTO -->

<input name="<?php echo $id_input; ?>" type="hidden" id="<?php echo $id_input; ?>" value="" />

<form name="up_file" id="up_file" target="pepe" method="post" enctype="multipart/form-data" action="<?php echo $ruta_archivo_proceso; ?>" onsubmit="if(document.getElementById('archivo').value.length)document.getElementById('loading').style.display='inline'">

 <div id="mensaje<?php echo $id_input; ?>" style="font-family:Verdana, Arial, Helvetica, sans-serif; color:red; font-size:10px">   </div>
 
    <input name="identificador<?php echo $id_input; ?>" id="identificador<?php echo $id_input; ?>" type="hidden" value="<?php echo $ident_foto; ?>" />
    <input name="input_name" id="input_name" type="hidden" value="<?php echo $id_input; ?>" />
    <input name="div_form_name" id="div_form_name" type="hidden" value="<?php echo $div_form_name; ?>" />
  
 <div class="custom-input-file">
 <input type="file" name="archivo" id="archivo" size="26"  class="input-file" onchange="document.getElementById('mensaje<?php echo $id_input; ?>').innerHTML='Espere ...',submit()" />

<?php echo $texto_a_mostrar_up; ?>
 </div>
&nbsp;<img id="loading" src="?LOADING" width="16" height="16" style="display:none" />

 </form> 
<iframe name="pepe" width="1" height="1" style="visibility:hidden">  </iframe> 
