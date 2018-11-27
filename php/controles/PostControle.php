<?php
include_once('./php/dom/post.php');
include_once('./php/infra/Conexao.php');
include_once('./php/infra/Repositorios/PostRepositorio.php');

$formMethod = 'POST';
 function Init(){
	$method = $_SERVER['REQUEST_METHOD'];
	switch ($method) {
		case 'PUT':
			Put();
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


function Put(){
	
}


function Get(){
	
}

 function Post(){
	$resquest = $_POST;
	$resquest['data'] = date('Y-m-d H:i:s');
	$resquest['id'] = 0;
	
	move_uploaded_file($_FILES["imagem"]["tmp_name"], $_FILES["imagem"]["name"]);
	$bin_string = file_get_contents($_FILES["imagem"]["name"]);	
	$resquest['imagem'] = base64_encode($bin_string);
	$post = popularPost($resquest);	
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