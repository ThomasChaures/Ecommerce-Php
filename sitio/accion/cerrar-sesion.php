<?php
require_once __DIR__ . '/../class/Autentificacion.php' ;
session_start();

(new Autentificacion())->cerrarSesion();

$_SESSION['login-cerrado'] = 'Se cerro la sesion con exito';


header('Location: ../index.php?s=home');
exit;


