<?php

namespace Agenda;
include 'topo.php';
session_start();

require '../vendor/autoload.php';

use Agenda\Usuario\Usuario;
use Agenda\Usuario\UsuarioModel;

$usuario = new Usuario();
$usuario_model = new UsuarioModel();

$usuario->set("id", $_SESSION['navegacao'][0]['id']);
$dados = $usuario_model->editar($usuario);

?>
    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="mt-5">Dados do Usuário</h3>
            <form name="login" action="../controller/usuario.php" method="post">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?=$dados['nome'];?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Usuário</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" value="admin">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" value="admin">
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

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <input type="submit" class="btn btn-primary btn-sm btn-block" value="Confirmar Alterações?">
                    </div>
                </div>
                <input type="hidden" name="opcao" value="atualizar">
            </form>
        </div>
    </main>

<?php
include 'footer.php'
?>