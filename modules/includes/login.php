<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include('dbcon.php');
include('check.php');

$alertas_login = "";
$fail = "";
$error_login = array();

$user = $_POST['user'];
$pass = $_POST['password'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        if (!validarequerido($user)) {
          $error_login[] = 'El campo de usuario no puede estar vacio';
        }

        if (!validarequerido($pass)) {
          $error_login[] = 'El campo de "Contraseña" no puede estar vacio';
        }
			}

			foreach ($error_login as $alertas_login);

			function alertas($alertas_login){
			print ('
			<div class="box-body">
			<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Ocurrio un problema</h4>
			"Usuario" o "contraseña invalido", uno o mas campo esta inclompletos o invalido. Intenta de nuevo.
			<br>');
			echo "$alertas_login";
			print('
			</br>
			</div>
			</div>');
			};

if (!$alertas_login)
		{
			$username = mysqli_real_escape_string($con, $_POST['user']);
			$password = mysqli_real_escape_string($con, $_POST['password']);

			$query 		= mysqli_query($con, "SELECT * FROM admin WHERE  password='$password' and username='$username'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			$row;

			if ($num_row > 0)
				{

          $sqluser = "SELECT * FROM admin WHERE username = '$username'";
           $userquery = mysqli_query($con, $sqluser);

           $userRown = mysqli_fetch_assoc($userquery);
          $_SESSION['id']=$userRown[id];
					$_SESSION['user']=$username;
          $_SESSION['nombre']=$userRown[nombre];
          $_SESSION['lastloguin']=$userRown[lastlogin];
          $_SESSION['iploguin']=$userRown[iploguin];
          $_SESSION['nivel']=$userRown[nivel];
          $_SESSION['avatar']=$userRown[avatar];
          $_SESSION['baneado']=$userRown[baneado];

          //update static
          $iploguin = $_SERVER[REMOTE_ADDR];
          $lastdate = date('l jS \of F Y h:i:s A');
          $useragent = $_SERVER[HTTP_USER_AGENT];

          $update = "UPDATE admin SET iploguin = '$iploguin', lastlogin = '$lastdate', useragent = '$useragent' WHERE username = '$username'";
          $updatequery = mysqli_query($con, $update);
          //echo "<pre>";
           //var_dump($_SERVER);
           //echo date('l jS \of F Y h:i:s A');

           //echo mysqli_error($con);

					header('location:index.php');


				}
			else
				{
					$fail ='
					<div class="box-body">
					<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> Ocurrio un problema</h4>
					"Usuario" o "contraseña invalido", uno o mas campo esta inclompletos o invalido. Intenta de nuevo.
					<br>
					</br>
					</div>
					</div>';
				}
		}
?>
