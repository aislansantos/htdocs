<?php
class Usuario
{
    private $pdo;
    private $user;
    private $nivelAcesso;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function fazerLogin($user, $pass)
    {
        $sql = "SELECT nome FROM usuario Where email = '$user' and senha = '$pass'" or die("erro");
        $sql = $this->pdo->query($sql);

        if ($sql->rowCount() > 0) { {
                $_SESSION['usuario'] = $user;
                $_SESSION['ativo'] = true;
                $_SESSION['ativo'];
               // $_SESSION['logado'] = $sql['id'];
               // exit;
                header('location: menu_Principal.php');
                return true;
            }
        } else {
            return false;
        }
    }

    public function setUsuario($user)
    {
        $this->user = $user;

        $sql = "SELECT * FROM usuario WHERE email = :user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":user", $user, pdo::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            $stmt = $stmt->fetch();
            $this->nivelAcesso = $stmt['nivelAcesso'];
        }
    }

    public function getPermissoes(){
        return $this->nivelAcesso;
    }
}
