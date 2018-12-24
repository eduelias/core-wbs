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
|  arquivo:     config.inc.php
+--------------------------------------------------------------
*/

//BANCO DE DADOSerror_reporting(E_ALL); # report all errors
#error_reporting(E_ALL); # report all errors
#ini_set("display_errors", "0"); # but do not echo the errors
#define('ADODB_ERROR_LOG_TYPE',3);
#define('ADODB_ERROR_LOG_DEST','C:/errors.log');
#include('adodb/adodb-errorhandler.inc.php');
include('adodb/adodb.inc.php');
define("WBS_TIPODB", "mysql");
$conn_db = ADONewConnection(WBS_TIPODB);
/*
// BANCO DE DADOS WBS
define("WBS_SERVER", "localhost");
define("WBS_DB", "sif_base");
define("WBS_USER", "root");
define("WBS_PASSWORD", "");
*/
// BANCO DE DADOS WBS
define("WBS_SERVER", "10.20.30.250");
define("WBS_DB", "sif_base");
define("WBS_USER", "sif");
define("WBS_PASSWORD", "!sif@123");

// BANCO DE DADOS DATAWARE
define("DATA_SERVER", "10.20.30.250");
define("DATA_DB", "sif_dataware");
define("DATA_USER", "dataware");
define("DATA_PASSWORD", "data");

// BANCO DE DADOS SITE IPASOFT
define("IPA_SERVER", "10.20.30.250");
#define("IPA_SERVER", "localhost");
define("IPA_DB", "site_ipasoft");
define("IPA_USER", "site_ipasoft");
define("IPA_PASSWORD", "!manager@321");

//CONFIGURACAO DE VARIAVEIS
define("DIR_SISTEMA", "wbs2_novo");
define("MODULOS_ACTIVE", "S"); //S => ATIVA , N => DESATIVA;

// DEFINE DIRETORIOS DO WBS
define("DIR_CSS", DIR_SISTEMA."/css");
define("DIR_JS", DIR_SISTEMA."/js");
define("DIR_IMAGES", DIR_SISTEMA."/images");
define("DIR_BOTOES", DIR_IMAGES."/botoes");
define("DIR_AJAX", DIR_SISTEMA."/ajax");
define("DIR_MODULOS", "modulos");


?>
