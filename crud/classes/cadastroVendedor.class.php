<?php

class Vendedor
{
    private $id;
    private $nome;
    private $user;
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function SetId($i)
    {
        $this->id = $i;
    }
    public function GetId()
    {
        return  $this->id;
    }

    public function SetNome($n)
    {
        $this->nome = $n;
    }
    public function GetNome()
    {
        return $this->nome;
    }
    public function SetUser($u)
    {
        $this->user = $u;
    }
    public function GetUser()
    {
        return $this->user;
    }



    public function salvar()
    {
        if (!empty($this->id)) {
            $sql = "UPDATE vendedor SET nome = :nome WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $stmt->bindParam(":id", $this->id, PDO::PARAM_STR);
            $stmt->execute();
            $this->logEditar();
        } else {
            if ($this->verificaVendedor() == true) {
                $sql = "INSERT INTO vendedor (nome) VALUES (:nome)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $stmt->execute();
                $this->logIncluir();
            } else {
            }
        }
    }

    public function deletar()
    {
        $sql = "DELETE FROM vendedor WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();
        $this->logExcluir();
        return true;
    }

    public function consultar($iden = '')
    {
        if ($iden == null) {
            $sql = "SELECT * FROM vendedor";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            }else{
                return array();
            }
        } else {
            $sql = "SELECT * FROM vendedor WHERE nome = '$iden' ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            } else {
                return array();
            }
        }
    }

    public function consultaEditar($cod = null)
    {
        $sql = "SELECT * FROM vendedor WHERE id = :cod";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":cod", $cod, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        } else {
            return array();
        }
    }

    public function verificaVendedor()
    {
        $sql = "SELECT * FROM vendedor WHERE nome = :vendedor";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":vendedor", $this->nome, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function logIncluir()
    {
        require 'log.class.php';
        require 'conn.php';
        $log = new Log($pdo);
        $log->registrar("Inclusão de Vendedor: " . $this->nome, $this->user);
    }

    public function logEditar()
    {
        require 'log.class.php';
        require 'conn.php';
        $log = new Log($pdo);
        $log->registrar("Alreração de Vendedor:  " . $this->nome . " id: " . $this->id, $this->user);
    }

    public function logExcluir()
    {
        require 'log.class.php';
        require 'conn.php';
        $log = new Log($pdo);
        $log->registrar("Exclusão de Vendedor: " . $this->nome, $this->user);
    }
}
