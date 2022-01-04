<?php

class Database
{
    public static function conectar()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=cdr_beta;charset=utf8', 'root', '');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
        return $pdo;
    }
}
