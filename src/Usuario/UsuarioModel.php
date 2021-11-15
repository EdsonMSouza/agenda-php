<?php

namespace Agenda\Usuario;

use Agenda\Database\Database;
use PDO;
use PDOException;


/**
 * CRUD para o Usuario
 * Métodos:
 *      novo()
 *      pesquisar()
 *      atualizar()
 *      excluir()
 */
class UsuarioModel
{
    private static $pdo;

    public function __construct()
    {
        self::$pdo = Database::connection();
    }

    /**
     * @param Usuario $usuario
     * @return boolean
     */
    public function novo(Usuario $usuario): bool
    {
        try {
            self::$pdo->beginTransaction();
            $sql = "INSERT INTO usuarios (usuarios.nome, usuarios.usuario, usuarios.senha)
                    VALUES (:nome, :usuario, :senha)";
            $stmt = self::$pdo->prepare($sql);
            $stmt->bindValue(':nome' , $usuario->get("nome"));
            $stmt->bindValue(':usuario' , md5($usuario->get("usuario")));
            $stmt->bindValue(':senha' , md5($usuario->get("senha")));
            $stmt->execute();
            self::$pdo->commit();

            return true;

        } catch (PDOException $ex) {
            self::$pdo->rollback();
            throw $ex;
        }
    }

    public function login(Usuario $usuario): array
    {
        try {
            $sql = "SELECT id, nome FROM usuarios WHERE usuario = :usuario AND senha = :senha";
            $stmt = self::$pdo->prepare($sql);
            $stmt->bindValue(':usuario' , md5($usuario->get("usuario")));
            $stmt->bindValue(':senha' , md5($usuario->get("senha")));
            $stmt->execute();

            if($stmt->rowCount() == 1) {
                return [true , $stmt->fetch(PDO::FETCH_ASSOC)];
            } else {
                return [false];
            }

        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function atualizar(Contato $contato)
    {
        try {
            self::$pdo->beginTransaction();

            $sql = "UPDATE contatos SET 
                    contatos.nome = :nome,
                    contatos.usuario = :usuario , 
                    contatos.senha = :senha 
                    WHERE contatos.id = :id";

            $stmt = self::$pdo->prepare($sql);
            $stmt->bindValue(':nome' , $contato->get("nome"));
            $stmt->bindValue(':usuario' , $contato->get("usuario"));
            $stmt->bindValue(':senha' , $contato->get("senha"));
            $stmt->bindValue(':id' , $contato->get("id"));
            $stmt->execute();
            self::$pdo->commit();

            return true;

        } catch (PDOException $ex) {
            self::$pdo->rollback();
            throw $ex;
        }
    }

    public function excluir(Contato $contato)
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