<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include("../partials/_head.php") ?>
    <title>Mini Olx - Cadastro de Categorias</title>
</head>

<body>
    <!-- código html da aplicação vai aqui -->
    <?php include("../partials/_header.php") ?>


    <!-- Content -->
    <section id="content">
        <div class="container">
            <div class="row">
            <?php include("../partials/_sidebar.php")?>

                <div class="col-md-9">
                    <h2>Cadastro de categorias</h2>
                    <form action="/categorias/create.php" method="POST">
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nome" name="nome" />
                            </div>
                        </div>
                        <p><input type="submit" value="Cadastrar" class="btn btn-info float-right"></p>
                    </form>
                </div>
    </section><!-- End Content -->

    <!-- incluindo scripts js -->
    <?php include("../partials/_javascript_import.php") ?>
</body>

</html>