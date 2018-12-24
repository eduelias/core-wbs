defaultEmptyOK = false;//default

function isEmpty(s) {
	return ((s == null) || (s.length == 0))
}

function isDigit (c) {
   return ((c >= "0") && (c <= "9"))
}

function isInteger (s) {
	var i;
    if (isEmpty(s))
       if (isInteger.arguments.length == 1) return defaultEmptyOK;
       else return (isInteger.arguments[1] == true);
    for (i = 0; i < s.length; i++)
    {
	    var c = s.charAt(i);
        if (!isDigit(c)) return false;
    }
    return true;
}

function isValidDate(a){
	var err=0;
	var psj=0;
	if (a.length != 10) err=1;
	d = a.substring(0, 2);// dia
	c = a.substring(2, 3);// '/'
	b = a.substring(3, 5);// mes
	e = a.substring(5, 6);// '/'
	f = a.substring(6, 10);// ano

	if (!isInteger(d)) err=1;
	if (!isInteger(b)) err=1;
	if (!isInteger(f)) err=1;

	if (b<1 || b>12) err = 1;
	if (c != '/') err = 1;
	if (d<1 || d>31) err = 1;
	if (e != '/') err = 1;
	if (f<0 || f>9999) err = 1;
	if (b==4 || b==6 || b==9 || b==11){
		if (d==31) err=1;
	}
	if (b==2){
		var g=parseInt(f/4);
		if (isNaN(g)) {
			err=1;
		}
		if (d>29) err=1;
		if (d==29 && ((f/4)!=parseInt(f/4))) err=1;
	}
	if (err==1){
		return false;
	}
	else{
		return true;
	}
}

function FormataMoeda(valor) {

	var moeda = "";
	var inteiro = "";
	var centavos = "00";
	var indice;
	var cont = 1;

	inteiro = String(valor);
	indice = inteiro.indexOf(".");
	if (indice != -1) {
		centavos = inteiro.substring(indice+1, inteiro.length);
		if (centavos.length > 2)
			centavos = centavos.substring(0, 2);
		else if (centavos.length == 1)
			centavos = centavos.substring(0, 1) + "0";
		else if (centavos.length == 0)
			centavos = "00";

		inteiro = inteiro.substring(0, indice);
	}

	for(i=(inteiro.length-1);i>=0;i--) {
		moeda = inteiro.charAt(i) + moeda;
		if (cont == 3 && i>0) {
			moeda = "." + moeda;
			cont = 0;
		}
		cont++;
	}
	moeda = moeda + "," + centavos;

	return moeda;
}


function abre_janela(theURL,winName,features) {
  window.open(theURL,winName,features);
  return false;
}


function trata_backspace(dado)
{
   NumDig = dado.value;
   TamDig = NumDig.length;
   TamDig--;
   Contador = 0;
   if ((TamDig >= 0) && (event.keyCode == 8))
    { numer = "";
      for (i = TamDig; (i >= 0); i--){
          if ((parseInt(NumDig.substr(i,1))>=0) && (parseInt(NumDig.substr(i, 1))<=9))
            {
             Contador++;
             if ((Contador == 4) && ((TamDig -i) < 5))
              {numer = ","+numer;
               Contador = 0;
               }
             else if ((Contador == 3) && ((numer.length) > 4))  
              {numer = "."+numer;
               Contador = 0;
              }
			  
             numer = NumDig.substr(i, 1)+numer;
			
            }
			}
			if (numer == "001") 
			    numer="";		
			if ((numer.length) == 3 )
			    numer= "0," + numer;

		dado.value = numer;
      };
}

function mascara_valor(form_campo, tam)
{
	var tecla;
	
	if (!tam) {
		tam = 13;
	} else {
		if (tam < 6) {
			tam = tam + 1;
		} else {
			if (tam < 9) {
				tam = tam + 2;
			} else {
				if (tam < 11) {
					tam = tam + 3
				} else {
					tam = tam + 3
				}
			}
		}
	}
	
	if (document.all) {		tecla = event.keyCode;	} else {
		if (document.layers) tecla = form_campo.which;	}
	
	if ((((tecla) > 47) && ((tecla) < 58)) || (tecla = 8)) //teclas numericas
	{
		//valor do form_campo
		numdig = form_campo.value;
		//tamanho (caracteres) do valor do form_campo
		tamdig = numdig.length;
		//inicia variavel contador
		contador = 0;
		if (tamdig > -1 && tamdig < tam) { //limita 13 caracteres (99.999.999,99)
			//inicia variavel numer		
			numer = "";
			for (i = tamdig; (i >= 0); i--){ //looping de acordo com a variavel tamdig
				if ((parseInt(numdig.substr(i,1))>=0) && (parseInt(numdig.substr(i, 1))<=9)) { //
					//incrementa a variavel contador
					contador++;
					if (contador == 2) {
						//adiciona a "," (vírgula)
						numer = ","+numer;
					}
					if ((contador == 5) || (contador == 8) || (contador == 11)) { //de 3 em 3
						//adiciona o "." (ponto)
						numer = "."+numer;
					}
					//soma o resto do valor com o ponto
					numer = numdig.substr(i, 1)+numer;
				}
			}
			//seta o valor do form_campo
			form_campo.value = numer;
			//retorno da funcao
			return true;
		} else {
			//retorno da funcao
			return false;
		}
	} else {
		//retorno da funcao
		return(false)
	}
}

// ----  Elimina todos os caracteres não numéricos de uma string
//       Retorno: string contendo apenas numeros
function eliminaNaoNumerico(valor)
{
	var tamanho;
	var cont;
	var valorNumerico="";
	var numero="0123456789";

	tamanho = valor.length;

	for (cont=0; cont < parseInt(tamanho); cont++)
	{
		if (numero.indexOf(valor.charAt(cont)) != -1)
			valorNumerico += valor.charAt(cont);
	}
	return valorNumerico;
}

function validaFone(numero){
		str = numero.replace("-", "")
		return !isNaN(str)
	}

function strTrim(s) {
	var i, j;
	i = 0;
	while (i<s.length) {
		if (s.charAt(i)!=" ")
			break;
		i++;
	}
	j = s.length-1;
	while (j>=0) {
		if (s.charAt(j)!=" ")
			break;
		j--;
	}
	if (i==j)
		s = s.charAt(i);
	else
		if (i<j)
			s = s.substring(i, j+1);
		else
			s = "";
	return(s);
}

function VerificaTelefone(valor)
{
	var i
	i = valor.indexOf("-")
	if (i != -1)
		if (i != valor.length-5)
			return false
		else
			valor = valor.substring(0, i) + valor.substring(i+1, valor.length)
	if ((valor.length == 8 || valor.length == 7 || valor.length == 6) && isInteger(valor))
		return true
	else
		return false
}

// Valida CPF
function valida_CPF(s)
{
  var i;
  
  s = limpa_string(s);
  
  var c = s.substr(0,9);
  var dv = s.substr(9,2);
  var d1 = 0;
  for (i = 0; i < 9; i++)
  {
    d1 += c.charAt(i)*(10-i);
  }
  
  if (d1 == 0) return false;
  d1 = 11 - (d1 % 11);
  if (d1 > 9) d1 = 0;
  if (dv.charAt(0) != d1)			// CPF Inválido
    return false;

  d1 *= 2;
  for (i = 0; i < 9; i++)
  {
    d1 += c.charAt(i)*(11-i);
  }
  d1 = 11 - (d1 % 11);
  if (d1 > 9) d1 = 0;
  if (dv.charAt(1) != d1)			// CPF Inválido
    return false;
  // CPF Válido
  return true;
}

function valida_CGC(scgc) {  
	var cgc = trimtodigits(scgc);  
	if ((cgc.indexOf("-") != -1) || (cgc.indexOf(".") != -1) || (cgc.indexOf("/") != -1)){  
		return( false )  
	}  
	var df, resto, dac = ""  
	df = 5*cgc.charAt(0)+4*cgc.charAt(1)+3*cgc.charAt(2)+2*cgc.charAt(3)+9*cgc.charAt(4)+8*cgc.charAt(5)+7*cgc.charAt(6)+6*cgc.charAt(7)+5*cgc.charAt(8)+4*cgc.charAt(9)+3*cgc.charAt(10)+2*cgc.charAt(11)  
	resto = df % 11  
	dac += ( (resto <= 1) ? 0 : (11-resto) )  
	df = 6*cgc.charAt(0)+5*cgc.charAt(1)+4*cgc.charAt(2)+3*cgc.charAt(3)+2*cgc.charAt(4)+9*cgc.charAt(5)+8*cgc.charAt(6)+7*cgc.charAt(7)+6*cgc.charAt(8)+5*cgc.charAt(9)+4*cgc.charAt(10)+3*cgc.charAt(11)+2*parseInt(dac)  
	resto = df % 11  
	dac += ( (resto <= 1) ? 0 : (11-resto) )  
	return (dac == cgc.substring(cgc.length-2,cgc.length))  
}  

//Remove todos os caracteres excetos 0-9  
function trimtodigits(tstring){  
	s="";  
	ts=new String(tstring);  
	for (x=0;x<ts.length;x++){  
		ch=ts.charAt(x);  
			if (asc(ch)>=48 && asc(ch)<=57){  
			s=s+ch;  
		}  
	}  
	return s;  
}  


// Retorna o código ASC do caracter passada por parâmetro  
function asc(achar){  
	var n=0;  
	var ascstr = makeCharsetString()  
	for(i=0;i<ascstr.length;i++){  
		if(achar==ascstr.substring(i,i+1)){  
			n=i;  
			break;  
		}  
	}  
	return n+32  
}  

// Gera uma string com os caracteres básicos na sequência de códigos ASC  
function makeCharsetString(){  
	var astr  
	astr = ' !"#$%&\'()*+,-./0123456789:;<=>?@'  
	astr+= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'  
	astr+= '[\]^_`abcdefghijklmnopqrstuvwxyz'  
	astr+= '{|}~'  
	return astr  
}  

// Valida CNPJ
function valida_CNPJ(cgc)
{
  
  s = limpa_string(cgc);
 if (isNaN(s)) {
  return false;
 }
 var i;
 var c = s.substr(0,12);
 var dv = s.substr(12,2);
 var d1 = 0;
 for (i = 0; i <12; i++){
  d1 += c.charAt(11-i)*(2+(i % 8));
 }
 if (d1 == 0) 
  return false;
 d1 = 11 - (d1 % 11);
 if (d1 > 9) d1 = 0;
 if (dv.charAt(0) != d1){
  return false;
 }
 d1 *= 2;
 for (i = 0; i < 12; i++){
  d1 += c.charAt(11-i)*(2+((i+1) % 8));
 }
 d1 = 11 - (d1 % 11);
 if (d1 > 9) 
  d1 = 0;
 if (dv.charAt(1) != d1){
  return false;
 }
 return true;

}

// Remove todos os caracteres não numéricos da string
function limpa_string(strInput)
{
  var Digitos = "0123456789";
  var Digito = "";
  var temp = "";

  for (var i=0; i < strInput.length; i++)
  {
    Digito = strInput.charAt(i);
    if (Digitos.indexOf(Digito) >= 0)
	  {temp = temp + Digito}
  }

  return temp;
}


function VerificaDDD(valor)
{
	if (isInteger(valor) && valor.length > 1 && valor.length < 4)
		return true
	else
		return false
}

function CEP(param) 
{
	if (param.value == "")
	{
		param.value = "_____-___";
	}
	else if (param.value == "_____-___") 
	{
		param.value = "";
	}
}

function NASCIMENTO(param) 
{
	if (param.value == "") 
	{
		param.value = "__/__/____";
	}
	else if (param.value == "__/__/____") 
	{
		param.value = "";
	}
}

function NASCIMENTO2(param){
	if (param.value == "") {
		param.value = "__/____";
	}
	else if (param.value == "__/____") {
		param.value = "";
	}
}

function CPF(param){
	if (param.value == "") {
		param.value = "___.___.___-__";
	}
	else if (param.value == "___.___.___-__") {
		param.value = "";
	}
}

function VerificaValorMonetario(Valor)
{
	if (VerificaNumerico(Valor, 1) && VerificaVirgulas(Valor))
		return true;
	else
		return false;
}

function VerificaNumerico(Valor, Decimal)
{
	var numeros="0123456789";
	if (Decimal)
		numeros += ",.";

	for (i=0;i < Valor.length;i++)
		if (numeros.indexOf(Valor.charAt(i))==-1)
			return false;

	return true;
}

function VerificaVirgulas(Valor) 
{
	var i,j;

	j=0;
	i=Valor.indexOf(",");
	while (i!=-1) {
		//alert(Valor);
		Valor = Valor.substring(0,i) + Valor.substring(i+1,Valor.length);
		//alert(Valor);
		i=Valor.indexOf(",");
		j++;
	}

	if (j>1)
		return false;
	else
		return true;
}

function Trim(s)
{
	var i, j;
	i = 0;
	while (i < s.length) {
		if (s.charAt(i)!=" ")
			break;
		i++;
	}

	j = s.length-1;
	while (j>=0) {
		if (s.charAt(j)!=" ")
			break;
		j--;
	}

	if (i==j)
		s = s.charAt(i);
	else
		if (i < j)
			s = s.substring(i, j+1);
		else
			s = "";

	return(s);
}

function Substitui(Valor, ChAnt, ChNovo) 
{
	var i;

	if (ChAnt!=ChNovo) {
		i = Valor.indexOf(ChAnt);
		while (i!=-1) {
			Valor = Valor.substring(0,i) + ChNovo + Valor.substring(i+1,Valor.length);
			i=Valor.indexOf(ChAnt);
		}
	}

	return Valor;
}

function FormataNumero(Valor)
// RETORNA VALOR NO FORMATO 9999.99
{
	var i, ValorAux

	ValorAux = "";
	for(i = (Valor.length-1); i>=0; i--)
	{
		if ((Valor.length-3) == i)
		{
			if ((Valor.charAt(i) == ".") || (Valor.charAt(i) == ","))
				ValorAux = "." + ValorAux;
			else
				ValorAux = Valor.charAt(i) + ValorAux + ".00";
		}
		else
		{	
			if ((Valor.charAt(i) != ".") && (Valor.charAt(i) != ","))
				ValorAux = Valor.charAt(i) + ValorAux;
		}
	}
	return (ValorAux);
}

function abrir_janela_popup(theURL,winName,features) 
{
	window.open(theURL,winName,features);
}

function Limpa(S)	// Deixa apenas os dígitos numérico na string
{
	var Digitos = "0123456789";
	var temp = "";
	var digito = "";
	for (var i=0; i<S.length; i++)
	{
		digito = S.charAt(i);
		if (Digitos.indexOf(digito) >=0 )
			temp=temp+digito
	}
	return temp;
}

function Inverte(S) // Inverte o string S
{
	var temp="";
	for (var i=0; i<S.length; i++)
	{
			temp=S.charAt(i)+temp
	}
	return temp;
}

function Resto(S)	// Retorna o dígito verificador (entrar com S "limpo")
{
	var invertido = Inverte(Limpa(S));
	var soma = 0;
	for (var i=0; i<invertido.length; i++)
	{
		soma=soma+(i+2)*eval(invertido.charAt(i))
	}
	soma *= 10;
	return ((soma % 11) % 10);
}


// ------------------------------------------------------------------------------
  // Funções gerais para salto automático do form_campo

function ValidarTecla(evnt)
{
	var tk;
	var c;
	// Recebe a tela pressionada
	tk = ( (QualNavegador()=="IE") ? event.keyCode : evnt.which);
	c=String.fromCharCode(tk);
	c=c.toUpperCase();
	// Só aceita teclas alfanuméricas. Não aceita teclas de controle
	if(tk<32) return true;
	if (tk>127) return false;
	switch (this.Tipo)
	{
		case "D":
			if (c<"0" || c>"9")
				return false;
			break;
		case "N":
			if ((c<"0" || c>"9") && (c!="." && c!=","))
				return false;
			if ((c==",") && ((this.value.search(",")>-1) || (this.value.length==0)))
				return false;
			if ((c==".") && (this.value.length==0))
				return false;
			break;
		case "C":
			if ( c<"A" || c>"Z" ) return false;
			break;
		default:
			break;
	}
	this.Saltar=(this.value.length==this.Tam-1);
	if(((QualNavegador()=="IE") && QualVersao()<5) || (QualNavegador()!="IE")) Saltarform_campo(this);
	return true;
}

function InicializarIndices()
{
	if (document.CargaInicial==null)
	{
		document.CargaInicial=false; // Seta para só fazer uma vez por documento
		var ctrlAnterior=null;
		var IndAnt=0;
		for ( var i=0; i<document.forms[0].elements.length;i++)
		{
			var e=document.forms[0].elements[i];
			if ( e.type!="hidden" && e.type!="image" )
			{
				if (ctrlAnterior != null) ctrlAnterior.IndicePosterior=i;
				ctrlAnterior=e;
				e.Indice=i;
				e.IndiceAnterior=IndAnt;
			}
		}
	}
}

function QualNavegador()
{
	var s = navigator.appname;
	if(s == "Microsoft Internet Explorer") return "IE";
	else if ( s == "Netscape" ) return "NE";
	else return "";
}

function QualVersao()
{
	var s = navigator.appVersion;
	if ( QualNavegador() == "IE" )
	{
		var i = s.search("MSIE");
		s=s.substring(i+5);
		i=s.search(".");
		return parseInt(s.substring(0,i+1));
	}
	else if ( QualNavegador() == "NE" ) return parseInt(s.substring(0,1));
	else return 0;
}

function SetarEvento(ctrl, Tam, Tipo, AutoSkip) 
{ 	
	// Filtra navegadores conhecidos
	var s = QualNavegador();
	if (s.length==0) return;
	if (s=="IE" && QualVersao()>6) return;
	if (s=="NE" && QualVersao()>4) return;
	if (ctrl.onkeypress==null)
	{
		if (AutoSkip==null) AutoSkip=true;
		if (Tipo!=null)	Tipo.toUpperCase();
		ctrl.Tam=Tam;
		ctrl.Tipo=Tipo;
		ctrl.AutoSkip=true;
		ctrl.Saltar=false;
		InicializarIndices();
		ctrl.onkeypress=ValidarTecla;
		if (QualNavegador()=="IE" && QualVersao()>=5) ctrl.onkeyup=Saltarform_campo;
	}
}

function SetarFoco(ind)
{
	InicializarIndices();
	if ( isNaN(ind) && document.forms[0].elements[ind].type!="hidden" )
		document.forms[0].elements[ind].focus();
	else
		for (;ind<document.forms[0].elements.length;ind++)
			if (document.forms[0].elements[ind].type!="hidden")
				break;
	if (ind<=document.forms[0].elements.length)
		document.forms[0].elements[ind].focus();
}

function Saltarform_campo(ctrl)
{
	if (ctrl==null)	ctrl=this;
	if ( ctrl.AutoSkip && ctrl.Saltar)
		if (ctrl.Saltar) 
		{
			ctrl.Saltar=false;
			if ( ctrl.IndicePosterior != null ) SetarFoco(ctrl.IndicePosterior);
		}
}

function fCEP(param){
	if (param.value == "") {
		param.value = "_____-___";
	}
	else if (param.value == "_____-___") {
		param.value = "";
	}
}

function fNASCIMENTO(param){
	if (param.value == "") {
		param.value = "__/__/____";
	}
	else if (param.value == "__/__/____") {
		param.value = "";
	}
}

function fCPF(param){
	if (param.value == "") {
		param.value = "___.___.___-__";
	}
	else if (param.value == "___.___.___-__") {
		param.value = "";
	}
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}