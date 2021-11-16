<?php

namespace Agenda;
session_start();

if(!isset($_POST['opcao'])) {
    header('Location: ../index.php');
}
require '../vendor/autoload.php';

use Agenda\Contato\Contato;
use Agenda\Contato\ContatoModel;
use PDOException;

$contato = new Contato();
$contato_model = new ContatoModel();

switch ($_POST['opcao']) {
    case 'novo':
        try {
            $contato->set("usuario_id" , $_POST['usuario_id']);
            $contato->set("nome" , $_POST['nome']);
            $contato->set("email" , $_POST['email']);
            $contato->set("telefone" , $_POST['telefone']);

            if($contato_model->novo($contato)) {
                $_SESSION['mensagem'] = 'Contato incluído com sucesso.';
                header('Location: ../views/main.php');
            }

        } catch (PDOException $pdo) {
            echo "ERRO: " . $pdo->getMessage();
        }
        break;
}
