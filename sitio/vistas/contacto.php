<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    $usuario = new Usuario($nombre, $email, $mensaje);

    if ($usuario->guardarEnArchivo()) {
        $mensajeExito = "Se envió correctamente.";
    }
}

class Usuario
{
    private $nombre;
    private $email;
    private $mensaje;

    public function __construct($nombre, $email, $mensaje)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->mensaje = $mensaje;
    }

    public function guardarEnArchivo()
    {
        $archivo = "data/guardar.txt";
        $datos = "Nombre: {$this->nombre}, Correo Electrónico: {$this->email}, Mensaje: {$this->mensaje}\n";
        return file_put_contents($archivo, $datos, FILE_APPEND) !== false;
    }
}
?>

<section class="forms">
    <h2>Contacto</h2>
    <div class="formD">
        <form action="index.php?s=contacto" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required></textarea><br><br>

            <div class="butClas">
                <input class="button" type="submit" value="Enviar">
            </div>
        </form>
    </div>

    <?php if (isset($mensajeExito)) : ?>
        <div class="mensaje-exito"><?php echo $mensajeExito; ?></div>
        
    <?php endif; ?>
</section>