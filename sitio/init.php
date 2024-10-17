<?php

$ruta = $_GET['s'] ?? 'home';

$listaRutas = [
   'home' => [
      'titulo' => 'Pagina Principal'
   ],

   'listado' => [
      'titulo' => 'Listado'
   ],

   'detalles' => [
      'titulo' => 'Detalles'
   ],

   'contacto' => [
      'titulo' => 'Contacto'
   ],

   '404' => [
      'titulo' => 'Pagina no Encontrada'
   ],

   'carrito' => [
      'titulo' => 'Carrito',
      'aut' => 'true'
   ],

   'iniciar-sesion' => [
      'titulo' => 'Iniciar Sesion'
   ],
   'registro' => [
      'titulo' => 'Registrarse'
   ], 
   'cuenta' => [
      'titulo' => 'Mi Cuenta',
      'aut' => 'true'
   ],
];

if (!isset($listaRutas[$ruta])) {
   $ruta = '404';
}

$rutaConfigurada = $listaRutas[$ruta];

$aut = $rutaConfigurada['aut'] ?? false;
if($aut && !isset($_SESSION['usuarios_id'])) {
    $_SESSION['mError'] = "Para acceder a esta seccion se requiere estar autenticado.";
    header("Location: index.php?s=iniciar-sesion");
    exit;
}