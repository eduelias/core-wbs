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
  if (dv.charAt(0) != d1)            // CPF Inválido
    return false;

  d1 *= 2;
  for (i = 0; i < 9; i++)
  {
    d1 += c.charAt(i)*(11-i);
  }
  d1 = 11 - (d1 % 11);
  if (d1 > 9) d1 = 0;
  if (dv.charAt(1) != d1)            // CPF Inválido
    return false;
  // CPF Válido
  return true;
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