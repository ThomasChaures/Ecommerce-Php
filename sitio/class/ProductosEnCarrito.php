<?php

class ProductosEnCarrito{
    protected int $id_productos_carritos;

    protected int $cantidad;

    protected int $productos_fk;
    protected int $carrito_fk;

   

    public function eliminarProductoDelCarrito($id_carrito, $id_producto): bool
    {
        $db = (new DBconexion())->getDB();
        $query = "DELETE FROM productos_carritos WHERE carrito_fk = ? AND productos_fk = ?";
        $stmt = $db->prepare($query);
        $result = $stmt->execute([$id_carrito, $id_producto]);
        return $result;
    }

    public function identificacionProducto( int $cantidad,  int $producto, int $carrito_fk)
    {
        $db = new DBconexion();
        $db = $db->getDB();
        $query = "INSERT INTO productos_carritos (cantidad, productos_fk, carrito_fk) VALUES (:cantidad, :productos_fk, :carrito_fk)";
        $stmt = $db->prepare($query); 
        $stmt->execute([
            'cantidad' => $cantidad,
            'productos_fk' => $producto,
            'carrito_fk' => $carrito_fk,
        ]);
    }


       // Getter para $id_productos_carritos
       public function getIdProductosCarritos(): int {
        return $this->id_productos_carritos;
    }

    // Setter para $id_productos_carritos
    public function setIdProductosCarritos(int $id_productos_carritos): void {
        $this->id_productos_carritos = $id_productos_carritos;
    }

    // Getter para $cantidad
    public function getCantidad(): int {
        return $this->cantidad;
    }

    // Setter para $cantidad
    public function setCantidad(int $cantidad): void {
        $this->cantidad = $cantidad;
    }

    // Getter para $productos_fk
    public function getProductosFk(): int {
        return $this->productos_fk;
    }

    // Setter para $productos_fk
    public function setProductosFk(int $productos_fk): void {
        $this->productos_fk = $productos_fk;
    }

    // Getter para $carrito_fk
    public function getCarritoFk(): int {
        return $this->carrito_fk;
    }

    // Setter para $carrito_fk
    public function setCarritoFk(int $carrito_fk): void {
        $this->carrito_fk = $carrito_fk;
    }
}