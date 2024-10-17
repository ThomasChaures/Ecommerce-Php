<?php

class Carrito
{

    protected int $id_carrito;

    protected int $usuarios_fk;



    public function crearCarrito(int $usuarios_fk)
    {
        $db = (new DBconexion())->getDB();
        $query = "INSERT INTO carrito (usuarios_fk) VALUES (:usuarios_fk)";
        $stmt = $db->prepare($query);
        $stmt->execute(['usuarios_fk' => $usuarios_fk]);
    }

    public function obtenerCarritoPorId(int $usuario_fk): ?int
    {
        $db = (new DBconexion)->getDB();
        $query = "SELECT id_carrito FROM carrito 
                WHERE usuarios_fk = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$usuario_fk]);
        $id_carrito = $stmt->fetchColumn();

        if (!$id_carrito)
            return null;

        return $id_carrito;
    }

    public function obtenerProductosDelCarrito($id_carrito): array
    {
        $db = (new DBconexion())->getDB();
        $query = "SELECT pc.productos_fk, p.nombre_producto, SUM(pc.cantidad) AS cantidad_total, 
        p.precio_producto * SUM(pc.cantidad) AS precio_total, p.img_producto, p.alt_img_producto
        FROM productos_carritos pc
        INNER JOIN productos p ON pc.productos_fk = p.productos_id
        WHERE pc.carrito_fk = ?
        GROUP BY pc.productos_fk, p.nombre_producto, p.precio_producto, p.img_producto, p.alt_img_producto ";
        $stmt = $db->prepare($query);
        $stmt->execute([$id_carrito]);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $productos;
    }

    public function eliminarProductosDelCarrito($id_carrito): void
{
    $db = (new DBconexion())->getDB();
    $query = "DELETE FROM productos_carritos WHERE carrito_fk = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$id_carrito]);
}

   



    public function setIdCarrito(int $id_carrito): void
    {
        $this->id_carrito = $id_carrito;
    }

    public function getIdCarrito(): int
    {
        return $this->id_carrito;
    }

    public function setUsuariosFk(int $usuario_fk): void
    {
        $this->usuarios_fk = $usuario_fk;
    }

    public function getUsuariosFk(): int
    {
        return $this->usuarios_fk;
    }

}

