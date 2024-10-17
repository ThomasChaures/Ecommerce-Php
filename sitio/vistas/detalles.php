<?php

require_once __DIR__ . '/../class/db_conexion.php';
require_once __DIR__ . '/../class/usuarios.php';
require_once __DIR__ . '/../class/productos.php';
require_once __DIR__ . '/../class/Autentificacion.php';
require_once __DIR__ . '/../class/cifrado.php';


$autenticado = new Autentificacion();


?>

<section id="detalles">
    <h2>Detalles</h2>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $productosInstance = new productos();
        $producto = $productosInstance->porId($id);

        if ($producto !== null) {
    ?>
            <div>
                <div class="dTails">
                   <div class="marco">
                   <img class="imgList" src="<?= 'img/imgProductos/' . $producto->getImgProducto() ?>" alt="<?= $producto->getAltImgProducto() ?>">
                   </div>
                    <div class="ajus">
                        <h3><?= $producto->getNombreProducto(); ?></h3>
                        <p><span class="bold">Precio: </span>$<?= $producto->getPrecioProducto(); ?></p>
                        <p><span class="bold">Descripción: </span><?= $producto->getDescripcionProducto(); ?></p>
                        <p><span class="bold">Detalles: </span><?= $producto->getDetallesProducto(); ?>.</p>
                        <form class="aCarrito" action="accion/agregarCarrito.php" method="post">
                            <input type="hidden" name="idProducto" value="<?= $producto->getProductosId(); ?>">
                            <input type="hidden" name="cantidad" value="1" >
                            <input type="hidden" name="usuarios_id" value="<?=$autenticado->obtenerId(); ?>">                        
                  
                            <button class="buttin" >Agregar Carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        } else {
            echo "<p> class='cenT'> Producto no encontrado. </p>";
        }
    } else {
        ?>
        <p class='cenT' id="pDetails">Debe seleccionar un producto en la sección "Listado", tocando el siguiente botón puede acceder a ella.
        <div>
            <div class="center">
                <div id="labs">
                    <?php
                    if (!empty($listaDeProductos) && count($listaDeProductos) >= 3) {
                        for ($i = 0; $i < 3; $i++) {
                            $producto = $listaDeProductos[$i];
                    ?>
                            <div class="card">
                                <div>
                                    <h3 class="tit3"><?= $producto->getNombreProducto() ?></h3>
                                </div>
                                <div>
                                    <img class="imgCard" src="<?= 'data/img/' . $producto->getImgProducto() ?>" alt="<?= $producto->getAltImgProducto() ?>">
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No se encontraron productos destacados.";
                    }
                    ?>
                </div>
            </div>
        </div>
        </p>

    <?php
    }
    ?>
    <div class="butClas">
        <a class="button" href="index.php?s=listado">Volver a productos</a>
    </div>
</section>