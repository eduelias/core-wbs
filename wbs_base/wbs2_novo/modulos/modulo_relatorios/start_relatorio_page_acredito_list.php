<?php

/* 
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_saci_admin_atend.php
|  template:    saci_admin_atend.htm
+--------------------------------------------------------------
*/

switch ($Action)
{

	case "pesquisa":

        $len = strlen($nomecliente_pesq);
        $nomecliente_pesq1 = strtolower($nomecliente_pesq);

    	if ($nomecliente_pesq <> "" )
        {
    		$condicao3 = " LCASE(nome) like '%$nomecliente_pesq1%' ";
    	}

    	if ($tipocliente_pesq == 'F')
        {
            if ($cpf_pesq <> "")
            {
                if ($condicao3 <> ""){$condicao3 .=" AND ";}
                $condicao3 .= " cpf='$cpf_pesq' ";
            }
    	}
        if ($tipocliente_pesq == 'J')
        {
            if ($cnpj_pesq <> "")
            {
                if ($condicao3 <> ""){$condicao3 .=" AND ";}
                $condicao3 .= " cnpj='$cnpj_pesq' ";
            }
        }

        //PESQUISA POR CODBARRA
    	if ($codcli_pesq <> ""){

            if ($condicao3 <> ""){$condicao3 .= " AND ";}
    		$condicao3 .= " codcliente = '$codcli_pesq' ";
    	}

        // BLOQUEIA PESQUISA DO HISTORICO
        if (($nomecliente_pesq == "" OR $len <3) AND ($codcli_pesq == "") AND ($cpf_pesq == "" ) AND ($cnpj_pesq == "" ))
    	{
    		$controle = 1;
      	}else{
      		$controle = 0;
      	}

    	#echo("$condicao3 - $controle - $len - tipocliente_pesq = $tipocliente_pesq<BR>");

    	if ($controle == 0){

            $db->connect_wbs();
            #$db->$conn->debug = true;

            $rs = $db->conn->Execute("SELECT codcliente, nome, cpf, cnpj, dddtel1, tel1, endereco, numero, complemento, bairro, cep, cidade, estado, rescredito  FROM clientenovo WHERE  $condicao3 ORDER BY codcliente, nome");
            $db->retorno_db($rs,"N");
           

            $db->disconnect();

    	}//CONTROLE

        include ("templates/relatorio_page_acredito_list.html");

		break;
}

?>