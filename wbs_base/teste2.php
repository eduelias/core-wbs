
<?php
// Come�o das Configura��es
$nome = "PHPBrasil";
$senha = "123456";
// Fim das Configura��es

if ($PHP_AUTH_USER !=$nome || $PHP_AUTH_PW !=$senha) {
header("WWW-Authenticate: basic realm='Sistema de Autentifica��o'");
header("HTTP/1.0 401 Unauthorized");
echo "Nome de Usu�rio ou Senha Inv�lidos!\n";
exit;
} else {


echo('
<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Warrior of the Light - O Guerreiro da Luz</title>
</head>

<body bgcolor="#000000" text="#FFFFFF" link="#FFFF00" vlink="#FFFF66" alink="#FFCC00">
<table border="1" width="100%" height="481" bgcolor="#000000" bordercolorlight="#FFFF66" bordercolordark="#FFFF00" bordercolor="#FFFFFF" cellspacing="0">
  <tr>
    <td width="68%" height="475">
      <p align="center"><b><font face="Monotype Corsiva"><br>
      <font color="#FFCC00" size="4" face="Monotype Corsiva"><i>Manual do
      Guerreiro da Luz</i></font></font></b></p>
      <p align="left"><font color="#FFFFFF"><span style="font-size: 12.0pt; mso-bidi-font-size: 8.0pt; font-family: Times New Roman; mso-fareast-font-family: Times New Roman; mso-ansi-language: PT-BR; mso-fareast-language: PT-BR; mso-bidi-language: AR-SA">&nbsp;&nbsp;&nbsp;&nbsp;
      </span><font face="Verdana" size="1"><span style="mso-bidi-font-size: 8.0pt; mso-fareast-font-family: Times New Roman; mso-ansi-language: PT-BR; mso-fareast-language: PT-BR; mso-bidi-language: AR-SA">
      Um
      guerreiro da luz n�o conta apenas com suas for�as; usa tamb�m a energia
      do seu advers�rio.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ao iniciar o combate, tudo que ele possui �
      o seu entusiasmo, e os golpes que aprendeu enquanto treinava; a medida que
      a luta avan�a, descobre que o entusiasmo e o treinamento n�o s�o
      suficientes para vencer: � preciso experi�ncia.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ent�o ele abre seu cora��o para o
      Universo, e pede a Deus para inspira-lo, de modo que cada golpe do inimigo
      seja tamb�m uma li��o de defesa para ele.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Os companheiros comentam: &quot;como �
      supersticioso. Parou a luta para rezar, e respeita os truques do advers�rio.&quot;<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O guerreiro n�o responde a estas provoca��es.
      Sabe que, sem inspira��o e experi�ncia, n�o h� treinamento que d�
      resultado.
      </span></font></font></p>
      <hr>
      <p align="left"><font face="Verdana" size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font color="#FFFFFF">
      <span style="mso-bidi-font-size: 8.0pt; mso-fareast-font-family: Times New Roman; mso-ansi-language: PT-BR; mso-fareast-language: PT-BR; mso-bidi-language: AR-SA">Um
      guerreiro da luz jamais trapaceia; mas sabe distrair seu advers�rio.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Por mais ansioso que esteja, joga com os
      recursos da estrat�gia para atingir seu objetivo. Quando percebe que est�
      no final de suas for�as, faz com que o inimigo pense que n�o tem pressa.
      Quando precisa atacar o lado direito, move as suas tropas para o lado
      esquerdo. Se pretenderes iniciar a luta imediatamente, finge que est� com
      sono e prepara-se para dormir.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Os amigos comentam: &quot; vejam como perdeu
      seu entusiasmo&quot;. Mas ele n�o d� import�ncia aos coment�rios,
      porque os amigos n�o conhecem suas t�ticas de combate.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Um guerreiro da luz sabe o que quer. E n�o
      precisa ficar explicando.</span></font></font></p>
      <hr>
      <p align="left"><font face="Verdana" size="1"><span style="mso-bidi-font-size: 8.0pt; mso-fareast-font-family: Times New Roman; color: #333333; mso-ansi-language: PT-BR; mso-fareast-language: PT-BR; mso-bidi-language: AR-SA">&nbsp;&nbsp;&nbsp;&nbsp; </span><font color="#FFFFFF"><span style="mso-bidi-font-size: 8.0pt; mso-fareast-font-family: Times New Roman; mso-ansi-language: PT-BR; mso-fareast-language: PT-BR; mso-bidi-language: AR-SA">Um
      guerreiro da luz respeita o principal ensinamento do I Ching: &quot;a
      perseveran�a � favor�vel&quot;.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mas ele sabe que perseveran�a nada tem a
      ver com a insist�ncia. Existem �pocas que os combates se prolongam al�m
      do necess�rio, exaurindo suas for�as e enfraquecendo seu entusiasmo.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nestes momentos, o guerreiro reflete: &quot;
      uma guerra prolongada termina destruindo o pr�prio pa�s vitorioso.&quot;<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ent�o ele retira suas for�as do campo de
      batalha, e d� uma tr�gua a si mesmo. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Persevera
      em sua vontade, mas sabe esperar o melhor momento para um novo ataque.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Um guerreiro sempre volta a luta. Mas nunca
      faz isto por teimosia - e sim porque nota a mudan�a no tempo.</span></font></font></p>
      <p align="left">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>

</html>
<!-- Fim da p�gina -->
');


}
?>