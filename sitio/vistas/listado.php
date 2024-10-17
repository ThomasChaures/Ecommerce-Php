<?php
require_once __DIR__ . '/../class/productos.php';  // Assuming your productos class is in a file named productos.php

$productos = new productos();
$listaDeProductos = $productos->todas();

if(isset($_SESSION["mensajeAgregado"])){
    echo '<p class="mensaje-exito">' . $_SESSION["mensajeAgregado"] . "</p>";
    unset($_SESSION['mensajeAgregado']);
}


if(isset($_SESSION["mError"])){
    echo '<p class="mensaje-error">' . $_SESSION["mError"] . "</p>";
    unset($_SESSION["mError"]);
}
?>

<section id="listado" class="center">
    <div>
        <h2>Productos</h2>
    </div>

    <div id="cL">
        <div id="contList">
            <?php
            if (!empty($listaDeProductos)) {
                foreach ($listaDeProductos as $producto) {
                    ?>
                        <div class="card">
                           <div class="imgCard">
                           <img class="imgList" src="<?= 'img/imgProductos/' . $producto->getImgProducto() ?>" alt="<?= $producto->getAltImgProducto() ?>">
                           </div>
                            <div class="marginCard">
                                <h3><?= $producto->getNombreProducto() ?></h3>
                                
                                <p>Precio: $<?= $producto->getPrecioProducto() ?></p>

                                <a class="buttin" href="index.php?s=detalles&id=<?= $producto->getProductosId() ?>">Detalles</a>
                            </div>
                        </div>
                    <?php
                }
            } else {
                echo "No hay productos disponibles.";
            }
            ?>
        </div>
    </div>
</section>
