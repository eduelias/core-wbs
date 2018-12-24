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
|  arquivo:	rodape.php
|  template:    layout_rodape.php
+--------------------------------------------------------------
*/

// Calcula tempo de processamento da pagina - inicio
$f_timer = ereg_replace('0\.([0-9\.]*) ([0-9]*)','\\2.\\1',microtime());
$loadpage = ($f_timer-$d_timer);
$loadpage = number_format($loadpage, 4, ',', '');

// INCLUI TEMPLATE
include("templates/layout_rodape.htm");

?>
