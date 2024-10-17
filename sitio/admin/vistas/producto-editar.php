<?php


require_once __DIR__ . '../../../class/db_conexion.php';
require_once __DIR__ . '../../../class/productos.php';

$producto = (new productos())->porId($_GET['id']);

if(isset($_SESSION['errores'])){
    $errores = $_SESSION['errores'];
    unset($_SESSION['errores']);
} else {
    $errores = [];
}

if(isset($_SESSION["mError"])){
    echo '<p class="mensaje-error">' . $_SESSION['mError'] . '</p>';
    unset( $_SESSION['mError'] );
}

if(isset($_SESSION['dataForm'])){
    $dataForm = $_SESSION['dataForm'];
    unset($_SESSION['dataForm']);
} else {
    $dataForm = [];
} 
?>


<section>
    <h1>Editar Producto: <?= $producto->getNombreProducto(); ?> </h1>

    <form action="acciones/productos-editar.php?id=<?= $producto->getProductosId();?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="nombre">Nombre del Producto</label>
            <input type="text" id="nombre" name="nombre" value="<?= $producto->getNombreProducto(); ?>" >
            <?php
            if(isset($errores['nombre'])):
            ?>
            <div class="mensaje-error"><p><?= $errores['nombre']; ?></p></div>
            <?php
            endif; 
            ?>
        </div>
        <div>
            <label for="descripcion">Descripcion del Producto</label>
            <textarea id="descripcion" name="descripcion"><?= $producto->getDescripcionProducto();?></textarea>
            <?php
            if(isset($errores['descripcion'])):
            ?>
            <div class="mensaje-error"><p><?= $errores['descripcion']; ?></p></div>
            <?php
            endif; 
            ?>
        </div>
        <div>
            <label for="detalles">Detalles del Producto</label>
            <input type="text" id="detalles" name="detalles" value="<?= $producto->getDetallesProducto();?>">
            <?php
            if(isset($errores['detalles'])):
            ?>
            <div class="mensaje-error"><p><?= $errores['detalles']; ?></p></div>
            <?php
            endif; 
            ?>
        </div>
        <div>
            <p>Imagen Actual</p>
            <?php
            if(!empty($producto->getImgProducto())):
            ?>
            <img src="<?= '../img/imgProductos/' . $producto->getImgProducto(); ?>" alt="">
            <?php 
            else:
            ?>
            <p>No tiene una imagen.</p>
            <?php
            endif;
            ?>
        </div>
        <div>
            <label for="imagen">Imagen del Producto</label>
            <input type="file" id="imagen" name="imagen">
        </div>
        <div>
            <label for="alt">Alt del Producto</label>
            <input type="text" id="alt" name="alt" value="<?= $producto->getAltImgProducto();?>">
            <?php
            if(isset($errores['alt'])):
            ?>
            <div class="mensaje-error"><p><?= $errores['alt']; ?></p></div>
            <?php
            endif; 
            ?>
        </div>

        <div>
            <label for="precio">Precio del Producto</label>
            <input type="number" id="precio" name="precio" value="<?= $producto->getPrecioProducto();?>">
            <?php
            if(isset($errores['precio'])):
            ?>
            <div class="mensaje-error"><p><?= $errores['precio']; ?></p></div>
            <?php
            endif; 
            ?>
        </div>

        <?php


?>

        <button type="submit">Editar</button>
    </form>
</section>