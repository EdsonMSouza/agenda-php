<?php

namespace Agenda;
session_start();


if(!isset($_POST['opcao'])) {
    header('Location: ../index.php');
}
require '../vendor/autoload.php';

use Agenda\Usuario\Usuario;
use Agenda\Usuario\UsuarioModel;
use PDOException;

$usuario = new Usuario();
$usuario_model = new UsuarioModel();

switch ($_POST['opcao']) {
    case 'login':
        try {
            $usuario->set("usuario" , $_POST['usuario']);
            $usuario->set("senha" , $_POST['senha']);
            $result = $usuario_model->login($usuario);

            if($result[0]) {
                $_SESSION['navegacao'] = [$result[1] , $result[2]];
                header('Location: ../views/main.php');
            } else {
                $_SESSION['erro_login'] = 'Usuário e/ou senha inválidos';
                header('Location: ../index.php');
                die();
            }
        } catch (PDOException $pdo) {
            echo "ERRO: " . $pdo->getMessage();
        }
        break;
    case 'novo':
        break;
    case 'recuperar_senha':
        break;
}
