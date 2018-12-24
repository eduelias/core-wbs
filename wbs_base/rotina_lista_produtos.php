<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();


		#$prod->listProd("vendedor", "nome='$login'");
				
		#$nomevendold = $prod->showcampo1();
		#$codvendold = $prod->showcampo0();
		#$tipovend = $prod->showcampo2();
		#$codempvend = $prod->showcampo10();
		#$allemp = $prod->showcampo17();
		#$fatorusertabela = $prod->showcampo5(); // Fator que multiplca o preco de tabela
		$fatorusertabela = 1;
	

// ACOES PRINCIPAIS DA PAGINA



		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("nomeprod, codprod, descres, unidade, pvv, pvvcj, chkcb, hist, imagemsize, imagemtype, imagemfile ", "produtos", "hist <> 1", $array, $array_campo, "ORDER BY nomeprod LIMIT 350,80");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$nomeprodold = $prod->showcampo0();
			$codprodold = $prod->showcampo1();
			$descresold = $prod->showcampo2();
			$unidadeold = $prod->showcampo3();
			$pvvold = $prod->showcampo4();
			$pvvcjold = $prod->showcampo5();
			$chkcbold = $prod->showcampo6();
			$histold = $prod->showcampo7();

			//DADOS DA IMAGEM
			$imgsizeold = $prod->showcampo8();
			$imgtypeold = $prod->showcampo9();
			$imgnameold = $prod->showcampo10();

			$prod->clear();
			#-- CALCULA PRECOS - INICIO
		
			// PRECO DE TABELA : $PRECO[$I] = $PRECOPADRAO[$I] * FATORMULT[$I]
			// PRECO DE VENDA : $PRECO[$I] * $FATORUSERTABELA
			
				if ($unidadeold =="CJ"):
					
					$pvvcjtotal = 0;
					$prod->listProdgeral("relacoes", "codprod=$codprod", $array3, $array_campo3 , "");

						for($u = 0; $u < count($array3); $u++ ){
				
						$prod->mostraProd( $array3, $array_campo3, $u );
						$codsubprod = $prod->showcampo2();
						$qtde = $prod->showcampo3();

						$prod->listProdSum("pvvcj", "produtos", "codprod=$codsubprod", $array1, $array_campo1 , "");
						$prod->mostraProd( $array1, $array_campo1, 0 );
						$pvvcj = $prod->showcampo0();
				
						$pvvcjtotal = $pvvcjtotal + ($pvvcj*$qtde);
	
						}
	
					#-- Conjunto
					$precopadrao = $pvvcjtotal;
					#$prod->listProd("estoque", "codprod=$codprodold and codemp=$codempselect");
					#$fatormult = $prod->showcampo7();
					#$preco = $precopadrao * $fatormult;
					$preco = $precopadrao * $fatorusertabela;
					#echo("pfc=$preco ");
					
				else:
					#-- Unidade
					$precopadrao = $pvvold;
					#$prod->listProd("estoque", "codprod=$codprodold and codemp=$codempselect");
					#$fatormult = $prod->showcampo7();
					#$preco = $precopadrao * $fatormult;
					$preco = $precopadrao * $fatorusertabela;
					#echo("pfu=$preco ");
				endif;
			

			$precof = number_format($preco,2,',','.'); 
			#$tam = strlen ($precof);
			#$realold = substr($precof,0,($tam-3));
			#$centavosold = substr($precof,($tam-2),$tam);

			//PARCELADO
			$preco_parc = $preco/6;
			$preco_parcf = number_format($preco_parc,2,',','.'); 
			#$tam = strlen ($preco_parcf);
			#$real_parcold = substr($preco_parcf,0,($tam-3));
			#$centavos_parcold = substr($preco_parcf,($tam-2),$tam);
			
	

		#-- CALCULA PRECOS - FIM


		#-- MONTA ARRAY - INICIO

			
			
			$codprod[$i] = $codprodold;
			$nomeprod[$i] = $nomeprodold;
			$unidade[$i] = $unidadeold;
			$imgsize[$i] = $imgsizeold;
			$imgtype[$i] = $imgtypeold;
			$imgname[$i] = $imgnameold;
			$descres[$i] = $descresold;
			$real[$i] = $realold;
			$centavos[$i] = $centavosold;
			$real_parc[$i] = $real_parcold;
			$centavos_parc[$i] = $centavos_parcold;
			$preco_v[$i] = $precof;
			$preco_p[$i] = $preco_parcf;

			


		#-- MONTA ARRAY - FIM
		
		}//FOR

		#-- VARIAVEIS DE INICIALIZACAO

		$qtde = ceil(count($array)/4);
		$i= 0;
		

echo("
<style>
/* CSS Document */

a:link {
	font-size:10px;
	color:#CC0000;
	text-decoration:none;
}
a:visited {
	font-size:10px;
	color:#CC0000;
	text-decoration:none;
}
a:active {
	font-size:10px;
	color:#CC0000;
	text-decoration:none;
}
a:hover {
	font-size:10px;
	color:#CC0000;
	text-decoration:underline;
}
body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
	text-decoration: none;
	background-color: #FFFFFF;
	margin-bottom: 0px;
	margin-left: 0px;
	margin-right: 0px;
	margin-top: 0px;
	background-image: url(../images/layout_background.gif);
}
table {
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#000000;
}
.relogio {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #FFFFFF;
	text-decoration: none;
}
.acompanhe1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #FFFFFF;
	text-decoration: none;
}
.campo1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	color: #CC0000;
	background-color: #FFFFFF;
	border: 1px groove #CC0000;
}
.campo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	color: #666666;
	background-color: #FFFFFF;
	border: 1px inset #CCCCCC;
}
.botao1 {

	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	color: #000000;
	background-color: #FFFFFF;
	border: 1px outset;
}
.menu {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #CC0000;
	text-decoration: none;
	font-weight: bold;
	text-transform: uppercase;
}
.titulo1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 20px;
	font-weight: normal;
	text-transform: uppercase;
	color: #333333;
	text-decoration: none;
}
.titulo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 20px;
	font-weight: nornal;
	text-transform: uppercase;
	color: #CC0000;
	text-decoration: none;
}
.ondecomprar_cidade {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	line-height: 26px;
	font-weight: bold;
	color: #CC0000;
	text-decoration: none;
}

.ondecomprar_loja {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	line-height: 18px;
	font-weight: bold;
	color: #CC0000;
	text-decoration: none;
	border-color: #B2B2B2;
	border-width: 2px 0px 1px 0px;
}

.ondecomprar_outros1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	line-height: normal;
	font-weight: normal;
	color: #333333;
	text-decoration: none;
}

.ondecomprar_outros2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	line-height: normal;
	font-weight: normal;
	color: #333333;
	text-decoration: none;
}
.menuserv {

	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #FFFFFF;
	text-decoration: none;
	font-weight: bold;
	text-transform: uppercase;
}
.nomeprod {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bold;
	color: #CC0000;
	text-decoration: none;
	text-transform: uppercase;
}
.descrprod {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	font-weight: normal;
	color: #666666;
	text-decoration: none;
	text-transform: lowercase;
}
.preco1
{
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: normal;
	color: #CC0000;
	text-decoration: none;
}
.preco2
{
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	font-weight: normal;
	color: #333333;
	text-decoration: none;
}
</style>

<TABLE cellSpacing=0 cellPadding=0 width=600 border=0>
  <TBODY>



");
	

	for($j = 0; $j < $qtde; $j++ ){
		
		

		echo("

		
		 <TR>
      <TD vAlign=top width='25%'><TABLE cellSpacing=0 cellPadding=4 width='100%' border=0>
          <TBODY>
            <TR align=middle>
              <TD height='60' align='center' vAlign=top><a href=''><strong class='nomeprod'>$nomeprod[$i]</strong><br>
                    <span class='descrprod'>$descres[$i]</span></a></TD>
            </TR>
            <TR align=middle>
              <TD align='center'><a href=''><IMG src='resizer.php?percent=1&imgfile=images_prod/$imgname[$i]' border=0></a></TD>
            </TR>
            <TR align=middle>
              <TD align='center'><span class='preco1'><B>1+6 de R$ $preco_p[$i]</B></span><B><br>
                    <span class='preco2'>a vista R$ $preco_v[$i]</span></B></TD>
            </TR>
            <TR align=middle>
              <TD align='center'><a href=''></a></TD>
            </TR>
          </TBODY>
      </TABLE></TD>
	");
		 $i=$i+1;
	echo("
      <TD width=1 bgColor=#d1d1d1><IMG height=1 
            src='_spacer.gif' width=1></TD>
      <TD vAlign=top width='25%'><TABLE cellSpacing=0 cellPadding=4 width='100%' border=0>
        <TBODY>
          <TR align=middle>
            <TD height='60' align='center' vAlign=top><a href=''><strong class='nomeprod'>$nomeprod[$i]</strong><br>
                  <span class='descrprod'>$descres[$i]</span></a></TD>
          </TR>
          <TR align=middle>
            <TD align='center'><a href=''><IMG  src='resizer.php?percent=1&imgfile=images_prod/$imgname[$i]'  border=0></a></TD>
          </TR>
          <TR align=middle>
            <TD align='center'><span class='preco1'><B>1+6 de R$ $preco_p[$i]</B></span><B><br>
                  <span class='preco2'>a vista R$ $preco_v[$i]</span></B></TD>
          </TR>
          <TR align=middle>
            <TD align='center'><a href=''></a></TD>
          </TR>
        </TBODY>
      </TABLE></TD>
		");
		 $i=$i+1;
	echo("

      <TD width=1 bgColor=#d1d1d1><IMG height=1 
            src='_spacer.gif' width=1></TD>
      <TD vAlign=top width='25%'><TABLE cellSpacing=0 cellPadding=4 width='100%' border=0>
        <TBODY>
          <TR align=middle>
            <TD height='60' align='center' vAlign=top><a href=''><strong class='nomeprod'>$nomeprod[$i]</strong><br>
                  <span class='descrprod'>$descres[$i]</span></a></TD>
          </TR>
          <TR align=middle>
            <TD align='center'><a href=''><IMG  src='resizer.php?percent=1&imgfile=images_prod/$imgname[$i]'  border=0></a></TD>
          </TR>
          <TR align=middle>
            <TD align='center'><span class='preco1'><B>1+6 de R$ $preco_p[$i]</B></span><B><br>
                  <span class='preco2'>a vista R$ $preco_v[$i]</span></B></TD>
          </TR>
          <TR align=middle>
            <TD align='center'><a href=''></a></TD>
          </TR>
        </TBODY>
      </TABLE></TD>
		");
		 $i=$i+1;
	echo("

      <TD width=1 bgColor=#d1d1d1><IMG height=1 
            src='_spacer.gif' width=1></TD>
      <TD vAlign=top width='25%'><TABLE cellSpacing=0 cellPadding=4 width='100%' border=0>
        <TBODY>
          <TR align=middle>
            <TD height='60' align='center' vAlign=top><a href=''><strong class='nomeprod'>$nomeprod[$i]</strong><br>
                  <span class='descrprod'>$descres[$i]</span></a></TD>
          </TR>
          <TR align=middle>
            <TD align='center'><a href=''><IMG  src='resizer.php?percent=1&imgfile=images_prod/$imgname[$i]'  border=0></a></TD>
          </TR>
          <TR align=middle>
            <TD align='center'><span class='preco1'><B>1+6 de R$ $preco_p[$i]</B></span><B><br>
                  <span class='preco2'>a vista R$ $preco_v[$i]</span></B></TD>
          </TR>
          <TR align=middle>
            <TD align='center'><a href=''></a></TD>
          </TR>
        </TBODY>
      </TABLE></TD>
    </TR>
    <TR bgColor=#d1d1d1>
      <TD bgColor=#d1d1d1 colSpan=7 height=1><IMG height=1 
            src='_spacer.gif' width=119></TD>
    </TR>

");


	}//FOR


echo("  
	</TBODY>
</TABLE>

");