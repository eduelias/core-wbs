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


         // PLANO CARTAO
		$prod->clear();
        $prod->listProdU("codplano, sum(qtde)", "pedido, pedidoprod", "pedido.codped=pedidoprod.codped  and dataped like '$ano-$u1-$u%' AND codplano = 7 AND cancel <> 'OK' and ped_transf <> 'OK' ". $cond ." GROUP by codplano");
        $pcar_d[$i] = $prod->showcampo1();
        $pcar_a = $pcar_a + $pcar_d[$i];

        $pcar_at[$i]= $pcar_a;
        

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

// BARPLOT CARTAO
$b3 = new BarPlot($pcar_d);
#$b1->SetLegend("Mês de Novembro");
$b3->SetFillColor("green");
$b3->value->Show();
$b3->SetShadow();
$b3->value->SetFont(FF_ARIAL,FS_NORMAL,8);
$b3->value->SetAngle(90);
$b3->SetLegend("ACUMULADO: $pcar_a");



// GRAPH CONTROLE
// Add the plot to the graph
$graph->Add($b3);
$graph->img->SetMargin(30,20,50,60);
// Set title and subtitle
$graph->title->Set("PLANO CARTAO - $mespesq $ano ");
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






