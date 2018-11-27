<?php
include_once('./php/controles/PostControle.php');
include_once('./php/views/start-page.php'); 
?>
<h1 class="mt-4">Cadastrar post</h1>
<hr>
<div class="container mb-3 p-3 shadow-sm">
    <form enctype="multipart/form-data" method="<?php echo $formMethod ?>"  >
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" name="titulo" placeholder="Titulo">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="descricao" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
        </div>
		<div class="form-group">
            <label for="autor">Autor</label>
            <input type="autor" class="form-control" id="autor" name="autor"  placeholder="Autor">
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
            <textarea class="form-control" id="conteudo" name="conteudo" rows="18"></textarea>
        </div>		
        <button type="submit" name="envio" class="btn btn-light border">Enter</button>
    </form>
</div>
<?php include_once('./php/views/end-page.php') ?>