//AUTO TABULACAO DO FORMULARIO
VerifiqueTAB=true;

function checkTAB(){
	VerifiqueTAB= true;
}

function pulaCampo(campo,f){
	//document.form1.loja.tagName 
	if ((campo.tagName=="INPUT" || campo.tagName=="SELECT") && VerifiqueTAB==true){
		if (campo.maxLength==campo.value.length){
			next = 0;
			while (next<f.length && campo.name!=f[next].name) next++;
			next++
			while (next<f.length && f[next].type!="text" && f[next].type!="password" && f[next].type!="checkbox" && f[next].type!="radio" && f[next].nodeName!="SELECT") next++;
			if (next<f.length) f[next].focus();
	
		}
		VerifiqueTAB= false;
	}
}

//Formatação de numeros
//DE		1200.00 
//Para	R$ 1.200,00
function formatCurrency(number){
  var num = new String (number);
  if (num.indexOf (".") == -1){
		intLen = num.length;
    toEnd = intLen;
    var strLeft = new String (num.substring (0, toEnd));
    var strRight = new String ("00");
  }else {
		pos = eval (num.indexOf ("."));
		var strLeft = new String (num.substring (0, pos));
		intToEnd = num.length;
		intThing = pos + 1;
		var strRight = new String (num.substring (intThing, intToEnd));
		if (strRight.length > 2){
			nextInt = strRight.charAt(2);
			if (nextInt >= 5){
				strRight = new String (strRight.substring (0, 2));
				strRight = new String (eval ((strRight * 1) + 1));
				if((strRight * 1) >= 100){
					strRight = "00";
					strLeft = new String (eval ((strLeft * 1) + 1));
				}
				if (strRight.length <= 1){
					strRight = new String ("0" + strRight);
				}
			}else{
				strRight = new String (strRight.substring (0, 2));
			}
		}else{
			if (strRight.length != 2){
				strRight = strRight + "0";
			}
		}
	}
	if (strLeft.length > 3){
		var curPos = (strLeft.length - 3);
		while (curPos > 0){
			var remainingLeft = new String (strLeft.substring (0, curPos));
			var strLeftLeft = new String (strLeft.substring (0, curPos));
			var strLeftRight = new String (strLeft.substring (curPos, strLeft.length));
			strLeft = new String (strLeftLeft + "." + strLeftRight);
			curPos = (remainingLeft.length - 3);
		}
	}
	strWhole = strLeft + "," + strRight;
	finalValue = 'R$ '+ strWhole;
	return (finalValue);
}

//DE		R$ 1.200,00 ou 1.200,00 
//Para	1200.00
function formatEnglish(number){
	number = number + "";
	number = number.replace(/\./g,"");
	number = number.replace(/,/g,".");
	number = number.replace(/ /g,"");
	number = number.replace(/R\$/gi,"");
	return (number);
}


//Auto formatacao para Numero enquanto digita
function verificaValor(campo,e){

  //problema com o tab
  if (campo.value.length == 0)
  {
      campo.value = "R$ ";
      return false;
  }    
  
  //se nao tem virgula
  if ((e==8 && (campo.value=="R$" || campo.value=="R$ ")) ||
		 (e==9 || e==16) ||
		 (campo.value == "R$" || campo.value == "R$ ") ||
		 (campo.value.substring(1,campo.value.length).indexOf("R")>0)){
    campo.value="R$ ";
    return false;
  }
  
  if(campo.value.substring(0,3)=="R$ ")
		valor = campo.value.substring(3,campo.value.length);
  else if(campo.value.substring(0,3)!="R$ "){
		valor = campo.value;
		campo.value = "R$ "+campo.value;
  }

  valorU = valor.substring(valor.length-1);

  if(valorU!="1" && valorU!="2" && valorU!="3" && valorU!="4" &&
valorU!="5" && valorU!="6"
  && valorU!="7" && valorU!="8" && valorU!="9" && valorU!="0" &&
valorU!="." && valorU!=","){

    campo.value=campo.value.substring(0,campo.value.length-1);
    return false;
   }




  if(valor.indexOf(",")<0){

     if(valor.indexOf(".")>0 && valor.length==4){
        part = valor.split(".");
        camp="";
        for(m=0;m<part.length;m++)
          camp+=part[m];
      campo.value ="R$ "+ camp;
       }
     tmp = "";
     for(i=valor.length;i>=0;i--){
       if(valor.charAt(i)!=".")
      tmp += valor.charAt(i);
     }


     tmp2="";
     final ="";
     partes = new Array(parseInt(tmp.length/3)+2);
     for (j=0;j<parseInt((tmp.length-1)/3);j++){
       partes[j] = tmp.substring(3*j,3*j+3);
       final = tmp.substring(3*j+3);

     }



     for(k=0;k < j;k++){
       tmp2 += partes[k]+ ".";
     }

     tmp2+=  (final);
     tmp3="";
     for(i=tmp2.length;i>=0;i--){
      tmp3 += tmp2.charAt(i);
     }


     if( parseInt(tmp2.indexOf("."))==3){
        campo.value ="R$ "+ tmp3;
       }
  }
  //se tem virgula
  else{
    tmp = campo.value.substring(campo.value.lastIndexOf(",")+1,campo.value.length);
    if(tmp.indexOf(".")>0 || tmp.indexOf(",")>0){
      campo.value = campo.value.substring(0, campo.value.length-1);
    }
    if(tmp.length==3)
      campo.value = campo.value.substring(0, campo.value.length-1);
  }
}

function limpa(campo){
  if(campo.value == "R$" || campo.value=="R$ ")
    campo.value="";
  else if(campo.value.length>3 && campo.value.indexOf(",")<0)
    campo.value+=",00";
  else if(campo.value.indexOf(",")>0 && campo.value.substring(campo.value.indexOf(",")).length==2 )
    campo.value+="0";  
}

function justNumber(campo){
	
	buffer = campo.value
	lastChar = buffer.substring(buffer.length - 1)
		

	if(lastChar != "1" && lastChar != "2" && lastChar != "3" && lastChar != "4" &&
	   lastChar != "5" && lastChar != "6" && lastChar != "7" && lastChar != "8" &&
	   lastChar != "9" && lastChar != "0" && lastChar != ".")

			campo.value = campo.value.substring(0, campo.value.length - 1)    
}

function ValidaCampoNumerico(strNum)
{
    var i = 0;
    var j = 0;
    var teste = "0123456789";
    
    if (strNum=="") return true;
    
    while (j < strNum.length)
    {
      i=0;
      while (i < 10)
      {
        if (strNum.charAt(j) == teste.charAt(i))
            break;
        else
            i++;
            
        if (i == 10)
            return false;
      }
      j++;
    }                
    return true;
}

//funcao q muda a cor de fundo e da fonte do form_campo
function cor(hexa, cor, quem) {
	//seta a cor de fundo
	quem.style.background = hexa;

	//seta a cor da fonte
	quem.style.color = cor;
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
    
<!-- Begin
var isNN = (navigator.appName.indexOf("Netscape")!=-1);
function autoTab(input,len, e) {
var keyCode = (isNN) ? e.which : e.keyCode; 
var filter = (isNN) ? [0,8,9] : [0,8,9,16,17,18,37,38,39,40,46];
if(input.value.length >= len && !containsElement(filter,keyCode)) {
input.value = input.value.slice(0, len);
input.form[(getIndex(input)+1) % input.form.length].focus();
}
function containsElement(arr, ele) {
var found = false, index = 0;
while(!found && index < arr.length)
if(arr[index] == ele)
found = true;
else
index++;
return found;
}
function getIndex(input) {
var index = -1, i = 0, found = false;
while (i < input.form.length && index == -1)
if (input.form[i] == input)index = i;
else i++;
return index;
}
return true;
}
//  End -->

