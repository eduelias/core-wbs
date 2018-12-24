	<? 		
			//pre( explode(' ',$_SERVER['HTTP_USER_AGENT']) );
			$tab = new tabs('SVN');
			$tab->addTab("modulos/svn_adm/tab_atualizacao.php","Atualizações", true);
			//$tab->addTab("modulos/permissao/grid_arquivos.php","Arquivos", true);
			//$tab->addTab("modulos/permissao/grid_menus.php","Menus", true);
			//decode('WWxjNWEyUlhlSFpqZVRsNlpHMDFabGxYVW5STU1rWnhXVmhvWm1SWVFtdFpXRkpzWTNrMWQyRklRVDA9=');
		?>
			
 
    <div id="lay_manager">
        <div id="central">
            <div id='modulo'><h1><?=$pgo[0]['nomem']?></h1></div>
			 <? include('modulos/svn_adm/tab_atualizacao.php'); //$tab->show_tabs(0);?>
        </div>
     </div>