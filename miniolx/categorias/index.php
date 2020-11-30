<?php
	require_once('../src/dao/categoriaDAO.php');
	
	$stmt = CategoriaDao::getAll();

?>

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
				<aside class="col-md-3">
					<h2>Categorias</h2>
					<ul>
						<li><a href="#">Imóveis</a></li>
						<li><a href="#">Carros</a></li>
						<li><a href="#">Caminhões</a></li>
						<li><a href="#">Mobiles</a></li>
					</ul>
				</aside>

				<div class="col-md-9">
					<h2>Cadastro de categorias <a href="/categorias/new.php" class="btn btn-success float-right">Nova Categoria</a></h2>

					<table class="table table-responsive" id="tabelacategorias">
						<tr>
							<th>ID</th>
							<th>NOME</th>
							<th>AÇÕES</th>
						</tr>


						<?php while ($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
							<tr>
								<td><?= $row->id ?></td>
								<td><?= $row->nome ?></td>
								<td>
									<a href="/categorias/edit.php?id=<?= $row->id ?>" class="btn btn-sm btn-warning">Editar</a>
									<a href="/categorias/destroy.php?id=<?= $row->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Realmente deseja excluir a categoria: <?= $row->nome ?>')">Exlcuir</a>
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