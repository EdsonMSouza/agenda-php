<?php

namespace Agenda;
require 'vendor/autoload.php';

use Agenda\Contato\Contato;
use Agenda\Contato\ContatoModel;
use PDOException;

$contato = new Contato();
$contato_model = new ContatoModel();

try {
//    $contato->set("nome", "Edson Melo de Souza");
//    $contato->set("email", "email@email.com");
//    $contato->set("telefone", "1234-5678");

//  Inclusão
//    if ($contato_model->novo($contato)) {
//        echo "Incluído com sucesso!!!";
//    }

//    Pesquisar
//    $contato->set("id" , "1");
//    $contato_model->pesquisar($contato);

    // Atualizar
    $contato->set("nome", "Edson Souza");
    $contato->set("email", "edson@email.com");
    $contato->set("telefone", "5555-6666");
    $contato->set("id", 1);

    if ($contato_model->excluir($contato)){
        echo "Atualizado com sucesso!";
    }
} catch (PDOException $pdo) {
    echo "ERRO: " . $pdo->getMessage();
}