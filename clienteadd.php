<?php
require('modulos/class/Session_Class.php');
require('modulos/class/Mysql_Class.php');
require('modulos/class/Conf_Class.php');
require('modulos/class/Comprobadores_Class.php');
require('modulos/componentes/ClassMenu.php');
require('modulos/componentes/ClassToogle.php');
require('modulos/class/routeros.php');
require('modulos/pages/clienteadd.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $header; ?> | <?php echo $iconfirst; ?><?php echo "$iconsecond"; ?></title>
    <link rel="stylesheet" href="Components/Front-End/CSS/Fonts/Font-main.min.css">
    <link rel="stylesheet" href="Components/Front-End/CSS/Fonts/Font-icons.min.css">
    <link rel="stylesheet" href="Components/Front-End/CSS/General-CSS.css">
    <link rel="stylesheet" href="Components/Front-End/CSS/register.css">
</head>
<body class="<?php echo $panelcfg['skin']; ?>">
    <header class="header-main">
        <div id="UserPanel" class="sidebar-dropdown"><a class="icon-list"></a></div>
        <p class="logo"><b><?php echo $iconfirst; ?></b><?php echo "$iconsecond"; ?></p>
        <?php 
            imprimetoogle();
        ?>
    </header>
    <section class="section" id="user-panel">
        <?php 
            echo "$content_menu";
        ?>
    </section>
    <main class="main" id="main">
        <div class="main-info">
            <h1 class="main-info-title">
              <?php echo $content; ?>
              <span class="main-info-text"><?php echo $descripcion; ?></span>
            </h1>
            <ol class="url-indicator">
                <li class="url-indicator-li">
                  <a class="url-indicator-home" href="/">
                    <span class="url-indicator-icon-home icon-home"></span>
                    <?php echo "$contendor"; ?>
                  </a>
                </li>
                <li class="url-indicator-active">
                  <span class="url-indicator-icon-active icon-controller-fast-forward"></span>
                  <?php echo $content; ?>
                </li>
            </ol>
        </div>
        <!-- <section>
            <?php // $cont_html_boddy; ?>
        </section> -->

        <section>
            <div class="box-registry">
              <h2 class="box-registry-title" style="border-bottom: none; text-align: center;">Registrar Un Nuevo Cliente</h2>
            </div>
            <form action="">
                <div class="form-control">
                    <input class="input-control" type="text" placeholder="Nombre completo">
                    <span class="icon-user input-icons-control"></span>
                </div>
                <div class="form-control">
                    <input class="input-control" type="text" placeholder="MAC-ADDRES">
                    <span class="icon-classic-computer input-icons-control"></span>
                </div>
                <div class="form-control">
                    <input class="input-control" type="text" placeholder="Modelo">
                    <span class="icon-publish input-icons-control"></span>
                </div>
                <div class="form-control">
                    <input class="input-control" type="tel" placeholder="+51 99999999">
                    <span class="icon-phone input-icons-control"></span>
                </div>
                <div class="form-control">
                    <input class="input-control" type="text" placeholder="DNI / RUC / IDN">
                    <span class="icon-v-card input-icons-control"></span>
                </div>
                <div class="form-control">
                    <input class="input-control" type="text" placeholder="Dirección cliente">
                    <span class="icon-location input-icons-control"></span>
                </div>
                <div class="form-control">
                    <select class="select-control" name="" id="">
                        <option selected disabled>Zona ligada al cliente:</option>
                        <option value="Omate">Omate</option>
                    </select>
                    <span class="icon-location-pin input-icons-control"></span>
                </div>
                <div class="form-control">
                    <select class="select-control" name="" id="">
                        <option selected disabled>Equipos instalados</option>
                        <option value="1">Incluido Router Wi-fi</option>
                        <option value="2">Incluido Solo CPE</option>
                        <option value="3">Propietario Cliente</option>
                    </select>
                    <span class="icon-install input-icons-control"></span>
                </div>
                <div class="form-control">
                    <select class="select-control" name="" id="">
                        <option selected disabled>Selecione un plan</option>
                        <option value="4">4mb / 100000 GB's (Default)</option>
                        <option value="8">8mb / 100000 GB's</option>
                        <option value="15">15mb / 100000 GB's</option>
                        <option value="20">20mb / 100000 GB's</option>
                        <option value="40">40mb / 100000 GB's</option>
                    </select>
                    <span class="icon-text-document input-icons-control"></span>
                </div>
                <div class="form-control">
                    <select class="select-control" name="" id="">
                        <option selected disabled>Selecione marca del CPE</option>
                        <option value="1">Mikrotik</option>
                        <option value="2">Ubiquiti</option>
                        <option value="3">Otras</option>
                    </select>
                    <span class="icon-menu input-icons-control"></span>
                </div>
                <div class="form-control">
                    <input class="input-control user-uppercase" value="gustavo sanchez" type="text" disabled>
                    <span class="icon-user input-icons-control"></span>
                </div>
                <button class="buttons buttons-default" type="submit">Registrar Cliente</button>
            </form>
        </section>

        <!-- <footer class="main-footer">
            <div class="pull-right hidden-xs">
            <?php  // echo $panelcfg['version'] .'  '.$panelcfg['revision']; ?>
            </div>
            <strong><?php  // echo $panelcfg['creditos']; ?></strong>
        </footer> -->
    </main>

<script src="Components/Front-End/JS/Menus.js"></script>
</body>
</html>