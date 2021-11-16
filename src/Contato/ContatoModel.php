<?php

namespace Agenda\Contato;

use Agenda\Database\Database;
use PDOException;
use PDO;

/**
 * CRUD para o Contato
 * Métodos:
 *      novo()
 *      pesquisar()
 *      atualizar()
 *      excluir()
 */
class ContatoModel
{
    private static $pdo;

    public function __construct()
    {
        self::$pdo = Database::connection();
    }

    /**
     * @param Contato $contato
     * @return boolean
     */
    public function novo(Contato $contato): bool
    {
        try {
            self::$pdo->beginTransaction();
            $sql = "INSERT INTO contatos (contatos.usuario_id, contatos.nome, contatos.email, contatos.telefone)
                    VALUES (:usuario_id, :nome, :email, :telefone)";
            $stmt = self::$pdo->prepare($sql);
            $stmt->bindValue(':usuario_id' , $contato->get("usuario_id"));
            $stmt->bindValue(':nome' , $contato->get("nome"));
            $stmt->bindValue(':email' , $contato->get("email"));
            $stmt->bindValue(':telefone' , $contato->get("telefone"));
            $stmt->execute();
            self::$pdo->commit();

            return true;

        } catch (PDOException $ex) {
            self::$pdo->rollback();
            throw $ex;
        }
    }

    /**
     * @param Contato $contato
     */
    public function pesquisar(Contato $contato)
    {
        try {
            if($contato->get("id") != 0) {
                echo "Busca pelo ID";
            } else {
                echo "Busca TODOS";
            }
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    /**
     * @param Contato $contato
     */
    public function listar()
    {
        try {
            $sql = "SELECT * FROM contatos ORDER BY nome";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $ex) {
            self::$pdo->rollback();
            throw $ex;
        }
    }

    /**
     * @param Contato $contato
     * @return boolean
     */
    public function atualizar(Contato $contato): bool
    {
        try {
            self::$pdo->beginTransaction();

            $sql = "UPDATE contatos SET 
                    contatos.nome = :nome,
                    contatos.email = :email , 
                    contatos.telefone = :telefone 
                    WHERE contatos.id = :id";

            $stmt = self::$pdo->prepare($sql);
            $stmt->bindValue(':nome' , $contato->get("nome"));
            $stmt->bindValue(':email' , $contato->get("email"));
            $stmt->bindValue(':telefone' , $contato->get("telefone"));
            $stmt->bindValue(':id' , $contato->get("id"));
            $stmt->execute();
            self::$pdo->commit();

            return true;

        } catch (PDOException $ex) {
            self::$pdo->rollback();
            throw $ex;
        }
    }

    /**
     * @param Contato $contato
     * @return boolean
     */
    public function excluir(Contato $contato): bool
    {
        try {
            self::$pdo->beginTransaction();
            $sql = "DELETE FROM contatos WHERE contatos.id = :id";
            $stmt = self::$pdo->prepare($sql);
            $stmt->bindValue(':id' , $contato->get("id"));
            $stmt->execute();
            self::$pdo->commit();

            return true;

        } catch (PDOException $ex) {
            self::$pdo->rollback();
            throw $ex;
        }
    }
}