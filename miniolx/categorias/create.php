<?php
    require_once('../src/dao/categoriaDAO.php');

    $nome = $_POST['nome'];

    $return = CategoriaDao::create($nome);

    header('location: /categorias/index.php');

?>