<?php
require('modulos/class/Session_Class.php');
require('modulos/class/Mysql_Class.php');
require('modulos/class/Conf_Class.php');
require('modulos/class/Comprobadores_Class.php');
require('modulos/componentes/ClassMenu.php');
require('modulos/componentes/ClassToogle.php');
require('modulos/componentes/ClassControlSidebar.php');
require('modulos/class/routeros.php');
require('modulos/pages/clienteadd.php');




?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $header; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="<?php echo $panelcfg['skin']; ?>">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?php echo "$primeradiminutivo"; ?></b><?php echo "$segundodiminutivo"; ?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $iconfirst; ?></b><?php echo "$iconsecond"; ?></span>
    </a>
    <?php

    imprimetoogle();
     ?>

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <?php
    echo "$content_menu";
     ?>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $content; ?>
        <small><?php echo $descripcion; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo "$contendor"; ?></a></li>
        <li class="active"><?php echo $content; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


      <div class="col-md-6">
        <?php echo $alertaregistro; ?>
        <div class="form-group">
        <div class="box-header with-border">
          <h3 class="box-title">Registrar Un Nuevo Cliente</h3>
        </div>


          <form method="get">
          <div class="box-body">


            <input name="nombre" class="form-control input-lg" type="text" placeholder="Nombre Completo">

            <br>
            <input name="mac" class="form-control input-lg" type="text" placeholder="MAC-ADDRES">
            <br>
            <input name="modelo" class="form-control input-lg" type="text" placeholder="Modelo">
            <br>
            <input name="telefono" class="form-control input-lg" type="text" placeholder="+51 99999999">

            <br>
            <input name="dni" class="form-control input-lg" type="text" placeholder="DNI / RUC / IDN">

            <br>

            <input name="direccion" class="form-control input-lg" type="text" placeholder="Direcion cliente">

            <br>
            <select class="form-control input-lg" name="zona" class="form-control select2" style="width: 100%;">
              <option value="0" selected="selected">Seleciona La Zona ligada al cliente</option>
              <?php

              echo $content_select_zona;

              ?>

            </select>

            <br>

            <select class="form-control input-lg" name="router" class="form-control select2" style="width: 100%;" required>
              <option value="0" selected="selected">Equipos instalados</option>
              <option value="1">Incluido Router Wi-fi</option>
              <option value="2">Incluido Solo CPE </option>
              <option value="3">Propietario Cliente </option>
            </select>
            <br>
            <label >Seleciona un plan (por defecto 4MB)</label>
            <select class="form-control input-lg" name="plan" class="form-control select2" style="width: 100%;" required>
              <option value="4">4mb / 100000 GB's</option>
              <option value="8">8mb / 100000 GB's</option>
              <option value="15">15mb / 100000 GB's</option>
              <option value="20">20mb / 100000 GB's</option>
              <option value="40">40mb / 100000 GB's</option>
            </select>
            <br>

            <label >Seleciona marca del CPE</label>
            <select class="form-control input-lg" name="marca" class="form-control select2" style="width: 100%;" required>
              <option value="1">Mikrotik</option>
              <option value="2">Ubiquiti</option>
              <option value="3">Otras</option>

            </select>
            <br>

            <input name="usuarioapi" class="form-control input-lg" type="text" value="<?php echo $_SESSION['nombre']; ?>" disabled>

            <input name="jobs" class="form-control input-lg" type="hidden" value="job1">

          </div>



            <button type="submit" class="btn btn-block btn-warning btn-lg">Registrar Cliente</button>
            </form>
        </div>

        <!-- /.form-group -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <?php echo $panelcfg['version'] .'  '.$panelcfg['revision']; ?>
    </div>
    <!-- Default to the left -->
    <strong><?php echo $panelcfg['creditos']; ?></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <?php imprmircontrolsidebar(); ?>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
