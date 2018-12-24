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
|  arquivo:     start_saci_admin_index.php
|  template:    saci_admin_index.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    // Aberto
	case "Aberto" :
        $condicaopesq = "hist = 'N' AND ";
		$contornohist = "N";
		break;

    // Historico
	case "Historico" :
        $condicaopesq = "hist = 'S' AND ";
		$contornohist = "S";
		break;

    // Pesquisar
	case "Pesquisar" :
        //echo "$pesqhist2<br>";
        $condicaopesq = "hist = '$pesqhist' AND ";
		$contornohist = "$pesqhist";
        if ($pesqcod <> "") {
    		$condicaopesq .= "codatend = '$pesqcod' AND ";
        }
        if ($pesqnome <> "") {
            $condicaopesq .= "clientenovo.nome like '%$pesqnome%' AND ";
        }
        if ($pesqtipo == "0") {
            $condicaopesq .= "tipo = 'EXT' AND ";
        }
        if ($pesqtipo == "1") {
            $condicaopesq .= "tipo = 'INT' AND ";
        }
		break;

    // Gravar
    case "Gravar" :
        $dtagenda = "$anoagenda-$mesagenda-$diaagenda";
        // bloqueia data agenda
        $prod->clear();
        $prod->listProdU("COUNT(*)", "saci_atend", "tipo = 'EXT' AND status = '0' AND hist = 'N' AND dtagenda = '$dtagenda' AND hratend = '$hragenda'");
        $controledata = $prod->showcampo0();
        //echo $controledata;

    	// pega tipo
        $prod->clear();
        $prod->listProdU("tipo","saci_cat", "idcat = '$motivocat'");
        $tipo2 = $prod->showcampo0();

        // Tempo retorno
        $prod->clear();
        $datahoraatual = gmDate("Y-m-d H:i:s");
        $prod->listProdMY("DATE_ADD('$datahoraatual', INTERVAL $retorno MINUTE)", "", $array_1, $array_campo_1, "");
        $prod->mostraProd($array_1, $array_campo_1, 0);
        $retorno2 = $prod->showcampo0();

    	// var
    	$prod->clear();
    	$prod->setcampo0("");
    	$prod->setcampo1($pesqcodcliente2);
    	$prod->setcampo2($motivocat);
    	$prod->setcampo3($motivosubcat);
    	$prod->setcampo4($codped);
    	$prod->setcampo5($contato);
    	$prod->setcampo6($dddtel);
    	$prod->setcampo7($tel);
    	$datahoraatual = gmDate("Y-m-d H:i:s");
    	$prod->setcampo8($datahoraatual); // data e hora do inicio do atendimento
    	$prod->setcampo9(""); // data e hora do fim do atendimento
        if ($tipo2 == "INT") {
            $dtagenda = "0000-00-00";
            $hragenda = "00:00:00";
        }
    	$prod->setcampo10($dtagenda);
    	$prod->setcampo11($hragenda);
    	$prod->setcampo12($solucao);
    	$prod->setcampo13($solucaostatus);
    	$prod->setcampo14($tipo2);
    	$prod->setcampo15($obs);
    	$prod->setcampo16($status);
    	$prod->setcampo17("N");
    	$prod->setcampo18($humor);
    	$prod->setcampo19($retorno2);

        if ($controledata == 0){
        	$prod->addProd("saci_atend", $uregatend);
        } else {
            $txterrodata = "<b>DATA/HORA do agendamento está em uso.<br>Favor escolher outra DATA/HORA disponível.</b>";
        }

    	// Status
        $prod->clear();
        $prod->setcampo0("");
        $prod->setcampo1($uregatend);
        $prod->setcampo2($motivocat);
        $prod->setcampo3($motivosubcat);
        $datahoraatual = gmDate("Y-m-d H:i:s");
        $prod->setcampo4($datahoraatual); // DATA HORA STATUS
        $prod->setcampo5($dtagenda);
        $prod->setcampo6($hragenda);
        $prod->setcampo7($obs);
        $prod->setcampo8($solucao);
        $prod->setcampo9($login);
        $prod->setcampo10("0");

        if ($controledate == 0){
        	$prod->addProd("saci_atend_status", $uregatendstatus);
        }

        $condicaopesq = "hist = 'N' AND ";
		$contornohist = "N";
    	break;

    case "Editar" :
        // Tempo retorno
        $prod->clear();
        $datahoraatual = gmDate("Y-m-d H:i:s");
        $prod->listProdMY("DATE_ADD('$datahoraatual', INTERVAL $retorno MINUTE)", "", $array_1, $array_campo_1, "");
        $prod->mostraProd($array_1, $array_campo_1, 0);
        $retorno2 = $prod->showcampo0();

    	// pega tipo
        $prod->clear();
        if ($alt_motivo == "S") {
            $motivocat_sql = $motivocat;
        } else {
            $motivocat_sql = $motivocat2;
        }
        $prod->listProdU("tipo","saci_cat", "idcat = '$motivocat_sql'");
        $tipo2 = $prod->showcampo0();

        // Atualizando
        $prod->clear();

        if ($tipo2 == "INT") {
            $dtagenda = "0000-00-00";
            $hragenda = "00:00:00";
        }
        if ($tipo2 == "EXT") {
            $dtagenda = "$anoagenda-$mesagenda-$diaagenda";
        }

        $datahoraatual = gmDate("Y-m-d H:i:s");
        $condicaoup2 = ", dtatendfim = '$datahoraatual'";
        //status
        if ($status <> "0") {
            $histcond = "S";
        }
        if ($status == "0") {
            $histcond = "N";
        }
        if ($alt_motivo == "S") {
            $condicaoup = "contato = '$contato', dddtel = '$dddtel', tel = '$tel', codcat = '$motivocat', codsubcat = '$motivosubcat', dtagenda = '$dtagenda', dtagenda = '$dtagenda', hratend = '$hragenda', obs = '$obs', solucao = '$solucao', solucaostatus = '$solucaostatus', status = '$status', hist = '$histcond', tipo = '$tipo2', retorno = '$retorno2'";
            $motivocat_status = $motivocat;
            $motivosubcat_status = $motivosubcat;
        } else {
            $condicaoup = "contato = '$contato', dddtel = '$dddtel', tel = '$tel', dtagenda = '$dtagenda', dtagenda = '$dtagenda', hratend = '$hragenda', obs = '$obs', solucao = '$solucao', solucaostatus = '$solucaostatus', status = '$status', hist = '$histcond', retorno = '$retorno2'";
            $motivocat_status = $motivocat2;
            $motivosubcat_status = $motivosubcat2;
        }
        $prod->upProdU("saci_atend", "$condicaoup $codicaoup2", "codatend = '$codatendimento'");

    	// Status
        $prod->clear();
        $prod->setcampo0("");
        $prod->setcampo1($codatendimento);
        $prod->setcampo2($motivocat_status);
        $prod->setcampo3($motivosubcat_status);
        $datahoraatual = gmDate("Y-m-d H:i:s");
        $prod->setcampo4($datahoraatual); // DATA HORA STATUS
        $dtagenda = "$anoagenda-$mesagenda-$diaagenda";
        $prod->setcampo5($dtagenda);
        $prod->setcampo6($hragenda);
        $prod->setcampo7($obs);
        $prod->setcampo8($solucao);
        $prod->setcampo9($login);
        $campo10 = "1"; // EDITADO
        if ($status == "1") { // SE FECHADO
            $campo10 = "3"; // FINALIZADO
        }
        if ($status == "2") { // SE CANCELADO CLIENTE
            $campo10 = "2"; // CANCELADO
        }
        if ($status == "3") { // SE CANCELADO OPERADOR
            $campo10 = "2"; // CANCELADO
        }
        $prod->setcampo10($campo10);
        $prod->addProd("saci_atend_status", $uregatendstatus);

        $condicaopesq = "hist = 'N' AND ";
		$contornohist = "N";
    	break;

    default :
        $condicaopesq = "hist = 'N' AND ";
		$contornohist = "N";
        break;
}

$prod->clear();
$prod->listProdSum("codatend, saci_atend.codcliente, dtatendinicio, dtagenda, hratend, solucaostatus, tipo, status, humor, retorno", "saci_atend, clientenovo", "$condicaopesq clientenovo.codcliente = saci_atend.codcliente AND tipo = 'EXT'", $arrayx, $array_campox, "ORDER BY codatend DESC LIMIT 0,50");
//$prod->listProdSum("codatend, saci_atend.codcliente, dtatendinicio, dtagenda, hratend, solucaostatus, tipo, status", "saci_atend, clientenovo", "$condicaopesq clientenovo.codcliente = saci_atend.codcliente", $arrayx, $array_campox, "ORDER BY dtagenda, hratend, codatend ASC LIMIT 0,50");

//echo "CONDICAO: $condicaopesq<br>HIST: $hist";

for($i = 0; $i < count($arrayx); $i++ ){
	$prod->mostraProd( $arrayx, $array_campox, $i );

	$codatend_list[$i] = $prod->showcampo0();
	$codcliente_list[$i] = $prod->showcampo1();
	$dtatendinicio_list[$i] = $prod->showcampo2();
	$dtagenda_list[$i] = $prod->showcampo3();
	$hragenda_list[$i] = $prod->showcampo4();
	$solucaostatus_list[$i] = $prod->showcampo5();
	$tipo_list[$i] = $prod->showcampo6();
	$status_list[$i] = $prod->showcampo7();
	$humor_list[$i] = $prod->showcampo8();
	$retorno_list[$i] = $prod->showcampo9();

	// DATA INICIO
    $frmdatainiciodd2[$i] = substr($dtatendinicio_list[$i], 8, 2);
    $frmdatainiciomm2[$i] = substr($dtatendinicio_list[$i], 5, 2);
    $frmdatainicioaaaa2[$i] = substr($dtatendinicio_list[$i], 0, 4);
    $frmdatainiciohh2[$i] = substr($dtatendinicio_list[$i], 11, 2);
    $frmdatainiciomin2[$i] = substr($dtatendinicio_list[$i], 14, 2);
    $frmdatainicioss2[$i] = substr($dtatendinicio_list[$i], 17, 2);
    $datainicio2_view[$i]  = "$frmdatainiciodd2[$i]/$frmdatainiciomm2[$i]/$frmdatainicioaaaa2[$i] <br> $frmdatainiciohh2[$i]:$frmdatainiciomin2[$i]:$frmdatainicioss2[$i]";

	// DATA ATEND
    $frmdatadd_atend[$i] = substr($dtagenda_list[$i], 8, 2);
    $frmdatamm_atend[$i] = substr($dtagenda_list[$i], 5, 2);
    $frmdataaaaa_atend[$i] = substr($dtagenda_list[$i], 0, 4);
    $frmdata_atend[$i] = "$frmdatadd_atend[$i]/$frmdatamm_atend[$i]/$frmdataaaaa_atend[$i]";

	// Consulta Nome do Cliente
    $prod->clear();
    $prod->listProdU("nome, endereco, bairro, cep, numero, complemento","clientenovo", "codcliente='$codcliente_list[$i]'");
    $nomecliente_list[$i] = $prod->showcampo0();
    $endereco_list[$i] = $prod->showcampo1();
    $bairro_list[$i] = $prod->showcampo2();
    $cep_list[$i] = $prod->showcampo3();
    $numero_list[$i] = $prod->showcampo4();
    $complemento_list[$i] = $prod->showcampo5();

    // Interno ou Externo
    if ($tipo_list[$i] == "EXT") {
        $tipoverde_list[$i] = " bgcolor='#CEECCE'";
    }

    // Solução Status
    if ($solucaostatus_list[$i] == "NO") {
        $solucaostatus2_list[$i] = "saci_sol_no";
    }
    if ($solucaostatus_list[$i] == "OK") {
        $solucaostatus2_list[$i] = "saci_sol_ok";
    }

/*
    $prod->clear();
    $datahoraatual = gmDate("Y-m-d H:i:s");
    $prod->listProdMY("TIMEDIFF('$retorno_list[$i]', '$datahoraatual')", "", $array_2, $array_campo_2, "");
    $prod->mostraProd($array_2, $array_campo_2, 0);
    $tempo_list[$i] = $prod->showcampo0();
*/

}

include ("templates/saci_infohelp_index.htm");

?>
