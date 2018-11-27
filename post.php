<?php
include_once('./php/dom/post.php');
include_once('./php/infra/Conexao.php');
include_once('./php/infra/Repositorios/PostRepositorio.php');
$postRepository = PostRepositorio::getInstance();
$post = $postRepository->BuscarPorId($_GET['id']);
//html
include_once('./php/views/start-page.php'); 
?>

<h1 class="mt-4"><?php echo $post->getTitulo();?></h1>
            
<div class="header-title-post">	
    <p class="my-4 lead">
        <?php echo $post->getDescricao();?>
    </p>
    <div class="by-post">
        Por
        <a href="#"><?php echo $post->getAutor();?></a>
    </div>
    <div>
        <i class="far fa-clock"></i> Postado em <?php echo date('d/m/Y', strtotime($post->getData()));?>
    </div>	
</div>
<hr>

<div class="row preview-image">
    <img class="img-fluid rounded mx-auto d-block" src="data:image/png;base64,<?php echo $post->getImagem(); ?>" alt="">
</div>

<hr>
<div class="container text-justify px-5">
    <?php echo $post->getConteudo();?>
    <hr>
    <div class="card my-4">
    <h5 class="card-header">Escreva um Comentário:</h5>
    <div class="card-body">
        <form>
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary ">
                <i class="fas fa-share-square"></i>
            </button>
        </form>
    </div>
</div>
</div>
            
            
<?php include_once('./php/views/end-page.php') ?>