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
|  arquivo:     start_layout_rodape_index.php
|  template:    start_layout_rodape.htm
+--------------------------------------------------------------
*/

// Calcula tempo de processamento da pagina - fim
$f_timer = ereg_replace('0\.([0-9\.]*) ([0-9]*)','\\2.\\1',microtime());
$loadpage = ($f_timer-$d_timer);
$loadpage = number_format($loadpage, 4, ',', '');

// Chama template
include("templates/start_layout_rodape.htm");

?>
