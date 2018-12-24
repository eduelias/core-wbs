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
    //conteudo.innerHTML = '<div id="carregando"><img src="<? echo DIR_IMAGES; ?>/indicator.gif" width="16" height="16" /> carregando...</div>';
	
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