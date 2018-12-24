<?php

	include('wbs.class.php');
	include('sinf.class.php');
	
	 
	if (!isset($_GET['codped'])) die('SEM CODPED');
	$codped = $_GET['codped'];
	
	$wbs = new wbs;
	$ibo = new sinf;
	
	$i = 1;
    $last_rec = '0';

    $wbs_query = 'Select caixa,codcliente,codvend,codped FROM pedido WHERE codped = '.$codped.' and caixa = "NO"';
    $wbs_res_pedido = $wbs->query($wbs_query);

    $wbs_query = 'Select codpped,codprod,ppu,qtde FROM pedidoprod WHERE codped = '.$codped;
    $wbs_res_pedidprod = $wbs->query($wbs_query);

    $referencia = date('Ym');

    $sinf_query = "INSERT INTO VENDAS (
		NROORCDAV,
		NSEQVENDAS,
		NEMPRESA,
		REFERENCIA,
		DATA,
		NROCONTROLE,
		NFORCLI,
		F_ORCAMENTO,
		SISTEMAPDV,
		TIPODESCNFPROD,
		GERACREDICMS,
		ID_CRECEBERCONDRECPADRAO,
		VALMANUAL,
		CODORC,
		CODVENDA,
		DTALTERACAO,
		HSALTERACAO,
		DTCADASTRO
		) VALUES (
		(SELECT RREFERENCIA FROM ZERO_FILL_7(GEN_ID(G_NROORCDAV,1))),
		GEN_ID(G_VENDAS,1),
		'001',
        ".$referencia.",
        '".date('d.m.Y')."',
        '".$codped."',
        243,
        'T',
        'F',		
        '1',
        'F',
        9,
		'F',
		GEN_ID(G_VENDAS_CODORC,1), 
		GEN_ID(G_VENDAS_CODVENDA,1),
		'".date('d.m.Y')."',
		'".date('H:i:s')."',
		'".date('d.m.Y')."');";
	
	$ibo->query($sinf_query);
	
	$qsinf_query = 'Select NSEQVENDAS from VENDAS where NROCONTROLE = '.$codped;
    $qsinf_res = $ibo->query($qsinf_query);  
	
	$nseq_aux = $ibo->fetch($qsinf_res);

	$nseqvendas = $nseq_aux['NSEQVENDAS'];
	
	$wbs_query = 'update `pedido` set `nseqvendas` = "'.$nseqvendas.'" where codped = '.$codped;
    $wbs->query($wbs_query);

    while ($pprod = $wbs->fetch($wbs_res_pedidprod)) {
		$ppu = str_replace('.',',',$pprod['ppu']); //substring(roqwpedidoprod.fieldByName('ppu').AsString,',','.');	
		$codprod = str_pad($pprod['codprod'], 14,'0',STR_PAD_LEFT);
		echo $codprod.'<br>';


        $sinf_query = "INSERT INTO vendasprodutos (
				NEMPRESA,
				REFERENCIA,
				DATA,
				NSEQVENDAS,
				NSEQVENDASPRODUTOS,
				CODPRODUTO,
				QUANTIDADE
				CTRLESTOQUE,
				ALIQICMS,
				VRDESCONTO,
				ALIQIPI,
				VRBASEIPI,
				VRBASEST,
				VRIPI,
				VRST,
				VRBASEICMS,
				VRUNITARIO,
				VRICMS,
				COMISSAO,
				BASEREPICMS,
				PERREPICMS,
				VRREPICMS,
				BASEREDICMS,
				PERREDICMS,
				VRREDICMS,
				PERMARGAGREG,
				BASECREDICMS,
				PERCREDICMS,
				PERCREDICMS,
				VRCREDICMS,
				ISENTOICMS,
				ISENTOIPI,
				PERDESCONTO,
				VRTOTAL,
				VRUNITCOMIS,
				SUBSTITUTOTRIBUTARIO,
				VRPRECOMAXIMO,
				VRACRESCIMO,
				PERACRESCIMO,
				ICMSNTRIB
			) VALUES (
				'001',
				".$referencia.",
				'".date('%d.%m.%Y')."', 
				".$nseqvendas.",
				".$i.",
				'".$codprod."',
				".$pprod['qtde'].",
				'T',
				12,
				0,
				2,
				0,
				0,
				0,
				0,
				0,
				".$ppu.",
				0,
				0,
				0,
				0,
				0,
				0,
				0,
				0,
				0,
				0,
				0,
				0,
				0,
				'F',
				'F',
				0,
				0,
				0,
				'T',
				".$ppu.",
				0,
				0,
				'T'
			);";
		$ibo->query($qsinf_query);

        $wbs_query = 'update `pedidoprod` set `nseqvendas` = '.$nseqvendas.' where codped = '.$codped.' and codprod = '.$codprod;
		$wbs->query($wbs_query);
        $i++;
	}
	
	$sinf_query = 'Select * from VENDAS where NSEQVENDAS = '.$nseqvendas;
	$ibo->show($sinf_query);
	
	$sinf_query = 'Select * from VENDAS where NSEQVENDAS = '.$nseqvendas;
	$ibo->show($sinf_query);
	
?>