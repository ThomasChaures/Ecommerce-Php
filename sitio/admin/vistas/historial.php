<?php
require_once __DIR__ . '/../../class/db_conexion.php';
require_once __DIR__ . '/../../class/usuarios.php';
require_once __DIR__ . '/../../class/Autentificacion.php';
require_once __DIR__ . '/../../class/Carrito.php';
require_once __DIR__ . '/../../class/productos.php';
require_once __DIR__ . '/../../class/compras.php';
require_once __DIR__ . '/../../class/Roles.php';

$usuario_id = $_GET['id'];

$compras = new Compras();
$historial = $compras->obtenerHistorialComprasUsuario($usuario_id);

$usuarios = new usuarios();
$usuario = $usuarios->porId($usuario_id);

?>
<section>
    <a href="index.php?s=usuarios">Volver al tablero de usuarios</a>
    <h1>Historial de compras de <?= $usuario->getNombreUsuario() . ' ' . $usuario->getApellidoUsuario(); ?> </h1>

    <?php
if(!empty($historial)):
?>

<table>
    <thead>
        <tr>
            <th>Numero de Compra</th>
            <th>Productos Comprados</th>
            <th>Monto de la Compra</th>
            <th>Fecha de la Compra</th>
        </tr>
    </thead>
    <tbody> 
        <?php foreach($historial as $compra): ?>
            <tr>
                <td><?=$compra['id_compras'];?></td>
                <td><?=$compra['productos_totales']; ?></td>
                <td><?=$compra['precio_total'];?></td>
                <td><?=$compra['fecha'];?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
else:
    echo '<p> No cuenta con compras el usuario </p>'
?>

<?php
endif;
?>
</section>