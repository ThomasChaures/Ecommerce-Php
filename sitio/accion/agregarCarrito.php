<?php
session_start();
require_once __DIR__ . '/../class/db_conexion.php';
require_once __DIR__ . '/../class/Carrito.php';
require_once __DIR__ . '/../class/productos.php';
require_once __DIR__ . '/../class/ProductosEnCarrito.php';



$producto_fk = $_POST['idProducto'];
$cantidad = $_POST['cantidad'];
$usuarios_fk = $_POST['usuarios_id'];


if(!$usuarios_fk){
    $_SESSION["mError"] = "Debes iniciar sesion para agregar productos al carrito.";
    header("Location: ../index.php?s=listado");
    exit;
}


$productos = new productos();
$producto = $productos->porId($producto_fk);



try {
    $carrito = new Carrito();
$idCarrito = $carrito->obtenerCarritoPorId($usuarios_fk);
    $productosCarrito = new ProductosEnCarrito();
    $productosCarrito->identificacionProducto($cantidad, $producto_fk, $idCarrito);
    $_SESSION["mensajeAgregado"] = 'El prducto "' . $producto->getNombreProducto() . '" se agrego a tu carrito';
    header("Location: ../index.php?s=listado");
    exit;
} catch (Exception $e) {
    $_SESSION["mError"] =  $producto->getNombreProducto() . " no se pudo agregar a tu carrito";
    header("Location: ../index.php?s=listado");
    exit;
}