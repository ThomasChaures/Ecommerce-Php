<?php
session_start();

require_once __DIR__ . '../../../class/db_conexion.php';
require_once __DIR__ . '../../../class/productos.php';

if(!isset($_SESSION['usuarios_id'])) {
    $_SESSION['mError'] = "Para realizar esta accion se requiere estar autenticado.";
    header("Location: index.php?s=iniciar-sesion");
    exit;
}

var_dump($_POST);

$id                 = $_GET['id'];
$nombre             = $_POST['nombre'];
$descripcion        = $_POST['descripcion'];
$detalles           = $_POST['detalles'];
$alt                = $_POST['alt'];
$precio             = $_POST['precio'];
$img                = $_FILES['imagen'];

$errores = [];

// Validación del nombre
if (empty($nombre)) {
    $errores['nombre'] = "El nombre no debe estar vacío.";
} else if (strlen($nombre) < 3) {
    $errores['nombre'] = "El nombre debe contener más de 3 caracteres.";
}

// Validación de la descripción
if (empty($descripcion)) {
    $errores['descripcion'] = "La descripción no debe estar vacía.";
}

// Validación de los detalles
if (empty($detalles)) {
    $errores['detalles'] = "Los detalles no deben estar vacíos.";
}

// Validación de la imagen
if ($img['error'] != 0) {
    $errores['imagen'] = "Debe seleccionar una imagen.";
} else {
    // Aquí puedes realizar más validaciones específicas de la imagen si es necesario
}

// Validación del atributo alt
if (empty($alt)) {
    $errores['alt'] = "El atributo alt no debe estar vacío.";
}

// Validación del precio
if (empty($precio)) {
    $errores['precio'] = "El precio no debe estar vacío.";
} else if (!is_numeric($precio) || $precio <= 0) {
    $errores['precio'] = "El precio debe ser un número positivo.";
}

// Verificar si hay errores
if (count($errores) > 0) {
    $_SESSION['mError'] = "Hay errores en el formulario. Por favor, revisa los campos y prueba de nuevo.";
    $_SESSION['errores'] = $errores;
    $_SESSION['dataForm'] = $_POST;

    header("Location: ../index.php?s=listado-nuevo");
    exit;
}

if(!empty($img['tmp_name'])) {
    $nombreImagen = date('YmdHis') . "_" . $img['name'];

    move_uploaded_file($img['tmp_name'], __DIR__ . '../../../img/imgProductos/' . $nombreImagen);
}

try{
    $producto = (new productos())->porId($_GET['id']);

    
    (new productos())->editar($id, [
        'nombre_producto' => $nombre,
        'descripcion_producto'  => $descripcion,
        'detalles_producto' => $detalles,
        'alt_img_producto' => $alt,
        'img_producto' => $nombreImagen ?? $producto->getImgProducto(),
        'precio_producto' => $precio
    ]);

    
    $_SESSION['mensajeExito'] = "El producto <b>" . $nombre . "</b> se editó correctamente.";
    header("Location: ../index.php?s=listado");
    exit;
} catch (Exception $e){
   
    header("Location: ../index.php?s=producto-editar&id=" . $id);
    $_SESSION['mError'] = "Hay errores en el formulario. Por favor, revisa los campos y prueba de nuevo.";
    $_SESSION['dataForm'] = $_POST;
    exit;
}

