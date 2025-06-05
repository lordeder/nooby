<?php


function conectarse2()
{
        if (!($link2 = new mysqli('localhost', 'root', 'youruser'))) { //
            echo "Error conectando al servidor de base de datos principal."; 
            exit(); 
        }
        
        if (!($link2->select_db('yourdb'))) { //
            echo "Error seleccionando la base de datos de colegios."; 
            exit(); 
        }
        return $link2; 
    
}



?>
