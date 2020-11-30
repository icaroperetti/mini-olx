<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php'; 
	
	use App\dao\ProdutoDAO;
	
	

	$stmt = produtoDAO::getAll();

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
			<?php include("../partials/_flash_messages.php")?>
			<div class="row">
				<?php include("../partials/_sidebar.php") ?>

				<div class="col-md-9">
					<h2>Cadastro de Produtos <a href="/produtos/new.php" class="btn btn-success float-right">Novo Produto</a></h2>
					<table class="table table-responsive" id="tabelaprodutos">
						<tr>
							<th>ID</th>
							<th>Thumbnail</th>
							<th>Nome</th>
							<th>Preço</th>
							<th>Categoria</th>
							<th>AÇÕES</th>
						</tr>


						<?php while ($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
							<tr>
								<td><?= $row->id ?></td>
								<td>
									<?php if ($row->url_imagem_produto) : ?>

										<img src="<?= $row->url_imagem_produto ?>"  alt="<?= $row->nome ?>">

									<?php else : ?>
										<img src="/img/no-image.png"  alt="<?= $row->nome ?>">
									<?php endif ?>
								</td>
								<td><?= $row->nome ?></td>
								<td>R$<?= $row->preco ?></td>
								<td><?= $row->categoria_nome ?></td>
								<td>
									<a href="/produtos/show.php?id=<?= $row->id ?>" class="btn btn-sm btn-info">Mostrar</a>
									<a href="/produtos/edit.php?id=<?= $row->id ?>" class="btn btn-sm btn-warning">Editar</a>
									<a href="/produtos/destroy.php?id=<?= $row->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Realmente deseja excluir a categoria: <?= $row->nome ?>')">Exlcuir</a>
								</td>
							</tr>
						<?php endwhile ?>


					</table>
				</div>
	</section><!-- End Content -->

	<!-- incluindo scripts js -->
	<?php include("../partials/_javascript_import.php") ?>
</body>

</html>