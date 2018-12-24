<?php

include_once("classprod.php" );

#$codped = 65;
$codemp = 1;

$prod = new operacao();


// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
$prod->listProdSum("codvend, tipo, doc, nome ", "vendedor", "tipo = 'R'", $array, $array_campo, $parm );

 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codvend = $prod->showcampo0();
			$tipo = $prod->showcampo1();
			$doc = $prod->showcampo2();
			$login = $prod->showcampo3();
			
			#echo(" t=$tipo d=$doc");

			if ($tipo == 'F'):

					$condicao2 = "cpf='$doc'";
			else:
				
					$condicao2 = "cnpj='$doc'";

			endif;

		$prod->clear();
		$prod->listProdU("nome, endereco, bairro, cidade, estado, cep, dddtel1 , tel1", "clientenovo", $condicao2);
		
		$nome = $prod->showcampo0();
		$endereco = $prod->showcampo1();
		$bairro = $prod->showcampo2();
		$cidade = $prod->showcampo3();
		$estado = $prod->showcampo4();
		$cep = $prod->showcampo5();
		$dddtel1 = $prod->showcampo6();
		$tel1 = $prod->showcampo7();


if ($nome <> ""){
echo("

<b>$nome</B> | $doc | $endereco - $cidade - $barro - $estado - $cep | ($ddtel1)$tel1<br>

	");

}else{

	echo("

<b>$login</b><br>

	");
}

 }



?>
