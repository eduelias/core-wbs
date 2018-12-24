<?php
include ("../src/jpgraph.php");
include ("../src/jpgraph_line.php");
include ("../src/jpgraph_bar.php");
require ("../../classprod.php" );


$hoje = getdate();
$ano_hoje = $hoje[year];
$mes_hoje = $hoje[mon];
$udia = date("t");
#$diahoje = date("j");

$month=array(
"Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");

if ($mes_hoje == $mes and $ano_hoje == $ano){$diahoje = $hoje[mday];}else{$diahoje = 31;}
if (strlen($dia)==1){$dia = '0'.$dia;}

#$diahoje = 15;
#$login = "joao";
#$metauser = 100;
$meta = $metauser/$udia;
$k= $mes;
#$ano=2004;
#$ano = date("Y");
#$mes = date("n");
#$mes = 4;
#echo("$mes - $k - $ano - $udia - $login - $meta - $metauser");

// INICIO DA CLASSE
$prod = new operacao();

 if (strlen($k)==1){$u1 = '0'.$k;}else{$u1 = $k;}
 $metadia = 0;
 $valordiat = 0;
 $metadia = $meta;
 
 // VERIFICA SE TEM PROJETO E VENDEDOR
if ($codproj == -1){
    $cond = "";
}else{
	if ($codvend == -1){
		$cond = " and codproj = '$codproj'";
	}else{
    	$cond = " and codproj = '$codproj' and codvend = '$codvend'";
	}
}


 
 for($i = 0; $i <= 31; $i++ ){
	 if (strlen($i)==1){$u = '0'.$i;}else{$u = $i;}
	

	    // PLANO CONTROLE  40 - CONTROLE 120 - CONTROLE 160
		$prod->clear();
        $prod->listProdU("SUM(if (codplano = 4,qtde, 0)) as controle, SUM(if (codplano = 16, qtde, 0)) as controle_120, SUM(if (codplano = 17, qtde, 0)) as controle_160", "pedido, pedidoprod", "pedido.codped=pedidoprod.codped  and dataped like '$ano-$u1-$u%'  AND cancel <> 'OK' ". $cond . "");
        $pc_d1 = $prod->showcampo0();
        $pc_d2 = $prod->showcampo1();
        $pc_d3 = $prod->showcampo2();
        
        $pc_d[$i] = $pc_d1 + $pc_d2 + $pc_d3;
        $pc_a = $pc_a + $pc_d[$i];
        
        if ($i > $diahoje){$pc_a = 0;}
        
        $pc_at[$i]= $pc_a;
        
        $meta_dia[$i] = $metadia;
			
				
		$metadia = $metadia + $meta;
        
        

#echo("d=$pc_d[$i] - at=$pc_at[$i]");


}//FOR


//------------------ INICIO CLASSE GRAFICO -------------------//
$mes = $mes-1;
$mespesq = $month[$mes];

#$ydata = array(11,3,8,12,5,1,9,13,5,7);
#$ydata2 = array(1,19,15,7,22,14,5,9,21,13);

///////// GRAFICO DIARIO DE VENDAS ////////////

// Create the graph. These two calls are always required
$graph = new Graph(450,350,"auto");
$graph->SetMarginColor('white');
$graph->SetScale("linlin", 0, 0, 0, 31);
$graph->SetFrame(false);

// Meta
$lineplot2=new LinePlot($meta_dia);
#$lineplot2->value->show();
#$lineplot2->value->SetAngle(90);
$lineplot2->SetColor("red");
$lineplot2->SetWeight(1);
$lineplot2->SetLegend("Meta acumulada por dia");

// BARPLOT CONTROLE
$b1 = new BarPlot($pc_at);
#$b1->SetLegend("Mês de Novembro");
$b1->SetFillColor("orange");
$b1->value->Show(); 
$b1->SetShadow();
$b1->value->SetFont(FF_ARIAL,FS_NORMAL,8);
$b1->value->SetAngle(90);
$b1->SetLegend("ACUMULADO: $pc_a");


// GRAPH CONTROLE
// Add the plot to the graph
$graph->Add($lineplot2);
$graph->Add($b1);
$graph->img->SetMargin(30,20,50,60);
// Set title and subtitle
$graph->title->Set("PLANO CONTROLE - $mespesq $ano ");
$graph->subtitle->Set("");
$graph->xaxis->title->Set("Dias");
$graph->xaxis->scale->ticks->Set(1);
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






