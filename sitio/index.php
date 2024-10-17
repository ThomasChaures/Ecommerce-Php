<?php
session_start();
require_once __DIR__ . '/class/db_conexion.php';
require_once __DIR__ . '/class/productos.php';
require_once __DIR__ . '/class/Autentificacion.php';
require_once __DIR__ . '/class/cifrado.php';
require_once __DIR__ . '../init.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>
        <?= $rutaConfigurada['titulo']; ?> - Cioccobella
    </title>
</head>

<body>

    <div id="brG">
        <header class="centerG">
            <div>
                <div id="logo">
                    <h1>Cioccobella</h1>
                </div>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="index.php?s=home">Inicio</a>
                    </li>
                    <li>
                        <a href="index.php?s=listado">Catálogo</a>
                    </li>
                    <li>
                        <a href="index.php?s=contacto">Contacto</a>
                    </li>
                </ul>
            </nav>

            <div id="carritoEnvios">
                <ul>
                    <?php
                    if (isset($_SESSION['usuarios_id'])):
                        ?>
                         <li><a href="index.php?s=carrito">Carrito</a></li>
                         <li><a href="index.php?s=cuenta">Cuenta</a></li>
                        <li>
                            <form id="formIndex" action="accion/cerrar-sesion.php" method="post">
                                <button type="submit">Cerrar Sesión</button>
                            </form>
                        </li>

                       
                        <?php
                    elseif (!isset($_SESSION['usuarios_id'])):
                        ?>
                        <li> <a href="index.php?s=iniciar-sesion">Iniciar Sesión/Registrarse</a></li>
                        <?php
                    endif;
                    ?>
                </ul>

            </div>

        </header>
    </div>

    <main>
        <?php
        require __DIR__ . '/vistas/' . $ruta . '.php';
        ?>
    </main>

    <footer>
        <div>
            <div class="futC">
                <div class="tF">
                    <p class="tituloFooter">Cioccobella</p>
                </div>

                <div class="tF">
                    <p>Pastelería Profesional - Cioccobella</p>
                </div>

                <div class="tF">
                    <a class="tituloFooter" href="https://www.instagram.com/" target="_blank">Instagram</a></li>
                </div>


            </div>
        </div>
    </footer>

</body>

</html>