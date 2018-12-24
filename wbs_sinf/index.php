<style>
body{
    font-family:Arial, Helvetica, sans-serif;
    font-size:15px;
	margin:0px;
	padding:0px;
	
}
.info, .success, .warning, .error, .validation {
    border: 1px solid;
    margin: -20px 0px;
    padding:15px 0px 15px 0px;
    background-repeat: no-repeat;
    background-position: 10px center;
	text-align:center;
}
.info {
    color: #00529B;
    background-color: #BDE5F8;
    background-image: url('info.png');
}
.success {
    color: #4F8A10;
    background-color: #DFF2BF;
    background-image:url('success.png');
}
.warning {
    color: #9F6000;
    background-color: #FEEFB3;
    background-image: url('warning.png');
}
.error {
    color: #D8000C;
    background-color: #FFBABA;
    background-image: url('error.png');
}

</style>
<?php

	if ( !isset($_GET['cod']) && !isset($_GET['codped'])) die (print('ACESSO NEGADO'));
	
	$producao = ($_SERVER['SERVER_ADDR'] == '10.10.9.230')?true:false;
	
	defined (WBS_HOST) or define(WBS_HOST,(($producao)?'wbs':'wbs-teste'));
	defined (SINF_HST) or define(SINF_HST,(($producao)?'SINFLF':'SINFSERVER'));
	defined (SQL_USER) or define(SQL_USER,(($producao)?'wbs_sinf':'wbs_base'));
	defined (SQL_PASS) or define(SQL_PASS,(($producao)?'sinf@123':'123456'));
	
	include('wbs.class.php');
	include('sinf.class.php');
	include('venda.class.php');
	include('calcula.class.php');
	
	$SERIE = 1;
	
	$wbs = new wbs;
	
	$ibo = new sinf;
	
	$ie = (isset($_GET['ie']))?'T':'F';
	
	//$buttom_label = ($ie == 'T')?'Exportar Nota Fiscal':'Exportar Cupom';
	
	$venda = new venda;
				 
	$emp = (isset($_GET['emp'])?$_GET['emp']:'15');
		 
	$venda->setEmpresa($emp);
	
	print_r($_GET);
	
	$buttom_label = ($emp == 15)?(($ie == 'T')?'Exportar Nota Fiscal':'Exportar Cupom'):'Exportar FAT Antecipado / Simples Remessa';
	
	$venda->vendas($ie);
	
	//$venda->venda($ie);
	
	switch(true) {
		
		case (isset($_GET['nseqvendas'])): {
			?><div class="error"><?php
			
			die(print('PEDIDO JÁ INSERIDO'));
			
			?></div><?php
		}break;
		
		case (!isset($_GET['codped'])): {
		 		 
		// echo '<div class="validation">';
		 
		 $codped = $_GET['codped'];
		 
		 $venda->existe_produto($_GET['cod']);
		 
		 $venda->compara_cliente_sinf($_GET['cod']);
?>
		<center>
        	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
    			<input type="hidden" name="codped" value="<?php echo $_GET['cod']?>" />
            	<input type="hidden" name="emp" value="<?php echo $emp?>" />
            	<?php if ($ie == 'T') echo '<input type="hidden" name="ie" value="'.$_GET['ie'].'" />'; ?>
        		<input type="submit" value="<?php echo $buttom_label?>" />
    		</form>
       	</center>
<?php
		//echo '</div>';
		}break;
		
		case (isset($_GET['codped'])):{
			echo '<div class="success">';
			
			 $codped = $_GET['codped'];
			 
			 $venda->existe_produto($_GET['codped']);
			 
			 $venda->compara_cliente_sinf($_GET['codped']);

			//echo 'Cliente comparado OK';
			$venda->insere_venda();
			
			//echo 'venda inserida OK';
			if($venda->insere_produtos()){
				echo 'EFETUADO COM SUCESSO';	
			}
			
			
			echo '</div>';				
		}break;
		
		
	}
	
?>