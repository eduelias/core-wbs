
<?php
// Começo das Configurações
$nome = "PHPBrasil";
$senha = "123456";
// Fim das Configurações

if ($PHP_AUTH_USER !=$nome || $PHP_AUTH_PW !=$senha) {
header("WWW-Authenticate: basic realm='Sistema de Autentificação'");
header("HTTP/1.0 401 Unauthorized");
echo "Nome de Usuário ou Senha Inválidos!\n";
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
      guerreiro da luz não conta apenas com suas forças; usa também a energia
      do seu adversário.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ao iniciar o combate, tudo que ele possui é
      o seu entusiasmo, e os golpes que aprendeu enquanto treinava; a medida que
      a luta avança, descobre que o entusiasmo e o treinamento não são
      suficientes para vencer: é preciso experiência.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Então ele abre seu coração para o
      Universo, e pede a Deus para inspira-lo, de modo que cada golpe do inimigo
      seja também uma lição de defesa para ele.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Os companheiros comentam: &quot;como é
      supersticioso. Parou a luta para rezar, e respeita os truques do adversário.&quot;<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O guerreiro não responde a estas provocações.
      Sabe que, sem inspiração e experiência, não há treinamento que dê
      resultado.
      </span></font></font></p>
      <hr>
      <p align="left"><font face="Verdana" size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font color="#FFFFFF">
      <span style="mso-bidi-font-size: 8.0pt; mso-fareast-font-family: Times New Roman; mso-ansi-language: PT-BR; mso-fareast-language: PT-BR; mso-bidi-language: AR-SA">Um
      guerreiro da luz jamais trapaceia; mas sabe distrair seu adversário.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Por mais ansioso que esteja, joga com os
      recursos da estratégia para atingir seu objetivo. Quando percebe que está
      no final de suas forças, faz com que o inimigo pense que não tem pressa.
      Quando precisa atacar o lado direito, move as suas tropas para o lado
      esquerdo. Se pretenderes iniciar a luta imediatamente, finge que está com
      sono e prepara-se para dormir.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Os amigos comentam: &quot; vejam como perdeu
      seu entusiasmo&quot;. Mas ele não dá importância aos comentários,
      porque os amigos não conhecem suas táticas de combate.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Um guerreiro da luz sabe o que quer. E não
      precisa ficar explicando.</span></font></font></p>
      <hr>
      <p align="left"><font face="Verdana" size="1"><span style="mso-bidi-font-size: 8.0pt; mso-fareast-font-family: Times New Roman; color: #333333; mso-ansi-language: PT-BR; mso-fareast-language: PT-BR; mso-bidi-language: AR-SA">&nbsp;&nbsp;&nbsp;&nbsp; </span><font color="#FFFFFF"><span style="mso-bidi-font-size: 8.0pt; mso-fareast-font-family: Times New Roman; mso-ansi-language: PT-BR; mso-fareast-language: PT-BR; mso-bidi-language: AR-SA">Um
      guerreiro da luz respeita o principal ensinamento do I Ching: &quot;a
      perseverança é favorável&quot;.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mas ele sabe que perseverança nada tem a
      ver com a insistência. Existem épocas que os combates se prolongam além
      do necessário, exaurindo suas forças e enfraquecendo seu entusiasmo.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nestes momentos, o guerreiro reflete: &quot;
      uma guerra prolongada termina destruindo o próprio país vitorioso.&quot;<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Então ele retira suas forças do campo de
      batalha, e dá uma trégua a si mesmo. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Persevera
      em sua vontade, mas sabe esperar o melhor momento para um novo ataque.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Um guerreiro sempre volta a luta. Mas nunca
      faz isto por teimosia - e sim porque nota a mudança no tempo.</span></font></font></p>
      <p align="left">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>

</html>
<!-- Fim da página -->
');


}
?>