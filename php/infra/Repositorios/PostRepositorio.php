<?php

class PostRepositorio {
  
    public static $instance;
    private $nameTable; 
    private function __construct() {
        $this->nameTable = 'post';
    }
  
    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new PostRepositorio();
  
        return self::$instance;
    }

    private function populaPost($row) {
        $post = new Post;
        $post->setId($row['id']);
        $post->setTitulo($row['titulo']);
        $post->setDescricao($row['descricao']);
        $post->setAutor($row['autor']);
        $post->setData($row['dataCriacao']);
        $post->setConteudo($row['conteudo']);
        $post->setImagem($row['imagem']);
        return $post;
    }
    
    public function Editar(Post $post) {
        try {
            $sql = "UPDATE $this->nameTable set
                    titulo = :titulo,
                    descricao = :descricao,
                    autor = :autor,
                    conteudo = :conteudo,
                    imagem = :imagem 
                    WHERE id = :id";
  
            $p_sql = Conexao::getInstance()->prepare($sql);
  
            $p_sql->bindValue(":id", $post->getId());
            $p_sql->bindValue(":titulo", $post->getTitulo());
            $p_sql->bindValue(":descricao", $post->getDescricao());
            $p_sql->bindValue(":autor", $post->getAutor());
            $p_sql->bindValue(":conteudo", $post->getConteudo());
            $p_sql->bindValue(":imagem", $post->getImagem());
  
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }

    public function Inserir(Post $post) {
        try {
            $sql = "INSERT INTO $this->nameTable (    
                titulo,
                descricao,
                autor,
                dataCriacao,
                conteudo,
                imagem)
                VALUES (
                :titulo,
                :descricao,
                :autor,
                :dataCriacao,
                :conteudo,
                :imagem)";
  
            $p_sql = Conexao::getInstance()->prepare($sql);
  
            $p_sql->bindValue(":titulo", $post->getTitulo());
            $p_sql->bindValue(":descricao", $post->getDescricao());
            $p_sql->bindValue(":autor", $post->getAutor());
            $p_sql->bindValue(":dataCriacao", $post->getData());
            $p_sql->bindValue(":conteudo", $post->getConteudo());
            $p_sql->bindValue(":imagem", $post->getImagem());
  
  
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }

    public function getNextID() {
        try {
            $sql = "SELECT Auto_increment FROM information_schema.tables WHERE table_name='$this->nameTable'";
            $result = Conexao::getInstance()->query($sql);
            $final_result = $result->fetch(PDO::FETCH_ASSOC);
            return $final_result['Auto_increment'];
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }

    public function BuscarPorId($id) {
        try {
            $sql = "SELECT * FROM $this->nameTable WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();

            return $this->populaPost($p_sql->fetch(PDO::FETCH_ASSOC));            
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }

    public function BuscarTodos() {
        try {
            $sql = "SELECT * FROM $this->nameTable order by dataCriacao";
            $result = Conexao::getInstance()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
  
            foreach ($lista as $l)
                $f_lista[] = $this->populaPost($l);
  
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde. $e";
        }
    }

    public function Deletar($id) {
        try {
            $sql = "DELETE FROM $this->nameTable WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
  
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
}
?>