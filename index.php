<?php
include_once('./php/dom/post.php');
include_once('./php/infra/Conexao.php');
include_once('./php/infra/Repositorios/PostRepositorio.php');
$postRepository = PostRepositorio::getInstance();
if(isset($_POST['pesquisa'])){
	$posts = $postRepository->BuscarPorPesquisa($_POST['pesquisa']);
}
else{
	$posts = $postRepository->BuscarTodos();
}

//html
include_once('./php/views/start-page.php');
?>
<?php  if(isset($_POST['pesquisa'])):?>
	<div class="my-4 col-md-12">
		<p class="mb-0 lead">
			<b>Termo pesquisado:</b>
			<?php echo $_POST['pesquisa']; ?>
		</p>
	</div>
<?php  endif;?>
<div class="album my-4">
	<div class="container">
		<div class="row">
			<?php foreach ($posts as $key => $post): ?>
				<div class="col-md-4">
					<div class="card mb-4 box-shadow posts">
						<img class="card-img-top p-2 border-bottom" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
							alt="imagem top" style="height: 225px; width: 100%; display: block;" src="data:image/png;base64,<?php echo $post->getImagem(); ?>"
							data-holder-rendered="true">
						<div class="card-body">
							<h3 class="mb-3">
								<a class="text-dark post-link" href="./post.php?id=<?php echo $post->getId();?>" ><?php echo $post->getTitulo();?></a>
							</h3>
							<div class="m-1 text-muted"><?php echo date('d/m', strtotime($post->getData()));?></div>
							<p class="card-text mb-1">
								<?php echo substr($post->getDescricao(), 0, 87)."...";?>
							</p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php include_once('./php/views/end-page.php') ?>
