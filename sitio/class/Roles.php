<?php 
class Roles {
    protected int $roles_id;
    protected string $roles;

    public function obtenerPorId(int $roles_fk): ?string
    {
        $db = (new DBconexion)->getDB();
        $query = "SELECT roles FROM roles
                    WHERE roles_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$roles_fk]);
    
        $rol = $stmt->fetchColumn();
    
        if (!$rol) return null;
        return $rol;
    }
    public function obtenerIdPorRol(string $nombreRol): ?int
{
    $db = (new DBconexion)->getDB();
    $query = "SELECT roles_id FROM roles
                WHERE roles = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$nombreRol]);

    $idRol = $stmt->fetchColumn();

    if (!$idRol) return null;
    return (int) $idRol;
}

    
    public function getRolesId(): int {
        return $this->roles_id;
    }

    public function setRolesId(int $roles_id): void {
        $this->roles_id = $roles_id;
    }
    public function getRoles(): string {
        return $this->roles;
    }
    public function setRoles(string $roles): void {
        $this->roles = $roles;
    }
}