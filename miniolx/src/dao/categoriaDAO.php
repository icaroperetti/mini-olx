<?php

namespace App\dao;

use \PDO;
use App\utils\ConnectionFactory;


class CategoriaDao
{

    public static function getAll()
    {
        $con = ConnectionFactory::getConnection();

        $stmt = $con->prepare("SELECT * FROM categorias ");
        $stmt->execute();
        return $stmt;
    }

    public static function getById($id)
    {
        $con = ConnectionFactory::getConnection();

        $stmt = $con->prepare("SELECT * FROM categorias WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    public static function create($nome)
    {
        $con = ConnectionFactory::getConnection();

        $stmt = $con->prepare("INSERT INTO categorias  (nome) VALUES (:nome)");
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        return  $stmt->execute();
    }

    public static function update($id, $nome)
    {
        $con = ConnectionFactory::getConnection();

        $stmt = $con->prepare("UPDATE categorias SET nome=:nome WHERE id=:id");
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public static function delete($id)
    {
        $con = ConnectionFactory::getConnection();

        $stmt = $con->prepare("DELETE FROM categorias WHERE id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return  $stmt->execute();
    }
}
