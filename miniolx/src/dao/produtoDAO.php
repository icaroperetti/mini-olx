<?php
    namespace App\dao;

    use App\utils\ConnectionFactory;
    use \PDO;
    class ProdutoDao{

        public static function getAll(){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT p.id as id,p.nome as nome,p.descricao,p.url_imagem_produto,p.preco,p.categoria_id,c.nome as categoria_nome FROM produtos p JOIN categorias c ON (p.categoria_id = c.id)");
            $stmt->execute();
            return $stmt;
        }

        public static function getById($id) {
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT p.id as id,p.nome as nome,p.descricao,p.url_imagem_produto,p.preco,p.categoria_id,c.nome as categoria_nome FROM produtos p JOIN categorias c ON (p.categoria_id = c.id) WHERE p.id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }

        public static function getByCategoriaId($categoria_id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM produtos WHERE categoria_id = :categoria_id;");
            $stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }

        public static function create($nome,$preco,$imagem,$categoria_id,$descricao){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("INSERT INTO produtos (nome,descricao,url_imagem_produto,preco,categoria_id) 
                                   VALUES (:nome,:descricao,:url_imagem_produto,:preco,:categoria_id)");
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':descricao',$descricao,PDO::PARAM_STR);
            $stmt->bindParam(':url_imagem_produto',$imagem,PDO::PARAM_STR);
            $stmt->bindParam(':preco',$preco,PDO::PARAM_STR);
            $stmt->bindParam(':categoria_id',$categoria_id,PDO::PARAM_INT);

            return  $stmt->execute();

            
        }

        public static function update($id,$nome,$preco,$imagem,$categoria_id,$descricao){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("UPDATE produtos SET nome = :nome,descricao = :descricao,url_imagem_produto = :url_imagem,preco = :preco, categoria_id = :categoria_id WHERE id = :id");
            $stmt->bindParam( ':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindParam(':url_imagem', $imagem, PDO::PARAM_STR);
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            
            return $stmt->execute();
        }

        public static function delete($id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("DELETE FROM produtos WHERE id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            return  $stmt->execute();
        }
    }

?>