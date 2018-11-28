<?php
include_once('./php/dom/post.php');
include_once('./php/infra/Conexao.php');
include_once('./php/infra/Repositorios/PostRepositorio.php');


class PostControle {
	public $formMethod;
	public $retorno;

	public function __construct(){
		$this->formMethod = 'POST';
		$this->retorno = $this->Init();
	}

	private function Init(){
		$method = $_SERVER['REQUEST_METHOD'];
		switch ($method) {
			case 'PUT':
				parse_str(file_get_contents('php://input'), $_PUT);
				return $this->Put($_PUT);
				break;
			case 'POST':
				return $this->Post($_POST);
				break;
			case 'GET':			
				return $this->Get($_GET);
				break;
			case 'DELETE':
				parse_str(file_get_contents('php://input'), $_DELETE);
				return $this->Delete($_DELETE);		
				break;
			default:
				handle_error($request);  
				break;
		}
	}

	private function Delete($data){
		$id = $data['id'];
		PostRepositorio::getInstance()->Deletar($id);
		echo "excluido";
	}

	private function Put($data){
		$id = $data['id'];
		$post = PostRepositorio::getInstance()->BuscarPorId($id);
		$data['data'] = date('Y-m-d H:i:s');
		if(isset($_FILES["imagem"]["name"]) && !empty($_FILES["imagem"]["name"])){
			move_uploaded_file($_FILES["imagem"]["tmp_name"], $_FILES["imagem"]["name"]);
			$bin_string = file_get_contents($_FILES["imagem"]["name"]);	
			$data['imagem'] = base64_encode($bin_string);
			unlink($_FILES["imagem"]["name"]);
		}else{
			$data['imagem'] = $post->getImagem();
		}
		
		$post = $this->popularPost($data);	
		PostRepositorio::getInstance()->Editar($post);
	}

	private function Get($data){
		if(isset($data['id'])){
			$id = $data['id'];
			return PostRepositorio::getInstance()->BuscarPorId($id);
		}
		return new Post();
	}

	private function Post($resquest){
		if(empty($resquest['id'])){
			$resquest['data'] = date('Y-m-d H:i:s');
			$resquest['id'] = 0;
			move_uploaded_file($_FILES["imagem"]["tmp_name"], $_FILES["imagem"]["name"]);
			$bin_string = file_get_contents($_FILES["imagem"]["name"]);	
			$resquest['imagem'] = base64_encode($bin_string);
			unlink($_FILES["imagem"]["name"]);
			$post = $this->popularPost($resquest);	
			PostRepositorio::getInstance()->Inserir($post);
		}
		else{
			$post = $this->Put($resquest);
		}		
		header("Location: index.php");
		return $post;
	}

	private function popularPost($resquest){
		$post = new Post;
		$post->setId($resquest['id']);
		$post->setTitulo($resquest['titulo']);
		$post->setDescricao($resquest['descricao']);
		$post->setAutor($resquest['autor']);
		$post->setData($resquest['data']);
		$post->setConteudo($resquest['conteudo']);
		$post->setImagem($resquest['imagem']);
		return $post;
	}

	
}
?>