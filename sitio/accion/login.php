<?php

session_start();
require_once __DIR__ . '/../class/db_conexion.php';
require_once __DIR__ . '/../class/usuarios.php';
require_once __DIR__ . '/../class/Autentificacion.php';
require_once __DIR__ . '/../class/Cifrado.php';


$mail = $_POST['mail'];
$password = $_POST['password'];

if(!(new Autentificacion())->iniciarSesion($mail, $password)){
    $_SESSION['mError'] = "Las credenciales ingresadas no coinciden con nuestros registros.";
    header('Location: ../index.php?s=iniciar-sesion');
    exit;
}



header("Location: ../index.php?s=home");
exit;