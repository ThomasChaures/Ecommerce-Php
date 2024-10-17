<?php
require_once __DIR__ . '/../class/db_conexion.php';
require_once __DIR__ . '/../class/usuarios.php';
require_once __DIR__ . '/../class/productos.php';
require_once __DIR__ . '/../class/Autentificacion.php';
require_once __DIR__ . '/../class/cifrado.php';
require_once __DIR__ . '/../class/Carrito.php';
require_once __DIR__ . '/../class/Compras.php';


$autenticado = new Autentificacion();
$usuarioID = $autenticado->obtenerId();



$usuarios = new usuarios();
$elUsuario = $usuarios->porId($usuarioID);

if (isset($_SESSION["mensajeExito"])) {
    echo '<p class="mensaje-exito">' . $_SESSION['mensajeExito'] . '</p>';
    unset($_SESSION['mensajeExito']);
}

$compras = new Compras();
$historial = $compras->obtenerHistorialComprasUsuario($usuarioID);


?>


<section class="productosS">

    <h2>Datos de la cuenta</h2>

    <div class="datos">
        
    <ul>
        <li><span class="bold">Nombre:</span>
            <?= $elUsuario->getNombreUsuario() ?>
        </li>
        <li><span class="bold">Apellido:</span> <?= $elUsuario->getApellidoUsuario(); ?></li>
        <li><span class="bold">Fecha de nacimiento:</span> <?= $elUsuario->getFechaNacimientoUsuario(); ?></li>
    </ul>
    </div>


    <div>
        <h2>Historial de compras</h2>

        <div class="tabla">
        <?php
        if (!empty($historial)):
            ?>
<div class="overFlow">
    
<table>
                <thead>
                    <tr>
                        <th>Numero de Compra</th>
                        <th>Productos Comprados</th>
                        <th>Monto de la Compra</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($historial as $compra): ?>
                        <tr>
                            <td>
                                <?= $compra['id_compras']; ?>
                            </td>
                            <td>
                                <?= $compra['productos_totales']; ?>
                            </td>
                            <td>
                                <?= $compra['precio_total']; ?>
                            </td>
                            <td>
                                <?= $compra['fecha']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

</div>
            <?php
        else:
            echo '<p class="vacio">Usted no cuenta con compras.</p>'
                ?>

            <?php
        endif;
        ?>
        </div>
    </div>

</section>