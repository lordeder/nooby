<?php

function normaliza($text, $lower = true, $ord = 95)
{
    $char = is_numeric($ord)? chr($ord): $ord[0];
    $text = // ------------ Reemplazamos todo excepto
            preg_replace('/[^a-zA-Z0-9\.\/%_-]+/',
        $char, unaccent($text));
    
    $expr = preg_quote($char);
    $text = // Cambiamos residuos dobles...
            preg_replace("/[$expr]+/", $char, trim($text, $char));
    
    if ($lower)
    { // cambiamos a minusculas
        $text = strtolower($text);
    }
    return $text;
}


function normaliza2($text, $lower = true, $ord = 95)
{
    $char = is_numeric($ord)? chr($ord): $ord[0];
    $text = // ------------ Reemplazamos todo excepto
            preg_replace('/[^a-zA-Z0-9-]+/',
        $char, unaccent($text));
    
    $expr = preg_quote($char);
    $text = // Cambiamos residuos dobles...
            preg_replace("/[$expr]+/", $char, trim($text, $char));
    
    if ($lower)
    { // cambiamos a minusculas
        $text = strtolower($text);
    }
    return $text;
}
/**
 * (cadena)
 *
 * Elimina los acentos de la cadena, naturalmente.
 */
function unaccent($text)
{
    static $find, $repl;
    
    if (!is_array($find))
    {
        $find = $repl = array();
        $html = // Obtenemos la tabla
            get_html_translation_table(HTML_ENTITIES);
        
        foreach ($html as $char => $ord) {
            if (ord($char) >= 192) {
                $find[] = utf8_encode($char); // xS
                $repl[] = $ord[1];
            }
        }
    } // Hacemos los cambios de acentos...
    $text = str_replace($find, $repl, $text);
    return $text;
}  

/**
* stripAccents()
* @description Esta funci�n remplaza todos los caracteres especiales de un texto dado por su equivalente
* @author      Esteban Novo
* @link        http://www.notasdelprogramador.com/2011/01/13/php-funcion-para-quitar-acentos-y-caracteres-especiales/
* @access      public
* @copyright   Todos los Derechos Reservados
* @param       string $String
* @return      Retorna el nuevo String sin caracteres especiales
*/
function stripAccents($String)
{
    $String = ereg_replace("[�����]","a",$String);
    $String = ereg_replace("[�����]","A",$String);
    $String = ereg_replace("[����]","I",$String);
    $String = ereg_replace("[����]","i",$String);
    $String = ereg_replace("[����]","e",$String);
    $String = ereg_replace("[����]","E",$String);
    $String = ereg_replace("[������]","o",$String);
    $String = ereg_replace("[�����]","O",$String);
    $String = ereg_replace("[����]","u",$String);
    $String = ereg_replace("[����]","U",$String);
    $String = ereg_replace("[^�`�~]","",$String);
	$String = ereg_replace("~","",$String);
    $String = str_replace("�","c",$String);
    $String = str_replace("�","C",$String);
    $String = str_replace("�","n",$String);
    $String = str_replace("�","N",$String);
    $String = str_replace("�","Y",$String);
    $String = str_replace("�","y",$String);
    return $String;
}


?>