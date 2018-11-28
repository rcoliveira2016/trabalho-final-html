<?php 
global $bundles_javaScripts;
$bundles_javaScripts = array();
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" data-target-page="home" href="./">
                        Home                    
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target-page="sobre" href="sobre.php">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target-page="contato" href="contato.php">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target-page="contato" href="add-post.php">Criar Post</a>
                </li>
            </ul>
            <form class="form-inline my-2" method="post" action="index.php">
                <div class="input-group">
                <input type="text" name="pesquisa" class="form-control no-border-radius" placeholder="Procurar" aria-label="Procurar"
                    aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" name="envio" type="submit">
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