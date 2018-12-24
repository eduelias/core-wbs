<?php

set_time_limit(0);

/* INCLUDES, NÃO MEXER */
set_include_path("class");
require_once('SOAP/Server.php');
require_once('DB.php');

/* CONFIGURAÇÕES DO SQL */
define("HOSTDB", "localhost");
define("USERDB", "root");
define("PASSDB", "!amargo@123");
define("BASEDB", "cep");
define("TYPEDB", "mysql");

$ss = new SOAP_Server();
$sc = new CEP();
$ss->addObjectMap($sc, 'urn:CEP');
$ss->service($HTTP_RAW_POST_DATA);

// Sample SOAP Class
class CEP {
  function Busca($cep) {
    if (ereg('^([0-9]{5})-([0-9]{3})$', $cep)) {
      $db =& DB::connect(TYPEDB.'://'.USERDB.':'.PASSDB.'@'.HOSTDB.'/'.BASEDB);
  
      if (DB::isError($db)) {
        return new SOAP_Fault($db->getMessage(), 'Server');
      } else {
        /* pesquisando qual estado (uf) faz parte o cep */
        $sql    =  "SELECT LOWER(UF) AS uf FROM uf WHERE Cep1 <= '".substr($cep, 0, 5)."' AND Cep2 >= '".substr($cep, 0, 5)."'";
        $res    =& $db->limitQuery($sql, 0, 1);
        
        if ($res->numRows() > 0) {
          $uf  =& $res->fetchRow(DB_FETCHMODE_ASSOC);
          $res->free();

          $sql         = "SELECT LOGRADOURO AS logradouro, Nome AS endereco, BAI_INI AS bairro_ini, BAI_FIM AS bairro_fim, CEP AS cep, COMPLEMENTO AS complemento, Localidade AS cidade FROM ".$uf['uf']." WHERE CEP='".$cep."'";
          $res         =& $db->query($sql);
          if ($res->numRows() > 0) {
            $dados       = $res->fetchRow(DB_FETCHMODE_ASSOC);
	    $dados       = array_map("htmlentities", $dados);
            $dados['uf'] = strtoupper($uf['uf']);
      
            return $dados;
          } else {
            return new SOAP_Fault('Nenhum registro localizado. Ex.: 80240-000', 'Server');
          }
        } else {
          return new SOAP_Fault('Nenhum registro localizado. Ex.: 80240-000', 'Server');
        }
      }
  
      $db->disconnect();
    } else {
      return new SOAP_Fault('Formato inválido. Ex.: 01452-002', 'Server');
    }
  }
}
?>

