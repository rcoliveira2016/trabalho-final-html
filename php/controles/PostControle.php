<?php
include_once('./php/dom/post.php');
include_once('./php/infra/Conexao.php');
include_once('./php/infra/Repositorios/PostRepositorio.php');

$formMethod = 'POST';
 function Init(){
	$method = $_SERVER['REQUEST_METHOD'];
	switch ($method) {
		case 'PUT':		 
			break;
		case 'POST':
			Post();
			break;
		case 'GET':
			
			Get();
			break;
		case 'DELETE':		
			break;
		default:
			handle_error($request);  
			break;
	}
}


 function Get(){
	
}

 function Post(){
	$_POST['data'] = date('Y-m-d H:i:s');
	$_POST['id'] = 0;
	var_dump($_POST);	
	$post = popularPost($_POST);	
	PostRepositorio::getInstance()->Inserir($post);
}

 function popularPost($resquest){
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

Init();
?>