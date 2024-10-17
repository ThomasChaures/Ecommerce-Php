<?php

class Cifrado {
    public function verificar(string $value, string $hash): bool
    {
        return password_verify($value, $hash);
    }

    public function hashearPassword($password){
        $salt = password_hash($password, PASSWORD_DEFAULT);
        return $salt;
    }
}
