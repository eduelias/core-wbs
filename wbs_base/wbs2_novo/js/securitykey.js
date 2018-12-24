var BrowserVersion = 5;

// Verificar qual navegador
function QualNavegador(){
	var u = navigator.userAgent.toLowerCase();
	var s = navigator.appName;	
	if(u.indexOf('safari')!= -1)
		return "SA";	
	if ( s == "Microsoft Internet Explorer" )
		return "IE";
	else if ( s == "Netscape" )
		return "NE";
	else
		return "";
}

// Verificar qual a versão do navegador
function QualVersao()
{
	var s = navigator.appVersion;
	if ( QualNavegador() == "IE" )
	{
		var i = s.search("MSIE");
		s=s.substring(i+5);
		i=s.search(";");
		return s.substring(0,i);
	}
	else if ( QualNavegador() == "NE" ){
		if(navigator.userAgent.indexOf('Netscape/7.0')!= -1)return "7.0";		
		if(navigator.userAgent.indexOf('Netscape/7.1')!= -1)return "7.1";
		return parseInt(s.substring(0,1));
	}
	else{
		return 0;}
}

// Verificar se é Macintosh
function SeMac()
{
	var s = navigator.appVersion;
	var v = s.search("Mac");  

	if (v!=-1)
	{
		return "MAC";
	}

	return 0;
}

// Setar o evento
function SetarEvento(ctrl, Tam, Tipo, AutoSkip )
{
	// Filtra navegadores conhecidos
	var s = QualNavegador();

	if ( s.length==0 )
		return;

	if ( s=="IE" && QualVersao()>6 )
		return;
	/* As linhas abaixo, foram comentadas para a função rodar no NS 7.0	
	if ( s=="NE" && QualVersao()>4 )
		return;
	*/
	if (ctrl.onkeypress==null)
	{
		if (AutoSkip==null)
			AutoSkip=true;
		if (Tipo!=null)
			Tipo.toUpperCase();
		ctrl.Tam=Tam;
		ctrl.Tipo=Tipo;
		ctrl.AutoSkip=true;
		ctrl.Saltar=false;
		ctrl.onkeypress=ValidarTecla;
	}
}


// Fazer o salto de campo
function ValidarTecla (evnt)
{
	var tk;
    var c;
	var tkce;
	var ce;
	// Recebe a tecla pressionada
	tk = ( (QualNavegador()=="IE") ? event.keyCode : evnt.which);
    c=String.fromCharCode(tk);
	c=c.toUpperCase();

	tkce = ( (QualNavegador()=="IE") ? event.keyCode : evnt.which);
    ce=String.fromCharCode(tkce);
	ce=ce.toUpperCase();
	
	// -- Este trecho faz com que o <Enter> tenha a função de <Tab>, mas acho inviável, pois não é possível
	//       colocar o foco em campos do Tipo "image", e, neste caso, nunca seria possível fazer a submissão
	//       do formulário
	// if ( tk == 13 )
	// {
	//	this.Saltar=true;
	//	SaltarCampo(this);
	//	return false;
	// }
	
	// Só aceita teclas alfanuméricas. Não aceita teclas de controle
    if ( tk < 32 )
		return true;
	if ( tk > 127 )
		return false;

	switch ( this.Tipo )
	{
	case "D":
		if ( c<"0" || c>"9" )
			return false;
		break;
	case "N":
		if ( (c<"0" || c>"9") && (c!="." && c!=",") )
			return false;
		if ( (c==",") && ((this.value.search(",")>-1) || (this.value.length==0)) )
			return false;
		if ( (c==".") && (this.value.length==0) )
			return false;
		break;
	case "C":
		if ( c<"A" || c>"Z" )
			return false;
		break;
	case "CE":
		if ( tkce < 33 )
			return true;
		if ( tkce > 127 )
			return false;
		if ( ce<"A" || ce>"Z" )
			return false;
		break;
	case "ALERTLOGIN":
		if ((c<"0" || c>"9") || (c<"A" || c>"Z"))
		{
			alert("A senha de login deverá ser preenchida com a utilização do Teclado Virtual. \nPara mais detalhes, clique sobre o link \"Saiba mais\".");  
			return false;
		}
		break;
	case "ALERT":
		if ( c<"A" || c>"Z" )
		{
			alert("A senha do cartão passou a ser codificada. \nPara mais detalhes, clique sobre o link \"Dúvidas? Veja como funciona\", ao lado do campo de senha.");  
			return false;
		}
		break;
	case "ALERTSENHA":
		if ((c<"0" || c>"9") || (c<"A" || c>"Z"))
		{
			alert("A senha deve ser preenchida por meio do Teclado Virtual.\nPara obter ajuda sobre a \"Verificação de Segurança\" clique no link \"Ajuda\".");
			return false;
		}
		break;
	case "SMS":
	//O campo palavra chave do SMS só aceita - 'A' a 'Z' 'a' a 'z' '0' a '9' espaço em branco e traço (hífen).
	if ( (c<"0" || c>"9") && ( c<"A" || c>"Z" ) && (c!=" " && c!="-") )
			return false;
		break;
	default:
		break;
	}

	//verifica se o tamanho do campo, coincide com o solicitado para saltar	
	// se for NS7.0, Safari não decrementa		
	if ((QualNavegador()=="NE" && QualVersao()=="7.0") || QualNavegador()=="SA")	
		this.Saltar=(this.value.length==this.Tam);	
	else
		this.Saltar=(this.value.length==this.Tam-1);	
		
		
	if ( ((QualNavegador()=="IE") && QualVersao()<5) || (QualNavegador()!="IE") )
		SaltarCampo(this);

	return true;
}
//-->
