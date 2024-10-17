<?php
require_once __DIR__ . '/../class/db_conexion.php';
require_once __DIR__ . '/../class/productos.php';
require_once __DIR__ . '/../class/Autentificacion.php';
require_once __DIR__ . '/../class/cifrado.php';
require_once __DIR__ . '/../class/Carrito.php';
require_once __DIR__ . '/../class/usuarios.php';
require_once __DIR__ . '/../class/ProductosEnCarrito.php';

$autenticado = new Autentificacion();
$id_usuario = $autenticado->obtenerId();

$carrito = new Carrito();
$carrito_del_usuario = $carrito->obtenerCarritoPorId($id_usuario);
$productosCarrito = $carrito->obtenerProductosDelCarrito($carrito_del_usuario);

$montoTotal = 0;
$cantidadTotal = 0;

if (!empty($productosCarrito)) {
    foreach ($productosCarrito as $producto) {
        $montoTotal += $producto['precio_total'];
        $cantidadTotal += $producto['cantidad_total'];
    }
}

if(isset($_SESSION["mensajeAgregado"])){
    echo '<p class="mensaje-exito">' . $_SESSION["mensajeAgregado"] . "</p>";
    unset($_SESSION['mensajeAgregado']);
}


?>
<section id="carr" class="productosS" >
    <h2>Carrito</h2>
    <div class="tabla">

        <?php if (!empty($productosCarrito)): ?>
           <div class="overFlow">
           <table>
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
            <?php foreach ($productosCarrito as $producto): ?>
               
                    <tbody>
                        <tr>
                            <td><img src="<?= 'img/imgProductos/' . $producto['img_producto']; ?>" width="40px"
                                    alt="<?= $producto['alt_img_producto']; ?>"></td>
                            <td>
                                <?= $producto['nombre_producto']; ?>
                            </td>
                            <td>
                                $<?= $producto['precio_total']; ?>
                            </td>
                            <td>
                                <?= $producto['cantidad_total']; ?>
                            </td>
                            <td>
                                <form action="accion/eliminar-producto.php" method="post">
                                    <input type="text" hidden name="id_carrito" value="<?= $carrito_del_usuario; ?>">
                                    <input type="text" hidden name="id_producto" value="<?= $producto['productos_fk']; ?>">
                                    <input type="text" hidden name="nombre" value="<?= $producto['nombre_producto']; ?>">
                                    <input class="buttin" type="submit" value="Eliminar">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
           </div>
            
  <div class="pInfo">
  <p class="bold">La cantidad total de prductos es:
        <?= $cantidadTotal; ?>
    </p>
    <p class="bold">El total a pagar es: $
        <?= $montoTotal; ?>
    </p>
  </div>
            <form action="accion/compra.php" method="post">
    <input type="text" hidden name="total_pagado" id="total_pagado" value="<?= $montoTotal; ?>">
    <input type="text" hidden name="cantidad_total" id="cantidad_total" value="<?= $cantidadTotal; ?>">
    <input type="text" hidden name="id_carrito" value="<?= $carrito_del_usuario; ?>">
    <input type="text" hidden name="id_usuario" value="<?= $id_usuario; ?>">

        <input class="button" type="submit" value="Comprar Productos">
    </form>
        <?php else: ?>
            <p class="vacio">El carrito está vacío</p>
        <?php endif; ?>

    </div>




</section>