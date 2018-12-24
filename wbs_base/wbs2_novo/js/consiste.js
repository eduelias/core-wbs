//***************************************************************************************
//  Funções específicas para determinados campos
//  Retorno: 0 = Erro
//           1 = Ok
//
// *** Descrição das funções ***
//
// -------------------------------------------------------------------------
// ------------- Funções revisadas por Jayme Junior (16/02/2001) -----------
// -------------------------------------------------------------------------
// function JavaScriptEstaAtivo (form) - Verifica se o JAVA SCRIPT do browser está ativo
// function AlteraHREF (form, link) - Altera o HREF com o valor do tag HREF
// function DateDiffDias (datafim, datainicio) - faz a diferença entre dias
// function DateDiffAno (datafim, datainicio) - faz a diferença entre anos
// function consisteUF (form, campo, obrigatorio) - função para consistir UF
// function VerificaIdade (form, campo, idademinima) - faz a consistência da idade de acordo com a idade mínima passada e emite mensagem e coloca o foco no campo informado
// function consisteIdadePessoa (form, campo, idademinima) - verifica se o numero de anos entre o campo e maior que a idade mínima passada
// function consisteVazioTamanho(form, campo, tammax) - limpa os espaços à direita e à esquerda, consiste o tamanho máximo e se vazio
// function consisteTamanho (form, campo, tammax) - limpa os espaços à direita e à esquerda e consiste o tamanho máximo
// function consisteTamanhoNumerico (form, campo, tammax) - verifica o tamanho de um campo, consistindo se ele é composto só de caracteres numéricos
// function verificaNumerico (strAver, i_f) - verifica se o parâmetro é composto somente de caracteres numéricos o paramametro i_f indica 1 - inteiros, 2 - float, separado por ponto ou vírgula
// function LTrim (str) - retira espaços em branco do lado esquerdo
// function RTrim (str) - retira espaços em branco do lado direito
// function Trim (str) - retira espaços em branco da esquerda e direita
// function verificaData (form, campo, obrigatorio) - verifica se a data informada é válida
// function eliminaNaoNumerico (form, campo) - elimina todos os caracteres não numéricos de uma string
// function consisteCEP (form, campo) - faz a consistência do CEP
// function consisteTelefone (form, campo, obrigatorio) - faz a verificação da validade dos dígitos do telefone
// function consisteValor (form, campo, obrigatorio) - faz a consistência de valores
// function consisteNumMinMax (form, campo, min, max, obrigatorio) - verifica se um determinado número está entre os parâmetros min e max
// function consisteTamanhoMinimoMaximo (form, campo, tammin, tammax) - verifica tamanho mínimo e máximo
// function consisteListaNumerico (form, campo, obrigatorio) - consiste lista elementos numericos
// -------------------------------------------------------------------------
// -------------------------- Não revisadas --------------------------------
// -------------------------------------------------------------------------
// function VerificaSenhas(formSenhas) - Verifica se a nova senha coincide com sua confirmação no momento de alteração
// function consisteRenda(form, campo) - para verificar se renda >=99,00 e <=999.999.999,00 
// function LimpaEspacos(form) - Função que limpa os espaços em branco de todos os campos do formulário 
// function consisteNome(form, campo)
// function possuiCartao(form, possui) -  Possui cartão ? 
// function verificaNomeCartao(form, campo, possui) - Verifica nome do Cartao
// function verificaNumeroCartao(form, campo, possui) - Verifica número do Cartao
// function outroBanco(form, banco) -  Entrar com cód. do banco ? 
// function verificaBanco(form, banco) 
// function consisteCGC_CPF(form, campo, pessoa, obrigatorio)
// function consisteCGC(form, campo, obrigatorio)
// function consisteCPF(form, campo, obrigatorio)
// function consisteID(form, campo, obrigatorio)
// function consisteEmissor(form, campo, valor) 
// function verificaMesAno (form, campo, obrigatorio) - Valida Mes e Ano do campo "Cliente Desde"
// -------------------------------------------------------------------------
//  ----------------------- Funções de uso geral ---------------------------
// -------------------------------------------------------------------------
// function verificaAlfa(strAver) 
// function consisteAno(form,campo,strAno) - Trata entrada de ano (APC) para casos de 2 e 4 digitos
// function CorrigeData(strData)
// function consisteTelefoneAPC(form, campo, obrigatorio)
// function consisteDDDAPC(form, campo, obrigatorio) - Realiza consistencia do DDD (pode ser 3 ou 4 dígitos, se for 3 preencher com espaço)
// ---------------------------------------------------------------------------------
// -------------------------- funcoes utilizadas pelo APC --------------------------
// --------------------------- inseridas por jmn 1108200 ---------------------------
// ---------------------------------------------------------------------------------
// function ChecaVazio(form, campo) 
// function consisteDataPrimeiroEmprego(form, campo)
// function consisteCEP_APC(form, campo)
// function LimparCampos(formulario) - Limpa os campos de um formulario
// ---------------------------------------------------------------------------------
// -------------------------- função utilizada pelo AFC e FLV ---------------------------
// ---------------------------------------------------------------------------------
// function consisteRendaMax(form, campo) - para verificar se renda > 999.999,00 
//***************************************************************************************

// Verifica se o JAVA SCRIPT do browser está ativo
function JavaScriptEstaAtivo (form)
{
	// retorna SIM para o campo passado como parametro
	form.JSA.value = 'SIM';
}

// Altera o HREF com o valor do tag HREF
function AlteraHREF (form, link)
{
	// monta o comando href
	link.href = link.href + form.JSA.value;
}

// faz a diferença entre dias
function DateDiffDias (datafim, datainicio)
{
        var DiffData;

	// criação dos strings contendo as datas passadas como parâmetro, para manipulação
       	var DtFim = new String (datafim);
        var DtIni = new String (datainicio);

	var MesFim = parseInt (DtFim.substring (3, 5), 10);
	var MesIni = parseInt (DtIni.substring (3, 5), 10);

	// subtrai conversão dos meses para o padrão do objeto 
        // date do JavaScript (JAN = 0, FEV = 1, ... DEC = 11)
	MesFim--;
	MesIni--;

	// criação dos objetos do tipo Date (JavaScript) para cálculo da diferença
	var DataFim = new Date (parseInt (DtFim.substring (6, 10), 10), MesFim, parseInt (DtFim.substring (0, 2), 10));
	var DataIni = new Date (parseInt (DtIni.substring (6, 10), 10), MesIni, parseInt (DtIni.substring (0, 2), 10));
	
	// cálculo da diferença entre as datas
	DiffData = DataFim - DataIni;

	// converte o total de milissegundos para dias
	DiffData = ((((DiffData / 1000) / 60) / 60) / 24);

	return DiffData;
}


// faz a diferença entre anos
function DateDiffAno (datafim, datainicio)
{
        var DtFim = new String (datafim);
        var DtIni = new String (datainicio);
        var IntAux;

	// subtrai os anos
	IntAux = parseInt (DtFim.substring (6, 10), 10) - parseInt (DtIni.substring (6, 10), 10);

	// obtem o mês e o dia das datas de início e fim, no formato MMDD
	var MesDiaFim = new String (DtFim.substring (3, 5) + DtFim.substring (0, 2));
	var MesDiaIni = new String (DtIni.substring (3, 5) + DtIni.substring (0, 2));

	// verifica se a diferença entre os anos foi maior que 0
	if (IntAux > 0)
	{
		// verifica se ainda não completou um ano
		if (MesDiaFim < MesDiaIni)
		{
			// subtrai um ano
			IntAux--;
		}
	}
	else
	{
		// verifica se a diferença entre os anos foi menor que 0
		if (IntAux < 0)
		{
			// verifica se já completou um ano
			if (MesDiaFim > MesDiaIni)
			{
				// soma um ano
				IntAux++;
			}
		}
	}

	return IntAux;
}

// função para consistir UF
function consisteUF (form, campo, obrigatorio)
{
	var strUF;

	// tira os espaços em branco à esquerda e à direita do campo
	eval ("strUF = Trim (form." + campo + ".value)");

	// verifica se o campo foi preenchido
	if (parseInt (strUF.length, 10) == 0)
	{
		// verifica se o campo é obrigatório
		if (obrigatorio)
		{
			alert(retornaNmCampo(campo) + ": Preenchimento obrigatório.");		

			eval ("form." + campo + ".focus ()");

			return 0;
		}
		else
		{
			return 1;
		}
	}
	else
	{
		if (parseInt (strUF.length, 10) != 2)
		{
			alert (retornaNmCampo (campo) + " deve ter dois caracteres.");

			eval ("form." + campo + ".focus ()");

			return 0;
		}
	}

	// converte os caracteres para maiúsculas
        strUF = strUF.toUpperCase ();

	// testa a UF com os valores válidos
	if ((strUF != "AC")  && // acre
	    (strUF != "AL")  && // alagoas
	    (strUF != "AM")  && // amazonas
	    (strUF != "AP")  && // amapá
	    (strUF != "BA")  && // bahia
	    (strUF != "CE")  && // ceará
	    (strUF != "DF")  && // distrito federal
	    (strUF != "ES")  && // espírito santo
	    (strUF != "GO")  && // goiás
	    (strUF != "MA")  && // maranhão
	    (strUF != "MG")  && // minas gerais
	    (strUF != "MS")  && // mato grosso do sul
	    (strUF != "MT")  && // mato grosso
	    (strUF != "PA")  && // pará
	    (strUF != "PB")  && // paraíba
	    (strUF != "PE")  && // pernambuco
	    (strUF != "PI")  && // piauí
	    (strUF != "PR")  && // paraná
	    (strUF != "RJ")  && // rio de janeiro
	    (strUF != "RN")  && // rio grande do norte
	    (strUF != "RO")  && // rondônia
	    (strUF != "RR")  && // roraima
	    (strUF != "RS")  && // rio grande do sul
	    (strUF != "SC")  && // santa catarina
	    (strUF != "SE")  && // sergipe
	    (strUF != "SP")  && // são paulo
	    (strUF != "TO"))    // tocantins
	{
		alert (retornaNmCampo (campo) + " invalido.");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	// devolde o campo reformatado para o formulário
	eval ("form." + campo + ".value = strUF");

	return 1;
}

// faz a consistência da idade de acordo com a idade mínima passada
// emite mensagem e coloca o foco no campo informado
function VerificaIdade (form, campo, idademinima)
{
	if (!(consisteIdadePessoa (form, campo, idademinima)))
	{
		alert ("Idade deve ser maior ou igual a " + idademinima + " anos.");

		eval ("form." + campo + ".focus ()");

		return false;
	}

	return true;
}

// verifica se o numero de anos entre o campo e maior que a idade mínima passada
function consisteIdadePessoa (form, campo, idademinima)
{
	var Hoje;
	var DataAniversario; 
	var DiaHoje;
	var MesHoje;
	var AnoHoje;
	var DiaData;
	var MesData;
	var AnoData;
	var IdadeMin = parseInt (idademinima, 10);

	// obtém a data do aniversário
	eval ("DataAniversario = form." + campo + ".value");

	// obtém a data de hoje
	Hoje = new Date ();

	// obtém o ano, o mês e o dia da data passada como parâmetro
	AnoData = parseInt (DataAniversario.substring (6, 10), 10);
	MesData = parseInt (DataAniversario.substring (3,  5), 10);
	DiaData = parseInt (DataAniversario.substring (0,  2), 10);

	// obtém o dia, o mês e o ano do dia de hoje
	DiaHoje = Hoje.getDate ();
	MesHoje = (Hoje.getMonth () + 1);
	AnoHoje = Hoje.getFullYear ();

	// verifica se a subtração dos anos é menor que IdadeMin
	if ((AnoHoje - AnoData) < IdadeMin)
	{
		return false;
	}
	else
	{
		// verifica se a subtração dos anos é igual a IdadeMin
		if ((AnoHoje - AnoData) == IdadeMin)
		{
			// verifica se os meses são iguais
			if (MesHoje == MesData)
			{
				// verifica se o dia de hoje é maior que o da data
				// (o aniversário já passou)
				if (DiaHoje >= DiaData)
				{
					return true;
				}

				return false;
			}
			else
			{
				// verifica se o mês de hoje é maior que o da data
				// (o aniversário já passou)
				if (MesHoje > MesData)
				{
					return true;
				}

				return false;
			}
		}
	}

	return true;
}

// limpa os espaços à direita e à esquerda, consiste o tamanho máximo e se vazio
function consisteVazioTamanho (form, campo, tammax)
{
	var strAux; // string auxiliar

	// limpa o campo de espaços à esquerda e à direita
	eval ("strAux = Trim (form." + campo + ".value)");

	// devolde o campo limpo de espaços para o formulário
	eval ("form." + campo + ".value = strAux");

	// verifica se o campo está vazio
	if (strAux.length == 0)
	{
		alert (retornaNmCampo (campo) + ": preenchimento obrigatório.");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	// verifica se o tamanho ultrapassou o tamanho máximo
	if (strAux.length > parseInt (tammax, 10))
	{
		alert ("Tamanho máximo do campo " + retornaNmCampo (campo) + " (" + tammax + ") excedido.");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	return 1;
}

// limpa os espaços à direita e à esquerda e consiste o tamanho máximo
function consisteTamanho (form, campo, tammax)
{
	var strAux; // string auxiliar

	// limpa o campo de espaços à esquerda e à direita
	eval ("strAux = Trim (form." + campo + ".value)");

	// devolde o campo limpo de espaços para o formulário
	eval ("form." + campo + ".value = strAux");

	// verifica se o tamanho ultrapassou o tamanho máximo
	if (strAux.length > parseInt (tammax, 10))
	{
		alert ("Tamanho máximo do campo " + retornaNmCampo (campo) + " (" + tammax + ") excedido.");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	return 1;
}

// verifica o tamanho de um campo, consistindo se ele é composto só de caracteres numéricos
function consisteTamanhoNumerico (form, campo, tammax) 
{
	var strAux; // string auxiliar

	// limpa o campo de espaços à esquerda e à direita
	eval ("strAux = Trim (form." + campo + ".value)");

	// devolde o campo limpo de espaços para o formulário
	eval ("form." + campo + ".value = strAux");

	// verifica se o tamanho ultrapassou o tamanho máximo
	if (strAux.length > parseInt (tammax, 10))
	{
		alert ("Tamanho máximo do campo " + retornaNmCampo (campo) + " (" + tammax + ") excedido.");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	// verifica se o campo contém apenas caracteres numéricos (como é 
	// inteiro não pode ter vírgulas ou ponto também) segundo parâmetro = 1
	if (verificaNumerico (strAux, 1) != 1)
	{
		alert (retornaNmCampo (campo) + " inválido");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	return 1;
}

// verifica se o parâmetro é composto somente de caracteres numéricos
// - o paramametro i_f indica 1 - inteiros
//                            2 - float, separado por ponto ou vírgula
function verificaNumerico (strAver, i_f)
{
	var i = 0;
	var j = 0;
	var comp;
	var teste = "0123456789.,"
	var subteste;
	var substrAver;
	var flgvg=0;

	// se estiver em branco, retorna Ok
	if (strAver == "")
	{
		return 1;
	}

	if (i_f == 1)
	{
		comp = 10;
	}
	else
	{
		comp = 12;
	}

	// varre cada dígito do número a ser verificado
	while (j < strAver.length)
	{
		substrAver = strAver.charAt (j);

		i = 0;

		// analisa se cada dígito do número a ser verificado é válido
		while (i < comp)
		{
			if (strAver.charAt (j) == teste.charAt (i))
			{
				// se for virgula (ou ponto) decimal, não pode ter duas...
				if ((teste.charAt (i) == ".")  ||
                                    (teste.charAt (i) == ","))
				{
					if (flgvg == 1)
					{
						return 0;
					}
					else
					{
						flgvg = 1;
					}
				}

				break;
			}
			else
			{
				// se o dígito não é válido, retorna ERRO
				if (i == (comp - 1))
				{
					return 0;
				}
			}

			i++;
		}

		j++;
	}

	return 1;
}

// retira espaços em branco do lado esquerdo
function LTrim (str)
{
	var whitespace = new String (" \t\n\r");
	var s = new String (str);

	// verifica se existe algum espaço à esquerda
	if (whitespace.indexOf (s.charAt (0)) != -1)
	{
		var j = 0;
		var i = s.length;

		// Busca o indice onde termina os espaços em branco
		// ou até terminar a string (só possuía brancos)
		while ((j                                 <   i)  &&
                       (whitespace.indexOf (s.charAt (j)) != -1))
		{
			j++;
		}

		// Pega a sub-string do primeiro caracter não branco pra frente
		s = s.substring (j, i);
	}

	return s;
}

// retira espaços em branco do lado direito
function RTrim (str)
{
	var whitespace = new String(" \t\n\r");
	var s = new String (str);

	// verifica se existe album espaço à direita
	if (whitespace.indexOf (s.charAt (s.length - 1)) != -1)
	{
		var i = (s.length - 1);

		// Busca, direta pra esquerda, o indice onde termina os espaços
		//  em branco ou até terminar a string (só possuía brancos)
		while ((i                                 >=  0)  &&
                       (whitespace.indexOf (s.charAt (i)) != -1))
		{
			i--;
		}

		// Pega a sub-string do inicio até o indice encontrado na busca
		s = s.substring (0, (i + 1));
	}

	return s;
}

// retira espaços em branco da esquerda e direita
function Trim (str)
{
	return RTrim (LTrim (str));
}

// verifica se a data informada é válida
function verificaData (form, campo, obrigatorio)
{
	var numberDate;
	var Dia;
	var Mes;
	var erroData;
	var aux;
	var barra="/";
	var menos="-";
	var tamData;

	eval ("numberDate = eliminaNaoNumerico (form, form." + campo + ".name)");

	if (parseInt (numberDate.length, 10) == 0)
	{
		eval ("form." + campo + ".value = ''");

		if (obrigatorio)
		{
			alert (retornaNmCampo (campo) + ": Preenchimento obrigatório.");

			eval ("form." + campo + ".focus()");

			return 0;
		}
		else
		{
			return 1;
		}
	}

	if (parseInt(numberDate.length, 10) != 8)
	{
		alert(retornaNmCampo(campo) + ": Use o formato DD/MM/AAAA");

		eval("form." + campo + ".focus()");

		return 0;
	}

	eval("form." + campo + ".value = numberDate.substring(0,2) + '/' + " + "numberDate.substring(2,4) + '/' + numberDate.substring(4,8)");

	eval("numberDate = form." + campo + ".value.substring(6, 10)");

	if (parseInt(numberDate, 10) < 1850)
	{
		alert(retornaNmCampo(campo) + ": Ano Inválido");

		eval("form." + campo + ".focus()");

		return 0;
	}

	eval("Mes = form." + campo + ".value.substring(3, 5)");

	if ((parseInt(Mes, 10) > 12)  ||
            (parseInt(Mes, 10) <  1))
	{
		alert(retornaNmCampo(campo) + ": Mês Inválido");

		eval("form." + campo + ".focus()");

		return 0;
	}

	eval("Dia = form." + campo + ".value.substring(0, 2)");

	// consiste o dia para abril, junho, setembro e novembro
	if ( (parseInt (Dia, 10) >  30)   &&
       	    ((parseInt (Mes, 10) ==  4)   ||
             (parseInt (Mes, 10) ==  6)   ||
       	     (parseInt (Mes, 10) ==  9)   ||
             (parseInt (Mes, 10) == 11)))
	{
		alert (retornaNmCampo(campo) + ": Dia Inválido");

		eval ("form." + campo + ".focus()");

		return 0;
	}
	else
	{
		// consiste o dia para fevereiro
		if (parseInt (Mes, 10) ==  2)
		{
			// verifica se o ano é divisivel por 400
			if ((parseInt (numberDate, 10) % 400) == 0)
			{
				// o ano é bissexto
				if (parseInt (Dia, 10) > 29)
				{
					alert (retornaNmCampo(campo) + ": Dia Inválido");

					eval ("form." + campo + ".focus()");

					return 0;
				}
			}
			else
			{
				// verifica se o ano é divisivel por 100
				if ((parseInt (numberDate, 10) % 100) == 0)
				{
					// o ano não é bissexto
					if (parseInt (Dia, 10) > 28)
					{
						alert (retornaNmCampo(campo) + ": Dia Inválido");

						eval ("form." + campo + ".focus()");

						return 0;
					}
				}
				else
				{
					// verifica se o ano é divisivel por 4
					if ((parseInt (numberDate, 10) % 4) == 0)
					{
						// o ano é bissexto
						if (parseInt (Dia, 10) > 29)
						{
							alert (retornaNmCampo(campo) + ": Dia Inválido");

							eval ("form." + campo + ".focus()");

							return 0;
						}
					}
					else
					{
						// o ano não é bissexto
						if (parseInt (Dia, 10) > 28)
						{
							alert (retornaNmCampo(campo) + ": Dia Inválido");

							eval ("form." + campo + ".focus()");

							return 0;
						}
					}
				}
			}
		}
		else
		{
			// consiste o dia para janeiro, março, maio, 
                        // julho, agosto, outubro e dezembro
			if ((parseInt (Dia, 10) > 31)  ||
        		    (parseInt (Dia, 10) <  1))
			{
alert ("Ultimo if do dia");

				alert (retornaNmCampo(campo) + ": Dia Inválido");

				eval ("form." + campo + ".focus()");

				return 0;
			}
		}
	}

	return 1;
}

// elimina todos os caracteres não numéricos de uma string
function eliminaNaoNumerico (form, campo)
{
	var valor;
	var tamanho;
	var cont;
	var valorNumerico = "";
	var numero = "0123456789";

	// obtém o conteúdo do campo
	eval ("valor = form." + campo + ".value");

	// obtém o tamanho do campo
	tamanho = valor.length;

	// percorre o string
	for (cont = 0; cont < parseInt (tamanho, 10); cont++)
	{
		// verifica se o caractere atual do campo existe na string de controle
		if (numero.indexOf (valor.charAt (cont)) != -1)
		{
			valorNumerico += valor.charAt (cont);
		}
	}

	return valorNumerico;
}

// faz a consistência do CEP
function consisteCEP (form, campo)
{
	var noCEP;
	var menos = "-";
	var zeros = "000";

	eval ("noCEP = eliminaNaoNumerico (form, form." + campo + ".name)");

	// retorna erro caso o usuário tenha preenchido somente zeros
	if (noCEP.substring (0, 5) == "00000")
	{
		alert (retornaNmCampo (campo) + ": CEP inválido");
		eval ("form." + campo + ".focus ()");
		return 0;
	}

	// verifica se o cep está preenchido
	if (noCEP.length == 0)
	{
		alert (retornaNmCampo (campo) + ": CEP inválido");
		eval ("form." + campo + ".focus ()");
		return 0;
	}

	// verifica se o CEP foi digitado com 5 números
	if (noCEP.length == 5)
	{
		// concatena "-000" no fim do campo
		eval ("form." + campo + ".value = noCEP + '-000'");
		return 1;
	}

	// verifica se o CEP foi digitado com 8 números
	if (noCEP.length == 8)
	{
		// formata o CEP
		eval ("form." + campo + ".value = noCEP.substring (0, 5) + '-' + noCEP.substring (5, 8)");
		return 1;
	}

	// qualquer tamanho diferente de 5 e 8, retorna erro
	if ((noCEP.length != 5) && (noCEP.length != 8))
	{
		alert (retornaNmCampo (campo) + ": tamanho inválido");
		eval ("form." + campo + ".focus ()");
		return 0;
	}
}

// faz a verificação da validade dos dígitos do telefone
function consisteTelefone (form, campo, obrigatorio)
{
	var cont;
	var cadeia;
	var teste = "0123456789";
	var noTel;

	// obtém o valor do campo
	eval ("cadeia = form." + campo + ".value");

	// verifica se o campo está preenchido
	if (cadeia.length == 0)
	{
		// verifica se o campo é obrigatório
		if (obrigatorio)
		{
			alert (retornaNmCampo(campo) + ": Preenchimento obrigatório.");

			eval ("form." + campo + ".focus ()");

			return 0;
		}
		else
		{
			return 1;
		}
	}

	// verifica se os caracteres são válidos
	for (cont=0; cont < cadeia.length; cont++)
	{
		if (teste.indexOf (cadeia.charAt (cont)) == -1)
		{
			alert (retornaNmCampo(campo) + ": Caracter inválido.");

			eval ("form." + campo + ".focus ()");

			return 0;
		}
	}

	// elimina os caracteres não numéricos do telefone
	eval ("noTel = eliminaNaoNumerico (form, form." + campo + ".name)");

	// verifica tamanho
	if (noTel.length < 6)
	{
		alert (retornaNmCampo (campo) + " deve ter 6 dígitos no mínimo.");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	// verifica tamanho
	if (cadeia.length > 10)
	{
		alert (retornaNmCampo (campo) + " deve ter 10 dígitos no máximo.");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	return 1;
}

// faz a consistência de valores
function consisteValor (form, campo, obrigatorio)
{
	var indPontoDec; // localizacao do ponto decimal
	var valor; // valor do campo
	var valorLimpo = ""; // valor filtrado (apenas numeros e virgula)
	var cont = 0; // contador
	var indPonto = 0; // localizacao do último ponto
	var indVirgula = 0; // localizacao da última virgula
	var numero = "0123456789"; // domínio de dígitos válidos
	var qtPonto = 0; // qtde de pontos de milhar
	var qtResto = 0; // resto de indPontoDec / 3
	var limite = 0; // limite da colocação do ponto de milhar

	// obtém o valor armazenado no campo limpando os espaços à direita e à esquerda
	eval ("valor = Trim (form." + campo + ".value)");

	// verifica se o campo está preenchido
	if (valor.length == 0)
	{
		// verifica se o campo é obrigatório
		if (obrigatorio)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}

	// descobre qual o último separador que está sendo utilizado
	indVirgula = valor.lastIndexOf (',');
	indPonto = valor.lastIndexOf('.');

	if (indVirgula == indPonto)
	{
		indPontoDec = -1;
	}
	else
	{
		if (indVirgula > indPonto)
		{
			indPontoDec = indVirgula;
		}
		else
		{
			indPontoDec = indPonto;
		}
	}

	// limpa dígitos não numéricos do valor
	for (cont = 0; cont < valor.length; cont++)
	{
		if (numero.indexOf (valor.charAt (cont)) != -1)
		{
			valorLimpo += valor.charAt (cont);
		}

		// substitui ponto decimal por vírgula
		if ((cont + 1) == indPontoDec)
		{
			cont++;
			valorLimpo += ',';
		}
		else
		{
			if ((cont        == 0)  &&
                            (indPontoDec == 0))
			{
				valorLimpo += ','
			}
		}
	}

	if (valorLimpo.indexOf (",") == -1)
	{
		valorLimpo += ",00";
	}

	if (valorLimpo.indexOf (",") == (valorLimpo.length - 1))
	{
		valorLimpo += "00";
	}

	if (valorLimpo.indexOf (",") == (valorLimpo.length - 2))
	{
		valorLimpo += "0";
	}

	if (valorLimpo.indexOf (",") < (valorLimpo.length - 3))
	{
		alert (retornaNmCampo (campo) + ": Utilize apenas duas casas decimais.");

		eval ("form."+campo+".focus ()");

		return 0;
	}

	// retira zeros à esquerda
	while (valorLimpo.charAt (0) == '0')
	{
		valorLimpo = valorLimpo.substring (1, valorLimpo.length);
	}

	// transforma ",xx" em "0,xx"
	if (valorLimpo.charAt (0) == ',')
	{
		valorLimpo = '0' + valorLimpo;
	}

	// coloca separação de milhar
	indPontoDec = valorLimpo.lastIndexOf (',');
	qtPonto = Math.floor (indPontoDec / 3);
	qtResto = indPontoDec % 3;

	if (qtResto == 0)
	{
		limite = 1;
	}
	else
	{
		limite = 0;
	}

	for (cont = (qtPonto - 1); cont >= limite; cont--)
	{
		valorLimpo = valorLimpo.substring (0, qtResto + cont * 3) + '.' + valorLimpo.substring (qtResto + cont * 3, valorLimpo.length);
	}

	// verifica o tamanho
	if (valorLimpo.length > 20)
	{
		alert (retornaNmCampo (campo) + ": Tamanho inválido");

		eval ("form."+campo+".focus ()");

		return 0;
	}

	eval ("form." + campo + ".value = valorLimpo");

	return 1
}

// verifica se um determinado número está entre os parâmetros min e max
function consisteNumMinMax (form, campo, min, max, obrigatorio)
{
	var aux;
	var limpa = "";

	eval ("aux = form." + campo + ".value.length");

	if (aux == 0)
	{
		// se obrigatorio e campo vazio
		if (obrigatorio)
		{
			alert (retornaNmCampo (campo) + ": Preenchimento obrigatório.");

			eval ("form." + campo + ".focus ()");

			return 0;
		}
		else
		{
			return 1;
		}
	}

	eval ("aux = form." + campo + ".value");

	if (verificaNumerico (aux, 1) != 1)
	{
		alert (retornaNmCampo (campo) + " inválido");

		eval ("form."+campo+".focus ()");

		return 0;
	}

	if (aux > parseInt (max, 10))
	{
		alert (retornaNmCampo (campo) + " não pode ser maior do que " + max);

		eval ("form."+campo+".focus ()");

		return 0;
	}

	if (aux < parseInt (min, 10))
	{
		alert (retornaNmCampo (campo) + " não pode ser menor do que " + min);

		eval ("form."+campo+".focus ()");

		return 0;
	}

	return 1;
}

// verifica tamanho mínimo e máximo
function consisteTamanhoMinimoMaximo (form, campo, tammin, tammax)
{
	var aux;
	var limpa = "";

	eval ("aux = form." + campo + ".value.length");

	if (aux < parseInt (tammin, 10))
	{
		alert (retornaNmCampo (campo) + " não pode ter menos do que " + tammin + " posições");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	if (aux > parseInt (tammax, 10))
	{
		alert (retornaNmCampo (campo) + " não pode ter mais do que " + tammax + " posições");

		eval ("form."+campo+".focus ()");

		return 0;
	}

	return 1;
}

// consiste lista elementos numericos
function consisteListaNumerico (form, campo, obrigatorio)
{
	var i;
	var j = 0;
	var teste = "0123456789, "
	var strAver;
	var substrAver;
	var flgvg = true; // flag de consistência de vírgulas (a lista tem que começar com um
                          // número, portanto o flag é inicializado com true
	var flgachou;

	// limpa o campo de espaços em branco e atribui para variavel local
	eval ("strAver = Trim (form." + campo + ".value)");

	// verifica se esta em branco
	if (strAver == "")
	{
		// verifica se o campo é obrigatório
		if (obrigatorio)
		{
			// se é obrigatório, emite mensagem de erro...
			alert (retornaNmCampo (campo) + ": Preenchimento obrigatorio");

			// ... coloca o foco no campo...
			eval ("form." + campo + ".focus ()");

			// ... e sai do processo com false
			return false;
		}
		else
		{
			// se não é obrigatório, sai do processo com true
			return true;
		}
	}

	// varre cada caractere da lista
	while (j < strAver.length)
	{
		// pega um caractere do string
		substrAver = strAver.charAt (j);

		// inicializa o contador da substring
		i = 0;

		// incializa o flag de caractere encontrado
		flgachou = false;

		// percorre o string de teste
		while (i < parseInt (teste.length, 10))
		{
			// verifica se achou o caractere atual da lista no string de teste
			if (substrAver == teste.charAt (i))
			{
				// seta o flag de caractere válido
				flgachou = true;

				// sai do loop
				break;
			}

			// incrementa o contador de posição do string de teste
			i++;
		}

		// verifica se achou o caractere
		if (flgachou)
		{
			// verifica se achou uma vírgula
			if (substrAver == ",")
			{
				// verifica se o flag de vírgula está setado
				if (flgvg)
				{
					// se o flag está setado, emite mensagem de erro...
					alert (retornaNmCampo (campo) + ": Lista inconsistente (utilize o formato XX, YY, ZZ ou XX,YY,ZZ)");

					// ... coloca o foco no campo...
					eval ("form." + campo + ".focus ()");

					// ... e sai do processo com false
					return false;
				}
				else
				{
					// seta o flag de vírgula
					flgvg = true;
				}
			}
			else
			{
				// verifica se achou um espaço
				if (substrAver == " ")
				{
					// verifica se o flag de vírgula não está setado
					// (portanto o espaço não vem depois da vírgula e 
					// é inválido)
					if (!(flgvg))
					{
						// se o flag está setado, emite mensagem de erro...
						alert (retornaNmCampo (campo) + ": Lista inconsistente (são permitidos espaços apenas após a vírgula)");

						// ... coloca o foco no campo...
						eval ("form." + campo + ".focus ()");

						// ... e sai do processo com false
						return false;
					}
				}
				else
				{
					// se não achou vírgula nem espaço e é caractere válido,
					// só pode ser um número, apaga o flag de vírgula
					flgvg = false;
				}
			}
		}
		else
		{
			// se não achou o caractere no string de teste, emite a mensagem de erro...
			alert (retornaNmCampo (campo) + ": Caractere inválido na lista (são permitidos apenas números separados por vírgulas)");

			// ... coloca o foco no campo...
			eval ("form." + campo + ".focus ()");

			// ... e retorna erro
			return false;
		}

		// incrementa o contador de posição da lista
		j++;
	}

	// verifica se o último caractere da lista é uma vírgula
	if (strAver.charAt (parseInt (strAver.length, 10) - 1) == ",")
	{
		// se o flag está setado, emite mensagem de erro...
		alert (retornaNmCampo (campo) + ": Lista inconsistente (não são permitidas vírgulas no início e no fim da lista e nem duas vírgulas consecutivas)");

		// ... coloca o foco no campo...
		eval ("form." + campo + ".focus ()");

		// ... e sai do processo com false
		return false;
	}

	// lista OK, retorna true
	return true;
}
// -- PAREI AQUI - JAYME 16/02/2001

// ---- Verifica se a nova senha coincide com sua confirmação no momento de alteração
function VerificaSenhas(formSenhas)
{
//	alert("entrou");
	if (formSenhas.senha_nova.value != formSenhas.conf_senha_nova.value)
	{
		alert("Senha nova não coincide com a confirmação!");
		formSenhas.senha_nova.value = "";
		formSenhas.conf_senha_nova.value = "";
		return false;
	}
	else
		return true;
}

// ---- Função  consisteRenda para verificar se renda >=99,00 e <=999.999,00 ----
function consisteRenda(form, campo)
{
	var  valor;
	var  out;
	var  add;
	var  pos;

	out = "."; // Substituir isto
	add = ""; // por isto
	valor = "" + campo;

	//alert("campo="+campo);
	//alert("valor="+valor);
	//Loop que retira os pontos do campo
	while (valor.indexOf(out)>-1)
	{
		pos= valor.indexOf(out);
		valor = "" + (valor.substring(0, pos) + add + 
		valor.substring((pos + out.length), valor.length));
		//alert("valor="+valor);
	}

	//Retira a vírgula e poe o ponto
	pos = valor.indexOf(",");
	valor = valor.substring(0,pos) + "." + valor.substring((pos+1),valor.length);
	//alert("valor apos tirar virgula e por ponto="+valor);
	valor = parseFloat(valor);
	//alert("valor apos parseFloat="+valor);
	if ((valor < 99.00) || (valor > 999999.00))
	{
		alert("Renda Mensal deve ser >= 99,00 e <= 999.999,00");
		form.RMT.focus();
		return false;
	}
	return true;
}

// ---- Função  consisteRendaMax para verificar se renda >=99,00 e <=999.999,00 ----
function consisteRendaMax(form, campo)
{
	var  valor;
	var  out;
	var  add;
	var  pos;

	out = "."; // Substituir isto
	add = ""; // por isto
	
	// obtém o valor armazenado no campo limpando os espaços à direita e à esquerda //teste
	eval ("valor = Trim (form." + campo + ".value)"); //teste = consistevalor


	//Loop que retira os pontos do campo

	while (valor.indexOf(out)>-1) //até que não tenha mais pontos
	{
		pos= valor.indexOf(out);
		valor = "" + (valor.substring(0, pos) + add + 
		valor.substring((pos + out.length), valor.length));
	}

	//Retira a vírgula e poe o ponto
	pos = valor.indexOf(",");
	
	valor = valor.substring(0,pos) + "." + valor.substring((pos+1),valor.length);
	//alert("valor apos tirar virgula e por ponto="+valor);
	
	valor = parseFloat(valor);
	//alert("valor apos parseFloat="+valor);
	
	
	if (valor > 999999.00)
	{
		alert(retornaNmCampo(campo) + " deve ser <= 999.999,00");
		
		eval("form." + campo + ".focus()");
		return false;
	}
	return true;
}

// ---- Função que limpa os espaços em branco de todos os campos do formulário ----
function LimpaEspacos(form)
{
	var    vlNumCampos;
	var    i;

	vlNumCampos = form.length;
	for (i = 0; i < vlNumCampos; i++)
	{
		//alert(form.elements[i].value + ".");
		form.elements[i].value = Trim(form.elements[i].value);
		//alert(form.elements[i].value + ".");
	}
}

// --- Consiste Nome ---
function consisteNome(form, campo)
{
	var cont;
	var teste = "0123456789";
	var cadeia;
	var tamCadeia;

	//alert("entrou consiste nomes.");
	//alert("form.TPT.value =" + form.TPT.value);

	if (form.TPT.value == "F")
	{
		tamCadeia = 0;
		eval("cadeia=form." + campo + ".value");
		tamCadeia = cadeia.length;
		for(cont=0;cont < tamCadeia; cont++)
		{
			//Verifica se no nome existe algum número
			// se houver retorna erro, senão termina a função e retorna OK
			if (teste.indexOf(cadeia.charAt(cont)) != -1)
			{
				alert("Campo Nome não pode conter números.");
				eval("form." + campo + ".focus()");
				return 0;
			}
		}

	}

	return 1;
}

// ----  Possui cartão ?  ----
function possuiCartao(form, possui)
{
	if (possui=="N")
	{
		form.NMCO.value="";
		form.NOCO.value="";
		form.BCOR.focus();
	}
	return;
}

// ----  Verifica nome do Cartao  ----
function verificaNomeCartao(form, campo, possui)
{
	var valor;

	eval("valor=form." + campo + ".value");
	if ((possui=="N") && (valor.length!=0))
	{
        alert("Selecione a opção 'Sim' em 'Possui cartão'.");
	    form.PCO.focus();
        return 0;
	}
	if ((possui=="S") && (valor.length==0))
	{
		alert(retornaNmCampo(campo) + ": Preenchimento obrigatório.");
		eval("form." + campo + ".focus()");
		return 0;
	}
	if (consisteTamanho(form, form.NMCO.name, 40) != 1)
		return 0;
	else
		return 1;
}

// ----  Verifica número do Cartao  ----
function verificaNumeroCartao(form, campo, possui)
{
	var valor;

	eval("valor=form." + campo + ".value");
	if ((possui=="N") && (valor.length!=0))
	{
        alert("Selecione a opção 'Sim' em 'Possui cartão'.");
	    form.PCO.focus();
        return 0;
	}
	if ((possui=="S") && (valor.length==0))
		return 1;
	if (consisteTamanhoNumerico(form, form.NOCO.name, 20) != 1)
		return 0;
	else
		return 1;
}

// ----  Entrar com cód. do banco ?  ----
function outroBanco(form, banco)
{
	if (banco!="000")
	{
		form.AGR.focus();
		form.DBCR.value="";
	}
	return;
}

// ----  Verifica Banco  ----
function verificaBanco(form, banco)
{
	if ((banco!="000") && (form.DBCR.value.length!=0))
	{
        alert("Selecione o Banco 'Outro'.");
	    form.BCOR.focus();
        return 0;
	}
	if ((banco=="000") && (form.DBCR.value.length==0))
	{
		alert("Cód.Banco: Preenchimento obrigatório.");
		form.DBCR.focus();
		return 0;
	}
	if (consisteTamanhoNumerico(form, form.DBCR.name, 3) != 1)
	{
		form.DBCR.focus();
		return 0;
	}
	else
		return 1;
}

// ----  Verifica CGC e CPF  ----
function consisteCGC_CPF(form, campo, pessoa, obrigatorio)
{
	var retorno;

	if (pessoa=="F")
		eval("retorno = consisteCPF(form, form." + campo + ".name, obrigatorio)");
	else if (pessoa=="J")
		eval("retorno = consisteCGC(form, form." + campo + ".name, obrigatorio)");
	else //caso nao tenha sido determinado se e F ou J
		retorno=true;
	return retorno;
}

// ----  Verifica CGC  ----
function consisteCGC(form, campo, obrigatorio)
{
	var tamanho;
	var noCGC;
	var digito_verificador;
	var soma;
	var peso;
	var i;

	eval("noCGC=eliminaNaoNumerico(form, form." + campo + ".name)");
	if ((obrigatorio) && (noCGC.length==0))
	{
        alert(retornaNmCampo(campo) + ": Preenchimento obrigatório.");
	    eval("form." + campo + ".focus()");
        return 0;
	}
	if ((!obrigatorio) && (noCGC.length==0)) return 1;

	if (noCGC.length != 14)
	{
		alert(retornaNmCampo(campo) + ": Tamanho inválido");
		eval("form." + campo + ".focus()");
		return 0;
	}

	//  calculo 1º dígito do CGC
	soma=0;
	peso=5;
	for (i=0;i<12;i++)
	{
		soma+=peso*(parseInt(noCGC.charAt(i), 10));
		peso--;
		if (peso==1) peso=9;
	}
	digito_verificador = 11-(soma % 11);
	if ((soma % 11)<2) digito_verificador=0;
	if (parseInt(noCGC.charAt(12), 10)!=digito_verificador)
	{
        alert(retornaNmCampo(campo) + " Inválido");
		eval("form." + campo + ".focus()");
        return 0;
	}

	//  calculo 2º dígito do CGC
	soma=0;
	peso=6;
	for (i=0;i<12;i++)
	{
		soma+=peso*(parseInt(noCGC.charAt(i), 10));
		peso--;
		if (peso==1) peso=9;
	}
	soma = soma + digito_verificador * 2;
	digito_verificador = 11-(soma % 11);
	if ((soma % 11)<2) digito_verificador=0;
	if (parseInt(noCGC.charAt(13), 10)!=digito_verificador)
	{
        alert(retornaNmCampo(campo) + " Inválido");
		eval("form." + campo + ".focus()");
        return 0;
	}

	eval("form." + campo + ".value = noCGC.substring(0,2) + '.' + " +
	     "noCGC.substring(2,5) + '.' + noCGC.substring(5,8) + '/' + " +
		 "noCGC.substring(8,12) + '-' + noCGC.substring(12,14)");
	return 1;
}

// ----  Verifica CPF  ----
function consisteCPF(form, campo, obrigatorio)
{
	var tamanho;
	var noCPF;
	var digito_verificador;
	var soma;
	var i;

	eval("noCPF=eliminaNaoNumerico(form, form." + campo + ".name)");
	if ((obrigatorio) && (noCPF.length==0))
	{
        alert(retornaNmCampo(campo) + ": Preenchimento obrigatório.");
	    eval("form." + campo + ".focus()");
        return 0;
	}
	if ((!obrigatorio) && (noCPF.length==0)) return 1;
	if (noCPF.length != 11)
	{
		alert(retornaNmCampo(campo) + ": Tamanho inválido");
		eval("form." + campo + ".focus()");
		return 0;
	}

	//  calculo 1º dígito do CPF
	soma=0;
	for (i=0;i<9;i++)
		soma+=(10-i)*(parseInt(noCPF.charAt(i), 10));
	digito_verificador = 11-(soma % 11);
	if ((soma % 11)<2) digito_verificador=0;
	if (parseInt(noCPF.charAt(9), 10)!=digito_verificador)
	{
        alert(retornaNmCampo(campo) + " Inválido");
		eval("form." + campo + ".focus()");
        return 0;
	}

	//  calculo 2º dígito do CPF
	soma=0;
	for (i=0;i<10;i++)
		soma+=(11-i)*(parseInt(noCPF.charAt(i), 10));
	digito_verificador = 11-(soma % 11);
	if ((soma % 11)<2) digito_verificador=0;
	if (parseInt(noCPF.charAt(10), 10)!=digito_verificador)
	{
        alert(retornaNmCampo(campo) + " Inválido");
		eval("form." + campo + ".focus()");
        return 0;
	}
	eval("form." + campo + ".value = noCPF.substring(0,3) + '.' + " +
		 "noCPF.substring(3,6) + '.' + noCPF.substring(6,9) + '-' + " + 
	     "noCPF.substring(9,11)");
	return 1;
}

// ----  Verifica Identidade -----
function consisteID(form, campo, obrigatorio)
{
	var boolID;

	if (obrigatorio)
		eval("boolID = consisteVazioTamanho(form, form." + campo + ".name, 10)");
	else
		eval("boolID = consisteTamanhoNumerico(form, form." + campo + ".name, 10)");
	if (boolID != 1)
		return 0;
	else
		return 1;
}

// -------------------------
function consisteEmissor(form, campo, valor) 
{
   if (consisteTamanho(form, campo, 5)!=1)
      return 0;
   
   return 1;
}


//***************************************************************************************
//  Funções de uso geral
//***************************************************************************************

// -------------------------

//============================================================
function verificaAlfa(strAver) 
{
   var i = 0;
   var j = 0;
   var comp;
   var teste = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
   var subteste;
   var substrAver;
   var flgvg=0;

   if (strAver=="")
      return 1;
  
   comp = 52;

   while ( j < strAver.length)
   {
      substrAver = strAver.charAt(j);
      i=0;
      while ( i < comp)
      {
          if (strAver.charAt(j)==teste.charAt(i))
             break;
          else
          {
             if (i == (comp-1))
                return 0;
          }
          i++;       
      }
      j++;
   }
   return 1;
}

////////////////////////////////////////////////////////////////////////////////////
//  consisteAno - Trata entrada de ano (APC) para casos de 2 e 4 digitos
//
//  trata ano:
//
//  se for YY
//    se YY >50 entao 19YY
//    senao 20YY
//////////////////////////////////////////////////////////////////////////////////////

function consisteAno(form,campo,strAno)
{
	//verifica primeiro se é numerico
	if (verificaNumerico(strAno,1)==1)
	{
		//se tiver 2 dígitos
		if (strAno.length == 2)
		{
			//checo se é maior que 50
			if (parseInt(strAno, 10)>=50)
				return "19" + strAno;
			else
				return "20" + strAno;
		}
		else
		if (strAno.length == 4)
		{
			return strAno;
		}
		else
		{
			alert(retornaNmCampo(campo) + ": Ano deve ter 2 ou 4 dígitos.");
			eval("form." + campo + ".focus()");
			return strAno;
		}

	}
	else
	{
		alert(retornaNmCampo(campo) + ": Ano deve ser numérico.");
		eval("form." + campo + ".focus()");
		return "";
	}
}

function CorrigeData(strData)
{
	var strAno;
	var iPos;
	var strDataOK;
	
	//Verifica se o tamanho de strData é maior que zero
	if (parseInt(strData.length, 10) > 0)
	{
		//copio para nao estragar o original
		strDataOK = strData;
		
		//procuro dados com menos de 2 digitos
		
		//primeira barra
		iPos = strDataOK.indexOf ('/',0);

		//Se não achou procura por '-'
		if(iPos == -1)
			iPos = strDataOK.indexOf ('-',0);

		//alert ("valor de iPos (primeira barra):" + iPos);
		if(iPos == -1)
		{
			//nao existem barras
			//alert("Formato de data inválido")
			return strData;
		}
		else
			if (iPos < 2)
			{
				strDataOK = '0' + strDataOK;
				//alert("corrigido o dia!  " + strDataOK);
			}

		//segunda barra
		iPos = strDataOK.indexOf ('/',iPos+2);

		//Se não achou procura por '-'
		if(iPos == -1)
			iPos = strDataOK.indexOf ('-',iPos+2);

		//alert ("valor de iPos (segunda barra):" + iPos);
		if(iPos == -1)
		{
			//nao existe segunda barra
			//alert("Formato de data inválido");
			return strData;
		}
		else
		if(iPos < 5)
		{
			//alert ("valor de iPos:" + iPos);
			strDataOK = strDataOK.substring(0,3) + '0' + strDataOK.substring(3,strDataOK.length);
			//alert("corrigido o mes!  " + strDataOK);
		}

		if (strDataOK.length == 8)
		{
			strAno = strDataOK.substring(6,8);

			if (verificaNumerico(strAno,1)==1)
			{
				//checo se é maior que 50
				if (parseInt(strAno, 10)>=50)
				{
					return strDataOK.substring(0,6) + "19" + strAno;
				}
				else
					return strDataOK.substring(0,6) + "20" + strAno;
			}
		}
		else
			return strDataOK;
	} //tamanho > 0
	else
		return strData;
}

//cmlima - 28/12/1997
//ConsisteTelefone para o APC

// Mauricio - 28/12/97
// Alterado para tratar o número do telefone sem DDD

//jmn211099
//iclusao de testes para SCS

// ----  Consiste Telefone APC ----

function consisteTelefoneAPC(form, campo, obrigatorio)
{
	var cont;
	var cadeia;
	var teste = "0123456789- ";
	var noTel;
	var	noTelVal;
	var Car_iguais;
	var caracter;

	eval("cadeia=form." + campo + ".value");
	if (cadeia.length==0)
	{
		if (obrigatorio)
		{
			alert(retornaNmCampo(campo) + ": Preenchimento obrigatório.");
			eval("form." + campo + ".focus()");
			return 0;
		}
		else
			return 1;
	}

	// verifica se os caracteres são válidos
	for (cont=0; cont < cadeia.length; cont++)
	{
		//Check para nao aceitar telefones iniciados com 1
		if (cont==0)
		{
			//alert("cont é igual a 0");
			if (cadeia.charAt(cont) == "1")
			{
				alert("Campo telefone não pode começar com 1.");
				eval("form." + campo + ".focus()");
				return 0;
			}
		}

		if (teste.indexOf(cadeia.charAt(cont)) == -1)
		{
			alert(retornaNmCampo(campo) + ": Caracter inválido.");
			eval("form." + campo + ".focus()");
			return 0;
		}
	}

	eval("noTel=eliminaNaoNumerico(form, form." + campo + ".name)");

	// verifica tamanho, somente serão válidos 7 ou 8 dígitos
	if (noTel.length < 6)
	{
		alert(retornaNmCampo(campo) + ": O telefone deve ter no mínimo 6 dígitos.");
		eval("form." + campo + ".focus()");
		return 0;
	}

	if (noTel.length > 8)
	{
		alert(retornaNmCampo(campo) + ": O telefone deve ter no máximo 8 dígitos.");
		eval("form." + campo + ".focus()");
		return 0;
	}

	if(noTel.length == 6)
	{
		eval("form." + campo + ".value = noTel.substring(0,2) + '-' + noTel.substring(2,7)");
	}
	else
	{
		if(noTel.length == 7)
		{
			eval("form." + campo + ".value = noTel.substring(0,3) + '-' + noTel.substring(3,8)");
		}
		else
		{
			eval("form." + campo + ".value = noTel.substring(0,4) + '-' + noTel.substring(4,9)");
		}
	}

/*	testes para SCS	*/

	noTelVal= parseInt(noTel, 10);
	if(noTelVal < 100000)
	{
		alert(retornaNmCampo(campo) + ": O número do telefone deve ser maior que 99999");
		eval("form." + campo + ".focus()");
		return 0;
	}

	caracter = noTel.substring(0,5);
	if(caracter == "00000")
	{
		Car_iguais = true;
	}
	else if (caracter == "11111")
	{
		Car_iguais = true;
	}
	else if (caracter == "22222")
	{
		Car_iguais = true;
	}
	else if (caracter == "33333")
	{
		Car_iguais = true;
	}
	else if (caracter == "44444")
	{
		Car_iguais = true;
	}
	else if (caracter == "55555")
	{
		Car_iguais = true;
	}
	else if (caracter == "66666")
	{
		Car_iguais = true;
	}
	else if (caracter == "77777")
	{
		Car_iguais = true;
	}
	else if (caracter == "88888")
	{
		Car_iguais = true;
	}
	else if (caracter == "99999")
	{
		Car_iguais = true;
	}

	if(Car_iguais)
	{
		alert(retornaNmCampo(campo) + ": Número de telefone inválido");
		eval("form." + campo + ".focus()");
		return 0;
	}

	caracter = noTel.substring(0,1);
	if(caracter == "0")
	{
		alert(retornaNmCampo(campo) + ": Número de telefone não pode começar com zero");
		eval("form." + campo + ".focus()");
		return 0;
	}


	return 1;
}

/*	Mauricio - 28/12/97
	
	Realiza consistencia do DDD (pode ser 3 ou 4 dígitos, se for 3 preencher com espaço)
*/
function consisteDDDAPC(form, campo, obrigatorio)
{
	
	//checa se o campo está vazio
	eval("cadeia=form." + campo + ".value");
	if (cadeia.length==0)
	{
		if (obrigatorio)
		{
			alert(retornaNmCampo(campo) + ": Preenchimento obrigatório.");
			eval("form." + campo + ".focus()");
			return 0;
		}
		else
			return 1;
	}

	//verifica existência de caracteres inválidos
	if (verificaNumerico(cadeia,1)!=1)
	{
		alert(retornaNmCampo(campo) + ": Caracteres Inválidos.");
		eval("form." + campo + ".focus()");
		return 0;
	}

	//verifica se tem 4 dígitos
	if(cadeia.length==4)
		return 1;
	else
	{
		//se tem 3 dígitos concateno espaço na frente
		if(cadeia.length==3)
		{
			eval("form." + campo + ".value = ' ' + form." + campo + ".value");
			return 1;
		}
		//se tem qq outro numero de digitos então alerta o usuario
		else
		{
			alert(retornaNmCampo(campo) + ": Número de dígitos inválidos.");
			eval("form." + campo + ".focus()");
			return 0;
		}
	}
	
}

// -------------------------- funcoes utilizadas pelo APC --------------------------
// --------------------------- inseridas por jmn 1108200 ---------------------------

//***************************************************************************************
//  Funções utilitarias
//***************************************************************************************


// ----  Verifica se Vazio -----
function ChecaVazio(form, campo) 
{
   var Conteudo;
   var Tamanho;
   var c;
   var aux="";
   var caracter;

   eval("Conteudo = form."+campo+".value");
   Tamanho = Conteudo.length;

   for (c = 0; c < Tamanho; c++)
   {
		caracter = Conteudo.substring(c,c + 1);
		if (caracter != " ")
		{
			aux = aux + caracter;
		}
   }

   Tamanho = aux.length;

   if (Tamanho==0)
   {
      return true;
   }
   return false;
}


function consisteDataPrimeiroEmprego(form, campo)
{
	var Hoje;
	var DiaHoje;
	var MesHoje;
	var AnoHoje;
	var DiaData;
	var MesData;
	var AnoData;

	Hoje = new Date();

//	alert(campo);
//	alert(Hoje);

	AnoData = parseInt(campo.substring(6,10), 10);
	MesData = parseInt(campo.substring(3,5), 10);
	DiaData = parseInt(campo.substring(0,2), 10);

//	alert(DiaData);
//	alert(MesData);
//	alert(AnoData);

	DiaHoje = Hoje.getDate();
	MesHoje = Hoje.getMonth() + 1;
	AnoHoje = Hoje.getFullYear();

//	alert(DiaHoje);
//	alert(MesHoje);
//	alert(AnoHoje);

	if((AnoHoje - AnoData) == 0)
	{
		return false;
	}
	else if(AnoHoje - AnoData == 1)
	{
		if(MesHoje == MesData)
		{
			if(DiaHoje > DiaData)
			{
				return true;
			}
			return false;
		}
		else if(MesHoje > MesData)
		{
			return true;
		}
		return false;
	}

	return true;
}

// ----  verifica CEP -----
function consisteCEP_APC(form, campo)
{
	var noCEP;
	var menos="-";
	var zeros="000";
	var valCep=0;

//	alert("form:" + form);

//	alert("campo:" + campo);

	eval("noCEP=eliminaNaoNumerico(form, form." + campo + ".name)");

	if (noCEP.length==0)
	{
		eval("form." + campo + ".value = ''");
		return 1;
	}

//	alert("noCEP:" + noCEP);
	valCep = parseInt(String(noCEP),10);
//	alert("valCep:" + valCep);

	if (isNaN(valCep))
	{
		alert(retornaNmCampo(campo) + ": caracter inválido");
		eval("form."+campo+".focus()");
		return 0;
	}

	if(valCep == 0)
	{
		alert(retornaNmCampo(campo) + ": não pode ser zero");
		eval("form."+campo+".focus()");
		return 0;
	}

//	if (noCEP.length==5)
//	{
//		eval("form." + campo + ".value = noCEP + '-000'");
//		return 1;
//	}

	if (noCEP.length==8)
	{
		eval("form." + campo + ".value = noCEP.substring(0,5) + '-' + noCEP.substring(5,8)");
		return 1;
	}

	alert(retornaNmCampo(campo) + ": tamanho inválido");
	eval("form."+campo+".focus()");
	return 0;
}


// ----  Limpa os campos de um formulario  ----
function LimparCampos(formulario)
{
	vlNumCampos = formulario.length;
	for (i = 0; i < vlNumCampos; i++)
	{
		vlTipo = formulario.elements[i].type.toUpperCase();
//		alert(vlTipo);
		if(vlTipo == "TEXT")
			formulario.elements[i].value = "";
		else if(vlTipo == "SELECT-ONE")
			formulario.elements[i].options[0].selected = true;
		else if(vlTipo == "CHECKBOX")
			formulario.elements[i].checked = false;
		else if(vlTipo == "RADIO")
			formulario.elements[i].checked = false;
	}
}

//Valida Mes e Ano do campo "Cliente Desde"
function verificaMesAno (form, campo, obrigatorio)
{
	var numberDate;
	var Mes;
	var AnoInf;
	var DataAtual;
	var AnoAtual;
	
	eval ("numberDate = eliminaNaoNumerico (form, form." + campo + ".name)");

	//verifica se o campo não está vazio
	if (parseInt (numberDate.length, 7) == 0)
	{
		if (obrigatorio)
		{
			alert(retornaNmCampo (campo) + ": Preenchimento obrigatório.");
			eval ("form." + campo + ".focus()");
			return 0;
		}
		else
		{
			return 1;
		}
	}

	if (parseInt (numberDate.length, 7) != 6 )
	{
		alert(retornaNmCampo (campo)  + ": Informe a data no formato MM/AAAA");

		eval("form." + campo + ".focus()");

		return 0;
	}

	//obter data de hoje
	DataAtual = new Date ();
		
	// obtém ano do dia de hoje
	AnoAtual = DataAtual.getFullYear ();

	//obter ano digitado
	eval("AnoInf = numberDate.substring(2, 06)");

	//Verifica se ano de abertura da conta é > que 1900 e < que ano atual
	if ( (parseInt(AnoInf, 10) > AnoAtual) ||
		 (parseInt(AnoInf, 10) < 1900    ) )
	{
		alert(retornaNmCampo (campo)  + ": Ano Inválido");

		eval("form." + campo + ".focus()");

		return 0;
	}

	//obter Mês digitado
	eval("Mes = form." + campo + ".value.substring(0, 2)");

	//Verifica se o mês informado é válido
	if ((parseInt(Mes, 10) > 12)  ||
            (parseInt(Mes, 10) <  1))
	{
		alert(retornaNmCampo (campo) + ": Mês Inválido");

		eval("form." + campo + ".focus()");

		return 0;
	}

	//Formata o campo incluindo a barra (/)
	//numberDate tem apenas 6 dígitos pq no início foi retirado o separador 
	eval("form." + campo + ".value = numberDate.substring(0,2) + '/' + " + "numberDate.substring(2,6)");

	return 1;
}
