<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2006 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_sistema_tabela.php
|  template:    sistema_tabela.htm
+--------------------------------------------------------------
*/

$senha = substr(ereg_replace("[^A-Z0-9]", "", crypt(time())).ereg_replace("[^A-Z0-9]", "", crypt(time())).ereg_replace("[^A-Z0-9]", "", crypt(time())),0, 7);

include ("templates/sistema_senha.htm");

?>