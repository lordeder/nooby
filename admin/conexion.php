<?php


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



?>
