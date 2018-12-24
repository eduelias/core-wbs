<?php
// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.

include_once('adodb/adodb.inc.php');

$db = ADONewConnection('mysql');

$server = '10.20.30.250';
$user = 'dataware';
$password = 'data';
$database = 'sif_dataware';
$db->Connect($server,$user,$password,$database);
$db->debug = true;

switch ($Action)
{
	case "PD":

      $condicao = "(codcat = 4 or codcat = 5 or  codcat = 18 or  codcat = 20 )";

	break;
	
	case "CD":

      $condicao = "(codcat = 1 or codcat = 4 or codcat = 5  or  codcat = 18 or  codcat = 20 )";

	break;
	
	case "GB":
	
       $condicao = "(codcat = 4 or codcat = 5 or codcat = 17 or  codcat = 18 or  codcat = 20 )";

	break;
	
	case "GC":
	
	   $condicao = "(codcat = 1 or codcat = 4 or codcat = 5 or codcat = 17 or  codcat = 18 or  codcat = 20 )";

	break;

}

$i=0;
$j=1;
$k = 4; // NUMERO DE CATEGORIAS A SER INSERIDAS

$rs = $db->Execute("select codped, codprod, dataped , codvend, nomeprod, codcat from pesq_kit WHERE $condicao and tipocj = 1 and dataped > $periodo order by codped, codcat");

#$rs_soma = $db->Execute("select COUNT(*) as qtde from pesq_kit WHERE (codcat = 5 or codcat = 18 or codcat = 4 or codcat = 20 ) and tipocj = 1  group by codped order by codped, codcat");


while (!$rs->EOF) {

#echo("rs_s=".$rs_soma->fields['qtde']."<BR>");

echo("$codped_ant - " .$rs->fields['codped']."-".$rs->fields['codprod']." - $j<br>");
    if ($codped_ant == $rs->fields['codped'])
    {
        $md .=$rs->fields['codprod'].":";
        $md_p .=$rs->fields['nomeprod'].":";
        $j++;
    }else{
        $md .=$rs->fields['codprod'].":";
        $md_p .=$rs->fields['nomeprod'].":";
        $mdy[$i] = $md;
        $mdy_p[$i] = $md_p;
        $py[$i] = $rs->fields['codped'];
        $md5[$i] = md5($mdy[$i]);
        print $mdy[$i];
        print "<BR>";
        print $md5[$i];
        print "<BR>";
        print $mdy_p[$i];
        print "<BR>";
        $codped_ant = $rs->fields['codped'];

        
        //INSERT
        $sql = "insert into pesq_kit_agrupado (codped,md5, dataped, codvend, cj_codprod, cj_nomeprod, tipo) ";
        $sql .= "values (".$py[$i].",'".$md5[$i]."','".$rs->fields['dataped']."',".$rs->fields['codvend'].",'".$mdy[$i]."','".$mdy_p[$i]."','$Action')";
        if ($db->Execute($sql) === false) print 'error inserting';
        $md = "";
        $md_p = "";
        $j=1;
        $i++;
        #$rs_soma->MoveNext();

        
    }
   #print $md."<BR>";

    $rs->MoveNext();
}

$rs->Close();

?>
