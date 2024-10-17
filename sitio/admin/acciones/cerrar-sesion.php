<?php
require_once __DIR__ . '/../../class/Autentificacion.php';
session_start();

(new Autentificacion())->cerrarSesion();


header('Location: ../index.php?s=home');
exit;


