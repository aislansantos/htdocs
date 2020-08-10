CREATE VIEW vw_itempedidocompra AS	
SELECT  pc.numero_Pedido, fn.id ,fn.nome, pr.codigo, pr.descricao, ic.qtde_ItemCompra, ic.vlr_ItemCompra,
SUM(ic.qtde_ItemCompra * ic.vlr_ItemCompra) AS totalitens
FROM pedidocompra pc 
INNER JOIN itempedidocompra ic
ON	pc.id = ic.id_PedCompra
INNER JOIN	produto pr
ON ic.id_ProdCompra = pr.id
INNER JOIN fornecedor fn
ON pc.id_Fornecedor = fn.id
GROUP BY pc.numero_Pedido,pr.descricao, ic.qtde_ItemCompra, ic.vlr_ItemCompra;

SELECT * FROM vw_itempedidocompra;

SELECT SUM(totalitens) FROM vw_itempedidocompra WHERE numero_pedido = "282/2020";

CREATE VIEW vw_pedidocompra AS
SELECT pc.numero_Pedido, fn.nome, fl.nome AS nomefl,
(SELECT SUM(totalitens) FROM vw_itempedidocompra WHERE numero_Pedido = pc.numero_Pedido ) AS totalpedido
FROM pedidocompra pc
INNER JOIN fornecedor fn
ON pc.id_Fornecedor = fn.id
INNER	JOIN filial fl
ON	pc.id_Filial = fl.id
INNER	JOIN vw_itempedidocompra vwipc
ON	totalitens = vwipc.totalitens
GROUP BY pc.numero_Pedido, fn.nome, fl.nome;
