<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Teste</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">	
span:visited {
	text-decoration:none; color:#003399;
}
span:hover {
	text-decoration:underline; color:#003399;
}
span {
	color:#003399;
	cursor: pointer;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
#carregando {
	position:absolute;
	top:45%;
	left:45%;
	z-index:500;
	width:120px;
	height:50px;
	font:bold 11px/50px Verdana,Geneva,Arial,Helvetica,sans-serif;
	text-align:center;
	color:#666;
	background-color: #FFFFFF;
}
</style>
<script type="text/javascript">

var request;
var dest;

function processStateChange(){
    if (request.readyState == 4){
        contentDiv = document.getElementById(dest);
        if (request.status == 200){
            response = request.responseText;
            contentDiv.innerHTML = response;
			//alert('Eu sou bom');
        } else {
            contentDiv.innerHTML = "Error: Status "+request.status;
        }
    }
}

function loadHTML(URL, destination){

	//Exibe o texto carregando no div conteúdo
    var conteudo = document.getElementById("content");
    //conteudo.innerHTML = '<div id="carregando"><img src="loading.gif" /></div>';
    conteudo.innerHTML = '<div id="carregando"><img src="indicator.gif" width="16" height="16" /> carregando...</div>';
	
    dest = destination;
    if (window.XMLHttpRequest){
        request = new XMLHttpRequest();
        request.onreadystatechange = processStateChange;
        request.open("GET", URL, true);
        request.send(null);
    } else if (window.ActiveXObject) {
        request = new ActiveXObject("Microsoft.XMLHTTP");
        if (request) {
            request.onreadystatechange = processStateChange;
            request.open("GET", URL, true);
            request.send();
        }
    }
}

</script>
</head>

<body>
<span onclick="loadHTML('adodb_teste.php', 'content')">Eu to ficando BOM!</span>
<br />
<br />
<div id="content"></div>
</body>
</html>
