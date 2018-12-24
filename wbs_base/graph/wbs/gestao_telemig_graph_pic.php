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
 
 
  // VERIFICA SE TEM EMPRESA 
if ($codemp_ctr == -1){
    $cond = "";
}else{
    $cond = " and codemp = '$codemp_ctr'";#$empresa = $codemp_transf_vend;
}

 
 for($i = 0; $i <= 31; $i++ ){
	 if (strlen($i)==1){$u = '0'.$i;}else{$u = $i;}
	 
	 
	 	// PLANO CONTROLE  40 - CONTROLE 120 - CONTROLE 160 - IDEAL - IDEAL MICRO - IDEAL 75 - IDEAL 150 - IDEAL 300
		$prod->clear();
        $prod->listProdU("SUM(if (codplano = 4,qtde, 0)) as controle, SUM(if (codplano = 16, qtde, 0)) as controle_120, SUM(if (codplano = 17, qtde, 0)) as controle_160, SUM(if (codplano = 5,qtde, 0)) as ideal, SUM(if (codplano = 6, qtde, 0)) as ideal_micro, SUM(if (codplano = 13, qtde, 0)) as ideal_75, SUM(if (codplano = 14, qtde, 0)) as ideal_150, SUM(if (codplano = 15, qtde, 0)) as ideal_300", "pedido, pedidoprod", "pedido.codped=pedidoprod.codped  and dataped like '$ano-$u1-$u%'  AND cancel <> 'OK' and ped_transf <> 'OK' ". $cond);
        $pic_d1 = $prod->showcampo0();
        $pic_d2 = $prod->showcampo1();
        $pic_d3 = $prod->showcampo2();
        $pic_d4 = $prod->showcampo3();
		$pic_d5 = $prod->showcampo4();
		$pic_d6 = $prod->showcampo5();
		$pic_d7 = $prod->showcampo6();
		$pic_d8 = $prod->showcampo7();
		
		
		$pic_d[$i] = $pic_d1 + $pic_d2 + $pic_d3 + $pic_d4 + $pic_d5 + $pic_d6 + $pic_d7 + $pic_d8;
		$pic_a = $pic_a + $pic_d[$i];
		
/*
	    // PLANO CONTROLE
		$prod->clear();
        $prod->listProdU("codplano, sum(qtde)", "pedido, pedidoprod", "pedido.codped=pedidoprod.codped  and dataped like '$ano-$u1-$u%' AND codplano = 4 AND  cancel <> 'OK' ". $cond ." GROUP by codplano");
        $pc_d[$i] = $prod->showcampo1();
        $pc_a = $pc_a + $pc_d[$i];
        
        // PLANO IDEAL
		$prod->clear();
        $prod->listProdU("codplano, sum(qtde)", "pedido, pedidoprod", "pedido.codped=pedidoprod.codped  and dataped like '$ano-$u1-$u%' AND codplano = 5 AND cancel <> 'OK' ". $cond ." GROUP by codplano");
        $pi_d1[$i] = $prod->showcampo1();
        $pi_a1 = $pi_a1 + $pi_d1[$i];

        $prod->clear();
        $prod->listProdU("codplano, sum(qtde)", "pedido, pedidoprod", "pedido.codped=pedidoprod.codped  and dataped like '$ano-$u1-$u%' AND codplano = 6 AND  cancel <> 'OK' ". $cond ." GROUP by codplano");
        $pi_d2[$i] = $prod->showcampo1();
        $pi_a2 = $pi_a2 + $pi_d2[$i];

        $pi_d[$i] = $pi_d1[$i] + $pi_d2[$i];

        // PLANO IDEAL + CONTROLE
        $pic_d[$i] = $pi_d[$i] + $pc_d[$i];
*/

}//FOR

        // PLANO IDEAL + CONTROLE
        #$pi_a = $pi_a1 + $pi_a2;
        #$pic_at = $pi_a + $pc_a;



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



// BARPLOT IDEAL + CONTROLE
$b4 = new BarPlot($pic_d);
#$b1->SetLegend("Mês de Novembro");
$b4->SetFillColor("red");
$b4->value->Show();
$b4->SetShadow();
$b4->value->SetFont(FF_ARIAL,FS_NORMAL,8);
$b4->value->SetAngle(90);
$b4->SetLegend("ACUMULADO: $pic_a");

// GRAPH CONTROLE
// Add the plot to the graph
$graph->Add($b4);
$graph->img->SetMargin(30,20,50,60);
// Set title and subtitle
$graph->title->Set("PLANO IDEAL + CONTROLE - $mespesq $ano ");
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
#$graph->SetShadow();
$graph->yaxis->HideZeroLabel();
$graph->ygrid->SetFill(true,'#EFEFEF@0.5','#BBCCFF@0.5');
$graph->xgrid->Show();
// Adjust the legend position
$graph->legend->SetLayout(LEGEND_HOR);
$graph->legend->Pos(0.4,0.99,"center","bottom");
// Display the graph
$graph->Stroke();


?>






