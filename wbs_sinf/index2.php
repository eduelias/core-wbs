<?php

	include('wbs.class.php');
	include('sinf.class.php');
	include('venda.class.php');
	include('calcula.class.php');
	
	$SERIE = 1;
	
	
	 
	if (!isset($_GET['codped'])) { 
		 if (!isset($_GET['cod'])) die ('<center><h1>FAVOR NÃO ACESSAR ESTA PÁGINA</h1></center>');
?>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
    	<input type="hidden" name="codped" value="<?php echo $_GET['cod']?>" />
        <input type="submit" value="Exportar" />
    </form>
<?php
	} else {
		$codped = $_GET['codped'];
		$pji = $_GET['pi']; //flag, true pessoa jur insc, fals pj n insc ou pf.
		
		$wbs = new wbs;
		$ibo = new sinf;
		$venda = new venda();
		
		$venda->venda();
		
		if ($venda->existe_produto($codped)) {	
			if ($venda->compara_cliente_sinf($codped)){
				//echo 'Cliente comparado OK';
				if ($venda->insere_venda()) {
				//echo 'venda inserida OK';
					if ($venda->insere_produtos()) {
				
						//echo "EFETUADO COM SUCESSO";
				
					}
				}
			
			} else {
				//echo 'erro no cliente';
			}	
		} else {
			//echo 'Não Existe produto';	
		}
	}; // end if botão/executa
?>