<?php
class CadastroProduto
{
    private $id;
    private $descricao;
    private $pms;
    private $fornecedor;
    private $embalagem;
    private $intacta;
    private $codigo;
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
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setPms($p)
    {
        $this->pms = $p;
    }
    public function getPms()
    {
        return $this->pms;
    }

    public function setFornecedor($f)
    {
        $this->fornecedor = $f;
    }
    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    public function setIntacta($i)
    {
        $this->intacta = $i;
    }
    public function getIntacta()
    {
        return $this->intacta;
    }

    public function setCodigo($c)
    {
        $this->codigo = $c;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setEmbalagem($e)
    {
        $this->embalagem = $e;
    }
    public function getEmbalagemo()
    {
        return $this->embalagem;
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
            $sql = "UPDATE produto SET descricao = :descricao, pms = :pms, codigo = :codigo, intacta = :intacta, id_Fornecedor = :id_Fornecedor , id_Embalagem = :id_Embalagem WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
            $stmt->bindParam(":pms", $this->pms, PDO::PARAM_STR);
            $stmt->bindParam(":codigo", $this->codigo, PDO::PARAM_STR);
            $stmt->bindParam(":intacta", $this->intacta, PDO::PARAM_INT);
            $stmt->bindParam(":id_Fornecedor", $this->fornecedor, PDO::PARAM_INT);
            $stmt->bindParam(":id_Embalagem", $this->embalagem, PDO::PARAM_INT);
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
            $stmt->execute();
            $this->logEditar();
        } else {
            if ($this->verificaProduto() == true) {
                $sql = "INSERT INTO produto (descricao, pms, codigo, intacta, id_Fornecedor, id_Embalagem) VALUES (:descricao, :pms, :codigo, :intacta, :id_Fornecedor, :id_Embalagem)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
                $stmt->bindParam(":pms", $this->pms, PDO::PARAM_STR);
                $stmt->bindParam(":codigo", $this->codigo, PDO::PARAM_STR);
                $stmt->bindParam(":intacta", $this->intacta, PDO::PARAM_INT);
                $stmt->bindParam(":id_Fornecedor", $this->fornecedor, PDO::PARAM_INT);
                $stmt->bindParam(":id_Embalagem", $this->embalagem, PDO::PARAM_INT);
                $stmt->execute();
                $this->logEditar();
            }
        }
    }

    public function verificaProduto()
    {
        $sql = "SELECT * FROM vw_itemcompleto WHERE descricao = :descricao";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarProduto($iden = '')
    {

        $sql = "SELECT * FROM vw_itemcompleto";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        } else {
            return array();
        }
    }

    public function consultaEditar($cod = null)
    {
        $sql = "SELECT * FROM produto WHERE id = :cod";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":cod", $cod, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        } else {
            return array();
        }
    }

    public function deletar()
    {
        $sql = "DELETE FROM produto WHERE id = :id";
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
        $log->registrar('Alteração de Fornecedor' . $this->descricao . ' id:' . $this->id, $this->user);
    }

    public function logIncluir()
    {
        require 'log.class.php';
        require 'conn.php';
        $log = new Log($pdo);
        $log->registrar("Inclusão de Fornecedor: " . $this->descricao, $this->user);
    }

    public function logExcluir()
    {
        require 'log.class.php';
        require 'conn.php';
        $log = new Log($pdo);
        $log->registrar("Exclusão de produto: " . $this->descricao, $this->user);
    }
}
