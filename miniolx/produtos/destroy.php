<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php'; 
    
    use App\dao\ProdutoDAO;
    use App\utils\FlashMessages;

    $id = $_GET['id'];

    $return = produtoDao::delete($id);
    FlashMessages::setMessage("Produto excluido com sucesso");
    header('location: /produtos/');
?>