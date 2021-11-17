<?php
session_start();
if(isset($_SESSION['navegacao'])) {
    header('Location: views/main.php');
}
require 'vendor/autoload.php';
?>

<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Agenda Pessoal</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/">

    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <link href="https://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/sticky-footer-navbar.css"
          rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Agenda Pessoal</a>
        </div>
    </nav>
</header>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h3 class="mt-5">Tela de Login</h3>
        <form name="login" action="controller/usuario.php" method="post">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" id="usuario" name="usuario"
                           placeholder="Informe seu usuário" value="" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe sua senha"
                           value="">
                </div>
            </div>
            <div clas="row">
                <div class="col-md-3 mb-3">
                    <p class="text-danger">
                        <?php
                        if(isset($_SESSION['erro_login'])) {
                            echo $_SESSION['erro_login'];
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div clas="row">
                <div class="col-md-3 mb-3">
                    <p class="text-success">
                        <?php
                        if(isset($_SESSION['novo'])) {
                            echo $_SESSION['novo'];
                        }
                        ?>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <input type="submit" class="btn btn-primary btn-sm btn-block" value="Prosseguir">
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#!" class="text-body">Esqueci a senha</a>
                        <a href="views/novo_usuario.php" class="text-body">Novo usuário</a>
                    </div>
                </div>
            </div>
            <input type="hidden" name="opcao" value="login">
        </form>
    </div>
</main>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">Rodapé fixo.</span>
    </div>
</footer>

<script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


</body>
</html>
