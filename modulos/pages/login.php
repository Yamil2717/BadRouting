<?php
if (isset($_POST['user'])) {
  $user = $_POST['user'];
  $pass = $_POST['password'];

  $error_disp = '';
  if ($comprobador->validar_requerido($user) && $comprobador->validar_requerido($pass)) {
    $cont_login = $mysqli->login($user, $pass);
    if ($cont_login) {
      
      header("Location: index.php");
    }else {
      $error_disp = '<p class="login-box-msg">Datos no validos</p>';
    }

  }else {
    $error_disp = '<p class="login-box-msg">Datos no validos</p>';
  }

}
 ?>
