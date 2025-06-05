<?php
//////////////////////////////////////////////////////////////
function caracteres_html($texto){
   $texto = htmlentities($texto, ENT_NOQUOTES, 'UTF-8'); // Convertir caracteres especiales a entidades
   $texto = htmlspecialchars_decode($texto, ENT_NOQUOTES); // Dejar <, & y > como estaban
   return $texto;
   
	   if ( !function_exists('htmlspecialchars_decode') )
	 {
	   function htmlspecialchars_decode($text)
	   {
		 return strtr($text, array_flip(get_html_translation_table(HTML_SPECIALCHARS)));
	   }
	 }
 
}
/////////////////////////////////////////////////////////
function inversa_nl2br($string) {
//$buscar=array("\r\n", "\r", "\n");
$string = str_replace("<br />", "\n", $string);
$string = str_replace("\n\n", "\n", $string);
return $string;

//$Texto = str_replace ("<br />", "\r\n", $Texto)

} 
?>