<?php
class Mysql_class {
  // COnfiguraciones Mysql_class
public function __construct()
  {
    $this->user = '';
    $this->password = '';
    $this->server = '';
    $this->database = '';

    $this->init_conexion = new mysqli(
      $this->server,
      $this->user,
      $this->password,
      $this->database
    );
    if ($this->init_conexion -> connect_errno) {
     return exit('<h3> Error de capa E/S</h3>');
    }


  }

   // pass calculador
   public function Passwd_Calculador ($cont_parse_imput_pass, $salt)
      {
        $saltedPW =  $cont_parse_imput_pass . $salt;

        $hashedPW = hash('sha256', $saltedPW);


        $hashedPW = strtoupper($hashedPW);
          return $hashedPW;
      }


    //operaciones usuario
    public function add_user($n, $u, $p, $e, $avatar, $nv){

      $get_user = self::get_user($u);

      if (!$get_user['user']) {
        $gen_salt = bin2hex(random_bytes(7));
        $pass_calc = self::Passwd_Calculador ($p, $gen_salt);

      $res = $this->init_conexion->query("INSERT INTO admin (nombre, user, pass, salt, email, avatar, LastLogin, nivel)
      VALUES ('$n', '$u', '$pass_calc', '$gen_salt', '$e', '$avatar', '0000-00-00 00:00:00', '$nv')");


        return true;
      }else {
        return false;
      }


    }

    public function get_user($user){
      $res = $this->init_conexion->query("SELECT * FROM admin WHERE user='$user'");
      $cont = $res->fetch_array(MYSQLI_ASSOC);

        return $cont;
    }
    public function get_user_id($id){
      $res = $this->init_conexion->query("SELECT * FROM admin WHERE id='$id'");
      $cont = $res->fetch_array(MYSQLI_ASSOC);

        return $cont;
    }

    public function rem_user($u){

      $res = $this->init_conexion->query("DELETE FROM admin WHERE id='$u'");


        return $res;

    }
    public function change_passw($p, $id){
      $get_salt = self::get_user_id($id);
      if ($get_salt) {
          $gen_pass = self::Passwd_Calculador($p, $get_salt['salt']);
          $res = $this->init_conexion->query("UPDATE admin SET pass='$gen_pass' WHERE id='$id'");
          if ($res) {
            return true;
          }else {
            return false;
          }
      }else {
        return false;
      }
    }

    public function LastLoguin_update($id){
      $res = $this->init_conexion->query("UPDATE admin SET LastLogin=now() WHERE id='$id'");
      return $res;
    }

    //routeros data base

    public function get_routeros_radius(){
      $res = $this->init_conexion->query("SELECT * FROM routers WHERE id='0'");
      $cont = $res->fetch_array(MYSQLI_ASSOC);

        return $cont;
    }

    public function get_routeros_dni($dni){
      $res = $this->init_conexion->query("SELECT * FROM clientes WHERE dni='$dni'");
      $cont = $res->fetch_array(MYSQLI_ASSOC);

        return $cont;
    }
    
    public function add_routeros_cliente($nombre, $mac, $model, $telefono, $dni, $activado, $direccion,
                                        $zona, $router, $usuarioapi, $passwapi, $pppuser, $pppas){
      $res = $this->init_conexion->query("INSERT INTO clientes (nombre, mac,
        modelo, telefono, dni, activado, direccion, zona,
        router, usuarioapi, passwordapi, pppuser, pppassword)
      VALUES ('$nombre', '$mac',
        '$model', '$telefono', '$dni', '$activado', '$direccion', '$zona',
        '$router', '$usuarioapi', '$passwapi', '$pppuser', '$pppas')");


        return $res;
    }

    // session
    public function login ($user, $pass){
          $user = stripslashes($user);
          $pass = stripslashes($pass);
          $user = $this->init_conexion->real_escape_string($user);
          $pass = $this->init_conexion->real_escape_string($pass);
          $get_salt = self::get_user($user);

          if ($get_salt) {
            $gen_pass = self::Passwd_Calculador($pass, $get_salt['salt']);
            $res = $this->init_conexion->query("SELECT * FROM admin WHERE user='$user' and pass='$gen_pass'");

            $count = $res->num_rows;
            if ($count) {
              session_start();
              self::LastLoguin_update($get_salt['id']);
              $_SESSION['id']=$get_salt['id'];
              $_SESSION['nombre']=$get_salt['nombre'];
              $_SESSION['avatar']=$get_salt['avatar'];
              $_SESSION['lastloguin']=$get_salt['LastLogin'];
              $_SESSION['nivel']=$get_salt['nivel'];
              $_SESSION['user']=$get_salt['user'];
              return true;
            }else {
              return false;
            }

          }else {
            return false;
          }
    }

    // get objetos de $panelcfg
    public function get_panel_version(){
      $res = $this->init_conexion->query("SELECT * FROM version");
      $cont = $res->fetch_array(MYSQLI_ASSOC);

        return $cont;
    }

    public function get_select_zonas(){
      $res = $this->init_conexion->query("SELECT * FROM nodos");
      //$cont = $res->fetch_array(MYSQLI_ASSOC);

        return $res;
    }
    // get admin list
    public function get_admin_data(){
      $res = $this->init_conexion->query("SELECT * FROM admin");
        return $res;
    }

}

//instancia
      $mysqli = new Mysql_class;
      //echo "<pre>";
      //var_dump($cont->add_user('admin', 'admin', 'hola12', 'mail'));
      //var_dump($cont->change_passw('hola12', '3'));
      //var_dump($cont->login('admin', 'hola12'));
      //var_dump($_SESSION);
      //$gen_salt = random_bytes(15);
      //echo $gen_salt = bin2hex(random_bytes(15));

 ?>
