<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    use App\dao\CategoriaDAO;

    $nome = $_POST['nome'];

    $return = CategoriaDao::create($nome);

    header('location: /categorias/index.php');

?>