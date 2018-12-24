	<? 		
			//pre( explode(' ',$_SERVER['HTTP_USER_AGENT']) );
			$tab = new tabs('Permissao');
			$tab->addTab("modulos/permissao/grid_grupos.php","Grupos", true);
			$tab->addTab("modulos/permissao/grid_arquivos.php","Arquivos", true);
			$tab->addTab("modulos/permissao/grid_menus.php","Menus", true);
			
		
		?>
			
    
    <div id="lay_manager">
        <div id="central">
            <div id='modulo'><h1><?=$pgo[0]['nomem']?></h1></div>
			<?  //include('grid_grupos.php'); //
			 $tab->show_tabs(1);?>
        </div>
        <div id="esquerda"><? //include('grid_grupos.php');?> </div>
     </div>

     
	<?

	
	//include(C_PATH_CLASS."layout.class.php");
	//$layout = new layout();
	
	
	//$u1 = 
	//$layout->addUnit(array('position'=>'center', 'body'=>'div_listaGrupo0'));
	//$layout->addUnit(array('position'=>'left', 'body'=>'esquerda', 'width'=>'300',gutter=>'2px'));
	//$layout->addUnit(array('position'=>'center', 'body'=>'central', 'scroll'=>true, 'height'=>'800'));
	//$layout->addUnit(array('position'=>'bottom', 'height'=>'20','body'=>'rodape'));
	
	//$layout->addUnit($u3);
	
	//$layout->addUnit($u2);
	//$layout->addUnit($u4);
	//$layout->make_layout('demoPermissao');

?>