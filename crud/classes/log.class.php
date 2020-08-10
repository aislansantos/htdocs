<?php
class Log
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function registrar($acao, $user)
    {

        $sql = "INSERT INTO historico (usuario, data_acao, acao) VALUES  (:user, NOW(), :acao)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":user", $user, PDO::PARAM_STR);
        $stmt->bindParam(":acao", $acao, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function consultar($iden = '')
    {

        //fazer a query com limit
        $sql = "SELECT * FROM historico WHERE usuario LIKE '%$iden%'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        } else {
            return array();
        }
    }
}
