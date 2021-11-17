<?php

namespace Agenda;
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
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">

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
        Fixed navbar
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <span class="navbar-brand">Agenda Pessoal</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="main.php">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="mt-5">Dados do Usuário</h3>
            <form name="login" action="../controller/usuario.php" method="post">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Usuário</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" value="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Senha</label>
                        <input type="text" class="form-control" id="senha" name="senha" value="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <input type="submit" class="btn btn-primary btn-sm btn-block" value="Prosseguir">
                    </div>
                </div>
                <input type="hidden" name="opcao" value="novo">
            </form>
        </div>
    </main>

    <?php
include 'footer.php'
?>