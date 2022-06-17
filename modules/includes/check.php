<?php
 function validarequerido($valor){
    if(trim($valor) == ''){
       return false;
    }else{
       return true;
    }
 }

 function clavesiguales($valor, $valor2){
    if($valor == $valor2){
       return false;
    }else{
       return true;
    }
 }
 function validarentero($valor, $opciones=null){
    if(filter_var($valor, FILTER_VALIDATE_INT, $opciones) === FALSE){
       return false;
    }else{
       return true;
    }
 }
 function validaemail($valor){
    if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
       return false;
    }else{
       return true;
    }
 }

?>
