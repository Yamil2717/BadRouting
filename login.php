<?php
require('modulos/class/Mysql_Class.php');
require('modulos/class/Conf_Class.php');
require('modulos/class/Comprobadores_Class.php');
require('modulos/pages/login.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo "$iconfirst $iconsecond"; ?> | Login </title>
    <link rel="stylesheet" href="Components/Front-End/CSS/Fonts/Font-main.min.css">
    <link rel="stylesheet" href="Components/Front-End/CSS/Fonts/Font-icons.min.css">
    <link rel="stylesheet" href="Components/Front-End/CSS/login.min.css">
</head>
<body class="background-login">
    <div class="box-login">
        <div class="logo">
            <p><b><?php echo "$iconfirst"; ?></b><?php echo "$iconsecond"; ?></p>
        </div>
        <p class="login-msg">Inicia sesión para comenzar.</p>
        <br>
        <form method="post">
            <div class="form-control">
                <input name="user" type="text" class="input-control" placeholder="Ingrese su usuario">
                <span class="icon-user control-icons"></span>
            </div> 
            <div class="form-control">
                <input name="password" type="password" class="input-control" placeholder="Ingrese su contraseña">
                <span class="icon-keyboard control-icons"></span>
            </div>
            <?php 
            if(isset($error_disp)) {
                echo "<div class='error-disp'>$error_disp</div>";
            } ?>
            <div class="box-checks">
                    <input id="remember-label" type="checkbox" class="remember-checkbox">
                    <label for="remember-label" class="remember-label"> Recuerdame </label>
                    <input type="submit" value="Ingresar" class="submit-login">
                </div>
            </form>
    </div>
</body>
</html>