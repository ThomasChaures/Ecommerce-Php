<?php

class metodoPago{
    protected int $id_mp;

    protected int $tarjeta_credito;

    protected int $cpp;

    protected string $nombre_propietario;

    protected string $vencimiento;

    protected int $usuario_fk;

  // Getter para $id_mp
  public function getIdMp(): int {
    return $this->id_mp;
}

// Setter para $id_mp
public function setIdMp(int $id_mp): void {
    $this->id_mp = $id_mp;
}

// Getter para $tarjeta_credito
public function getTarjetaCredito(): int {
    return $this->tarjeta_credito;
}

// Setter para $tarjeta_credito
public function setTarjetaCredito(int $tarjeta_credito): void {
    $this->tarjeta_credito = $tarjeta_credito;
}

// Getter para $cpp
public function getCpp(): int {
    return $this->cpp;
}

// Setter para $cpp
public function setCpp(int $cpp): void {
    $this->cpp = $cpp;
}

// Getter para $nombre_propietario
public function getNombrePropietario(): string {
    return $this->nombre_propietario;
}

// Setter para $nombre_propietario
public function setNombrePropietario(string $nombre_propietario): void {
    $this->nombre_propietario = $nombre_propietario;
}

// Getter para $vencimiento
public function getVencimiento(): string {
    return $this->vencimiento;
}

// Setter para $vencimiento
public function setVencimiento(string $vencimiento): void {
    $this->vencimiento = $vencimiento;
}

// Getter para $usuario_fk
public function getUsuarioFk(): int {
    return $this->usuario_fk;
}

// Setter para $usuario_fk
public function setUsuarioFk(int $usuario_fk): void {
    $this->usuario_fk = $usuario_fk;
}

}