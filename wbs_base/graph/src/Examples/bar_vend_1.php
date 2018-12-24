<?php
// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.


include ("../jpgraph.php");
include ("../jpgraph_line.php");
include ("../jpgraph_bar.php");


$month=array(
"Janeiro","Fevereiro","Mar�o","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");

/*

// Create some datapoints 
$steps=100;
for($i=0; $i<$steps; ++$i) {
	$databarx[]=sprintf("198%d %s",floor($i/12),$month[$i%12]);
	$datay[$i]=log(pow($i,$i/10)+1)*sin($i/15)+35;
	if( $i % 6 == 0 && $i<$steps-6) {
		$databary[]=abs(25*sin($i)+5);
	}
	else {
		$databary[]=0;
	}
}

$u=0;
 for($i = 1; $i <= 31; $i++ ){
	$ydata[$i]=$databary[$i];
	#$ydata[]=abs(25*sin($i)+5);
	
 }
*/

// Some data 
#$ydata = array(11.65,3, 8,12.65,5 ,1,9, 13,5,7 ); 
#$ydata = array($y); 
#$mes = $mes-1;
#$mespesq = $month[$mes];


// Size of graph
$width=700; 
$height=600;

// Set the basic parameters of the graph 
$graph = new Graph($width,$height,'auto');
$graph->SetScale("textlin");
$graph->SetShadow();

$top = 60;
$bottom = 30;
$left = 80;
$right = 30;
$graph->Set90AndMargin($left,$right,$top,$bottom);

// Set title and subtitle
$graph->title->Set("Faturamento Periodo: de $dia/$mes/$ano $h:$m:$s at� $diaf/$mesf/$anof $hf:$mf:$sf");
$graph->subtitle->Set("31 data points, X-Scale: 'text'");

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
#$b1->SetLegend("M�s de Novembro");
$b1->SetFillColor("orange");
$b1->value->Show(); 
$b1->SetShadow();
$b1->value->SetFont(FF_ARIAL,FS_NORMAL,8);
$b1->value->SetAngle(0);

// Add the plot to the graph 
$graph->Add($b1); 

// Display the graph 
$graph->Stroke(); 

/*

// New graph with a background image and drop shadow
$graph = new Graph(450,300,"auto");
$graph->SetBackgroundImage("tiger_bkg.png",BGIMG_FILLFRAME);
$graph->SetShadow();

// Use text X-scale so we can text labels on the X-axis
$graph->SetScale("lin");

// Y2-axis is linear
$graph->SetY2Scale("lin");

// Color the two Y-axis to make them easier to associate
// to the corresponding plot (we keep the axis black though)
$graph->yaxis->SetColor("black","red");
$graph->y2axis->SetColor("black","orange");

// Set title and subtitle
$graph->title->Set("Combined bar and line plot");
$graph->subtitle->Set("100 data points, X-Scale: 'text'");

// Use built in font (don't need TTF support)
$graph->title->SetFont(FF_FONT1,FS_BOLD);

// Make the margin around the plot a little bit bigger then default
$graph->img->SetMargin(40,140,40,80);	

// Slightly adjust the legend from it's default position in the
// top right corner to middle right side
$graph->legend->Pos(0.03,0.5,"right","center");

// Display every 6:th tickmark
$graph->xaxis->SetTextTickInterval(6);

// Label every 2:nd tick mark
$graph->xaxis->SetTextLabelInterval(2);

// Setup the labels
$graph->xaxis->SetTickLabels($databarx);
$graph->xaxis->SetLabelAngle(90);

// Create a red line plot
#$p1 = new LinePlot($datay);
#$p1->SetColor("red");
#$p1->SetLegend("Pressure");

// Create the bar plot
$b1 = new BarPlot($databary);
$b1->SetLegend("Temperature");
$b1->SetFillColor("orange");
$b1->SetAbsWidth(8);

// Drop shadow on bars adjust the default values a little bit
$b1->SetShadow("steelblue",2,2);

// The order the plots are added determines who's ontop
#$graph->Add($p1);
$graph->AddY2($b1);

// Finally output the  image
$graph->Stroke();

*/
?>


