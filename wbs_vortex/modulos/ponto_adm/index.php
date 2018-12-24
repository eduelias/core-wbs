<?

			$tab = new tabs('ponto_adm');
			
			$tab->addTab("modulos/ponto_adm/grid_funcionarios.php","Funcionários", false);
			$tab->addTab("modulos/ponto_adm/grid_funcoes.php","Funções", false);
			$tab->addTab("modulos/ponto_adm/grid_faixas.php","Horários", false);
			
			$tab->show_tabs(0);
?>