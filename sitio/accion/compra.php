<?php
session_start();
require_once __DIR__ . '/../class/db_conexion.php';
require_once __DIR__ . '/../class/productos.php';
require_once __DIR__ . '/../class/Autentificacion.php';
require_once __DIR__ . '/../class/cifrado.php';
require_once __DIR__ . '/../class/Carrito.php';
require_once __DIR__ . '/../class/usuarios.php';
require_once __DIR__ . '/../class/ProductosEnCarrito.php';
require_once __DIR__ . '/../class/Compras.php';

$total_pagado = $_POST['total_pagado'];
$cantidad_total = $_POST['cantidad_total'];
$id_carrito = $_POST['id_carrito'];
$id_usuario = $_POST['id_usuario'];


$compras = new Compras();
$carrito = new Carrito();
$fecha_actual = date('Y-m-d');

try{
    $compras->guardarCompra([
        'precio_total' => $total_pagado,
        'productos_totales' => $cantidad_total,
        'carrito_fk' => $id_carrito,
        'usuarios_fk' => $id_usuario,
        'fecha' => $fecha_actual
    ]);

    $carrito->eliminarProductosDelCarrito($id_carrito);
    

    
    $_SESSION['mensajeExito'] = "Su compra se realizo con exito";
    header("Location: ../index.php?s=cuenta");
    exit;
} catch (Exception $e){
    
    $_SESSION['mError'] = 'Se produjo un error con su compra';
    header("Location: ../index.php?s=carrito");
    exit;
}
