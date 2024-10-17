<?php
session_start();
require_once __DIR__ . '../../class/db_conexion.php';
require_once __DIR__ . '../../class/productos.php';
require_once __DIR__ . '../../class/cifrado.php';
require_once __DIR__ . '../../class/Autentificacion.php';
require_once __DIR__ . '../init.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?= $rutaConfigurada['titulo']; ?> - Panel de Administración</title>
</head>


<body>

    <header>
        <div class="center">
            <div>
                <p>Panel de Administración</p>
            </div>
        </div>
        <nav>
            <?php
          if(isset($_SESSION['usuarios_id'])):
            ?>
            <ul>
                <li>
                    <a href="index.php?s=home">Tablero</a>
                </li>
                <li>
                    <a href="index.php?s=usuarios">Usuarios</a>
                </li>
                <li>
                    <a href="index.php?s=listado">Productos</a>
                </li>
                <li>
                    <form action="acciones/cerrar-sesion.php" method="post">
                        <button type="submit">Cerrar Sesion</button>
                    </form>
                </li>
            </ul>
            <?php
            endif;
            ?>
        </nav>

    </header>



    <main>

        <?php
            if(isset($_SESSION['mensajeExito'])):
        ?>
        <div>
            <p><?= $_SESSION['mensajeExito'] ?></p>
        </div>
        <?php
            unset($_SESSION['mensajeExito']);
        endif;
        ?>

        <?php
        require __DIR__ . '/vistas/' . $ruta . '.php';
        ?>
    </main>

    <footer>
        <div class="center">
            <div class="futC">
                <div class="tF">
                    <p class="tituloFooter">Panel de Administración</p>
                </div>



            </div>
        </div>
    </footer>

</body>

</html>