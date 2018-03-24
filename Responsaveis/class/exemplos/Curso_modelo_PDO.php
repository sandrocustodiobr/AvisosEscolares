<?php

/* 
 * Class Curso
 */

class Curso {
    private $id;
    private $nomecurto;
    private $nome;

    public function __construct() {
        echo "<br>Curso...<br>";
    }
          
    public function Inclui() {
        $connection;
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=AvisosEscolares', 'root', 'root');
            $connection->beginTransaction();
            $sql = "INSERT INTO Curso (nomecurto,nome) VALUES (:CursoNomeCurto,:CursoNome)";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindParam(":CursoNomeCurto", $this->nomecurto);
            $preparedStatment->bindParam(":CursoNome", $this->nome);
            $preparedStatment->execute();
            $connection->commit();
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            print $exc->getMessage();
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }
    
    public function BuscaNome($NomeBusca) {
        $connection;
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=AvisosEscolares', 'root', 'root');
            $sql = "SELECT id,nomecurto,nome FROM Curso WHERE nome LIKE '%{$NomeBusca}%'";
            $preparedStatment = $connection->prepare($sql);

            if ($preparedStatment->execute() == TRUE) {
                return $preparedStatment->fetchAll();
            } else {
                return array();
            }
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            return array();
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function Altera($pID, $pNome, $pDtNasc, $pEndereco, $pEmail, $pCelular) {
        $connection;
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=AvisosEscolares', 'root', 'root');
            $connection->beginTransaction();
            $sql  = 'UPDATE cadastro SET nome     = :paciente_nome     , ';
            $sql .= '                    DtNasc   = :paciente_dtnasc   , ';
            $sql .= '                    endereco = :paciente_endereco , ';
            $sql .= '                    email    = :paciente_email    , ';
            $sql .= '                    celular  = :paciente_celular    ';
            $sql .= 'WHERE id = :paciente_id                             ';

            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindParam(":paciente_id", $pID);
            $preparedStatment->bindParam(":paciente_nome", $pNome);
            $preparedStatment->bindParam(":paciente_dtnasc", $pDtNasc);
            $preparedStatment->bindParam(":paciente_endereco", $pEndereco);
            $preparedStatment->bindParam(":paciente_email", $pEmail);
            $preparedStatment->bindParam(":paciente_celular", $pCelular);
            $executionResult = $preparedStatment->execute();
            $connection->commit();

            if ($executionResult == TRUE) {
                return TRUE;
            }
            throw new PDOException();
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            return FALSE;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }


    public function buscarPorID($pID) {
        $connection;
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=AvisosEscolares', 'root', 'root');
            $sql = "SELECT id, nome, DtNasc, endereco, email, celular  FROM cadastro  WHERE id = :paciente_id";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindParam(":paciente_id", $pID);

            if ($preparedStatment->execute() == TRUE) {
                return $preparedStatment->fetchAll();
            } else {
                return array();
            }
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            return array();
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function Deletar($pID) {
        $connection;
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=AvisosEscolares', 'root', 'root');
            $connection->beginTransaction();
            $sql = "DELETE FROM cadastro WHERE id = :paciente_id";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindParam(":paciente_id", $pID);
            $executionResult = $preparedStatment->execute();
            $connection->commit();
            if ($executionResult == TRUE) {
                return TRUE;
            }
            throw new PDOException();
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            return FALSE;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

}