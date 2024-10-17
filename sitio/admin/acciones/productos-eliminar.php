<?php 
session_start();

require_once __DIR__ . '../../../class/db_conexion.php';
require_once __DIR__ . '../../../class/productos.php';

if(!isset($_SESSION['usuarios_id'])) {
    $_SESSION['mError'] = "Para realizar esta accion se requiere estar autenticado.";
    header("Location: index.php?s=iniciar-sesion");
    exit;
}

$id = $_GET['id'];

try {
    (new productos())->eliminar($id);
    $_SESSION['mensajeExito'] = "El producto fue borrado correctamente.";
    header("Location: ../index.php?s=listado");
}catch(Exception $e){
    $_SESSION['mError'] = "El producto no fue borrado.";
    header("Location: ../index.php?s=listado");
}

