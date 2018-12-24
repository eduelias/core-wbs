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
|  arquivo:     start_produtos_usados_view.php
|  template:    produtos_usados_img.htm
+--------------------------------------------------------------
*/

$prod->clear();
$prod->listProdU("nome, img_name, img_height, img_width", "produtos_usados", "codusado = '$codusadoselect'");

$nomeprod_list = $prod->showcampo0();
$imgprod_list = $prod->showcampo1();
$imgaltura_list = $prod->showcampo0();
$imglargura_list = $prod->showcampo1();

include ("templates/produtos_usados_img.htm");

?>