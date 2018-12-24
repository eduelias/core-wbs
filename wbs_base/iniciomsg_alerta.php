<?
//TOPO

header( 'refresh: 60' );

require("classprod.php" );
$prod = new operacao();

// INICIO DA CLASSE
$prod = new operacao();

	$prod->listProdU("codvend", "vendedor", "nome='$login'");
		$codvend_topo = $prod->showcampo0();

		$prod->listProdSum("COUNT(*)", "msg", "codvend = '$codvend_topo' and status = 'NO'", $array78, $array_campo78, "" );
		$prod->mostraProd($array78, $array_campo78, 0 );
		$cont78 = $prod->showcampo0();

		if ($cont78 > 0 ){
			$img_topo = "images/newmail1.gif";
			$titulo = "NOVA MENSAGEM";
		}else{
			$img_topo = "images/newmail2.gif";
			$titulo = "NENHUMA<br>MENSAGEM";
		}

		// PARA PAGINA DE SEGURANCA SECUNDARIA
	$prod->listProdU("codpg", "seguranca", "arquivo='iniciomsg.php'");
	$codpgmsg = $prod->showcampo0();

	echo("
	<body topmargin='0' leftmargin='0'>
	");

	if ($cont78 > 0 ){
			echo("
			<bgsound src='sons/notify.wav' >
			");
	} 
	echo("
 <div align='center'>
  <table border='0' width='100%' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='50%'>
        <p align='right'><img border='0' src='$img_topo' width='48' height='30'></td>
      <center>
      <td width='50%'><font size='1' face='Verdana' ><b>&nbsp;$titulo</b></font></td>
      </tr>
    </table>
  </center>
 </div>
    ");

	?>