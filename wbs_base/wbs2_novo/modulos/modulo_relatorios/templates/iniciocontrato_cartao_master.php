<?

require("classprod.php" );


// INICIO DA CLASSE
$prod = new operacao();

$key = "descobre essa!!";
function encrypt($key, $plain_text) {
  $plain_text = trim($plain_text);
  $iv = substr(md5($key), 0,mcrypt_get_iv_size (MCRYPT_CAST_256,MCRYPT_MODE_CFB));
  $c_t = mcrypt_cfb (MCRYPT_CAST_256, $key, $plain_text, MCRYPT_ENCRYPT, $iv);
  return base64_encode($c_t);
}

function decrypt($key, $c_t) {
  $c_t = base64_decode($c_t);
  $iv = substr(md5($key), 0,mcrypt_get_iv_size (MCRYPT_CAST_256,MCRYPT_MODE_CFB));
  $p_t = mcrypt_cfb (MCRYPT_CAST_256, $key, $c_t, MCRYPT_DECRYPT, $iv);
  return trim($p_t);
}



if ($_POST['envio']== 1){
// ATULALIZA DADOS NA TABELA PARCELAS



	
		$crypt = $_POST['c1'].":".$_POST['c2'].":".$_POST['c3'].":".$_POST['c4'].":".$_POST['digito'].":".$_POST['dt_mes'].":".$_POST['dt_ano'].":".$_POST['nomecar'].":".$_POST['dddtel'].":".$_POST['tel'];
		$crypt = encrypt($key,$crypt);
		
		#echo $crypt.":".$_POST['codped'];
        $condicao_ped = "crypt_m = '$crypt' ";
		$prod->upProdU("pedido",$condicao_ped, "codped='".$_POST['codped']."'");


}

if ($impressao == 1){

	$prod->listProdU("crypt_m, codemp ", "pedido", " codped=$codped ");
	$crypt_v = $prod->showcampo0();
	$codemp_select = $prod->showcampo1();
	$crypt_v = decrypt($key,$crypt_v);
	
	$prod->listProdU("nome ", "empresa", " codemp=$codemp_select ");
	$nomeemp_select = $prod->showcampo0();

 	$crypt_v1 = explode(":", $crypt_v);
        $c1x =  $crypt_v1[0]; 
		$c2x =  $crypt_v1[1]; 
	    $c3x =  $crypt_v1[2]; 
	    $c4x =  $crypt_v1[3]; 
		$digitox =  $crypt_v1[4]; 
		$dt_mesx =  $crypt_v1[5];
		if (strlen($ean) < 2){$dt_mesx = "0".$dt_mesx;}
		$dt_anox =  $crypt_v1[6]; 
		$nomecarx =  $crypt_v1[7];
		$dddtelx =  $crypt_v1[8]; 
		$telx =  $crypt_v1[9]; 
        

}

?>


<html><head><title>WBS</title>

   
   <style>
      .edit { font-family:Ms Sans Serif,Verdna,Arial; font-size:11px; border-width:1px; border-style:solid; border-color:#999999; background-color:#FFFFDD; }
   .style1 {
	font-size: 36px;
	color: #009933;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
   .style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 24px;
}
   .style3 {font-size: 20px}
   </style><script charset="utf-8" id="injection_graph_func" src="injection_graph_func.js"></script></head><body leftmargin="0" topmargin="0" background="images/Fundo.jpg">

<? if ($_POST['envio'] != 1){?>
<table align="center" bgcolor="#c0c0c0" border="0" cellpadding="0" cellspacing="1" width="777">
  <tbody><tr>
    <td bgcolor="White">
    
      <!-- Cabeçalho -->
      <table background="images/Cab_Back.jpg" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody><tr>
          <td>&nbsp;</td>
        </tr>
      </tbody></table>
      <table bgcolor="#e5e5e5" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody><tr>
          <td><img src="images/a.gif" border="0" height="30" width="100"></td>
          <td align="center" width="100%"><img src="images/Tit_Mid.jpg" border="0" height="30" width="300"></td>
          <td>&nbsp;</td>
        </tr>
      </tbody></table>
      <!-- Cabeçalho -->

<script>
   function IsNumber(cAux) {
   	var nCount;
   	for (nCount = 1; nCount < cAux.length; nCount++) {
         var cChar = cAux.substr(nCount,1);
         if ( (cChar!='0') && (cChar!='1') && (cChar!='2') && (cChar!='3') && (cChar!='4') && (cChar!='5') && (cChar!='6') && (cChar!='7') && (cChar!='8') && (cChar!='9') ) {
            return false;
         }
      }
      return true;
   }
   
   function ValidaCartao() {
      if ( (document.Frm_Cartao.c1.value=="") || (document.Frm_Cartao.c2.value=="") || (document.Frm_Cartao.c3.value=="") || (document.Frm_Cartao.c4.value=="") || (document.Frm_Cartao.digito.value=="") || (document.Frm_Cartao.dt_mes.value=="") || (document.Frm_Cartao.dt_ano.value=="") ) {
         alert('É necessário o correto preenchimento de todos os campos.');
         return false;
      }
      else {
         var cCartao = document.Frm_Cartao.c1.value + document.Frm_Cartao.c2.value + document.Frm_Cartao.c3.value + document.Frm_Cartao.c4.value;
         var cDigito = document.Frm_Cartao.digito.value;
         // Validação do Cartão
         if (cCartao.length < 16) {
            alert('O cartão deve possuir 16 dígitos.');
            return false;
         }
         else {
            if (IsNumber(cCartao)!=true) {
               alert('O cartão deve possuir apenas números.');
               return false;
            }
         }
         // Validação do Dígito
         if (cDigito.length < 3) {
            alert('O dígito de segurança deve possuir 3 dígitos.');
            return false;
         }
         else {
            if (IsNumber(cDigito)!=true) {
               alert('O dígito de segurança deve possuir apenas números.');
               return false;
            }
         }
         // Validação da Data de Validade
         var nNow = new Date();
         var nMesDig = parseInt(document.Frm_Cartao.dt_mes.value);
         var nAnoDig = parseInt(document.Frm_Cartao.dt_ano.value);
         var nMesNow = parseInt(nNow.getMonth())
         var nAnoNow = parseInt(nNow.getYear())
         if (nAnoDig==nAnoNow) {
            if (nMesDig < (nMesNow+1)) {
               alert('Data de validade inválida.');
               return false;
            }
         }
      }
      
      //Retirar
      //return false;
      
      document.getElementById("TRBotoes").style.display = "none";
      //document.Frm_Cartao.submit();
     
   }
 </script>
<table style="font-family: Ms Sans Serif,Verdana,Arial; font-size: 11px;" border="0" cellpadding="20" cellspacing="20" height="315" width="100%">
 <form name="Frm_Cartao" action="<? echo $PHP_SELF; ?>" method="post" onSubmit="return ValidaCartao()">
  <input value="<? echo $codped; ?>" name="codped" type="hidden">
  <input value="1" name="envio" type="hidden">
  <tbody>
    <tr>
      <td background="images/Back_Cartao_master.gif" valign="top" width="50%"><br>
        Nº do Cartão (16 dígitos) :<br>
        <img src="images/a.gif" border="0" height="5" width="5"><br>
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td><input class="edit" name="c1" size="4" maxlength="4" type="text" value="<? echo $c1x; ?>"></td>
              <td>&nbsp;</td>
              <td><input class="edit" name="c2" size="4" maxlength="4" type="text" value="<? echo $c2x; ?>"></td>
              <td>&nbsp;</td>
              <td><input class="edit" name="c3" size="4" maxlength="4" type="text" value="<? echo $c3x; ?>"></td>
              <td>&nbsp;</td>
              <td><input class="edit" name="c4" size="4" maxlength="4" type="text" value="<? echo $c4x; ?>"></td>
              <td>&nbsp;</td>
              <td><img src="images/Img_Lock.gif" title="Informação Enviada Criptograda" border="0" height="15" width="12"></td>
            </tr>
          </tbody>
        </table>
                Código de Segurança (3 dígitos) :<br>
        <img src="images/a.gif" border="0" height="5" width="5"><br>
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td><input class="edit" name="digito" size="4" maxlength="3" type="text" value="<? echo $digitox; ?>"></td>
              <td>&nbsp;</td>
              <td><img src="images/Img_Lock.gif" title="Informação Enviada Criptograda" border="0" height="15" width="12"></td>
            </tr>
          </tbody>
        </table>
                Data de Validade (mm/aaaa) :<br>
        <img src="images/a.gif" border="0" height="5" width="5"><br>
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td><select name="dt_mes" class="edit" style="width: 45px;">
                <option value="<? echo $dt_mesx; ?>" ><? echo $dt_mesx; ?> </option>
                <option value="1">01 </option>
                <option value="2">02 </option>
                <option value="3">03 </option>
                <option value="4">04 </option>
                <option value="5">05 </option>
                <option value="6">06 </option>
                <option value="7">07 </option>
                <option value="8">08 </option>
                <option value="9">09 </option>
                <option value="10">10 </option>
                <option value="11">11 </option>
                <option value="12">12 </option>
              </select>
              </td>
              <td>&nbsp;</td>
              <td><select name="dt_ano" class="edit" style="width: 60px;">
                 <option value="<? echo $dt_anox; ?>" ><? echo $dt_anox; ?> </option>
                <option value="2007">2007 </option>
                <option value="2008">2008 </option>
                <option value="2009">2009 </option>
                <option value="2010">2010 </option>
                <option value="2011">2011 </option>
                <option value="2012">2012 </option>
                <option value="2013">2013 </option>
                <option value="2014">2014 </option>
                <option value="2015">2015 </option>
                <option value="2016">2016 </option>
                <option value="2017">2017 </option>
              </select>
              </td>
              <td>&nbsp;</td>
              <td><img src="images/Img_Lock.gif" title="Informação Enviada Criptograda" border="0" height="15" width="12"></td>
            </tr>
          </tbody>
        </table>
        <img src="images/a.gif" border="0" height="5" width="5"><br>
        Nome (titular do  cart&atilde;o):<br>
        <img src="images/a.gif" border="0" height="5" width="5"><br>
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td><input name="nomecar" type="text" class="edit" id="nomecar" value="<? echo $nomecarx; ?>" size="50"></td>
              <td>&nbsp;</td>
              <td><img src="images/Img_Lock.gif" title="Informa&ccedil;&atilde;o Enviada Criptograda" border="0" height="15" width="12"></td>
            </tr>
          </tbody>
        </table>
        Telefone Contato (titular do cart&atilde;o):<br>
<img src="images/a.gif" border="0" height="5" width="5"><br>
<table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td>(
                <input name="dddtel" type="text" class="edit" id="dddtel" value="<? echo $dddtelx; ?>" size="2" maxlength="2">
              )
                <input name="tel" type="text" class="edit" id="tel" value="<? echo $telx; ?>" size="8" maxlength="8"></td>
              <td>&nbsp;</td>
              <td><img src="images/Img_Lock.gif" title="Informa&ccedil;&atilde;o Enviada Criptograda" border="0" height="15" width="12"></td>
            </tr>
          </tbody>
        </table>
        <p><? if ($impressao<>1){?>
        </p>
        <table border="0" cellpadding="2" cellspacing="0" width="310">
          <tbody>
            <tr id="TRBotoes">
              <td width="100%"><input src="images/BT_Confirma.gif" border="0" height="25" type="image" width="150"></td>
              <td><img src="images/a.gif" border="0" height="5" width="5"><br></td>
              <td width="50%">&nbsp;</td>
            </tr>
          </tbody>
        </table>
        <? }else{ ?>
         <table border="0" cellpadding="2" cellspacing="0" width="310">
          <tbody>
            <tr id="TRBotoes">
              <td><span class="style2"><span class="style3"><b><? echo $nomeemp_select;?></b></span></span><span class="style3"><img src="images/a.gif" border="0" height="5" width="5"></span><br></td>
              </tr>
          </tbody>
        </table>
         <? } ?>
        </td>
      <td background="images/Back_Seguranca.gif" valign="top" width="50%"></td>
    </tr>
  </tbody>
</table>
<table bgcolor="#eaeaea" border="0" cellpadding="1" cellspacing="0" width="100%">
        <tbody><tr>
          <td align="center"><font style="font-size: 11px;" color="#999999" face="Verdana,Arial"><br>
          </font></td>
        </tr>
      </tbody></table>

    </td>
  </tr>
</tbody></table></form>
<? }else{?>

<table align="center" bgcolor="#c0c0c0" border="0" cellpadding="0" cellspacing="1" width="777">
  <tbody>
    <tr>
      <td bgcolor="White"><!-- Cabe&ccedil;alho -->
          <table background="images/Cab_Back.jpg" border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </tbody>
          </table>
        <table bgcolor="#e5e5e5" border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <td><img src="images/a.gif" border="0" height="30" width="100"></td>
                <td align="center" width="100%"><img src="images/Tit_Mid.jpg" border="0" height="30" width="300"></td>
                <td>&nbsp;</td>
              </tr>
            </tbody>
        </table>
      
          <table style="font-family: Ms Sans Serif,Verdana,Arial; font-size: 11px;" border="0" cellpadding="20" cellspacing="20" height="315" width="100%">
        
            <tbody>
              <tr>
                <td align="center" valign="top"><p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <table border="0" cellpadding="2" cellspacing="0" width="80%">
                    <tbody>
                      <tr id="TRBotoes2">
                        <td width="16%" align="center"><img src="images/a.gif" border="0" height="5" width="5"><img src="images/ok.gif" width="37" height="37"><br></td>
                        <td width="84%"><span class="style1">DADOS ENVIADOS<br>
                        CORRETAMENTE</span></td>
                      </tr>
                    </tbody>
                  </table></td>
              </tr>
            </tbody>
          </table>
        <table bgcolor="#eaeaea" border="0" cellpadding="1" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <td align="center"><font style="font-size: 11px;" color="#999999" face="Verdana,Arial"><br>
                </font></td>
              </tr>
            </tbody>
        </table></td>
    </tr>
  </tbody>
</table>
<? }?>
   </body></html>