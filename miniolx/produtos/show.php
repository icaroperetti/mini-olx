<?php   

    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php'; 

    use App\dao\CategoriaDAO;
    use App\dao\ProdutoDAO;
    

    $id = $_GET['id'];


    $stmt_cat = CategoriaDao::getAll();

    $stmt_prod = ProdutoDao::getById($id);

    $produto = $stmt_prod->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include("../partials/_head.php") ?>
    <title>Mini Olx - Cadastro de Produtos</title>
</head>

<body>
    <!-- código html da aplicação vai aqui -->
    <?php include("../partials/_header.php") ?>


    <!-- Content -->
    <section id="content">
        <div class="container">
            <?php include("../partials/_flash_messages.php") ?>
            <div class="row">
                <?php include("../partials/_sidebar.php") ?>

                <div class="col-md-9 show-produto">
                    <h2><?= $produto->nome ?>
                        <a href="/produtos/destroy.php?id=<?= $produto->id ?>" class="btn btn-danger float-right" onclick="return confirm('Realmente deseja excluir o produto: <?= $produto->nome ?>')">Excluir</a>
                        <a href="/produtos/edit.php?id=<?= $produto->id ?>" class="btn btn-warning float-right">Editar</a>
                    </h2>

                    <dl>
                        <dt>Preço</dt>
                        <dd>R$<?= $produto->preco ?></dd>

                        <dt>Categoria</dt>
                        <dd><?= $produto->categoria_nome ?></dd>

                        <dt>Imagem</dt>
                        <dd>
                            <?php if ($produto->url_imagem_produto) : ?>

                                <img src="<?= $produto->url_imagem_produto ?>" class="img-fluid" alt="<?= $produto->nome ?>">

                            <?php else : ?>
                                <img src="/img/no-image.png" class="img-fluid" alt="<?= $produto->nome ?>">
                            <?php endif ?>
                        </dd>

                        <dt>Descrição</dt>
                        <dd><?= $produto->descricao ?></dd>
                    </dl>
                </div>
    </section><!-- End Content -->

    <!-- incluindo scripts js -->
    <?php include("../partials/_javascript_import.php") ?>
</body>

</html>