<?php
require_once __DIR__ . '/../../class/db_conexion.php';
require_once __DIR__ . '/../../class/usuarios.php';
require_once __DIR__ . '/../../class/Autentificacion.php';
require_once __DIR__ . '/../../class/Carrito.php';
require_once __DIR__ . '/../../class/Roles.php';

$roles = new Roles();

$usuarios = (new usuarios())->todas();


?>


<section>
    <h1>Tablero de Usuarios</h1>

    <div id="tabla">
        <table class="tab1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Mail</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario):

                    $getRolFk = $usuario->getRolesFk();
                    $nombreRol = $roles->obtenerPorId($getRolFk); ?>
                    <tr>
                        <td>
                            <?= $usuario->getUsuariosId(); ?>
                        </td>
                        <td>
                            <?= $usuario->getNombreUsuario(); ?>
                        </td>
                        <td>
                            <?= $usuario->getApellidoUsuario(); ?>
                        </td>
                        <td>
                            <?= $usuario->getMailUsuarios(); ?>
                        </td>
                        <td>
                            <?= $nombreRol; ?>
                        </td>

                        <td>
                           <a class="button" href="index.php?s=historial&id=<?= $usuario->getUsuariosId(); ?>">Ver Historial de Compras</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</section>