<?php


function conectarse2()
{
        if (!($link2 = new mysqli('localhost', 'root', 'ederunt006'))) { //Ederunt006@
            echo "Error conectando al servidor de base de datos principal."; 
            exit(); 
        }
        
        if (!($link2->select_db('g4mersclub3'))) { //g4mersclub
            echo "Error seleccionando la base de datos de colegios."; 
            exit(); 
        }
        return $link2; 
    
}



?>