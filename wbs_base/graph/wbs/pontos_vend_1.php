<?php
include ("../src/jpgraph.php");
include ("../src/jpgraph_line.php");
include ("../src/jpgraph_bar.php");

$month=array(
"Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");

$mes = $mes-1;
$mespesq = $month[$mes];

///////// GRAFICO MENSAL DE VENDAS ////////////

// Create the graph. These two calls are always required
$graph = new Graph(700,350,"auto");
$graph->SetMarginColor('white');
$graph->SetScale("textlin");
$graph->SetFrame(false);

// Create the bar plot
$b1 = new BarPlot($databary_mes);
#$b1->SetLegend("Mês de Novembro");
$b1->SetFillColor("orange");
$b1->value->Show();
$b1->SetShadow();
$b1->value->SetFont(FF_ARIAL,FS_NORMAL,8);
$b1->value->SetAngle(90);
$b1->SetLegend("Pontuação acumulada por mes");


// Add the plot to the graph
$graph->Add($b1);

$graph->img->SetMargin(80,100,20,60);
// Set title and subtitle
$graph->title->Set("Pontuação Mensal -  $ano");
$graph->subtitle->Set("Grafico mensal por vendedor");
$graph->xaxis->title->Set("Mes");
#$graph->yaxis->title->Set("Faturamento");

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

$graph->yaxis->SetColor("red");
$graph->yaxis->SetWeight(1);
#$graph->yaxis->scale->SetGrace(0,100000);
$graph->SetShadow();

$graph->yaxis->HideZeroLabel();
$graph->ygrid->SetFill(true,'#EFEFEF@0.5','#BBCCFF@0.5');
$graph->xgrid->Show();

// Adjust the legend position
$graph->legend->SetLayout(LEGEND_HOR);
$graph->legend->Pos(0.4,0.99,"center","bottom");

// Display the graph
$graph->Stroke();


?>






