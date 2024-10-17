<?php

require_once __DIR__ . '/../class/usuarios.php';

$ruta = $_GET['s'] ?? 'home';

$listaRutas = [
    'home' => [
        'titulo' => 'Tablero Principal', 
        'aut' => 'true'    
    ],
        
     
     'listado' => [
        'titulo' => 'Administración de productos', 
        'aut' => 'true'     ],

        'iniciar-sesion' => [
         'titulo' => 'Inicio de Sesion' ],
        
     'listado-nuevo' => [
        'titulo' => 'Publicar Nuevo Producto', 
        'aut' => 'true'     ],

      'producto-eliminar' => [
        'titulo' => 'Eliminar producto', 
        'aut' => 'true'     ],

        'producto-editar' => [
         'titulo' => 'Editar producto', 
         'aut' => 'true'     ],

         'usuarios' => [
            'titulo' => 'Administracion de usuarios', 
            'aut' => 'true'     ],

            
            'historial' => [
                'titulo' => 'Compras Realizadas', 
                'aut' => 'true'     ],
     '404' => [
        'titulo' => 'Pagina no Encontrada', 
        'aut' => 'true'     ],
];

if (!isset($listaRutas[$ruta])) {
    $ruta = '404';
}

$rutaConfigurada = $listaRutas[$ruta];

$usuario = new usuarios();
$rol = 0;

if(isset($_SESSION['usuarios_id'])){
    $rol = $usuario->obtenerRolFkPorID($_SESSION['usuarios_id']);
}

$aut = $rutaConfigurada['aut'] ?? false;
if($aut && !isset($_SESSION['usuarios_id'])){
    $_SESSION['mError'] = "Para acceder a esta seccion se requiere estar autenticado.";
    header("Location: index.php?s=iniciar-sesion");
    exit;
}else if($rol == 2){
    $_SESSION['mError'] = "Para acceder a esta seccion se requiere estar autenticado.";
    header("Location: index.php?s=iniciar-sesion");
    exit;
}



