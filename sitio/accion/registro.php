<?php
session_start();
require_once __DIR__ . '/../class/db_conexion.php';
require_once __DIR__ . '/../class/usuarios.php';
require_once __DIR__ . '/../class/Carrito.php';
require_once __DIR__ . '/../class/cifrado.php';


// Capturo los datos del usuario

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$mail = $_POST['mail'];
$password = $_POST['password']; 
$fechaDeNacimiento = $_POST['fecha_nacimiento'];


$user = new usuarios();


$errores = [];

if (empty($nombre)) {
    $errores['nombre'] = "El nombre no debe estar vacío.";
} else if (strlen($nombre) < 3) {
    $errores['nombre'] = "El nombre debe contener más de 3 caracteres.";
}

if (empty($apellido)) {
    $errores['apellido'] = "El apellido no debe estar vacío.";
} else if (strlen($apellido) < 3) {
    $errores['apellido'] = "El apellido debe contener más de 3 caracteres.";
}

if(empty($mail)){
    $errores['mail'] = "El mail no debe estar vacío.";
}

$mailUnico = $user->emailUnico($mail);

if(!$mailUnico){
    $errores['mailUnico'] = "Este mail ya es exitente en la pagina. Por favor use otro.";
}

if(empty($password)){
    $errores['password'] = "Debes poner una contraseña por seguridad.";
}

$edadMinima = 18;

$fechaActual = new DateTime();

$fechaNacimientoObj = new DateTime($fechaDeNacimiento);

$edad = $fechaNacimientoObj->diff($fechaActual)->y;

if(empty($fechaDeNacimiento)){
    $errores['fecha'] = "Debes poner una fecha de nacimiento para validar tu edad.";
}else if($edad < $edadMinima){
    $errores['fecha'] = "Debes ser mayor de 18 años para registrarte.";
}

if (count($errores) > 0) {
    $_SESSION['mError'] = "Hay errores en el formulario. Por favor, revisa los campos y prueba de nuevo.";
    $_SESSION['errores'] = $errores;
    header("Location: ../index.php?s=registro");
    exit;
}



$cifrado = new Cifrado();
$pwHash = $cifrado->hashearPassword($password);

// Funcion usuario->crear(), con el metodo post se rescatan los datos ingresados y estos se poenen de argumento en el array de datos de la funcion.
// Si anteriormente no hubo errores este no realiza el registro. Pero si lo hace, los datos se guradan en la base de datos, en la tabla de usuarios.

try {
    $usuario = new usuarios();
    $usuario->crear([
        'nombre_usuario' => $nombre,
        'apellido_usuario' => $apellido,
        'mail_usuario' => $mail,
        'pssword_usuario' => $pwHash,
        'feche_nacimiento_usuario' => $fechaDeNacimiento,
        'roles_fk' => 2,
    ]);

   $id = $usuario->obtenerIdPorMail($mail);

   $carrito = new Carrito();
   $carrito->crearCarrito($id);

   $id = $usuario->obtenerIdPorMail($mail);

   $rol = $usuario->obtenerRolFkPorID($id);
  
   $_SESSION['rol'] = $rol;
   $_SESSION['usuarios_id'] = $id;
   $_SESSION['registro'] = 'Su cuenta se creo satisfactoriamente.';  
header("Location: ../index.php?s=home");
exit;
}catch (Exception $e){
    $_SESSION['mError'] = "Hay errores en el formulario. Por favor. revisa los campos y proba de nuevo.";
    header("Location: ../index.php?s=registro");
exit;
}