<?php
class comprobador{
  public function validar_requerido($string){
    $res=strlen($string);

    if ($res > 2) {
      return true;
    }else {
      return false;
    }

  }

  public  function validar_iguales($a, $b){
      if($a == $b){
         return true;
      }else{
         return false;
      }
   }
}
$comprobador = new comprobador;
 ?>
