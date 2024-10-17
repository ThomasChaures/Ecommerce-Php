<?php
class usuarios{
    protected int $usuarios_id;
    protected int $roles_fk;
    protected string $nombre_usuario;
    protected string $apellido_usuario;

    protected string $mail_usuario;
    protected string $pssword_usuario;

    protected string $feche_nacimiento_usuario;

    protected int $id_carrito;

    // Función que uso para que funcione el login, uso de esta: accion/registro.php. Se toman los datos del usuario con el form del archivo registro.php en la carpeta de vistas. 

    public function crear(array $data): void {
        $db = (new DBconexion())->getDB();
        $query = "INSERT INTO usuarios (nombre_usuario, apellido_usuario, mail_usuario, pssword_usuario, feche_nacimiento_usuario, roles_fk)
            VALUES (:nombre_usuario, :apellido_usuario, :mail_usuario, :pssword_usuario, :feche_nacimiento_usuario, :roles_fk)";
        
        $stmt = $db->prepare($query);
        $stmt->execute([
            'nombre_usuario' => $data['nombre_usuario'],
            'apellido_usuario' => $data['apellido_usuario'],
            'mail_usuario' => $data['mail_usuario'], 
            'pssword_usuario' => $data['pssword_usuario'],
            'feche_nacimiento_usuario' => $data['feche_nacimiento_usuario'],
            'roles_fk' => $data['roles_fk'],
        ]);      
    }

    public function emailUnico(string $email): bool {
        $db = (new DBconexion())->getDB();
        $query = "SELECT COUNT(*) as total FROM usuarios WHERE mail_usuario = :email";
        $stmt = $db->prepare($query);
        $stmt->execute(['email' => $email]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'] == 0;
    }
    public function todas(): array
    {
        $db = new DBconexion();
        $db = $db->getDB();
        $query = "SELECT * FROM usuarios";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, usuarios::class);

        return $stmt->fetchAll();
    }

    public function obtenerIdPorMail(string $mail_usuario): ?int
{
    $db = (new DBconexion)->getDB();
    $query = "SELECT usuarios_id FROM usuarios
                WHERE mail_usuario = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$mail_usuario]);

    $id = $stmt->fetchColumn();

    if (!$id) return null;
    return $id;
}


public function obtenerRolFkPorID(int $id): ?int
{
    $db = (new DBconexion)->getDB();
    $query = "SELECT roles_fk FROM usuarios
                WHERE usuarios_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);

    $id = $stmt->fetchColumn();

    if (!$id) return null;
    return $id;
}


public function porId(string $id): ?self
{
    $db = (new DBconexion)->getDB();
    $query = "SELECT * FROM usuarios
                WHERE usuarios_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, usuarios::class);

    $usuario = $stmt->fetch();

    if (!$usuario) return null;
    return $usuario;
        
    
}


    public function porEmail(string $mail_usuario): ?self
    {
        $db = (new DBconexion)->getDB();
        $query = "SELECT * FROM usuarios
                    WHERE mail_usuario = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$mail_usuario]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, usuarios::class);

        $usuario = $stmt->fetch();

        if (!$usuario) return null;
        return $usuario;
            
        
    }

        // Setters
    public function setUsuariosId(int $usuarios_id): void {
        $this->usuarios_id = $usuarios_id;
    }

    public function setRolesFk(int $roles_fk): void {
        $this->roles_fk = $roles_fk;
    }

    public function setNombreUsuario(string $nombre_usuario): void {
        $this->nombre_usuario = $nombre_usuario;
    }

    public function setApellidoUsuario(string $apellido_usuario): void {
        $this->apellido_usuario = $apellido_usuario;
    }

    public function setMailUsuarios(string $mail_usuario): void {
        $this->mail_usuario = $mail_usuario;
    }
    public function getMailUsuarios(): string {
        return $this->mail_usuario;
    }
    public function setPsswordUsuario(string $pssword_usuario): void {
        $this->pssword_usuario = $pssword_usuario;
    }

    public function setFechaNacimientoUsuario(string $feche_nacimiento_usuario): void {
        $this->fecha_nacimiento_usuario = $feche_nacimiento_usuario;
    }

    // Getters
    public function getUsuariosId(): int {
        return $this->usuarios_id;
    }

    public function getRolesFk(): int {
        return $this->roles_fk;
    }

    public function getNombreUsuario(): string {
        return $this->nombre_usuario;
    }

    public function getApellidoUsuario(): string {
        return $this->apellido_usuario;
    }

  

    public function getPsswordUsuario(): string {
        return $this->pssword_usuario;
    }

    public function getFechaNacimientoUsuario(): string {
        return $this->feche_nacimiento_usuario;
    }

}


