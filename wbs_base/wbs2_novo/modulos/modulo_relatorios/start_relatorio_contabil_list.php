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
|  arquivo:     start_relatorio_posvenda_index.php
|  template:    relatorio_posvenda_index.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    case "Pesquisar" :
        $db->connect_data();

        //$db->$conn->debug = true;

        $condicaopesq = " datalanc >= '2006-01-01' and datalanc <= '2006-12-31' ";
        if ($datainicio AND $datafim)
        {
            
			#$condicaopesq = "datalanc >= '$datainicio' and datalanc <= '$datafim' ";
			#$condicaopesq = " datalanc <= '2006-12-31' ";
            
        }
        

        $rs_pesq_pa = $db->query_db("SELECT datalanc, nf, codficha, codprod, entrada, saida, pcu, id_mod, codped, codoc FROM modelo_maxxmicro WHERE $condicaopesq and codficha = '$codprod_pesq' and posicao = 'PA' ORDER BY datalanc","SQL_NONE","N");
        
        $rs_pesq_pp = $db->query_db("SELECT datalanc, nf, codficha, codprod, entrada, saida, pcu, id_mod, codped, codoc FROM modelo_maxxmicro WHERE $condicaopesq and codficha = '$codprod_pesq' and posicao = 'PP' ORDER BY datalanc, idop, id_mod","SQL_NONE","N");
       

    break;
    
   
}

$db->connect_data();

$rs_drop = $db->query_db("SELECT modelo_maxxmicro.codprod FROM modelo_maxxmicro GROUP by modelo_maxxmicro.codprod","SQL_NONE","N");


include ("templates/relatorio_contabil_list.htm");


$db->connect_wbs();

$db->disconnect();
?>
