<?

// Calcula tempo de processamento da pagina - inicio
$d_timer = ereg_replace('0\.([0-9\.]*) ([0-9]*)','\\2.\\1',microtime());

require("classprod.php" );
include("config.inc.php" );

$prod = new operacao();

$retlogin = 0;

if ($_SERVER['REQUEST_METHOD'] == "GET")
{
	if ($erro == 2){$erro_msg = "ACESSO RESTRITO A IPASOFT ";}

	#include ("sif-topo.php");
	// TEMPLATE
	#include ("templates/login_page.htm");
	include("templates/start_layout_login.htm");
}

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$erro = 0;
	#echo("AQUI - $login - $password - ". $_POST['password']. "<br>");
	$aut_login = $_POST['login'];
	$aut_senha = $_POST['password'];

	$prod->listProdSum("senha, block, msg", "vendedor", "nome='$aut_login'", $array_res, $array_campo_res, "" );

	if (count($array_res) == 1)
	{
		$prod->mostraProd($array_res, $array_campo_res, 0 );
		
			$senha = $prod->showcampo0();
			#$senha = trim($senha);
			$senha_dec = base64_decode("$senha");
			$blockuser = $prod->showcampo1();
	       	$msguser = $prod->showcampo2();

		if ($senha_dec == $aut_senha){

		$prod->listProdU("COUNT(*)", "vendedor", "nome='$aut_login' and senha = '$senha'");
		$res = $prod->showcampo0();

 		if ($res != 1)
		{
			$erro = 1;
			$erro_msg .= "ACESSO NEGADO (Login ou Senha Incorreto!)";
			#echo("AQUI - erro =$erro - $res");
		}
		
		}else{
			$erro = 1;
			$erro_msg .= "ACESSO NEGADO (Senha Incorreta!)";
			$aut_login_rec = $aut_login;
			#	echo("AQUI1 - erro =$erro");
		}
		if ($blockuser == "Y"){

            $erro = 1;
			$erro_msg = "ACESSO BLOQUEADO <BR> $msguser";
			#echo("AQUI3 - erro =$erro");
        }
	}
	else
	{
		$erro = 1;
		$erro_msg .= "ACESSO NEGADO (Login incorreto!)";
			#echo("AQUI2 - erro =$erro");
	}
	
  	if ($erro != 1)
	{
		header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
		header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private");
		header("Content-Description: File Transfer");

  		# Define o limitador de cache para 'private'
		#session_cache_limiter('private, must-revalidate');
		# Define o limite de tempo do cache em 1 minutos
		#session_cache_expire(180);
		# Define o tempo da sessao
		#$expireTime = 60*60*24*100; // 100 days
		#session_set_cookie_params($expireTime);

		session_start();
		header("Cache-Control: private");
		session_register("rootid");
		$_SESSION['rootid'] = $aut_login;
		#setcookie('rootid', $aut_login, time()+$expireTime, '/', 'wbs.ipasoft.com.br',0);

		if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
		header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar . "restrito.php");
		exit;
	}
	#include ("sif-topo.php");
	// TEMPLATE
	#include ("templates/login_page.htm");
	include("templates/start_layout_login.htm");

}
	#include ("sif-rodape.php");

?>
