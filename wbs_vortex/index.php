<? if( ereg("MSIE", $_SERVER['HTTP_USER_AGENT']) ){

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML TRANSITIONAL//EN" "http://www.w3.org/TR/html4/strict.dtd">';

}
?>
<head>
	<?php 
		include($_SERVER["DOCUMENT_ROOT"]."/wbs_vortex/include/classes/wbs_session.class.php");
		$sess = new wbs_session('/tmp');
		$sess->kill_session($_COOKIE['PHPSESSID']);
		flush();  //Faz os arquivos carregados serem mostrados tão logo cheguem
		//header();
		include('../config.inc.php');
		
		switch ($_GET[ecode]){
		
			case(1):{
				$erro_class = 'erro_msg';
				$erro_msg = 'USUARIO OU SENHA INV&Aacute;LIDOS';
			}break;
			case(2):{
				$erro_class = 'erro_msg';
				$erro_msg = 'SESS&Atilde;O EXPIROU';
			}break;
			default:{
				$erro_msg = '';
				$erro_class = 'hidd';
			}
		
		}
	?>
	<title>WBS - Web Business System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<meta name="author" content="Kico Zaninetti" />
	<meta name="author" content="Felipe" />
    <meta name="author" content="Eduardo Elias Saleh" />

	<link rel="shortcut icon" href="img/icone.png" type="image/x-icon" />
      
    <link href="include/css/login.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?=C_INC?>css_links.php">
    <script type="text/javascript" src="<?=C_INC?>js_links.php"></script>
    <link href="<?=DIR_HOME?>/wbs_base/css/sistema.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.hidd{
	display:none;
}
.erro_msg{
	background:url(modulos/mod_rma/images/red_shield.png) no-repeat #FFDDDD scroll 4% 50%;
	border:thin solid #FFAAAA;
	font-size:18px;
	font-weight:bolder;
	height:48px;
	margin-bottom:4%;
	padding-left:52px;
	padding-top:5%;
	text-align:center;
}
.login_erro_janela {
	border: 1px solid #EA0000;
}
.login_erro_txt {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #EA0000;
}
-->
</style>
</head>
<body>
	<div id="telalogin">
		<div id="topo">
			<img src="<?=IMAGES?>login.jpg" alt="Login" id="login" style="margin-top:31px;"/>
			<img src="<?=VIMAGES?>logowbs.png" alt="WBS - Web Business System" id="logowbs" style="margin-top:-7px;" />
		</div>
		<form method="POST" action="../wbs_base/restrito.php">
		<input type="hidden" name="tabela" value="vendedor">
		<input type="hidden" name="campoid" value="codvend">
		<input type="hidden" name="campousuario" value="nome">
		<input type="hidden" name="camposenha" value="senha">
        <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="3">
          <tr>
            <td><table width="100%"  border="0" cellspacing="4" cellpadding="0">
              <tr>
                <td class="login_aviso">Entre com sua identifica&ccedil;&atilde;o: </td>
              </tr>
              <tr>
                <td class="td_login"><table  border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td><strong>Identifica&ccedil;&atilde;o</strong></td>
                    <td><img src="<?=IMAGES?>spacer.gif" width="10" height="5"></td>
                    <td>Usu&aacute;rio:</td>
                    <td><input name="usuario" type="text" class="campo3" id="login" size="14" maxlength="14" /></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td class="td_login"><table width="100%"  border="0" cellpadding="2" cellspacing="2">
                  <tr valign="top">
                    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="td_login_senha">
                      <tr>
                        <td><table width="100%"  border="0" cellspacing="2" cellpadding="3">
                          <tr>
                            <td align="center">Informe sua senha no campo abaixo:</td>
                          </tr>
                          <tr>
                            <td align="center"><strong>Senha:
                             <!-- <input name="password" type="password" class="campo3" id="password" size="8" maxlength="8" OnFocus="SetarEvento(this,8,'ALERTLOGIN');AtualizaObj(1);">-->
                             <input name="senha" type="password" class="campo3" id="password" size="8" maxlength="8" >
                              <input name="OK" type="submit" class="botao3" id="OK" value="ok">
                            </strong></td>
                          </tr>
                          <tr>
                            <td><input type='hidden' name='retlogin' value='1'><input type='hidden' name='inilog' value='1'><input type='hidden' name='inilogin' value='1'><input type='hidden' name='startlog' value='1'><input type='hidden' name='Action' value='list'><input type='hidden' name='desloc' value='0'><input name="agencia" type="hidden" size="0"><input name="conta" type="hidden">&nbsp;</td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td>
	  <?
	  if ($erro_msg <> ""){
	  ?>
				<br>
				<table width="100%"  border="0" align="center" cellpadding="2" cellspacing="1">
                  <tr>
                    <td height="32" colspan="2"><div class="<?=$erro_class?>"><?=$erro_msg?></td>
                  </tr>
                </table>
                  	  <?
	  }
	  ?>
                  <table width="100%"  border="0" cellpadding="3" cellspacing="2" class="nomeprod2">
                  <tr>
                    <td align="center">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Para a utiliza&ccedil;&atilde;o do sistema, recomenda-se o uso dos navegadores:<br>
                      &#8226; Mozilla FireFox (vers&atilde;o 1.0) (<a href="http://www.mozilla.org/">Download</a>) <br>
                      &#8226; Microsoft Internet Explorer (vers&atilde;o 5.5 ou superior)</td>
                  </tr>
                  <tr>
                    <td align="center">Tamb&eacute;m &eacute; recomendado que a resolu&ccedil;&atilde;o do monitor esteja ajustada em 1024x768, para a melhor visualiza&ccedil;&atilde;o. </td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellpadding="3" cellspacing="3" class="rodape">
      <tr>
        <td align="center">Copyright &copy; 2002/<?php echo date(Y); ?> - 
      Todos os direitos reservados.<br>
      Processado em <? echo $loadpage; ?> segundos. </td>
      </tr>
    </table>
    </td>
    </tr><tr><td>

   
    <table  border="0" align="center" cellpadding="2" cellspacing="1" width="100%">
  <tr>
    <td align="right"><a href="http://www.php.net" target="_blank"><img src="<?=IMAGES?>bt_php.gif" width="80" height="15" border="0"></a></td>
    <td align="center"><a href="http://www.mysql.com" target="_blank"><img src="<?=IMAGES?>bt_mysql.gif" width="80" height="15" border="0"></a></td>
    <td align="left"><a href="http://adodb.sourceforge.net/" target="_blank"><img src="<?=IMAGES?>bt_adodb.gif" width="80" height="15" border="0"></a></td>
  </tr>
</table></td></tr>    </table>
    </form>
    </div>
</body>
</html>
