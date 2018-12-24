<!--

// ------------------------------------------------------------------------------------------ //
// Acrescenta algumas propriedades aos controles:
// .Indice			: indica o índice na tela para o controle
// .IndiceAnterior	: indica o índice do controle anterior
// .IndicePosterior	: indica o índice para o controle posterior
// .Tam				: tamanho máximo para digitação
// .AutoSkip		: indica se pula para o próximo campo após completar o tamanho do campo
// .Tipo			: indica o tipo de dado
//						'D' -> só dígitos de 0(zero) a 9(nove)
//						'N' -> dígitos de 0(zero) a 9(nove), "."(ponto) e ","(vírgula)
//						'C' -> caracteres de 'a' até 'z' e de 'A' até 'Z'
//						outro -> qualquer caracter entre ascii 32 e ascii 127
// .Saltar			: (reservado) indica o momento de saltar de campo
// ------------------------------------------------------------------------------------------ //

// Carrega índices para o próximo controle e controle anterior
function InicializarIndices()
{
	if (document.CargaInicial==null)
	{
		document.CargaInicial=false;		// Seta para só fazer uma vez por documento
		var ctrlAnterior=null;
		var IndAnt=0;
		for ( var i=0; i<document.forms[0].elements.length;i++)
		{
			var e=document.forms[0].elements[i];
			if ( e.type!="hidden" && e.type!="image" )		
			{
				if ( ctrlAnterior != null )
					ctrlAnterior.IndicePosterior=i;
				ctrlAnterior=e;
				e.Indice=i;
				e.IndiceAnterior=IndAnt;
			}
		}
		//if ( ctrlAnterior!=null )
		//{
		//	ctrlAnterior.IndicePosterior=i-1;
		//}
	}
}

// Colocar o foco em determinado campo
function SetarFoco ( ind )
	{
	InicializarIndices();
	if ( isNaN(ind) && document.forms[0].elements[ind].type!="hidden" )
		document.forms[0].elements[ind].focus();
	else
		for (;ind<document.forms[0].elements.length;ind++)
			if ( document.forms[0].elements[ind].type!="hidden" )
				break;
		if ( ind<=document.forms[0].elements.length )
			document.forms[0].elements[ind].focus();
	}

// Limpar o conteúdo do(s) campo(s)
function LimparCampo ( ind )
	// Para -1, limpa todos os elementos
	{
	if (isNaN(ind))			// Limpa pelo nome
		document.forms[0].elements[ind].value="";
	else if (ind != -1 )	// Limpa o elemento "ind" ( só considera "text" e "password" )
		for ( var i=ind; i < document.forms[0].elements.length;i++ )
			if ( document.forms[0].elements[i].type=="text" || document.forms[0].elements[i].type=="password")		// Só limpa campo "text"
				{
				document.forms[0].elements[i].value="";
				break;
				}
	else					// Limpa todos os elementos "text" e "password"
		for ( var i=0; i < document.forms[0].elements.length; i++ )
			if ( document.forms[0].elements[i].type=="text" || document.forms[0].elements[i].type=="password" )
				document.forms[0].elements[i].value="";
		
	}

// Verificar qual navegador
function QualNavegador() 
{
	var s = navigator.appName;
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
		i=s.search(".");
		return parseInt(s.substring(0,i+1));
	}
	else if ( QualNavegador() == "NE" )
		return parseInt(s.substring(0,1));
	else
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
	if ( s=="NE" && QualVersao()>4 )
		return;

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
		InicializarIndices();
		ctrl.onkeypress=ValidarTecla;
		if (QualNavegador()=="IE" && QualVersao()>=5)
			ctrl.onkeyup=SaltarCampo;
	}
}

function SaltarCampo(ctrl)
{
	if (ctrl==null)
		ctrl=this;
	if ( ctrl.AutoSkip && ctrl.Saltar)
		if (ctrl.Saltar)
		{
			ctrl.Saltar=false;
			if ( ctrl.IndicePosterior != null )
				SetarFoco(ctrl.IndicePosterior);
		}
}

// Fazer o salto de campo
function ValidarTecla (evnt)
{
	var tk;
    var c;
	var tkce;
	var ce;
	// Recebe a tela pressionada
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
	default:
		break;
	}

	this.Saltar=(this.value.length==this.Tam-1);
	if ( ((QualNavegador()=="IE") && QualVersao()<5) || (QualNavegador()!="IE") )
		SaltarCampo(this);

	return true;
}

//-->
