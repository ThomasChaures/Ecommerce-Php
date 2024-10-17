<section  class="forms">

<?php
if(isset($_SESSION["mError"])){
    echo '<p class="mensaje-error">' . $_SESSION['mError'] . '</p>';
    unset( $_SESSION['mError'] );
}
?>
    <h2>Inicio de Sesión</h2>

    <div class="formD">
    <form action="accion/login.php" method="post">
        <div>
        <label for="mail">Mail</label>
        <input type="text" name="mail" id="mail">


        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
        </div>

        <input class="button" type="submit" value="Iniciar Sesión">
    </form>

    <div>
        <p>¿No contas con una cuenta? <a class="bold" href="index.php?s=registro">Regístrate ya mismo aquí</a>.</p>
    </div>
    </div>
</section>