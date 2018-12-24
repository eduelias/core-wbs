<?
echo("<br><br><center>");

$prod->paginate($desloc,$numreg,$acrescimo, "$PHP_SELF?Action=$Action&palavrachave=".urlencode($palavrachave)."&operador=$operador&".$compl."&desloc=");


/*

#------------------- Pagina Anterior-----------------#

echo("<font size='1' face='Verdana, Arial, Helvetica, sans-serif'>&nbsp;</font>");


	$anterior=$desloc - $acrescimo;
	$palavrachaveenvio = urlencode($palavrachave);

if ($anterior >= 0):
	
	$paginaanterior = $pagina - 1;

	echo("
	<font size='1' face='Verdana, Arial, Helvetica, sans-serif'><b>
	<a href='$PHP_SELF?Action=$Action&desloc=$anterior&pagina=$paginaanterior&palavrachave=$palavrachaveenvio&operador=$operador&$compl'
	target='_self'><< Anterior</a> </b></font>
	");

else:
	echo("
	<font size='1' color='#000000' face='Verdana, Arial, Helvetica, sans-serif'> <b><<
	Anterior </b></font>
	");

endif;

#------------------- Números de Contagem-----------------#

echo("<font size='1' face='Verdana, Arial, Helvetica, sans-serif'> | </font>");

$contpg = 1;
while ($contpg <= $totalpagina):

$deslocpg = ($contpg * $acrescimo)-$acrescimo;
$palavrachaveenvio = urlencode($palavrachave);


	if ($contpg <> $pagina):
	echo("
		<font size='1' face='Verdana, Arial, Helvetica, sans-serif'>
		<a href='$PHP_SELF?Action=$Action&desloc=$deslocpg&pagina=$contpg&palavrachave=$palavrachaveenvio&operador=$operador&$compl'
		target='_self'>$contpg</a> </font>
	");

	echo("<font size='1' face='Verdana, Arial, Helvetica, sans-serif'> | </font>");
	else:
	echo("
		<font size='1' face='Verdana, Arial, Helvetica, sans-serif'>
		$contpg</a> </font>
	");

	echo("<font size='1' face='Verdana, Arial, Helvetica, sans-serif'> | </font>");
	endif;

$contpg++;
endwhile;

#------------------- Proxima Pagina -----------------#

	$prox=$desloc + $acrescimo;
	$palavrachaveenvio = urlencode( $palavrachave);


if ($prox >= $numreg):

	echo ("<font size='1' color='#000000' face='Verdana, Arial, Helvetica, sans-serif'><b> Próximo >></b></font>");

else:
	$paginaposterior = $pagina + 1;
	echo ("
	<font size='1' face='Verdana, Arial, Helvetica, sans-serif'><b>
	<a href='$PHP_SELF?Action=$Action&desloc=$prox&pagina=$paginaposterior&palavrachave=$palavrachaveenvio&operador=$operador&$compl'
	target='_self'> Próximo >></a></b></font>
	");

endif;

#------------------- Proxima Pagina -----------------#
*/

?>
