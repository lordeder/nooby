<?php 
$hora=date("His",time ());

if(isset($userid) and file_exists($carpeta_contenidos.'/'.$carpeta_del_modulo.'/img/fotos_user/mini/'.$userid.'.jpg')  ){//foto usuario
//$img_music=$fotos_user.'mini/'.$userid.'.jpg?v='.$hora;
$img_user_50=$fotos_user.'50/'.$userid.'.jpg?v='.$hora;
}else{
$img_user=$files_front.'images/logo_cuadrado.png';
}



//echo ' ('.$album_id.') '.$fotos_album.'mini/'.$album_id.'.jpg <br>'.$files_front.'fotos_album/mini/'.$album_id.'.jpg<br>'.'------<br>'.$carpeta_contenidos.'/'.$carpeta_del_modulo.'/img/fotos_album/';
?>