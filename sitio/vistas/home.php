
<?php
 if(isset($_SESSION['login-cerrado'])){
    echo '<p class="mensaje-exito">' . $_SESSION['login-cerrado'] . '</p>';
    unset($_SESSION['login-cerrado']);
 }

 if(isset($_SESSION['registro'])){
    echo '<p class="mensaje-exito">' . $_SESSION['registro'] . '</p>';
    unset($_SESSION['registro']);
 }
?>

<div  id="banner">
<section id="bSec">
        <div>
        <p>Pastelería Profesional</p>
        <p id="secPb">Todas las delicias que te puedas imaginar hechas con una mano increible. No te las podes perder!</p>
       <div id="secBt">
       <div>
            <a class="button" href="index.php?s=listado">Deleitate</a>
        </div>
       </div>
        </div>

</section>
</div>






<section class="Stion">
    <div>
        <h2>Destacados</h2>
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
            <a class="button" href="index.php?s=listado">Ver más</a>
        </div>
    </div>
</section>

<div id="bannerContacto">
    
<section id="bCon" >
    <div class="center">
        <h2>Contacto</h2>
       <div id="s2Cont">
       <div id="cont">
            <p class="textos">Si tenes dudas o queres saber mas sobre las <span>contrataciones</span> no dudes en escribirnos y te responderemos en <span>menos de 48hs</span>.</p>
        </div>
        <div class="butClasAlter">
            <a class="button" href="index.php?s=contacto">Contactar</a>
        </div>
       </div>
    </div>
</section>
</div>

