<?php
require('modules/includes/check.php');
require('modules/routeros/routeros.php');
$alert = "";
//Método con rand()
function random_code($limit)
{
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
}

if ($_GET) {
  if ($_GET['jobs'] == 'job1') {

            $formNombre = $_GET['nombre'];
            $formMac = $_GET['mac'];
            $formModelo = $_GET['modelo'];
            $formTelefono = $_GET['telefono'];
            $formDni = $_GET['dni'];
            $formDireccion = $_GET['direccion'];
            $formZona = $_GET['zona'];
            $formRouter = $_GET['router'];
            $formPasswordapi = $_GET['passwordapi'];
            $formPppuser = $_GET['pppuser'];
            $formPpassword = $_GET['pppassword'];
            $formApiuser = "admin";


            $errors = array();

            if (validarequerido($formNombre) == false) {

              $errors[] = "Nombre  Es Requerido";

            }


            if (validarequerido($formMac) == false) {

              $errors[] = "MAC-ADDRES Es Requerido";

            }



              if (validarequerido($formModelo) == false) {

                $errors[] = "Modelo  es Requerida";

              }

              if (validarequerido($formApiuser) == false) {

                $errors[] = "Usuario API Requerido";

              }

              if (validarequerido($formPasswordapi) == false) {

                $errors[] = "No se pudo confimar las contraseñas";

              }

              if ($errors == NULL) {




                $insert = "INSERT INTO clientes (nombre, mac, modelo, telefono, dni, activado, direccion, zona, router, usuarioapi, passwordapi, pppuser, pppassword)
                VALUES ('$formNombre', '$formMac', '$formModelo', '$formTelefono', '$formDni', 'yes', '$formDireccion', '$formZona', '$formRouter', 'admin', '$formPasswordapi', '$formPppuser', '$formPpassword')";
                if (mysqli_query($con, $insert)) {

                    $alert = '

                    <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-check"></i> Exito !</h4>
                                    Datos guardados correctamente.
                                    <br>
                                    Usuario De conexion es : '.$formPppuser.'
                                    <br>
                                    La Contraseña De conexion es : '.$formPpassword.'
                                    <br>
                                    Usuario administrativo : admin
                                    <br>
                                    Contraseña  : '.$formPasswordapi.'
                                  </div>

                    ';



                    $roquery = new RouterosAPI();



                    if ($roquery->connect($cont_array_query['ip'], $cont_array_query['user'], $cont_array_query['pass'])) {
                      $roquery->comm("/tool/user-manager/user/add", array(
                                "customer"   => "admin",
                                "username"   => "$formPppuser",
                                "password" => "$formPpassword",
                                "wireless-enc-algo" => "none",
                                 "wireless-enc-key" => "",
                                  "wireless-psk" => "",
                                  "disabled" => "no",

                      ));

                      $roquery->comm("/tool/user-manager/user/create-and-activate-profile", array(
                                "customer"   => "admin",
                                "numbers" => "$formPppuser",
                                 "customer" => "admin",
                                 "profile" => "4MB",


                      ));










                      $roquery->disconnect();
                    }
                  } else {



                      $alert = '

                      <div class="alert alert-success alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <h4><i class="icon fa fa-check"></i> Exito !</h4>
                                      Problemas al Contactar con nucleo.
                                    </div>

                      ';


                 }


              }








  }
}
//echo "<pre>";
//var_dump($_GET);

 ?>
