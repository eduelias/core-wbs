<? header ('Content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?

	$bd = new bd();
	
	$res = $bd->gera_array('CONVERT(nome USING "utf8") as nome,IFNULL(cnpj,cpf) as doc,ie,CONVERT(endereco USING "latin1") as endereco,estado,cidade,tel1,bairro,cep from v_rma_pct,clientenovo where v_rma_pct.short_desc = clientenovo.codcliente and v_rma_pct.idrmapct = '.$_GET[id]); 
	
	#pre($bd->get_sql());
	
	$nome = htmlentities($res[0][nome]);
	$endereco = htmlentities($res[0][endereco]);
	$cnpj_cpf = htmlentities($res[0][doc]);
	$ie = htmlentities($res[0][ie]);
	$estado = htmlentities($res[0][estado]);
	$cidade = htmlentities($res[0][cidade]);
	$telefone = htmlentities($res[0][tel1]);
	$bairro = htmlentities($res[0][bairro]);
	$cep = htmlentities($res[0][cep]);
	
	$string = 'v_rma.idrma as ID, 
	(select CONCAT(LPAD(nf_e,6,"0")," de ",DATE_FORMAT(data_nf_e,"%d-%m-%Y")) as nf from v_rma,v_rma_pct,v_rma_pctrma where v_rma_pctrma.idrma = v_rma.idrma and v_rma_pctrma.idrmapct = v_rma_pct.idrmapct and v_rma_pct.tipo = 2 and v_rma.idrma = ID group by nf) as nf,
	IF(codprod_tcliente=0,v_rma.codprod,codprod_tcliente) as codprod,
	count(v_rma.codprod) as quant,
	nomeprod,
	preco_in as valor_unitario,
	ROUND((count(v_rma.codprod)*preco_in),2) as tot,
	preco_icms,
	preco_ipi 
	from v_rma,
		v_rma_pct,
		v_rma_pctrma,
		produtos 
	where 
		v_rma.idrma = v_rma_pctrma.idrma 
	and v_rma_pct.idrmapct = v_rma_pctrma.idrmapct 
	and IF(v_rma.codprod_tcliente<>0,v_rma.codprod_tcliente,v_rma.codprod)= produtos.codprod
	and v_rma_pct.idrmapct ='.$_GET[id].' GROUP BY preco_in,codprod_tcliente';
	
	$sql = ereg_replace("[\r\t\n]",' ',$string);
	$prods = $bd->gera_array($sql);
	
?>
<base target="_top">
<style type="text/css">
  

/* default css */

table {
  font-size: 1em;
  line-height: inherit;
  border-collapse: collapse;
}


tr {
  
  text-align: left;
  
}


div, address, ol, ul, li, option, select {
  margin-top: 0px;
  margin-bottom: 0px;
}

p {
  margin: 0px;
}


pre {
  font-family: Courier New;
  white-space: pre-wrap;
  margin:0;
}

body {
  margin: 6px;
  padding: 0px;
  font-family: Verdana, sans-serif;
  font-size: 10pt;
  background-color: #ffffff;
}


img {
  -moz-force-broken-image-icon: 1;
}

@media screen {
  html.pageview {
    background-color: #f3f3f3 !important;
  }

  

  body {
    min-height: 1100px;
    
    counter-reset: __goog_page__;
  }
  * html body {
    height: 1100px;
  }
  .pageview body {
    border-top: 1px solid #ccc;
    border-left: 1px solid #ccc;
    border-right: 2px solid #bbb;
    border-bottom: 2px solid #bbb;
    width: 648px !important;
    margin: 15px auto 25px;
    padding: 40px 50px;
  }
  /* IE6 */
  * html {
    overflow-y: scroll;
  }
  * html.pageview body {
    overflow-x: auto;
  }
  /* Prevent repaint errors when scrolling in Safari. This "Star-7" css hack
     targets Safari 3.1, but not WebKit nightlies and presumably Safari 4.
     That's OK because this bug is fixed in WebKit nightlies/Safari 4 :-). */
  html*#wys_frame::before {
    content: '\A0';
    position: fixed;
    overflow: hidden;
    width: 0;
    height: 0;
    top: 0;
    left: 0;
  }
  
  

  
    .writely-callout-data {
      display: none;
      *display: inline-block;
      *width: 0;
      *height: 0;
      *overflow: hidden;
    }
    .writely-footnote-marker {
      background-image: url('MISSING');
      background-color: transparent;
      background-repeat: no-repeat;
      width: 7px;
      overflow: hidden;
      height: 16px;
      vertical-align: top;

      
      -moz-user-select: none;
    }
    .editor .writely-footnote-marker {
      cursor: move;
    }
    .writely-footnote-marker-highlight {
      background-position: -15px 0;
      -moz-user-select: text;
    }
    .writely-footnote-hide-selection ::-moz-selection, .writely-footnote-hide-selection::-moz-selection {
      background: transparent;
    }
    .writely-footnote-hide-selection ::selection, .writely-footnote-hide-selection::selection {
      background: transparent;
    }
    .writely-footnote-hide-selection {
      cursor: move;
    }

    
    .editor .writely-comment-yellow {
      background-color: #FF9;
      background-position: -240px 0;
    }
    .editor .writely-comment-yellow-hover {
      background-color: #FF0;
      background-position: -224px 0;
    }
    .editor .writely-comment-blue {
      background-color: #C0D3FF;
      background-position: -16px 0;
    }
    .editor .writely-comment-blue-hover {
      background-color: #6292FE;
      background-position: 0 0;
    }
    .editor .writely-comment-orange {
      background-color: #FFDEAD;
      background-position: -80px 0;
    }
    .editor .writely-comment-orange-hover {
      background-color: #F90;
      background-position: -64px 0;
    }
    .editor .writely-comment-green {
      background-color: #99FBB3;
      background-position: -48px 0;
    }
    .editor .writely-comment-green-hover {
      background-color: #00F442;
      background-position: -32px 0;
    }
    .editor .writely-comment-cyan {
      background-color: #CFF;
      background-position: -208px 0;
    }
    .editor .writely-comment-cyan-hover {
      background-color: #0FF;
      background-position: -192px 0;
    }
    .editor .writely-comment-purple {
      background-color: #EBCCFF;
      background-position: -144px 0;
    }
    .editor .writely-comment-purple-hover {
      background-color: #90F;
      background-position: -128px 0;
    }
    .editor .writely-comment-magenta {
      background-color: #FCF;
      background-position: -112px 0;
    }
    .editor .writely-comment-magenta-hover {
      background-color: #F0F;
      background-position: -96px 0;
    }
    .editor .writely-comment-red {
      background-color: #FFCACA;
      background-position: -176px 0;
    }
    .editor .writely-comment-red-hover {
      background-color: #FF7A7A;
      background-position: -160px 0;
    }

    .editor .writely-comment-marker {
      background-image: url('MISSING');
      background-color: transparent;
      padding-right: 11px;
      background-repeat: no-repeat;
      width: 16px;
      height: 16px;
      -moz-user-select: none;
    }

    .editor .writely-comment-hidden {
      padding: 0;
      background: none;
    }
    .editor .writely-comment-marker-hidden {
      background: none;
      padding: 0;
      width: 0;
    }
    .editor .writely-comment-none {
      opacity: .2;
      filter:progid:DXImageTransform.Microsoft.Alpha(opacity=20);
      -moz-opacity: .2;
    }
    .editor .writely-comment-none-hover {
      opacity: .2;
      filter:progid:DXImageTransform.Microsoft.Alpha(opacity=20);
      -moz-opacity: .2;
    }
  


  
  .br_fix br:not(:-moz-last-node):not(:-moz-first-node) {
    
    position:relative;
    
    left: -1ex
    
  }
  
  .br_fix br+br {
    position: static !important
  }

  
  #cb-p-tgt {
    font-size: 8pt;
    padding: .4em;
    font-style: oblique;
    background-color: #FFF1A8;
    border: 1px solid #000;
  }
}

h6 { font-size: 8pt }
h5 { font-size: 8pt }
h4 { font-size: 10pt }
h3 { font-size: 12pt }
h2 { font-size: 14pt }
h1 { font-size: 18pt }

blockquote {padding: 10px; border: 1px #DDD dashed }

.webkit-indent-blockquote { border: none; }

a img {border: 0}

.pb {
  border-width: 0;
  page-break-after: always;
  /* We don't want this to be resizeable, so enforce a width and height
     using !important */
  height: 1px !important;
  width: 100% !important;
}

.editor .pb {
  border-top: 1px dashed #C0C0C0;
  border-bottom: 1px dashed #C0C0C0;
}

div.google_header, div.google_footer {
  position: relative;
  margin-top: 1em;
  margin-bottom: 1em;
}


/* Table of contents */
.editor div.writely-toc {
  background-color: #f3f3f3;
  border: 1px solid #ccc;
}
.writely-toc > ol {
  padding-left: 3em;
  font-weight: bold;
}
ol.writely-toc-subheading {
  padding-left: 1em;
  font-weight: normal;
}
/* IE6 only */
* html writely-toc ol {
  list-style-position: inside;
}
.writely-toc-none {
  list-style-type: none;
}
.writely-toc-decimal {
  list-style-type: decimal;
}
.writely-toc-upper-alpha {
  list-style-type: upper-alpha;
}
.writely-toc-lower-alpha {
  list-style-type: lower-alpha;
}
.writely-toc-upper-roman {
  list-style-type: upper-roman;
}
.writely-toc-lower-roman {
  list-style-type: lower-roman;
}
.writely-toc-disc {
  list-style-type: disc;
}

/* Ordered lists converted to numbered lists can preserve ordered types, and
   vice versa. This is confusing, so disallow it */
ul[type="i"], ul[type="I"], ul[type="1"], ul[type="a"], ul[type="A"] {
  list-style-type: disc;
}

ol[type="disc"], ol[type="circle"], ol[type="square"] {
  list-style-type: decimal;
}

/* end default css */


  /* default print css */
  
  @media print {
    body {
      padding: 0;
      margin: 0;
    }

    div.google_header, div.google_footer {
      display: block;
      min-height: 0;
      border: none;
    }

    div.google_header {
      flow: static(header);
    }

    /* used to insert page numbers */
    div.google_header::before, div.google_footer::before {
      position: absolute;
      top: 0;
    }

    div.google_footer {
      flow: static(footer);
    }

    /* always consider this element at the start of the doc */
    div#google_footer {
      flow: static(footer, start);

    }

    span.google_pagenumber {
      content: counter(page);
    }

    span.google_pagecount {
      content: counter(pages);
    }


    callout.google_footnote {
      
      display: prince-footnote;
      footnote-style-position: inside;
      /* These styles keep the footnote from taking on the style of the text
         surrounding the footnote marker. They can be overridden in the
         document CSS. */
      color: #000;
      font-family: Times New Roman;
      font-size: 12.0pt;
      font-weight: normal;
    }

    /* Table of contents */
    #WritelyTableOfContents a::after {
      content: leader('.') target-counter(attr(href), page);
    }

    #WritelyTableOfContents a {
      text-decoration: none;
      color: black;
    }
  }

  @page {
    @top {
      content: flow(header);
    }
    @bottom {
      content: flow(footer);
    }
    @footnotes {
      border-top: solid black thin;
      padding-top: 8pt;
    }
  }
  /* end default print css */


/* custom css */


/* end custom css */

/* ui edited css */

body {
  font-family: Times New Roman;
  
  font-size: 12.0pt;
  line-height: normal;
  background-color: #ffffff;
}
/* end ui edited css */


/* editor CSS */
.editor a:visited {color: #551A8B}
.editor table.zeroBorder {border: 1px solid}
.editor table.zeroBorder td {border: 1px solid}
.editor table.zeroBorder th {border: 1px solid}


.editor div.google_header, .editor div.google_footer {
  border: 2px #DDDDDD dashed;
  position: static;
  width: 100%;
  min-height: 2em;
}

.editor .misspell {background-color: yellow}

.editor .writely-comment {
  font-size: 9pt;
  line-height: 1.4;
  padding: 1px;
  border: 1px dashed #C0C0C0
}


/* end editor CSS */

</style>

  
  <title>NOTA FISCAL - MODELO</title>

</head>

<body class="editor br_fix">
    
    
    
<div class=Section1>
  <table cellpadding=0 cellspacing=0 class=zeroBorder style=" MARGIN-LEFT:0pt; WIDTH:507.5pt" width=677>
    <tr>
      <td colspan=4 style=" VERTICAL-ALIGN:top" width=677>
        <table width="675" cellpadding=0 cellspacing=0 class=zeroBorder style=" MARGIN-LEFT:0pt">
          <tr>
            <td width=192 height="118" valign="middle" align="center" style="VERTICAL-ALIGN:middle">
            <span style="FONT-FAMILY:'Verdana'"><b><font size=2>RMA PCT: <?=$_GET['id']?></font></b></span></p>
            </td>

            <td style=VERTICAL-ALIGN:top width=304>
              <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center">
                <span style="FONT-FAMILY:'Verdana'"><b><font size=2>INDUSTRIA DE EQUIPAMENTOS DE INFORMÁTICA LTDA</font></b></span>              </p>
              <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center">
                <span style="FONT-FAMILY:'Verdana'"><font size=1>AV. RIO BRANCO, 870 – SL 5</font></span>              </p>
              <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center">
                <span style="FONT-FAMILY:'Verdana'"><font size=1>CENTRO – JUIZ DE FORA - MG</font></span>              </p>
              <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center">
                <span style="FONT-FAMILY:'Verdana'"><font size=1>CEP 36035-000 – TELEFAX (32) 3215-6663</font></span></p>            </td>
            <td style="VERTICAL-ALIGN:top" width=161>
              <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
                <span style="FONT-FAMILY:'Verdana'"><b><font size=1>NOTA FISCAL MOD. 1</font></b></span>              </p>
              <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
                <span style="FONT-FAMILY:'Verdana'"><font size=2>&nbsp; </font></span><span style="FONT-FAMILY:'Symbol'"><b><font size=2></font></b></span><span style="FONT-FAMILY:'Verdana'"><font size=1> SAIDA&nbsp; </font></span><span style="FONT-FAMILY:'Symbol'"><b><font size=2></font></b></span> <span style="FONT-FAMILY:'Verdana'"><font size=1>ENTRADA</font></span>              </p>
              <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
                <br>
                <span style="FONT-FAMILY:'Verdana'"><font size=2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font></span><span style="FONT-FAMILY:'Verdana'"><b><font size=3>Nº.</font></b></span>              </p>            </td>
          </tr>
        </table>

        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
          <span style="FONT-FAMILY:'Verdana'"><font size=2>&nbsp;</font></span>        </p>
        <table cellpadding=0 cellspacing=0 class=zeroBorder style=" MARGIN-LEFT:371pt; WIDTH:126pt">
          <tr>
            <td class="writely-comment-cyan" style=" VERTICAL-ALIGN:top">
              <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
            <span style="FONT-FAMILY:'Verdana'"><b><font size=1>CNPJ</font></b></span></p>
              <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"><br>
            </p></td>
          </tr>
        </table>      </td>
    </tr>
    <tr style=HEIGHT:22.75pt>
      <td style=" VERTICAL-ALIGN:top" width=209>
        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
          <span style="FONT-FAMILY:'Verdana'"><b><font size=1>NATUREZA DA OPERAÇÃO</font></b></span><br>
      <span style="FONT-FAMILY:'Verdana'"><font size=1>RETORNO DE REMESSA PARA TROCA EM GARANTIA</font></span></p>      </td>
      <td width=60 class="writely-comment-cyan" style=" VERTICAL-ALIGN:top">
        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
          <span style="FONT-FAMILY:'Verdana'"><b><font size=1>CFOP</font></b></span><br>
      </p>      </td>

      <td style=" VERTICAL-ALIGN:top" width=228>
        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
          <span style="FONT-FAMILY:'Verdana'"><b><font size=1>INSC.ESTADUAL DO SUBSTITUTO TRIBUTÁRIO</font></b></span>        </p>      </td>
      <td width=180 class="writely-comment-cyan" style=" VERTICAL-ALIGN:top">
        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
          <span style="FONT-FAMILY:'Verdana'"><b><font size=1>INSCRIÇÃO ESTADUAL</font></b></span><br>
        </p>      </td>
    </tr>
  </table>
  <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
  <span style="FONT-FAMILY:'Verdana'"><b><font size=1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></b></span></p>
  <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">&nbsp;</p>
  <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"><span style="FONT-FAMILY:'Verdana'"><b><font size=1>DESTINATÁRIO/REMETENTE</font></b></span>
    
  </p>
  <table cellpadding=0 cellspacing=0 class=zeroBorder style=" MARGIN-LEFT:0pt; WIDTH:507.5pt" width=677>
    <tr>
      <td colspan=3 style=" VERTICAL-ALIGN:top"><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>NOME / RAZ&Atilde;O SOCIAL</font></b></span><br>
          <span style="FONT-FAMILY:'Verdana'"><font size=1>
          <?=$nome?>
          </font></span><br>
      </p></td>
      <td colspan=3 style=" VERTICAL-ALIGN:top"><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>CNPJ / CPF</font></b></span><br>
          <span style="FONT-FAMILY:'Verdana'"><font size=1>
          <?=$cnpj_cpf?>
      </font></span> </p></td>
      <td style=" VERTICAL-ALIGN:top" width=110><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>DATA DA EMISS&Atilde;O</font></b></span> </p>
        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><font size=1>&nbsp;</font></span> </p></td>
    </tr>
    <tr>
      <td colspan=2 style=" VERTICAL-ALIGN:top"><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>ENDERE&Ccedil;O</font></b></span>
        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"><span style="FONT-FAMILY:'Verdana'"><font size=1>
          <?=$endereco?>
      </font></span></p></td>
      <td colspan=3 style=" VERTICAL-ALIGN:top"><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>BAIRRO / DISTRITO</font></b></span><br>
          <span style="FONT-FAMILY:'Verdana'"><font size=1>
          <?=$bairro?>
      </font></span> </p></td>
      <td style=" VERTICAL-ALIGN:top" width=153><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>CEP</font></b></span><br>
          <span style="FONT-FAMILY:'Verdana'"><font size=1>
          <?=$cep?>
      </font></span> </p></td>
      <td style=" VERTICAL-ALIGN:top" width=110><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>DATA DA SAIDA / ENTREGA</font></b></span> </p>
        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>&nbsp;</font></b></span> </p>
        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>&nbsp;</font></b></span> </p></td>
    </tr>
    <tr>
      <td style=" VERTICAL-ALIGN:top" width=212><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>MUNICIPIO</font></b></span><br>
          <span style="FONT-FAMILY:'Verdana'"><font size=1>
          <?=$cidade?>
          </font></span><br>
        </p></td>
      <td colspan=2 style=" VERTICAL-ALIGN:top"><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>FONE / FAX</font></b></span><br>
          <span style="FONT-FAMILY:'Verdana'"><font size=1><?=$telefone?></font></span></p></td>
      <td style=" VERTICAL-ALIGN:top" width=86><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"><span style="FONT-FAMILY:'Verdana'"><b><font size=1>UF</font></b></span>
          <br><span style="FONT-FAMILY:'Verdana'"><font size=1><?=$estado?></font></span></p>
      </td>
      <td colspan=2 style=" VERTICAL-ALIGN:top"><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>INSCRI&Ccedil;&Atilde;O ESTADUAL</font></b></span> </p>
        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><font size=1>
          <?=$ie?>
      </font></span> </p></td>
      <td style=" VERTICAL-ALIGN:top" width=110><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>HORA DA SAÍDA</font></b></span> </p></td>
    </tr>
  </table>
  <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font></b></span></p>
  <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"><span style="FONT-FAMILY:'Verdana'"><b><font size=1>DADOS DO PRODUTO</font></b></span> </p>
  <table cellpadding=0 cellspacing=0 class=zeroBorder style=" MARGIN-LEFT:0pt; WIDTH:507.5pt" width=677>
    <tr style=HEIGHT:9pt>
      <td rowspan=2 style=" VERTICAL-ALIGN:top" width=53><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>C&Oacute;DIGO</font></b></span> </p></td>
      <td rowspan=2 style=" VERTICAL-ALIGN:top" width=240><h3 style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>DESCRI&Ccedil;&Atilde;O DOS PRODUTOS</font></b></span> </h3></td>
      <td rowspan=2 style=" VERTICAL-ALIGN:top" width=24><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>C.F. </font></b></span> </p></td>
      <td rowspan=2 style=" VERTICAL-ALIGN:top" width=32><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>CST</font></b></span> </p></td>
      <td rowspan=2 style=" VERTICAL-ALIGN:top" width=36><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>UNID</font></b></span> </p></td>
      <td rowspan=2 style=" VERTICAL-ALIGN:top" width=52><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>QUANT.</font></b></span> </p></td>
      <td rowspan=2 style=" VERTICAL-ALIGN:top" width=60><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>VALOR UNIT&Aacute;RIO</font></b></span> </p></td>
      <td rowspan=2 style=" VERTICAL-ALIGN:top" width=60><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>VALOR TOTAL</font></b></span> </p></td>
      <td colspan=2 style=" VERTICAL-ALIGN:top" width=71><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>ALIQUOTAS </font></b></span> </p></td>
      <td rowspan=2 style=" VERTICAL-ALIGN:top" width=49><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>VALOR DO IPI</font></b></span> </p></td>
    </tr>
    <tr style=HEIGHT:7.3pt>
      <td style=" VERTICAL-ALIGN:top" width=41><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>ICMS</font></b></span> </p></td>
      <td style=" VERTICAL-ALIGN:top" width=30><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>IPI</font></b></span> </p></td>
    </tr>
    <? 
	foreach ($prods as $k => $v) { 
		$nfs .= ($v[nf]!=$nf_ant)?'RMA: NF '.$v[nf].'<br>':'';
		$ip = (($v[quant]*$v[valor_unitario])*($v[preco_ipi]/100));
		$icm = (($v[quant]*$v[valor_unitario])*($v[preco_icms]/100));
		$total += $v[tot];
		$total_icm += $icm;
		$total_ipi += $ip;
		$nf_ant = $v[nf];
	?>
    <tr>
      <td style=" VERTICAL-ALIGN:top" width=53>
      	<p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> 
        	<span style="FONT-FAMILY:'Verdana'">
            	<font size=1><?=$v[codprod]?></font>
            </span> 
        </p>
      </td>
      <td style=" VERTICAL-ALIGN:top" width=240>
      	<p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
        	<span style="FONT-FAMILY:'Verdana'">
                <b>
                    <font size=1><?=htmlentities($v[nomeprod])?></font>
                </b>
         	</span>
        </p>
      </td>
      <td style=" VERTICAL-ALIGN:top" width=24>
      	<p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> 
        	<span style="FONT-FAMILY:'Verdana'">
            	<font size=1>-</font>
            </span> 
         </p>
      </td>
      <td style=" VERTICAL-ALIGN:top" width=32>
      	<p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> 
        	<span style="FONT-FAMILY:'Verdana'">
            	<font size=1>-</font>
            </span> 
        </p>
      </td>
      <td style=" VERTICAL-ALIGN:top" width=36>
      	<p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> 
        	<span style="FONT-FAMILY:'Verdana'">
            	<font size=1>UN</font>
            </span> 
        </p>
      </td>
      <td style=" VERTICAL-ALIGN:top" width=52>
      	<p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> 
        	<span style="FONT-FAMILY:'Verdana'">
            	<font size=1><?=$v[quant]?></font>
            </span> 
        </p>
      </td>
      <td style=" VERTICAL-ALIGN:top" width=60>
      	<p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> 
        	<span style="FONT-FAMILY:'Verdana'">
            	<font size=1><?=$v[valor_unitario]?></font>
            </span> 
        </p>
      </td>
      <td style=" VERTICAL-ALIGN:top" width=60>
      	<p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> 
        	<span style="FONT-FAMILY:'Verdana'">
            	<font size=1><?=$v[tot]?></font>
            </span> 
        </p>
      </td>
      <td style=" VERTICAL-ALIGN:top" width=41>
      	<p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> 
        	<span style="FONT-FAMILY:'Verdana'">
            	<font size=1><?=$v[preco_icms]?></font>
            </span> 
        </p>
      </td>
      <td style=" VERTICAL-ALIGN:top" width=30>
      	<p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> 
        	<span style="FONT-FAMILY:'Verdana'">
            	<font size=1><?=$v[preco_ipi]?></font>
            </span> 
        </p>
      </td>
      <td style=" VERTICAL-ALIGN:top" width=49>
      	<p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> 
        	<span style="FONT-FAMILY:'Verdana'">
            	<font size=1><?=number_format($ip,2,',','.')?></font>
            </span> 
        </p>
      </td>
    </tr>
    <? } //ENDFOREACH ?>
<!--    <tr><td colspan="11">&nbsp;</td></tr>
    <tr><td colspan="11">&nbsp;</td></tr>-->
  </table>
  
  
  
  <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></b></span></p>
  <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">&nbsp;</p>
  <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"><span style="FONT-FAMILY:'Verdana'"><b><font size=1>C&Aacute;LCULO DO IMPOSTO</font></b></span> </p>
  <table cellpadding=0 cellspacing=0 class=zeroBorder style=" MARGIN-LEFT:0pt; WIDTH:504.4pt" width=673>
    <tr>
      <td style=" VERTICAL-ALIGN:top" width=141><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>BASE DE CALCULO DO ICMS</font></b></span> </p>
      <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><font size=1>-</font></span> </p></td>
      <td style=" VERTICAL-ALIGN:top" width=102><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>VALOR DO ICMS</font></b></span> </p><br>
      <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><font size=1><?=number_format($total_icm,2,',','.')?></font></span> </p></td>
      <td style=" VERTICAL-ALIGN:top" width=119><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>BASE DE CALCULO DO ICMS SUBSTITUI&Ccedil;&Atilde;O</font></b></span> </p>
      <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>-</font></b></span> </p></td>
      <td style=" VERTICAL-ALIGN:top" width=138><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>VALOR DO ICMS SUBSTITUI&Ccedil;&Atilde;O</font></b></span> </p>
      <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>-</font></b></span> </p></td>
      <td style=" VERTICAL-ALIGN:top" width=171><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>VALOR TOTAL DOS PRODUTOS</font></b></span> </p>
      <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><font size=1><?=number_format($total,2,',','.')?></font></span> </p></td>
    </tr>
    <tr>
      <td style=" VERTICAL-ALIGN:top" width=141><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>VALOR DO FRETE</font></b></span> </p>
      <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>-</font></b></span> </p></td>
      <td style=" VERTICAL-ALIGN:top" width=102><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>VALOR DO SEGURO</font></b></span> </p>
      <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>-</font></b></span> </p></td>
      <td style=" VERTICAL-ALIGN:top" width=119><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>OUTRAS DESPESAS</font></b></span> </p>
      <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>-</font></b></span> </p></td>
      <td style=" VERTICAL-ALIGN:top" width=138><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>VALOR TOTAL DO IPI</font></b></span> </p>
      <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><font size=1><?=number_format($total_ipi,2,',','.')?></font></span> </p></td>
      <td style=" VERTICAL-ALIGN:top" width=171><p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"> <span style="FONT-FAMILY:'Verdana'"><b><font size=1>VALOR TOTAL DA NOTA</font></b></span> </p>
      <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt; TEXT-ALIGN:center"> <span style="FONT-FAMILY:'Verdana'"><font size=1><?=number_format($total+$total_ipi,2,',','.')?></font></span> </p></td>
    </tr>
  </table>
  <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
  <span style="FONT-FAMILY:'Verdana'"><b><font size=1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font></b></span></p>
  <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">&nbsp;</p>
  <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt"><span style="FONT-FAMILY:'Verdana'"><b><font size=1>DADOS ADICIONAIS</font></b></span>
  </p>
  <table cellpadding=0 cellspacing=0 class=zeroBorder style=" MARGIN-LEFT:0pt; WIDTH:507.5pt" width=677>

    <tr>
      <td style=" VERTICAL-ALIGN:top" width=55 align="center">
        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
          <span style="FONT-FAMILY:'Verdana'"><b><font size=7>0</font></b></span>
        </p>
      </td>
      <td style=" VERTICAL-ALIGN:top" width=380>
        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">

          <span style="FONT-FAMILY:'Verdana'"><b><font size=1>INFORMAÇÕES COMPLEMENTARES</font></b></span>
        </p>
        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
          <span style="FONT-FAMILY:'Verdana'"><font size=1>
          	<?=$nfs?>
          </font></span> </p>
        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
          <span style="FONT-FAMILY:'Verdana'"><font size=1>&nbsp;</font></span>
        </p>
      </td>
      <td style=" VERTICAL-ALIGN:top" width=241>
        <p style=" MARGIN-LEFT:0pt; MARGIN-RIGHT:0pt">
          <span style="FONT-FAMILY:'Verdana'"><b><font size=1>RESERVADO AO FISCO</font></b></span>

        </p>
      </td>
    </tr>
  </table>
  </div>
</body>

</html>