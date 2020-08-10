<?php
class CadastroUsuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $sexo;
    private $nivelAcesso;
    private $dataCadastro;
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

    public function SetEmail($e)
    {
        $this->email = $e;
    }
    public function GetEmail()
    {
        return $this->email;
    }

    public function SetSenha($p)
    {
        $this->senha = $p;
    }
    // a senha não tem o porque "pegar" não precisando implementar o Get da senha, já q é criptografada e não pode ser visuslizada.

    public function SetSexo($s)
    {
        $this->sexo = $s;
    }
    public function GetSexo()
    {
        return $this->sexo;
    }

    public function SetNivelAcesso($a)
    {
        $this->nivelAcesso = $a;
    }
    public function GetNivelAcesso()
    {
        return $this->nivelAcesso;
    }

    public function SetDataCadastro($c)
    {
        $this->dataCadastro = $c;
    }
    public function GetDataCadastro()
    {
        return $this->dataCadastro;
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
            $sql = "UPDATE usuario SET nome = :nome, email = :email, senha = :senha, sexo = :sexo, nivelAcesso = :nivelAcesso WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
            $stmt->bindValue(":senha", $this->senha, PDO::PARAM_STR);
            $stmt->bindParam(":sexo", $this->sexo, PDO::PARAM_INT);
            $stmt->bindParam(":nivelAcesso", $this->nivelAcesso, PDO::PARAM_INT);
            $stmt->bindParam(":id", $this->id, PDO::PARAM_STR);
            $stmt->execute();
            $this->logEditar();
        } else {
            if ($this->verificaUsuario() == true) {
                $sql = "INSERT INTO usuario (nome, email, senha, sexo, nivelAcesso, dataCadastro) VALUES (:nome, :email, :senha, :sexo, :nivelAcesso, NOW())";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                $stmt->bindValue(":senha", $this->senha, PDO::PARAM_STR);
                $stmt->bindParam(":sexo", $this->sexo, PDO::PARAM_INT);
                $stmt->bindParam(":nivelAcesso", $this->nivelAcesso, PDO::PARAM_INT);
                $stmt->execute();
                $this->logIncluir();
            } else {
            }
        }
    }

    public function deletar()
    {
        $sql = "DELETE FROM usuario WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();
        $this->logExcluir();
        return true;
    }

    public function consultar($iden = '')
    {
        if ($iden == null) {
            $sql= "SELECT * FROM usuario";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            }else{
                return array();
            }
        } else {
            $sql = "SELECT * FROM usuario WHERE nome = '$iden' ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            } else {
                return array();
            }
        }
    }

    public function consultaEditar($id = null)
    {
        $sql = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        } else {
            return array();
        }
    }

    public function verificaUsuario()
    {
        $sql = "SELECT * FROM usuario WHERE email = :user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":user", $this->email, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function logIncluir()
    {
        require 'classes/log.class.php';
        require 'conn.php';
        $log = new Log($pdo);
        $log->registrar("Inclusão de Usuario: " . $this->nome, $this->user);
    }

    public function logEditar()
    {
        require 'classes/log.class.php';
        require 'conn.php';
        $log = new Log($pdo);
        $log->registrar("Alreração de Usuario:  " . $this->nome . " id: " . $this->id, $this->user);
    }

    public function logExcluir()
    {
        require 'log.class.php';
        require 'conn.php';
        $log = new Log($pdo);
        $log->registrar("Exclusão de Usuario: " . $this->nome, $this->user);
    }
}
