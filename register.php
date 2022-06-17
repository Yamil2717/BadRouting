<?php
require('modulos/class/Session_Class.php');
require('modulos/class/Mysql_Class.php');
require('modulos/class/Conf_Class.php');
require('modulos/class/Comprobadores_Class.php');
require('modulos/componentes/ClassMenu.php');
require('modulos/componentes/ClassToogle.php');
require('modulos/pages/register.php');
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
              <h2 class="box-registry-title">Usuarios</h2>
              <div class="box-registry-buttons">
                <?php echo "$alertaregistro"; ?>
                <button id="ButtonRegister" class="buttons buttons-default">Registrar nuevo usuario</button>
                <button id="ButtonChangePassword" class="buttons buttons-warning">Cambiar contraseña</button>
                <button id="ButtonDeleteUser" class="buttons buttons-danger">Eliminar usuarios</button>
              </div>
            </div>
          <div>
            <div id="user-register" class="user-register">
                <h3 class="user-title">Registrar nuevo usuario</h3>
                <form action="">
                  <div class="form-control">
                    <input class="input-control" name="user" type="text" placeholder="Ingrese un usuario" required>
                    <span class="icon-v-card input-icons-control"></span>
                  </div>
                  <div class="form-control">
                    <input class="input-control" name="password" type="password" placeholder="Ingrese una contraseña" required>
                    <span class="icon-key input-icons-control"></span>
                  </div>
                  <div class="form-control">
                    <input class="input-control" name="repassword" type="password" placeholder="Repita la contraseña" required>
                    <span class="icon-keyboard icon-keyboard input-icons-control"></span>
                  </div>
                  <div class="form-control">
                    <input class="input-control" name="name" type="text" placeholder="Ingrese nombre completo" required>
                    <span class="icon-user input-icons-control"></span>
                  </div>
                  <div class="form-control">
                    <input class="input-control" name="phone" type="tel" placeholder="+51 99999999" required>
                    <span class="icon-phone input-icons-control"></span>
                  </div>
                  <div class="form-control">
                    <input class="input-control" name="email" type="email" placeholder="Correo electronico" required>
                    <span class="icon-mail input-icons-control"></span>
                  </div>
                  <div class="form-control">
                    <Select class="select-control" name="avatar" required>
                      <option disabled>Avatars:</option>
                        <option value="avatar.png">Avatar 1</option>
                        <option value="avatar2.png">Avatar 2</option>
                        <option value="avatar3.png">Avatar 3</option>
                        <option value="avatar4.png">Avatar 4</option>
                        <option value="avatar5.png">Avatar 5</option>
                    </Select>
                    <span class="icon-users input-icons-control"></span>
                  </div>
                  <div class="form-control">
                    <select class="select-control" name="level-administrative" required>
                      <option disabled>Niveles administrativos:</option>
                      <option value="1">Usuario simple</option>
                      <option value="2">Usuario Instalador</option>
                      <option value="3">Usuario de Diagnosticos</option>
                      <option value="4">Usuario de Resoluciones de Conflictos</option>
                      <option value="5">Moderador</option>
                    </select>
                    <span class="icon-price-ribbon input-icons-control"></span>
                  </div>
                  <button class="buttons buttons-danger" type="button">Cerrar</button>
                  <button class="buttons buttons-default" type="submit">Registrar</button>
                </form>
            </div>
            <div id="change-password" class="change-password">
              <h3 class="user-title">Cambiar contraseña</h3>
              <form action="">
                <div class="form-control">
                  <input class="input-control user-uppercase" name="user2" type="text" value="<?php echo $_SESSION['nombre']; ?>" disabled>
                  <span class="icon-user input-icons-control"></span>
                </div>
                <div class="form-control">
                  <input class="input-control" name="password2" type="password" placeholder="Ingrese su nueva contraseña" required>
                  <span class="icon-key input-icons-control"></span>
                </div>
                <div class="form-control">
                  <input class="input-control" name="repassword2" type="password" placeholder="Repita su nueva contraseña" required>
                  <span class="icon-keyboard input-icons-control"></span>
                </div>
                <button class="buttons buttons-danger" type="button">Cerrar</button>
                <button class="buttons buttons-default" type="submit">Guardar cambios</button>
              </form>
            </div>
            <div id="delete-user" class="delete-user">
              <h3 class="user-title">Eliminar usuario</h3>
              <div class="form-control">
                <div class="x100 buttons buttons-danger">Los usuarios eliminados son irrecuperable, piensalo bien antes de eliminar algún usuario.</div>
              </div>
              <form action="">
                <div class="form-control">
                  <select class="input-control user-uppercase" name="delete-user" required>
                    <option disabled>Seleccionar usuario</option>
                    <?php
                    while ($valores = mysqli_fetch_array($dataadmin)) {
                    echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    } ?>
                  </select>
                  <span class="icon-users input-icons-control"></span>
                </div>
                <button class="buttons buttons-danger" type="button">Cerrar</button>
                <button class="buttons buttons-default" type="submit">Eliminar usuario</button>
              </form>
            </div>
          </div>
        </section>

        <!-- <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <?php  // echo $panelcfg['version'] .'  '.$panelcfg['revision']; ?>
            </div>
            <strong><?php  // echo $panelcfg['creditos']; ?></strong>
        </footer> -->
    </main>

<script src="Components/Front-End/JS/Register.js"></script>
<script src="Components/Front-End/JS/Menus.js"></script>
</body>
</html>