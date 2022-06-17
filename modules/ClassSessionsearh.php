<?php
if ($_GET['table_search']) {

  $imputbusqueda = $_GET['table_search'];

  $roquery = new RouterosAPI();



  if ($roquery->connect('10.15.0.1', 'api', 'hola1234')) {
    $roquery->write('/tool/user-manager/session/print',false);
    $roquery->write('=where=', false);
    $roquery->write('?user='.$imputbusqueda.'', true);



    $READ = $roquery->read(false);
    $ARRAY = $roquery->parseResponse($READ);


  foreach ($ARRAY as $valores) {
    //echo "<pre>";
    //print_r($valores);
  }
  //echo "<pre>";
    //print_r($valores);
    //$roquery->disconnect();


  }
}



 ?>
