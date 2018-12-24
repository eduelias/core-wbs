


            <table width="700" border="1" cellpadding="5" cellspacing="5">
<?
if($rand == "1q2w3e"){

include("config.inc.php");
include(DIR_SISTEMA."/".DIR_MODULOS."/padrao.class.php");

$db = new Padrao();

$hoje = getdate();
$ano_hoje = $hoje[year];
$mes_hoje = $hoje[mon];


$db->connect_wbs();
//$db->conn->debug =    true;

////////////////////////// ORDEM DE COMPRA  - ENTRADA ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT codvend, nome, senha, (SELECT nomegrp FROM segurancagrp WHERE segurancagrp.codgrp = vendedor.codgrp) as grp, codsuper, codemp FROM vendedor WHERE tipo = 'V' and block = 'N' and (codgrp = 56 or codgrp = 78 or codgrp = 13 or codgrp = 74 or codgrp = 41 or codgrp = 65) order by codemp","SQL_NONE","N");



if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$i++;	
			
			$senha = substr(ereg_replace("[^A-Z0-9]", "", crypt(time())).ereg_replace("[^A-Z0-9]", "", crypt(time())).ereg_replace("[^A-Z0-9]", "", crypt(time())),0, 7);
			
			?>
               <tr>
                <td><? echo $rs_lista->fields[0]; ?></td>
                <td><? echo $rs_lista->fields[1]; ?></td>
                <td><? echo base64_decode($rs_lista->fields[2]); ?></td>
                <td><? echo $rs_lista->fields[3]; ?></td>
                <td><? echo $rs_lista->fields[4]; ?></td>
                <td><? echo $rs_lista->fields[5]; ?></td>
                
                 <td><? echo $senha; ?></td>
              </tr>
            
                        
            
            <?
			
						
	
			$rs_lista->MoveNext();
		}//WHILE
}


$db->disconnect();

}

?>

</table>