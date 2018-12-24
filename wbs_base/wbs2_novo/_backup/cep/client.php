<?php
// setando o include path para o diretório "class"
set_include_path("class");
require_once('SOAP/Client.php');

$sc = new SOAP_Client("http://127.0.0.1/cep/server.php");
$method = 'Busca';
$params = array('cep' => $_POST['cep']);
$options = array('namespace' => 'urn:CEP');
$res = $sc->call($method, $params, $options);

if (PEAR::isError($res)) {
  echo $res->getMessage();
}
?>
<html>
  <head>
    <title>Consulta de endereço</title>
  </head>
  <body>
    <form name="fcep" action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
      CEP: <input type="text" name="cep" maxlength="9" />
      <input type="submit" />
    </form>
    <?php if ($res) { ?>
    <?=$res->logradouro?>: <?=$res->endereco?><br />
    Complemento: <?=$res->complemento?><br />
    Bairro: <?=$res->bairro_ini?><br />
    <? if (!empty($res->bairro_fim)) { ?>
      Bairro final: <?=$res->bairro_fim?><br />
    <? } ?>
    Cidade: <?=$res->cidade?><br />
    Estado: <?=$res->uf?><br />
    <?php } ?>
  </body>
</html>
