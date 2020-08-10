<?php

class PedidoCompra
{
    private $id;
    private $numero_Pedido;
    private $tipo_Compra;
    private $dt_Vencimento;
    private $observacao;
    private $id_Filial;
    private $id_Fornecedor;
    private $dt_Pedido;
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
    public function setNumero_Pedido($np)
    {
        $this->numero_Pedido = $np;
    }
    public function getNumero_Pedido()
    {
        return $this->numero_Pedido;
    }
    public function setTipoCompra($tc)
    {
        $this->tipo_Compra = $tc;
    }
    public function getTipoCompra()
    {
        return $this->tipo_Compra;
    }
    public function setDtVencimento($dv)
    {
        $this->dt_Vencimento = $dv;
    }
    public function getDtVencimento()
    {
        return $this->dt_Vencimento;
    }
    public function setObservacao($obs)
    {
        $this->observacao = $obs;
    }
    public function getObservacao()
    {
        return $this->observacao;
    }
    public function setFilial($fl)
    {
        $this->id_Filial = $fl;
    }
    public function getFilial()
    {
        return $this->id_Filial;
    }
    public function setFornecedor($fn)
    {
        $this->id_Fornecedor = $fn;
    }
    public function getFornecedor()
    {
        return $this->id_Fornecedor;
    }
    public function setDtPedido($dp)
    {
        $this->dt_Pedido = $dp;
    }
    public function getDtPedido()
    {
        return $this->dt_Pedido;
    }
    public function setUser($u)
    {
        $this->user = $u;
    }
    public function getUser()
    {
        return $this->user;
    }

    public function Salvar()
    {
        if (!empty($this->id)) {
            $sql = "UPDATE pedidoCompra SET numero_Pedido = :numeroPedido, 
            dt_Vencimento = :dtVencimento, observacao = :observacao, id_Filial = :filial,
            id_Fornecedor = :fornecedor WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":numeroPedido", $this->numero_Pedido, PDO::PARAM_STR);
            $stmt->bindParam(":dtVencimento", $this->dt_Vencimento, PDO::PARAM_STR);
            $stmt->bindParam(":observacao", $this->observacao, PDO::PARAM_STR);
            $stmt->bindParam(":filial", $this->id_Filial, PDO::PARAM_INT);
            $stmt->bindParam(":fornecedor", $this->id_Fornecedor, PDO::PARAM_INT);
            $stmt->bindParam(":id", $this->id, PDO::PARAM_STR);
            $stmt->execute();
            //$this->logEditar();
        } else {
            /* if ($this->verificaVendedor() == true) {
                $sql = "INSERT INTO vendedor (nome) VALUES (:nome)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $stmt->execute();
                $this->logIncluir();
            } else {
            }*/
        }
    }


    public function Consultar($iden = '')
    {
        if ($iden == null) {
            $sql = "SELECT * FROM vw_pedidocompra ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            } else {
                return array();
            }
        } else {
            $sql = "SELECT * FROM vw_pedidocompra WHERE nome like '%" . $iden . "%' ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            } else {
                return array();
            }
        }
    }

    public function consultaEditarPedidoCompra($cod = null)
    {
        $sql = "SELECT * FROM vw_pedidocompra WHERE idPed = :cod";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":cod", $cod, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        } else {
            return array();
        }
    }

    public function Verifica()
    {
    }
}
