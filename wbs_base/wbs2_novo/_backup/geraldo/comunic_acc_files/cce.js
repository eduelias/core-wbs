/** Componente: ControleCampanha
 * Autor: TEXP218
 *
 */

function ControleCampanha()
{
	this.engineLog = null;
	this.origem	   = null;
	this.campanha  = null;
	this.oferta	   = null;
	this.usuario   = null;
	this.CPF	   = null;
	this.persistLog	= true;

	// recupera os parâmetros iniciais da requisição ou do cookie
	this.recuperaParametros();
}

ControleCampanha.prototype.recuperaParametros = function()
{
	this.origem	  = recuperaValorParametro("ORI");
	this.campanha = recuperaValorParametro("CMP");
	this.oferta	  = recuperaValorParametro("OFT");
	this.usuario  = recuperaValorParametro("CD_USUARIO");
	this.CPF	  = recuperaValorParametro("CPF");
}

ControleCampanha.prototype.logAcesso = function()
{
	if(!isBlankOrNull(this.engineLog))
	{
		var parametros = new Object();

		parametros["ORI"]		 = (isBlankOrNull(this.origem)) ? null : this.origem;
		parametros["CMP"]		 = (isBlankOrNull(this.campanha)) ? null : this.campanha;
		parametros["OFT"]		 = (isBlankOrNull(this.oferta)) ? null : this.oferta;
		parametros["CD_USUARIO"] = (isBlankOrNull(this.usuario)) ? null : this.usuario;
		parametros["CPF"]		 = (isBlankOrNull(this.CPF)) ? null : this.CPF;

		// Define parâmetro que define a persistência do log
		if (isBlankOrNull(this.persistLog) || (this.persistLog!=true && this.persistLog!=false)) {
			parametros["PLOG"] = true;
		} else {
			parametros["PLOG"] = this.persistLog;
		}

		//Define parâmetro que armazenará a URL do sistema que esta chamando o CCE
		parametros["URL1"] = document.location.pathname;
		parametros["URL2"] = document.location.search;

		// Define parâmetro para evitar que ocorra cache da chamada
		parametros["RANDOM"]	= numeroRandomico();

		var urlLog = this.engineLog + "?OPERA=LogAcesso";

		for(parametro in parametros)
		{
			if(parametros[parametro] != null)
			{
				urlLog += "&" + parametro + "=" + parametros[parametro];
			}
		}

		// Gera a tag de imagem para acesso ao CCE
		document.write('<img src="' + urlLog + '" border="0" width="0" height="0" onerror="carregaImagemDefault(this);">');
	}
}

ControleCampanha.prototype.logAcessoSe = function(logicExpr)
{
	if(eval(logicExpr) == true)
	{
		this.logAcesso();
	}
}

/**
 * Funções Utilitárias
 *
 *************************/
 
// recuperaValorParametro - busca na URL na página atual o valor
// para o parâmetro nomeParam fornecido.
function recuperaValorParametro(nomeParam)
{
	var valor;

	valor = getURLParameterValue(document.location.href, nomeParam);

	return valor;
}

// getURLParameterValue - busca na URL fornecida, o valor do parâmetro parameterName.
// Caso não esteja presente, retorna null.
function getURLParameterValue(url, parameterName)
{
	var paramBegin = url.indexOf(parameterName + "=");

	if (paramBegin == -1) // Parameter not found in url
	{
		return null;
	}
	else
	{
		var paramEnd = url.indexOf("&", paramBegin);

		paramEnd = (paramEnd == -1) ? url.length : paramEnd;

		return url.substring(paramBegin + parameterName.length + 1, paramEnd);
	}
}

// ----------------------------------------------------------------------------------
// Incorpora o método trim ao objeto String do Javascript
// ----------------------------------------------------------------------------------
String.prototype.trim = function()
{
	var x = this;
	x = x.replace(/^\s*(.*)/, "$1");
	x = x.replace(/(.*?)\s*$/, "$1");
	return x;
}

// ---------------------------------------------------------------------------------
// Retorna true caso o valor passado seja indefinido, null, ou esteja em branco 
// ---------------------------------------------------------------------------------
function isBlankOrNull(paramValue)
{
	if(typeof(paramValue) == "undefined")
	{
		return true;
	}
	else
	{
		var value = new String(paramValue);
		return value == null || value.trim().length == 0;
	}
}

// ---------------------------------------------------------------------------------
// Dado um objeto imagem, substitui o fonte pela imagem transp.gif.
// Obs.: Utilizado para o tratamento do evento onerror de imagens que não estão
// disponíveis.
// ---------------------------------------------------------------------------------
function carregaImagemDefault(imagem)
{
	imagem.src = "https://www128.abnamro.com.br/cce/img/transp.gif";
}

// ---------------------------------------------------------------------------------
// Gera numero randomico de 9 posições.
// ---------------------------------------------------------------------------------
function numeroRandomico() 
{
   var numero;
   var aux = new String(Math.random() * 10000000000); 
   numero = aux.substring(2, 11);

   return numero;
}