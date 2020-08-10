<?php
class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $sexo;
    private $nivelAcesso;
    private $dataCadastro;
    private $pdo;

    public function __construct($i = 0)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=controle_soja;host=localhost", "root", "");
        } catch (PDOException $e) {
            echo "Falha:" . $e->getMessage();
        }
        if (!empty($i)) {

            $sql = "SELECT * FROM usuario WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":id", $i, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch();
                $this->id = $data['id'];
                $this->nome = $data['nome'];
                $this->email = $data['email'];
                $this->senha = $data['senha'];
                $this->sexo = $data['sexo'];
                $this->nivelAcesso = $data['nivelAcesso'];
                $this->dataCadastro = $data['dataCadastro'];
            }
        }
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
        } else {
            $sql = "INSERT INTO usuario (nome, email, senha, sexo, nivelAcesso, dataCadastro) VALUES (:nome, :email, :senha, :sexo, :nivelAcesso, NOW())";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
            $stmt->bindValue(":senha", $this->senha, PDO::PARAM_STR);
            $stmt->bindParam(":sexo", $this->sexo, PDO::PARAM_INT);
            $stmt->bindParam(":nivelAcesso", $this->nivelAcesso, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function deletar()
    {
        $sql = "DELETE FROM usuario WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

    public function consultar($iden = '')
    {
        if ($iden == '') {
            //calcula a quantidade de paginas que vai ter no total.
            $total = 0;
            $sql = "SELECT COUNT(*) as c FROM usuario";
            $sql = $this->pdo->query($sql);
            $sql = $sql->fetch();
            $total = $sql['c'];
            $paginas = $total / 5;
            //gera os links e cria acesso para as paginas gera os numeros
            for ($q = 0; $q < $paginas; $q++) {
                echo '<a href="./usu_Consultar.php?p=' . ($q + 1) . '" class="btn btn-light pag">' . ($q + 1) . '   </a>';
            }
            // pega o numero da pagina e atribui as consultas.
            $pg = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $pg = addslashes($_GET['p']);
            }
            $p = ($pg - 1) * 5;
            //fazer a query com limit
            $sql = "SELECT * FROM usuario LIMIT $p, 5";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            } else {
                return array();
            }
        } else {
            //fazer a query com limit
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
}
