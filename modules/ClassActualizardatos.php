<?php
require('modules/includes/check.php');
if (!$_GET) {
  function imprimeforms (){


    //$roquery = new RouterosAPI();



  //  if ($roquery->connect('10.0.0.1', 'api', 'hola1234')) {
      //$roquery->write('/tool/user-manager/user/print',true);
      //$roquery->write('=where=', false);
      //$roquery->write('?status=interim', true);



    //  $READ = $roquery->read(false);
    //  $ARRAY = $roquery->parseResponse($READ);


    //foreach ($ARRAY as $valores) {
      //echo "<pre>";
      //print_r($valores);
    //}
    //echo "<pre>";
      //print_r($valores);
      //$roquery->disconnect();

      //$datauser = $valores['username'];
      //echo "$datauser";
      //$oudate = "INSERT INTO outdate (user, actualizado)
      //VALUES ('$datauser', '0')";

      //if (mysqli_query($con, $oudate)) {
        //echo "New record created successfully";
      //} else {
        //echo "Error: " . $oudate . "<br>" . mysqli_error($con);
  //  }








    echo '
    <div class="col-md-6">
      <div class="form-group">
      <div class="box-header with-border">
        <h3 class="box-title">Seleciona Usuario y Zona</h3>
      </div>


        <form method="get">
        <div class="box-body">
        <select class="form-control input-lg" name="user" class="form-control select2" style="width: 100%;">
          <option value="0" selected="selected">Seleciones un Usuario</option>';
          require('modules/includes/dbcon.php');
          $listolscli = "SELECT * FROM outdate WHERE actualizado = '0'";
          $dataolduser = mysqli_query($con, $listolscli);
          foreach ($dataolduser as $valores){
            echo '<option value = '.$valores['user'].'>'.$valores['user'].'</option>';

          }

          echo '
        </select>
        <br>
        <select class="form-control input-lg" name="zona" class="form-control select2" style="width: 100%;">
          <option value="0" selected="selected">Seleciona La Zona ligada al cliente</option>';
          require('modules/includes/dbcon.php');
          $listazone = "SELECT * FROM nodos";
          $datazone = mysqli_query($con, $listazone);
          foreach ($datazone as $valoreszone){
            echo '<option value = '.$valoreszone['nombre'].'>'.$valoreszone['nombre'].'</option>';

          }

          echo '
        </select>



          <input name="jobs" class="form-control input-lg" type="hidden" value="job1">
        </div>
          ';

          echo '

      </div>

      <button type="submit" class="btn btn-block btn-warning btn-lg">Continuar </button>
      </form>
      <!-- /.form-group -->
    </div>
    <div class="col-md-6">
      <div class="form-group">
      <div class="box-header with-border">
        <h3 class="box-title">Registrar Una Nueva Zona</h3>
      </div>


        <form method="">
        <div class="box-body">


          <input name="nombre" class="form-control input-lg" type="text" placeholder="Nombre de Zona">

          <br>
          <input name="mac" class="form-control input-lg" type="text" placeholder="MAC-ADDRES">
          <br>
          <input name="modelo" class="form-control input-lg" type="text" placeholder="Modelo">
          <br>
          <input name="ip" class="form-control input-lg" type="text" placeholder="IP VPAL">

          <br>

          <select class="form-control input-lg" name="tunel" class="form-control select2" style="width: 100%;">
            <option value="0" selected="selected">Seleciona un Protocolo</option>
            <option value="L2TP">L2TP</option>
            <option value="PPTP">PPTP</option>
            <option value="GRE TCP">GRE TCP</option>
            <option value="IP TUNEL">IP TUNELING</option>
            <option value="PPoE">PPoE</option>
            <option value="Unicast">Unicast</option>
            <option value="Multicast">Multicast</option>
            <option value="Directa">Ditecta</option>
          </select>
          <br>
          <input name="ssida" class="form-control input-lg" type="text" placeholder="SSID" required>
          <br>
          <input name="frecuenciaa" class="form-control input-lg" type="text" placeholder="Frecuencia ej. 5225" required>
          <br>
          <input name="ssidb" class="form-control input-lg" type="text" placeholder="SSID2">
          <br>
          <input name="frecuenciab" class="form-control input-lg" type="text" placeholder="Frecuencia ej. 5225">
          <br>
          <input name="ssidc" class="form-control input-lg" type="text" placeholder="SSID3">
          <br>
          <input name="frecuenciac" class="form-control input-lg" type="text" placeholder="Frecuencia ej. 5225">
          <br>

          <input name="usuarioapi" class="form-control input-lg" type="text" placeholder="Usuario SNMP o API">
          <br>
          <input name="passwordapi" class="form-control input-lg" type="text" placeholder="Password SNMP o API">
          <input name="jobs" class="form-control input-lg" type="hidden" value="job2">
        </div>
          ';

          echo '
          <button type="submit" class="btn btn-block btn-warning btn-lg">Registrar Zona</button>
          </form>
      </div>

      <!-- /.form-group -->
    </div>

    ';



  }
}

if (isset($_GET)) {

//reg 1
  if ($_GET['jobs'] == 'job1') {

                $formzona = $_GET['zona'];
                $formuser = $_GET['user'];



function imprimeforms (){


echo '  <div class="col-md-6">
    <div class="form-group">
    <div class="box-header with-border">
      <h3 class="box-title">Registrar Una Nueva Zona</h3>
    </div>


      <form method="">
      <div class="box-body">


        <input name="nombre" class="form-control input-lg" type="text" placeholder="Nombre de Zona">

        <br>
        <input name="mac" class="form-control input-lg" type="text" placeholder="MAC-ADDRES">
        <br>
        <input name="modelo" class="form-control input-lg" type="text" placeholder="Modelo">
        <br>
        <input name="ip" class="form-control input-lg" type="text" placeholder="IP VPAL">

        <br>

        <select class="form-control input-lg" name="tunel" class="form-control select2" style="width: 100%;">
          <option value="0" selected="selected">Seleciona un Protocolo</option>
          <option value="L2TP">L2TP</option>
          <option value="PPTP">PPTP</option>
          <option value="GRE TCP">GRE TCP</option>
          <option value="IP TUNEL">IP TUNELING</option>
          <option value="PPoE">PPoE</option>
          <option value="Unicast">Unicast</option>
          <option value="Multicast">Multicast</option>
          <option value="Directa">Ditecta</option>
        </select>
        <br>
        <input name="ssida" class="form-control input-lg" type="text" placeholder="SSID" required>
        <br>
        <input name="frecuenciaa" class="form-control input-lg" type="text" placeholder="Frecuencia ej. 5225" required>
        <br>
        <input name="ssidb" class="form-control input-lg" type="text" placeholder="SSID2">
        <br>
        <input name="frecuenciab" class="form-control input-lg" type="text" placeholder="Frecuencia ej. 5225">
        <br>
        <input name="ssidc" class="form-control input-lg" type="text" placeholder="SSID3">
        <br>
        <input name="frecuenciac" class="form-control input-lg" type="text" placeholder="Frecuencia ej. 5225">
        <br>

        <input name="usuarioapi" class="form-control input-lg" type="text" placeholder="Usuario SNMP o API">
        <br>
        <input name="passwordapi" class="form-control input-lg" type="text" placeholder="Password SNMP o API">
        <input name="jobs" class="form-control input-lg" type="hidden" value="job2">
      </div>
        ';

        echo '
        <button type="submit" class="btn btn-block btn-warning btn-lg">Registrar Zona</button>
        </form>
    </div>

    <!-- /.form-group -->
  </div>

  ';

}


  }

//reg 2

  if ($_GET['jobs'] == 'job2') {

          $formNombre = $_GET['nombre'];
          $formMac = $_GET['mac'];
          $formModelo = $_GET['modelo'];
          $formIP = $_GET['ip'];
          $formTunel = $_GET['tunel'];
          $formSsid1 = $_GET['ssida'];
          $formFrecuencia1 = $_GET['frecuenciaa'];
          $formSsid2 = $_GET['ssidb'];
          $formFrecuencia2 = $_GET['frecuenciab'];
          $formSsid3 = $_GET['ssidc'];
          $formFrecuencia3 = $_GET['frecuenciac'];
          $formApiuser = $_GET['usuarioapi'];
          $formApipass = $_GET['passwordapi'];


          $errors = array();

          if (validarequerido($formNombre) == false) {

            $errors[] = "Nombre  Es Requerido";

          }


          if (validarequerido($formMac) == false) {

            $errors[] = "MAC-ADDRES Es Requerido";

          }

            if (validarequerido($formIP) == false) {

              $errors[] = "IP-ADDRES  es Requerido";

            }


            if (validarequerido($formModelo) == false) {

              $errors[] = "Modelo  es Requerida";

            }

            if (validarequerido($formApiuser) == false) {

              $errors[] = "Usuario API Requerido";

            }

            if (validarequerido($formApipass) == false) {

              $errors[] = "No se pudo confimar las contraseñas";

            }

            if ($errors == NULL) {




              $insert = "INSERT INTO nodos (nombre, mac, modelo, iphost, protoclo, lastupdate, estado, ssid1, ssid2, ssid3, pass, user, frecuencia1, frecuencia2, frecuencia3)
              VALUES ('$formNombre', '$formMac', '$formModelo', '$formIP', '$formTunel', 'no', 'yes', '$formSsid1', '$formSsid2', '$formSsid3', '$formApipass', '$formApiuser', '$formFrecuencia1', '$formFrecuencia2', '$formFrecuencia3')";
              if (mysqli_query($con, $insert)) {
                function imprimeforms(){
                  echo '

                  <div class="alert alert-success alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h4><i class="icon fa fa-check"></i> Exito !</h4>
                                  Datos guardados correctamente.
                                </div>

                  ';
                }
                } else {
                  function imprimeforms(){
                    echo '

                    <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-check"></i> Exito !</h4>
                                    Problemas al Generar HASH.
                                  </div>

                    ';

                  }
               }


            }
}

//end reg 2



}
//end comprobacion de get

//var_dump($_GET);

 ?>
