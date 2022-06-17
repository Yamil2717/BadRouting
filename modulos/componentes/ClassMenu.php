<?php

require('modules/includes/dbcon.php');

//define variables catergories

$var_menu_1 = '';
$var_menu_2 = '';
$var_menu_3 = '';
$var_menu_4 = '';
$var_menu_5 = '';
$var_menu_6 = '';   

//define varible scrip active

$var_scrip_1 = '';
$var_scrip_2 = '';
$var_scrip_3 = '';
$var_scrip_4 = '';
$var_scrip_5 = '';
$var_scrip_6 = '';

$location = $_SERVER['SCRIPT_NAME'];

if ($location == "/index.php") {
  $content = 'Data Trouble';
  $contendor = 'Dashboard';
  $descripcion = 'Data FLOW';
  $header = 'Flujo de Datos';


}

if ($location == "/register.php") {
  $content = 'Admin TOOLS';
  $contendor = 'Adm MK';
  $descripcion = 'Cuentas Admin';
  $header = 'Modificar Cuentas';

  $var_scrip_1 = 'class="active"';
  $var_menu_1 = 'active';
}

if ($location == "/sessions.php") {
  $content = 'Admin TOOLS';
  $contendor = 'Adm MK';
  $descripcion = 'Seciones Activas';
  $header = 'Seciones Activas (NAS)';

  $var_scrip_2 = 'class="active"';
  $var_menu_1 = 'active';
}

if ($location == "/clienteadd.php") {
  $content = 'Control de Clientes';
  $contendor = 'Adm MK';
  $descripcion = 'Registro para nuevo Cliente';
  $header = 'Registrar Clientes Nuevo';

  $var_scrip_3 = 'class="active"';
  $var_menu_2 = 'active';
}

if ($location == "/suspend.php") {
  $content = 'Control de Clientes';
  $contendor = 'Adm MK';
  $descripcion = 'Suspender Usuario';
  $header = 'Suspencion de Usuario';

  $var_scrip_4 = 'class="active"';
  $var_menu_2 = 'active';
}

if ($location == "/radius.php") {
  $content = 'Control de Clientes';
  $contendor = 'Adm MK';
  $descripcion = 'Configurar Radius';
  $header = 'Conectividad';

  $var_scrip_5 = 'class="active"';
  $var_menu_3 = 'active';
}


//echo "<pre>";
//var_dump ($_SESSION);




  $content_menu = '
  <div class="user-panel">
    <img class="avatar-user-panel" src="dist/img/'.$_SESSION['avatar'].'" alt="Tu avatar">
    <div class="user-info-panel">
        <p class="user-panel-text">'.$_SESSION['nombre'].'</p>
        <span class="state-panel icon-circle"> Online </span>
    </div>
  </div>
  <nav class="nav-user-panel">
    <ul class="menu-user-panel">
        <li class="user-panel-item">
            <a class="user-panel-link" href="/">
                <span class="icon-user-panel-link icon-home"></span>
                Escritorio
            </a>
        </li>
        <li class="user-panel-item '.$var_menu_1.'">
            <a class="user-panel-link">
                <span class="icon-user-panel-link icon-tools"></span>
                Herramientas administrativas
                <span class="icon-user-panel-after icon-chevron-thin-left"></span>
            </a>
            <ul class="submenu-user-panel">
                <li class="sub-user-panel-item '.$var_scrip_1.'">
                    <a class="user-panel-link" href="register.php">
                        <span class="icon-user-panel-link icon-users"></span>
                        Control de Usuarios
                    </a>
                </li>
                <li class="sub-user-panel-item '.$var_scrip_2.'">
                    <a class="user-panel-link" href="sessions.php">
                        <span class="icon-user-panel-link icon-login"></span>
                        Sesiones Activas NAS
                    </a>
                </li>
            </ul>
        </li>
        <li class="user-panel-item '.$var_menu_2.'">
            <a class="user-panel-link">
                <span class="icon-user-panel-link icon-users"></span>
                Control de Clientes
                <span class="icon-user-panel-after icon-chevron-thin-left"></span>
            </a>
            <ul class="submenu-user-panel">
                <li class="sub-user-panel-item '.$var_scrip_3.'">
                    <a class="user-panel-link" href="clienteadd.php">
                        <span class="icon-user-panel-link icon-circle-with-plus"></span>
                        Registrar Nuevo Usuario
                    </a>
                </li>
                <li class="sub-user-panel-item '.$var_scrip_4.'">
                    <a class="user-panel-link" href="suspend.php">
                        <span class="icon-user-panel-link icon-circle-with-cross"></span>
                        Suspender Clientes Morosos
                    </a>
                </li>
            </ul>
        </li>
        <li class="user-panel-item '.$var_menu_3.'">
            <a class="user-panel-link">
                <span class="icon-user-panel-link icon-flow-tree"></span>
                Conectividad
                <span class="icon-user-panel-after icon-chevron-thin-left"></span>
            </a>
            <ul class="submenu-user-panel">
                <li class="sub-user-panel-item '.$var_scrip_5.'">
                    <a class="user-panel-link" href="radius.php">
                        <span class="icon-user-panel-link icon-flow-cascade"></span>
                        Rad Server
                    </a>
                </li>
            </ul>
        </li>
    </ul>
  </nav>
  ';
