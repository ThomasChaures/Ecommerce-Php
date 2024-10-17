<?php

require_once __DIR__ . '/db_conexion.php';

class productos
{
    protected int $productos_id;
    protected int $usuarios_fk;
    protected string $nombre_producto;
    protected int $precio_producto;
    protected string $descripcion_producto;
    protected string $img_producto;
    protected string $alt_img_producto;
    protected string $detalles_producto;

    public function todas(): array
    {
        $db = new DBconexion();
        $db = $db->getDB();
        $query = "SELECT * FROM Productos";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, productos::class);

        return $stmt->fetchAll();
    }

    public function porId(int $productos_id): ?productos
    {
        $db = new DBconexion();
        $db = $db->getDB();
        $query = "SELECT * FROM Productos
                  WHERE productos_id = :productos_id";
        $stmt = $db->prepare($query);
        $stmt->execute(['productos_id' => $productos_id]); 
    
        $stmt->setFetchMode(PDO::FETCH_CLASS, productos::class);
    
        $producto = $stmt->fetch();
    
        if (!$producto) return null;
    
        return $producto;
    }


    public function getProductosId(): int
    {
        return $this->productos_id;
    }


    public function getUsuariosFk(): int
    {
        return $this->usuarios_fk;
    }


    public function getNombreProducto(): string
    {
        return $this->nombre_producto;
    }


    public function getPrecioProducto(): int
    {
        return $this->precio_producto;
    }


    public function getDescripcionProducto(): string
    {
        return $this->descripcion_producto;
    }


    public function getImgProducto(): string
    {
        return $this->img_producto;
    }


    public function getAltImgProducto(): string
    {
        return $this->alt_img_producto;
    }


    public function getDetallesProducto(): string
    {
        return $this->detalles_producto;
    }

    public function setProductosId(int $productos_id): void
    {
        $this->productos_id = $productos_id;
    }

    public function setUsuariosFk(int $usuarios_fk): void
    {
        $this->usuarios_fk = $usuarios_fk;
    }

    public function setNombreProducto(string $nombre_producto): void
    {
        $this->nombre_producto = $nombre_producto;
    }

    public function setPrecioProducto(int $precio_producto): void
    {
        $this->precio_producto = $precio_producto;
    }

    public function setDescripcionProducto(string $descripcion_producto): void
    {
        $this->descripcion_producto = $descripcion_producto;
    }

    public function setImgProducto(string $img_producto): void
    {
        $this->img_producto = $img_producto;
    }

    public function setAltImgProducto(string $alt_img_producto): void
    {
        $this->alt_img_producto = $alt_img_producto;
    }

    public function setDetallesProducto(string $detalles_producto): void
    {
        $this->detalles_producto = $detalles_producto;
    }

    public function crear(array $data): void
    {
        $db = (new DBconexion())->getDB();
        $query = "INSERT INTO Productos (usuarios_fk, nombre_producto, descripcion_producto, detalles_producto, alt_img_producto, precio_producto, img_producto)
            VALUES (:usuarios_fk, :nombre_producto, :descripcion_producto, :detalles_producto, :alt_img_producto, :precio_producto, :img_producto)";

            $stmt = $db->prepare($query);
            $stmt->execute([
                'usuarios_fk' => $data['usuarios_fk'],
                'nombre_producto' => $data['nombre_producto'],
                'descripcion_producto' => $data['descripcion_producto'], 
                'detalles_producto' => $data['detalles_producto'],
                'alt_img_producto' => $data['alt_img_producto'],
                'precio_producto' => $data['precio_producto'],
                'img_producto' => $data['img_producto'],
            ]);
    }

    public function eliminar(int $id): void
    {
        $db = (new DBconexion())->getDB();
        $query = "DELETE FROM Productos
                  WHERE productos_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
    }

    public function editar(int $id, array $data): void
    {
        $db = (new DBconexion())->getDB();
        $query = "UPDATE Productos
                  SET nombre_producto = :nombre_producto,
                      descripcion_producto = :descripcion_producto,
                      img_producto = :img_producto,
                      detalles_producto = :detalles_producto,
                      alt_img_producto = :alt_img_producto,
                      precio_producto = :precio_producto
                  WHERE productos_id = :productos_id";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'nombre_producto' => $data['nombre_producto'],
            'descripcion_producto' => $data['descripcion_producto'],
            'img_producto' => $data['img_producto'],
            'detalles_producto' => $data['detalles_producto'],
            'alt_img_producto' => $data['alt_img_producto'],
            'precio_producto' => $data['precio_producto'],
            'productos_id' => $id
        ]);
    }
    

}
