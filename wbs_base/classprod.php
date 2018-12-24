<?php
require( "connectdb.php" );   

class operacao
{

	/// variaveis do formulario
    #var $nomeprod;
    #var $pvv;
	#var $datuc;
	#var $codprod;
	#var $codcat;
	#var $nomecat;
	/// uso da coneccao
    var $Database;
    var $id_code_length=20;
    
	/// Funcoes para setar valores
	function setcampo0( $value ) { $this->campo0 =& $value; }
	function setcampo1( $value ) { $this->campo1 =& $value; }
	function setcampo2( $value ) { $this->campo2 =& $value; }
	function setcampo3( $value ) { $this->campo3 =& $value; }
	function setcampo4( $value ) { $this->campo4 =& $value; }
	function setcampo5( $value ) { $this->campo5 =& $value; }
	function setcampo6( $value ) { $this->campo6 =& $value; }
	function setcampo7( $value ) { $this->campo7 =& $value; }
	function setcampo8( $value ) { $this->campo8 =& $value; }
	function setcampo9( $value ) { $this->campo9 =& $value; }
	function setcampo10( $value ) { $this->campo10 =& $value; }
	function setcampo11( $value ) { $this->campo11 =& $value; }
	function setcampo12( $value ) { $this->campo12 =& $value; }
	function setcampo13( $value ) { $this->campo13 =& $value; }
	function setcampo14( $value ) { $this->campo14 =& $value; }
	function setcampo15( $value ) { $this->campo15 =& $value; }
	function setcampo16( $value ) { $this->campo16 =& $value; }
	function setcampo17( $value ) { $this->campo17 =& $value; }
	function setcampo18( $value ) { $this->campo18 =& $value; }
	function setcampo19( $value ) { $this->campo19 =& $value; }
	function setcampo20( $value ) { $this->campo20 =& $value; }
	function setcampo21( $value ) { $this->campo21 =& $value; }
	function setcampo22( $value ) { $this->campo22 =& $value; }
	function setcampo23( $value ) { $this->campo23 =& $value; }
	function setcampo24( $value ) { $this->campo24 =& $value; }
	function setcampo25( $value ) { $this->campo25 =& $value; }
	function setcampo26( $value ) { $this->campo26 =& $value; }
	function setcampo27( $value ) { $this->campo27 =& $value; }
	function setcampo28( $value ) { $this->campo28 =& $value; }
	function setcampo29( $value ) { $this->campo29 =& $value; }
	function setcampo30( $value ) { $this->campo30 =& $value; }
	function setcampo31( $value ) { $this->campo31 =& $value; }
	function setcampo32( $value ) { $this->campo32 =& $value; }
	function setcampo33( $value ) { $this->campo33 =& $value; }
	function setcampo34( $value ) { $this->campo34 =& $value; }
	function setcampo35( $value ) { $this->campo35 =& $value; }
	function setcampo36( $value ) { $this->campo36 =& $value; }
	function setcampo37( $value ) { $this->campo37 =& $value; }
	function setcampo38( $value ) { $this->campo38 =& $value; }
	function setcampo39( $value ) { $this->campo39 =& $value; }
	function setcampo40( $value ) { $this->campo40 =& $value; }
	function setcampo41( $value ) { $this->campo41 =& $value; }
	function setcampo42( $value ) { $this->campo42 =& $value; }
	function setcampo43( $value ) { $this->campo43 =& $value; }
	function setcampo44( $value ) { $this->campo44 =& $value; }
	function setcampo45( $value ) { $this->campo45 =& $value; }
	function setcampo46( $value ) { $this->campo46 =& $value; }
	function setcampo47( $value ) { $this->campo47 =& $value; }
	function setcampo48( $value ) { $this->campo48 =& $value; }
	function setcampo49( $value ) { $this->campo49 =& $value; }
	function setcampo50( $value ) { $this->campo50 =& $value; }
	function setcampo51( $value ) { $this->campo51 =& $value; }
	function setcampo52( $value ) { $this->campo52 =& $value; }
	function setcampo53( $value ) { $this->campo53 =& $value; }
	function setcampo54( $value ) { $this->campo54 =& $value; }
	function setcampo55( $value ) { $this->campo55 =& $value; }
	function setcampo56( $value ) { $this->campo56 =& $value; }
	function setcampo57( $value ) { $this->campo57 =& $value; }
	function setcampo58( $value ) { $this->campo58 =& $value; }
	function setcampo59( $value ) { $this->campo59 =& $value; }
	function setcampo60( $value ) { $this->campo60 =& $value; }
	function setcampo61( $value ) { $this->campo61 =& $value; }
	function setcampo62( $value ) { $this->campo62 =& $value; }
	function setcampo63( $value ) { $this->campo63 =& $value; }
	function setcampo64( $value ) { $this->campo64 =& $value; }
	function setcampo65( $value ) { $this->campo65 =& $value; }
	function setcampo66( $value ) { $this->campo66 =& $value; }
	function setcampo67( $value ) { $this->campo67 =& $value; }
	function setcampo68( $value ) { $this->campo68 =& $value; }
	function setcampo69( $value ) { $this->campo69 =& $value; }
	function setcampo70( $value ) { $this->campo70 =& $value; }
	function setcampo71( $value ) { $this->campo71 =& $value; }
	function setcampo72( $value ) { $this->campo72 =& $value; }
	function setcampo73( $value ) { $this->campo73 =& $value; }
	function setcampo74( $value ) { $this->campo74 =& $value; }
	function setcampo75( $value ) { $this->campo75 =& $value; }
	function setcampo76( $value ) { $this->campo76 =& $value; }
	function setcampo77( $value ) { $this->campo77 =& $value; }
	function setcampo78( $value ) { $this->campo78 =& $value; }
	function setcampo79( $value ) { $this->campo79 =& $value; }
	function setcampo80( $value ) { $this->campo80 =& $value; }
	function setcampo81( $value ) { $this->campo81 =& $value; }
	function setcampo82( $value ) { $this->campo82 =& $value; }
	function setcampo83( $value ) { $this->campo83 =& $value; }
	function setcampo84( $value ) { $this->campo84 =& $value; }
	function setcampo85( $value ) { $this->campo85 =& $value; }
	function setcampo86( $value ) { $this->campo86 =& $value; }
	function setcampo87( $value ) { $this->campo87 =& $value; }
	function setcampo88( $value ) { $this->campo88 =& $value; }
	function setcampo89( $value ) { $this->campo89 =& $value; }
	function setcampo90( $value ) { $this->campo90 =& $value; }
	function setcampo91( $value ) { $this->campo91 =& $value; }
	function setcampo92( $value ) { $this->campo92 =& $value; }
	function setcampo93( $value ) { $this->campo93 =& $value; }
	function setcampo94( $value ) { $this->campo94 =& $value; }
	function setcampo95( $value ) { $this->campo95 =& $value; }
	function setcampo96( $value ) { $this->campo96 =& $value; }
	function setcampo97( $value ) { $this->campo97 =& $value; }
	function setcampo98( $value ) { $this->campo98 =& $value; }
	function setcampo99( $value ) { $this->campo99 =& $value; }
	function setcampo100( $value ) { $this->campo100 =& $value; }
	function setcampo101( $value ) { $this->campo101 =& $value; }
	function setcampo102( $value ) { $this->campo102 =& $value; }
	function setcampo103( $value ) { $this->campo103 =& $value; }
	function setcampo104( $value ) { $this->campo104 =& $value; }
	function setcampo105( $value ) { $this->campo105 =& $value; }
	function setcampo106( $value ) { $this->campo106 =& $value; }
	function setcampo107( $value ) { $this->campo107 =& $value; }
	function setcampo108( $value ) { $this->campo108 =& $value; }
	function setcampo109( $value ) { $this->campo109 =& $value; }
	function setcampo110( $value ) { $this->campo110 =& $value; }

	/// Funcoes para mostrar valores
    function showcampo0() { return $this->campo0; } 
	function showcampo1() { return $this->campo1; } 
	function showcampo2() { return $this->campo2; } 
	function showcampo3() { return $this->campo3; } 
	function showcampo4() { return $this->campo4; } 
	function showcampo5() { return $this->campo5; } 
	function showcampo6() { return $this->campo6; } 
	function showcampo7() { return $this->campo7; } 
	function showcampo8() { return $this->campo8; } 
	function showcampo9() { return $this->campo9; } 
	function showcampo10() { return $this->campo10; } 
	function showcampo11() { return $this->campo11; } 
	function showcampo12() { return $this->campo12; } 
	function showcampo13() { return $this->campo13; } 
	function showcampo14() { return $this->campo14; } 
	function showcampo15() { return $this->campo15; } 
	function showcampo16() { return $this->campo16; } 
	function showcampo17() { return $this->campo17; } 
	function showcampo18() { return $this->campo18; } 
	function showcampo19() { return $this->campo19; } 
	function showcampo20() { return $this->campo20; } 
	function showcampo21() { return $this->campo21; } 
	function showcampo22() { return $this->campo22; } 
	function showcampo23() { return $this->campo23; } 
	function showcampo24() { return $this->campo24; } 
	function showcampo25() { return $this->campo25; } 
	function showcampo26() { return $this->campo26; } 
	function showcampo27() { return $this->campo27; } 
	function showcampo28() { return $this->campo28; } 
	function showcampo29() { return $this->campo29; } 
	function showcampo30() { return $this->campo30; } 
	function showcampo31() { return $this->campo31; } 
	function showcampo32() { return $this->campo32; } 
	function showcampo33() { return $this->campo33; } 
	function showcampo34() { return $this->campo34; } 
	function showcampo35() { return $this->campo35; } 
	function showcampo36() { return $this->campo36; } 
	function showcampo37() { return $this->campo37; } 
	function showcampo38() { return $this->campo38; } 
	function showcampo39() { return $this->campo39; } 
	function showcampo40() { return $this->campo40; } 
	function showcampo41() { return $this->campo41; } 
	function showcampo42() { return $this->campo42; } 
	function showcampo43() { return $this->campo43; } 
	function showcampo44() { return $this->campo44; } 
	function showcampo45() { return $this->campo45; } 
	function showcampo46() { return $this->campo46; } 
	function showcampo47() { return $this->campo47; } 
	function showcampo48() { return $this->campo48; } 
	function showcampo49() { return $this->campo49; } 
	function showcampo50() { return $this->campo50; } 
	function showcampo51() { return $this->campo51; } 
	function showcampo52() { return $this->campo52; } 
	function showcampo53() { return $this->campo53; } 
	function showcampo54() { return $this->campo54; } 
	function showcampo55() { return $this->campo55; } 
	function showcampo56() { return $this->campo56; } 
	function showcampo57() { return $this->campo57; } 
	function showcampo58() { return $this->campo58; } 
	function showcampo59() { return $this->campo59; } 
	function showcampo60() { return $this->campo60; } 
	function showcampo61() { return $this->campo61; } 
	function showcampo62() { return $this->campo62; } 
	function showcampo63() { return $this->campo63; } 
	function showcampo64() { return $this->campo64; } 
	function showcampo65() { return $this->campo65; } 
	function showcampo66() { return $this->campo66; } 
	function showcampo67() { return $this->campo67; } 
	function showcampo68() { return $this->campo68; } 
	function showcampo69() { return $this->campo69; } 
	function showcampo70() { return $this->campo70; } 
	function showcampo71() { return $this->campo71; } 
	function showcampo72() { return $this->campo72; } 
	function showcampo73() { return $this->campo73; } 
	function showcampo74() { return $this->campo74; } 
	function showcampo75() { return $this->campo75; } 
	function showcampo76() { return $this->campo76; } 
	function showcampo77() { return $this->campo77; } 
	function showcampo78() { return $this->campo78; } 
	function showcampo79() { return $this->campo79; } 
	function showcampo80() { return $this->campo80; } 
	function showcampo81() { return $this->campo81; } 
	function showcampo82() { return $this->campo82; } 
	function showcampo83() { return $this->campo83; } 
	function showcampo84() { return $this->campo84; } 
	function showcampo85() { return $this->campo85; } 
	function showcampo86() { return $this->campo86; } 
	function showcampo87() { return $this->campo87; } 
	function showcampo88() { return $this->campo88; } 
	function showcampo89() { return $this->campo89; } 
	function showcampo90() { return $this->campo90; } 
	function showcampo91() { return $this->campo91; } 
	function showcampo92() { return $this->campo92; } 
	function showcampo93() { return $this->campo93; } 
	function showcampo94() { return $this->campo94; } 
	function showcampo95() { return $this->campo95; } 
	function showcampo96() { return $this->campo96; } 
	function showcampo97() { return $this->campo97; } 
	function showcampo98() { return $this->campo98; } 
	function showcampo99() { return $this->campo99; } 
	function showcampo100() { return $this->campo100; } 
	function showcampo101() { return $this->campo101; } 
	function showcampo102() { return $this->campo102; } 
	function showcampo103() { return $this->campo103; } 
	function showcampo104() { return $this->campo104; } 
	function showcampo105() { return $this->campo105; } 
	function showcampo106() { return $this->campo106; } 
	function showcampo107() { return $this->campo107; } 
	function showcampo108() { return $this->campo108; } 
	function showcampo109() { return $this->campo109; }
	function showcampo110() { return $this->campo110; }  
	

	/// Funcao INSERT na tabela
	function addProd( $tabela , &$ureg)
    {
		$this->dbInit();

		$this->Database->array_query1($value_array, $value_array_campo, "SELECT * FROM $tabela limit 0,1");
				
				for($j = 0; $j < count( $value_array_campo ); $j++ ){
				$ncampo = $value_array_campo[$j];
				$xcampo = "campo" . $j;
				$vcampo = $this->$xcampo;
				if ($j == count( $value_array_campo)-1):
				$param = $param . "$ncampo ='$vcampo'";
				else:
				$param = $param . "$ncampo ='$vcampo', ";
				endif;
				}
						
											   
		$this->Database->query("INSERT INTO $tabela SET " . $param);
        $ureg = mysql_insert_id();
		}

	/// Funcao UPDATE tabela
	function upProd( $tabela, $condicao)
    {
		$this->dbInit();

		if ($condicao <>""){$condicaonew = " WHERE " . $condicao;}

		$this->Database->array_query1($value_array, $value_array_campo, "SELECT * FROM $tabela " . $condicaonew . " limit 0,1");
				
				
				for($j = 0; $j < count( $value_array_campo ); $j++ ){
					if ($value_array_campo[$j] <> "serasa"){
						$ncampo = $value_array_campo[$j];
						$xcampo = "campo" . $j;
						$vcampo = $this->$xcampo;
							if ($j == count( $value_array_campo)-1):
							$param = $param . "$ncampo ='$vcampo'";
							else:
							$param = $param . "$ncampo ='$vcampo', ";
							endif;
					}
				}
									   
		$this->Database->query("UPDATE  $tabela SET " . $param . $condicaonew);
        }

        	/// Funcao UPDATE tabela
	function upProdU( $tabela, $param, $condicao)
	{
		$this->dbInit();

		if ($condicao <>""){$condicaonew = " WHERE " . $condicao;}


		$this->Database->query("UPDATE  $tabela SET " . $param . $condicaonew);
        }

	/// Funcao UPDATE tabela COM IMAGEM
	function upProdImg( $tabela, $condicao, $form_data)
    {
		$this->dbInit();

		if ($condicao <>""){$condicaonew = " WHERE " . $condicao;}

		$this->Database->array_query1($value_array, $value_array_campo, "SELECT * FROM $tabela " . $condicaonew. " limit 0,1");
				
				for($j = 0; $j < count( $value_array_campo ); $j++ ){
					if ($value_array_campo[$j] == "imagem"){
						if ($form_data <> "none"){
						$ncampo = $value_array_campo[$j];
						$xcampo = "campo" . $j;
						$vcampo = $this->$xcampo;
							if ($j == count( $value_array_campo)-1):
							$param = $param . "$ncampo ='$vcampo'";
							else:
							$param = $param . "$ncampo ='$vcampo', ";
							endif;
						}
					}else{
						$ncampo = $value_array_campo[$j];
						$xcampo = "campo" . $j;
						$vcampo = $this->$xcampo;
							if ($j == count( $value_array_campo)-1):
							$param = $param . "$ncampo ='$vcampo'";
							else:
							$param = $param . "$ncampo ='$vcampo', ";
							endif;
					}
				}
									   
		$this->Database->query("UPDATE  $tabela SET " . $param . $condicaonew);
        }

	/// Funcao UPDATE tabela COM SERASA
	function upProdPed( $tabela, $condicao)
    {
		$this->dbInit();

		if ($condicao <>""){$condicaonew = " WHERE " . $condicao;}

		$this->Database->array_query1($value_array, $value_array_campo, "SELECT * FROM $tabela " . $condicaonew. " limit 0,1");
				
				for($j = 0; $j < count( $value_array_campo ); $j++ ){
					$ncampo = $value_array_campo[$j];
					$xcampo = "campo" . $j;
					$vcampo = $this->$xcampo;
					if ($j == count( $value_array_campo)-1):
					$param = $param . "$ncampo ='$vcampo'";
					else:
					$param = $param . "$ncampo ='$vcampo', ";
					endif;
				}
									   
		$this->Database->query("UPDATE  $tabela SET " . $param . $condicaonew);
        }

	/// Funcao DELETE tabela
	function delProd( $tabela, $condicao)
    {
		$this->dbInit();

		if ($condicao <>""){$condicaonew = " WHERE " . $condicao;}

										   
		$this->Database->query("DELETE from $tabela " . $condicaonew);
        }


	/// Funcao LIST tabela
	function listProd( $tabela, $condicao )
    {
		$this->dbInit();

		if ($condicao <>""){$condicaonew = " WHERE " . $condicao;}

		$this->Database->array_query1($value_array, $value_array_campo, "SELECT * FROM $tabela " . $condicaonew);
				
				for($i = 0; $i < count( $value_array ); $i++ ){
					for($j = 0; $j < count( $value_array_campo ); $j++ ){
						$xcampo = "campo" . $j;
						$this->$xcampo = $value_array[$i][$value_array_campo[$j]];
					}
				}		
	
	
	$numreg = count($value_array);
	return  $numreg;
	}

	/// Funcao SOMATORIO tabela por Campo
	function listProdU($condini, $tabela, $condicao)
    {
		$this->dbInit();

		if ($condicao <>""){$condicaonew = " WHERE " . $condicao;}
		if ($condini ==""){$condini= " * ";}

		$this->Database->array_query2($value_array, $value_array_campo, "SELECT " . $condini . " FROM $tabela " . $condicaonew);
		
				for($i = 0; $i < count( $value_array ); $i++ ){
					for($j = 0; $j < count( $value_array_campo ); $j++ ){
						$xcampo = "campo" . $j;
						$this->$xcampo = $value_array[$i][$value_array_campo[$j]];
					}
				}	
	
	$numreg = count($value_array);
	return  $numreg;
	}

	/// Funcao LIST ALL tabela
	function listProdgeral( $tabela, $condicao, &$array, &$array_campo , $parm)
    {
		$this->dbInit();

		if ($condicao <>""){$condicaonew = " WHERE " . $condicao;}

		$this->Database->array_query1($array, $array_campo,  "SELECT * FROM $tabela " . $condicaonew . " " . $parm );
	
	$numreg = count($array);
	return  $numreg;
	}

	/// Funcao SOMATORIO tabela
	function listProdSum($condini, $tabela, $condicao, &$array, &$array_campo , $parm)
    {
		$this->dbInit();

		if ($condicao <>""){$condicaonew = " WHERE " . $condicao;}
		if ($condini ==""){$condini= " * ";}

		$this->Database->array_query2($array, $array_campo,  "SELECT " . $condini . " FROM $tabela " . $condicaonew . " " . $parm);
	
	$numreg = count($array);
	return  $numreg;
	}

	/// Funcao MOSTRA PRODUTO tabela
	function mostraProd( $array, $array_campo, $cont )
    {

			 for($j = 0; $j < count( $array_campo ); $j++ ){
						$xcampo = "campo" . $j;
						$this->$xcampo = $array[$cont][$array_campo[$j]];
					}
	
	}

	/// Funcao SQL PURO
	function listProdMY($condini, $condicao, &$array, &$array_campo , $parm)
    {
		$this->dbInit();

		if ($condicao <>""){$condicaonew = " WHERE " . $condicao;}
		if ($condini ==""){$condini= " * ";}

		$this->Database->array_query2($array, $array_campo,  "SELECT " . $condini . $condicaonew . " " . $parm);
	
	$numreg = count($array);
	return  $numreg;
	}

	
	/// LIMPA FUNCOES
	function clear()
    {
		$this->dbInit();

					for($j = 0; $j < 99; $j++ ){
						$xcampo = "campo" . $j;
						$this->$xcampo = "";
					}
			
	
	
	#$numreg = count($value_array);
	#return  $numreg;
	}

	/// Funcao MESSAGEM COMFIRMACAO OU ERRO
	function msggeral($msg, $tipo, $url, $lock)
    {

	$this->dbInit();

if ($lock <> 1){include("sif-topo.php");}else{include("sif-topolimpo.php");}


if ($tipo == "ERRO"){$imagem = "erro.gif";$cor="#FF0000";}else{$imagem = "ok.gif";$cor="#008000";} 
			 echo("

<div align='center'>
			<br>
			<br>
  <center>
  <table border='0' width='400' cellspacing='0'>
    <tr>
      <td width='100%' bgcolor='$cor'>
  <table border='0' width='100%' cellspacing='1' cellpadding='2' bgcolor='#FFFFFF'>
    <tr>
      <td width='45'>
			  <p align='center'><img border='0' src='images/$imagem'></p></td>
      <td width='355'><b><font face='Verdana' size='1'>MENSAGEM:</font><font face='Verdana' size='3' color='#FF0000'><br>
        </font><font face='Verdana' size='3' color='$cor'>
        $msg</font></b></td>
    </tr>
  </table>
      </td>
    </tr>
  </table>
  </center>
</div>

<p align='center'>
<font size='2' face='Verdana'><a href='$HTTP_REFERER$url'><b>OK</b></a></font>
		




			 ");

if ($lock <> 1){include ("sif-rodape.php");}
			

	}
	
	/// Funcao MENSAGEM DE CONFIRMACAO
	function msgpopup($msg, $tipo)
    {

		if ($tipo == "ERRO"){$imagem = "erro.gif";$cor="#FF0000";}else{$imagem = "ok.gif";$cor="#008000";} 

		echo("
		
<div align='center'>
			<br>
			
  <center>
  <table border='0' width='400' cellspacing='0'>
    <tr>
      <td width='100%' bgcolor='$cor'>
  <table border='0' width='100%' cellspacing='1' cellpadding='2' bgcolor='#FFFFFF'>
    <tr>
      <td width='45'>
			  <p align='center'><img border='0' src='images/$imagem'></p></td>
      <td width='355'><b><font face='Verdana' size='1'>MENSAGEM:</font><font face='Verdana' size='3' color='#FF0000'><br>
        </font><font face='Verdana' size='3' color='$cor'>
        $msg</font></b></td>
    </tr>
  </table>
      </td>
    </tr>
  </table>
  </center>
	  <br>
</div>

		
</div>

		");
		
        

	}

	/// Funcao ACESSO NEGADO
	function acessoneg()
    {

			$titulo = "Dados Incorretos";
			$titulosec = "Verifique se os dados foram digitados corretamente";
			$restrito = 0;

			include ("sif-topo.php");
			 echo("
			  <p align='center'><img border='0' src='images/erro.gif' width='35' height='33'><br>
 <b><font face='Verdana' color='#FF0000' size='4'>ACESSO NEGADO</font></b>
 <p align='center'><font face='Verdana' size='2' color='#008080'>Dados Incorretos.
 Verifique se os dados foram digitados corretamente.<br>
 <b>Entre com sua identificação novamente.</b></font>
 <p align='center'><b><a href='$PHP_SELF'><font face='Verdana' color='#008080' size='1'>VOLTAR</font></a></b>



			 ");
			include ("sif-rodape.php");

	}


	/// Funcao FORMATA DATA
	function fdata($data)
    {

	$datanew = str_replace('-','',$data);
	$ano = substr($datanew,0,4);
	$mes = substr($datanew,4,2);
	$dia = substr($datanew,6,2);
	$hora = substr($datanew,8,10);
	$hora = str_replace(':','',$hora);
	$hora = str_replace(' ','',$hora);
	$h = substr($hora,0,2);
	$min = substr($hora,2,2);
	$seg = substr($hora,4,2);

	if ($hora <> 0):
	$data = $dia . '/' . $mes . '/' . $ano . " " . $h . ':' . $min . ':' . $seg;
	else:
	$data = $dia . '/' . $mes . '/' . $ano;
	endif;


	return $data;
		
	}

	/// Funcao FORMATA PREÇOS
	function fpreco($preco)
    {

	$pnew = number_format($preco,2,',','.'); 

	return $pnew;
		
	}

		/// Funcao GERA DATA ATUAL
	function gdata()
    {

		 $hoje = getdate();
		 $ano = $hoje[year];
		 $mes = $hoje[mon];
		 $dia = $hoje[mday];
		 $h = $hoje[hours];
		 $m = $hoje[minutes];
		 $s = $hoje[seconds];

		 if (strlen($mes)==1){$mes = '0'.$mes;}
		 if (strlen($dia)==1){$dia = '0'.$dia;}
		 if (strlen($h)==1){$h = '0'.$h;}
		 if (strlen($m)==1){$m = '0'.$m;}
		 if (strlen($s)==1){$s = '0'.$s;}

		 $dataatual = $ano.$mes.$dia.$h.$m.$s;

	return $dataatual;
		
	}

	
		/// Funcao CALCULA DIAS ENTRE DATAS
	function numdias($dataini, $datafim)
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
		
	}

	function numdatahoras($dataini, $datafim)
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
		$m = floor((($datatfim - $datatini)%3600)/60);
		$s = floor((($datatfim - $datatini)%3600)%60);

		 if (strlen($h)==1){$h = '0'.$h;}
		 if (strlen($m)==1){$m = '0'.$m;}
		 if (strlen($s)==1){$s = '0'.$s;}

		$difhoras = $dias."/".$h.":".$m.":".$s;

	return $difhoras;
		
	}

	/// Funcao GERA CODBARRA PEDIDO
	function codbarra($codemp, $codped, $tipo)
    {
		if ($tipo == "PED"){$h = 789;}
		if ($tipo == "ORC"){$h = 456;}
		if ($tipo == "KIT"){$h = 876;}
		if ($tipo == "OS"){$h = 911;}


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


	/// Funcao GERA MD5 DAS PARCELAS DO PEDIDO
	function geraMD5($string)
    {
	
	$md5 = md5($string);


	return $md5;
		
	}
	

	function begin_id($nome, $ureg)
	{

		#setcookie("session",$sesscode, false, "/");
		//SetCookie($nome, $ureg, time()+86400, "/", "", 0);
		SetCookie($nome, $ureg, time()+86400, "/", "ipasoft.com.br", 0);
		#SetCookie($nome, $ureg, time()+600, "/", "www3.jfnet.com.br", 0);
		#setcookie("session", "$sesscode", false, "/", "www3.jfnet.com.br", 0);

		if ($this->globalID == 1)
		{
			$GLOBALS['SID'] = $ureg;
		}

		 return $ureg;
	}
	
	

		

     function dbInit()
    {
        
            $this->Database = new connect();
		    
        
    }
	
	
  function paginate($offset,$total,$limit,$base = '')
  {
    $lastp = ceil($total / $limit);
    $thisp = ceil(($offset == 0 ? 1 : ($lastp / ($total / $offset))));
    print "    <div class=\"paginator\">\n";
    if ($thisp==1) { print "      <SPAN CLASS=\"atstart\">&lt Anterior</SPAN>\n"; }
    else { print "      <a href=\"".$base.((($thisp - 2) * $limit) + 1)."&pagina=".($thisp-1)."\" class=\"prev\">&lt; Anterior</a> \n"; }
    $page1 = $base . "1";
    $page2 = $base . ($limit + 1);
    if ($thisp <= 5) {
      for ($p = 1;$p <= min( ($thisp<=3) ? 5 : $thisp+2,$lastp); $p++) {
	if ($p == $thisp) {
	  print "      <span class=\"this-page\">$p</span>\n ";
	} else {
	  $url = $base . (($limit * ($p - 1)) + 1);
	  print "      <a href=\"$url"."&pagina=".$p."\">$p</a>\n ";
	}
      }
      if ($lastp > $p) {
	print "      <span class=\"break\">...</span>\n";
	print "      <a href=\"".$base.((($lastp - 2)* $limit)+1)."&pagina=".($lastp-1)."\">".($lastp-1)."</a>\n";
	print "      <a href=\"".$base.((($lastp-1)*$limit)+1)."&pagina=".$lastp."\">".$lastp."</a>\n";
      }
    }
    else if ($thisp > 5) {
      print "      <a href=\"".$page1."&pagina=1\">1</a> <a href=\"".$page2."&pagina=2\">2</a>";
      if ($thisp != 6) { print " <span class=\"break\">...</span>\n "; }
      for ($p = ($thisp == 6) ? 3 : min($thisp - 2,$lastp-4);$p <= (($lastp-$thisp<=5) ? $lastp:$thisp+2); $p++) {
	if ($p == $thisp) {
	  print "      <span class=\"this-page\">$p</span>\n ";
	} else if ($p <=$lastp) {
	  $url = $base . (($limit * ($p - 1)) + 1);
	  print "      <a href=\"$url"."&pagina=".$p."\">$p</a>\n ";
	}
      }
      if ($lastp > $p+1) {
	print "      <span class=\"break\">...</span>\n";
	print "      <a href=\"".$base.((($lastp - 1)* $limit)+1)."&pagina=".($lastp-1)."\">".($lastp-1)."</a>\n";
	print "      <a href=\"".$base.(($lastp*$limit)+1)."&pagina=".$lastp."\">".$lastp."</a>\n";
      }
    }
    if ($thisp == $lastp) { print "      <SPAN CLASS=\"atend\"> Próxima &gt</SPAN>\n"; }
    else { print "      <a href=\"".$base.((($thisp + 0) * $limit) + 1)."&pagina=".($thisp+1)."\" class=\"next\">Próxima &gt;</a>\n"; }
    print "    </div>\n";
  }


	

}

?>
