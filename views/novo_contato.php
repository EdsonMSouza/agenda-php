<?php

namespace Agenda;
include 'topo.php';
session_start();

#require '../vendor/autoload.php';

?>
    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="mt-5">Dados do Contato</h3>
            <form name="login" action="../controller/contato.php" method="post">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>E-mail</label>
                        <input type="text" class="form-control" id="email" name="email" value="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <input type="submit" class="btn btn-primary btn-sm btn-block" value="Incluir">
                    </div>
                </div>
                <input type="hidden" name="opcao" value="novo">
                <input type="hidden" name="usuario_id" value="<?= $_SESSION['navegacao'][0]['id']; ?>">
            </form>
        </div>
    </main>

    <?php
include 'footer.php'
?>