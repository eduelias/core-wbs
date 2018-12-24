<?php
include ("../src/jpgraph.php");
include ("../src/jpgraph_line.php");
include ("../src/jpgraph_bar.php");

$month=array(
"Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");

$mes = $mes-1;
$mespesq = $month[$mes];

$yt  = number_format($yt, 2,',', '.');
$pt  = number_format($pt, 2,',', '.');
$tt  = number_format($tt, 2,',', '.');

#$ydata = array(11,3,8,12,5,1,9,13,5,7);
#$ydata2 = array(1,19,15,7,22,14,5,9,21,13);

///////// GRAFICO DIARIO DE VENDAS ////////////

// Create the graph. These two calls are always required
$graph = new Graph(700,350,"auto");    
$graph->SetMarginColor('white');
$graph->SetScale("textlin");
$graph->SetFrame(false);

// Meta
#$lineplot2=new LinePlot($databary1);
#$lineplot2->value->show();
#$lineplot2->value->SetAngle(90);
#$lineplot2->SetColor("red");
#$lineplot2->SetWeight(1);
#$lineplot2->SetLegend("Meta acumulada por dia");

// Create the bar plot
$b1 = new BarPlot($y);
#$b1->SetLegend("Mês de Novembro");
$b1->SetFillColor("orange");
#$b1->value->Show();
#$b1->SetShadow();
#$b1->value->SetFont(FF_ARIAL,FS_NORMAL,8);
#$b1->value->SetAngle(90);
$b1->SetLegend("Valor acumulado R$ $yt -> TOTAL: $tt");


// Create the bar plot
$b2 = new BarPlot($p);
#$b1->SetLegend("Mês de Novembro");
$b2->SetFillColor("blue");
#$b2->value->Show();
#$b2->SetShadow();
#$b2->value->SetFont(FF_ARIAL,FS_NORMAL,8);
#$b2->value->SetAngle(90);
$b2->SetLegend("Valor acumulado R$ $pt");


// Create the grouped bar plot
$gbplot = new AccBarPlot(array($b1,$b2));
$gbplot->value->Show();
$gbplot->SetShadow();
$gbplot->value->SetFont(FF_ARIAL,FS_NORMAL,8);
$gbplot->value->SetAngle(90);
$gbplot->SetLegend("TOTAL: R$ $tt");


// ...and add it to the graPH
$graph->Add($gbplot);

// Add the plot to the graph
#$graph->Add($lineplot2);
#$graph->Add($b1);

// Specify the tick labels
#$a = $gDateLocale->GetShortDay();
#$graph->xaxis->SetTickLabels($a);
#$graph->xaxis->SetLabelAngle(90);

$graph->img->SetMargin(80,100,20,60);
// Set title and subtitle
$graph->title->Set("Fluxo de Desembolso mes $mespesq $ano ");
$graph->subtitle->Set("Grafico diario ");
$graph->xaxis->title->Set("Dias");
#$graph->yaxis->title->Set("Faturamento");

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Create and add a new text
#$txt=new Text("Eficiencia: $ef %");
#$txt->Pos(0.3,0.2,"center","center");
#$txt->SetFont(FF_ARIAL,FS_NORMAL,8);
#$txt->ParagraphAlign('cenetered');
#$txt->SetBox('yellow','navy','gray');
#$txt->SetColor("red");
#$graph->AddText($txt);


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






