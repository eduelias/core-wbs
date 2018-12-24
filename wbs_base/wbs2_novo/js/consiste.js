//***************************************************************************************
//  Fun��es espec�ficas para determinados campos
//  Retorno: 0 = Erro
//           1 = Ok
//
// *** Descri��o das fun��es ***
//
// -------------------------------------------------------------------------
// ------------- Fun��es revisadas por Jayme Junior (16/02/2001) -----------
// -------------------------------------------------------------------------
// function JavaScriptEstaAtivo (form) - Verifica se o JAVA SCRIPT do browser est� ativo
// function AlteraHREF (form, link) - Altera o HREF com o valor do tag HREF
// function DateDiffDias (datafim, datainicio) - faz a diferen�a entre dias
// function DateDiffAno (datafim, datainicio) - faz a diferen�a entre anos
// function consisteUF (form, campo, obrigatorio) - fun��o para consistir UF
// function VerificaIdade (form, campo, idademinima) - faz a consist�ncia da idade de acordo com a idade m�nima passada e emite mensagem e coloca o foco no campo informado
// function consisteIdadePessoa (form, campo, idademinima) - verifica se o numero de anos entre o campo e maior que a idade m�nima passada
// function consisteVazioTamanho(form, campo, tammax) - limpa os espa�os � direita e � esquerda, consiste o tamanho m�ximo e se vazio
// function consisteTamanho (form, campo, tammax) - limpa os espa�os � direita e � esquerda e consiste o tamanho m�ximo
// function consisteTamanhoNumerico (form, campo, tammax) - verifica o tamanho de um campo, consistindo se ele � composto s� de caracteres num�ricos
// function verificaNumerico (strAver, i_f) - verifica se o par�metro � composto somente de caracteres num�ricos o paramametro i_f indica 1 - inteiros, 2 - float, separado por ponto ou v�rgula
// function LTrim (str) - retira espa�os em branco do lado esquerdo
// function RTrim (str) - retira espa�os em branco do lado direito
// function Trim (str) - retira espa�os em branco da esquerda e direita
// function verificaData (form, campo, obrigatorio) - verifica se a data informada � v�lida
// function eliminaNaoNumerico (form, campo) - elimina todos os caracteres n�o num�ricos de uma string
// function consisteCEP (form, campo) - faz a consist�ncia do CEP
// function consisteTelefone (form, campo, obrigatorio) - faz a verifica��o da validade dos d�gitos do telefone
// function consisteValor (form, campo, obrigatorio) - faz a consist�ncia de valores
// function consisteNumMinMax (form, campo, min, max, obrigatorio) - verifica se um determinado n�mero est� entre os par�metros min e max
// function consisteTamanhoMinimoMaximo (form, campo, tammin, tammax) - verifica tamanho m�nimo e m�ximo
// function consisteListaNumerico (form, campo, obrigatorio) - consiste lista elementos numericos
// -------------------------------------------------------------------------
// -------------------------- N�o revisadas --------------------------------
// -------------------------------------------------------------------------
// function VerificaSenhas(formSenhas) - Verifica se a nova senha coincide com sua confirma��o no momento de altera��o
// function consisteRenda(form, campo) - para verificar se renda >=99,00 e <=999.999.999,00 
// function LimpaEspacos(form) - Fun��o que limpa os espa�os em branco de todos os campos do formul�rio 
// function consisteNome(form, campo)
// function possuiCartao(form, possui) -  Possui cart�o ? 
// function verificaNomeCartao(form, campo, possui) - Verifica nome do Cartao
// function verificaNumeroCartao(form, campo, possui) - Verifica n�mero do Cartao
// function outroBanco(form, banco) -  Entrar com c�d. do banco ? 
// function verificaBanco(form, banco) 
// function consisteCGC_CPF(form, campo, pessoa, obrigatorio)
// function consisteCGC(form, campo, obrigatorio)
// function consisteCPF(form, campo, obrigatorio)
// function consisteID(form, campo, obrigatorio)
// function consisteEmissor(form, campo, valor) 
// function verificaMesAno (form, campo, obrigatorio) - Valida Mes e Ano do campo "Cliente Desde"
// -------------------------------------------------------------------------
//  ----------------------- Fun��es de uso geral ---------------------------
// -------------------------------------------------------------------------
// function verificaAlfa(strAver) 
// function consisteAno(form,campo,strAno) - Trata entrada de ano (APC) para casos de 2 e 4 digitos
// function CorrigeData(strData)
// function consisteTelefoneAPC(form, campo, obrigatorio)
// function consisteDDDAPC(form, campo, obrigatorio) - Realiza consistencia do DDD (pode ser 3 ou 4 d�gitos, se for 3 preencher com espa�o)
// ---------------------------------------------------------------------------------
// -------------------------- funcoes utilizadas pelo APC --------------------------
// --------------------------- inseridas por jmn 1108200 ---------------------------
// ---------------------------------------------------------------------------------
// function ChecaVazio(form, campo) 
// function consisteDataPrimeiroEmprego(form, campo)
// function consisteCEP_APC(form, campo)
// function LimparCampos(formulario) - Limpa os campos de um formulario
// ---------------------------------------------------------------------------------
// -------------------------- fun��o utilizada pelo AFC e FLV ---------------------------
// ---------------------------------------------------------------------------------
// function consisteRendaMax(form, campo) - para verificar se renda > 999.999,00 
//***************************************************************************************

// Verifica se o JAVA SCRIPT do browser est� ativo
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

// faz a diferen�a entre dias
function DateDiffDias (datafim, datainicio)
{
        var DiffData;

	// cria��o dos strings contendo as datas passadas como par�metro, para manipula��o
       	var DtFim = new String (datafim);
        var DtIni = new String (datainicio);

	var MesFim = parseInt (DtFim.substring (3, 5), 10);
	var MesIni = parseInt (DtIni.substring (3, 5), 10);

	// subtrai convers�o dos meses para o padr�o do objeto 
        // date do JavaScript (JAN = 0, FEV = 1, ... DEC = 11)
	MesFim--;
	MesIni--;

	// cria��o dos objetos do tipo Date (JavaScript) para c�lculo da diferen�a
	var DataFim = new Date (parseInt (DtFim.substring (6, 10), 10), MesFim, parseInt (DtFim.substring (0, 2), 10));
	var DataIni = new Date (parseInt (DtIni.substring (6, 10), 10), MesIni, parseInt (DtIni.substring (0, 2), 10));
	
	// c�lculo da diferen�a entre as datas
	DiffData = DataFim - DataIni;

	// converte o total de milissegundos para dias
	DiffData = ((((DiffData / 1000) / 60) / 60) / 24);

	return DiffData;
}


// faz a diferen�a entre anos
function DateDiffAno (datafim, datainicio)
{
        var DtFim = new String (datafim);
        var DtIni = new String (datainicio);
        var IntAux;

	// subtrai os anos
	IntAux = parseInt (DtFim.substring (6, 10), 10) - parseInt (DtIni.substring (6, 10), 10);

	// obtem o m�s e o dia das datas de in�cio e fim, no formato MMDD
	var MesDiaFim = new String (DtFim.substring (3, 5) + DtFim.substring (0, 2));
	var MesDiaIni = new String (DtIni.substring (3, 5) + DtIni.substring (0, 2));

	// verifica se a diferen�a entre os anos foi maior que 0
	if (IntAux > 0)
	{
		// verifica se ainda n�o completou um ano
		if (MesDiaFim < MesDiaIni)
		{
			// subtrai um ano
			IntAux--;
		}
	}
	else
	{
		// verifica se a diferen�a entre os anos foi menor que 0
		if (IntAux < 0)
		{
			// verifica se j� completou um ano
			if (MesDiaFim > MesDiaIni)
			{
				// soma um ano
				IntAux++;
			}
		}
	}

	return IntAux;
}

// fun��o para consistir UF
function consisteUF (form, campo, obrigatorio)
{
	var strUF;

	// tira os espa�os em branco � esquerda e � direita do campo
	eval ("strUF = Trim (form." + campo + ".value)");

	// verifica se o campo foi preenchido
	if (parseInt (strUF.length, 10) == 0)
	{
		// verifica se o campo � obrigat�rio
		if (obrigatorio)
		{
			alert(retornaNmCampo(campo) + ": Preenchimento obrigat�rio.");		

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

	// converte os caracteres para mai�sculas
        strUF = strUF.toUpperCase ();

	// testa a UF com os valores v�lidos
	if ((strUF != "AC")  && // acre
	    (strUF != "AL")  && // alagoas
	    (strUF != "AM")  && // amazonas
	    (strUF != "AP")  && // amap�
	    (strUF != "BA")  && // bahia
	    (strUF != "CE")  && // cear�
	    (strUF != "DF")  && // distrito federal
	    (strUF != "ES")  && // esp�rito santo
	    (strUF != "GO")  && // goi�s
	    (strUF != "MA")  && // maranh�o
	    (strUF != "MG")  && // minas gerais
	    (strUF != "MS")  && // mato grosso do sul
	    (strUF != "MT")  && // mato grosso
	    (strUF != "PA")  && // par�
	    (strUF != "PB")  && // para�ba
	    (strUF != "PE")  && // pernambuco
	    (strUF != "PI")  && // piau�
	    (strUF != "PR")  && // paran�
	    (strUF != "RJ")  && // rio de janeiro
	    (strUF != "RN")  && // rio grande do norte
	    (strUF != "RO")  && // rond�nia
	    (strUF != "RR")  && // roraima
	    (strUF != "RS")  && // rio grande do sul
	    (strUF != "SC")  && // santa catarina
	    (strUF != "SE")  && // sergipe
	    (strUF != "SP")  && // s�o paulo
	    (strUF != "TO"))    // tocantins
	{
		alert (retornaNmCampo (campo) + " invalido.");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	// devolde o campo reformatado para o formul�rio
	eval ("form." + campo + ".value = strUF");

	return 1;
}

// faz a consist�ncia da idade de acordo com a idade m�nima passada
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

// verifica se o numero de anos entre o campo e maior que a idade m�nima passada
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

	// obt�m a data do anivers�rio
	eval ("DataAniversario = form." + campo + ".value");

	// obt�m a data de hoje
	Hoje = new Date ();

	// obt�m o ano, o m�s e o dia da data passada como par�metro
	AnoData = parseInt (DataAniversario.substring (6, 10), 10);
	MesData = parseInt (DataAniversario.substring (3,  5), 10);
	DiaData = parseInt (DataAniversario.substring (0,  2), 10);

	// obt�m o dia, o m�s e o ano do dia de hoje
	DiaHoje = Hoje.getDate ();
	MesHoje = (Hoje.getMonth () + 1);
	AnoHoje = Hoje.getFullYear ();

	// verifica se a subtra��o dos anos � menor que IdadeMin
	if ((AnoHoje - AnoData) < IdadeMin)
	{
		return false;
	}
	else
	{
		// verifica se a subtra��o dos anos � igual a IdadeMin
		if ((AnoHoje - AnoData) == IdadeMin)
		{
			// verifica se os meses s�o iguais
			if (MesHoje == MesData)
			{
				// verifica se o dia de hoje � maior que o da data
				// (o anivers�rio j� passou)
				if (DiaHoje >= DiaData)
				{
					return true;
				}

				return false;
			}
			else
			{
				// verifica se o m�s de hoje � maior que o da data
				// (o anivers�rio j� passou)
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

// limpa os espa�os � direita e � esquerda, consiste o tamanho m�ximo e se vazio
function consisteVazioTamanho (form, campo, tammax)
{
	var strAux; // string auxiliar

	// limpa o campo de espa�os � esquerda e � direita
	eval ("strAux = Trim (form." + campo + ".value)");

	// devolde o campo limpo de espa�os para o formul�rio
	eval ("form." + campo + ".value = strAux");

	// verifica se o campo est� vazio
	if (strAux.length == 0)
	{
		alert (retornaNmCampo (campo) + ": preenchimento obrigat�rio.");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	// verifica se o tamanho ultrapassou o tamanho m�ximo
	if (strAux.length > parseInt (tammax, 10))
	{
		alert ("Tamanho m�ximo do campo " + retornaNmCampo (campo) + " (" + tammax + ") excedido.");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	return 1;
}

// limpa os espa�os � direita e � esquerda e consiste o tamanho m�ximo
function consisteTamanho (form, campo, tammax)
{
	var strAux; // string auxiliar

	// limpa o campo de espa�os � esquerda e � direita
	eval ("strAux = Trim (form." + campo + ".value)");

	// devolde o campo limpo de espa�os para o formul�rio
	eval ("form." + campo + ".value = strAux");

	// verifica se o tamanho ultrapassou o tamanho m�ximo
	if (strAux.length > parseInt (tammax, 10))
	{
		alert ("Tamanho m�ximo do campo " + retornaNmCampo (campo) + " (" + tammax + ") excedido.");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	return 1;
}

// verifica o tamanho de um campo, consistindo se ele � composto s� de caracteres num�ricos
function consisteTamanhoNumerico (form, campo, tammax) 
{
	var strAux; // string auxiliar

	// limpa o campo de espa�os � esquerda e � direita
	eval ("strAux = Trim (form." + campo + ".value)");

	// devolde o campo limpo de espa�os para o formul�rio
	eval ("form." + campo + ".value = strAux");

	// verifica se o tamanho ultrapassou o tamanho m�ximo
	if (strAux.length > parseInt (tammax, 10))
	{
		alert ("Tamanho m�ximo do campo " + retornaNmCampo (campo) + " (" + tammax + ") excedido.");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	// verifica se o campo cont�m apenas caracteres num�ricos (como � 
	// inteiro n�o pode ter v�rgulas ou ponto tamb�m) segundo par�metro = 1
	if (verificaNumerico (strAux, 1) != 1)
	{
		alert (retornaNmCampo (campo) + " inv�lido");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	return 1;
}

// verifica se o par�metro � composto somente de caracteres num�ricos
// - o paramametro i_f indica 1 - inteiros
//                            2 - float, separado por ponto ou v�rgula
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

	// varre cada d�gito do n�mero a ser verificado
	while (j < strAver.length)
	{
		substrAver = strAver.charAt (j);

		i = 0;

		// analisa se cada d�gito do n�mero a ser verificado � v�lido
		while (i < comp)
		{
			if (strAver.charAt (j) == teste.charAt (i))
			{
				// se for virgula (ou ponto) decimal, n�o pode ter duas...
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
				// se o d�gito n�o � v�lido, retorna ERRO
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

// retira espa�os em branco do lado esquerdo
function LTrim (str)
{
	var whitespace = new String (" \t\n\r");
	var s = new String (str);

	// verifica se existe algum espa�o � esquerda
	if (whitespace.indexOf (s.charAt (0)) != -1)
	{
		var j = 0;
		var i = s.length;

		// Busca o indice onde termina os espa�os em branco
		// ou at� terminar a string (s� possu�a brancos)
		while ((j                                 <   i)  &&
                       (whitespace.indexOf (s.charAt (j)) != -1))
		{
			j++;
		}

		// Pega a sub-string do primeiro caracter n�o branco pra frente
		s = s.substring (j, i);
	}

	return s;
}

// retira espa�os em branco do lado direito
function RTrim (str)
{
	var whitespace = new String(" \t\n\r");
	var s = new String (str);

	// verifica se existe album espa�o � direita
	if (whitespace.indexOf (s.charAt (s.length - 1)) != -1)
	{
		var i = (s.length - 1);

		// Busca, direta pra esquerda, o indice onde termina os espa�os
		//  em branco ou at� terminar a string (s� possu�a brancos)
		while ((i                                 >=  0)  &&
                       (whitespace.indexOf (s.charAt (i)) != -1))
		{
			i--;
		}

		// Pega a sub-string do inicio at� o indice encontrado na busca
		s = s.substring (0, (i + 1));
	}

	return s;
}

// retira espa�os em branco da esquerda e direita
function Trim (str)
{
	return RTrim (LTrim (str));
}

// verifica se a data informada � v�lida
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
			alert (retornaNmCampo (campo) + ": Preenchimento obrigat�rio.");

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
		alert(retornaNmCampo(campo) + ": Ano Inv�lido");

		eval("form." + campo + ".focus()");

		return 0;
	}

	eval("Mes = form." + campo + ".value.substring(3, 5)");

	if ((parseInt(Mes, 10) > 12)  ||
            (parseInt(Mes, 10) <  1))
	{
		alert(retornaNmCampo(campo) + ": M�s Inv�lido");

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
		alert (retornaNmCampo(campo) + ": Dia Inv�lido");

		eval ("form." + campo + ".focus()");

		return 0;
	}
	else
	{
		// consiste o dia para fevereiro
		if (parseInt (Mes, 10) ==  2)
		{
			// verifica se o ano � divisivel por 400
			if ((parseInt (numberDate, 10) % 400) == 0)
			{
				// o ano � bissexto
				if (parseInt (Dia, 10) > 29)
				{
					alert (retornaNmCampo(campo) + ": Dia Inv�lido");

					eval ("form." + campo + ".focus()");

					return 0;
				}
			}
			else
			{
				// verifica se o ano � divisivel por 100
				if ((parseInt (numberDate, 10) % 100) == 0)
				{
					// o ano n�o � bissexto
					if (parseInt (Dia, 10) > 28)
					{
						alert (retornaNmCampo(campo) + ": Dia Inv�lido");

						eval ("form." + campo + ".focus()");

						return 0;
					}
				}
				else
				{
					// verifica se o ano � divisivel por 4
					if ((parseInt (numberDate, 10) % 4) == 0)
					{
						// o ano � bissexto
						if (parseInt (Dia, 10) > 29)
						{
							alert (retornaNmCampo(campo) + ": Dia Inv�lido");

							eval ("form." + campo + ".focus()");

							return 0;
						}
					}
					else
					{
						// o ano n�o � bissexto
						if (parseInt (Dia, 10) > 28)
						{
							alert (retornaNmCampo(campo) + ": Dia Inv�lido");

							eval ("form." + campo + ".focus()");

							return 0;
						}
					}
				}
			}
		}
		else
		{
			// consiste o dia para janeiro, mar�o, maio, 
                        // julho, agosto, outubro e dezembro
			if ((parseInt (Dia, 10) > 31)  ||
        		    (parseInt (Dia, 10) <  1))
			{
alert ("Ultimo if do dia");

				alert (retornaNmCampo(campo) + ": Dia Inv�lido");

				eval ("form." + campo + ".focus()");

				return 0;
			}
		}
	}

	return 1;
}

// elimina todos os caracteres n�o num�ricos de uma string
function eliminaNaoNumerico (form, campo)
{
	var valor;
	var tamanho;
	var cont;
	var valorNumerico = "";
	var numero = "0123456789";

	// obt�m o conte�do do campo
	eval ("valor = form." + campo + ".value");

	// obt�m o tamanho do campo
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

// faz a consist�ncia do CEP
function consisteCEP (form, campo)
{
	var noCEP;
	var menos = "-";
	var zeros = "000";

	eval ("noCEP = eliminaNaoNumerico (form, form." + campo + ".name)");

	// retorna erro caso o usu�rio tenha preenchido somente zeros
	if (noCEP.substring (0, 5) == "00000")
	{
		alert (retornaNmCampo (campo) + ": CEP inv�lido");
		eval ("form." + campo + ".focus ()");
		return 0;
	}

	// verifica se o cep est� preenchido
	if (noCEP.length == 0)
	{
		alert (retornaNmCampo (campo) + ": CEP inv�lido");
		eval ("form." + campo + ".focus ()");
		return 0;
	}

	// verifica se o CEP foi digitado com 5 n�meros
	if (noCEP.length == 5)
	{
		// concatena "-000" no fim do campo
		eval ("form." + campo + ".value = noCEP + '-000'");
		return 1;
	}

	// verifica se o CEP foi digitado com 8 n�meros
	if (noCEP.length == 8)
	{
		// formata o CEP
		eval ("form." + campo + ".value = noCEP.substring (0, 5) + '-' + noCEP.substring (5, 8)");
		return 1;
	}

	// qualquer tamanho diferente de 5 e 8, retorna erro
	if ((noCEP.length != 5) && (noCEP.length != 8))
	{
		alert (retornaNmCampo (campo) + ": tamanho inv�lido");
		eval ("form." + campo + ".focus ()");
		return 0;
	}
}

// faz a verifica��o da validade dos d�gitos do telefone
function consisteTelefone (form, campo, obrigatorio)
{
	var cont;
	var cadeia;
	var teste = "0123456789";
	var noTel;

	// obt�m o valor do campo
	eval ("cadeia = form." + campo + ".value");

	// verifica se o campo est� preenchido
	if (cadeia.length == 0)
	{
		// verifica se o campo � obrigat�rio
		if (obrigatorio)
		{
			alert (retornaNmCampo(campo) + ": Preenchimento obrigat�rio.");

			eval ("form." + campo + ".focus ()");

			return 0;
		}
		else
		{
			return 1;
		}
	}

	// verifica se os caracteres s�o v�lidos
	for (cont=0; cont < cadeia.length; cont++)
	{
		if (teste.indexOf (cadeia.charAt (cont)) == -1)
		{
			alert (retornaNmCampo(campo) + ": Caracter inv�lido.");

			eval ("form." + campo + ".focus ()");

			return 0;
		}
	}

	// elimina os caracteres n�o num�ricos do telefone
	eval ("noTel = eliminaNaoNumerico (form, form." + campo + ".name)");

	// verifica tamanho
	if (noTel.length < 6)
	{
		alert (retornaNmCampo (campo) + " deve ter 6 d�gitos no m�nimo.");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	// verifica tamanho
	if (cadeia.length > 10)
	{
		alert (retornaNmCampo (campo) + " deve ter 10 d�gitos no m�ximo.");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	return 1;
}

// faz a consist�ncia de valores
function consisteValor (form, campo, obrigatorio)
{
	var indPontoDec; // localizacao do ponto decimal
	var valor; // valor do campo
	var valorLimpo = ""; // valor filtrado (apenas numeros e virgula)
	var cont = 0; // contador
	var indPonto = 0; // localizacao do �ltimo ponto
	var indVirgula = 0; // localizacao da �ltima virgula
	var numero = "0123456789"; // dom�nio de d�gitos v�lidos
	var qtPonto = 0; // qtde de pontos de milhar
	var qtResto = 0; // resto de indPontoDec / 3
	var limite = 0; // limite da coloca��o do ponto de milhar

	// obt�m o valor armazenado no campo limpando os espa�os � direita e � esquerda
	eval ("valor = Trim (form." + campo + ".value)");

	// verifica se o campo est� preenchido
	if (valor.length == 0)
	{
		// verifica se o campo � obrigat�rio
		if (obrigatorio)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}

	// descobre qual o �ltimo separador que est� sendo utilizado
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

	// limpa d�gitos n�o num�ricos do valor
	for (cont = 0; cont < valor.length; cont++)
	{
		if (numero.indexOf (valor.charAt (cont)) != -1)
		{
			valorLimpo += valor.charAt (cont);
		}

		// substitui ponto decimal por v�rgula
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

	// retira zeros � esquerda
	while (valorLimpo.charAt (0) == '0')
	{
		valorLimpo = valorLimpo.substring (1, valorLimpo.length);
	}

	// transforma ",xx" em "0,xx"
	if (valorLimpo.charAt (0) == ',')
	{
		valorLimpo = '0' + valorLimpo;
	}

	// coloca separa��o de milhar
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
		alert (retornaNmCampo (campo) + ": Tamanho inv�lido");

		eval ("form."+campo+".focus ()");

		return 0;
	}

	eval ("form." + campo + ".value = valorLimpo");

	return 1
}

// verifica se um determinado n�mero est� entre os par�metros min e max
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
			alert (retornaNmCampo (campo) + ": Preenchimento obrigat�rio.");

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
		alert (retornaNmCampo (campo) + " inv�lido");

		eval ("form."+campo+".focus ()");

		return 0;
	}

	if (aux > parseInt (max, 10))
	{
		alert (retornaNmCampo (campo) + " n�o pode ser maior do que " + max);

		eval ("form."+campo+".focus ()");

		return 0;
	}

	if (aux < parseInt (min, 10))
	{
		alert (retornaNmCampo (campo) + " n�o pode ser menor do que " + min);

		eval ("form."+campo+".focus ()");

		return 0;
	}

	return 1;
}

// verifica tamanho m�nimo e m�ximo
function consisteTamanhoMinimoMaximo (form, campo, tammin, tammax)
{
	var aux;
	var limpa = "";

	eval ("aux = form." + campo + ".value.length");

	if (aux < parseInt (tammin, 10))
	{
		alert (retornaNmCampo (campo) + " n�o pode ter menos do que " + tammin + " posi��es");

		eval ("form." + campo + ".focus ()");

		return 0;
	}

	if (aux > parseInt (tammax, 10))
	{
		alert (retornaNmCampo (campo) + " n�o pode ter mais do que " + tammax + " posi��es");

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
	var flgvg = true; // flag de consist�ncia de v�rgulas (a lista tem que come�ar com um
                          // n�mero, portanto o flag � inicializado com true
	var flgachou;

	// limpa o campo de espa�os em branco e atribui para variavel local
	eval ("strAver = Trim (form." + campo + ".value)");

	// verifica se esta em branco
	if (strAver == "")
	{
		// verifica se o campo � obrigat�rio
		if (obrigatorio)
		{
			// se � obrigat�rio, emite mensagem de erro...
			alert (retornaNmCampo (campo) + ": Preenchimento obrigatorio");

			// ... coloca o foco no campo...
			eval ("form." + campo + ".focus ()");

			// ... e sai do processo com false
			return false;
		}
		else
		{
			// se n�o � obrigat�rio, sai do processo com true
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
				// seta o flag de caractere v�lido
				flgachou = true;

				// sai do loop
				break;
			}

			// incrementa o contador de posi��o do string de teste
			i++;
		}

		// verifica se achou o caractere
		if (flgachou)
		{
			// verifica se achou uma v�rgula
			if (substrAver == ",")
			{
				// verifica se o flag de v�rgula est� setado
				if (flgvg)
				{
					// se o flag est� setado, emite mensagem de erro...
					alert (retornaNmCampo (campo) + ": Lista inconsistente (utilize o formato XX, YY, ZZ ou XX,YY,ZZ)");

					// ... coloca o foco no campo...
					eval ("form." + campo + ".focus ()");

					// ... e sai do processo com false
					return false;
				}
				else
				{
					// seta o flag de v�rgula
					flgvg = true;
				}
			}
			else
			{
				// verifica se achou um espa�o
				if (substrAver == " ")
				{
					// verifica se o flag de v�rgula n�o est� setado
					// (portanto o espa�o n�o vem depois da v�rgula e 
					// � inv�lido)
					if (!(flgvg))
					{
						// se o flag est� setado, emite mensagem de erro...
						alert (retornaNmCampo (campo) + ": Lista inconsistente (s�o permitidos espa�os apenas ap�s a v�rgula)");

						// ... coloca o foco no campo...
						eval ("form." + campo + ".focus ()");

						// ... e sai do processo com false
						return false;
					}
				}
				else
				{
					// se n�o achou v�rgula nem espa�o e � caractere v�lido,
					// s� pode ser um n�mero, apaga o flag de v�rgula
					flgvg = false;
				}
			}
		}
		else
		{
			// se n�o achou o caractere no string de teste, emite a mensagem de erro...
			alert (retornaNmCampo (campo) + ": Caractere inv�lido na lista (s�o permitidos apenas n�meros separados por v�rgulas)");

			// ... coloca o foco no campo...
			eval ("form." + campo + ".focus ()");

			// ... e retorna erro
			return false;
		}

		// incrementa o contador de posi��o da lista
		j++;
	}

	// verifica se o �ltimo caractere da lista � uma v�rgula
	if (strAver.charAt (parseInt (strAver.length, 10) - 1) == ",")
	{
		// se o flag est� setado, emite mensagem de erro...
		alert (retornaNmCampo (campo) + ": Lista inconsistente (n�o s�o permitidas v�rgulas no in�cio e no fim da lista e nem duas v�rgulas consecutivas)");

		// ... coloca o foco no campo...
		eval ("form." + campo + ".focus ()");

		// ... e sai do processo com false
		return false;
	}

	// lista OK, retorna true
	return true;
}
// -- PAREI AQUI - JAYME 16/02/2001

// ---- Verifica se a nova senha coincide com sua confirma��o no momento de altera��o
function VerificaSenhas(formSenhas)
{
//	alert("entrou");
	if (formSenhas.senha_nova.value != formSenhas.conf_senha_nova.value)
	{
		alert("Senha nova n�o coincide com a confirma��o!");
		formSenhas.senha_nova.value = "";
		formSenhas.conf_senha_nova.value = "";
		return false;
	}
	else
		return true;
}

// ---- Fun��o  consisteRenda para verificar se renda >=99,00 e <=999.999,00 ----
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

	//Retira a v�rgula e poe o ponto
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

// ---- Fun��o  consisteRendaMax para verificar se renda >=99,00 e <=999.999,00 ----
function consisteRendaMax(form, campo)
{
	var  valor;
	var  out;
	var  add;
	var  pos;

	out = "."; // Substituir isto
	add = ""; // por isto
	
	// obt�m o valor armazenado no campo limpando os espa�os � direita e � esquerda //teste
	eval ("valor = Trim (form." + campo + ".value)"); //teste = consistevalor


	//Loop que retira os pontos do campo

	while (valor.indexOf(out)>-1) //at� que n�o tenha mais pontos
	{
		pos= valor.indexOf(out);
		valor = "" + (valor.substring(0, pos) + add + 
		valor.substring((pos + out.length), valor.length));
	}

	//Retira a v�rgula e poe o ponto
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

// ---- Fun��o que limpa os espa�os em branco de todos os campos do formul�rio ----
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
			//Verifica se no nome existe algum n�mero
			// se houver retorna erro, sen�o termina a fun��o e retorna OK
			if (teste.indexOf(cadeia.charAt(cont)) != -1)
			{
				alert("Campo Nome n�o pode conter n�meros.");
				eval("form." + campo + ".focus()");
				return 0;
			}
		}

	}

	return 1;
}

// ----  Possui cart�o ?  ----
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
        alert("Selecione a op��o 'Sim' em 'Possui cart�o'.");
	    form.PCO.focus();
        return 0;
	}
	if ((possui=="S") && (valor.length==0))
	{
		alert(retornaNmCampo(campo) + ": Preenchimento obrigat�rio.");
		eval("form." + campo + ".focus()");
		return 0;
	}
	if (consisteTamanho(form, form.NMCO.name, 40) != 1)
		return 0;
	else
		return 1;
}

// ----  Verifica n�mero do Cartao  ----
function verificaNumeroCartao(form, campo, possui)
{
	var valor;

	eval("valor=form." + campo + ".value");
	if ((possui=="N") && (valor.length!=0))
	{
        alert("Selecione a op��o 'Sim' em 'Possui cart�o'.");
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

// ----  Entrar com c�d. do banco ?  ----
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
		alert("C�d.Banco: Preenchimento obrigat�rio.");
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
        alert(retornaNmCampo(campo) + ": Preenchimento obrigat�rio.");
	    eval("form." + campo + ".focus()");
        return 0;
	}
	if ((!obrigatorio) && (noCGC.length==0)) return 1;

	if (noCGC.length != 14)
	{
		alert(retornaNmCampo(campo) + ": Tamanho inv�lido");
		eval("form." + campo + ".focus()");
		return 0;
	}

	//  calculo 1� d�gito do CGC
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
        alert(retornaNmCampo(campo) + " Inv�lido");
		eval("form." + campo + ".focus()");
        return 0;
	}

	//  calculo 2� d�gito do CGC
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
        alert(retornaNmCampo(campo) + " Inv�lido");
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
        alert(retornaNmCampo(campo) + ": Preenchimento obrigat�rio.");
	    eval("form." + campo + ".focus()");
        return 0;
	}
	if ((!obrigatorio) && (noCPF.length==0)) return 1;
	if (noCPF.length != 11)
	{
		alert(retornaNmCampo(campo) + ": Tamanho inv�lido");
		eval("form." + campo + ".focus()");
		return 0;
	}

	//  calculo 1� d�gito do CPF
	soma=0;
	for (i=0;i<9;i++)
		soma+=(10-i)*(parseInt(noCPF.charAt(i), 10));
	digito_verificador = 11-(soma % 11);
	if ((soma % 11)<2) digito_verificador=0;
	if (parseInt(noCPF.charAt(9), 10)!=digito_verificador)
	{
        alert(retornaNmCampo(campo) + " Inv�lido");
		eval("form." + campo + ".focus()");
        return 0;
	}

	//  calculo 2� d�gito do CPF
	soma=0;
	for (i=0;i<10;i++)
		soma+=(11-i)*(parseInt(noCPF.charAt(i), 10));
	digito_verificador = 11-(soma % 11);
	if ((soma % 11)<2) digito_verificador=0;
	if (parseInt(noCPF.charAt(10), 10)!=digito_verificador)
	{
        alert(retornaNmCampo(campo) + " Inv�lido");
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
//  Fun��es de uso geral
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
	//verifica primeiro se � numerico
	if (verificaNumerico(strAno,1)==1)
	{
		//se tiver 2 d�gitos
		if (strAno.length == 2)
		{
			//checo se � maior que 50
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
			alert(retornaNmCampo(campo) + ": Ano deve ter 2 ou 4 d�gitos.");
			eval("form." + campo + ".focus()");
			return strAno;
		}

	}
	else
	{
		alert(retornaNmCampo(campo) + ": Ano deve ser num�rico.");
		eval("form." + campo + ".focus()");
		return "";
	}
}

function CorrigeData(strData)
{
	var strAno;
	var iPos;
	var strDataOK;
	
	//Verifica se o tamanho de strData � maior que zero
	if (parseInt(strData.length, 10) > 0)
	{
		//copio para nao estragar o original
		strDataOK = strData;
		
		//procuro dados com menos de 2 digitos
		
		//primeira barra
		iPos = strDataOK.indexOf ('/',0);

		//Se n�o achou procura por '-'
		if(iPos == -1)
			iPos = strDataOK.indexOf ('-',0);

		//alert ("valor de iPos (primeira barra):" + iPos);
		if(iPos == -1)
		{
			//nao existem barras
			//alert("Formato de data inv�lido")
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

		//Se n�o achou procura por '-'
		if(iPos == -1)
			iPos = strDataOK.indexOf ('-',iPos+2);

		//alert ("valor de iPos (segunda barra):" + iPos);
		if(iPos == -1)
		{
			//nao existe segunda barra
			//alert("Formato de data inv�lido");
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
				//checo se � maior que 50
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
// Alterado para tratar o n�mero do telefone sem DDD

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
			alert(retornaNmCampo(campo) + ": Preenchimento obrigat�rio.");
			eval("form." + campo + ".focus()");
			return 0;
		}
		else
			return 1;
	}

	// verifica se os caracteres s�o v�lidos
	for (cont=0; cont < cadeia.length; cont++)
	{
		//Check para nao aceitar telefones iniciados com 1
		if (cont==0)
		{
			//alert("cont � igual a 0");
			if (cadeia.charAt(cont) == "1")
			{
				alert("Campo telefone n�o pode come�ar com 1.");
				eval("form." + campo + ".focus()");
				return 0;
			}
		}

		if (teste.indexOf(cadeia.charAt(cont)) == -1)
		{
			alert(retornaNmCampo(campo) + ": Caracter inv�lido.");
			eval("form." + campo + ".focus()");
			return 0;
		}
	}

	eval("noTel=eliminaNaoNumerico(form, form." + campo + ".name)");

	// verifica tamanho, somente ser�o v�lidos 7 ou 8 d�gitos
	if (noTel.length < 6)
	{
		alert(retornaNmCampo(campo) + ": O telefone deve ter no m�nimo 6 d�gitos.");
		eval("form." + campo + ".focus()");
		return 0;
	}

	if (noTel.length > 8)
	{
		alert(retornaNmCampo(campo) + ": O telefone deve ter no m�ximo 8 d�gitos.");
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
		alert(retornaNmCampo(campo) + ": O n�mero do telefone deve ser maior que 99999");
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
		alert(retornaNmCampo(campo) + ": N�mero de telefone inv�lido");
		eval("form." + campo + ".focus()");
		return 0;
	}

	caracter = noTel.substring(0,1);
	if(caracter == "0")
	{
		alert(retornaNmCampo(campo) + ": N�mero de telefone n�o pode come�ar com zero");
		eval("form." + campo + ".focus()");
		return 0;
	}


	return 1;
}

/*	Mauricio - 28/12/97
	
	Realiza consistencia do DDD (pode ser 3 ou 4 d�gitos, se for 3 preencher com espa�o)
*/
function consisteDDDAPC(form, campo, obrigatorio)
{
	
	//checa se o campo est� vazio
	eval("cadeia=form." + campo + ".value");
	if (cadeia.length==0)
	{
		if (obrigatorio)
		{
			alert(retornaNmCampo(campo) + ": Preenchimento obrigat�rio.");
			eval("form." + campo + ".focus()");
			return 0;
		}
		else
			return 1;
	}

	//verifica exist�ncia de caracteres inv�lidos
	if (verificaNumerico(cadeia,1)!=1)
	{
		alert(retornaNmCampo(campo) + ": Caracteres Inv�lidos.");
		eval("form." + campo + ".focus()");
		return 0;
	}

	//verifica se tem 4 d�gitos
	if(cadeia.length==4)
		return 1;
	else
	{
		//se tem 3 d�gitos concateno espa�o na frente
		if(cadeia.length==3)
		{
			eval("form." + campo + ".value = ' ' + form." + campo + ".value");
			return 1;
		}
		//se tem qq outro numero de digitos ent�o alerta o usuario
		else
		{
			alert(retornaNmCampo(campo) + ": N�mero de d�gitos inv�lidos.");
			eval("form." + campo + ".focus()");
			return 0;
		}
	}
	
}

// -------------------------- funcoes utilizadas pelo APC --------------------------
// --------------------------- inseridas por jmn 1108200 ---------------------------

//***************************************************************************************
//  Fun��es utilitarias
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
		alert(retornaNmCampo(campo) + ": caracter inv�lido");
		eval("form."+campo+".focus()");
		return 0;
	}

	if(valCep == 0)
	{
		alert(retornaNmCampo(campo) + ": n�o pode ser zero");
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

	alert(retornaNmCampo(campo) + ": tamanho inv�lido");
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

	//verifica se o campo n�o est� vazio
	if (parseInt (numberDate.length, 7) == 0)
	{
		if (obrigatorio)
		{
			alert(retornaNmCampo (campo) + ": Preenchimento obrigat�rio.");
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
		
	// obt�m ano do dia de hoje
	AnoAtual = DataAtual.getFullYear ();

	//obter ano digitado
	eval("AnoInf = numberDate.substring(2, 06)");

	//Verifica se ano de abertura da conta � > que 1900 e < que ano atual
	if ( (parseInt(AnoInf, 10) > AnoAtual) ||
		 (parseInt(AnoInf, 10) < 1900    ) )
	{
		alert(retornaNmCampo (campo)  + ": Ano Inv�lido");

		eval("form." + campo + ".focus()");

		return 0;
	}

	//obter M�s digitado
	eval("Mes = form." + campo + ".value.substring(0, 2)");

	//Verifica se o m�s informado � v�lido
	if ((parseInt(Mes, 10) > 12)  ||
            (parseInt(Mes, 10) <  1))
	{
		alert(retornaNmCampo (campo) + ": M�s Inv�lido");

		eval("form." + campo + ".focus()");

		return 0;
	}

	//Formata o campo incluindo a barra (/)
	//numberDate tem apenas 6 d�gitos pq no in�cio foi retirado o separador 
	eval("form." + campo + ".value = numberDate.substring(0,2) + '/' + " + "numberDate.substring(2,6)");

	return 1;
}
