<?php


		$Server = '10.20.30.250';
		$User = 'sif';
		$Password = 'sif@123';
		$DB = 'sif_base';
 
 mysql_pconnect( $Server, $User, $Password )
            or print( "Error: could not connect to the database." );
        
#require_once("classprod.php");

#$prod = new operacao();

#	$prod->listProdU("imagem, imagemtype","produtos", "codprod=$codprodold");

#		$data = $prod->showcampo0();
#		$type = $prod->showcampo1();


$pesq = "Select imagem,imagemtype from produtos where codprod=$codprodold";
$result = mysql($DB,$pesq);

#echo($pesq);
#echo("$data");

$data = mysql_result($result,0,"imagem");
$type = mysql_result($result,0,"imagemtype");


Header( "Content-type: $type");
echo $data

?>
