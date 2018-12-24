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
|  arquivo:     start_produtos_usados_admin_prod_edit.php
|  template:    produtos_usados_admin_prod_edit.htm
+--------------------------------------------------------------
*/

$prod->clear();
$prod->listProdU("codusado, nome, descricao, ppu", "produtos_usados", "codusado = '$codusadoselect'");

$codusado_list = $prod->showcampo0();
$nomeprod_list = $prod->showcampo1();
$descricaoprod_list = $prod->showcampo2();
$ppuprod_list = $prod->showcampo3();

include ("templates/produtos_usados_admin_prod_edit.htm");

?>