<?php
class Log
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo =$pdo;
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
        if ($iden == '') {
            //calcula a quantidade de paginas que vai ter no total.
            $total = 0;
            $sql = "SELECT COUNT(*) as c FROM historico";
            $sql = $this->pdo->query($sql);
            $sql = $sql->fetch();
            $total = $sql['c'];
            $paginas = $total / 8;
            //gera os links e cria acesso para as paginas gera os numeros
            for ($q = 0; $q < $paginas; $q++) {
                echo '<a href="./log_Consultar.php?p=' . ($q + 1) . '" class="btn btn-light pag">' . ($q + 1) . '   </a>';
            }
            // pega o numero da pagina e atribui as consultas.
            $pg = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $pg = addslashes($_GET['p']);
            }
            $p = ($pg - 1) * 8;
            //fazer a query com limit
            $sql = "SELECT * FROM historico LIMIT $p, 8";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            } else {
                return array();
            }
        } else {
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

}
