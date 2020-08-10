<?php
class CadastroCLiente
{
    private $id;
    private $nome;
    private $cpf;
    private $gerado;
    private $enviado;
    private $autorizado;
    private $lancado;
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
    public function setNome($n)
    {
        $this->nome = $n;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setCpf($c)
    {
        $this->cpf = $c;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setGerado($g)
    {
        $this->gerado = $g;
    }
    public function getGerado()
    {
        return $this->gerado;
    }
    public function setEnviado($e)
    {
        $this->enviado = $e;
    }
    public function getEnviado()
    {
        return $this->enviado;
    }
    public function setAutorizado($a)
    {
        $this->autorizado = $a;
    }
    public function getAutorizado()
    {
        return $this->autorizado;
    }
    public function setLancado($l)
    {
        $this->lancado = $l;
    }
    public function getLancado()
    {
        return $this->lancado;
    }


    public function verificaCliente()
    {
        $sql = "SELECT * FROM clientes WHERE nome = :nome";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function Salvar()
    {
        if (!empty($this->id)) {
            $sql = "UPDATE clientes SET nome = :nome, cpf = :cpf, acordoGerado = :acordoGerado,
            acordoEnviado = :acordoEnviado, acordoAutorozado = :acordoAutorozado,
            volumeLancado = :volumeLancado WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
            $stmt->bindParam(":acordoGerado", $this->gerado, PDO::PARAM_STR);
            $stmt->bindParam(":acordoEnviado", $this->enviado, PDO::PARAM_STR);
            $stmt->bindParam(":acordoAutorozado", $this->autorizado, PDO::PARAM_STR);
            $stmt->bindParam(":volumeLancado", $this->lancado, PDO::PARAM_STR);
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            if ($this->verificaCliente() == true) {
                $sql = "INSERT INTO clientes (nome, cpf, acordoGerado, acordoEnviado, acordoAutorozado, volumeLancado ) 
                VALUES (:nome, :cpf, :acordoGerado, :acordoEnviado, :acordoAutorozado, :volumeLancado )";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
                $stmt->bindParam(":acordoGerado", $this->gerado, PDO::PARAM_STR);
                $stmt->bindParam(":acordoEnviado", $this->enviado, PDO::PARAM_STR);
                $stmt->bindParam(":acordoAutorozado", $this->autorizado, PDO::PARAM_STR);
                $stmt->bindParam(":volumeLancado", $this->lancado, PDO::PARAM_STR);
                $stmt->execute();
            }
        }
    }

    public function ConsultaCliente()
    {
        $sql = "SELECT id, nome, cpf, acordoGerado, acordoEnviado, acordoAutorozado, volumeLancado,
         
         case
         when acordoGerado = 0 then 'vermelho'
         when acordoGerado = 1 then 'verde'
         end estiloAcordoGerado,

         case
         when acordoGerado = 0 then 'não'
         when acordoGerado = 1 then 'sim'
         end textoAcordoGerado,

         case
         when acordoEnviado = 0 then 'vermelho'
         when acordoEnviado = 1 then 'verde'
         end estiloAcordoEnviado,
         
         case
         when acordoEnviado = 0 then 'não'
         when acordoEnviado = 1 then 'sim'
         end textoAcordoEnviado,
         
         case
         when acordoAutorozado = 0 then 'vermelho'
         when acordoAutorozado = 1 then 'verde'
         end estiloAcordoAutorozado,
         
         case
         when acordoAutorozado = 0 then 'não'
         when acordoAutorozado = 1 then 'sim'
         end TextoAcordoAutorozado,

         case
         when volumeLancado = 0 then 'vermelho'
         when volumeLancado = 1 then 'verde'
         end estiloVolumeLancado,
         
         case
         when volumeLancado = 0 then 'não'
         when volumeLancado = 1 then 'sim'
         end TextoVolumeLancado

         from clientes";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        } else {
            return array();
        }
    }

    /*   public function ConsultaCliente()
    {
        $sql = "SELECT * FROM clientes  ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        } else {
            return array();
        }
    }*/

    public function consultaEditar($cod)
    {
        $sql = "SELECT * FROM clientes WHERE id = :cod";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":cod", $cod, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        } else {
            return array();
        }
    }

    public function deletarCliente($cod)
    {
        $sql = "DELETE FROM clientes WHERE id = :cod";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":cod", $cod, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

    public function populaTabela($item)
    {
        
        echo "<td>".$item['nome']."</td>";
        echo "<td>".$item['id']."</td>";
        echo "<td>".$item['cpf']."</td>";

        echo '<td class=" '. $item['estiloAcordoGerado']  . '"> ' . $item['textoAcordoGerado'] . ' </td>';
        echo '<td class=" '. $item['estiloAcordoEnviado']  . '"> ' . $item['textoAcordoEnviado'] . ' </td>';
        echo '<td class=" '. $item['estiloAcordoAutorozado']  . '"> ' . $item['TextoAcordoAutorozado'] . ' </td>';
        echo '<td class=" '. $item['estiloVolumeLancado']  . '"> ' . $item['TextoVolumeLancado'] . ' </td>';
    }

}
