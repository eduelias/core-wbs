/******************************************
-------------------------------------------
 REAL SEGUROS - GRUPO ABN AMRO

 Função abre e fecha o menu lateral.
-------------------------------------------
******************************************/

//array que contem os textos dos "TIPS"
text_tips = new Array();
//EXEMPLO DE TIP COM FORMATAÇÃO   ---------   text_tips[0] = "<table border='0' width='203' height='61' cellspacing='0' cellpadding='0'  align='left' bgcolor='#eeeeee'><tr class='form_tr_dots' bgcolor='#eeeeee'> <td bgcolor='#FFFFFF' background='../imagens/comuns/form_dots.gif' height='1' colspan='2'><img src='../imagens/comuns/pixel.gif' width='1' height='1'></td></tr><tr class='form_tr'><td bgcolor='#eeeeee' valign='top' height='8' align='center' colspan='2'>incêndio, queda de raio e explosão</td></tr><tr class='arial_cinza'><td width='6' bgcolor='#ffffff'><img src='../imagens/comuns/pixel.gif' width='6' height='1'></td><td bgcolor='#ffffff' valign='top'>incêndio, queda de raio dentro da área do terreno ou edifício onde estiverem localizados os bens segurados e explosão de qualquer natureza, mesmo que de origem externa, botijão de gás (glp), panela de pressão ou qualquer substância empregada em aparelhos de uso doméstico. serão indenizadas também as despesas com providências tomadas para o combate ao fogo, salvamento e proteção dos bens segurados e desentulho do local.</td></tr><tr class='form_tr_dots' bgcolor='#eeeeee'> <td bgcolor='#FFFFFF' background='../imagens/comuns/form_dots.gif' height='1' colspan='2'><img src='../imagens/comuns/pixel.gif' width='1' height='1'></td></tr></table>";
text_tips[0] = "";
text_tips[1] = "";
text_tips[2] = "<font class='verdana_cinza'><b>Incêndio, Queda de Raio e Explosão:</b><br>Incêndio, queda de raio dentro da área do terreno ou edifício onde estiverem localizados os bens segurados e explosão de qualquer natureza, mesmo que de origem externa, botijão de gás (GLP), panela de pressão ou qualquer substância empregada em aparelhos de uso doméstico. Serão indenizadas também as despesas com providências tomadas para o combate ao fogo, salvamento e proteção dos bens segurados e desentulho do local.";
text_tips[3] = "<font class='verdana_cinza'><b>Danos Elétricos:</b><br>Danos causados a máquinas, equipamentos, aparelhos eletro-eletrônicos de uso exclusivamente doméstico ou instalações elétricas de qualquer tipo, decorrentes de variações anormais de tensão, curto-circuito e calor gerado acidentalmente por eletricidade, descargas elétricas ou qualquer efeito ou fenômeno de natureza elétrica. Garante ainda os danos elétricos causados em conseqüência de queda de raio, desde que ocorrida fora do terreno onde se localiza o imóvel. Franquia: 10% prejuízos com um mínimo de R$ 300,00.";
text_tips[4] = "<font class='verdana_cinza'><b>Desmoronamento:</b><br>Danos causados ao imóvel segurado por desmoronamento total ou parcial de parede ou qualquer elemento estrutural do imóvel por causa externa e aleatória. Considera-se caracterizado o desmoronamento parcial somente quando houver desmoronamento de parede ou de qualquer elemento estrutural (coluna, viga, laje de piso ou de teto).";
text_tips[5] = "<font class='verdana_cinza'><b>Impacto Veículos e Queda de Aeronaves:</b><br>Danos materiais causados ao imóvel segurado pelo impacto de veículos terrestres, queda de aeronaves ou quaisquer outros engenhos aeroespaciais ou parte deles, desde que pertencentes a terceiros e por eles conduzidos.";
text_tips[6] = "<font class='verdana_cinza'><b>Responsabilidade Civil Familiar:</b><br>Reembolso ao segurado das quantias pelas quais vier a ser responsável civilmente, em sentença judicial transitada em julgado ou em acordo autorizado de modo expresso pela seguradora, por dano material ou pessoal involuntário, causado a terceiros pelo segurado, seu cônjuge, filhos, empregados domésticos residentes no imóvel e animais domésticos de sua propriedade, bem como pelo uso, existência e conservação do imóvel residencial segurado. Esta cobertura tem abrangência em todo o território nacional.";
text_tips[7] = "<font class='verdana_cinza'><b>Roubo ou Furto Qualificado de Bens:</b><br>Roubo ou furto qualificado dos objetos do conteúdo, incluindo os danos materiais causados ao imóvel ou aos bens durante a prática ou tentativa de roubo ou furto qualificado.";
text_tips[8] = "<font class='verdana_cinza'><b>Vendaval, Granizo e Fumaça:</b><br>Danos causados direta e exclusivamente ao imóvel segurado e seu conteúdo, por:<br><br><b>Vendaval:</b> destelhamentos, danos estruturais e as conseqüências causadas ao seu conteúdo;<br><br><b>Chuva de Granizo:</b> danos ao telhado, vidros e quaisquer partes integrantes do imóvel que venham a sofrer conseqüências por chuvas torrenciais e/ou de granizo, provenientes de entrada d'água de chuva por janelas comprovados;<br><br><b>Fumaça:</b> de qualquer natureza;<br><br><b>Atenção:</b> Todos os casos de vendaval têm que ser comprovados através de laudo meteorológico ou divulgação da ocorrência através dos veículos de comunicação (jornal, rádio ou televisão).";
text_tips[9] = "<font class='verdana_cinza'><b>Quebra de Vidros, Espelhos e Mármores:</b> Quebra de vidros, espelhos e mármores existentes na residência, regularmente instalados, por acidente de causa externa.";
text_tips[10] = "<font class='verdana_cinza'><b>Pagamento de Aluguel:</b><br>Despesas de aluguel que o segurado não residente deixar de receber ou o aluguel de moradia temporária para o segurado residente no imóvel, caso o imóvel não possa ser ocupado em decorrência de sinistro coberto na apólice.";
text_tips[11] = "<font class='verdana_cinza'>Garante o recebimento de uma renda mensal vitalícia ao cônjuge ou companheira(o)  indicada(o), em virtude do falecimento do cliente.";
text_tips[12] = "<font class='verdana_cinza'>Garante uma renda mensal paga ao beneficiário indicado, em caso de falecimento do cliente, durante o prazo contratado.";
text_tips[13] = "<font class='verdana_cinza'>Garante o recebimento de uma renda mensal aos filhos menores ou dependentes econômicos, em caso do falecimento do cliente, até que completem 21 anos de idade.";
// TIPS SIMULADOR DE PREVIDENCIA
text_tips[14] = "<font class='verdana_cinza'>Renda(s) recebida(s) de terceiros durante o ano, por exemplo: salário fixo, salário variável, aluguéis de imóveis, resgate de planos de previdência e outros.";
text_tips[15] = "<font class='verdana_cinza'>Renda(s)recebida(s) de terceiros, durante o ano, sem tributaçao na fonte. Por exemplo: <br><br>- Indenização por Recisão de Contrato de Trabalho, inclusive a &nbsp;&nbsp;título de PDV (Plano de Demissão Voluntári), e por acidente de trabalho, e FGTS;<br>- parcela isenta de proventos de aposentadoria, reserva &nbsp;&nbsp;remunerada, reforma e pensão de declarantes com 65 anos &nbsp;&nbsp;ou mais;<br>- rendimentos de cadernetas de poupança e letras &nbsp;&nbsp;Hipotecárias, e outras.";
text_tips[16] = "<font class='verdana_cinza'>Aposentadoria paga pela Previdência Social aos funcionários de empresa privada.";
text_tips[17] = "<font class='verdana_cinza'>Outras rendas que receberá durante a aposentadoria,  tais como: aluguéis, aposentadoria paga pela empresa em que trabalhou, além da paga pelo INSS.";
text_tips[18] = "<font class='verdana_cinza'>Garante uma renda mensal paga ao beneficiário indicado, em caso de falecimento do cliente, durante o prazo contratado.";
text_tips[19] = "<font class='verdana_cinza'>Primeiro pagamento para iniciar a composição da reserva. É um extra, que pode ter o valor igual ou diferente das contribuições mensais.";
text_tips[20] = "<font class='verdana_cinza'>Selecione o modelo de Declaração que você utiliza para fazer a Declaração Anual do Imposto de Renda.";
text_tips[21] = "<font class='verdana_cinza'>Pagamento de um Pecúlio (pagamento único) no caso de Morte ou Invalidez Total e Permanente (o que ocorrer primeiro). Esse produto oferece uma cobertura adicional de Doenças Graves e Assistência Funeral.";
text_tips[22] = "<font class='verdana_cinza'>Uma renda mensal será paga vitaliciamente, a partir da data estabelecida na proposta de inscrição.";
text_tips[23] = "<font class='verdana_cinza'>Uma renda mensal será paga vitaliciamente, a partir da data estabelecida na proposta de inscrição. Ocorrendo o falecimento do cliente, durante o recebimento dessa renda, um percentual estabelecido pelo cliente será pago vitaliciamente ao beneficiário indicado.";
text_tips[24] = "<font class='verdana_cinza'>Uma renda mensal será paga vitaliciamente a partir da data estabelecida na proposta de inscrição.Ocorrendo o falecimento do cliente durante o recebimento dessa renda, um percentual estabelecido pelo cliente será pago ao cônjuge ou companheira(o), e na falta deste, reverterá temporariamente ao(s) menor(es) até que completem 24 anos.";

text_tips[25] = "<font class='verdana_cinza'>Uma renda mensal será paga pelo período determinado. A renda cessa com o falecimento do cliente ou com o fim do período definido na contratação.";
text_tips[26] = "<font class='verdana_cinza'>Uma renda mensal será paga vitaliciamente, a partir da data estabelecida na proposta de inscrição. Ocorrendo o falecimento do cliente, antes de ter completado o período de garantia por ele estabelecido, a renda mensal será paga ao beneficiário pelo prazo garantido restante. Caso contrário, a renda será automaticamente cancelada.";
text_tips[27] = "<font class='verdana_cinza'>Uma renda mensal será paga vitaliciamente, a partir da data estabelecida na proposta de inscrição. Ocorrendo o falecimento do cliente, antes de ter completado o período de garantia por ele estabelecido, a renda mensal será paga ao beneficiário pelo prazo garantido restante. Caso contrário, a renda será automaticamente cancelada.";

text_tips[28] = "<font class='verdana_cinza'>Com o objetivo de aumentar a renda futura projetada, você pode incrementar sua reserva. <br><br>Se você possui plano(s) em outra(s) Entidade(s) de Previdência Complementar, pode solicitar a transferência parcial ou total para o RealPrev. <br><br>De acordo com a legislação vigente, a transferência entre planos de previdência é realizada sem cobrança de impostos ou tributos.";
text_tips[29] = "<font class='verdana_cinza'>Rentabilidade estimada anualmente para sua reserva, durante o período de contribuição ao plano. <br> <br>Lembramos que esta rentabilidade estimada é determinada por você e serve como parâmetro para este cálculo. Não se trata de qualquer garantia de rentabilidade. Porcentagem recomendada : 6%.";

text_tips[30] = "<font class='verdana_cinza'>Renda mensal paga vitaliciamente em caso de invalidez total e permanente, durante o período de cobertura.";
text_tips[31] = "<font class='verdana_cinza'>Uma renda mensal será paga vitaliciamente a partir da data estabelecida na proposta de inscrição.Ocorrendo o falecimento do cliente durante o recebimento dessa renda, um percentual estabelecido pelo cliente será pago ao cônjuge ou companheira(o), e na falta deste, reverterá temporariamente ao(s) menor(es) até que completem 24 anos.";

// TIPS SIMULADOR DE PREVIDENCIA
text_tips[32] = "<font class='cinza'>Família: agrupamento de produtos ou ramos.";
text_tips[33] = "<font class='cinza'>Produção Emitida Líquida: produção emitida líquida de cancelamentos e restituições.";
text_tips[34] = "<font class='cinza'>Pontos Básicos: resultado da divisão da produção emitida liquida por 100, são utilizados para determinar a categoria do corretor no Programa.";

text_tips[35] = "<font class='cinza'>Bônus de Sinistralidade: bônus concedidos em função do resultado das famílias: automóvel, residencial e empresarial.";
text_tips[36] = "<font class='cinza'>Bônus de Renovação: bônus concedidos em função do índice de renovação das famílias: automóvel, residencial e empresarial.";
text_tips[37] = "<font class='cinza'>Bônus de Categoria: bônus concedidos pela categoria do participante no Programa a partir da categoria Prata.";

text_tips[38] = "<font class='cinza'>Pontos Extras: pontos conquistados em eventuais campanhas feitas dentro do Programa.";
text_tips[39] = "<font class='cinza'>Pontos disponíveis para resgates, devem ser descontados os pontos utilizados em resgate após a publicação do extrato.";

// TIP SIMULADOR DE PREVIDENCIA
text_tips[40] = "<font class='cinza'>Garante indenização em caso de Morte (por acidente ou doença) e Invalidez por Acidente, além de oferecer uma indenização especial no caso de Doenças Graves e um Seguro de Auxílio Funeral.";
// TIP SIMULADOR DE PREVIDENCIA


//array que contem os nomes dos arquivos que serao utilizados na funcao jump()
sorteados_arr = new Array();
sorteados_arr[0] = "/scripts/comunic_srs.dll?OPERA=SORTEADONOVO&plano=1700000&WT_SERV=SorteioRC10&ORIGEM_ACESSO=RS";
sorteados_arr[1] = "/scripts/comunic_srs.dll?OPERA=SORTEADONOVO&plano=1900004&WT_SERV=SorteioNRC10&ORIGEM_ACESSO=RS";
sorteados_arr[2] = "/scripts/comunic_srs.dll?OPERA=SORTEADONOVO&plano=2900021&WT_SERV=SorteioRC20&ORIGEM_ACESSO=RS";
sorteados_arr[3] = "/scripts/comunic_srs.dll?OPERA=SORTEADONOVO&plano=2200002&WT_SERV=SorteioRC100&ORIGEM_ACESSO=RS";
sorteados_arr[4] = "/scripts/comunic_srs.dll?OPERA=SORTEADONOVO&plano=1500000&WT_SERV=SorteioRC500&ORIGEM_ACESSO=RS";
sorteados_arr[5] = "/scripts/comunic_srs.dll?OPERA=SORTEADONOVO&plano=1900001&WT_SERV=SorteioRC1000&ORIGEM_ACESSO=RS";
sorteados_arr[6] = "/scripts/comunic_srs.dll?OPERA=SORTEADONOVO&plano=1600000&WT_SERV=SorteioRC2000&ORIGEM_ACESSO=RS";
sorteados_arr[7] = "/scripts/comunic_srs.dll?OPERA=SORTEADONOVO&plano=1900005&WT_SERV=SorteioNovoRCUniv&ORIGEM_ACESSO=RS";
sorteados_arr[8] = "/scripts/comunic_srs.dll?OPERA=SORTEADONOVO&plano=1900018&WT_SERV=SorteioRCSenior&ORIGEM_ACESSO=RS";
sorteados_arr[9] = "/scripts/comunic_srs.dll?OPERA=SORTEADONOVO&plano=1800000&WT_SERV=SorteioRCOlimpico&ORIGEM_ACESSO=RS";
sorteados_arr[10] = "/scripts/comunic_srs.dll?OPERA=SORTEADONOVO&plano=2200008&WT_SERV=SorteioRCPremium&ORIGEM_ACESSO=RS";
sorteados_arr[11] = "/scripts/comunic_srs.dll?OPERA=SORTEADONOVO&plano=2600012&WT_SERV=SorteioCPMoto&ORIGEM_ACESSO=RS";
sorteados_arr[12] = "/scripts/comunic_srs.dll?OPERA=SORTEADONOVO&plano=2300007&WT_SERV=SorteioCPViagem&ORIGEM_ACESSO=RS";
sorteados_arr[13] = "/scripts/comunic_srs.dll?OPERA=SORTEADONOVO&plano=2100000&WT_SERV=SorteioECAP&ORIGEM_ACESSO=RS";
sorteados_arr[14] = "cap_sede.htm";

function MM_findObj(n, d)
	{
	  var p,i,x;
	  if(!d) d=document;
	  if((p=n.indexOf("?"))>0&&parent.frames.length)
		{
    		d=parent.frames[n.substring(p+1)].document; 
			n=n.substring(0,p);
		}
	  if(!(x=d[n])&&d.all) x=d.all[n]; 
		
	  for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  
	  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document); 	
	 return x;
	}	


function MM_showHideLayers()
	{ 
	  var i,p,v,obj,args=MM_showHideLayers.arguments;
  	
	  for (i=0; i<(args.length-2); i+=3) 
	      if ((obj=MM_findObj(args[i]))!=null)
	      	{ 
		v=args[i+2];
    		if (obj.style)
			{
    			  obj=obj.style;
			  v=(v=='show')?'visible':(v='hide')?'hidden':v; 
 			}
    		obj.visibility=v;
		}
	 }
	 
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;  
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

//funcao q adapta o style dos combos
function combo_div(nome_form)	
{
	//numero de combos existentes na pagina
	tag_combo = document.all.tags("select").length;
	
	for (a=0;a<tag_combo;a++)
	{
		//monta o nome do combo
		quem = "combo_" + a;

		//monta o objeto do combo
		if (eval(nome_form + "." + quem)== undefined)  // incluido por Itech
			continue;
		nome_quem = eval("document." + nome_form + "." + quem);

		//largura do combo
		largura = nome_quem.style.width;
		
		//altura do combo
		altura = nome_quem.style.height;
		
		//tamanho da substring largura para tirar o "px"
		tamanho_l = largura.length - 2;
		
		//tamanho da substring altura para tirar o "px"
		tamanho_a = altura.length - 2;
		
		//variavel com a largura do div interno
		largura_rect = Number(largura.substr(0, tamanho_l)) - 3;
		
		//variavel com a altura do div interno
		altura_rect = Number(altura.substr(0, tamanho_a));
		
		//variavel com a largura do div externo
		largura = Number(largura.substr(0, tamanho_l)) + 2;
		
		//variavel com a altura do div externo
		altura = Number(altura.substr(0, tamanho_a)) + 2;

		//variavel que extrai so o numero da variavel quem => "combo_1" (i = 1)
		i = quem.split("_");
		
		//monta o objeto div externo		
		nome_div0 = eval("window.div0_" + i[1]);
		
		//monta o objeto div interno
		nome_div1 = eval("window.div1_" + i[1]);
		
		//seta a largura do div externo
		nome_div0.style.width = largura;
		
		//seta a altura do div externo
		nome_div0.style.height = altura;
		
		//seta a largura do div interno
		nome_div1.style.width = largura;
		
		//seta a altura do div interno
		nome_div1.style.height = altura;
		
		//seta o clip:rect do div interno
		nome_div1.style.clip = "rect(3 " + largura_rect + " 15 1)";
	}
}

//funcao q muda a cor de fundo e da fonte do form_campo
function cor(hexa, cor, quem) {
	//seta a cor de fundo	
	quem.style.background = hexa;
	
	//seta a cor da fonte
	quem.style.color = cor;
}

//funcao q preenche ou tira o preechimento de um form_campo
function preenche (oq, quem) {
	if (quem.value == '') //se o form_campo estiver vazio
	{
		//preenche o form_campo com o texto
		quem.value = oq;
	}
	else if (quem.value != '' && quem.value == oq) //se o form_campo nao estiver vazio e estiver prrenchido com o valor "oq"
	{
		//tira o preenchimento do form_campo
		quem.value = '';
	}
}

// Remove espaços da string a direira e a esquerda
function strTrim(strInput)
{
	var i, j;
	i = 0;
	while (i < strInput.length)
	{
	   if (strInput.charAt(i) != " ")
		  break;
	   i++;
	}

	j = strInput.length-1;
	while (j >= 0) 
	{
	   if (strInput.charAt(j) != " ")
		  break;
	   j--;
	}

	if (i == j)
	   strInput = strInput.charAt(i);
	else
	   if (i < j)
		  strInput = strInput.substring(i, j+1);
	   else
		  strInput = "";

	 return(strInput);
}

//funcao que reseta o form
function limpa(nome)
{
	//seta variavel que define que o botao limpa foi clicado
	bt_limpa = 1;	
	
	//reseta os valores do form	
	nome.reset();		
}
	
//funcao que poe o traco e ponto no form_campo cpf (Ex: 999.999.999-99)
function traco_cpf(form_campo)
{		
	if (((event.keyCode) > 47) && ((event.keyCode) < 58)) //se a tecla pressionada for de 0 a 9
	{
		//tira os espacos em branco do valor
		form_campo.value = strTrim(form_campo.value);				
		if (form_campo.value.length == 11)
		{
			//adiciona o "-" no valor do form_campo		
			form_campo.value = form_campo.value + "-";
		}
		if (form_campo.value.length == 3 || form_campo.value.length == 7)
		{
			//adiciona o "-" no valor do form_campo		
			form_campo.value = form_campo.value + ".";
		}
		return true;
	} else {
		return false;
	}
}

//funcao que poe o traco e ponto no form_campo rg (Ex: 99.999.999-9)
function traco_rg(form_campo)
{		
	/*if (((event.keyCode) > 47) && ((event.keyCode) < 58)) //se a tecla pressionada for de 0 a 9
	{*/
		//tira os espacos em branco do valor
		form_campo.value = strTrim(form_campo.value);				
		if (form_campo.value.length == 10)
		{
			//adiciona o "-" no valor do form_campo		
			form_campo.value = form_campo.value + "-";
		}
		if (form_campo.value.length == 2 || form_campo.value.length == 6)
		{
			//adiciona o "-" no valor do form_campo		
			form_campo.value = form_campo.value + ".";
		}
		return true;
	/*} else {
		return false;
	}*/
}

//funcao que poe o traco no form_campo cep (Ex: 2561-100)
function traco_cep(form_campo)
{
	if (((event.keyCode) > 47) && ((event.keyCode) < 58)) //se a tecla pressionada for de 0 a 9
	{
		//tira os espacos em branco do valor
		form_campo.value = strTrim(form_campo.value);				
		if (form_campo.value.length == 5)
		{
			//adiciona o "-" no valor do form_campo		
			form_campo.value = form_campo.value + "-";
		}
		return true;	
	} else {
		return false;
	}
}

//funcao que poe o traco no form_campo data (Ex: 99/99/9999)
function traco_data(form_campo)
{
	//se a tecla pressionada for de 0 a 9	
	if (((event.keyCode) > 47) && ((event.keyCode) < 58)) {
		//tira os espacos em branco do valor
		form_campo.value = strTrim(form_campo.value);				
		if (form_campo.value.length == 2 || form_campo.value.length == 5)
		{
			//adiciona o "-" no valor do form_campo		
			form_campo.value = form_campo.value + "/";
		}
		return true;	
	} else {
		return false;
	}
}

//funcao que poe o traco no form_campo validade (Ex: 99/9999)
function traco_validade(form_campo)
{
	//se a tecla pressionada for de 0 a 9
	if (((event.keyCode) > 47) && ((event.keyCode) < 58)) {
		//tira os espacos em branco do valor
		form_campo.value = strTrim(form_campo.value);				
		if (form_campo.value.length == 2)
		{
			//adiciona o "-" no valor do form_campo		
			form_campo.value = form_campo.value + "/";
		}		
		return true;	
	} else {
		return false;
	}
}
	
//funcao que poe o traco e ponto no form_campo telefone (Ex: 9999-9999)
function traco_tel(form_campo)
{		
	if (((event.keyCode) > 47) && ((event.keyCode) < 58)) {
		//tira os espacos em branco do valor
		form_campo.value = strTrim(form_campo.value);				
		if (form_campo.value.length == 4)
		{
			//adiciona o "-" no valor do form_campo		
			form_campo.value = form_campo.value + "-";
		}
		return true;
	}
	return false;
}

//funcao do contador regressivo
function cont(quem, paraqual)
{
	num = quem.value.length;
	paraqual.value = 1300 - num;		
}

//funcao que limita o tamanho da string em 1300 caracteres
function limite(quem) 
{
	num = quem.value.length;
	if (num > 1300)
	{	
		quem.value = quem.value.substr(0, 1300);
		alert ("O limite de caracters da mensagem foi ultrapassado");
	}
}

//funcao que seleciona o form_campo "quem"
function deselect(quem)
{
	quem.select();
}

//funcao do botao voltar
function voltar()
{
	//seta variavel que define que o botao limpa foi clicado
	bt_limpa = 1;
	
	window.history.back();
}

//funcao que formata valores 
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




//funcao que insere ",00" no blur e retira nop focus
function virgula(form_campo, v_blur, v_focus) {	
	return true;
}

//funcao para campos numericos
function num() {
	//teclas numericas	
	if (((event.keyCode) > 47) && ((event.keyCode) < 58)) {		
		//retorno da funcao
		return true;		
	} else {
		//retorno da funcao
		return false;
	}
}

function caracteres_br (campo, maxi) {	
	if (campo.value.indexOf('\n') < 0) {
		tam = campo.value.length;
		text = campo.value.substring(0,maxi) + '\n' + campo.value.substring(maxi,tam);
		campo.value = text;
	} else {
		n = 0;
		for (i = 1; n == 0; i++) {
			index_n = campo.value.indexOf('\n');
			tam = campo.value.length;
			text = campo.value.substring(0,(index_n - 1)) + campo.value.substring((index_n + 1),tam);
			if (campo.value.indexOf('\n') < 0) {
				n = 0;
			} else {
				n = 1;
			}
		}
		
		text = text.substring(0,maxi) + '\n' + text.substring(maxi,tam);
		campo.value = text;
	}
}

//funcao q abre pop-up
function abre_janela(theURL,winName,features)
    {
       window.open(theURL,winName,features);
       return false;
    }
	
//funcao do jump menu de sorteio
function jump(num) {
	num = num - 2;
	if (num >= 0) {
		sorteados.location.href = sorteados_arr[num];
	}
}

//funcao que abre pop-up
function abrir_janela_popup(theURL,winName,features) 
	{
		window.open(theURL,winName,features);
	}