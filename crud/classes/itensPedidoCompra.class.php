<?php
class ItemPedidoCompra
{
    private $id;
    private $id_PedCompra;
    private $id_ProdCompra;
    private $qtde_ItemCompra;
    private $vlr_ItemCompra;
    private $total_ItemCompra;
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
    public function setIdPed($iPed)
    {
        $this->id_PedCompra = $iPed;
    }
    public function getIdPed()
    {
        return $this->id_PedCompra;
    }
    public function setIdProd($iProd)
    {
        $this->id_ProdCompra = $iProd;
    }
    public function getIdProd()
    {
        return $this->id_ProdCompra;
    }
    public function setQtIcompra($qtIcompra)
    {
        $this->qtde_ItemCompra = $qtIcompra;
    }
    public function getQtIcompra()
    {
        return $this->qtde_ItemCompra;
    }
    public function setVlrIcompra($vlrIcompra)
    {
        $this->vlr_ItemCompra = $vlrIcompra;
    }
    public function getVlrIcompra()
    {
        return $this->vlr_ItemCompra;
    }
    public function setTIcompra($tIcompra)
    {
        $this->total_ItemCompra = $tIcompra;
    }
    public function getTIcompra()
    {
        return $this->total_ItemCompra;
    }
    public function setUser($u)
    {
        $this->user = $u;
    }
    public function getUser()
    {
        return $this->user;
    }


    public function Consultar($iden = '')
    {
        $sql = "SELECT * FROM vw_itempedidocompra WHERE id = $iden ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        } else {
            return array();
        }
    }
}
