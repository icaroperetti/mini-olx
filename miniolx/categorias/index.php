<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\CategoriaDAO;

$stmt = CategoriaDAO::getAll();

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
				<div class="col-md-12">
					<h2>Cadastro de categorias <a href="/categorias/new.php" class="btn btn-success float-right">Nova Categoria</a></h2>
					<table class="table" id="tabelacategorias">
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
			</div>
		</div>
	</section><!-- End Content -->

	<!-- incluindo scripts js -->
	<?php include("../partials/_javascript_import.php") ?>
</body>

</html>