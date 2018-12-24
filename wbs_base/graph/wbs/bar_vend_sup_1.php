<?php
include ("../src/jpgraph.php");
include ("../src/jpgraph_line.php");
include ("../src/jpgraph_bar.php");
include("../../config.inc.php");
include("../../wbs2_novo/modulos/padrao.class.php");


$db = new Padrao();


$month=array(
"Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");

#$mes = $mes-1;
#$mespesq = $month[$mes];
$hoje = getdate();
$ano_hoje = $hoje[year];
$mes_hoje = $hoje[mon];

if ($mes_hoje == $mes and $ano_hoje == $ano){$dia = $hoje[mday];}else{$dia = 31;}
if (strlen($dia)==1){$dia = '0'.$dia;}

$meta = $metauser;
$udia = date("t");

// INICIO DA CLASSE
$db->connect_wbs();
#$db->conn->debug = true;
#$prod = new operacao();

# if (strlen($mes)==1){$u1 = '0'.$mes;}else{$u1 = $mes;}

		// CLIENTES
		// 148 - TV JUIZ DE FORA LTDA
		// 187 - MAXXFORM LTDA ME
		// 323 - Ipasoft Tecnologia e Informática LTDA
		// VENDEDOR
		// 108 - ipasoft
		// 22 - giovanni

	if ($codproj == 3){$cond = "SUM(vc)";}else{$cond = "SUM(vpv)";}
	#if ($codproj == 3){$cond = "1";}else{$cond = "2";}

		#$prod->listProdSum("nome, ".$cond.", meta","pedido, vendedor", "pedido.codvend = vendedor.codvend AND dataped  like '$ano-$mes%' and cancel !=  'OK' AND vendedor.codproj='$codproj'", $array, $array_campo , "GROUP  BY pedido.codvend ORDER  BY  `nome`  ASC");
	
	$rs_lista = $db->query_db("SELECT nome, ".$cond.", meta  FROM pedido LEFT JOIN vendedor ON pedido.codvend = vendedor.codvend WHERE dataped  like '$ano-$mes%' and cancel !=  'OK' AND vendedor.codproj='$codproj' GROUP  BY pedido.codvend ORDER  BY  `nome`  ASC","SQL_NONE","N");

$i=0;
if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
		$x[$i] = $rs_lista->fields[0];
		$y[$i] = $rs_lista->fields[1];
		$m[$i] = $rs_lista->fields[2];
		
		$yh[$i] = 0;
		

		$yt = $yt + $y[$i];
		$mt = $mt + $m[$i];
		
			$rs_lista5 = $db->query_db("SELECT ".$cond."  FROM pedido LEFT JOIN vendedor ON pedido.codvend = vendedor.codvend WHERE dataped  like '$ano-$mes-$dia%' and cancel !=  'OK' AND vendedor.codproj='$codproj'  and vendedor.nome ='".$x[$i]."' GROUP  BY pedido.codvend ORDER  BY  `nome`  ASC","SQL_NONE","N");
			$yh[$i] = $rs_lista5->fields[0];
		
			$yht = $yht + $yh[$i];
			
		$i++;
			$rs_lista->MoveNext();
		}//WHILE
}
	
	    $numuser = count($x);
		
		

// Create some datapoints 
for($i=0; $i < $numuser; ++$i) {
	$metauserdia[$i] = ($m[$i]/$udia)*$dia;
	$metauserdiat = $metauserdiat + $metauserdia[$i];
}

$metauserdiat  = number_format($metauserdiat, 2,',', '.');
$yt  = number_format($yt, 2,',', '.');
$mt  = number_format($mt, 2,',', '.');
$yht  = number_format($yht, 2,',', '.');

#$x = array(felipe,joao);
#$y = array(2.66,3.88);
#$m = array(2.66,3.88);
#$yh =  array(2.66,3.88);
#$metauserdia =  array(2.66,3.88);

// Some data
#$y1 = array(11.65,3, 8,12.65,5 ,1,9, 13,5,7., $codproj, $mes, $numuser, $pc_d);
#$ydata = array($y); 
$mes = $mes-1;
$mespesq = $month[$mes];
/*
echo "<pre>";
print_r($y);
print_r($x);
print_r($m);
print_r($yh);

print_r($metauserdia);
*/
//------------------ INICIO CLASSE GRAFICO -------------------//

// Size of graph
$width=700; 
if ($codproj == 3){$height=2000;}else{$height=800;}


// Set the basic parameters of the graph 
$graph = new Graph($width,$height,'auto');
$graph->SetMarginColor('white');
$graph->SetScale("textlin");
$graph->SetFrame(false);
$graph->SetShadow();

$top = 60;
$bottom = 60;
$left = 80;
$right = 30;
$graph->Set90AndMargin($left,$right,$top,$bottom);

// Set title and subtitle
$graph->title->Set("Faturamento mes $dia de $mespesq $ano ");
$graph->subtitle->Set("Grafico diario por vendedor");
#$graph->xaxis->title->Set("Faturamento");

// Use built in font (don't need TTF support)
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$graph->yaxis->scale->SetGrace(5);
$graph->xgrid->Show(true,false);

// Setup the labels
$graph->xaxis->SetTickLabels($x);
$graph->xaxis->SetLabelAngle(0);
#$graph->xaxis->SetFontSetFont(FF_FONT1,FS_BOLD);

// Create the bar plot
$b1 = new BarPlot($y);
#$b1->SetLegend("Mês de Novembro");
$b1->SetFillColor("orange");
$b1->value->Show();
$b1->value->SetAlign('right','top');
$b1->value->SetColor("black","darkred");
#$b1->SetShadow();
$b1->value->SetFont(FF_ARIAL,FS_NORMAL,8);
$b1->value->SetAngle(0);
$b1->SetLegend("Venda acumulada\nR$ $yt");


// Create the bar plot
$b2 = new BarPlot($yh);
#$b1->SetLegend("Mês de Novembro");
$b2->SetFillColor("blue");
$b2->value->Show(); 
#$b2->SetShadow();
$b2->value->SetFont(FF_ARIAL,FS_NORMAL,8);
$b2->value->SetAlign('right','top');
$b2->value->SetColor("black","darkred");
$b2->value->SetAngle(0);
$b2->SetLegend("Venda do Dia\nR$ $yht");

#$gbplot1 = new AccBarPlot(array($b1,$b2));

// Create the bar plot
$b3 = new BarPlot($metauserdia);
#$b1->SetLegend("Mês de Novembro");
$b3->SetFillColor("#D1F8C7");
$b3->value->Show(); 
#$b3->SetShadow();
$b3->value->SetFont(FF_ARIAL,FS_NORMAL,8);
$b3->value->SetAngle(0);
$b3->SetLegend("Meta Acumulada Diaria\nR$ $metauserdiat");

// Create the bar plot
$b4 = new BarPlot($m);
#$b1->SetLegend("Mês de Novembro");
$b4->SetFillColor("#61D15A");
$b4->value->Show(); 
#$b3->SetShadow();
$b4->value->SetFont(FF_ARIAL,FS_NORMAL,8);
$b4->value->SetAngle(0);
$b4->SetLegend("Meta Mensal\nR$ $mt");

// Adjust the legend position
$graph->legend->SetLayout(LEGEND_HOR);
$graph->legend->Pos(0.5,0.99,"center","bottom");

$graph->yaxis->HideZeroLabel();
$graph->ygrid->SetFill(true,'#EFEFEF@0.5','#BBCCFF@0.5');
$graph->xgrid->Show();

// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1, $b2, $b3, $b4));
#$gbplot = new GroupBarPlot(array($b1, $b2, $b4));
$gbplot->SetWidth(0.8);

// Add the plot to the graph 

$graph->Add($gbplot); 

// Display the graph 
$graph->Stroke(); 




?>


