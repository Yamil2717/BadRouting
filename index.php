<?php
require('modulos/class/Session_Class.php');
require('modulos/class/Mysql_Class.php');
require('modulos/class/Conf_Class.php');
require('modulos/componentes/ClassMenu.php');
require('modulos/componentes/ClassToogle.php');

// require('modulos/pages/index.php');

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
    <link rel="stylesheet" href="Components/Front-End/CSS/index.min.css">
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
        <section class="main-info">
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
        </section>

        <!-- <section class="content container-fluid"> -->
            
        <section>
            <?php $cont_html_boddy; ?>
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