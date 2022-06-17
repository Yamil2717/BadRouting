<?php
 $datazone = $mysqli->get_select_zonas();
 $content_select_zona = '';
 foreach ($datazone as $valoreszone){
   $content_select_zona .= '<option value = '.$valoreszone['nombre'].'>'.$valoreszone['nombre'].'</option>';
 }
if ($_GET['jobs'] == job1) {
  // code...

 $form_Nombre = $_GET['nombre'];
 $form_Mac = $_GET['mac'];
 $form_Modelo = $_GET['modelo'];
 $form_Telefono = $_GET['telefono'];
 $form_Dni = $_GET['dni'];
 $form_Direccion = $_GET['direccion'];
 $form_Zona = $_GET['zona'];
 $form_Router = $_GET['router'];
 $form_Plan = $_GET['plan'];
 $formApiuser = $_SESSION['nombre'];
 $form_Marca = $_GET['marca'];

 $error_disp = '';
 if ($comprobador->validar_requerido($form_Nombre) == false) {
   $error_disp .= 'Se requiere un "USUARIO"<br>';
 }
 if ($comprobador->validar_requerido($form_Mac) == false) {
   $error_disp .= 'Se requiere una "MAC-ADDRES"<br>';
 }
 if ($comprobador->validar_requerido($form_Modelo) == false) {
   $error_disp .= 'Se requiere un "MODELO"';
 }
 if ($comprobador->validar_requerido($form_Telefono) == false) {
   $error_disp .= 'Se requiere un "TELEFONO"<br>';
 }
 if ($comprobador->validar_requerido($form_Dni) == false) {
   $error_disp .= 'Se requiere un "DNI"<br>';
 }
 if ($comprobador->validar_requerido($form_Direccion) == false) {
   $error_disp .= 'Se requiere una "DIRECION"<br>';
 }
 if ($form_Zona == '0') {
   $error_disp .= 'Seleciona una ZONA<br>';
 }
 if ($form_Router == 0) {
   $error_disp .= 'Seleciona una opcion (equipos instalados)<br>';
 }


 if ($error_disp) {
   $alertaregistro = '   <div class="alert alert-warning alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h4><i class="icon fa fa-warning"></i> ERROR K07!</h4>

                         '.$error_disp.'
                 </div>
               ';
 }else {
    $consultar_dni = $mysqli->get_routeros_dni($form_Dni);

    if ($consultar_dni) {
      $alertaregistro = '  <div class="alert alert-warning alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-warning"></i> ERROR Ya esta suscrito!</h4>

                            Este Cliente ya tiene un suscripcion, debe darse de baja correctamente.
                    </div>
                  ';


    }else {
      $codigocliente_indice = substr($form_Zona, 0, 2);
      $codigocliente_indice .= bin2hex(random_bytes(2));
      $codigocliente_indice .= substr($form_Dni, 0, 3);
      $codigocliente_indice .= substr($form_Nombre, 0, 3);

      $user_ppp = $codigocliente_indice;
      $passw_ppp = bin2hex(random_bytes(4));

      if ($form_Marca = 1) {
        $user_adminitradtivo  = "admin";
      }

      if ($form_Marca = 2) {
        $user_adminitradtivo  = "ubnt";
      }

      if ($form_Marca = 3) {
        $user_adminitradtivo  = "admin";
      }

      $passwd_administradiva = bin2hex(random_bytes(6));


      //añadir y ejecutar cliente

      $añadir_routeros_cliente = $mikrotik->add_client_routeros($user_ppp, $passw_ppp);
      //$añadir_routeros_cliente = $mikrotik->add_client_routeros('Ome1d1047gus', 'fb0c83cd');

      if ($añadir_routeros_cliente[!trap]) {

        switch ($form_Plan) {
          case '2':
            $plan_userman = "2MB";
          break;
          case '4':
            $plan_userman = "4MB";
            break;
          case '6':
            $plan_userman = "6MB";
            break;
          case '8':
           $plan_userman = "8MB";
           break;
          case '10':
            $plan_userman = "10MB";
          break;

          case '15':
          $plan_userman = "15mb";
          break;
          default:
            // code...
            break;
        }
        $alertaregistro = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Exito !</h4>
                          Se ha agregado el usuario correctamente.
                          </div>';
                          $activar_routeros_client = $mikrotik->activar_client_routeros($user_ppp, $form_Plan);

                            $alertaregistro .= '<div class="alert alert-success alert-dismissible">
                                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                              <h4><i class="icon fa fa-check"></i> Exito !</h4>
                                              Se ha Activado la suscripcion.
                                              </div>';
                            $guardar_datos = $mysqli->add_routeros_cliente(
                            $form_Nombre, $form_Mac, $form_Modelo,
                            $form_Telefono, $form_Dni, '1', $form_Direccion,
                            $form_Zona, $form_Router, $user_adminitradtivo,
                            $passwd_administradiva, $user_ppp, $passw_ppp);
                          if ($guardar_datos) {
                            $alertaregistro .= '<div class="alert alert-success alert-dismissible">
                                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                              <h4><i class="icon fa fa-check"></i> Exito !</h4>
                                              Se han guardado los datos correctamente.
                                              </div>';

                            $alertaregistro .= '
                                              <div class="box box-success box-solid">
                                              <div class="box-header with-border">
                                              <h3 class="box-title">Datos de Conexion Autogenerados</h3>

                                              <div class="box-tools pull-right">
                                              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                              </div>
                                              <!-- /.box-tools -->
                                              </div>
                                              <!-- /.box-header -->

                                              <div class="box-body">
                                              <h3>Credenciales Administrativas</h3>
                                              <h4>Usuario</h4>
                                              '.$user_adminitradtivo.'
                                              <h4>Password</h4>
                                              '.$passwd_administradiva.'
                                              <h3>Credenciales de Conexion</h3>
                                              <h4>Usuario</h4>
                                              '.$user_ppp.'
                                              <h4>Password</h4>
                                              '.$passw_ppp.'
                                              </div>
                                              <!-- /.box-body -->
                                              <div class="modal-footer">
                                                <a class="btn btn-success" href="cfg_download.php?job=download&user='.$user_adminitradtivo.'&password='.$passwd_administradiva.'&pppuser='.$user_ppp.'&pppPaswd='.$passw_ppp.'&indenty='.$form_Nombre.'" target="_blank">Descargar Config</a>
                                              </div>
                                              </div>

                                ';
                          }

      }else {
        $alertaregistro = '   <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h4><i class="icon fa fa-warning"></i> ERROR Secuencia detenida!</h4>

                              Ha ocurrido un error critico, intentelo mas tarde.
                              </div>
                              ';
      }
      //echo $codigocliente;


      //var_dump($codigocliente_indice, $passw_ppp, $user_adminitradtivo, $passwd_administradiva, $añadir_routeros_cliente);
      //print_r($añadir_routeros_cliente);
      //echo $form_Zona;

    }
 }

}//end job


 ?>
