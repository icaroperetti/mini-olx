<?php
    require_once('../src/dao/categoriaDAO.php');

    $id = $_GET['id'];

    $return = CategoriaDao::delete($id);

    header('location: /categorias/');
?>