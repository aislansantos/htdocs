<?php
class Cliente
{
    private $id;
    private $nome;
    private $cidade;
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
    public function SetCidade($c)
    {
        $this->cidade = $c;
    }
    public function GetCidade()
    {
        return $this->cidade;
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
            $sql = "UPDATE cliente SET nome = :nome, cidade = :cidade WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $stmt->bindParam(":cidade", $this->cidade, PDO::PARAM_STR);
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
            $stmt->execute();
            $this->logEditar();
        } else {
            if ($this->verificaCliente() == true) {
                $sql = "INSERT INTO cliente (nome, cidade) VALUES (:nome, :cidade)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $stmt->bindParam(":cidade", $this->cidade, PDO::PARAM_STR);
                $stmt->execute();
                $this->logIncluir();
            } else {
            }
        }
    }

    public function deletar()
    {
        $sql = "DELETE FROM cliente WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();
        $this->logExcluir();
        return true;
    }

    public function consultar($iden = '')
    {
        if ($iden == null) {
            $sql = "SELECT * FROM cliente ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            } else {
                return array();
            }
        } else {
            $sql = "SELECT * FROM cliente WHERE nome like '%" . $iden . "%' ";
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
        $sql = "SELECT * FROM cliente WHERE id = :cod";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":cod", $cod, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        } else {
            return array();
        }
    }

    public function verificaCliente()
    {
        $sql = "SELECT * FROM cliente WHERE nome = :nome";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
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
        $log->registrar("Inclusão de Cliente: " . $this->nome, $this->user);
    }

    public function logEditar()
    {
        require 'log.class.php';
        require 'conn.php';
        $log = new Log($pdo);
        $log->registrar("Alreração de Cliente:  " . $this->nome . " id: " . $this->id, $this->user);
    }

    public function logExcluir()
    {
        require 'log.class.php';
        require 'conn.php';
        $log = new Log($pdo);
        $log->registrar("Exclusão de Cliente: " . $this->nome, $this->user);
    }
}
