
<!-- Begin
//verifica se o número do CGC é válido, de acordo com os dígitos verificadores.
function verifica_cgc(num_cgc){
	corpo = num_cgc.substring(0,12);
	digver = num_cgc.substring(12,15);
	fatores = "6543298765432";
	var soma = 0;
	
	//	retorna false se os valores forem zerados
	if (num_cgc == 00000000000000){
		return false;
	}

	
	//seleciona os caracteres do corpo para gerar o 1º dígito verificador
	for (var i = 0; i < (corpo.length); i++){
		var digito =  parseInt(num_cgc.charAt(i));
		var fator = parseInt(fatores.charAt(i+1))
		soma += (digito * fator);
	}
		
	// o primeiro dígito verificador é conseguido subtraindo-se de 11 o resto da divisão do total1d por 11
	var digito01 = (11 - (soma % 11));
	
	// se o resto da divisão por 11 for 10 ou 11, arredondar para zero.
	if (digito01 > 9 ) var digito01 = 0;
	
	// zerar acumulador "soma"
	var soma = 0;
	
	// se o primeiro dígito verificar, teste o segundo dígito.
	if (parseInt(num_cgc.charAt(12)) == digito01){
		for (var i = 0; i < (corpo.length); i++){
			var digito =  parseInt(num_cgc.charAt(i));
			var fator = parseInt(fatores.charAt(i))
			soma += (digito * fator);
		}
		var soma = (soma + (digito01 * 2));

		// o primeiro dígito verificador é conseguido subtraindo-se de 11 o resto da divisão do total1d por 11
		var digito02 = (11 - (soma % 11));
	
		// se o resto da divisão por 11 for 10 ou 11, arredondar para zero.
		if (digito02 > 9) var digito02 = 0;
	}
	else {
		return (false);
	}
	

	// verifica os dois ultimos digitos do número entrado com os dois valores calculados.
	var digcalculado = (String(digito01) + String(digito02));
	if (digver != digcalculado){
		return (false);
	}
	return (true);
}


function confere_cpf (cpfStr, digcpfStr) 
{
  //*********************  Valida&ccedil;&atilde;o de CPF (Martim - Pulso)************************
  
  var cpf;
  var digito;
  var i;
  var numeros="0123456789";
  
  cpf=cpfStr;
  digito=digcpfStr;
    
  if (cpf.length != 9)
  {
    return false;
  }
  
  for (i=0;i<9;i++)
  {
    if (numeros.indexOf(cpf.charAt(i)) == -1)
    {
      return false;
    }
  }
  
  if (digito.length != 2)
  {
    return false;
  }
  
  for (i=0;i<2;i++)
  {
    if (numeros.indexOf(digito.charAt(i)) == -1)
    {
      return false;
    }
  }
  
  var soma=0;
  var dv;
  
  for (i=0;i<9;i++)
  {
    soma=soma+(10-i)*parseInt(cpf.charAt(i));
  }
  dv = 11-(soma % 11);
  if (dv>9)
  {
    dv=0;
  }
  
  if (dv!=parseInt(digito.charAt(0)))
  {
    return false;
  }
  
  soma=0;
  for (i=0;i<9;i++)
  {
    soma=soma+(11-i)*parseInt(cpf.charAt(i));
  }
  soma=soma+parseInt(digito.charAt(0))*2;
  dv = 11-(soma % 11);
  if (dv>9)
  {
    dv=0;
  }
  
  if (dv!=parseInt(digito.charAt(1)))
  {
    return false;
  }
  return true;
}
//  End -->