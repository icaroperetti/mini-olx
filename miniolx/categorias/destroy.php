<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    use App\dao\CategoriaDAO;

    $id = $_GET['id'];

    $return = CategoriaDAO::delete($id);

    header('location: /categorias/');
?>