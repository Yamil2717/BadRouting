<?php
function imprimetoogle()
{

  echo '
    <nav id="UserMenu">
        <ul class="menu">
            <li>
                <img class="user-image" src="dist/img/'.$_SESSION['avatar'].'" alt="Tu avatar">
                <p class="user-name">'.$_SESSION['nombre'].'</p>
                <ul id="sub-menu" class="sub-menu">
                    <li class="user-info">
                        <img class="user-avatar" src="dist/img/'.$_SESSION['avatar'].'" alt="Tu avatar">
                        <p class="user-text">
                        '.$_SESSION['nombre'].'
                        <br>
                        '.$_SESSION['lastloguin'].'
                        </p>
                    </li>
                    <li class="user-buttons">
                        <a class="buttons-left" href="#">Perfil</a>
                        <a class="buttons-right" href="modules/includes/logout.php">Cerrar sesión</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
  ';
}

 ?>
