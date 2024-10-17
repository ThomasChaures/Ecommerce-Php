<?php
require_once __DIR__ . '../../../class/productos.php';
require_once __DIR__ . '../../../class/db_conexion.php';

$productos = (new productos())->todas();
?>

<section>
    <h1>Tablero de Productos</h1>

    <div>
        <a href="index.php?s=listado-nuevo">Publicar Nuevo Producto</a>
    </div>

    <div id="tabla">
        <table class="tab1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Detalles</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Alt</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) : ?>
                    <tr>
                        <td><?= $producto->getProductosId() ?></td>
                        <td><?= $producto->getNombreProducto() ?></td>
                        <td><?= $producto->getDescripcionProducto() ?></td>
                        <td><?= $producto->getDetallesProducto() ?></td>
                        <td><?= $producto->getPrecioProducto() ?></td>
                        <td><img src="<?= '../img/imgProductos/' . $producto->getImgProducto() ?>" alt="<?= $producto->getAltImgProducto() ?>"></td>
                        <td><?= $producto->getAltImgProducto() ?></td>
                        <td>
                          <a href="index.php?s=producto-eliminar&id=<?= $producto->getProductosId();?>">Eliminar</a>
                        
                          <a href="index.php?s=producto-editar&id=<?= $producto->getProductosId();?>">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</section>