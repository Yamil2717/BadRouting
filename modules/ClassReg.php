<?php
$alertaregistro = "";
$warning = "";

$listadmin = "SELECT * FROM admin";
$dataadmin = mysqli_query($con, $listadmin);





if ($_GET) {
  # code...

if ($_GET['jobs'] == 1) {


    $user = $_GET['user'];
    $password = $_GET['password'];
    $repassword = $_GET['repassword'];
    $nombre = $_GET['nombre'];
    $telefono = $_GET['telefono'];
    $avatar = $_GET['avatar'];
    $nivel = $_GET['nivel'];


    $errors = array();

    if (validarequerido($user) == false) {

      $errors[] = "User Es Requerido";

    }

    if (clavesiguales($password, $repassword) == true) {

      $errors[] = "Las contraseñas deben ser iguales";

    }

    if (validarequerido($telefono) == false) {

      $errors[] = "Numero de Telefono Es Requerido";

    }

      if (validarequerido($nombre) == false) {

        $errors[] = "Nombre Completo es Requerido";

      }


      if (validarequerido($password) == false) {

        $errors[] = "contraseña es Requerida";

      }

      if (validarequerido($repassword) == false) {

        $errors[] = "No se pudo confimar las contraseñas";

      }


if ($errors == NULL) {




  $insert = "INSERT INTO admin (username, password, nombre, telefono, lastlogin, useragent, iploguin, avatar, nivel, baneado)
  VALUES ('$user', '$password', '$nombre', '$telefono', 'first login', 'no', 'no', '$avatar', '$nivel', '0')";
  if (mysqli_query($con, $insert)) {
     $alertaregistro = '<div class="alert alert-success alert-dismissible">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h4><i class="icon fa fa-check"></i> Exito !</h4>
                     Datos guardados correctamente.
                   </div>';
    } else {
     $errors[] = "110 error metadata";
   }
}



}


if ($_GET['jobs'] == 2) {

          $password = $_GET['password'];

          $repassword = $_GET['repassword'];

          $warning = "";


          if (clavesiguales($password, $repassword) == true) {

            $warning = '    <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-info"></i> ERROR CODE 135</h4>
                            Las Contraseñas deben ser iguales
                          </div>';

          }

          if (validarequerido($password) == false) {

            $warning = '   <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> ERROR T02!</h4>

                                  ERROR FATAL - algunos datos faltan.
                          </div>
                        ';

          }

          if (validarequerido($repassword) == false) {

            $warning = '   <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> ERROR T02!</h4>

                                  ERROR FATAL - algunos datos faltan.
                          </div>
                        ';

          }

          if ($warning == NULL) {
            $userchange = $_SESSION['user'];
            $change = "UPDATE admin SET password='$password' WHERE username = '$userchange'";

              if (mysqli_query($con, $change)) {
                $alertaregistro = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Exito !</h4>
                                Datos guardados correctamente.
                              </div>';
              } else {
                $warning = '    <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-info"></i> ERROR CODE 136</h4>
                                No se puede acceder a la memoria
                              </div>';
              }

          }
          }

     if ($_GET['jobs'] == 3) {

       if ($_SESSION['nivel'] < 5) {

         $warning = '   <div class="alert alert-warning alert-dismissible">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <h4><i class="icon fa fa-warning"></i> ERROR P12!</h4>

                               ERROR FATAL - Se requieren permisos de memoria.
                       </div>
                     ';

       }

       if ($_GET['removeid'] == 1) {

         $warning = '   <div class="alert alert-warning alert-dismissible">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <h4><i class="icon fa fa-warning"></i> ERROR P13!</h4>

                               ERROR FATAL - Se requieren permisos de Acceso.
                       </div>
                     ';

       }



       if ($warning == NULL) {
         $remid = $_GET['removeid'];
         $change = "DELETE FROM admin WHERE id = '$remid'";

           if (mysqli_query($con, $change)) {
             $alertaregistro = '<div class="alert alert-success alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                             <h4><i class="icon fa fa-check"></i> Exito !</h4>
                             Datos purgados correctamente.
                           </div>';
           } else {
             $warning = '    <div class="alert alert-info alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                             <h4><i class="icon fa fa-info"></i> ERROR CODE 136</h4>
                             No se puede acceder a la memoria
                           </div>';
           }

       }


     }


}
//echo "<pre>";
//var_dump($_SESSION);
?>
