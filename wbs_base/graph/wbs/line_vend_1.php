<?php
include ("../src/jpgraph.php");
include ("../src/jpgraph_line.php");
include ("../src/jpgraph_bar.php");

$month=array(
"Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");

$mes = $mes-1;
$mespesq = $month[$mes];

#$ydata = array(11,3,8,12,5,1,9,13,5,7);
#$ydata2 = array(1,19,15,7,22,14,5,9,21,13);

///////// GRAFICO DIARIO DE VENDAS ////////////

// Create the graph. These two calls are always required
$graph = new Graph(700,350,"auto");    
$graph->SetMarginColor('white');
$graph->SetScale("textlin");
$graph->SetFrame(false);

// Meta
$lineplot2=new LinePlot($databary1);
#$lineplot2->value->show();
#$lineplot2->value->SetAngle(90);
$lineplot2->SetColor("red");
$lineplot2->SetWeight(1);
$lineplot2->SetLegend("Meta acumulada por dia");

// Create the bar plot
$b1 = new BarPlot($databary);
#$b1->SetLegend("Mês de Novembro");
$b1->SetFillColor("orange");
$b1->value->Show(); 
$b1->SetShadow();
$b1->value->SetFont(FF_ARIAL,FS_NORMAL,8);
$b1->value->SetAngle(90);
$b1->SetLegend("Venda acumulada por dia");


// Add the plot to the graph
$graph->Add($lineplot2);
$graph->Add($b1);


// Create and add a new text
//$txt=new Text("Eficiencia: $ef % - $c\n No GAR EXT: $q");
#$txt=new Text("Eficiencia: $ef");
#$txt->Pos(0.3,0.2,"center","center");
##$txt->SetFont(FF_ARIAL,FS_NORMAL,8);
#$txt->ParagraphAlign('cenetered');
#$txt->SetBox('yellow','navy','gray');
#$txt->SetColor("red");
#$graph->AddText($txt);

// Create and add a new text
#$txt=new Text("This is a text");
#$txt->Pos(10,25);
#$txt->SetFont(FF_FONT1,FS_BOLD);
#$txt->SetBox('yellow','navy','gray');
#$txt->SetColor("red");
#$graph->AddText($txt);

$graph->img->SetMargin(80,100,20,60);
// Set title and subtitle
$graph->title->Set("Faturamento mes $mespesq $ano ");
$graph->subtitle->Set("Eficiencia: $ef % - $c\n No GAR EXT: $q");
$graph->xaxis->title->Set("Dias");
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






