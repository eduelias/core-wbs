//    '-----------------------------------------------------------------'
//    '                  Regra de composição do CMC7                    '
//    '                                                                 '
//    '                                                                 '
//    ' Número composto por 30 dígitos, descritos da seguinte forma :   '
//    '                                                                 '
//    '   |341|0004|8|018|000001|5|0|5000000004|7|                      '
//    '     1    2  3  4    5    6 7      8     9                       '
//    '                                                                 '
//    ' 1 = código compensação do banco (3 dígitos)                     '
//    ' 2 = número da agência (4 dígitos)                               '
//    ' 3 = dígito módulo 10 dos seguintes campos :                     '
//    '     cód.câmara compensação (3 dígitos)                          '
//    '     núm.do cheque (6 dígitos)                                   '
//    '     cód.tipificação do documento (1 dígito)                     '
//    ' 4 = código da câmara compensação (3 dígitos)                    '
//    ' 5 = número do cheque (6 dígitos)                                '
//    ' 6 = código tipificação do documento (1 dígito)                  '
//    '     5 : cheque comum                                            '
//    '     6 : cheque ordem de pagamento                               '
//    '     7 : cheque viagem                                           '
//    '     8 : cheque administrativo                                   '
//    ' 7 = dígito módulo 10 dos seguintes campos :                     '
//    '     cód.banco (3 dígitos)                                       '
//    '     cód.agência (4 dígitos)                                     '
//    ' 8 = número da conta corrente (com dígito da conta) (10 dígitos) '
//    ' 9 = dígito módulo 10 do campo número da cta.corrente            '
//    '-----------------------------------------------------------------'
//=============================================================
function ValidarCMC7( lc_numero ){
//=============================================================
    var lc_Tam;
    var lc_NumCalc;
    var lc_DigRec1;
    var lc_DigRec2;
    var lc_DigRec3;
    var lc_DigCalc1;
    var lc_DigCalc2;
    var lc_DigCalc3;
    var lc_Cmc7Calc;

    lc_Tam = lc_numero.length;

    if ( lc_Tam < 30 ) {
        alert( "Código CMC7 inválido");
        return false;
    }

    lc_NumCalc = lc_numero.substring( 8,18 ); //, 9, 10)
    lc_DigRec1 = lc_numero.substring( 7,8 ); //8, 1))
    lc_DigCalc1 = CalcDig_Mod10(lc_NumCalc);

    lc_NumCalc = "000" +  lc_numero.substring( 0,7 );//, 1, 7)
    lc_DigRec2 = lc_numero.substring(18,19);  //, 19, 1))
    lc_DigCalc2 = CalcDig_Mod10(lc_NumCalc);

    lc_NumCalc = lc_numero.substring(19,29);//, 20, 10)
    lc_DigRec3 = lc_numero.substring( 29,30 ); //, 30, 1))
    lc_DigCalc3 = CalcDig_Mod10(lc_NumCalc);

    lc_Cmc7Calc = lc_numero.substring( 0,7 ) + lc_DigCalc1 + lc_numero.substring( 8,18 )+  lc_DigCalc2 + lc_numero.substring( 19,29 ) + lc_DigCalc3;
	if ( lc_numero != lc_Cmc7Calc ){
		alert( "Código CMC7 inválido");
        return false;
	}
	return true;
}

function CalcDig_Mod10( lc_numero ){
    var lc_Tam;
    var lc_Soma;
    var lc_Resto;
    var lc_Cont;
    var lc_Pos;
    var lc_Aux;
	var CalcDig_Mod10;
    lc_Tam = lc_numero.length;

    lc_Soma = 0;
    lc_Pos = true;

	for( lc_Cont =0 ; lc_Cont < lc_Tam ; lc_Cont++){
        lc_Aux = lc_numero.substring( lc_Cont, lc_Cont+1);
        if( lc_Pos == true ){
            lc_Pos = false;
            lc_Soma = new Number(lc_Soma) + new Number(lc_Aux);
        }else{
            lc_Pos = true;
            if( lc_Aux > 4 ){
                lc_Soma = lc_Soma + (lc_Aux * 2) - 9;
            }else{
                lc_Soma = lc_Soma + (lc_Aux * 2);
			}
         }   
	}
    lc_Resto = lc_Soma % 10;
    if( lc_Resto == 0 ){
        CalcDig_Mod10 = 0;
    }else{
        CalcDig_Mod10 = 10 - lc_Resto;
    }
	return CalcDig_Mod10;
}

// FUNÇÕES DO PRODUTO ACHEI-RECHEQUE

//=============================================================
function ChecaBanco (campo) { 
//=============================================================
	var parte = campo.name.substring(3,2);
	var cval ="B_" + parte;

	if (document.forms[0][cval].value.length <  3) {
		alert("O Código do Banco deve ser informado.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false)  ;
	}

	if (document.forms[0][cval].value=="000") {
		alert("O Código do Banco deve ser diferente de zeros.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false)  ;
	}

	if (document.forms[0][cval].value == "000") {
		alert("O Código do Banco deve ser diferente de zeros.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false)  ;
	}
	return(true);
}
//=============================================================
function ChecaDDD(campo) {
//=============================================================
	var parte = campo.name.substring(3,2);
	var cval ="N_" + parte;
	var cval1 ="L_" + parte;

	if (document.forms[0][cval].value.length <  3)  {
		tamanho = document.forms[0][cval].value.length;
		var zero = "";
		for(i=3; i>tamanho; i--) zero = zero + "0";
		valor = zero + document.forms[0][cval].value ;
		document.forms[0][cval].value = valor;
	}

	if (document.forms[0][cval].value=="000")  {
		alert("O Código DDD deve ser diferente de zeros.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false)  ;
	}

	if  ( document.forms[0][cval].value < "011" | document.forms[0][cval].value > "099")  {
		alert("O Código DDD deve estar entre 011 e 099.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false)  ;
	}
	return true;
}
//=============================================================
function ChecaCMC7(campo) {
//============================================================
	var parte = campo.name.substring(3,2);
	var cval ="Y_" + parte;

	if( document.forms[0][cval].value.length <  30)    {
		alert("O Código CMC7 deve ser informado.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false)  ;
	}

	if( document.forms[0][cval].value=="000000000000000000000000000000")    {
		alert("O Código do Banco deve ser diferente de zeros.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false)  ;
	}
}
//=============================================================
function ChecaFone(campo) {
//=============================================================
	var parte = campo.name.substring(3,2);
	var cval ="L_" + parte;

	if (document.forms[0][cval].value.length <  6)  {
		alert("O Telefone deve ser pelo menos 6 números.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false)  ;
	}
	
	if ((new Number(document.forms[0][cval].value )) == 0 ) {
		alert("O telefone deve ser diferente de zeros.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false)  ;
	}

	if (document.forms[0][cval].value == "111111" | document.forms[0][cval].value == "1111111" 
	| document.forms[0][cval].value == "11111111" | document.forms[0][cval].value == "0111111"
	| document.forms[0][cval].value == "00111111"  | document.forms[0][cval].value == "01111111"
	| document.forms[0][cval].value < 100000) {
		alert("Telefone Inválido.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false)  ;
	}

    var checkOK = "0123456789";
    var checkStr = document.forms[0][cval].value;
    var allValid = true;
    var decPoints = 0;
    var allNum = "";
    var novovalor="";

 	for (i = 0;  i < checkStr.length;  i++)	{
		ch = checkStr.charAt(i);
		for (j = 0;  j < checkOK.length;  j++) 	
			if (ch == checkOK.charAt(j)) { 			   
		          break;
		    }    			
			if (j == checkOK.length) {
				allValid = false;
                break;
            }                              	
            if (ch != "."   && ch!= "/" && ch != "-")             	  
				allNum += ch;   
    }

    if (allNum.length > 8)  {
		alert("O Campo Telefone deve ter no máximo 8 caracteres.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();          
		return(false);        
    }
    if (!allValid) {
		alert("O Campo Telefone deve conter apenas números, eliminar barras e pontos.");	
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false);             
	}
	return true;
}
//=============================================================
function completaFone(valor) {
//=============================================================
	tamanho = valor.length;
	 var zero = "";
	 for(i=8; i>tamanho; i--){
	  zero = zero + "0";
	 }
	 valor = zero + valor ;
	 document.servlet.FONE.value = valor;
}
//=============================================================
function ChecaDocumento(campo) {
//=============================================================
	var parte = campo.name.substring(3,2);
	var tipodoc = "T_" + parte;
	var cval ="D_" + parte;

	for (var loop=0;loop < document.forms[0][tipodoc].length;loop++) {
		if ((document.forms[0][tipodoc][loop].selected) || (document.forms[0][tipodoc][loop].checked)) {
			var tipo = document.forms[0][tipodoc][loop].text;
			var campo = document.forms[0][cval];
		}      
	}
	if(tipo=="CPF") {      
		var tam=14;
		var num=11;      
	} else {
		var tam=18;
		var num=14;
	}

	if (campo.value =="") {  
		alert("O campo Documento  deve ser preenchido, eliminar barras e pontos.");
		campo.select();
		campo.focus();         
		return(false);
	}

	if ((campo.value =="00000000000") ||  (campo.value =="00000000000000") ) {  
		alert("O campo Documento  deve ser preenchido, eliminar barras e pontos e não pode ser igual a zeros.");
		campo.select();
		campo.focus();         
		return(false);
	}

	if (campo.value.length > tam)  {
		alert("O campo " + tipo+ " deve ter no máximo  " + tam + " caracteres.");
		campo.focus();
		campo.select();
		return(false);
	}
	var checkOK = "0123456789./-";
	var checkStr = campo.value;
	var allValid = true;
	var decPoints = 0;
	var allNum = "";
	var novovalor="";

	for (i = 0;  i < checkStr.length;  i++)	{
		ch = checkStr.charAt(i);
		for (j = 0;  j < checkOK.length;  j++) 	
		if (ch == checkOK.charAt(j)) { 			   
			break;
		}    			
		if (j == checkOK.length) {
			allValid = false;
			break;
		}                              	
		if (ch != "."   && ch!= "/" && ch != "-")             	  
			allNum += ch;   
	}

	if (allNum.length > num)  {
		alert("O campo " + tipo+ " deve ter no máximo  " + tam + " caracteres.");
		campo.focus();
		campo.select();          
		return(false);        
	}
	if (!allValid) {
		alert("O campo " + tipo +" deve conter apenas números, eliminar barras e pontos.");	
		campo.focus();
		campo.select();
		return(false);             
	}		
	if (tipo=="CNPJ") {
		if (ChecaCgc(allNum))
			return (true);
		else {
			alert(tipo + "  inválido, digite novamente, eliminar barras e pontos.");
			campo.value="";
			campo.focus();
			campo.select();
			return (false);			     
		}
	} else {
		if (ChecaCpf(allNum))
			return (true);
		else {
			alert(tipo + "  inválido, digite novamente, eliminar barras e pontos.");	     	     
			campo.value="";
			campo.focus();
			campo.select();
			return(false);
		}                    
	}          
}
//=============================================================
function ChecaCpf(CKCPF) {
//=============================================================
	var CPF = CKCPF;
	var NewCPF = "";
	//Verifica tamanho do CPF
	if (CPF.length<9) {
		return false;
	}
	//Calcula os dígitos verificadores
	//Guarda os 09 primeiros digitos
	var DVCPF = CPF.substring(0,9);
	var s1 = 0

	for (i=1;i<=9;i++) s1 = s1 + (ValChar(DVCPF.charAt(i-1))*(11-i))
	r1 = s1 % 11
	if (r1<2) dv1=0
	else dv1 = 11 - r1
	var s2 = dv1*2
	for (i=1;i<=9;i++) s2 = s2 + (ValChar(DVCPF.charAt(i-1))*(12-i))
	r2 = s2 % 11
	if (r2<2) dv2=0
	else dv2 = 11 - r2
	var DV = ""
	DV = DV + dv1 + dv2
	var NewDV = CPF.substring(9,11)
	if (NewDV==DV) return true
	else {
		return false
	}
}
//=============================================================
function ValChar(ch) {
//=============================================================
	if (ch=="0") return 0
	else if (ch=="1") return 1
	else if (ch=="2") return 2
	else if (ch=="3") return 3
	else if (ch=="4") return 4
	else if (ch=="5") return 5
	else if (ch=="6") return 6
	else if (ch=="7") return 7
	else if (ch=="8") return 8

	else if (ch=="9") return 9
	else return 10
}
  
//=============================================================
function ChecaCgc8(CKCGC) {
//=============================================================
	var CGC = CKCGC;
	var NewCGC = "";
	for (i=0;i<CGC.length;i++) { 
		if (CGC.charAt(i) != " " && CGC.charAt(i) != "." && CGC.charAt(i) != "/" && CGC.charAt(i) != "-") NewCGC = NewCGC + CGC.charAt(i);
	}

	if (NewCGC.length!=8) {
		return false;
	}

	var Numerico = false;
	var Numeros = "0123456789";
	for (i=0;i<NewCGC.length;i++) { 
		Numerico = false;
		for (j=0;j<Numeros.length;j++) { //>
			if (NewCGC.charAt(i) == Numeros.charAt(j)) {
				Numerico = true;
				break;  
			}
		}
		if (!Numerico) {
			return false;
		}
	}
	var s1 = 0;
	aux = 0;
	soma = 0
	return (true)
}

//=============================================================
function ChecaCgc(CKCGC) {
//=============================================================
	var CGC = CKCGC;
	var NewCGC = "";
	if (CGC.length!=14) {
		return false;
	}

	var DVCGC = CGC.substring(0,12);
	var s1 = 0;
	for (i=1;i<=4;i++) s1 = s1 + (ValChar(DVCGC.charAt(i-1))*(6-i));
	for (i=5;i<=12;i++) s1 = s1 + (ValChar(DVCGC.charAt(i-1))*(14-i));
	r1 = s1 % 11;
	if (r1<2) dv1=0;
	else dv1 = 11 - r1;
	var s2 = dv1*2;
	for (i=1;i<=5;i++) s2 = s2 + (ValChar(DVCGC.charAt(i-1))*(7-i));
	for (i=6;i<=12;i++) s2 = s2 + (ValChar(DVCGC.charAt(i-1))*(15-i));
	r2 = s2 % 11;
	if (r2<2) dv2=0;
	else dv2 = 11 - r2;
	var DV = "";
	DV = DV + dv1 + dv2;
	var NewDV = CGC.substring(12,14)
	if (NewDV==DV) { 
		return true
	} else {
		return false
	}
	return (true)
}

//============================================================
function ValChq(campo) {    
//=============================================================
	var parte = campo.name.substring(3,2);
	var nome=campo.name.substr(0,2) ;
	var cval=campo.name.substr(0,2) + parte ;

	if(document.forms[0][cval].value == "") {
		alert("O Número do Cheque deve ser informado, eliminar barras e pontos.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false);  	   
	}
	//=====================Digito do cheque com banco = 347 =================
	/*var bco ="B_" + parte;
	if(document.forms[0][bco].value == "347") {
		if(campo.value =="") {
			campo.value=document.forms[0][cval].value;
			campo.select();
		}
		return(true);  	   
	}*/
//===================== Fim Digito do cheque com banco = 347 =================  	 
	if(document.forms[0][cval].value.length < 7) {
		alert("O Número do Cheque deve se informado com 7 posicoes.");
		document.forms[0][cval].focus();
		document.forms[0][cval].value="";
		return(false);  	   
	}

	if(document.forms[0][cval].value == "0000000") {
		alert("O Número do Cheque deve ser informado sem barras e pontos e diferente de zeros.");
		document.forms[0][cval].focus();
		document.forms[0][cval].value="";
		return(false);  	   
	}
	   	 
	var checkOK = "0123456789-";
	var checkStr = document.forms[0][cval].value;
	var allValid = true;
	var decPoints = 0;
	var allNum = "";
	var novovalor="";

	for (i = 0;  i < checkStr.length;  i++)	{
		ch = checkStr.charAt(i);
		for (j = 0;  j < checkOK.length;  j++) 	
		if (ch == checkOK.charAt(j)) { 			   
			break;
		}    			
		if (j == checkOK.length) {
			allValid = false;								
			break;
		}                              	
		if (ch != "-")             	  
			allNum += ch;   
	}
    
	if (document.forms[0][cval].value ==0){
		alert("O Número do Cheque deve não pode ser igual a zeros.");
		document.forms[0][cval].focus();
		document.forms[0][cval].value="";
		return(false);  	   
	}

	if(allNum.length >7) { 
		alert("O Número do cheque deve ter no máximo 7 caracteres.");
		document.forms[0][cval].focus();
		document.forms[0][cval].value="";
		return(false);
	}
    	 
	var parte=document.forms[0][cval].value.substr(0,6);    
	var aux= Mod11(parte);
	if( aux != document.forms[0][cval].value.substr(6,1) )  {
		alert("Dígito do cheque inválido, eliminar barras e pontos.");
		document.forms[0][cval].focus();
		document.forms[0][cval].value="";
		return(false);
	} else {
		if(nome=="F_" || nome=="I_" ) {
			if(campo.value =="") {
				campo.value=document.forms[0][cval].value;
				campo.select();
			}
		}
	return(true);
	}
}
//=============================================================
function Mod11(numero) {
//=============================================================
	var xTamanho;
	var xValor;
	var xProduto;
	var xPeso;
	var xConta;
	var xModulo;
//---> Caldulo do modulo 11
	xTamanho=numero.length;
	xValor=0;
	xYpeso=0;
	xPeso="23456789234567892345678923456789";

	for(xConta=xTamanho-1;xConta>=0 ;xConta--) {
		xProduto= (numero.charAt(xConta)) * ( xPeso.charAt(xYpeso));
		xYpeso++;
		xValor=xValor+ xProduto;
	}
	xModulo=xValor %11;
	xModulo=11-xModulo
	if(xModulo==10 || xModulo==11) xModulo=0;
	return(xModulo);
}

//=============================================================
function ValChqFina(campo) { 
//=============================================================
	var parte = campo.name.substring(3,2);
	var cval ="I_" + parte;
	var cfin="F_"+parte;

//=====================Digito do cheque com banco = 347 =================
	var bco ="B_" + parte;
	if(document.forms[0][bco].value == "347") {
		return(true);  	   
	}

//===================== Fim Digito do cheque com banco = 347 ============
	if( document.forms[0][cfin].value.length == 0)  {
		document.forms[0][cfin].value=document.forms[0][cval].value;
		return(true);
	}    
	if(ValChq(campo)) { 
		if(document.forms[0][cfin].value < document.forms[0][cval].value) { 
			alert("O Número do cheque final deve ser maior ou igual ao numero do cheque inicial.");
			document.forms[0][cfin].focus();
			return(false);       
		} else
			return(true);
	} else	
		return(false);
}      

//=============================================================
function ValValor(campo) {  
//=============================================================
	var parte = campo.name.substring(3,2);
	var cpo=campo.name.substring(0,1);
	var dec =false;
	if(cpo=="D") { 
		parte=parte-1;
	}
	var cval="V_"+parte;

	if(document.forms[0][cval].value.length == 0){
		alert("O Valor deve ser informado.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false);
	}        
        
	if(document.forms[0][cval].value.length < 3){
		alert("O Valor deve no mínimo 3 posições.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false);
	}        

	if(document.forms[0][cval].value <= 0){
		alert("O Valor deve ser maior que zero.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false);
	}

	var checkOK = "0123456789.,";
	var checkStr = document.forms[0][cval].value;
	var allValid = true;
	var decPoints = 0;
	var ponto =0;
	var allNum = "";
	var newvalue = 0;
	var flag =0;
	var virgula = 0;
	var checaponto = 0;
	var valOrig = document.forms[0][cval].value;

	for(i=1;i <document.forms[0][cval].value.length;i++) { 
		for (i = 0;  i < checkStr.length;  i++)	{
			ch = checkStr.charAt(i);
			for (j = 0;  j < checkOK.length;  j++) 	
			if (ch == checkOK.charAt(j)) { 			   
				if(ch==",")  {
					dec=dec+1;
					flag = flag + 1;
					virgula=i;
				} else if(ch==".") {
					ponto=ponto+1;
					flag = flag + 1;
					checaponto=i;
				} else {
					newvalue=newvalue+ch
				}
			break;
		}    			
		if (j == checkOK.length) {
			alert("Digitar o valor, inclusive centavos, sem vírgula ou ponto.");   
			document.forms[0][cval].value = valOrig;
			document.forms[0][cval].focus();
			document.forms[0][cval].select();
			return(false);                                       
			break;
		} else {
			allNum += ch;                      
			document.forms[0][cval].value=allNum;
		}
	}
       
	if( newvalue == 0 ) { 
		alert("O Valor deve ser maior que zero.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false);
	}
	if(dec > 0 ) { 
		if(newvalue.length-dec < 3) { 
			alert("Valor incorreto.");   
			document.forms[0][cval].value = valOrig;
			document.forms[0][cval].focus();
			document.forms[0][cval].select();
			return(false);                    
		}
	}
	numeros = (newvalue.length)-2;
	if(ponto > 0)  {
		if(numeros<4) { 
			alert("Valor incorreto.");   
			document.forms[0][cval].value = valOrig;
			document.forms[0][cval].focus();
			document.forms[0][cval].select();
			return(false);                               
		}    
		if(ponto==1){
			if( ponto  > (numeros/4)) { 
				alert("Digitar o valor, inclusive centavos, sem vírgula ou ponto.");   
				document.forms[0][cval].value = valOrig;
				document.forms[0][cval].focus();
				document.forms[0][cval].select();
				return(false);                               }
			}
		}

		if(dec>1) {
			alert("Digitar o valor, inclusive centavos, sem vírgula ou ponto.");   
			document.forms[0][cval].value = valOrig;
			document.forms[0][cval].focus();
			document.forms[0][cval].select();
			return(false);                                       
		}

		if(dec==0 && ponto==0 && flag==0){
		var strg = 0;
		strg = allNum.substr(0,allNum.length-2);
		switch (strg.length){              
		case 4: 
		allNum =  allNum.substr(0,allNum.length-5) +"."+allNum.substr(1,allNum.length-3) + ","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;

		case 5: 
		allNum =  allNum.substr(0,allNum.length-5) +"."+allNum.substr(2,allNum.length-4) + ","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;             

		case 6: 
		allNum =  allNum.substr(0,allNum.length-5) +"."+allNum.substr(3,allNum.length-5) + ","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;

		case 7: 
		allNum =  allNum.substr(0,allNum.length-8) +"."+allNum.substr(1,allNum.length-6) + "."+allNum.substr(4,allNum.length-6) + ","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;

		case 8:
		allNum =  allNum.substr(0,allNum.length-8) +"."+allNum.substr(2,allNum.length-7) + "."+allNum.substr(5,allNum.length-7) + ","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;

		case 9: 
		allNum =  allNum.substr(0,allNum.length-8) +"."+allNum.substr(3,allNum.length-8) + "."+allNum.substr(6,allNum.length-8) + ","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;

		case 10: 
		allNum =  allNum.substr(0,allNum.length-11) +"."+allNum.substr(1,allNum.length-9) + "."+ allNum.substr(4,allNum.length-9) + "."+allNum.substr(7,allNum.length-9) + ","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;

		case 11: 
		allNum =  allNum.substr(0,allNum.length-11) +"."+allNum.substr(2,allNum.length-10) + "."+ allNum.substr(5,allNum.length-10) + "."+allNum.substr(8,allNum.length-10) + ","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;

		case 12: 
		allNum =  allNum.substr(0,allNum.length-11) +"."+allNum.substr(3,allNum.length-11) + "."+ allNum.substr(6,allNum.length-11) + "."+allNum.substr(9,allNum.length-11) + ","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;

		case 13: 
		allNum =  allNum.substr(0,allNum.length-14) +"."+allNum.substr(1,allNum.length-12) + "."+ allNum.substr(4,allNum.length-12) + "."+allNum.substr(7,allNum.length-12) + "."+ allNum.substr(10,allNum.length-12) +","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;

		case 14: 
		allNum =  allNum.substr(0,allNum.length-14) +"."+allNum.substr(2,allNum.length-13) + "."+ allNum.substr(5,allNum.length-13) + "."+allNum.substr(8,allNum.length-13) + "."+ allNum.substr(11,allNum.length-13) +","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;

		case 15: 
		allNum =  allNum.substr(0,allNum.length-14) +"."+allNum.substr(3,allNum.length-14) + "."+ allNum.substr(6,allNum.length-14) + "."+allNum.substr(9,allNum.length-14) +  "."+ allNum.substr(12,allNum.length-14)+","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;

		case 3: 
		allNum =  allNum.substr(0,allNum.length-2) + ","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;

		case 2: 
		allNum =  allNum.substr(0,allNum.length-2) + ","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;

		case 1: 
		allNum =  allNum.substr(0,allNum.length-2) + ","+ allNum.substr(allNum.length-2,2);
		document.forms[0][cval].value=allNum;
		break;
		}
	}
	if(ponto>0){
		var iniciopon = 0;
		var fimpon = 0;
		var caracter = 0;
		caracter = virgula-checaponto;
		if(caracter!=4){
			alert("Digitar o valor, inclusive centavos, sem vírgula ou ponto.");
		}
	}
	return(true)
	}
}
//=============================================================
function validaValDt(campo1 ,campo2 ) {
//=============================================================
	if(campo1.value=="" && campo2.value!= "") { 
		alert("A data deve ser informada.");
		campo1.focus();
		campo1.select();
		return(false);
	}
	if(campo1.value !="" && campo2.value== "") { 
		alert("A data de vencimento deve ser informada no formato DDMMAAAA.");
		campo2.focus();
		campo2.select();
		return(false);
	}
}
//==============================================================
function SetVal(campo) { 
//==============================================================
	var parte = campo.name.substring(3,2);
	var nome=campo.name.substr(0,2) ;
	if(nome=="H_") var cval="F_" + parte
	else var cval ="I_" + parte;

	if(nome=="V_" || nome=="H_" ) {
		if(campo.value =="") {
			campo.focus();
			campo.value= ",00";
			campo.select();
			campo.focus();
		}
	}
	return(true);
}
//=============================================================
function ValData(campo)  {
//=============================================================
	var parte = campo.name.substring(3,2);
	var cpo=campo.name.substring(0,1);

	if (cpo=="D") { 
	   parte=parte-1;
	}
	var cval="H_"+parte;

	if (document.forms[0][cval].value.length == 0) { 
       alert("A Data de vencimento deve ser informada, no formato DDMMAAAA.");
       document.forms[0][cval].focus();
       return(false);
	}

	if (document.forms[0][cval].value.length>0) { 
		var checkOK = "0123456789";
	    var checkStr = document.forms[0][cval].value;
		var allValid = true;
		var decPoints = 0;
		var allNum = "";
		var novovalor="";

		for (i=1;i <document.forms[0][cval].value.length;i++) { 
 			for (i = 0;  i < checkStr.length;  i++)	{
				ch = checkStr.charAt(i);
				for (j = 0;  j < checkOK.length;  j++) 	
					if (ch == checkOK.charAt(j)) { 			   
				      break;
					}    			
				if (j == checkOK.length) { }                              	
				else {
                    allNum += ch;   
                }
                document.forms[0][cval].value=allNum;
           }
		}
		
		if (document.forms[0][cval].value.length <8 && document.forms[0][cval].value.length > 0) { 
	       alert("A Data deve ter o formato : DDMMAAAA.");
		   document.forms[0][cval].focus();
		   document.forms[0][cval].select();
	       return(false);
       }

		var dia=document.forms[0][cval].value.substr(0,2);
		var mes=document.forms[0][cval].value.substr(2,2);
		var ano=document.forms[0][cval].value.substr(4,4);

		var cvald="DataHora";
		var cvalm="Dt_2";
		var diad=document.forms[0][cvald].value.substr(0,2);
		var mesd=document.forms[0][cvald].value.substr(3,2);
		var anod=document.forms[0][cvald].value.substr(6,4);

		var datam = anod+mesd+diad;
		var datad = ano+mes+dia;
		var Erro=false;

		if(dia>31|| dia==0) { 
		   Erro=true;   
		}
		if(mes > 12|| mes==0){ 
		    Erro=true;    
	    }
		if(ano==0000) {     
		    Erro=true;
	    }

		if(datad < datam){
			alert("A data não pode ser inferior a data do dia.");
			document.forms[0][cval].focus();
			document.forms(0)[cval].select();
		}
   
		if(Erro) { 
			alert("Data Inválida, a data deve ter o formato : DDMMAAAA.");
			document.forms[0][cval].focus();
			document.forms(0)[cval].select();
		    return(false);
		}
	return true;    
	}
}
//=================================================
// Script para pular de campo
//=================================================
VerifiqueTAB=true;
function PararTAB(quem) { VerifiqueTAB=false; } 
function ChecarTAB() { VerifiqueTAB=true; } 

function Mostra(quem,tammax) {
	if(tammax==null) {
		var parte=quem.name.substring(3,2);
		var cval ="T_" + parte;
		if( document.forms[0][cval][0].selected)
			tammax=11
		else
			tammax=14  
		}
		if ( (quem.value.length == tammax) && (VerifiqueTAB) ) { 
			var i=0,j=0, indice=-1;
			for (i=0; i<document.forms.length; i++) { 
				for (j=0; j<document.forms[i].elements.length; j++) { 
					if (document.forms[i].elements[j].name == quem.name) { 
						indice=i;
						break;
					} 
				} 
				if (indice != -1) break; 
			} 
			for (i=0; i<=document.forms[indice].elements.length; i++) { 
				if (document.forms[indice].elements[i].name == quem.name) { 
					while ((   (document.forms[indice].elements[(i+1)].type == "hidden") || 
						(document.forms[indice].elements[(i+1)].name.substr(0,1) == "T"))  &&
						(i < document.forms[indice].elements.length) ) { 
					i++;
				} 
				document.forms[indice].elements[(i+1)].focus();          
				VerifiqueTAB=false;
				break;
			} 
		} 
	} 
} 

//=============================================================
function ValValor1(campo) {  
//=============================================================
	var parte=campo.name.substring(3,2);
	var cpo=campo.name.substring(0,1);
	var dec =false;
	if(cpo=="D") { 
		parte=parte-1;
	}
	var cval="V_"+parte;

	if(document.forms[0][cval].value.length == 0){
		alert("O Valor deve ser informado.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false);
	}        
        
	if(document.forms[0][cval].value.length < 3){
		alert("O Valor deve no mínimo 3 posições.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false);
	}        

	if(document.forms[0][cval].value <= 0){
		alert("O Valor deve ser maior que zero.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false);
	}

	var checkOK = "0123456789,.";
	var checkStr = document.forms[0][cval].value;
	var allValid = true;
	var decPoints = 0;
	var ponto =0;
	var allNum = "";
	var newvalue = 0;
	var flag =0;
	var virgula = 0;
	var checaponto = 0;
	var valOrig = document.forms[0][cval].value;

	for(i=1;i <document.forms[0][cval].value.length;i++) { 
		for (i = 0;  i < checkStr.length;  i++)	{
			ch = checkStr.charAt(i);
			for (j = 0;  j < checkOK.length;  j++) 	
			if (ch == checkOK.charAt(j)) { 			   
				if(ch==",")  {
					dec=dec+1;
					flag = flag + 1;
					virgula=i;
				} else if(ch==".") {
					ponto=ponto+1;
					flag = flag + 1;
					checaponto=i;
				} else {
					newvalue=newvalue+ch
				}
				break;
			}    			
			if (j == checkOK.length) {
				alert("Digitar o valor, inclusive centavos, sem vírgula ou ponto.");   
				document.forms[0][cval].value = valOrig;
				document.forms[0][cval].focus();
				document.forms[0][cval].select();
				return(false);                                       
				break;
			} else {
				allNum += ch;                      
				document.forms[0][cval].value=allNum;
			}
		}
       
		if( newvalue == 0 ) { 
			alert("O Valor deve ser maior que zero.");
			document.forms[0][cval].focus();
			document.forms[0][cval].select();
			return(false);
		}
		if(dec > 0 ) { 
			if(newvalue.length-dec < 3) { 
				alert("Valor incorreto.");   
				document.forms[0][cval].value = valOrig;
				document.forms[0][cval].focus();
				document.forms[0][cval].select();
				return(false);                    
			}
		}
		numeros = (newvalue.length)-2;
		if(ponto > 0)  {
			if(numeros<4) { 
				alert("Valor incorreto.");   
				document.forms[0][cval].value = valOrig;
				document.forms[0][cval].focus();
				document.forms[0][cval].select();
				return(false);                               
			}    
			if(ponto==1){
				if( ponto  > (numeros/4)) { 
					alert("Digitar o valor, inclusive centavos, sem vírgula ou ponto.");   
					document.forms[0][cval].value = valOrig;
					document.forms[0][cval].focus();
					document.forms[0][cval].select();
					return(false);                               }
				}
			}

			if(dec>1) {
				alert("Digitar o valor, inclusive centavos, sem vírgula ou ponto.");   
				document.forms[0][cval].value = valOrig;
				document.forms[0][cval].focus();
				document.forms[0][cval].select();
				return(false);                                       
			}

			if(dec==0 && ponto==0 && flag==0){
				var strg = 0;
				strg = allNum.substr(0,allNum.length-2);
				switch (strg.length){              
				case 4: 
				allNum =  allNum.substr(0,allNum.length-5) +"."+allNum.substr(1,allNum.length-3) + ","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;

				case 5: 
				allNum =  allNum.substr(0,allNum.length-5) +"."+allNum.substr(2,allNum.length-4) + ","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;             

				case 6: 
				allNum =  allNum.substr(0,allNum.length-5) +"."+allNum.substr(3,allNum.length-5) + ","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;

				case 7: 
				allNum =  allNum.substr(0,allNum.length-8) +"."+allNum.substr(1,allNum.length-6) + "."+allNum.substr(4,allNum.length-6) + ","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;

				case 8:
				allNum =  allNum.substr(0,allNum.length-8) +"."+allNum.substr(2,allNum.length-7) + "."+allNum.substr(5,allNum.length-7) + ","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;

				case 9: 
				allNum =  allNum.substr(0,allNum.length-8) +"."+allNum.substr(3,allNum.length-8) + "."+allNum.substr(6,allNum.length-8) + ","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;

				case 10: 
				allNum =  allNum.substr(0,allNum.length-11) +"."+allNum.substr(1,allNum.length-9) + "."+ allNum.substr(4,allNum.length-9) + "."+allNum.substr(7,allNum.length-9) + ","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;

				case 11: 
				allNum =  allNum.substr(0,allNum.length-11) +"."+allNum.substr(2,allNum.length-10) + "."+ allNum.substr(5,allNum.length-10) + "."+allNum.substr(8,allNum.length-10) + ","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;
             
				case 12: 
				allNum =  allNum.substr(0,allNum.length-11) +"."+allNum.substr(3,allNum.length-11) + "."+ allNum.substr(6,allNum.length-11) + "."+allNum.substr(9,allNum.length-11) + ","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;

				case 13: 
				allNum =  allNum.substr(0,allNum.length-14) +"."+allNum.substr(1,allNum.length-12) + "."+ allNum.substr(4,allNum.length-12) + "."+allNum.substr(7,allNum.length-12) + "."+ allNum.substr(10,allNum.length-12) +","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;

				case 14: 
				allNum =  allNum.substr(0,allNum.length-14) +"."+allNum.substr(2,allNum.length-13) + "."+ allNum.substr(5,allNum.length-13) + "."+allNum.substr(8,allNum.length-13) + "."+ allNum.substr(11,allNum.length-13) +","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;

				case 15: 
				allNum =  allNum.substr(0,allNum.length-14) +"."+allNum.substr(3,allNum.length-14) + "."+ allNum.substr(6,allNum.length-14) + "."+allNum.substr(9,allNum.length-14) +  "."+ allNum.substr(12,allNum.length-14)+","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;

				case 3: 
				allNum =  allNum.substr(0,allNum.length-2) + ","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;

				case 2: 
				allNum =  allNum.substr(0,allNum.length-2) + ","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;

				case 1: 
				allNum =  allNum.substr(0,allNum.length-2) + ","+ allNum.substr(allNum.length-2,2);
				document.forms[0][cval].value=allNum;
				break;
			}
		}
		if (ponto > 0 ) {
			var iniciopon = 0;
			var fimpon = 0;
			var caracter = 0;
			caracter = virgula-checaponto;
			if(caracter	!=	4)	{
				alert("Digitar o valor, inclusive centavos, sem vírgula ou ponto.");
				document.forms[0][cval].focus();
				document.forms[0][cval].select();
				return(false);
			}
		}
	return(true)
	}
}
//=============================================================
function Tecla(e) { 
//=============================================================
	if(document.all) // I.E
		var tecla = event.keyCode;
	else if(document.layers) // Nestcape
		var tecla = e.which;

	if(tecla > 47 && tecla < 58) // de 0 a 9
		return true;
	else {
		if (tecla != 8) //enter
			return false;
		else
		return true;
	}
}
//=============================================================
function validacmc7(obj){
//=============================================================
	if (obj.value == "") {
		return true;
	}
	//var objant = eval("document.forms[0].D_" + obj.name.substring(2,3)+".value");
	//if (objant == "") {
	//	alert("Obrigatótio preenchimento do documento");
	//	eval("document.forms[0]." + obj.name+".value=''");
	//	eval("document.forms[0].D_" + obj.name.substring(2,3)+".focus()");
	//	return false;
	//}
	if( ValidarCMC7(obj.value) ){
		return true;
	} else {
		eval("document.forms[0]."+obj.name+".select()");
		eval("document.forms[0]."+obj.name+".focus()");
		return false;
	}	
}
//=============================================================
function validadata(obj){
//=============================================================
	if ( obj.value == "" ) {
		return true;
	}
	var objant = eval("document.forms[0].D_" + obj.name.substring(2,3)+".value");	
	if (objant == "") {
		alert("Obrigatótio preenchimento do documento");
		eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].D_" + obj.name.substring(2,3)+".focus()");
		return false;
	}
	if( ValData(obj) ){
		return true;
	} else {
		eval("document.forms[0]."+obj.name+".select()");
		eval("document.forms[0]."+obj.name+".focus()");
		return false;
	}	
}
//=============================================================
function validavalor(obj){
//=============================================================
	if ( obj.value == "" ) {
		return true;
	}
	var objant = eval("document.forms[0].D_" + obj.name.substring(2,3)+".value");	
	if (objant == "") {
		alert("Obrigatótio preenchimento do documento");
		eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].D_" + obj.name.substring(2,3)+".focus()");
		return false;
	}
	if( ValValor1(obj) ){
		return true;
	}else{
		eval("document.forms[0]."+obj.name+".select()");
		eval("document.forms[0]."+obj.name+".focus()");
		return false;
	}	
}
//=============================================================
function validaddd(obj){
//=============================================================
	if ( obj.value == "" ) {
		return true;
	}
	var objant = eval("document.forms[0].D_" + obj.name.substring(2,3)+".value");	
	if (objant == "") {
		alert("Obrigatótio preenchimento do documento");
		eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].D_" + obj.name.substring(2,3)+".focus()");
		return false;
	}
	if( ChecaDDD(obj) ){
		return true;
	}else{
		eval("document.forms[0]."+obj.name+".select()");
		eval("document.forms[0]."+obj.name+".focus()");
		return false;
	}	
}
//=============================================================
function validatelefone(obj){
//=============================================================
	if ( obj.value==""){
		return true;
	}
	var objant = eval("document.forms[0].D_" + obj.name.substring(2,3)+".value");	
	if (objant == "") {
		alert("Obrigatótio preenchimento do documento");
		eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].D_" + obj.name.substring(2,3)+".focus()");
		return false;
	}
	if( ChecaFone(obj) ){
		return true;
	}else{
		eval("document.forms[0]."+obj.name+".select()");
		eval("document.forms[0]."+obj.name+".focus()");
		return false;
	}	
}
//=============================================================
function validabanco(obj){
//=============================================================
	if ( obj.value==""){
		return true;
	}
	var objant = eval("document.forms[0].D_" + obj.name.substring(2,3)+".value");	
	if (objant==""){
		alert("Obrigatótio preenchimento do documento");
		eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].D_" + obj.name.substring(2,3)+".focus()");
		return false;
	}
	if( ChecaBanco(obj) ){
		return true;
	}else{
		eval("document.forms[0]."+obj.name+".select()");
		eval("document.forms[0]."+obj.name+".focus()");
		return false;
	}	
}
//=============================================================
function validacheque(obj){
//=============================================================
	if ( obj.value=="" ){
		return true;
	}
	var objant = eval("document.forms[0].D_" + obj.name.substring(2,3)+".value");	
	if (objant==""){
		alert("Obrigatótio preenchimento do documento");
		eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].D_" + obj.name.substring(2,3)+".focus()");
		return false;
	}
	if( ValChq(obj) ){
		eval("document.forms[0].F_" + obj.name.substring(2,3)+".value = obj.value");
		return true;
	} else {
		eval("document.forms[0]."+obj.name+".select()");
		eval("document.forms[0]."+obj.name+".focus()");
		return false;
	}	
}
//=============================================================
function validalinha(obj){
//=============================================================
	var index;
	if (obj == null) {
		obj == eval("document.forms[0].D_9" ); 
		index = 10;
	} else {
		index = new Number(obj.name.substring(2,3));
	}
	index = index - 1;
	var valor = eval("document.forms[0].D_" + index +".value");
	if( valor=="" ){
		if( obj.name != ("D_"+ (index+1)) ) eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].D_" + index +".focus()");
		return false;
	}
	valor = eval("document.forms[0].B_" + index +".value");
	if( valor=="" ){
		alert("Preenchimento da Banco obrigatório.");
		if( obj.name != ("B_"+ (index+1)) ) eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].B_" + index +".focus()");
		return false;
	}
	valor      = eval("document.forms[0].A_" + index +".value");
	var valor1 = eval("document.forms[0].X_" + index +".value");
	
	if( valor== "" && valor1 != "") {
		alert("Preenchimento da Agência obrigatório.");
		if( obj.name != ("A_"+ (index+1)) ) eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].A_" + index +".focus()");
		return false;
	} else if( valor!= "" && valor1 == "" ){
		alert("Preenchimento da Conta Corrente obrigatório.");
		if( obj.name != ("X_"+ (index+1)) ) eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].X_" + index +".focus()");
		return false;
	}
	valor = eval("document.forms[0].I_" + index +".value");
	if( valor=="" ){
		alert("Preenchimento da Cheque Inicial obrigatório.");
		if( obj.name != ("I_"+ (index+1)) ) eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].I_" + index +".focus()");
		return false;
	}
	valor = eval("document.forms[0].F_" + index +".value");
	if( valor=="" ){
		alert("Preenchimento da Cheque Inicial obrigatório.");
		if( obj.name != ("F_"+ (index+1)) ) eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].F_" + index +".focus()");
		return false;
	}

	valor	   = eval("document.forms[0].I_" + index +".value"); //cheque inicial
	var valor1 = eval("document.forms[0].F_" + index +".value"); //cheque final
		if( valor1  < valor ){
			alert("Cheque final deve ser maior ou igual ao cheque inicial");
			if( obj.name != ("D_"+ (index+1)) ) eval("document.forms[0]." + obj.name+".value=''");
			eval("document.forms[0].F_" + index +".focus()");
			eval("document.forms[0].F_" + index +".select()");
			return false;
	} 
	
	valor = eval("document.forms[0].H_" + index +".value");
	if( valor=="" ){
		alert("Preenchimento de data obrigatório.");
		if( obj.name != ("D_"+ (index+1)) ) eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].H_" + index +".focus()");
		return false;
	}
	valor = eval("document.forms[0].V_" + index +".value");
	if( valor=="" ){
		alert("Preenchimento do valor obrigatório.");
		if( obj.name != ("D_"+ (index+1)) ) eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].V_" + index +".focus()");
		return false;
	}
	valor      = eval("document.forms[0].N_" + index +".value"); //ddd
	var valor1 = eval("document.forms[0].L_" + index +".value"); //fone
	if( valor=="" && valor1!="" ){
		alert("Preenchimento do ddd é obrigatório quando digitado um telefone.");
		if( obj.name != ("D_"+ (index+1)) ) eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].N_" + index +".focus()");
		return false;
	}else{
		if( valor!="" && valor1=="" ){
			alert("Preenchimento do telefone é obrigatório quando digitado um ddd.");
			if( obj.name != ("D_"+ (index+1)) ) eval("document.forms[0]." + obj.name+".value=''");
			eval("document.forms[0].L_" + index +".focus()");
			return false;
		}
	} 
	return true;	
}
//=============================================================
function limpacampo(obj){
//=============================================================
	eval("document.forms[0].D_" + obj.name.substring(2,3)+".value=''");
	eval("document.forms[0].B_" + obj.name.substring(2,3)+".value=''");
	eval("document.forms[0].I_" + obj.name.substring(2,3)+".value=''");
	eval("document.forms[0].F_" + obj.name.substring(2,3)+".value=''");
	eval("document.forms[0].H_" + obj.name.substring(2,3)+".value=''");
	eval("document.forms[0].V_" + obj.name.substring(2,3)+".value=''");
	eval("document.forms[0].N_" + obj.name.substring(2,3)+".value=''");
	eval("document.forms[0].L_" + obj.name.substring(2,3)+".value=''");
}
//=============================================================
function checatudo(){
//=============================================================
	var x=0;
	var texto;
	var objeto;
	for( x=0; x<10; x++){
		texto = eval("document.forms[0].D_" + x +".value" );
		if ( texto != "" ){
			objeto = eval("document.forms[0].D_" + (x+1) );
			if( !validalinha( objeto ) ){
				return;
			}
		}
	}
	document.forms[0].submit();
}
//=============================================================
function submeter(opc){
//=============================================================
	document.dados.action		= "/novoachei/AcheiPrincipal";
	document.dados.target		= "";	
	document.dados.submit();	
}
//=============================================================
function novaconsulta(){
//=============================================================
	document.dados.action		= "/novoachei/AcheiPrincipal";
	document.dados.target		= "";	
	document.dados.submit();

}
//=============================================================
function continuar() {
//=============================================================
		document.dados.passo.value = "um";
		document.dados.submit();
}
//=============================================================
function consiste() {
//=============================================================
	if (document.dados.CONTRATO.value == "GE") {
		sel = document.dados.CONTRATO.value;
	} else { 
		var sel1 = document.dados.CONTRATO;
		var sel = sel1.options[sel1.selectedIndex].value;
	}
	document.dados.contrato1.value = sel;
	document.dados.passo.value = "dez";
	document.dados.submit();
}
//=============================================================
function  checacampos(){ // Checa todos os campos do formulario
//=============================================================
	var retorno=true;
	var invalidos=0;
	var branco=0;
	for (i=0; i<10; i++) { 
		var T="T_"+i;
		var D="D_"+i;
		var L="L_"+i;
		var N="N_"+i;
		var Y="Y_"+i;
		var H="H_"+i;
		var V="V_"+i;

		var valordoc = document.forms[0][D].value;

		if(valordoc!=""){
		   if(ChecaDocumento(document.forms[0][D]) != false) {
 	         if(ChecaCMC7(document.forms[0][Y])!=false) {
		         if( ValValor(document.forms[0][V])!=false){
        		    if( ValData(document.forms[0][H])!=false){
					  if(ChecaDDD(document.forms[0][N])!=false) {
						 if(ChecaFone(document.forms[0][L])!=false) {
						  } else {
							  //alert("Fone Nao");
							  retorno=false;
							  invalidos++;
						  }
					   } else {
						 // alert("DDD Nao");
						  retorno=false;
						  invalidos++;
					   }        
					} else {
					 // alert("Data Nao");
					  retorno=false;
					  invalidos++;
					}        
				} else {
				 // alert("Valor Nao");
				  retorno=false;
				  invalidos++;
				}        
			} else {
			 // alert("CMC7 Nao");
			  retorno=false;
			  invalidos++;
			}        
		} else {
		 // alert("Documento Nao");
		  retorno=false;
		  invalidos++;  
		 }

	   } else {
		  branco++;
	   }
  }		
	if(branco>=10) {
		 alert("Nenhum dado foi informado.");
		 document.forms[0].D_0.select();
		 return(false);
	}		 
	if(invalidos==0) {
	  return(true);
	 } else  {
	   return(false);
	 }
} 
//=============================================================
function ChecaAgencia(campo) { 
//=============================================================
	var parte = campo.name.substring(3,2);
	var cval ="A_" + parte;

	if( document.forms[0][cval].value.length <  3) {
		alert("O Código da Agência deve ser informado.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false)  ;
	}

	if( (new Number( document.forms[0][cval].value )) == 0 ) {
		alert("O Código da Agência deve ser diferente zeros");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false)  ;
	}
	return(true);
}
  
//=============================================================
function ChecaConta(campo) {
//=============================================================
	var parte = campo.name.substring(3,2);
	var aval   = "B_" + parte;
	var cval   = "X_" + parte;
	var cont   = document.forms[0]["contador"].value;
	if (document.forms[0][cval].value.length <  3) {
		alert("O Código da Conta deve ser informado.");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false)  ;
	}
	if (document.forms[0][cval].value=="000") {
		alert("O Código da Conta deve ser diferente de 0000");
		document.forms[0][cval].focus();
		document.forms[0][cval].select();
		return(false)  ;
	}

	for (i=0; i < cont; i ++ ) { 
		var cbanco = "codbanco_" + i;
		var codbanco  = document.forms[0][cbanco].value;

		var qtd = "qtddigito_" + i;
		var qtddigito = document.forms[0][qtd].value;

		var inicio = "indinicia_" + i;
		var indinicia = document.forms[0][inicio].value;

		var vmin   = "valmin_" + i;
		var vmax   = "valmax_" + i;
		var valmin = document.forms[0][vmin].value.substring(15 - qtddigito);
		var valmax = document.forms[0][vmax].value.substring(15 - qtddigito);

		var msg = "msgerro_" + i;
		var msgerro = document.forms[0][msg].value;

		if  (indinicia == "S") { 
			if (document.forms[0][aval].value == codbanco) {
				if (document.forms[0][cval].value.length <  qtddigito)  {
					tamanho = document.forms[0][cval].value.length;
					var zero = "";
					for (i=qtddigito; i>tamanho; i--) zero = zero + "0";
					valor = zero + document.forms[0][cval].value;
					document.forms[0][cval].value = valor;
				}
			}
		}

		if (document.forms[0][aval].value == codbanco && document.forms[0][cval].value.length != qtddigito) {
			alert(msgerro);
			document.forms[0][cval].focus();
			document.forms[0][cval].select();
			return(false)  ;
		}  else if (document.forms[0][aval].value == codbanco) { 
			if  (document.forms[0][cval].value < valmin | document.forms[0][cval].value > valmax)  {
				alert(msgerro);
				document.forms[0][cval].focus();
				document.forms[0][cval].select();
				return(false)  ;
			}
		}
	}
	return(true);
}
//=============================================================
  function validaagencia(obj){
//=============================================================
	if ( obj.value==""){
		return true;
	}
	var objant = eval("document.forms[0].D_" + obj.name.substring(2,3)+".value");	
	if (objant==""){
		alert("Obrigatótio preenchimento do documento");
		eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].D_" + obj.name.substring(2,3)+".focus()");
		return false;
	}
	if( ChecaAgencia(obj) ){
		return true;
	}else{
		eval("document.forms[0]."+obj.name+".select()");
		eval("document.forms[0]."+obj.name+".focus()");
		return false;
	}	
}
//=============================================================
function validaconta(obj){
//=============================================================
	if ( obj.value==""){
		return true;
	}
	var objant = eval("document.forms[0].D_" + obj.name.substring(2,3)+".value");	
	if (objant==""){
		alert("Obrigatótio preenchimento do documento");
		eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].D_" + obj.name.substring(2,3)+".focus()");
		return false;
	}
	if( ChecaConta(obj) ){
		return true;
	}else{
		eval("document.forms[0]."+obj.name+".select()");
		eval("document.forms[0]."+obj.name+".focus()");
		return false;
	}	
}
//=============================================================
function validacep(obj){
//=============================================================
	if ( obj.value == "" ) {
		return true;
	}
	var objant = eval("document.forms[0].D_" + obj.name.substring(2,3)+".value");	
	if ( objant == "" ) {
		alert("Obrigatótio preenchimento do documento");
		eval("document.forms[0]." + obj.name+".value=''");
		eval("document.forms[0].D_" + obj.name.substring(2,3)+".focus()");
		return false;
	}
}
