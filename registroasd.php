<?php
require('modulos/class/Session_Class.php');
require('modulos/class/Mysql_Class.php');
require('modulos/class/Conf_Class.php');
require('modulos/class/Comprobadores_Class.php');
require('modulos/componentes/ClassMenu.php');
require('modulos/componentes/ClassToogle.php');
require('modulos/pages/registry.php');


//var_dump($_SESSION);
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
    <section class="content">


      <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Usuarios</h3>
            </div>
            <div class="box-body">
              <?php echo "$alertaregistro";



              ?>

              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Registrar Usuario Nuevo
              </button>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-list">
                Cambiar de Contraseña
              </button>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                Eliminar Usuarios
              </button>
              <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                Launch Warning Modal
              </button>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                Launch Success Modal
              </button> -->
            </div>
          </div>
        </div>
      </div>

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registrar Nuevo Usuario</h4>
              </div>
              <div class="modal-body">
                <div>
                    <!-- form start -->
                    <form class="form-horizontal">
                      <input name="jobs" value="1" hidden>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="user3" class="col-sm-2 control-label">User</label>

                          <div class="col-sm-10">
                            <input name="user" id="user3" type="text" class="form-control" placeholder="Usuario" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="Password3" class="col-sm-2 control-label">Password</label>

                          <div class="col-sm-10">
                            <input name="password" type="password" class="form-control" id="Password3" placeholder="Password" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="RePassword3" class="col-sm-2 control-label">Re-Password</label>

                          <div class="col-sm-10">
                            <input name="repassword" type="password" class="form-control" id="RePassword3" placeholder="re-Password" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="Nombre" class="col-sm-2 control-label">Nombre </label>

                          <div class="col-sm-10">
                            <input name="nombre" type="text" class="form-control"  id="Nombre" placeholder="Nombre Completo" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="Telefono3" class="col-sm-2 control-label">Telefono</label>

                          <div class="col-sm-10">
                            <input name="telefono" type="text"  id="Telefono3" class="form-control" placeholder="+51 99999999" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="Telefono3" class="col-sm-2 control-label">Email</label>

                          <div class="col-sm-10">
                            <input name="email" type="email"  id="email" class="form-control" placeholder="correo@correo.com" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="avatar" class="col-sm-2 control-label">Avatar</label>
                          <div class="col-sm-10">
                          <select name="avatar" id="avatar" class="form-control">
                            <option value="avatar.png">Avatar 1</option>
                            <option value="avatar2.png">Avatar 2</option>
                            <option value="avatar3.png">Avatar 3</option>
                            <option value="avatar4.png">Avatar 4</option>
                            <option value="avatar5.png">Avatar 5</option>
                          </select>
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="nivel" class="col-sm-2 control-label">Nivel administrativo</label>
                        <div class="col-sm-10">
                        <select name="nivel" id="nivel" class="form-control">
                          <option value="1">Usuario simple</option>
                          <option value="2">Usuario Instaldor</option>
                          <option value="3">Usuario de diagnostico</option>
                          <option value="4">Usuario de resolucion de confligtos</option>
                          <option value="5">Moderador</option>
                        </select>
                        </div>
                    </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        </div>
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-list">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cambiar de Contraseña</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal">
                  <input name="jobs" value="2" hidden>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="userX" class="col-sm-2 control-label">User</label>

                      <div class="col-sm-10">
                        <input name="user" id="userX" type="text" class="form-control" value="<?php echo $_SESSION['nombre']; ?>" disabled>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="password" class="col-sm-2 control-label">Password</label>

                      <div class="col-sm-10">
                        <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="repassword" class="col-sm-2 control-label">rePassword</label>

                      <div class="col-sm-10">
                        <input name="repassword" id="repassword" type="password" class="form-control" placeholder="Repite Contraseña" required>
                      </div>
                    </div>

              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <!-- /.modal -->

        <div class="modal fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Warning Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Eliminar Usuario</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal">
                <div class="form-group">
                    <a>Alerta! El usuario eliminado es irecuprable</a>


                  <input name="jobs" value="3" hidden>
                  <label for="selecionardel" class="col-sm-2 control-label">select Usuario</label>
                  <div class="col-sm-10">
                  <select name="removeid" id="selecionardel" class="form-control">
                    <option value="null">Seleciona Un Usuario</option>
                    <?php
                    while ($valores = mysqli_fetch_array($dataadmin)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }

                     ?>
                  </select>
                  </div>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Eliminar</button>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
    <!-- /.content -->
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
