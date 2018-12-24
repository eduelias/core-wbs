<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     padrao.class.php
+--------------------------------------------------------------
*/


class Padrao
{

    var $conn ;
    var $result_db;

    function connect_wbs()
    {
        global $conn_db;
        $this->conn = $conn_db;
        if (!$this->conn) die("Connection failed");
        $this->conn->debug = false;
        $this->conn->Connect(WBS_SERVER, WBS_USER, WBS_PASSWORD, WBS_DB);

    } //function
    
     function connect_data()
    {
        global $conn_db;
        $this->conn = $conn_db;
        if (!$this->conn) die("Connection failed");
        $this->conn->debug = false;
        $this->conn->Connect(DATA_SERVER, DATA_USER, DATA_PASSWORD, DATA_DB);

    } //function
	
	
	 function connect_mod3()
    {
        global $conn_db;
        $this->conn = $conn_db;
        if (!$this->conn) die("Connection failed");
        $this->conn->debug = false;
        $this->conn->Connect(MOD3_SERVER, MOD3_USER, MOD3_PASSWORD, MOD3_DB);

    } //function
    
     function connect_ipa()
    {
        global $conn_db;
        $this->conn = $conn_db;
        if (!$this->conn) die("Connection failed");
        $this->conn->debug = false;
        $this->conn->Connect(IPA_SERVER, IPA_USER, IPA_PASSWORD, IPA_DB);

    } //function
    
     function disconnect()
    {
        $this->conn->Close;

    } //function
    
    // RETORNA ERROS NO BD
      function retorno_db($rs, $show = "S")
    {

        if (!$rs){

            echo '
       
            <br>
            <table  border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td style="color: #EA0000; background-color: #FFE1E1; padding: 10px; border: 1px solid #EA0000; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; margin: 5px;"><b>Ocorreu um erro:</b><hr size="1" noshade color="#EA0000">'.$this->conn->ErrorMsg().'</td>
            </tr>
            </table>
            ';

      }else{

            if ($show == "S"){
             echo '
       
            <br>
            <table  border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td style="font-weight: bold; color: #009900; background-color: #DFFFDF; padding: 10px; border: 1px solid #009900; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; margin: 5px;">Operação executada com sucesso</td>
            </tr>
            </table>
        ';
            }
      }
       

    } //function
    
    
      function query_db ($query_db, $tipo = "SQL_NONE", $show_erro)
    {

        switch ($tipo) {
            case SQL_ARRAY:
                 // get all the records
                $rs = $this->conn->Execute($query_db);
                $this->retorno_db($rs, $show_erro);
                $result = $rs->GetArray();

                break;
            case SQL_NONE:
            default:
                // records will be looped over with next()
                $result = $this->conn->Execute($query_db);
                $this->retorno_db($result, $show_erro);

                break;
        }
        return $result;
    } //function
    
    //FORMATA PREÇO (BR)
    function fvalor($preco)
    {
        $pnew = number_format($preco,2,',','.');

        return $pnew;
    }//function
    
    //FORMATA PREÇO PARA O BANCO DE DADOS (BR)
    function fvalorbd($preco)
    {
        $pnew = str_replace('.','',$preco);
        $pnew = str_replace(',','.',$pnew);

        return $pnew;
    }//function
    
    // maiuscular e vice-versa
    function format_str ($formato, $str)
    {
        if ($formato == "UP")
        {
            $str = strtoupper($str);
        } //if
        if ($formato == "DOWN")
        {
            $str = strtolower($str);
        } //if
        if ($formato == "FIRT")
        {
            $str = ucfirst(strtolower($str));
        } //if
        
        return $str;
    } //function
    
    /*
    +--------------------------------------------------------------
    |  Função:  titulador()
    +--------------------------------------------------------------
    |  titulador(COR, TITULO)
    +--------------------------------------------------------------
    */
    function titulador($cor, $titulo, &$bg_cor, &$bg_cor_light)
    {
        switch ($cor)
        {
            case "amarelo" :
                $bg_cor = "#F6C710";
                $bg_cor_light = "#FDF9E3";
            break;
            
            case "azul" :
                $bg_cor = "#3775CA";
                $bg_cor_light = "#E4EDF8";
            break;
            
            case "verde" :
                $bg_cor = "#66A736";
                $bg_cor_light = "#E4F3DA";
            break;
            
            case "vermelho" :
                $bg_cor = "#EA0000";
                $bg_cor_light = "#FFF4F4";
            break;
        }

        $titulo = strtoupper($titulo);
        
        for ($i = 0 ;$i < strlen($titulo) ; $i++)
        {
            $character = $titulo{$i};
            $character = $character == "@" ? "arroba" : $character;
            $character = $character == "/" ? "barra1" : $character;
            $character = $character == "|" ? "barra3" : $character;
            $character = $character == "{" ? "chaves1" : $character;
            $character = $character == "}" ? "chaves3" : $character;
            $character = $character == "$" ? "dolar" : $character;
            $character = $character == "&" ? "ecomercial" : $character;
            $character = $character == "!" ? "exclamacao" : $character;
            $character = $character == "?" ? "interrogacao" : $character;
            $character = $character == "=" ? "igual" : $character;
            $character = $character == "<" ? "menorque" : $character;
            $character = $character == ">" ? "maiorque" : $character;
            $character = $character == "%" ? "porcentagem" : $character;
            $character = $character == "+" ? "soma" : $character;
            $character = $character == "-" ? "subtracao" : $character;
            $character = $character == "_" ? "sublinhado" : $character;
            $character = $character == "*" ? "sustenido" : $character;
            $character = $character == "#" ? "tralha" : $character;
            $character = $character == " " ? "espaco" : $character;
            $character = $character == "." ? "ponto" : $character;
            $character = $character == ";" ? "pontovirgula" : $character;
            $character = $character == "," ? "virgula" : $character;
            $character = $character == ":" ? "doispontos" : $character;
            $character = $character == "(" ? "parenteses1" : $character;
            $character = $character == ")" ? "parenteses2" : $character;
            $character = $character == "À" ? "A1" : $character;
            $character = $character == "Á" ? "A2" : $character;
            $character = $character == "Â" ? "A3" : $character;
            $character = $character == "Ã" ? "A4" : $character;
            $character = $character == "Ç" ? "C1" : $character;
            $character = $character == "É" ? "E1" : $character;
            $character = $character == "Ê" ? "E2" : $character;
            $character = $character == "Ó" ? "O1" : $character;
            $character = $character == "Õ" ? "O2" : $character;
            $character = $character == "Ô" ? "O3" : $character;
            $character = $character == "Ú" ? "U1" : $character;
            $character = $character == "Í" ? "I1" : $character;
            
            $alt = htmlspecialchars($titulo{$i});
            
            $output .= "<img src='".DIR_IMAGES."/titulador/" . $cor . "/" . $character . ".gif' alt='".$alt."' />";
        }
        
        $return = "
            <table width='100%'  border='0' cellspacing='2' cellpadding='0'>
              <tr>
                <td width='25' height='21' rowspan='2'><img src='".DIR_IMAGES."/titulador/" . $cor . "/ind.gif' /></td>
                <td>" . $output . "</td>
              </tr>
              <tr>
                <td bgcolor='" . $bg_cor . "'><img src='".DIR_IMAGES."/spacer.gif' width='2' height='2'></td>
              </tr>
            </table>
        ";
        
        echo $return;
    }

    /*
    +--------------------------------------------------------------
    |  Função:  voltar()
    +--------------------------------------------------------------
    |  voltar(COR, PG)
    +--------------------------------------------------------------
    */
    function voltar($cor, $pg, $parametro = NULL)
    {
        $return = "
            <table width='100%' border='0' cellspacing='2' cellpadding='2'>
              <tr>
                <td align='right'><a href='$PHP_SELF?pg=$pg$parametro'><img border='0' src='".DIR_IMAGES."/titulador/" . $cor . "/voltar.gif' /></a></td>
              </tr>
            </table>
        ";
        
        echo $return;
    }


    /*
    +--------------------------------------------------------------
    |  Função:  botao()
    +--------------------------------------------------------------
    |  botao(cor, titulo, target, parametro, altura, largura)
    +--------------------------------------------------------------
    */
    function botao($cor, $titulo, $target, $parametro, $altura, $largura)
    {
        switch ($target)
        {
        	case "popup":
        		$link = "<a href='javascript:void(0);' class='linkbotaoespecial' onclick=\"window.open('$PHP_SELF?$parametro','botao_popup','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no,width=$largura,height=$altura,left=50,top=50')\">";
        		break;
        	case "blank":
        		$link = "<a href='$PHP_SELF?$parametro' class='linkbotaoespecial' target='_blank'>";
        		break;
        	case "self":
        		$link = "<a href='$PHP_SELF?$parametro' class='linkbotaoespecial' target='_self'>";
        		break;
        	case "parent":
        		$link = "<a href='$PHP_SELF?$parametro' class='linkbotaoespecial' target='_parent'>";
        		break;
        	default:
        		$link = "<a href='$PHP_SELF?$parametro' class='linkbotaoespecial'>";
        		break;
        }
        $return = "
        <table border='0' cellpadding='0' cellspacing='0'>
          <tr>
           <td>$link<img src='".DIR_IMAGES."/botao/" . $cor . "/botao_pt1.jpg' width='27' height='23' border='0'></a></td>
           <td background='".DIR_IMAGES."/botao/" . $cor . "/botao_pt2.jpg'>$link<b>$titulo</b></a></td>
           <td><img src='".DIR_IMAGES."/botao/" . $cor . "/botao_pt3.jpg' width='11' height='23' border='0'></td>
          </tr>
        </table>
        ";

        echo $return;
    }
    
     // MOSTRA DATA ATUAL
    function datahoraatual ()
    {
        $atual = Date("Y-m-d H:i:s");

        return $atual;

    }
    
    // MOSTRA A CONTA DE DETERMINADO USUARIO
    function func_show_contabco ($codvend)
    {
      $rs1 = $this->query_db("SELECT codconta FROM fin_bcoconta WHERE codvend = '$codvend'", "SQL_NONE", "N");
      $codconta = $rs1->fields[0];
      
      return $codconta;
      
    }
    
    // INSERE MOVIMENTACAO NO BCO
     function func_grava_bcomov ($opcaixa, $codconta ,$valor_bco = 0, $obs, $datamov = NULL)
    {
        #$this->$conn->debug = true;
        global $login;
        if ($datamov == NULL){$datamov = $this->datahoraatual();}
        #$obs = $this->$conn->qstr($obs);

        if($opcaixa){
            $rs2 = $this->query_db("SELECT descricao, bco, hist  FROM formapg WHERE opcaixa = '$opcaixa'", "SQL_NONE", "N");
            $op_descricao = $rs2->fields[0];
            $op_bco = $rs2->fields[1];
            $op_hist = $rs2->fields[2];
            
            if ($valor_bco < 0){$op_bco = "D";}
            if ($op_bco == "C"){$credito = abs($valor_bco);$debito =0;}
            if ($op_bco == "D"){$credito = 0;$debito = abs($valor_bco);}
            if ($op_hist == "S"){$erro=2;}
            
        }else{$erro=1;}//OPCAIXA

        if(!$erro){
            if ($codconta){
                $rs2 = $this->query_db("INSERT INTO fin_bcomov (codconta, opcaixa, descricao, credito, debito, datamov, dataini, consolida, obs, login) VALUES ('$codconta', '$opcaixa', '$op_descricao', '$credito', '$debito', '$datamov', '$datamov', 'N', '$obs', '$login')", "SQL_NONE", "N");
            }else{$erro=1;}//CODCONTA
        }

        //erro = 1 - FALTA DADOS
        //erro = 2 - OPCAIXA HIST

        return $erro;
    } //function
    
   	/// Funcao CALCULA DIAS ENTRE DATAS
	function func_numdias($dataini, $datafim)
    {

		$dataini = str_replace('-','',$dataini);
		$datafim = str_replace('-','',$datafim);

		$anoini = substr($dataini,0,4);
		$mesini = substr($dataini,4,2);
		$diaini = substr($dataini,6,2);

		$anofim = substr($datafim,0,4);
		$mesfim = substr($datafim,4,2);
		$diafim = substr($datafim,6,2);

		$datatini = mktime(0,0,0,$mesini,$diaini,$anoini);
		$datatfim = mktime(0,0,0,$mesfim,$diafim,$anofim);

		$difdias = floor((($datatfim - $datatini)/3600)/24);

	return $difdias;

	}//function
	
	function func_nminutos($dataini, $datafim)
    {

		$dataini = str_replace('-','',$dataini);
		$dataini = str_replace(':','',$dataini);
		$dataini = str_replace(' ','',$dataini);
		$datafim = str_replace('-','',$datafim);
		$datafim = str_replace(':','',$datafim);
		$datafim = str_replace(' ','',$datafim);
		
		$anoini = substr($dataini,0,4);
		$mesini = substr($dataini,4,2);
		$diaini = substr($dataini,6,2);
		$hini = substr($dataini,8,2);
		$mini = substr($dataini,10,2);
		$sini = substr($dataini,12,2);

		$anofim = substr($datafim,0,4);
		$mesfim = substr($datafim,4,2);
		$diafim = substr($datafim,6,2);
		$hfim = substr($datafim,8,2);
		$mfim = substr($datafim,10,2);
		$sfim = substr($datafim,12,2);

		$datatini = mktime($hini,$mini,$sini,$mesini,$diaini,$anoini);
		$datatfim = mktime($hfim,$mfim,$sfim,$mesfim,$diafim,$anofim);
		 
		$dias = floor((($datatfim - $datatini)/3600)/24);
		$h = floor((($datatfim - $datatini)/3600)%24);
		$m = floor((($datatfim - $datatini))/60);
		$s = floor((($datatfim - $datatini)%3600)%60);

		 if (strlen($h)==1){$h = '0'.$h;}
		 if (strlen($m)==1){$m = '0'.$m;}
		 if (strlen($s)==1){$s = '0'.$s;}

		$difhoras = $m;

	return $difhoras;
		
	}
	
	/// Funcao GERA CODBARRA PEDIDO
	function func_codbarra($codemp, $codped, $tipo)
    {
		if ($tipo == "PED"){$h = 789;}
		if ($tipo == "ORC"){$h = 456;}
		if ($tipo == "KIT"){$h = 876;}
		if ($tipo == "OS"){$h = 911;}
		if ($tipo == "OS_AT"){$h = 800;}

		$tam = strlen($codemp);
		$zeros = 2 - $tam;
			for ($i=0;$i<$zeros;$i++){
				 $codemp = "0" . $codemp;
			}

		$tam = strlen($codped);
		$zeros = 7 - $tam;
			for ($i=0;$i<$zeros;$i++){
				 $codped = "0" . $codped;
			}


		$ean = $h.$codemp.$codped;


		// CALCULO DIGITO VERIFICADOR

		 $even=true;
		  for ($i=strlen($ean)-1;$i>=0;$i--){
			if ($even) $esum+=$ean[$i];	else $osum+=$ean[$i];
			$even=!$even;
		  }
		 $dig = (10-((3*$esum+$osum)%10))%10;

		 $codbarra = $ean.$dig;


	return $codbarra;
	}

	// Função descobre método (GET/POST) de uma variável
	// e retorna valor da mesma
	function discover_method($variavel_nome)
	{
	  	/*
		echo "<hr />";
		echo "<b>Variável Nome:</b> $variavel_nome<br />";
	  	echo "<b>GET:</b> ".$_GET[$variavel_nome]."<br />";
	  	echo "<b>POST:</b> ".$_POST[$variavel_nome]."<br />";
	  	echo "<b>SESSION:</b> ".$_SESSION[$variavel_nome]."<br />";
	  	echo "<b>REQUEST:</b> ".$_REQUEST[$variavel_nome]."<br />";
	  	echo "<b>COOKIE:</b> ".$_COOKIE[$variavel_nome]."<br />";
	  	echo "<hr />";
	  	*/
	  	
	  	// SE GET
		if(isset($_GET[$variavel_nome]))
	  	{
		    $variavel_valor = $_GET[$variavel_nome];
		}
		// SE POST
	  	if(isset($_POST[$variavel_nome]))
	  	{
		    $variavel_valor = $_POST[$variavel_nome];
		}
		// SE SESSION
	  	if(isset($_SESSION[$variavel_nome]))
	  	{
		    $variavel_valor = $_SESSION[$variavel_nome];
		}
		// SE REQUEST
	  	if(isset($_REQUEST[$variavel_nome]))
	  	{
		    $variavel_valor = $_REQUEST[$variavel_nome];
		}
		// SE COOKIE
	  	if(isset($_COOKIE[$variavel_nome]))
	  	{
		    $variavel_valor = $_COOKIE[$variavel_nome];
		}
		
		return $variavel_valor;
	}

	function GeraXML($array_pesq){
	
	if ($array_pesq) {
			
		 //XML
		 $xml = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
		 $xml .= "<response>\n";
		
		while (!$array_pesq->EOF) {
			
		    $xml .= "<datareq>\n";
		    for($i = 0 ; $i < $array_pesq->_numOfFields ; $i++) {
			
		    $colum_name = $array_pesq->FetchField($i);
					    	 	
		    $xml .= "<".$colum_name->name.">".$array_pesq->fields[$i]."</".$colum_name->name.">\n";
		    
		    }
		    $xml .= "</datareq>\n";
		    

		    $array_pesq->MoveNext();
		}//WHILE
		
							    
		$xml.= "</response>\n";

		//CABEÇALHO
		Header("Content-type: application/xml; charset=iso-8859-1"); 
				
	}
	
	  #print_r($_GET);
 	return   $xml;
	}

    /*
    +--------------------------------------------------------------
    |  Função:  		MontarAbas()
    |  Data Criação:	26/04/2006
    +--------------------------------------------------------------
    |  Sobre:
    |  Cria abas na cor selecionada com o array de nomes.
    |  MontarAbas(cor, array_nomes_abas)
    +--------------------------------------------------------------
    */
	function MontarAbas($cor, $array_nomes_abas, $array_param_abas, $url_php_self, $target)
	{
	  	$array_abas = explode(":", $array_nomes_abas);
	  	$array_param = explode(":", $array_param_abas);
		
		$qtde_abas = count($array_abas);
	  	
	  	$html_aba = "
	  	<script type='text/javascript'>
		function SysAba(id, base, param, target)
		{
			var theURL = base + \"\";
		
			for (var i = 1; i <= $qtde_abas; i++)
			{
				document.getElementById('aba' + i).className = 'aba';
			}
			document.getElementById(id).className = 'aba_selecionada';
			
			doit(theURL, target, param, 'GET', target);
		}
		</script>";

	  	$html_aba .= "<div>";
	  	$html_aba .= "<ul id='abas'>";
	  	for ($i = 1; $i <= count($array_abas); $i++)
	  	{
	  		if ($i==1){$aba = "aba_selecionada";}else{$aba= "aba";}
	  		$a = $i - 1;
	  		$html_aba .= "<li id='aba$i' class='$aba' onmousedown=\"SysAba('aba$i', '', '$array_param[$a]', '$target');\">$array_abas[$a]</li>";
	  	}
	  	$html_aba .= "</ul>";
	  	$html_aba .= "</div>";
	  	
	  	echo $html_aba;
	}
	
	
	// FUNCAO GERA POS TABELA
	function gera_tabela($id_vend, $seed)
	{
	  	//echo "<hr />";
		//echo "<b>Variável Nome:</b> $variavel_nome<br />";
	  	//echo "<b>GET:</b> ".$_GET[$variavel_nome]."<br />";
	  	//echo "<b>POST:</b> ".$_POST[$variavel_nome]."<br />";
	  	//echo "<hr />";
	  	
	  	// SE GET
		if(isset($_GET[$variavel_nome]))
	  	{
		    $variavel_valor = $_GET[$variavel_nome];
		}
		// SE POST
	  	if(isset($_POST[$variavel_nome]))
	  	{
		    $variavel_valor = $_POST[$variavel_nome];
		}
		
		return $variavel_valor;
	}
	
	
	// FUNCAO GERA POS TABELA
	// $id_vend 		= id do usuario
	// $seed			= semente do usuario
	// $pos			 	= possicao da tabela
	function gera_codigo($id_vend, $seed, $pos)
	{
	  	$i= $pos;
	
		$valor1 = abs((int)(ceil(pow($i*$seed,4))+pow($id_vend,2) + log($seed*$i)));
		$valor2 = abs((int)(ceil(pow($id_vend,3))+pow($seed*$i,2) + log($i)*pi));
	
		$valor_t = substr($valor1 + $valor2,0,4); 
	  	  	
			
		return $valor_t;
	}
	
	
	// FUNCAO CHECA SENHA 
	// $pos			 	= possicao da tabela
	// $seq_array 		= sequencia dos botoes
	// $senha			= senha digitada
	// $id_vend 		= id do usuario	
	function check_senha($pos, $seq_array, $senha, $id_vend)
	{
		$this->connect_wbs();
		$rs = $this->query_db("SELECT seed FROM vendedor WHERE codvend = '$id_vend'", "SQL_NONE", "N");
     	$seed = $rs->fields[0];
     	$this->disconnect();
     		  		  	
	  	$seq = explode(":", $seq_array);
	  	$senha_pos[1] = substr($senha,0,1); 
	  	$senha_pos[2] = substr($senha,1,1); 
	  	$senha_pos[3] = substr($senha,2,1); 
	  	$senha_pos[4] = substr($senha,3,1); 
	  	
	  	$senha_tabela = $this->gera_codigo($id_vend,$seed,$pos);
		
		$senha_tabela_pos[1] = substr($senha_tabela,0,1); 
		$senha_tabela_pos[2] = substr($senha_tabela,1,1); 
		$senha_tabela_pos[3] = substr($senha_tabela,2,1); 
		$senha_tabela_pos[4] = substr($senha_tabela,3,1); 
		
		for ($i = 1; $i <= 4; $i++)
	  	{
	  	
		  	if ($senha_pos[$i] == 1){
		  	 	if ($seq[0]	== $senha_tabela_pos[$i] or $seq[1] == $senha_tabela_pos[$i]){$ver_pos[$i] = 1;}else{$ver_pos[$i] = 0;}
		  	}
		  	if ($senha_pos[$i] == 2){
		  	 	if ($seq[2]	== $senha_tabela_pos[$i] or $seq[3] == $senha_tabela_pos[$i]){$ver_pos[$i] = 1;}else{$ver_pos[$i] = 0;}
		  	}
		  	if ($senha_pos[$i] == 3){
		  	 	if ($seq[4]	== $senha_tabela_pos[$i] or $seq[5] == $senha_tabela_pos[$i]){$ver_pos[$i] = 1;}else{$ver_pos[$i] = 0;}
		  	}
		  	if ($senha_pos[$i] == 4){
		  	 	if ($seq[6]	== $senha_tabela_pos[$i] or $seq[7] == $senha_tabela_pos[$i]){$ver_pos[$i] = 1;}else{$ver_pos[$i] = 0;}
		  	}
		  	if ($senha_pos[$i] == 5){
		  	 	if ($seq[8]	== $senha_tabela_pos[$i] or $seq[9] == $senha_tabela_pos[$i]){$ver_pos[$i] = 1;}else{$ver_pos[$i] = 0;}
		  	}
	  	
	  	}//FOR
	  	
	  	$result = $ver_pos[1]*$ver_pos[2]*$ver_pos[3]*$ver_pos[4];
	  	//$result = $ver_pos[1].$ver_pos[2].$ver_pos[3].$ver_pos[4];

	  	return $result;
	}
	
	/**
	 * Correctly quotes a string so that all strings are escaped. We prefix and append
	 * to the string single-quotes.
	 * An example is  $db->qstr("Don't bother",magic_quotes_runtime());
	 * 
	 * @param s			the string to quote
	 * @param [magic_quotes]	if $s is GET/POST var, set to get_magic_quotes_gpc().
	 *				This undoes the stupidity of magic quotes for GPC.
	 *
	 * @return  quoted string to be sent back to database
	 */
	function qstr($s,$magic_quotes=false)
	{	
		if (!$magic_quotes) {
		
			if ($this->replaceQuote[0] == '\\'){
				// only since php 4.0.5
				$s = adodb_str_replace(array('\\',"\0"),array('\\\\',"\\\0"),$s);
				//$s = str_replace("\0","\\\0", str_replace('\\','\\\\',$s));
			}
			return  "'".str_replace("'",$this->replaceQuote,$s)."'";
		}
		
		// undo magic quotes for "
		$s = str_replace('\\"','"',$s);
		
		if ($this->replaceQuote == "\\'")  // ' already quoted, no need to change anything
			return "'$s'";
		else {// change \' to '' for sybase/mssql
			$s = str_replace('\\\\','\\',$s);
			return "'".str_replace("\\'",$this->replaceQuote,$s)."'";
		}
	}

    /*
    +--------------------------------------------------------------
    |  Função:  		BotaoAjax()
    |  Data Criação:	14/06/2006
    +--------------------------------------------------------------
    |  BotaoAjax(cor, titulo, target, acao, parametro, php_self)
    +--------------------------------------------------------------
    */
	function BotaoAjax($cor, $titulo, $target, $acao, $url_php_self)
	{
	  	$html_return = "";
	  	
	  	$html_return = "
	  	<script type='text/javascript'>
		function ActionBotao(base, div_target, acao)
		{
			var theURL = base + \"\";
			
			doit(theURL, div_target, acao, 'GET', div_target);
		}
		</script>";

        $html_return = "
	        <table border='0' cellpadding='0' cellspacing='0'>
	          <tr>
	           <td><a class=\"linkbotaoespecial\" href=\"javascript:void(0);\" onClick=\"ActionBotao('$url_php_self', '$target', '$acao')\"><img src='".DIR_IMAGES."/botao/" . $cor . "/botao_pt1.jpg' width='27' height='23' border='0'></a></td>
	           <td background='".DIR_IMAGES."/botao/" . $cor . "/botao_pt2.jpg'><a class=\"linkbotaoespecial\" href=\"javascript:void(0);\" onClick=\"ActionBotao('$url_php_self', '$target', '$acao')\"><b>$titulo</b></a></td>
	           <td><img src='".DIR_IMAGES."/botao/" . $cor . "/botao_pt3.jpg' width='11' height='23' border='0'></td>
	          </tr>
	        </table>
        ";
	  	
	  	echo $html_return;
	}
	
	// CALCULA PRECO CUSTO MEDIO PROJETADO
	function pcm_proj($codprodoc, $codgrupo_emp, $pcm_atual){	
	
	
		$rs_est = $this->query_db("SELECT (SUM(qtde)-SUM(reserva)) as est FROM estoque, empresa WHERE codprod=$codprodoc AND empresa.codemp = estoque.codemp and codgrupo = '$codgrupo_emp'","SQL_NONE","N");
		$estoque = $rs_est->fields[0];
		//echo "ESTOQUE =>$estoque<BR>";
		
		$rs_est_trans = $this->query_db("SELECT (SUM(qtde)) as estoque_trans FROM pedido, pedidoprod, empresa WHERE ped_transf = 'OK' AND cb <> 'OK' AND cancel <> 'OK' AND pedido.codped = pedidoprod.codped and codprod=$codprodoc  AND empresa.codemp = pedido.codemp and codgrupo = '$codgrupo_emp'","SQL_NONE","N");
		$estoque_trans= $rs_est_trans->fields[0];
								
		$estoque = $estoque + $estoque_trans;
	
		//OC EM ABERTO COM O PRODUTO SELECIONADO	
		$rs_oc = $this->query_db("SELECT qtdecomp , pcu, codmoeda FROM ocprod, oc, empresa WHERE codprod='$codprodoc' AND empresa.codemp = oc.codemp AND codgrupo = '$codgrupo_emp' AND oc.hist <>1 AND oc.codoc = ocprod.codoc AND cb <> 'OK' AND codped_transf =0","SQL_NONE","N");
			
		//COTACAO PADRAO DO PRODUTO
		$rs_cotacao = $this->query_db("SELECT cotacao FROM estoque, empresa, moeda WHERE moeda.codmoeda = estoque.codmoeda AND codprod='$codprodoc' AND empresa.codemp = estoque.codemp AND codgrupo = '$codgrupo_emp' GROUP by codprod ","SQL_NONE","N");
		$cotacao_padrao_produto = $rs_cotacao->fields[0];
		
			
		while (!$rs_oc->EOF)
		{
		$qtdecomp = $rs_oc->fields[0];
		$pcu= $rs_oc->fields[1];
		$codmoeda= $rs_oc->fields[2];
		
		$rs_cotacao_oc = $this->query_db("SELECT cotacao FROM moeda WHERE codmoeda = '$codmoeda'","SQL_NONE","N");
		$cotacao_oc = $rs_cotacao_oc->fields[0];
		$pcucambio = ($pcu*$cotacao_oc)/$cotacao_padrao_produto;
	
				$numerador = $numerador + ($pcucambio*$qtdecomp);
				$denominador = $denominador + $qtdecomp;
				
			//echo "$pcu - $pcucambio - $qtdecomp -  $numerador - $denominador<BR>";
		
			$rs_oc->MoveNext();
		}
		
		if ($estoque <=0 or $pcm_atual <= 0){
				if ($denominador <> 0){
					$pcmnovo = $numerador/$denominador;
				}else{
					$pcmnovo = 0;
				}
		}else{
				$pcmnovo = (($pcm_atual*$estoque) + $numerador)/($estoque + $denominador);	
		}
	
		return $pcmnovo;
	}

    /*
    +--------------------------------------------------------------
    |  Função:  		CorTema()
    |  Data Criação:	14/06/2006
    +--------------------------------------------------------------
    |  CorTema(cor, titulo, target, acao, parametro, php_self)
    +--------------------------------------------------------------
    */
	function CorTema($cor)
	{
		switch ($cor)
		{
			case "amarelo":
				define(COR_ESCURA_TEMA, "#E9C418");
				define(COR_CLARA_TEMA, "#FFFEEA");
				break;
			case "azul":
				define(COR_ESCURA_TEMA, "#3775CA");
				define(COR_CLARA_TEMA, "#DFDFFF");
				break;
			case "verde":
				define(COR_ESCURA_TEMA, "#67A737");
				define(COR_CLARA_TEMA, "#EAFFEA");
				break;
			case "vermelho":
				define(COR_ESCURA_TEMA, "#EA0000");
				define(COR_CLARA_TEMA, "#FFE1E1");
				break;
		}
	}

}

?>