<?php
    require_once('../src/dao/categoriaDAO.php');
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $return = CategoriaDao::update($id,$nome);

    header('location: /categorias/');
?>