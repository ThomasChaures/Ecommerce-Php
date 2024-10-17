<section>
    <div class="center">
        <div class="card">
            <h2>Error 404</h2>
            <div class="cenT">
                <div>
                    <p class="textos">¡Ups! La página que estás buscando se ha convertido en una deliciosa torta.</p>
                    <p class="textos">Por favor, regresa a la <a href="index.php?s=home">página de inicio</a> y disfruta de nuestras deliciosas creaciones.</p>
                </div>
            </div>
        </div>
    </div>

</section>


<section class="Stion">
    <div class="center">
        <h2>Recomendaciones</h2>
        <div id="labs">
        <?php
            // Instanciar la clase productos
            $productosModel = new productos();
            
            // Obtener la lista de productos
            $listaDeProductos = $productosModel->todas();

            // Verificar si hay al menos 3 productos
            if (!empty($listaDeProductos) && count($listaDeProductos) >= 3) {
                // Iterar sobre los primeros 3 productos
                for ($i = 0; $i < 4; $i++) {
                    $producto = $listaDeProductos[$i];
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
            }
            ?>
        </div>
        <div class="butClas">
            <a class="button" href="index.php?s=listado">Ver los productos</a>
        </div>
    </div>
</section>