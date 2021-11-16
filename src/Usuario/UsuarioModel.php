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

    public function editar(Usuario $usuario)
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = self::$pdo->prepare($sql);
            $stmt->bindValue(':id' , $usuario->get("id"));
            $stmt->execute();

            if($stmt->rowCount() == 1) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }

        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function atualizar(Usuario $usuario)
    {
        try {
            self::$pdo->beginTransaction();

            $sql = "UPDATE usuarios SET  
                    usuarios.nome = :nome,
                    usuarios.usuario = :usuario , 
                    usuarios.senha = :senha 
                    WHERE usuarios.id = :id";

            $stmt = self::$pdo->prepare($sql);
            $stmt->bindValue(':nome' , $usuario->get("nome"));
            $stmt->bindValue(':usuario' , md5($usuario->get("usuario")));
            $stmt->bindValue(':senha' , md5($usuario->get("senha")));
            $stmt->bindValue(':id' , $usuario->get("id"));
            $stmt->execute();
            self::$pdo->commit();

            return true;

        } catch (PDOException $ex) {
            self::$pdo->rollback();
            throw $ex;
        }
    }
}