<?php
	if(!$_GET[pct]) header('Content-type: application/json; charset=iso-8859-1');
	header("Accept-Encoding: gzip, deflate");
	include("../../include/class.php");
	include("../../include/functions.php");
	
	$et = 0;
	
	if ($_GET['prods'] == 'false'){
		
		die('INSIRA LISTA DE PRODUTOS SEPARADOS PRO VIRGULA, ACIMA');
		
	} else { 
		
		$bd = new bd();
		$ax = explode(',',$_GET['prods']);
		$sn = '';
		
		foreach ($ax as $k => $v) {
			$sn .= 'codprod = '.$v.' OR '; 	
		}
		$sn .= ' false ';
		
		$res = $bd->gera_array('codprod,nomeprod,descres','produtos',$sn);

	}
	
	function limpaacentos ($string) {
		$s = $string;
				
		$s = ereg_replace("[áàâãª]","a",$s);
		$s = ereg_replace("[ÁÀÂÃ]","A",$s);
		$s = ereg_replace("[éèê]","e",$s);
		$s = ereg_replace("[ÉÈÊ]","E",$s);
		$s = ereg_replace("[óòôõº]","o",$s);
		$s = ereg_replace("[ÓÒÔÕ]","O",$s);
		$s = ereg_replace("[úùû]","u",$s);
		$s = ereg_replace("[ÚÙÛ]","U",$s);
		$s = str_replace("ç","c",$s);
		$s = str_replace("Ç","C",$s);
		
		return $s;
		
	}
	
	function quebralinha ($string,$max,$char = ' '){
		
		$i = 0;
		$linha = 0;
		$acc = 0;
		
		$string = limpaacentos($string);
		
		$aux = explode($char,$string);
		
		while ($i <= count($aux)) {
			
			//echo strlen($st).' < '.$max.'<br>';
			
			if ((strlen($st)+strlen($aux[$i])) <= $max) { 
			
				$acc += strlen($aux[$i]);
				
				$st .= $aux[$i].' ';
				
			} else {
				
				$i--;
				
				$retorno[$linha] = strtoupper($st);
				
				$st = '';
				
				$linha++;
				
				$acc = 0;
			}		
			
			//echo strlen($st).' < '.$max.'<br>';
			
			//echo $max.' - '.$teste.' - '.$acc.' - '.strlen($aux[$i]).' - '.$i.' - '.$st.'<br>';
			
			$i++;
		}
		
		//$linha++;
		
		$retorno[$linha] = strtoupper($st);	
			
		return $retorno;
		
	}
	
	foreach ($res as $k=>$v) {
		
		$tt = quebralinha($v['nomeprod'],28);
		
		$ln = quebralinha($v['descres'],39);
		
		//$tt[0] = strtoupper(substr($v['nomeprod'], 0, 28));
		//$tt[1] = strtoupper(substr($v['nomeprod'], 28, 28));
		
		//$ln[0] = strtoupper(substr($v['descres'], 0, 38));
		//$ln[1] = strtoupper(substr($v['descres'], 38, 38));
		//$ln[2] = strtoupper(substr($v['descres'], 76, 38));
		//$ln[3] = strtoupper(substr($v['descres'], 114, 38));
		//$ln[4] = strtoupper(substr($v['descres'], 152, 38));
		//$ln[5] = strtoupper(substr($v['descres'], 190, 38));
		
		if ($et%2==0) {
			$s .= "^XA^FWN^LH20,40^FO0,00^GB530,40,90^FS^FO15,15^A0,30,35^FR^FD".$tt[0]."^FS^FO15,50^A0,30,35^FR^FD".$tt[1]."^FS^FO30,100^AD^FD".$ln[0]."^FS^FO30,125^AD^FD".$ln[1]."^FS^FO30,150^AD^FD".$ln[2]."^FS^FO30,175^AD^FD".$ln[3]."^FS^FO30,200^AD^FD".$ln[4]."^FS^FO30,225^AD^FD".$ln[5]."^FS^FO0,255^AD^FD+                 +    +                    +^FS";	
		} else {
			$s .= "^LH20,325^FO0,00^GB530,40,90^FS^FO15,15^A0,30,35^FR^FD".$tt[0]."^FS^FO15,50^A0,30,35^FR^FD".$tt[1]."^FS^FO30,100^AD^FD".$ln[0]."^FS^FO30,125^AD^FD".$ln[1]."^FS^FO30,150^AD^FD".$ln[2]."^FS^FO30,175^AD^FD".$ln[3]."^FS^FO30,200^AD^FD".$ln[4]."^FS^FO30,225^AD^FD".$ln[5]."^FS^XZ";
			/*$s .=  "^FWI^FO30,275^AD^FD".$ln[5]."^FS^FO30,300^AD^FD".$ln[4]."^FS^FO30,325^AD^FD".$ln[3]."^FS^FO30,350^AD^FD".$ln[2]."^FS^FO30,375^AD^FD".$ln[1]."^FS^FO30,400^AD^FD".$ln[0]."^FS^FO0,430^GB530,40,90^FS^FO15,435^A0,30,35^FR^FD".$tt[1]."^FS^FO15,470^A0,30,35^FR^FD".$tt[0]."^FS^FWN^XZ";*/
		}
		
		$et++;		
	
	}
	$s .= ($et%2==0)?'^FWN^XZ':'';
	
	echo "seta('".$s."')";
?>