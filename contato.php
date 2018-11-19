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
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dev Moustache </title>

  <link rel="shortcut icon" href="media/img/big.ico" type="image/x-icon">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/blog-post.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>

<body class="d-flex flex-column" style="min-height: 100vh">

  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">      
      <a class="navbar-brand" href="#">
        <img src="media/img/big.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" data-target-page="home" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-target-page="sobre" href="#">Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-target-page="contato" href="contato.php">Contato</a>
          </li>
        </ul>
        <form class="form-inline my-2">
          <div class="input-group">
            <input type="text" class="form-control no-border-radius" placeholder="Procurar" aria-label="Procurar"
              aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" name="envio" type="button">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </nav>

  <main class="flex-fill">
    <div class="container">

      <div class="row">

        <div class="col-lg-12 conteudo">
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
        </div>

      </div>
    </div>
  </main>

  <footer class="py-3 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Ramon. LTDA 2018</p>
    </div>
  </footer>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js"></script>
</body>

</html>