<?php
session_start();
require_once __DIR__ . '/../../class/db_conexion.php';
require_once __DIR__ . '/../../class/usuarios.php';
require_once __DIR__ . '/../../class/Autentificacion.php';
require_once __DIR__ . '/../../class/cifrado.php';
require_once __DIR__ . '/../../class/Roles.php';


$email = $_POST['email'];
$password = $_POST['password'];

if(!(new Autentificacion())->iniciarSesionAdmin($email, $password)){
    header('Location: ../index.php?s=iniciar-sesion');
    exit;
}



header("Location: ../index.php?s=home");
exit;

