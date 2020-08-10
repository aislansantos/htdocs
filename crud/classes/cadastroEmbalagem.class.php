<?php
class CadastroEmbalagem
{
    private $id;
    private $descricao;
    private $apelido;
    private $user;
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function setId($i)
    {
        $this->id = $i;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setDescricao($d)
    {
        $this->descricao = $d;
    }
    public function getDescrcao()
    {
        return $this->descricao;
    }
    public function setApelido($a)
    {
        $this->apelido = $a;
    }
    public function getApelido()
    {
        return $this->apelido;
    }
    public function setUser($u)
    {
        $this->user = $u;
    }
    public function getUser()
    {
        return $this->user;
    }

    public function salvar()
    {
        if (!empty($this->id)) {
            $sql = "UPDATE embalagem SET descricao = :descricao, apelido = :apelido WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
            $stmt->bindParam("apelido", $this->apelido, PDO::PARAM_STR);
            $stmt->bindParam("id", $this->id, PDO::PARAM_STR);
            $stmt->execute();
            $this->logEditar();
        } else {
            if ($this->verificaEmbalagem() == true) {
                $sql = "INSERT INTO embalagem (descricao, apelido) VALUES (:descricao, :apelido)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
                $stmt->bindParam("apelido", $this->apelido, PDO::PARAM_STR);
                $stmt->execute();
                $this->logIncluir();
            }
        }
    }

    public function verificaEmbalagem()
    {
        $sql = "SELECT * FROM embalagem WHERE descricao = :descricao";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarEmbalagem($iden = '')
    {

        if ($iden == null) {
            $sql = "SELECT * FROM embalagem ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            } else {
                return array();
            }
        } else {
            $sql = "SELECT * FROM embalagem WHERE descricao like '%" . $iden . "%' ";
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
        $sql = "SELECT * FROM embalagem WHERE id = :cod";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":cod", $cod, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        } else {
            return array();
        }
    }

    public function deletar()
    {
        $sql = "DELETE FROM embalagem WHERE id = :id";
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
        $log->registrar('Alteração de Embalagem' . $this->descricao . ' id:' . $this->id, $this->user);
    }

    public function logIncluir()
    {
        require 'log.class.php';
        require 'conn.php';
        $log = new Log($pdo);
        $log->registrar("Inclusão de Embalagem: " . $this->descricao, $this->user);
    }

    public function logExcluir()
    {
        require 'log.class.php';
        require 'conn.php';
        $log = new Log($pdo);
        $log->registrar("Exclusão de Embalagem: " . $this->descricao, $this->user);
    }
    
}
