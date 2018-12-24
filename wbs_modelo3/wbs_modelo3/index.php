<head>

	<title>WBS - Web Business System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />	
	<meta name="author" content="Kico Zaninetti" />
	<meta name="author" content="Felipe" />

	<script type="text/javascript" src="include/js/tecladovirtual.js"></script>

	<link rel="shortcut icon" href="img/icone.png" type="image/x-icon" />
	<link href="include/css/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="telalogin">
		<div id="topo">
			<img src="images/login/login.png" alt="Login" id="login" />
			<img src="images/login/logowbs.png" alt="WBS - Web Business System" id="logowbs" />
		</div>
		<br />
		<h1>ENTRE COM SUA IDENTIFICAÇÃO:</h1>
		<form method="POST" action="logar.php">
		<input type="hidden" name="tabela" value="vendedor">
		<input type="hidden" name="campoid" value="codvend">
		<input type="hidden" name="campousuario" value="nome">
		<input type="hidden" name="camposenha" value="senha">
		<div class="box">
			<strong>Identificação</strong>
			<span id="usuario">Usuário: <input type="text" name="usuario" /></span>
		</div>
		<div class="box" id="teclado">
			<div id="senha">
				Informe sua senha clicando sobre o teclado virtual ao lado.
				<br />
				<br />
				Senha:<br /><input type="password" name="senha" size="15" /> <input type="submit" value="OK" class="btn" />
			</div>
			<script>
				CarregarImagens('images/login/teclado_virtual.gif', 'images/login/teclado_virtual_caps.gif', 'images/login/teclado_virtual_shift.gif', 'images/login/teclado_virtual_caps_shift.gif')
				CarregarCampos('usuario%14%A', 'senha%8%A')


				// tratamento para IE 4.0
				if (is.ie4)
					MostrarTeclado(positionLayer(520),false);
				else
					MostrarTeclado(positionLayer(490),false);
			</script>
		</div>
		</form>
		<center>
		 Central de Atendimento <br />
		(0 x x 3 2)  2 1 0 1 - 5 9 0 0
		</center>
			<p>Para a utilização do sistema, recomenda-se o uso dos navegadores:</p>
			<ul>
				<li>Mozilla FireFox (versão 1.0) (Download)</li>
				<li>Microsoft Internet Explorer (versão 5.5 ou superior)</li>
			</ul>
			<p>Também é recomendado que a resolução do monitor esteja ajustada em 1024x768, para a melhor visualização.</p>
		<div class="box center">
		Copyright © 2002/2007 Grupo Ipasoft - Todos os direitos reservados.
		</div>

	</div>
</body>
</html>