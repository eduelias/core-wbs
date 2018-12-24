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
|  arquivo:     start_jornal_index.php
|  template:    jornal_index.htm
+--------------------------------------------------------------
*/

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 10;

switch ($Action)
{
    // Pesquisar
    case "Pesquisar" :

        if ($titulopesq <> "") {
            $condicaopesq = "titulo like '%$titulopesq%' AND ";
        }
        if ($secaopesq <> 0) {
            $condicaopesq .= "jornal_noticia.codsecao = '$secaopesq' AND";
        }
        #echo "titulopesq: $titulopesq<br>";
        #echo "secaopesq: $secaopesq<br>";
        #echo "condicaopesq: $condicaopesq<br>";

    break;

    // Pesquisar
    case "PublicNoticia" :

        $db->connect_ipa();
        $rs_public = $db->conn->Execute("UPDATE jornal_noticia SET status = 'PUBLIC' WHERE codnoticia = '$codnoticia_select'");
        $db->retorno_db($rs_public, "S");
        $db->disconnect();

    break;

    // Inserir Seção
    case "HistNoticia" :

        $db->connect_ipa();
        $rs_hist = $db->conn->Execute("UPDATE jornal_noticia SET status = 'HIST' WHERE codnoticia = '$codnoticia_select'");
        $db->retorno_db($rs_hist, "S");
        $db->disconnect();

    break;
}

$db->connect_ipa();

//$db->conn->debug = true;

$rs_secao = $db->conn->Execute("SELECT * FROM jornal_secao WHERE habilitado = 'S'");
$db->retorno_db($rs_secao, "N");

$rs_count = $db->conn->Execute("SELECT count(*) AS total_reg FROM jornal_noticia, jornal_secao WHERE $condicaopesq jornal_secao.codsecao = jornal_noticia.codsecao AND jornal_secao.habilitado = 'S'");
$total_reg = $rs_count->fields[0];
$db->retorno_db($rs_count, "N");

// PARTICULARIDADES DO PAGINADOR
// select ou numero
$paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
$inicio_pesq = $pagina * $acrescimo;

$rs_noticia = $db->conn->Execute("SELECT nome, codnoticia, titulo, edicao, ano, destaque, status, jornal_noticia.datahoraadd, datahorapublic_ini FROM jornal_noticia, jornal_secao WHERE $condicaopesq jornal_secao.codsecao = jornal_noticia.codsecao AND jornal_secao.habilitado = 'S' ORDER BY codnoticia LIMIT $inicio_pesq, $acrescimo");
$db->retorno_db($rs_noticia, "N");

$db->disconnect();

include ("templates/jornal_noticia_index.htm");

?>
