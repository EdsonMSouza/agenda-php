<?php

namespace Agenda;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'topo.php';

use Agenda\Contato\Contato;
use Agenda\Contato\ContatoModel;

$contato = new Contato();
$contato->set("usuario_id", $_SESSION['navegacao'][0]['id']);
$contato_model = new ContatoModel();
$dados = $contato_model->listar($contato);
?>
    <main class="flex-shrink-0">
        <div class="container">
            <h3>Listagem dos Contatos</h3>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($dados as $valor) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $valor['id']; ?></th>
                        <td><?php echo $valor['nome']; ?></td>
                        <td><?php echo $valor['email']; ?></td>
                        <td><?php echo $valor['telefone']; ?></td>
                        <td class="text-center">
                            <form action="" method="post">
                                <input type="submit" value="Editar">
                            </form>
                        </td>
                        <td class="text-center">
                            <form action="" method="post">
                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                    </tr>

                <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php
include 'footer.php'
?>