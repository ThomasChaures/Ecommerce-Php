<?php

if(isset($_SESSION["mError"])){
    echo '<p class="mensaje-error">' . $_SESSION['mError'] . '</p>';
    unset( $_SESSION['mError'] );
}


?>

<section>
    <h1>Ingresar al Panel de Administracion</h1>

    <form action="acciones/iniciar-sesion.php" method="post">
        <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <button type="submit">Ingresar</button>
    </form>
</section>