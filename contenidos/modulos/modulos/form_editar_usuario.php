<?php 
 if(isset($_SESSION['nivel']) and $_SESSION['nivel']>1){ 
$identificador='_add';	
				/////////////////////  AJAX  //////////////////
	$db_tabla=$tabla_usuarios;
	$db_columna='user';
	$db_columnaid='userid';
	$v_id=$_GET['valor'];//$useridlogeado;
	$div_respuesta='div2_'.$db_columna.'_'.$v_id;
	$id_page=$id;
	$action_name='form_mod_valor';
////////////////////////////////////////////	
if(!is_numeric($v_id)){ 'Valor incorrecto';}	
				?>
                
                
				 
 
               
                 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  
  <td width="100" align="left" valign="middle"> &nbsp; <b> Usuario:</b> &nbsp;</td>
  
  
    <td align="left"><div class="showhim text-muted" style="position:relative; " id="<?php echo $div_respuesta; ?>">
                  <?php echo mostrar('user',$db_tabla,$db_columnaid,$v_id,$link); ?>
     			</div></td>
 
    <td><div style="float: right;" class="showme text-muted"> 
                            <a style="cursor:pointer" onclick="mostrar_mod1('<?php echo $db_tabla; ?>','<?php echo $db_columna; ?>','<?php echo $db_columnaid; ?>','<?php echo $v_id; ?>','<?php echo $div_respuesta; ?>','<?php echo $id_page; ?>','<?php echo $action_name; ?>')" >
                            <h4 class="text-warning">  <i class="mdi mdi-pencil-box"></i> </h4>
                            </a>
    </div></td>
  </tr>
</table>


<?php $db_columna='nombres';
$div_respuesta='div2_'.$db_columna.'_'.$v_id; ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  
  <td width="100" align="left" valign="middle"> &nbsp; <b> Nombre:</b> &nbsp;</td>
  
  
    <td align="left"><div class="showhim text-muted" style="position:relative; " id="<?php echo $div_respuesta; ?>">
                  <?php echo mostrar('nombres',$db_tabla,$db_columnaid,$v_id,$link); ?>
	</div></td>
 
    <td><div style="float: right;" class="showme text-muted"> 
                                    <a style="cursor:pointer" onclick="mostrar_mod1('<?php echo $db_tabla; ?>','<?php echo $db_columna; ?>','<?php echo $db_columnaid; ?>','<?php echo $v_id; ?>','<?php echo $div_respuesta; ?>','<?php echo $id_page; ?>','<?php echo $action_name; ?>')" >
                            <h4 class="text-warning"> <i class="mdi mdi-pencil-box"></i> </h4>
                            </a>
    </div></td>
  </tr>
</table>



<?php $db_columna='apellidos';
$div_respuesta='div2_'.$db_columna.'_'.$v_id; ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  
  <td width="100" align="left" valign="middle"> &nbsp; <b> Apellidos:</b> &nbsp;</td>
  
  
    <td align="left"><div class="showhim text-muted" style="position:relative; " id="<?php echo $div_respuesta; ?>">
                  <?php echo mostrar('apellidos',$db_tabla,$db_columnaid,$v_id,$link); ?>
	</div></td>
 
    <td><div style="float: right;" class="showme text-muted"> 
                                    <a style="cursor:pointer" onclick="mostrar_mod1('<?php echo $db_tabla; ?>','<?php echo $db_columna; ?>','<?php echo $db_columnaid; ?>','<?php echo $v_id; ?>','<?php echo $div_respuesta; ?>','<?php echo $id_page; ?>','<?php echo $action_name; ?>')" >
                            <h4 class="text-warning"> <i class="mdi mdi-pencil-box"></i> </h4>
                            </a>
    </div></td>
  </tr>
</table>




<?php $db_columna='email';
$div_respuesta='div2_'.$db_columna.'_'.$v_id; ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  
  <td width="100" align="left" valign="middle"> &nbsp; <b> Email:</b> &nbsp;</td>
  
  
    <td align="left"><div class="showhim text-muted" style="position:relative; " id="<?php echo $div_respuesta; ?>">
                  <?php echo mostrar('email',$db_tabla,$db_columnaid,$v_id,$link); ?>
	</div></td>
 
    <td><div style="float: right;" class="showme text-muted"> 
                                    <a style="cursor:pointer" onclick="mostrar_mod1('<?php echo $db_tabla; ?>','<?php echo $db_columna; ?>','<?php echo $db_columnaid; ?>','<?php echo $v_id; ?>','<?php echo $div_respuesta; ?>','<?php echo $id_page; ?>','<?php echo $action_name; ?>')" >
                            <h4 class="text-warning"> <i class="mdi mdi-pencil-box"></i> </h4>
                            </a>
    </div></td>
  </tr>
</table>


<?php $db_columna='tipo';
$div_respuesta='div2_'.$db_columna.'_'.$v_id; ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  
  <td width="100" align="left" valign="middle"> &nbsp; <b> Tipo user:</b> &nbsp;</td>
  
  
    <td align="left"><div class="showhim text-muted" style="position:relative; " id="<?php echo $div_respuesta; ?>">
                  <?php echo mostrar('tipo',$db_tabla,$db_columnaid,$v_id,$link); ?>
	</div></td>
 
    <td><div style="float: right;" class="showme text-muted"> 
                                    <a style="cursor:pointer" onclick="mostrar_mod1('<?php echo $db_tabla; ?>','<?php echo $db_columna; ?>','<?php echo $db_columnaid; ?>','<?php echo $v_id; ?>','<?php echo $div_respuesta; ?>','<?php echo $id_page; ?>','<?php echo $action_name; ?>')" >
                            <h4 class="text-warning"> <i class="mdi mdi-pencil-box"></i> </h4>
                            </a>
    </div></td>
  </tr>
</table>


<?php 
echo print_r($tipo_usuario);

}else{
echo 'Acceso denegado';
}
?>