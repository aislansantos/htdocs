<?php
class CadastroFornecedores
{
    private $id;
    private $nome;
    private $apelido;
    private $contato;
    private $email;
    private $telefone;
    private $user;
    private $pdo;



    public function __construct($pdo)
    {
        $this->pdo =  $pdo;
    }

    public function setId($i)
    {
        $this->id = $i;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNome($n)
    {
        $this->nome = $n;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setApelido($a)
    {
        $this->apelido = $a;
    }
    public function getApelido()
    {
        return $this->apelido;
    }
    public function setContato($c)
    {
        $this->contato = $c;
    }
    public function getContato()
    {
        return $this->contato;
    }
    public function setEmail($e)
    {
        $this->email = $e;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setTelefone($t)
    {
        $this->telefone = $t;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setUsuario($u)
    {
        $this->user = $u;
    }

    public function getUsuario()
    {
        return $this->user;
    }


    public function salvar()
    {
        if (!empty($this->id)) {
            $sql = "UPDATE fornecedor SET nome = :nome, apelido = :apelido, contato = :contato, email = :email, telefone = :telefone WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $stmt->bindParam("apelido", $this->apelido, PDO::PARAM_STR);
            $stmt->bindParam(":contato", $this->contato, PDO::PARAM_STR);
            $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
            $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
            $stmt->execute();
            $this->logEditar();
        } else {
            if ($this->verificaFornecedor() == true) {
                $sql = "INSERT INTO fornecedor (nome, apelido, contato, email, telefone) VALUES (:nome, :apelido, :contato, :email, :telefone)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $stmt->bindParam("apelido", $this->apelido, PDO::PARAM_STR);
                $stmt->bindParam(":contato", $this->contato, PDO::PARAM_STR);
                $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                $stmt->execute();
                $this->logIncluir();
            }
        }
    }

    public function verificaFornecedor()
    {
        $sql = "SELECT * FROM fornecedor WHERE nome = :nome";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }



    public function consultaEditar($cod = null)
    {
        $sql = "SELECT *FROM fornecedor WHERE id = :cod";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":cod", $cod, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        } else {
            return array();
        }
    }

    public function consultar($iden = '')
    {

        if ($iden == null) {
            $sql = "SELECT * FROM fornecedor ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            } else {
                return array();
            }
        } else {
            $sql = "SELECT * FROM fornecedor WHERE nome like '%" . $iden . "%' ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            } else {
                return array();
            }
        }
    }

    public function deletar()
    {
        $sql = "DELETE FROM fornecedor WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();
        $this->logExcluir();
        return true;
    }

    public function logEditar()
    {
        require 'log.class.php';
        require 'conn.php';
        $log = new log($this->pdo);
        $log->registrar('Alteração de Fornecedor' . $this->nome . ' id:' . $this->id, $this->user);
    }

    public function logIncluir()
    {
        require 'log.class.php';
        require 'conn.php';
        $log = new Log($pdo);
        $log->registrar("Inclusão de Fornecedor: " . $this->nome, $this->user);
    }

    public function logExcluir()
    {
        require 'log.class.php';
        require 'conn.php';
        $log = new Log($pdo);
        $log->registrar("Exclusão de Fornecedor: " . $this->nome, $this->user);
    }
}
