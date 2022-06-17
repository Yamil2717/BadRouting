<?php
    $dataadmin = $mysqli->get_admin_data();
    if (isset($_GET['jobs'])) {


    if ($_GET['jobs'] == 1) {
      $user = $_GET['user'];
      $password = $_GET['password'];
      $repassword = $_GET['repassword'];
      $nombre = $_GET['nombre'];
      $telefono = $_GET['telefono'];
      $email = $_GET['email'];
      $avatar = $_GET['avatar'];
      $nivel = $_GET['nivel'];
      // variable de errores
      $error_disp = '';
      if ($comprobador->validar_requerido($user) == false) {
        $error_disp .= 'Se requiere un "USUARIO"<br>';
      }
      if ($comprobador->validar_requerido($password) == false) {
        $error_disp .= 'Se requiere una "contraseña"<br>';
      }
      if ($comprobador->validar_requerido($repassword) == false) {
        $error_disp .= 'Repita la contraseña<br>';
      }
      if ($comprobador->validar_requerido($nombre) == false) {
        $error_disp .= 'Se requiere un "Nombre"<br>';
      }
      if ($comprobador->validar_requerido($telefono) == false) {
        $error_disp .= 'Se requiere un "Numero de telefono"<br>';
      }
      if ($comprobador->validar_requerido($email) == false) {
        $error_disp .= 'Se requiere un "Correo electronico valido"<br>';
      }
      if ($comprobador->validar_iguales($password, $repassword) == false) {
        $error_disp .= 'Las contraseñas deben ser iguales"<br>';
      }

      if ($error_disp) {
        $alertaregistro = '   <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> ERROR U01!</h4>

                              '.$error_disp.'
                      </div>
                    ';
      }else {
        if ($mysqli->add_user($nombre, $user, $password, $email, $avatar , $nivel)) {
          $alertaregistro = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Exito !</h4>
                          Datos Insertados correctamente.
                        </div>';
        }else {
          $alertaregistro = '   <div class="alert alert-warning alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-warning"></i> ERROR E01!</h4>

                                Ha ocurrido un error, intente de nuevo.
                        </div>
                      ';
        }
      }
    } // end registro

    //start change password
    if ($_GET['jobs'] == 2) {
      $password = $_GET['password'];
      $repassword = $_GET['repassword'];

      $error_disp = '';

      if ($comprobador->validar_requerido($password) == false) {
        $error_disp .= 'Se requiere una "contraseña"<br>';
      }
      if ($comprobador->validar_requerido($repassword) == false) {
        $error_disp .= 'Repita la contraseña<br>';
      }
      if ($comprobador->validar_iguales($password, $repassword) == false) {
        $error_disp .= 'Las contraseñas deben ser iguales"<br>';
      }

      if ($error_disp) {
        $alertaregistro = '   <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> ERROR U01!</h4>

                              '.$error_disp.'
                      </div>
                    ';
      }else {
        if ($mysqli->change_passw($password, $_SESSION['id'])) {
          $alertaregistro = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Exito !</h4>
                          Datos Actualizados correctamente.
                        </div>';
        }else {
          $alertaregistro = '   <div class="alert alert-warning alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-warning"></i> ERROR E01!</h4>

                                Ha ocurrido un error, intente de nuevo.
                        </div>
                      ';
        }
      }
    }

    //end change password
    //start rem user

    if ($_GET['jobs'] == 3) {
      $remid = $_GET['removeid'];
      if ($_SESSION['nivel'] < 5) {
        $alertaregistro = '   <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> ERROR P01!</h4>

                              No tiene Permisos para hacer esto.
                      </div>
                    ';
      }else {
        $process = $mysqli->rem_user($remid);
        if ($process) {

          $alertaregistro = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Exito !</h4>
                          Datos purgados correctamente.
                        </div>';

        }else {
          $alertaregistro = '   <div class="alert alert-warning alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-warning"></i> ERROR E01!</h4>

                                Ha ocurrido un error, intente de nuevo.
                        </div>
                      ';
        }
      }
    }//end rem user

    }



 ?>
