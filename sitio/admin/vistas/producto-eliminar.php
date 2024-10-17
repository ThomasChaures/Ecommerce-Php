<?php
require_once __DIR__ . '/../../class/db_conexion.php';
require_once __DIR__ . '/../../class/productos.php';


$producto = (new productos())->porId($_GET['id']);

?>

<section>
    <h1>Confirmacion para Eliminar Producto</h1>

    <p>Estas por eliminar el siguiente producto y se necesita una confirmacion para hacerlo:</p>

    <article>
        <div>
            <h2><?= $producto->getNombreProducto();?></h2>
            <p><?= $producto->getDescripcionProducto();?></p>
            <img src="../img/imgProductos/<?= $producto->getImgProducto();?>" alt="<?= $producto->getAltImgProducto();?>">
            <p><?= $producto->getDetallesProducto();?></p>
            <p><?= $producto->getPrecioProducto();?></p>
        </div>
    </article>

    <hr>

    <h2>Confirmacion</h2>
                            <form action="acciones/productos-eliminar.php?id=<?= $producto->getProductosId();?>" method="post">
                                <button type="submit" class="eliminar-button">Confirmar eliminacion</button>
                            </form>
</section>