<?php 
 if(isset($_SESSION['nivel']) and $_SESSION['nivel']>1){ 
 
$userid=$_GET['valor'];//$useridlogeado;
include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/imagen_user.php');
$ruta_archivo_proceso=$carpeta_contenidos.'/'.$carpeta_del_modulo.'/usuarios/subir_foto_user.php';
$id_input='logo_1_t'.$userid;
$texto_a_mostrar_up=' <h4 title="Subir foto" class="display-6 text-primary" align="center"> <i class="mdi mdi-add-a-photo"></i> Foto</h4> ';
$div_form_name='div_form1_'.$userid;	
$ident_foto=$userid;		
$texto_a_mostrar_up=' <h4 title="Subir foto" class="display-6 text-primary" align="center"> <i class="mdi mdi-add-a-photo"></i> <small>Cambiar</small></h4> ';?>
			<center>
            <div id="<?php echo $div_form_name; ?>"> 
            		<center><img src="<?php echo $img_music; ?>" width="200" height="200" /></center>
            </div>
            </center>
			<?php include($carpeta_contenidos.'/'.$carpeta_del_modulo.'/modulos/upload2-1.php'); ?>


<?php 
}else{
echo 'Acceso denegado';
}
?>