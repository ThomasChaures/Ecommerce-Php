<?php
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



?>

<section  class="forms">
     <h2>Registrarse</h2>

    <div class="formD">
    <form action="accion/registro.php" method="post">
        <div>

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="">
        <?php
            if(isset($errores['nombre'])):
            ?>
            <div><p class="mensaje-error"><?= $errores['nombre']; ?></p></div>
            <?php
            endif; 
            ?>
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido" value="">
        <?php
            if(isset($errores['apellido'])):
            ?>
            <div><p class="mensaje-error"><?= $errores['apellido']; ?></p></div>
            <?php
            endif; 
            ?>

        </div>

        <div>

        <label for="mail">Mail</label>
        <input type="mail" name="mail" id="mail" value="">
        <?php
            if(isset($errores['mail'])):
            ?>
            <div><p class="mensaje-error"><?= $errores['mail']; ?></p></div>
            <?php
            endif; 
            ?>

<?php
            if(isset($errores['mailUnico'])):
            ?>
            <div><p class="mensaje-error"><?= $errores['mailUnico']; ?></p></div>
            <?php
            endif; 
            ?>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
        <?php
            if(isset($errores['password'])):
            ?>
            <div><p class="mensaje-error"><?= $errores['password']; ?></p></div>
            <?php
            endif; 
            ?>
        </div>

        <div>
        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="">
        <?php
            if(isset($errores['fecha'])):
            ?>
            <div><p class="mensaje-error"><?= $errores['fecha']; ?></p></div>
            <?php
            endif; 
            ?>
        </div>

        <input class="button" type="submit" value="Registrarse">
     </form>
    </div>
</section>