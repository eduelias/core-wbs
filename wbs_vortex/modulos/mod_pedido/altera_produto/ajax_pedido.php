<?php
	$bd = new bd();

  $ret['debug']['post'] = $_POST;
  
  $ret['debug']['get'] = $_GET;
  
  $res = $bd->gera_array('pedidoprod.codprod as codprod,nomeprod,ppu as preco,status','produtos,pedidoprod','produtos.codprod = pedidoprod.codprod and pedidoprod.codped = '.$_GET['id']);
  
  $ret['debug']['prod_sql'] = $bd->get_sql();
  
  $cliente = $bd->gera_array('pedido.codcliente,nome,IF(cnpj = "",cpf,cnpj) as doc','pedido,clientenovo','pedido.codcliente = clientenovo.codcliente AND codped ='.$_GET['id']);
  
  $ret['debug']['cliente'] = $bd->get_sql();
  
  $ret['cliente'] = $cliente[0];
  
  $ret['pload'] = $res;

  echo json($ret); 
  
?>