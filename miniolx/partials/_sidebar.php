<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    use App\dao\CategoriaDAO;

    $stmt_sidebar_categoria = CategoriaDao::getAll();
?>

<aside class="col-md-3">
    <h2>Categorias</h2>
    
    <ul class="list-group pb-4">
        <?php while ($categorias = $stmt_sidebar_categoria->fetch(PDO::FETCH_OBJ)) : ?>
            <li class="list-group-item "><a href="/?categoria_id=<?=$categorias->id?>"><?= $categorias->nome ?></a></li>
        <?php endwhile ?>
    </ul>
</aside>