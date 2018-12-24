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
|  arquivo:     start_produtos_usados_admin_prod_add_sol.php
|  template:    produtos_usados_admin_prod_add_sol.htm
+--------------------------------------------------------------
*/

$prod->clear();
$prod->listProdU("codusado, nome", "produtos_usados", "codusado = '$codusadoselect'");

$codusado_list = $prod->showcampo0();
$nomeprod_list = $prod->showcampo1();

include ("templates/produtos_usados_prod_add_sol.htm");

?>