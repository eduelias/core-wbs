var aMensagens = new Array();
var iIndexador;
	
/******************************
Como codificar as mensagens
XX9999 onde

XX		É o código alfa que indica o tipo de mensagem
9999	É o código numérico da mensagem 

CB - Campo em branco
CI - Campo inválido
VC - Valor já cadastrado

******************************/	
	
iIndexador = 0;	
	
aMensagens[iIndexador++]  = "000000 Mensagem não encontrada!";
aMensagens[iIndexador++]  = "CB0001 Por favor, informe se é correntista do BANCO REAL";
aMensagens[iIndexador++]  = "CB0002 Por favor, informe se é correntista do BANCO REAL"; 
aMensagens[iIndexador++]  = "CB0003 Por favor, informe o código da agência";
aMensagens[iIndexador++]  = "CB0004 Por favor, informe o número de sua conta corrente";
aMensagens[iIndexador++]  = "CB0005 Por favor, informe o número do cartão";
aMensagens[iIndexador++]  = "CB0006 Por favor, informe o tipo do cartão";
aMensagens[iIndexador++]  = "CB0007 Por favor, informe a data de vencimento de sua fatura";
aMensagens[iIndexador++]  = "CB0008 Por favor, informe seu nome completo";
aMensagens[iIndexador++]  = "CB0009 Por favor, preencha seu número de telefone";
aMensagens[iIndexador++]  = "CB0010 Por favor, informe o DDD de sua cidade";
aMensagens[iIndexador++]  = "CB0011 Por favor, selecione o campo estado civil";
aMensagens[iIndexador++]  = "CB0012 Por favor, informe o nome da cidade onde você reside";
aMensagens[iIndexador++]  = "CB0013 Por favor, digite a opção desejada para recebimento de suas correspondências";
aMensagens[iIndexador++]  = "CB0014 Sexo não informado. Por favor, preencha o campo correspondente";
aMensagens[iIndexador++]  = "CB0015 Por favor, informe seu CPF";
aMensagens[iIndexador++]  = "CB0016 Por favor, informe seu nome";
aMensagens[iIndexador++]  = "CB0017 Por favor, informe o seu cartão de crédito";
aMensagens[iIndexador++]  = "CB0018 Por favor, informe o seu e-mail";
aMensagens[iIndexador++]  = "CB0019 Por favor, informe a sua data de nascimento";
aMensagens[iIndexador++]  = "CB0020 Por favor, informe o seu RG";
aMensagens[iIndexador++]  = "CB0021 Por favor, informe a data de expedição do RG";
aMensagens[iIndexador++]  = "CB0022 Por favor, informe o estado do órgão emissor";
aMensagens[iIndexador++]  = "CB0023 Por favor, informe o nome de sua mãe";
aMensagens[iIndexador++]  = "CB0024 Por favor, informe a sua renda mesal comprovada";
aMensagens[iIndexador++]  = "CB0025 Por favor, informe o seu logradouro";
aMensagens[iIndexador++]  = "CB0026 Por favor, informe o número do logradouro ou s/n (sem número)";
aMensagens[iIndexador++]  = "CB0027 Por favor, informe a característica da conta";
aMensagens[iIndexador++]  = "CB0028 Por favor, informe se está interessado em receber informações sobre produtos ou não";
aMensagens[iIndexador++]  = "CB0029 Por favor, preencha seu número de telefone comercial";
aMensagens[iIndexador++]  = "CB0030 Por favor, informe o DDD de seu telefone comercial";
aMensagens[iIndexador++]  = "CB0031 Por favor, informe o melhor horário para contato";
aMensagens[iIndexador++]  = "CB0032 Por favor, informe um tipo de investimento";
aMensagens[iIndexador++]  = "CB0033 Por favor, informe se podemos entrar em contato";
aMensagens[iIndexador++]  = "CB0034 Por favor, informe o nome da empresa ou Razão Social";
aMensagens[iIndexador++]  = "CB0035 Por favor, informe o número da filial";
aMensagens[iIndexador++]  = "CB0036 Por favor, informe o número do dígito verificador";
aMensagens[iIndexador++]  = "CB0037 Por favor, informe o ramo de atividade a empresa";
aMensagens[iIndexador++]  = "CB0038 Por favor, informe o endereço comercial";
aMensagens[iIndexador++]  = "CB0039 Por favor, informe o nome de contato";
aMensagens[iIndexador++]  = "CB0040 Por favor, informe o faturamento anual da empresa";


aMensagens[iIndexador++]  = "CI0001 Por favor, preencha corretamente o CPF";
aMensagens[iIndexador++]  = "CI0002 Por favor, preencha corretamente o campo data";
aMensagens[iIndexador++]  = "CI0003 Por favor, preencha o código da agência apenas com números";
aMensagens[iIndexador++]  = "CI0004 Por favor, digite corretamente o número de seu passaporte";
aMensagens[iIndexador++]  = "CI0005 Por favor, preencha corretamente o campo órgão emissor";
aMensagens[iIndexador++]  = "CI0006 Por favor, preencha corretamente o nome de sua cidade";
aMensagens[iIndexador++]  = "CI0007 Por favor, preencha corretamente o campo UF";
aMensagens[iIndexador++]  = "CI0008 Por favor, digite corretamente o valor";
aMensagens[iIndexador++]  = "CI0009 Número de telefone inválido. Por favor, digite corretamente o número de seu telefone";
aMensagens[iIndexador++]  = "CI0010 Data de nascimento inválida. Por favor, preencha corretamente sua data de nascimento";
aMensagens[iIndexador++]  = "CI0011 Órgão emissor não informado. Por favor, informe corretamente o órgão emissor";
aMensagens[iIndexador++]  = "CI0012 Nacionalidade não informada. Por favor, informe corretamente sua nacionalidade";
aMensagens[iIndexador++]  = "CI0013 Estado civil não informado. Por favor, informe corretamente seu estado civil";
aMensagens[iIndexador++]  = "CI0014 Naturalidade não informada. Por favor, informe corretamente sua naturalidade";
aMensagens[iIndexador++]  = "CI0015 Código de agência inválido. Por favor, preencha  corretamente o código da agência";
aMensagens[iIndexador++]  = "CI0016 CEP não informado. Por favor, informe corretamente seu CEP residencial";
aMensagens[iIndexador++]  = "CI0017 Código da profissão não informado. Por favor, digite corretamente o código da profissão";
aMensagens[iIndexador++]  = "CI0018 CNPJ não informado. Por favor, informe corretamente o CNPJ";
aMensagens[iIndexador++]  = "CI0019 Nome do cônjuge não informado. Por favor, informe corretamente o nome do cônjuge";
aMensagens[iIndexador++]  = "CI0020 Endereço residencial não informado. Por favor, informe corretamente seu endereço residencial";
aMensagens[iIndexador++]  = "CI0021 Bairro não informado. Por favor, informe corretamente seu bairro";
aMensagens[iIndexador++]  = "CI0022 Cidade não informada. Por favor, informe corretamente sua cidade";
aMensagens[iIndexador++]  = "CI0023 Estado não informado. Por favor, informe corretamente o estado onde fica sua residência";
aMensagens[iIndexador++]  = "CI0024 Por favor, preencha o campo nome com letras e espaços";
aMensagens[iIndexador++]  = "CI0025 Data de expedição do RG inválida. Por favor, preencha corretamente a data de expedição do RG";
aMensagens[iIndexador++]  = "CI0026 Estado não informado. Por favor, informe corretamente o estado onde fica sua empresa";
aMensagens[iIndexador++]  = "CI0027 Número do CGC/CNPJ inválido. Por favor, digite corretamente o número do CGC/CNPJ";
aMensagens[iIndexador++]  = "CI0028 Estado não informado. Por favor, informe corretamente o estado da sua naturalidade";

aMensagens[iIndexador++]  = "VC0001 O número de seu CPF já consta em nossos cadastros.";



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










