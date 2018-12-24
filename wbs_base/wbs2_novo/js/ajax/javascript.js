////////////////////////////////////////////
// BROWSER DETECTION
////////////////////////////////////////////
var detect = navigator.userAgent.toLowerCase();
var OS,browser,version,total,thestring;
if (checkIt('konqueror'))
{
	browser = "Konqueror";
	OS = "Linux";
}
else if (checkIt('safari')) browser = "Safari"
else if (checkIt('omniweb')) browser = "OmniWeb"
else if (checkIt('opera')) browser = "Opera"
else if (checkIt('webtv')) browser = "WebTV";
else if (checkIt('icab')) browser = "iCab"
else if (checkIt('msie')) browser = "Internet Explorer"
else if (!checkIt('compatible'))
{
	browser = "Netscape Navigator"
	version = detect.charAt(8);
}
else browser = "An unknown browser";

if (!version) version = detect.charAt(place + thestring.length);

if (!OS)
{
	if (checkIt('linux')) OS = "Linux";
	else if (checkIt('x11')) OS = "Unix";
	else if (checkIt('mac')) OS = "Mac"
	else if (checkIt('win')) OS = "Windows"
	else OS = "an unknown operating system";
}

function checkIt(string)
{
	place = detect.indexOf(string) + 1;
	thestring = string;
	return place;
}
////////////////////////////////////////////
////////////////////////////////////////////


////////////////////////////////////////////
// AJAX
///////////////////////////////////////////
function createRequestObject() {

  var xmlhttp;

  /*@cc_on

  @if (@_jscript_version >= 5)

	try {

	  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

	} catch (e) {

	  try {

		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

	  } catch (E) {

		xmlhttp = false;

	  }

	}

  @else

  xmlhttp = false;

  @end @*/

  if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {

	try {

	  xmlhttp = new XMLHttpRequest();

	} catch (e) {

	  xmlhttp = false;

	}

  }

  return xmlhttp;

}
	
	////////////////////////////////////////////////////////////////////////////////
	//                                                                            //
	//  FUNÇÃO QUE CARREGA UM SCRIPT COM OS SEGUINTES PARÂMETROS:                 //
	//  url        -> arquivo que será aberto;                                    //
	//  loadingtxt -> texto que será carregado na janelinha de loading;           //
	//  callback   -> função que irá rodar assim que o arquivo for lido;          //
	//  params     -> alguns parametros para quando rodar a função callback;      //
	//                                                                            //
	////////////////////////////////////////////////////////////////////////////////
	function loadURL(url, loadingtxt, callback, params) {
		var http = createRequestObject();
		var userFunc;

		// Carrega a janelinha com um texto
		loadingOn(loadingtxt);

		http.onreadystatechange = function () {

			if (http.readyState == 4) {
	
				if (callback) {
					userFunc = eval(callback);
					userFunc(http.responseText, params);
				}
				loadingOff();
		
				if (browser == "Internet Explorer")
					http.abort();
			}
		}
		
		http.open('get', url, true);
		http.setRequestHeader('Content-type', 'text/html; charset=ISO-8859-1');
		http.send(null);
	}
// FUNÇÃO QUE MOSTRA A DIV COM UMA MENSAGEM ENQUANTO CARREGA UM SCRIPT
function loadingOn(texto) {
	var loaddiv = document.getElementById("loading");
	
	loaddiv.innerHTML = texto;

	loaddiv.style.visibility = "visible";

}
/////////////////////////////////////////////////////////////////////

// --------------------------------------------------------------- //

// FUNÇAÕ QUE ESCONDE A DIV DE LOAD
function loadingOff() {
	var loaddiv = document.getElementById("loading");
	loaddiv.style.visibility = "hidden";
	loaddiv.innerHTML = "";
}
/////////////////////////////////////////////////////////////////////

// Função que escreve o valor do parâmetro "texto" dentro de uma DIV
function escreveNoHtml(texto, div) {
	document.getElementById(div).innerHTML = texto;
}
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
