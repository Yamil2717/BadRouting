<?php
//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['nombre']) || (trim($_SESSION['nombre']) == '')) {
    header("location: login.php");
    exit();
}


?>
