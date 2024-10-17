<?php



class Autentificacion // me dio paja modificar el nombre ya se q no se escribe asi :)
{



    protected ?usuarios $usuario; // ni idea esta variable la hizo el profesor, creo q es para protejer el dato del usuario


    // La funcion esta toma el mail y la psswrd, adentro de esta se llama a la clase usuario para buscar la persona por su mail. 

    public function iniciarSesion(string $email, string $password): bool
    {
        $usuario = (new usuarios())->porEmail($email);

        // si usuario no existe devuelve false (no inicia)

        if (!$usuario) {
            $_SESSION['mError'] = "Usuario no encontrado. Verifica tu email.";
          return false;
        }

        // con una funcion de php se verifica la contra, si esta esta mal se devuelve false (no inicia)
        
        if (!(new Cifrado())->verificar($password, $usuario->getPsswordUsuario())) {
            $_SESSION['mError'] = "Contraseña incorrecta. Intenta de nuevo.";
            return false;
        }

        // ya habiendo pasado estas dos, con una variable de tipo SESSION se toma un dato vital del usuairo,
        // como el id, para reconocerlo mientras este "conectado"
        
        $_SESSION['usuarios_id'] = $usuario->getUsuariosId();
        return true;
    }

    public function iniciarSesionAdmin(string $email, string $password): bool
    {
        $usuario = (new usuarios())->porEmail($email);
    
        if (!$usuario) {
            $_SESSION['mError'] = "Usuario no encontrado. Verifica tu email.";
            return false;
        }
        
        $usuario_id = (new usuarios())->obtenerIdPorMail($email);
    
        if (!$usuario_id) {
            $_SESSION['mError'] = "Usuario no encontrado. Verifica tu email.";
            return false;
        }
    
        $rolFk = (new usuarios())->obtenerRolFkPorID($usuario_id);
    
        if (!(new Cifrado())->verificar($password, $usuario->getPsswordUsuario())) {
            $_SESSION['mError'] = "Contraseña incorrecta. Intenta de nuevo.";
            return false;
        }
    
        if($rolFk != 1){
            $_SESSION['mError'] = "Usted no es un Administrador.";
            return false;
        }
        
        $_SESSION['usuarios_id'] = $usuario->getUsuariosId();
        return true;
    }


    // Para cerrar la sesion, existe esta funcion que borra lo que contiene la variable. 

    public function cerrarSesion(): void
    {
        unset($_SESSION["usuarios_id"]);
    }

    public function estadoAutenticado(): bool
    {
        return isset($_SESSION['usuarios_id']);
    }

    public function obtenerId(): ?int
    {
        return $this->estadoAutenticado() ? $_SESSION['usuarios_id'] : null;
    }

    public function obtenerUsuario(): ?usuarios
    {
        if(!$this->estadoAutenticado()) return null;

        if(!$this->usuario){
            $usuario = (new usuarios())->porId($this->obtenerId());
        }

      

        return $usuario;
    }

    
}