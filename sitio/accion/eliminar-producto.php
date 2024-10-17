<?php
session_start();
require_once __DIR__ . '/../class/db_conexion.php';
require_once __DIR__ . '/../class/productos.php';
require_once __DIR__ . '/../class/Autentificacion.php';
require_once __DIR__ . '/../class/cifrado.php';
require_once __DIR__ . '/../class/Carrito.php';
require_once __DIR__ . '/../class/usuarios.php';
require_once __DIR__ . '/../class/ProductosEnCarrito.php';


$id_carrito = $_POST['id_carrito'];
$id_producto = $_POST['id_producto'];
$nombreProducto = $_POST['nombre'];

$pCarrito = new ProductosEnCarrito();

$eliminarP = $pCarrito->eliminarProductoDelCarrito($id_carrito, $id_producto);

$_SESSION['mensajeAgregado'] = 'El producto ' . $nombreProducto . ' fue eliminado de su carrito.';

header("Location: ../index.php?s=carrito");