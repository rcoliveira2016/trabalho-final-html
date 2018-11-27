<?php
    session_start();

    if(isset($_GET['envio'])){
        if(!isset($_SESSION['contatos'])){
            $_SESSION['contatos'] = array();
        }
        
        $_SESSION['contatos'][count($_SESSION['contatos'])+1] 
            = array( 'nome' => $_GET['nome'] , 'email' => $_GET['email'], 'comentario' => $_GET['comentario'] );

    }
?>
<?php include_once('./php/views/start-page.php') ?>
<h1 class="mt-4">Converse conosco</h1>
<hr>
<div class="container p-3 shadow-sm">
    <form method="get">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="comentario">Comente aqui</label>
            <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
        </div>
        <button type="submit" name="envio" class="btn btn-light border">Enter</button>
    </form>
    <?php if(isset($_SESSION['contatos']) && count($_SESSION['contatos'])>0){ ?>
        <table class="table table-hover mt-3 table-striped">
            <thead>
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Comentario</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['contatos'] as $key => $value){ ?>
                    <tr>
                        <td><?php echo $value['nome']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td><?php echo nl2br($value['comentario']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</div>
<?php include_once('./php/views/end-page.php') ?>      