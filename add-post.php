<?php
include_once('./php/controles/PostControle.php');
include_once('./php/views/start-page.php');
$controle = new PostControle();
$post = $controle->retorno;
?>
<h1 class="mt-4">Cadastrar post</h1>
<hr>
<div class="container mb-3 p-3 shadow-sm">
    <form enctype="multipart/form-data" method="<?php echo $controle->formMethod ?>"  >
        <input type="hidden" name="id" value="<?php echo $post->getId() ?>" name="titulo" placeholder="Titulo">
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input required type="text" class="form-control" value="<?php echo $post->getTitulo() ?>" name="titulo" placeholder="Titulo">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input required type="descricao" class="form-control" id="descricao" value="<?php echo $post->getDescricao() ?>"  name="descricao" placeholder="Descrição">
        </div>
		<div class="form-group">
            <label for="autor">Autor</label>
            <input required type="autor" class="form-control" id="autor" value="<?php echo $post->getAutor() ?>" name="autor"  placeholder="Autor">
        </div>
		<div class="form-group">
			<label for="imagem">Imagem</label>
			<div class="input-group">
				<div class="custom-file">
					<input type="file" name="imagem" class="custom-file-input" id="imagem" aria-describedby="imagem">
					<label class="custom-file-label" for="imagem">selecione uma imagem</label>
				</div>
			</div>
		</div>
        <div class="form-group">
            <label for="conteudo">Conteudo</label>
            <textarea maxlength=250 required class="form-control" id="conteudo"  name="conteudo" rows="18"><?php echo $post->getConteudo() ?></textarea>
        </div>
        <button type="submit" name="envio" class="btn btn-light border">Enter</button>
    </form>
</div>

<?php
//$bundles_javaScripts[]='//cdn.ckeditor.com/4.11.1/basic/ckeditor.js';
$bundles_javaScripts[]='./vendor/ckeditor/ckeditor.js';
$bundles_javaScripts[]='./js/add-post.js';
include_once('./php/views/end-page.php')
?>
