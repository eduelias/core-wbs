<?

if (!$retorno){
echo("

<html>

<head>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
<meta name='GENERATOR' content='Microsoft FrontPage 4.0'>
<meta name='ProgId' content='FrontPage.Editor.Document'>
<title>Nova pagina 1</title>
</head>

<body>
<form method='POST' action='geraidremoto.php?retorno=1'>
  <p><font face='Verdana' size='1'><b>SENHA: <input type='password' name='senha' size='20'>
  <input type='submit' value='GERAR IDENTIFICAÇÂO' name='B1'></b></font></p>
</form>


</body>

</html>
</html>



");
}else{

if ($senha == "@171171"){

#$id = "ky5d6";
$id = "ky5d6";
$id = md5($id);

// define os cookies
SetCookie("idremoto", $id , time()+207360000, "/", "wbs.maxxmicro.com.br", 0);
SetCookie("idremoto", $id , time()+207360000, "/", "wbs-teste.maxxmicro.com.br", 0);
SetCookie("idremoto", $id , time()+207360000, "/", "200.251.60.121", 0);
SetCookie("idremoto", $id , time()+207360000, "/", "wbs.ipasoft.com.br", 0);
SetCookie("idremoto", $id , time()+207360000, "/", "200.251.60.105", 0);
#SetCookie("idremoto", $id , time()+207360000, "/", "protheus.jfnet.com.br", 0);

#SetCookie("idremoto", "ky5d6" );

// após a pagina recarregar, mostra eles
echo " SISTEMA LIBERADO ";
}else{
echo " SENHA INCORRETA ";
}



}
?>