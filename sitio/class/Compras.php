<?php

class Compras {
    protected int $id_compras;
    protected int $precio_total;
    protected int $productos_totales;
    protected int $carrito_fk;
    protected int $usuario_fk;

    protected string $fecha;

    public function guardarCompra(array $data): void{
        $db = (new DBconexion())->getDB();
        $query = "INSERT INTO compras (precio_total, productos_totales, carrito_fk, usuarios_fk, fecha) VALUES (:precio_total, :productos_totales, :carrito_fk, :usuarios_fk, :fecha)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'precio_total' => $data['precio_total'],
            'productos_totales' => $data['productos_totales'], 
            'carrito_fk' => $data['carrito_fk'],
            'usuarios_fk' => $data['usuarios_fk'],
            'fecha' => $data['fecha']
        ]);
    
    }

    
    public function obtenerHistorialComprasUsuario($id_usuario): array {
        $db = (new DBconexion())->getDB();
        $query = "SELECT * FROM compras WHERE usuarios_fk = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id_usuario]);
        $compras = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $compras;
    }

    public function getIdCompras(): int {
        return $this->id_compras;
    }

    public function setIdCompras(int $id_compras): void {
        $this->id_compras = $id_compras;
    }

    public function getPrecioTotal(): int {
        return $this->precio_total;
    }

    public function setPrecioTotal(int $precio_total): void {
        $this->precio_total = $precio_total;
    }

    public function getProductosTotales(): int {
        return $this->productos_totales;
    }

    public function setProductosTotales(int $productos_totales): void {
        $this->productos_totales = $productos_totales;
    }

    public function getCarritoFk(): int {
        return $this->carrito_fk;
    }

    public function setCarritoFk(int $carrito_fk): void {
        $this->carrito_fk = $carrito_fk;
    }

    public function getUsuarioFk(): int {
        return $this->usuario_fk;
    }

    public function setUsuarioFk(int $usuario_fk): void {
        $this->usuario_fk = $usuario_fk;
    }
}