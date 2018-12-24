var aMensagens = new Array();
var iIndexador;
	
/******************************
Como codificar as mensagens
XX9999 onde

XX		� o c�digo alfa que indica o tipo de mensagem
9999	� o c�digo num�rico da mensagem 

CB - Campo em branco
CI - Campo inv�lido
VC - Valor j� cadastrado

******************************/	
	
iIndexador = 0;	
	
aMensagens[iIndexador++]  = "000000 Mensagem n�o encontrada!";
aMensagens[iIndexador++]  = "CB0001 Por favor, informe se � correntista do BANCO REAL";
aMensagens[iIndexador++]  = "CB0002 Por favor, informe se � correntista do BANCO REAL"; 
aMensagens[iIndexador++]  = "CB0003 Por favor, informe o c�digo da ag�ncia";
aMensagens[iIndexador++]  = "CB0004 Por favor, informe o n�mero de sua conta corrente";
aMensagens[iIndexador++]  = "CB0005 Por favor, informe o n�mero do cart�o";
aMensagens[iIndexador++]  = "CB0006 Por favor, informe o tipo do cart�o";
aMensagens[iIndexador++]  = "CB0007 Por favor, informe a data de vencimento de sua fatura";
aMensagens[iIndexador++]  = "CB0008 Por favor, informe seu nome completo";
aMensagens[iIndexador++]  = "CB0009 Por favor, preencha seu n�mero de telefone";
aMensagens[iIndexador++]  = "CB0010 Por favor, informe o DDD de sua cidade";
aMensagens[iIndexador++]  = "CB0011 Por favor, selecione o campo estado civil";
aMensagens[iIndexador++]  = "CB0012 Por favor, informe o nome da cidade onde voc� reside";
aMensagens[iIndexador++]  = "CB0013 Por favor, digite a op��o desejada para recebimento de suas correspond�ncias";
aMensagens[iIndexador++]  = "CB0014 Sexo n�o informado. Por favor, preencha o campo correspondente";
aMensagens[iIndexador++]  = "CB0015 Por favor, informe seu CPF";
aMensagens[iIndexador++]  = "CB0016 Por favor, informe seu nome";
aMensagens[iIndexador++]  = "CB0017 Por favor, informe o seu cart�o de cr�dito";
aMensagens[iIndexador++]  = "CB0018 Por favor, informe o seu e-mail";
aMensagens[iIndexador++]  = "CB0019 Por favor, informe a sua data de nascimento";
aMensagens[iIndexador++]  = "CB0020 Por favor, informe o seu RG";
aMensagens[iIndexador++]  = "CB0021 Por favor, informe a data de expedi��o do RG";
aMensagens[iIndexador++]  = "CB0022 Por favor, informe o estado do �rg�o emissor";
aMensagens[iIndexador++]  = "CB0023 Por favor, informe o nome de sua m�e";
aMensagens[iIndexador++]  = "CB0024 Por favor, informe a sua renda mesal comprovada";
aMensagens[iIndexador++]  = "CB0025 Por favor, informe o seu logradouro";
aMensagens[iIndexador++]  = "CB0026 Por favor, informe o n�mero do logradouro ou s/n (sem n�mero)";
aMensagens[iIndexador++]  = "CB0027 Por favor, informe a caracter�stica da conta";
aMensagens[iIndexador++]  = "CB0028 Por favor, informe se est� interessado em receber informa��es sobre produtos ou n�o";
aMensagens[iIndexador++]  = "CB0029 Por favor, preencha seu n�mero de telefone comercial";
aMensagens[iIndexador++]  = "CB0030 Por favor, informe o DDD de seu telefone comercial";
aMensagens[iIndexador++]  = "CB0031 Por favor, informe o melhor hor�rio para contato";
aMensagens[iIndexador++]  = "CB0032 Por favor, informe um tipo de investimento";
aMensagens[iIndexador++]  = "CB0033 Por favor, informe se podemos entrar em contato";
aMensagens[iIndexador++]  = "CB0034 Por favor, informe o nome da empresa ou Raz�o Social";
aMensagens[iIndexador++]  = "CB0035 Por favor, informe o n�mero da filial";
aMensagens[iIndexador++]  = "CB0036 Por favor, informe o n�mero do d�gito verificador";
aMensagens[iIndexador++]  = "CB0037 Por favor, informe o ramo de atividade a empresa";
aMensagens[iIndexador++]  = "CB0038 Por favor, informe o endere�o comercial";
aMensagens[iIndexador++]  = "CB0039 Por favor, informe o nome de contato";
aMensagens[iIndexador++]  = "CB0040 Por favor, informe o faturamento anual da empresa";


aMensagens[iIndexador++]  = "CI0001 Por favor, preencha corretamente o CPF";
aMensagens[iIndexador++]  = "CI0002 Por favor, preencha corretamente o campo data";
aMensagens[iIndexador++]  = "CI0003 Por favor, preencha o c�digo da ag�ncia apenas com n�meros";
aMensagens[iIndexador++]  = "CI0004 Por favor, digite corretamente o n�mero de seu passaporte";
aMensagens[iIndexador++]  = "CI0005 Por favor, preencha corretamente o campo �rg�o emissor";
aMensagens[iIndexador++]  = "CI0006 Por favor, preencha corretamente o nome de sua cidade";
aMensagens[iIndexador++]  = "CI0007 Por favor, preencha corretamente o campo UF";
aMensagens[iIndexador++]  = "CI0008 Por favor, digite corretamente o valor";
aMensagens[iIndexador++]  = "CI0009 N�mero de telefone inv�lido. Por favor, digite corretamente o n�mero de seu telefone";
aMensagens[iIndexador++]  = "CI0010 Data de nascimento inv�lida. Por favor, preencha corretamente sua data de nascimento";
aMensagens[iIndexador++]  = "CI0011 �rg�o emissor n�o informado. Por favor, informe corretamente o �rg�o emissor";
aMensagens[iIndexador++]  = "CI0012 Nacionalidade n�o informada. Por favor, informe corretamente sua nacionalidade";
aMensagens[iIndexador++]  = "CI0013 Estado civil n�o informado. Por favor, informe corretamente seu estado civil";
aMensagens[iIndexador++]  = "CI0014 Naturalidade n�o informada. Por favor, informe corretamente sua naturalidade";
aMensagens[iIndexador++]  = "CI0015 C�digo de ag�ncia inv�lido. Por favor, preencha  corretamente o c�digo da ag�ncia";
aMensagens[iIndexador++]  = "CI0016 CEP n�o informado. Por favor, informe corretamente seu CEP residencial";
aMensagens[iIndexador++]  = "CI0017 C�digo da profiss�o n�o informado. Por favor, digite corretamente o c�digo da profiss�o";
aMensagens[iIndexador++]  = "CI0018 CNPJ n�o informado. Por favor, informe corretamente o CNPJ";
aMensagens[iIndexador++]  = "CI0019 Nome do c�njuge n�o informado. Por favor, informe corretamente o nome do c�njuge";
aMensagens[iIndexador++]  = "CI0020 Endere�o residencial n�o informado. Por favor, informe corretamente seu endere�o residencial";
aMensagens[iIndexador++]  = "CI0021 Bairro n�o informado. Por favor, informe corretamente seu bairro";
aMensagens[iIndexador++]  = "CI0022 Cidade n�o informada. Por favor, informe corretamente sua cidade";
aMensagens[iIndexador++]  = "CI0023 Estado n�o informado. Por favor, informe corretamente o estado onde fica sua resid�ncia";
aMensagens[iIndexador++]  = "CI0024 Por favor, preencha o campo nome com letras e espa�os";
aMensagens[iIndexador++]  = "CI0025 Data de expedi��o do RG inv�lida. Por favor, preencha corretamente a data de expedi��o do RG";
aMensagens[iIndexador++]  = "CI0026 Estado n�o informado. Por favor, informe corretamente o estado onde fica sua empresa";
aMensagens[iIndexador++]  = "CI0027 N�mero do CGC/CNPJ inv�lido. Por favor, digite corretamente o n�mero do CGC/CNPJ";
aMensagens[iIndexador++]  = "CI0028 Estado n�o informado. Por favor, informe corretamente o estado da sua naturalidade";

aMensagens[iIndexador++]  = "VC0001 O n�mero de seu CPF j� consta em nossos cadastros.";



function MostraMensagem(sCodigo)
{
	for(i=0,bAchou = false;i<aMensagens.length;i++)
	{
		if(sCodigo == aMensagens[i].substr(0,6))
		{
			bAchou = true;
			break;
		}		
	}
	if(bAchou)
		alert(aMensagens[i].substr(7,aMensagens[i].length))
	else
		alert(aMensagens[0].substr(7,aMensagens[0].length))
	
	return;
}










